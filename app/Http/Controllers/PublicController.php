<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
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
        return view('public.projects', [
            'projects' => Project::visibleToCurrentUser(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function contact()
    {
        return view('public.contact');
    }
}
