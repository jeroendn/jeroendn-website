@extends('app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.projects') }}">
        @csrf

        <h4>{{ __('Show publicly') }}</h4>
        @foreach($projects as $project)
            <div class="form-group row">
                <label for="{{ $project->id }}" class="col-md-3 form-check-label text-md-right">{{ $project->name }}</label>

                <div class="col-md-9">
                    <input id="{{ $project->id }}" type="checkbox" class="form-check-input" name="{{ $project->id }}" {{ ($project->show) ? 'checked' : null }}>
                </div>
            </div>
        @endforeach

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
