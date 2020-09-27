<?php

namespace App\Http\Controllers\Backend;

use App\Models\Movie\Movies;
use App\Models\Video\VideoServers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieServesController extends Controller
{
    public function index($movie_id) {
        $movie = Movies::where('id', '=', $movie_id)->firstOrFail();
        return view('backend.movie_servers.index', [
            'movie' => $movie,
        ]);
    }
    
    public function form($movie_id, $server_id = null) {
        $movie = Movies::where('id', '=', $movie_id)->firstOrFail();
        $model = VideoServers::firstOrNew(['id' => $server_id]);
        return view('backend.movie_servers.form', [
            'title' => $model->name ?: trans('app.add_new'),
            'movie' => $movie,
            'model' => $model,
        ]);
    }
    
    public function getData($movie_id, Request $request) {
        $movie = Movies::where('id', '=', $movie_id)
            ->firstOrFail();
        
        $search = $request->get('search');
        $status = $request->get('status');
        
        $offset = $request->get('offset', 0);
        $limit = $request->get('limit', 20);
        
        $query = VideoServers::query();
        $query->where('movie_id', '=', $movie_id);
        
        if ($search) {
            $query->orWhere('name', 'like', '%'. $search .'%');
        }
        
        if (!is_null($status)) {
            $query->where('status', '=', $status);
        }
        
        $count = $query->count();
        $query->orderBy('order', 'asc');
        $query->offset($offset);
        $query->limit($limit);
        $rows = $query->get();
        
        foreach ($rows as $row) {
            $row->created = $row->created_at->format('H:i Y-m-d');
            if ($movie->tv_series == 0) {
                $row->upload_url = route('admin.movies.servers.upload', ['server_id' => $row->id]);
            }
            else {
                $row->upload_url = route('admin.tv_series.servers.upload', ['server_id' => $row->id]);
            }
        }
        
        return response()->json([
            'total' => $count,
            'rows' => $rows
        ]);
    }
    
    public function save($movie_id, Request $request) {
        $this->validateRequest([
            'name' => 'required|string|max:100',
            'order' => 'required|numeric',
        ], $request, [
            'name' => trans('app.name'),
            'order' => trans('app.order'),
        ]);
        
        $model = VideoServers::firstOrNew(['id' => $request->post('id')]);
        $model->fill($request->all());
        $model->movie_id = $movie_id;
        $model->save();
        
        return response()->json([
            'status' => 'success',
            'message' => trans('app.saved_successfully'),
            'redirect' => route('admin.movies.servers', ['movie_id' => $movie_id]),
        ]);
    }
    
    public function remove($movie_id, Request $request) {
        $this->validateRequest([
            'ids' => 'required',
        ], $request, [
            'ids' => trans('app.servers'),
        ]);
        
        $movie_ids = VideoServers::where('movie_id', '=', $movie_id)
            ->whereIn('id', $request->post('ids'))
            ->pluck('id')
            ->toArray();
    
        VideoServers::destroy($movie_ids);
        
        return response()->json([
            'status' => 'success',
            'message' => trans('app.saved_successfully'),
            'redirect' => route('admin.genres'),
        ]);
    }
}
