@extends('layouts.app')
@section('title')
    <title>Просмотр книги</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card text-center">
                <div class="card-header">
                   <p class="fs-4">Название: {{$book->name}}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Автор: {{$book->author->name}}</h5>
                    <p class="card-text"> Жанры:
                    @foreach ($book->genres as $genre)
                   {{$genre->name}}
                    @endforeach
                </p>
                   
                </div>
                <div class="card-footer text-muted">
                Дата добавления: {{$book->created_at}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm d-flex justify-content-end">
            <a href="{{route('book_index')}}" class="btn btn-secondary">Назад</a>
        </div>
        <div class="col-sm">
            <a href="{{route('home')}}" class="btn btn-secondary">На главную</a>
        </div>
    </div>
    </div>
@endsection
