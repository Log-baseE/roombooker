<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Front page
     *
     * @return View
     */
    public function index() {
        return view('index', ['title' => 'Welcome']);
    }
}
