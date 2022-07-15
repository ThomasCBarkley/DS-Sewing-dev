@extends('layouts.app')
@section('robots', 'noindex,nofollow')
@section('styles', '')

@section('content')
    @include('common.header')
Order with id {{$orderId}} does not exist.
@endsection
