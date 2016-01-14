@extends('../master')

@section('contenu')


    <style>@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        *{margin:0;padding:0;}
        body{
            background:#567;
            font-family:'Open Sans',sans-serif;
        }

        #login{
            width:400px;
            margin:0 auto;
            margin-top:8px;
            margin-bottom:2%;
            transition:opacity 1s;
            -webkit-transition:opacity 1s;
        }


        #login h1{
            background:#3399cc;
            padding:20px 0;
            font-size:140%;
            font-weight:300;
            text-align:center;
            color:#fff;
        }

        form{
            background:#f0f0f0;
            padding:6% 4%;
        }

        input[type="email"],input[type="password"]{
            width:92%;
            background:#fff;
            margin-bottom:4%;
            border:1px solid #ccc;
            padding:4%;
            font-family:'Open Sans',sans-serif;
            font-size:95%;
            color:#555;
        }

        input[type="text"]{
            width:92%;
            background:#fff;
            margin-bottom:4%;
            border:1px solid #ccc;
            padding:4%;
            font-family:'Open Sans',sans-serif;
            font-size:95%;
            color:#555;
        }

        input[type="submit"]{
            width:100%;
            background:#3399cc;
            border:0;
            padding:4%;
            font-family:'Open Sans',sans-serif;
            font-size:100%;
            color:#fff;
            cursor:pointer;
            transition:background .3s;
            -webkit-transition:background .3s;
        }

        input[type="submit"]:hover{
            background:#2288bb;
        }

    </style>

    <!--  Directement venu de la documentation de laravel       -->


    <!--
     va compter toutes les erreurs lors de l'enregistrement et les afficher
        Si 3 erreurs : Affiche 3 lignes
     !-->

    @if (count($errors) > 0)
        <div style="color: #080808">
            Il y a eu un problème lors de la création du compte
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li>
                @endforeach </ul>
        </div>
        @endif

    <!-- resources/views/auth/register.blade.php -->

    <form method="POST" action="/auth/register" id="login">
        {!! csrf_field() !!}

        <div>
            Nom<br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            Mot de passe
            <input type="password" name="password">
        </div>

        <div>
            Confirmation mot de passe
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>

@endsection