@extends('appDiary')

@section('content')
    <div class="container">
        @forelse($dateSortedEntries as $year => $months)
            <h2>{{ $year }}</h2>

            @foreach($months as $month => $days)

                @if($month !== 0)
                <h3>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</h3>

                @foreach($days as $day => $entries)
                    <h4>{{ $day }}</h4>

                    @foreach($entries as $entry)
                        @include('diary.elements.entry')
                    @endforeach

                @endforeach

                @else
                    @foreach($days as $entry)
                        @include('diary.elements.entry')
                    @endforeach
                @endif

            @endforeach

        @empty
            Empty
        @endforelse
    </div>
@endsection
