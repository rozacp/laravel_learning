<p></p>
<p><b>Published at:</b> {{ $article->published_at }}</p>
<p><b>Published by:</b> {{ $article->user->name }}</p>

@if (! $article->tags->isEmpty())
    <p><b>Tags:</b>
        @foreach($article->tags as $tag)
            &nbsp;<a href="{{ route('tags', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
        @endforeach
    </p>
@endif