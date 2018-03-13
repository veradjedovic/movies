<?php

namespace App\Http\Controllers;


class FrontendController extends Controller
{
    /**
     * Index method
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       return view('index');
    }
}
