<?php

namespace Juzaweb\Frontend\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Juzaweb\Backend\Http\Resources\PostResource;
use Juzaweb\Backend\Models\Post;
use Juzaweb\CMS\Http\Controllers\FrontendController;

class SearchController extends FrontendController
{
    public function index(Request $request): string
    {
        $keyword = $request->input('q');
        $title = $keyword ? trans(
            'cms::app.result_for_keyword',
            [
                'name' => $keyword,
            ]
        ) : trans('cms::app.search_results');

        $query = Post::selectFrontendBuilder()->whereSearch($request->all());
        $posts = $query->paginate(12);
        $posts->appends($request->query());

        $page = PostResource::collection($posts)->response()->getData(true);
        $template = 'search';

        $viewName = apply_filters('search.get_view_name', "theme::search");
        if (!view()->exists(theme_viewname($viewName))) {
            $viewName = 'theme::index';
        }

        return $this->view(
            $viewName,
            compact(
                'page',
                'title',
                'keyword',
                'template'
            )
        );
    }

    public function ajaxSearch(Request $request): JsonResponse
    {
        $limit = $request->input('limit', 5);
        if ($limit > 100) {
            $limit = 100;
        }

        $paginate = Post::selectFrontendBuilder()->whereSearch($request->all())->paginate($limit);
        $results = $paginate->items();
        foreach ($results as $key => $item) {
            if (empty($item)) {
                unset($results[$key]);
                continue;
            }

            $item->thumbnail = $item->getThumbnail();
            $item->url = $item->getLink();
            $item->link = $item->url;
            $item->title = $item->getTitle();
            $item->description = $item->getDescription();
            $item->views = $item->getViews();
            $item->created_date = jw_date_format($item->created_at);
        }

        $data['results'] = $results;
        $data['pagination'] = ['more' => (bool) $paginate->nextPageUrl()];

        return response()->json($data);
    }
}
