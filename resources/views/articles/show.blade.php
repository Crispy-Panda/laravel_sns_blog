@extends('app')

@section('title', '記事一覧')

@section('content')
    <div class="container">
            @include('articles.card')
    </div>
@endsection