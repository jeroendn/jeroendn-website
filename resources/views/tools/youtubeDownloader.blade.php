@extends('appTools')

@section('content')
    <div class="container">

        <h1>Youtube downloader</h1>
        <form class="mb-5" method="get" action="{{ route('youtube-downloader') }}">
            <div class="mb-3">
                <label for="downloadUrl" class="form-label">Enter a youtube video URL:</label>
                <input type="text" class="form-control" name="url" id="downloadUrl" placeholder="URL" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if(!empty($submittedUrl) && !empty($links))
            <h2>Your URL: <a href="<?= $submittedUrl ?>" target="_blank"><?= $submittedUrl ?></a></h2>

            @foreach($links as $link)
                @if($link['format'] === 'mp4, video, 1080p' || $link['format'] === 'mp4, video, 1080p, audio' || $link['format'] === 'mp4, video, 720p, audio')
                    <p class="mb-1"><?= $link['format'] ?></p>
                    <a href="<?= $link['url'] ?>" target="_blank" style="display: block; word-break: break-all;">Download</a>
                    <br>
                @endif
            @endforeach

            <details>
                <summary>Raw URL's</summary>
                @foreach($links as $link)
                    <p class="mb-1"><?= $link['format'] ?></p>
                    <a href="<?= $link['url'] ?>" target="_blank" style="display: block; word-break: break-all;">Download</a>
                    <br>
                @endforeach
            </details>
        @endif

    </div>
@endsection
