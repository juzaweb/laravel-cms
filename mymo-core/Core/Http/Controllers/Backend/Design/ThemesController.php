<?php

namespace Mymo\Core\Http\Controllers\Backend\Design;

use Mymo\Core\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class ThemesController extends BackendController
{
    public function index()
    {
        return view('mymo_core::backend.design.themes.index', [
            'title' => trans('mymo_core::app.themes'),
        ]);
    }
    
    public function save(Request $request)
    {
    
    }
}
