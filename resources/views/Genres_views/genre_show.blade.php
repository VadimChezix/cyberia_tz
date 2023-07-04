@extends('layouts.app')
@section('title')
    <title>Посмотреть жанр</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card text-center">
                    <div class="card-header">
                        <p class="fs-4">Жанр</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Название: {{ $genre->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm d-flex justify-content-end">
                <a href="{{ route('genre_index') }}" class="btn btn-secondary">Назад</a>
            </div>
            <div class="col-sm">
                <a href="{{ route('home') }}" class="btn btn-secondary">На главную</a>
            </div>
        </div>
    </div>
@endsection
