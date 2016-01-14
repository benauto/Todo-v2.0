@extends('../master')

@section('title')

@endsection

@section('contenu')

    <style>

        #taches{
            margin-top: 10px;
            border: solid;
            width: 350px;
            text-align: center;
            border-radius: 15px;
            position:center;
        }

     



    </style>



    <h2>Nom de la liste : " {{ $project->name }} "</h2><br>

    @if ( !$project->tasks->count() )
        Vous n'avez planifié aucune tâche

    @else
        <ul>
            @foreach( $project->tasks as $task )


                <!-- C'est assez spécial pour afficher ca du coup :

                 j'ouvre une form pour créer des boutons ( Form::open est une classe de laravel qui permet de créer des formes
                                  de la je crée deux boutons , et quand on clique dessus ça méne a des routes de modification / suppressions
                                    Le truc c'est qu'il faut aussi créer un submit ( sinon ca fait rien )
                                     et aussi fermer la form
                 !-->


                <div id="taches">

                <h2 style="text-decoration: underline">{{ $task->name }}</h2>

                    Description : <br><br>
                   {{ $task->description }} <br><br>


                    Etat de la tache :
                    @if( $task->completed == 1)


                  <div id="terminee" style="color:#128A42"> Terminée</div>
                    @else
                        <div style="color: #880000"> En cours</div>
                    @endif
<br>

                    Date d'échéance :
                    {{$task->dateEcheance}}<br>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
                    {!! link_to_route('projects.tasks.edit', 'Modifier', array($project->slug, $task->slug), array('class' => 'btn btn-info')) !!}
                    {!! Form::submit('Supprimer', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                    <br>


                </div>

            @endforeach
        </ul>
    @endif
    <p><br><br>


        {!! link_to_route('projects.index', 'Retour aux listes de tâche',null,array('class'=>'btn btn-info') ) !!}
        {!! link_to_route('projects.tasks.create', 'Créer une tache', $project->slug ,array('class'=>'btn btn-success') ) !!}
    </p>

@endsection