@extends('../master')

@section('title')
    <h1>Modifier  "{{$task->name}}" </h1>
@endsection

@section('contenu')

    <div style="margin-left: 5%">

    {!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug]]) !!}
    @include('pages/tasksPartials/_form', ['submit_text' => 'Appliquer modifications'])
    {!! Form::close() !!}



@endsection