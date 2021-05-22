@extends('layouts.article')

@section('title', '')

@section('header')
    <h1>Каталог статей</h1>
@endsection

@section('content')

        <div class="sm:text-right links"><a class="button" href="{{route('article.create')}}" >Создать статью</a></div>
        @foreach($articles as $article)

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <h3><a href="{{route('article.show', ['article' => $article])}}" >{{$article->title}}</a></h3>
                <h6> date: {{$article->created_at}}</h6>
                <div class="">{{$article->text}} </div>

                @include('article.links_redact_delete')
            </div>

        @endforeach

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 paginate">
            {{ $articles->links() }}
        </div>

@endsection
