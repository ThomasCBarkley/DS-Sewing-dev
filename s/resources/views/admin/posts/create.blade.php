@extends('admin.layouts.app')

@section('content')
    <h1>Post create</h1>

    {!! Form::open(['route' => ['admin.posts.store'], 'method' =>'POST']) !!}
        @include('admin/posts/_form')

        {{ link_to_route('admin.posts.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
