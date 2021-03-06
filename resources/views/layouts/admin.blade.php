<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    @yield("css")
    <script src="/js/jquery-3.1.1/jquery-3.1.1.min.js"></script>
    <!-- Scripts -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/vue.js"></script>

    <!-- Scripts -->
    <script>

        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>;

    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container" style="width:90%">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="/admin/blog">博客管理</a></li>
                    <li><a href="/admin/member">会员管理</a></li>
                    <li><a href="/admin/shop">商城</a></li>
                    <li><a href="/admin/setting">系统管理</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        {{--<li><a href="{{ url('/login') }}">登录</a></li>
                        <li><a href="{{ url('/register') }}">注册</a></li>--}}
                    @else
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->user_name }} <span
                                        class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-2">
        @section('left')
        @show
    </div>
    <div class="col-md-10">
        @section('content')
        @show
    </div>

    @section('modal')
    @show
</div>
@yield("js")

</body>
</html>
