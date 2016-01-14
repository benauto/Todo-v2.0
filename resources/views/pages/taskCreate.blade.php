@extends('../master')

@section('title')
    <h1>Créer une tâche dans la liste "{{$project->name}}" </h1>
@endsection

@section('contenu')

    <div style="margin-left: 5%">

    {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'class'=>'']) !!}
    @include('pages/tasksPartials/_form', ['submit_text' => 'Créer une tâche'])
    {!! Form::close() !!}



@endsection