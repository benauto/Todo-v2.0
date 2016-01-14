<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>


<body style="padding-top: 50px;">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >Projet Todo</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('master')}}" style="background-color: inherit;">Home</a></li>

                @if(Auth::check())

                    <li><a href="{{route('projects')}}">Liste des taches</a></li>
                   <li><a href="{{route('logout')}}">Se deconnecter</a></li>
                @endif

                <li><a href="{{route('infos')}}">A propos</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>



@if(Auth::check())
    Bonjour {{ Auth::user()->name  }}
@endif




<di class="container">

    <div class="starter-template" style="padding-top: 40px;">
        @yield('title')
        @yield('contenu')



        <br>
    </div>

</di>

<div class="message">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif

        @if ($errors->any())
            <div class='flash alert-danger'>
                @foreach ( $errors->all() as $error )
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

</div>



</body>
</html>