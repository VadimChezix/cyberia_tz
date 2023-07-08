@extends('layouts.app')
@section('title')
    <title>Создание книги</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <form action="" class="form-control" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm mt-3">
                            <label for="">Название книги</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">Имя введенно не корректно</div>
                    @enderror
                </div>
                <div class="col-sm mt-3">
                    <label for="">Автор книги</label>
                    <select name="author_id" id="" class="form-select" @error('author_id') is-invalid @enderror">
                        <option value="" selected>Выберите автора</option>
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                </select>
               @error('author_id')
                   <div class="alert alert-danger">Это поле обязательно</div>
               @enderror
                </div>
                </div>
                <div class="row">
                    
                    @foreach ($genres as $genre)
                    <div class="col-sm mt-3">
                        <input type="checkbox" name="genres[]"   value="{{ $genre->id }}">
                        <label for="">{{ $genre->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm mt-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Добавить книгу</button>
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
                <a href="{{route('book_index')}}" class="btn btn-secondary">Назад</a>
            </div>
        </div>
    </div>
@endsection

