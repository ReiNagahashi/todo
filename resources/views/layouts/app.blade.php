<!DOCTYPE html>
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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index')}}">Index</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('todos')}}">Todos</a>
                        </li>
                        {{-- ここのAuth　checkのブランケットの中に入れてあげることでここだ
                            けをすでにログインし他人だけに見せるようにすることがdケイル --}}
                        @if(Auth::check())
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('todos.create')}}">New-Todos</a>
                        </li>
                        <li class="nav-item">
                            {{-- 上のroute以外に下のようなURLをはる手法がある ここのURlはweb.bladeのURLtピッチさせる必要がある --}}
                            <a class="nav-link" href="/settings">Settings</a>
                        </li>
                        @endif
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- ここで使われるブートストラップも含めて他のセクション全てに影響することができる！！例えばrowとかcol-md8とか！！ --}}
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- flashメソッドは各セクション全てが使う処理なのでここで定義をしている　？？　そうだよね。。。 --}}
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{-- ここのsuccess（名前）はflashメソッド実行するときの名前と一致させなければならない --}}
                    {{session()->get('success')}}
                </div>
            @endif
            {{-- ブラウザの基盤となるcontentをここで引き継いでいる 引き継ぎ方が大元だけ違うことがお分かりいただけるだろうか --}}
            @yield('content')
        </div>
    </div>
</body>
</html>
