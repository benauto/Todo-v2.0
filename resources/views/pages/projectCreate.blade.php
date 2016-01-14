@extends('../master')

@section('title')
    <h1>Créer une liste de tâche </h1>
@endsection

@section('contenu')

    <div style="margin-left: 5%">

    {!! Form::model(new App\Project, ['route' => ['projects.store']]) !!}
    @include('pages/projectsPartials/_form', ['submit_text' => 'Créer une liste'])
    {!! Form::close() !!}

    </div>

@endsection