@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
             Sub-menu
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('stories.show_fields')
                    <a href="{!! route('stories.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
