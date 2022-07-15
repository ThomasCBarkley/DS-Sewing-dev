@extends('layouts.app')
@section('meta-title', 'Checkout - D. S. Sewing')
@section('robots', 'noindex,nofollow')
@section('styles', '')

@section('content')
@include('common.header')

<form method="post" action="{{$nextStepUrl}}" enctype="multipart/form-data">
    @csrf
    <table cellspacing="6" border="0">
        <tbody>
        <tr>
    @include('checkout.parts.sidebar', ['currentStep' => $currentStep])
    @include('checkout.steps.step'.$currentStep)
        </tr>
        </tbody>
    </table>
</form>
@endsection
