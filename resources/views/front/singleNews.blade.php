@extends('layouts.master')
@section('style')
<style media="screen">
    .py-5.bg-cover{
    background:url('{{asset('/')}}public/images/courses/default-bg.png') no-repeat;
    background-position:center;
    background-size:cover;
  }
</style>
@endsection
@section('content')
<div class="site-search">
    <div class="site-search__close bg-black-0_8"></div>
    <form class="form-site-search" action="#" method="POST">
        <div class="input-group">
            <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
            </div>
        </div>
    </form>
</div> <!-- END site-search-->
<div class="py-5 bg-cover text-white" data-dark-overlay="5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>
                    {{$news->title}}
                </h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('news')}}"> News</a>
                    </li>
                    <li class="breadcrumb-item">
                        {{$news->title}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="pt-5 paddingBottom-150 bg-light-v2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mt-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('/')}}public/images/news/{{$news->image}}" src="assets/img/newsDetail/1.jpg" alt="">
                    <div class="card-body">
                        <h2 class="my-4">
                            {{$news->title}}
                        </h2>
                        <div class="media align-items-center justify-content-between mb-5">
                            <div class="media align-items-center">
                                @php
                                $date = date_create($news->date);
                                $newdate = date_format($date,'M d, Y');
                                @endphp
                                <!-- <img class="iconbox mr-3" src="assets/img/avatar/1.jpg"> -->
                                <div class="media-body">
                                    <!-- <a class="text-primary" href="#">Alex</a> -->
                                    {{$newdate}}
                                    <!-- <a class="text-primary" href="#"> in Programming </a> -->
                                </div>
                            </div>
                            <!-- <div class="text-gray">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti-eye mr-1"></i> 2788
                                </span>
                                <span class="d-inline-flex align-items-center ml-2"> <i class="ti-heart mr-1"></i> 88 </span>
                            </div> -->
                        </div>
                        {!! html_entity_decode($news->description) !!}
                        <div class="row align-items-center mb-5">
                            <div class="col-md-6  mt-5 text-right">
                                <div class="animated-share" data-href="{{Request::url()}}">
                                    <!-- <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="btn btn-outline-facebook iconbox iconbox-sm">
                                        <i class="ti-facebook"></i>
                                    </a> -->
                                    <div class="fb-share-button pull-right " data-href="{{Request::url()}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END card-body-->
            </div> <!-- END card-->
            <aside class="col-lg-3 mt-4">
                <div class="widget">
                    <h2 class="widget-title">
                        Latest News
                    </h2>
                    @foreach($latest as $recent)
                    @php
                    $slug = str_replace(' ', '_', $recent->title);
                    @endphp
                    <div class="mb-4">
                        <a href="#">
                            <img src="{{asset('/')}}public/images/news/{{$recent->image}}" alt="">
                        </a>
                        <h2 class="font-size-16 mt-2">
                            <a href="{{route('singleNews',$slug)}}">
                                {{$recent->title}}
                            </a>
                        </h2>
                    </div>
                    @endforeach
                </div> <!-- END widget-->
            </aside> <!-- END col-lg-3 -->
        </div> <!-- END col-lg-9 -->
    </div> <!-- END row-->
</section> <!-- END section -->
@endsection