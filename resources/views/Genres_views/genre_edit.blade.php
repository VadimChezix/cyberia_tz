@extends('layouts.app')
@section('title')
    <title>Редактировать жанр</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <form action="{{route('genre_update',$genre->id)}}" class="form-control" method="post">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-sm">
                        <label for="">Название жанра</label>
                        <input type="text" name="name" value="{{$genre->name}}"  class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">
                                Название введено некорректно
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary">Изменить жанр</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm d-flex justify-content-end">
            <a href="{{route('home')}}" class="btn btn-secondary">На главную</a>
        </div>
        <div class="col-sm">
            <a href="{{route('genre_index')}}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>
@endsection