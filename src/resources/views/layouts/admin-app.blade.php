<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-common.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__group">
            <div class="header__group-tittle">
                <h1>PiGLy</h1>
            </div>
            <div class="header__group-content">
                <nav>
                    <ul class="header__nav">
                        <li class="header__nav-item">
                            <a href="{{route('weight-goal')}}" class="header__nav-button">
                                <i class="fas fa-cog"></i>目標体重設定</a>
                        </li>
                        <li class="header_nav-item">
                            <form action="/logout" method="post" class="logout">
                                @csrf
                                <button type="submit" class="logout__button">
                                    <i class="fas fa-right-from-bracket"></i>ログアウト</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>