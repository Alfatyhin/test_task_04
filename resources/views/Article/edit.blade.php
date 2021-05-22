@extends('layouts.article')

@section('title')
    - редактировать статью: {{$article->title}}
@endsection

@section('header')
    <h1>Редактор статей</h1>
@endsection

@section('content')

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if ($message)
            <p >{{$message}}</p>
        @endif
        <form enctype="multipart/form-data" action="{{route('article.update', ['article' => $article])}}" method="post">
            @csrf
            <p > Название статьи: <br>
                <input class="title" type="text" name="title" value="{{$article->title}}" />
            @if ($errors->has('title'))
                <div class="alert alert-danger">{{$errors->first('title')}}</div>
                @endif
                </p>

                <p>Текст статьи: <br>
                    <textarea name="text">{{$article->text}}</textarea>
                @if ($errors->has('article'))
                    <div class="alert alert-danger">{{$errors->first('article')}}</div>
                    @endif
                    </p>

                    <input type="submit" name="save" value="сохранить">
        </form>
    </div>

@endsection

