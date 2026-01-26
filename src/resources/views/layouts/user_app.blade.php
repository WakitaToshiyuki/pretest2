<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coachtech勤怠アプリ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user_common.css') }}">
  @yield('css')
</head>

<body>
<header>
  <div class="header">
    <table>
      <tr>
        <th>
          <a href="/">
            <h1 class="title">COACHTECH</h1>
          </a>
        </th>
        <!-- @if(Auth::check()) -->
        <th>
          <form  action="/" method="POST">
          @csrf
            <input class="search" type="text" name="search_word" placeholder="なにをお探しですか？">
            <input type="submit" value="探す">
          </form>
        </th>
        <th>
          <form action="/logout" method="post">
          @csrf
            <button class="header-nav__button">ログアウト</button>
          </form>
        </th>
        <th>
          <a href="/mypage">マイページ</a>
        </th>
        <th>
          <a href="/sell">出品</a>
        </th>
        <!-- @else
        <th>
          <form  action="/" method="POST">
          @csrf
            <input class="search" type="text" name="search_word" placeholder="なにをお探しですか？">
            <input type="submit" value="探す">
          </form>
        </th>
        <th>
          <a href="/login">ログイン</a>
        </th>
        <th>
          <a href="/mypage">マイページ</a>
        </th>
        <th>
          <a href="/sell">出品</a>
        </th>
        @endif -->
      </tr>
    </table>

  </div>
</header>
<main>
  @yield('content')
</main>
</body>

</html>
