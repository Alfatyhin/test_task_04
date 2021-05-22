@extends('layouts.article')

@section('title')
    - статья: {{$article->title}}
@endsection

@section('header')

@endsection

@section('content')

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h1>{{$article->title}}</h1>
        <h6> date: {{$article->created_at->format('Y-m-d')}}</h6>
        <div class="text_formated">{{$article->text}}</div>

        @include('article.links_redact_delete')
    </div>

@endsection

