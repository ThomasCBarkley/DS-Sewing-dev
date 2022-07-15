@extends('layouts.app')

@section('content')
    <div align="center">
        @include('common.header')
    </div>
    <pool-wizard-plot :plot-id="{{$plotID}}"></pool-wizard-plot>
@endsection