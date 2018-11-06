<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Menu</span></a>
</li>

<li class="{{ Request::is('stories*') ? 'active' : '' }}">
    <a href="{!! route('stories.index') !!}"><i class="fa fa-edit"></i><span>Sub-menu</span></a>
</li>



<li class="{{ Request::is('sections*') ? 'active' : '' }}">
    <a href="{!! route('sections.index') !!}"><i class="fa fa-edit"></i><span>Contenido</span></a>
</li>

