<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Project;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * @return Application|Factory|View
     */
    public function projects(Request $request)
    {

        if ($request->post()) {
            $projects = Project::all()->sortByDesc('id');

            foreach ($projects as $project) {
                $show = !empty($request->input($project->id)); // Set true or false
                if ($project->show != $show) {
                    $project->show = $show;
                    $project->save();
                }
            }
        }

        return view('admin.projects');
    }
}
