@extends('layouts.app')
@include('posts._meta')
@section('content')
    <div class="container mt-0 mb-0 pt-0">
        <div class="row">
            @include('common.header')
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center text-center">

                <div class="bg-white custom-container">
                    <h2 class="page-title">
                        Truck Tarps and Covers Newsletter
                    </h2>
                    {!! humanize_date($post->publish_at, 'd F Y') !!}
                    <div class="content-top">
                        <h4>
                                {{ $post->title }}
                        </h4>
                    </div>

                    <div class="post-content text-lg-start">
                        <div class="inner">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @include('common.footer')
        </div>
    </div>
@endsection
