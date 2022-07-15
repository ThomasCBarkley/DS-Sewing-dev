@extends('layouts.app')
<style>
    table.servicesT
    { font-family: Verdana;
        font-weight: normal;
        font-size: 10pt;
        width: 320px;
        background-color: #ffcc66;
        border-collapse: collapse;
        border-spacing: 0px;
        margin-top: 1px;
        margin-left: 5px;
        margin-right: 5px;
        margin-top: 1px;
    }


    table.servicesT td.servHd
    { border-bottom: 1px solid #6699CC;
        border-top: 1px solid #6699CC;
        background-color: #BEC8D1;
        font-family: Verdana;
        font-weight: bold;
        font-size: 10pt;
    }


    table.servicesT td
    {
        font-family: Verdana, sans-serif, Arial;
        font-weight: normal;
        font-size: 10pt;
        background-color: #ffffcc;
        /* text-align: left; */
        padding-left: 3px;}


    table.servicesT td.servBodH
    { border-top: 1px solid #6699CC;
        border-bottom: 1px solid #6699CC;
        background-color: #BEC8B1;
        /* text-align: center; */
        font-family: Verdana;
        font-weight: bold;
        font-size: 10pt;
        color: #404040;}
</style>


@section('content')
    <div align="center">
        @include('common.header')
    </div>
    <div>
        <livewire:pool-wizard-finish />
    </div>
@endsection