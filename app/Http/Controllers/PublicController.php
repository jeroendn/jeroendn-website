<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * PublicController constructor.
     */
    public function __construct()
    {
        // Require all pages to be logged in
        // $this->middleware('auth');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('public.home');
    }

    /**
     * @return Application|Factory|View
     */
    public function projects()
    {
        return view('public.projects');
    }

    /**
     * @return Application|Factory|View
     */
    public function contact()
    {
        return view('public.contact');
    }
}
