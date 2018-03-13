<?php

namespace App\Http\Controllers;


class CategoryController extends Controller
{
    /**
     * Index method
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('categories.edit');
    }
}
