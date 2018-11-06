<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
</div>


<!-- Id Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_category', 'Menu:') !!}
    {!! Form::select('id_category', $categories, null, ['class' => 'form-control', 'required' => '']) !!}
</div>



<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Photo:') !!}
    {!! Form::file('url', null, ['class' => 'form-control', ['required']]) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stories.index') !!}" class="btn btn-default">Cancel</a>
</div>
