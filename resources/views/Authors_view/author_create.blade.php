@extends('layouts.app')
@section('title')
    <title>Создание автора</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <form action="" class="form-control" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <label for="">Имя</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                            @error('name')
                            <div class="alert alert-danger">
                                    Имя введенно не корректно
                                </div>
                                @enderror
                        </div>
                        <div class="col-sm">
                            <label for="">Email</label>
                            <input type="email" name='email' value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger">Email введен некорректно</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Добавить автора</button>
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
                <a href="{{route('author_index')}}" class="btn btn-secondary">Назад</a>
            </div>
        </div>
    </div>
@endsection
