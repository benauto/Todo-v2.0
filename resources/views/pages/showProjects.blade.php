@extends('../master')

@section('title')
    <h1> </h1>
@endsection

@section('contenu')


    <style>

        #liste{
            margin-top: 10px;
            border: solid;
            width: 350px;
            text-align: center;
            border-radius: 15px;
            position:center;
        }

        #plusbo{

            margin-left: 5%
        }





    </style>


    <h2>Listes</h2>

    @if ( !$projects->count() )
       Vous n'avez aucune Liste
    @else
        <ul>
            @foreach( $projects as $project )

                <div id="liste">


                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}


                    <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}<br>( cliquer pour afficher ) </a>
                    <br><br>
                    Créé le :<br>
                    {{$project->created_at}}
                    <br>
                    <br>
                    Description :
                    {{ $project->description }} <br>
                    <br>
                    <br>
                    <?php
                    $compteur = 0
                    ?>
                    @foreach( $project->tasks as $task )
                        @if( $task->completed == 1)
                            <?php
                            $compteur++
                            ?>
                        @endif
                    @endforeach
                    Tâches accomplies:
                    {{$compteur}}/{{$project->tasks->count()}}

                    <br>
                    <br>



                    {!! link_to_route('projects.edit', 'Modifier', array($project->slug), array('class' => 'btn btn-info')) !!}
                    {!! Form::submit('Supprimer', array('class' => 'btn btn-danger')) !!}


                    {!! Form::close() !!}
                    <br>

                </div>
            @endforeach
        </ul>
    @endif

    <p id="plusbo">




        {!! link_to_route('projects.create', 'Créer une liste',null,array('class'=>'btn btn-success') ) !!}



    </p>


@endsection