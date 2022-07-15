@extends('admin.layouts.app')

@section('content')
    {{--<p>Post : {{ link_to_route('admin.posts.show', route('admin.posts.show', $post), $post) }}</p>--}}

    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' =>'PUT']) !!}
        @include('admin/posts/_form')

        <div class="pull-left">
            {{ link_to_route('admin.posts.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post], 'class' => 'form-inline pull-right', 'data-confirm' => 'delete']) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . 'Delete', ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection
