@extends('layouts.app')

        <title>BDE Website</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('/css/main.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div>
                <img src="{{URL::asset('/img/logo.png')}}" alt="BDE Picture" height="160" width="180" />
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/post') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Welcome
                </div>

                <div class="subtitle">
                    on the BDE's Website
                </div>
            </div>
            <div class="logo-exia">
                <img src="{{URL::asset('/img/logo-exia.png')}}" alt="EXIA Picture" style="-webkit-filter: grayscale(20%); filter: grayscale(20%);" height="120" width="160" />
            </div>
        </div>
    <footer>
        <p>Copyright &copy; BDE eXia - <?php echo date('Y'); ?></p>
    </footer>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="{{ URL::to('src/js/app.js') }}"></script>
    </body>
</html>
