<?php

namespace App\Core\Http\Controllers\Backend;

use App\Core\Models\Category\Tags;
use Illuminate\Http\Request;
use Mymo\Core\Http\Controllers\BackendController;

class TagsController extends BackendController
{
    public function save(Request $request) {
        $this->validateRequest([
            'name' => 'required|string|max:250|unique:tags,name,' . $request->post('id'),
        ], $request, [
            'name' => trans('app.name'),
        ]);
        
        $addtype = $request->post('addtype');
        $model = Tags::firstOrNew(['id' => $request->post('id')]);
        $model->fill($request->all());
        $model->save();
        
        if ($addtype == 2) {
            return response()->json($model->toArray());
        }
        
        return response()->json([
            'status' => 'success',
            'message' => trans('app.saved_successfully'),
        ]);
    }
}
