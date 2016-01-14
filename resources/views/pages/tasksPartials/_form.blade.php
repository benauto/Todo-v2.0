  <!--  Ici on aura les formes pour créer des taches ou liste de tâches , on change un peu de technique
  On va utiliser des layouts qui vont changer en fonction de ce qu'on veux faire , comme ca pas besoin de coder
  a chaques fois la même chose , on utilisera un <include>      -->


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
    $(function () {
        $( "#datepicker" ).datepicker();
    });
</script>

<div class="form-group">
    {!! Form::label('name', 'Nom de la tâche:') !!}<br>
    {!! Form::text('name') !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}<br>
    {!! Form::text('slug') !!}
</div>

<div class="form-group">
    {!! Form::label('completed', 'Est-elle complétée ?  ') !!}<br>
    {!! Form::checkbox('completed') !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}<br>
    {!! Form::textarea('description') !!}
</div>



<div class="form-group">
    {!! Form::label('dateEcheance', 'Date d\'échéance:') !!}<br>
    {!! Form::input('text','dateEcheance',null,['id'=>'datepicker']) !!}
</div>



<div class="form-group">

    {!! Form::submit($submit_text, ['class'=>'btn btn-info']) !!}
</div>


