@extends('layouts.app')
@section('robots', 'noindex,nofollow')
@section('styles', '')

@section('content')
    @include('common.header')
{{$message}}
@endsection
