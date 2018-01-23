<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{URL::asset('image/logo.png')}}" />
    <title>BLKI SAMARINDA</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{URL::asset('image/logo.png')}}" height="40" width="40">
                    </a>
                    
                    <!-- Branding Image -->
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Login <span class="caret"></span>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{route('login')}}">Login as UPTD</a></li>
                                        <li><a href="{{route('admin.login')}}">Login as Admin</a></li>
                                    </ul>
                                </a>
                            
                        </li>
                        
                        @elseif (Auth::guard('web')->check())
                            <li><a href=" {{ route('home')}}">Dashboard</a></li>
                            <li><a href=" {{ route('profile')}}">Profile</a></li>
                            <li><a href="{{route('uptd.renlakgiat')}}">Data Renlakgiat</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                @if(DB::table('profils')->where('users_id','=',Auth::user()->id)->count() > 0)
                                   <li>
                                        @foreach(DB::table('profils')->where('users_id','=',Auth::user()->id)->get() as $data)
                                            <a href="{{ url('/profile/edit/'.$data->id) }}"><i class="material-icons">person</i> edit</a>
                                        </li>
                                        @endforeach
                                @else
                                        <li>
                                            <a href="{{url('profile/tambah')}}"><i class="material-icons">person</i>Tambah Profile</a>
                                        </li>
                                @endif
                                    <li>
                                       <a href="{{route('user.logout')}}"><i class="material-icons">power_settings_new</i> Logout</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        @elseif(Auth::guard('admin')->check())
                        
                        <!-- floating icon  -->
                        <div class="fixed-action-btn vertical click-to-toggle">
                                <a class="btn-floating btn-large red">
                                  <i class="material-icons">menu</i>
                                </a>
                                <ul>
                                  <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                                  <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                                  <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                                  <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                                </ul>
                              </div>
                             
                            <li><a href=" {{ route('admin')}}">Dashboard</a></li>
                            <li><a href="{{route('admin.renlakgiat')}}">Data Renlakgiat</a></li>
                            <li><a href="{{route('admin.user')}}">Data User</a></li>
                            <li><a href="{{route('admin.profile')}}">Data UPTD</a></li>
                           
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('admin.logout')}}"><i class="large material-icons">power_settings_new</i> Logout</a>
                                    </li>
                                </ul>
                            </li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>
