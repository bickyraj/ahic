@extends('layouts.master')
@section('style')
<style media="screen">
.py-5.bg-cover {
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position: center;
    background-size: cover;
}
</style>
@endsection
@section('content')
<div class="py-5 bg-cover text-white" data-dark-overlay="5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>AHIC News</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        AHIC News
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="pt-5 paddingBottom-100 bg-light-v2">
    <div class="container">
        <div class="row">
            @forelse($news as $new)
            @php
            $date = date_create($new->date);
            $newdate = date_format($date,'M d, Y');
            $slug = str_replace(' ', '_', $new->title);
            @endphp
            <div class="col-lg-4 col-md-6 marginTop-30">
                <div class="card shadow-v3">
                    <img class="card-img-top" src="{{asset('/')}}public/images/news/{{$new->image}}" src="assets/img/newsDetail/1.jpg" alt="">
                    <div class="card-body theme-course-card-body">
                        <div class="theme-ribbon-right"></div>
                        <h4>
                            {{ $new->title }}
                        </h4>
                        <!-- <a href="{{route('singleNews',$slug)}}" class="h6 mb-3"> -->
                            <!-- {{$new->title}} -->
                        <!-- </a> -->
                        <!-- <p class="mb-0">
                            {!! html_entity_decode($new->description) !!}
                        </p> -->
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-top position-relative p-4">
                        <div class="theme-ribbon-bottom-left"></div>
                        <span class="d-inline-block px-4 py-1">
                            <i class="far fa-calendar" style="color: #a7a7a7;"></i> 
                            {{$newdate}}
                        </span>
                        <a href="{{route('singleNews',$slug)}}" class="btn btn-primary btn-sm left-20">
                            Read More
                        </a>
                    </div>
                    <!-- <div class="card-footer">
                        <div class="media">
                            <img class="iconbox" src="assets/img/avatar/4.jpg" alt="">
                            <div class="media-body ml-4">
                                <a href="#" class="text-primary">Alex</a> <br>
                                {{$newdate}}
                                - <a href="#" class="text-primary">in Design</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            @empty
            <h3> No News Available At The Moment</h3>
            @endforelse
            <!-- <div class="col-12 marginTop-70">
            <ul class="pagination pagination-primary align-items-center justify-content-center">
            <li class="page-item mx-2">
            <a href="#">
            <i class="ti-arrow-left small mr-2"></i>
            Previous
            </a>
            </li>
            <li class="page-item mx-2 font-weight-bold">2/45</li>
            <li class="page-item mx-2">
            <a href="#">
            Next
            <i class="ti-arrow-right small ml-2"></i>
            </a>
            </li>
            </ul>
            </div> -->
        </div>
        <!--END row-->
    </div> <!-- END container-->
</section>
@endsection