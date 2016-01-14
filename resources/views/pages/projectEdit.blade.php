@extends('../master')

@section('title')
    <h1>Modifier la liste "{{$project->name}}"</h1>
@endsection

@section('contenu')

    <div style="margin-left: 5%">

    {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]]) !!}
    @include('pages/projectsPartials/_form', ['submit_text' => 'Appliquer modifications'])
    {!! Form::close() !!}



@endsection