<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Require all pages to be logged in
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('public.home');
    }

    public function projects()
    {
        return view('public.projects');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
