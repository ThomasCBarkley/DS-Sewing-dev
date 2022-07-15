@extends('layouts.app')

@section('content')
    <div class="container mt-0 mb-0 pt-0">
        <div class="row">
            @include('common.header')
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center text-center">
                {{--@include ('posts/_search_form')--}}
                <div class="bg-white custom-container">
                    <h2 class="page-title">
                        <strong>
                        @if (request()->has('q'))
                            {{ trans_choice(':count post found|No posts found', $posts->count(), ['query' => request()->input('q')]) }}
                        @else
                            Truck Tarps and Covers Newsletter
                        @endif
                        </strong>
                    </h2>
                    <div class="content-top">
                        <h4>
                            <strong>
                            DS Sewing Index Of Articles
                            </strong>
                        </h4>
                    </div>
                    <div class="post-content text-lg-start">
                        <div class="inner">
                            @include ('posts/_list')
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
