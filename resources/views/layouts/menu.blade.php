<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('stories*') ? 'active' : '' }}">
    <a href="{!! route('stories.index') !!}"><i class="fa fa-edit"></i><span>Stories</span></a>
</li>



<li class="{{ Request::is('sections*') ? 'active' : '' }}">
    <a href="{!! route('sections.index') !!}"><i class="fa fa-edit"></i><span>Sections</span></a>
</li>

<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('usuarioStories*') ? 'active' : '' }}">
    <a href="{!! route('usuarioStories.index') !!}"><i class="fa fa-edit"></i><span>Usuario Stories</span></a>
</li>

