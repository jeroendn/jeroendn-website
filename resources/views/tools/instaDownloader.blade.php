@extends('appTools')

@section('content')
    <div class="container">

        <h1>Insta downloader</h1>
        <form class="mb-5" method="get" action="{{ route('tools.instagram-downloader') }}">
            <div class="mb-3">
                <label for="downloadUrl" class="form-label">Enter a youtube video URL:</label>
                <input type="text" class="form-control" name="url" id="downloadUrl" placeholder="URL" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if(!empty($submittedUrl) && !empty($url) && !empty($type))
            <h2>Result</h2>
            <a href="<?= $url ?>">Download</a>
            <img src="<?= $url ?>" style="width: 100%;">
            <video src="<?= $url ?>" style="width: 100%;"></video>
        @endif

        @if(!empty($submittedUrl))
            <h2>Result Picture</h2>
            <?php $link = $submittedUrl . "media/?size=l"; ?>
            <a href="<?= $link ?>" download><img src="<?= $link ?>" style="width: 100%; border-radius: 5px; border: 4px solid #fff;">Download</a>
        @endif

        @if(!empty($error))
            <h2>Error</h2>
            <p><?= $error ?></p>
        @endif

    </div>
@endsection
