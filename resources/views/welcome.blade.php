<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- REFERENCEMENT -->
        <meta name="author" content="BDE Nancy" />
        <meta name="description" content="This website is used by the members of the BDE exia. It helps to get informations about events, food, etc..." />
        <meta name="keywords" content="BDE, Nancy, exia, cesi, informatique, IT, ingenieur, engineer, school, students" />


        <title>BDE Website</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('/css/main.css')}}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div>
                <img src="{{URL::asset('/img/logo.png')}}" alt="BDE Picture" height="160" width="180" />
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
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
