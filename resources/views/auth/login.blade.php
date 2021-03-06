@extends('app')

@section('title', 'ログイン')

@section('content')
    <div class="container">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <div class="card mt-3">
                <div class="card-body text-center">
                    <h2 class="h3 card-title text-center mt-2">ログイン</h2>
                    @include('error_card_list')
                    <div class="card-text">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="md-form">
                                <label for="">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="md-form">
                                <label for="">パスワード</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <input type="hidden" name="remember" id="remember" value="on">
                            <div class="text-left">
                                <a href="{{ route('password.request') }}" class="card-text">パスワードを忘れた方はこちら</a>
                            </div>

                            <button type="submit" class="btn btn-block blue-gradient mt-2 mb-2">ログイン</button>
                        </form>
                        <div class="mt-0">
                            <a href="{{ route('register') }}" class="card-text">ユーザー登録はこちら</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection