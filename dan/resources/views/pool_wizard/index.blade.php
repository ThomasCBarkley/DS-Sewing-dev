@extends('layouts.app')

@section('content')
    <div align="center">
        @include('common.header')
    </div>
    <div>
        <livewire:pool-wizard />
    </div>
@endsection