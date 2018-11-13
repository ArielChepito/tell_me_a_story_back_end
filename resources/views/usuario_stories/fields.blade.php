<!-- Id Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
    {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Story Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_story', 'Id Story:') !!}
    {!! Form::number('id_story', null, ['class' => 'form-control']) !!}
</div>

<!-- Comentario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::number('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('usuarioStories.index') !!}" class="btn btn-default">Cancel</a>
</div>
