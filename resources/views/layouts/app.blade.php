<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/93f901670c.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> 
    {{-- <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script> --}}
    
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- config('app.name', 'Laravel') --}}
                    <img src="{{ asset('img/GenyParatriatlonTransparente.png') }}" alt=""> 
                </a>

{{--                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="link">
                    <a href="https://www.facebook.com/juanmanuel.geny" class="fa fa-facebook" target="new"></a>
                    <a href="http://instagram.com/juanmanuelgeny" class="fa fa-instagram" target="new"></a>
                    <a href="https://twitter.com/paratriatlon" class="fa fa-twitter" target="new"></a>
                    <a href="https://www.linkedin.com/in/jmgeny/" class="fa fa-linkedin" target="new"></a>
                    <a href="mailto:juanmanuel.geny@gmail.com"><i class="fa fa-envelope"></i></a>
                </div>

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                <div>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                        @else
                        {{-- Auth::user()->name --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                            @if (Route::has('register') and Auth::user()->name === 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="{{ url('/') }}">Inicio</a>

                  @guest
                  @else
                    <a class="nav-link" href="{{ route('misPost',Auth::user()->id) }}">Mis Post</a>
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Administrar <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('admin.categories.index') }}" class="dropdown-item"><strong>Adm. Categoria</strong></a>
                                    <a href="{{ route('admin.posts.index') }}" class="dropdown-item"><strong>Adm. Entrada</strong></a>
                                    <a href="{{ route('admin.tags.index') }}" class="dropdown-item"><strong>Adm. Etiquetas</strong></a>
                                </div>
                            </li>
                  @endguest

              </div>
            </div>
            </nav>
        </div>            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if (session('danger') or session('info'))
                    @include('admin.messages')
                    @endif

                    @if(count($errors)) 
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
            </div>

            @yield('content')
        </main>
    
    </div>


<script src="{{ asset('js/app.js') }}"></script>
 @yield('scripts')
 
</body>
</html>
