@extends('layouts.app')
@section('content')
    <div>
        <div>
            <article-component></article-component>
            <img src="{{ $article->img }}"/>
            <h5>{{ $article->title }}</h5>
            <p>
                @foreach($article->tags as $tag)
                    @if($loop->last)
                        <span><a href="{{ route('article.tag', $tag->id) }}" class="badge bg-danger">{{$tag->label}}</a></span>
                    @else
                        <span><a href="{{ route('article.tag', $tag->id) }}" class="badge bg-danger">{{$tag->label}}</a> | </span>
                    @endif
                @endforeach
            </p>
            <p>{{$article->body}}</p>
            <p>Опубликовано: <i>{{$article->createdAtForHumans()}}</i></p>
            <div>
                <span>Понравилось: {{$article->state->likes}}</span>
                &nbsp; &nbsp; <span>Просмотров: {{$article->state->views}}</span>
            </div>
        </div>
    </div>
    <div id="app">
        <article-component></article-component>
        <hr>
        <comments-component></comments-component>
    </div>
@endsection

@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection