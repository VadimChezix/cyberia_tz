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

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
