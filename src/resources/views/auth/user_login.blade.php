<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coachtech勤怠アプリ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user_login.css') }}">
</head>

<body>
<header>
    <div class="header">
        <table>
            <tr>
                <th>
                    <h1 class="title">COACHTECH</h1>
                </th>
            </tr>
        </table>
    </div>
</header>
<main>
    <div>
        <form class="form" action="/login" method="post">
        @csrf
            <h1>
                ログイン
            </h1>
            <div>
                <h4>メールアドレス</h4>
                <input type="email" name="email" value="{{ old('email') }}" />
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <h4>パスワード</h4>
                <input type="password" name="password" />
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <button class="" type="submit">ログインする</button>
                <div>
                    <a href="/register">会員登録はこちら</a>
                </div>
            </div>
        </form>
    </div>
</main>
</body>

</html>