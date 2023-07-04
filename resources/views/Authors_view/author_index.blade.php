@extends('layouts.app')
@section('title')
    <title>Все авторы</title>
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
                                <th scope="col">Email</th>
                                <th scope="col">Книги</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->email }}</td>
                                    <td>
                                        Количество книг: {{$author->books->count()}}
                                        Названия: @foreach ($author->books as $book)
                                            
                                           {{ $book->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('author_show', $author->id) }}"> &#128269;</a>
                                        <a href="{{route('author_edit',$author->id)}}" class="fs-5">&#9998;</a>
                                        <a href="{{route('author_delete',$author->id)}}" class="fs-5">&#128465;</a>
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
                <a href="{{route('author_create')}}" class="btn btn-secondary">Добавить автора</a>
            </div>
            <div class="col-sm ">
                <a href="{{ route('home') }}" class="btn btn-secondary">Назад</a>
            </div>
        </div>
    </div>
@endsection
