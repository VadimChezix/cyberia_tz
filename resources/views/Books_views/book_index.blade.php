@extends('layouts.app')
@section('title')
    <title>Все книги</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Название книги</th>
                                <th scope="col">Автор</th>
                                <th scope="col">Дата добавления</th>
                                <th scope="col">Жанры</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->created_at }}</td>

                                    @foreach ($book->genres as $genre)
                                        <td>
                                            {{ $genre->name }}
                                        </td>
                                    @endforeach
                                        <td>
                                            <a href="{{route('book_show',$book->id)}}"> &#128269;</a>
                                            <a href="" class="fs-5">&#9998;</a>
                                            <a href="{{route('book_delete',$book->id)}}" class="fs-5">&#128465;</a>
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
                <a href="{{route('home')}}" class="btn btn-secondary">Назад</a>
            </div>
        </div>
    </div>
@endsection
