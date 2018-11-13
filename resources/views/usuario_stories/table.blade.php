<table class="table table-responsive" id="usuarioStories-table">
    <thead>
        <tr>
            <th>Id Usuario</th>
        <th>Id Story</th>
        <th>Comentario</th>
        <th>State</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuarioStories as $usuarioStory)
        <tr>
            <td>{!! $usuarioStory->id_usuario !!}</td>
            <td>{!! $usuarioStory->id_story !!}</td>
            <td>{!! $usuarioStory->comentario !!}</td>
            <td>{!! $usuarioStory->state !!}</td>
            <td>
                {!! Form::open(['route' => ['usuarioStories.destroy', $usuarioStory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usuarioStories.show', [$usuarioStory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('usuarioStories.edit', [$usuarioStory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>