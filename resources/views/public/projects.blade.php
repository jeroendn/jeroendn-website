@extends('app')

@section('content')
    <div class="container">
        <h2>Schoolprojecten</h2>
        <p>Lijst van mijn websites gemaakt voor schoolprojecten op volgorde van nieuw naar oud.</p>
        <ul>
            @foreach($projects as $project)
                <li><a href="{{ $project->url }}">{{ $project->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
