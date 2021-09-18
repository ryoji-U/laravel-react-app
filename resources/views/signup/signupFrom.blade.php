<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規登録</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>新規登録</h2>
            <form method="POST" action="{{ route('signup') }}">
                @csrf
                <div class="form-group">
                    <label for="name">
                        氏名
                    </label>
                    <input
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        type="text"
                        required
                    >
                    @if ($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">
                        メールアドレス
                    </label>
                    <input
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        type="email"
                        required
                    >
                    @if ($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword">
                        パスワード
                    </label>
                    <input
                        id="password"
                        name="password"
                        class="form-control"
                        value="{{ old('password') }}"
                        rows="4"
                        type="password"
                        required
                    >
                    @if ($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword">
                        パスワード（確認用）
                    </label>
                    <input
                        id="password-validation"
                        name="password-validation"
                        class="form-control"
                        value="{{ old('password-validation') }}"
                        type="password"
                        required
                    >
                    @if ($errors->has('password-validation'))
                        <div class="text-danger">
                            {{ $errors->first('password-validation') }}
                        </div>
                    @endif
                </div>
                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('blogs') }}">
                        キャンセル
                    </a>
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>