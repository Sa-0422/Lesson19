<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- 追加 -->
    <header>
        <h1 class="page-header">チーム課題</h1>
    </header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <!-- 投稿一覧表示時 -->
                        <li class="nav-item">
                            @if (Request::is('index'))
                            <h2>Home</h2>
                            @endif
                        </li>

                        <li class="nav-item">
                            @if (Request::is('/'))
                            <h2>Home</h2>
                            @endif
                        </li>

                        <!-- 新規投稿 -->
                        <li class="nav-item">
                            @if (Request::is('create-form'))
                            <h2>Post</h2>
                            @endif
                        </li>

                        <!-- 投稿編集 -->
                        <li class="nav-item">
                            @if (Request::is('post/*/update-form'))
                            <h2>Edit Post</h2>
                            @endif
                        </li>

                        <!-- プロフィール -->
                        <li class="nav-item">
                            @if (Request::is('userProfile'))
                            <h2>Profile</h2>
                            @endif
                        </li>

                        <!-- プロフィール編集 -->
                        <li class="nav-item">
                            @if (Request::is('updateProfileForm'))
                            <h2>Edit Profile</h2>
                            @endif
                        </li>

                        <!-- フォローリスト -->
                        <li class="nav-item">
                            @if (Request::is('followingList'))
                            <h2>Following List</h2>
                            @endif
                        </li>

                        <!-- フォロワーリスト -->
                        <li class="nav-item">
                            @if (Request::is('followedList'))
                            <h2>Followed List</h2>
                            @endif
                        </li>

                        <!-- ユーザー検索 -->
                        <li class="nav-item">
                            @if (Request::is('userSearch'))
                            <h2>User Searching</h2>
                            @endif
                        </li>

                    </ul>

                    <!-- 投稿一覧表示時 -->
                    @if (Request::is('index') || Request::is('/'))
                    <div id="search">
                        {!! Form::open(['url' => '/index']) !!}
                        {!! Form::input('text', 'postSearch', null, ['placeholder' => '投稿検索']) !!}
                        <!-- 検索ボタン -->
                        <button type="submit" name="search" class="fas fa-search">検索</button>
                        {!! Form::close() !!}
                    </div>
                    @endif

                    <!-- ユーザー検索時 -->
                    @if (Request::is('userSearch'))
                    <div id="search">
                        {!! Form::open(['url' => '/userSearch']) !!}
                        {!! Form::input('text', 'userSearch', null, ['placeholder' => 'ユーザー検索']) !!}
                        <!-- 検索ボタン -->
                        <button type="submit" name="search" class="fas fa-search">検索</button>
                        {!! Form::close() !!}
                    </div>
                    @endif




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::is('login'))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> -->
                        @endif

                        @if (Route::has('register'))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> -->
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/userProfile">プロフィール</a>
                                <a class="dropdown-item" href="/followingList">フォローリスト</a>
                                <a class="dropdown-item" href="/followedList">フォロワーリスト</a>
                                <!-- ユーザー検索画面へのリンク -->
                                <a class="dropdown-item" href="/userSearch">ユーザー検索</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- 追加 -->
    <footer>
        <small>Laravel@crud.curriculum</small>
    </footer>

</body>

</html>
