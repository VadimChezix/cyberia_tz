@extends('layouts.app')
@section('title')
    <title>Все жанры</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Имя</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($genres as $genre)
                            <tr>
                                <td>{{$genre->name }}</td>
                                   
                                </td>
                                <td>
                                    <a href="{{ route('genre_show', $genre->id) }}"> &#128269;</a>
                                    <a href="{{route('genre_edit',$genre->id)}}" class="fs-5">&#9998;</a>
                                    <a href="{{route('genre_delete',$genre->id)}}" class="fs-5">&#128465;</a>
                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm d-flex justify-content-end">
            <a href="{{route('genre_create')}}" class="btn btn-secondary">Добавить жанр</a>
        </div>
        <div class="col-sm ">
            <a href="{{ route('home') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>
@endsection