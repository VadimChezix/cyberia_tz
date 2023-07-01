@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm ms-2">
                <div class="row">
                    <div class="col-sm d-flex justify-content-center">
                        <h1>К книгам</h1>
                    </div>
                </div>
                <div class="row">
                    <a href="{{route('book_index')}}" class="btn btn-primary">Перейти</a>
                </div>
            </div>
            <div class="col-sm ms-2">
                <div class="row">
                    <div class="col-sm d-flex justify-content-center">
                        <h1>К авторам</h1>
                    </div>
                </div>
                <div class="row">
                    <a href="" class="btn btn-primary">Перейти</a>
                </div>
            </div>
            <div class="col-sm ms-2">
                <div class="row">
                    <div class="col-sm d-flex justify-content-center">
                        <h1>К жанрам</h1>
                    </div>
                </div>
                <div class="row">
                    <a href="" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>
    </div>
@endsection
