<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use YouTube\YouTubeDownloader;
use Ayesh\InstagramDownload\InstagramDownload;

class ToolsController extends Controller
{
    /**
     * ToolsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1|2');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('tools.index');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
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

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function instaDownloader(Request $request)
    {
        $submittedUrl = $request->input('url');

        if (isset($submittedUrl)) {
            $url = $submittedUrl;

            try {
                $client = new InstagramDownload($url);
                $url = $client->getDownloadUrl(); // Returns the download URL.
                $type = $client->getType(); // Returns "image" or "video" depending on the media type.
            }
            catch (\InvalidArgumentException $exception) {
                /*
                 * \InvalidArgumentException exceptions will be thrown if there is a validation
                 * error in the URL. You might want to break the code flow and report the error
                 * to your form handler at this point.
                 */
                $error = $exception->getMessage();
            }
            catch (\RuntimeException $exception) {
                /*
                 * \RuntimeException exceptions will be thrown if the URL could not be
                 * fetched, parsed, or a media could not be extracted from the URL.
                 */
                $error = $exception->getMessage();
            }

            $url = (isset($url) ? $url : 0);
            $type = (isset($type) ? $type : 0);
            $error = (isset($error) ? $error : 0);

            return view('tools.instaDownloader', compact('submittedUrl', 'url', 'type', 'error'));
        }

        return view('tools.instaDownloader');
    }
}
