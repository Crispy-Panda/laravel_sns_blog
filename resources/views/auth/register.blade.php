@extends('app')

@section('title', '新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>
                        @include('error_card_list')
                        <div class="card-text">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="md-form">
                                    <label for="name">ユーザー名</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    <small>英数字3〜16文字(登録後の変更はできません)</small>
                                </div>
                                <div class="md-form">
                                    <label for="email">メールアドレス</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="md-form">
                                    <label for="">パスワード</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="md-form">
                                    <label for="password_confirmation">パスワード(確認)</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-block blue-gradient mt-2 mb-2">登録</button>
                            </form>
                            <div class="mt-0">
                                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection