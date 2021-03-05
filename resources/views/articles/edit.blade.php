@extends('app')

@section('title', '記事更新')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="cart-text">
                            <form action="{{ route('articles.update', ['article' => $article]) }}" method="POST">
                                @method('PATCH')
                                @include('articles.form')
                                <button class="btn blue-gradient btn-block">更新</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection