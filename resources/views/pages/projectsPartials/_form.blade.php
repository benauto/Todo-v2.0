  <!--  Ici on aura les formes pour créer des taches ou liste de tâches , on change un peu de technique
  On va utiliser des layouts qui vont changer en fonction de ce qu'on veux faire , comme ca pas besoin de coder
  a chaques fois la même chose , on utilisera un <include>      -->


<div class="form-group">
    {!! Form::label('name', 'Nom:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>


<div class="form-group">
    {!! Form::label('description', 'Description :') !!}
    <br>
    {!! Form::textarea('description') !!}
</div>


<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-info']) !!}
</div>