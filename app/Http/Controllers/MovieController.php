<?php

namespace App\Http\Controllers;


class MovieController extends Controller
{
    /**
     * Index method
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('movies.edit');
    }
}
