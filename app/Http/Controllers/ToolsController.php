<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use YouTube\YouTubeDownloader;

class ToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1|2');
    }

    public function index()
    {
        return view('tools.index');
    }

    public function youtubeDownloader(Request $request)
    {
        $submittedUrl = $request->input('url');

        if (isset($submittedUrl)) {
            $yt = new YouTubeDownloader();
            $links = $yt->getDownloadLinks($submittedUrl);
            return view('tools.youtubeDownloader', compact('submittedUrl', 'links'));
        }

        return view('tools.youtubeDownloader');
    }
}
