@extends('layouts.article')

@section('title', ' - новая статья')

@section('header')
    <h1>Создание статьи</h1>
@endsection

@section('content')

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <form enctype="multipart/form-data" action="{{route('article.save')}}" method="post">
            @csrf
            <p > Название статьи: <br>
                <input class="title" type="text" name="title"  />
            @if ($errors->has('title'))
                <div class="alert alert-danger">{{$errors->first('title')}}</div>
                @endif
                </p>

                <p>Текст статьи: <br>
                    <textarea name="text"></textarea>
                @if ($errors->has('article'))
                    <div class="alert alert-danger"></div>
                    @endif
                    </p>

                    <input type="submit" name="save" value="сохранить">
        </form>
    </div>

@endsection

