@extends('layouts.app')
@section('robots', 'noindex,nofollow')
@section('meta-title', 'DS Sewing Pool Wizard Form')
@section('meta-description', 'Use this form to calculate meterials needs for your pool cover')


@section('content')
    <div align="center">
        @include('common.header')
    </div>
    <div>
        <livewire:pool-wizard />
    </div>
@endsection
