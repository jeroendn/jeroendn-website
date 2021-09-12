<article class="card mb-4">
    <div class="card-header"></div>
    <details class="card-body" open>
        <summary><h1 class="card-title">{{ $entry->title }}</h1></summary>
        {{ $entry->entry }}
    </details>
    <div class="card-footer text-right">- {{ $entry->date }}</div>
</article>
