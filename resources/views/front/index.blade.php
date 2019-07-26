@extends('layouts.master')
@section('content')
@if (isset($sliders) && count($sliders) > 0 )
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="home-carousel carousel-inner">
        @foreach ($sliders as $slider)
        <div class="carousel-item padding-y-80 height-80vh @if($sliders[0] == $slider) active @endif">
            <div class="bg-absolute" data-dark-overlay="5" style="background:url('{{asset('/')}}public/images/sliders/{{$slider->image}}') no-repeat"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto  text-white">
                        <h1 class="display-lg-4 font-weight-bold text-primary animated slideInUp">
                            {{$slider->title}}
                        </h1>
                        <h4 class="display-lg-4 font-weight-bold animated slideInUp">
                            {{$slider->sub_title}}
                        </h4>
                        <p class="lead animated fadeInUp">
                            {{ strip_tags($slider->description) }}
                        </p>
                        <!-- <a href="#" class="btn btn-primary mt-3 mx-2 animated slideInUp">Learn More</a> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="ti-angle-left iconbox bg-black-0_5 hover:primary"></i>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="ti-angle-right iconbox bg-black-0_5 hover:primary"></i>
    </a>
</div>
@endif
<div id="ex1" class="modal">
    <h2> Thank You for subscribing.</h2>
    <p> That felt good.</p>
</div>
<div id="ex2" class="modal">
    <h2> Thank You for enquiry.</h2>
    <p> We will be back to you soon.</p>
</div>
@if (isset($header))
<section class="padding-y-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row align-items-center">
                    <div class="col-md-6 my-5">
                        <div class="position-relative">
                            @if ($header['image'])
                            <img class="rounded w-100" src="{{asset('/')}}public/images/cms/{{$header['image']}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <h2>
                            <small class="d-block text-gray">
                                @if ($header['title'])
                                {{$header['title']}}
                                @endif
                            </small>
                            @if ($header['sub_title'])
                            @php
                            $string = explode(" ",$header['sub_title'],2);
                            @endphp
                            <span class="text-primary">{{$string[0]}}</span>
                            @if (isset($string[1]))
                            {{$string[1]}}
                            @endif
                            @endif
                        </h2>
                        <p class="my-4">
                            @if ($header['description'])
                            {{ str_limit(strip_tags($header['description']), 250) }}
                            @endif
                        </p>
                        <a href="{{route('welcome')}}" class="btn btn-outline-primary">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-md-0">
                <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160">
                    <div class="card-header bg-primary text-white border-bottom-0">
                        <span class="lead font-semiBold text-uppercase">
                            Enquiry Form
                        </span>
                    </div>
                    <div class="p-4 border-bottom wow fadeInUp">
                        <form id="enquiry_form" name="enquiry_form">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control name" placeholder="Name" name="name">
                                <span class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control email" placeholder="Email" name="email">
                                <span class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control phone" placeholder="Phone" name="phone">
                                <span class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select data-placeholder="Select Course" class="chosen-select ec-select my_select_box course_id" id="course_id" tabindex="5" name="course_id">
                                        <option value="" selected="selected"></option>
                                        @foreach ($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select data-placeholder="Your Country" class="select ec-select country_id" tabindex="3" id="country_id" name="country_id">
                                        <option value="" selected="selected"></option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control message" placeholder="Message" name="message"></textarea>
                                <span class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mr-3 mb-3 enquiry_btn" type="button" style="float:right;">Submit</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
@endif
@if (isset($courses) && count($courses) > 0 )
<section class="padding-y-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="mb-4">
                    Courses
                </h2>
                <div class="width-3rem height-4 rounded bg-dark mx-auto"></div>
            </div>
            <div class="col-12">
                <div class="owl-carousel arrow-on-hover" data-state-outer-class="py-3" data-space="30" data-arrow="true" data-loop="true">
                    @foreach ($courses as $course)
                    <div class="card shadow-v3 hover:parent" style="min-height: 460px;">
                        @if ($course->background_image)
                        <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="">
                        @else
                        <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/accounting-2.jpg" alt="" class="img-fluid">
                        @endif
                        <div class="card-body">
                            <h4>
                                <!-- {{ str_limit($course->name, 28) }} -->
                                {{ $course->name }}
                            </h4>
                            <p class="text-primary">
                                {{$course->category->name or ''}}
                            </p>
                            <!-- <p class="mb-0">
                                {{ str_limit(strip_tags($course->description), 180) }}
                            </p> -->
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-top position-relative p-4">
                            <span class="d-inline-block bg-primary text-white px-4 py-1 rounded-pill">
                                @php
                                $string = explode(' ',$course->duration);
                                $slug = str_replace(' ', '_', $course->name);
                                @endphp
                                @if (isset($string[0]))
                                {{$string[0]}}
                                @endif
                                @if (isset($string[1]))
                                {{$string[1]}}
                                @endif
                            </span>
                            <a href="{{route('course',$slug)}}" class="position-absolute btn btn-primary btn-m left-20 hover:show">
                                View Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mt-5 text-center">
                <a href="{{route('courses')}}" class="btn btn-primary">
                    See All Courses
                </a>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
@endif
@if (isset($lc) && isset($rc))
<section style="margin-bottom: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/images/cms/{{$lc->image}}') no-repeat">
                <div class="padding-x-lg-100 wow pulse theme-color-white">
                    <h2 class="text-white mb-4">
                        {{$lc['title']}}
                    </h2>
                    <p>
                        {!!html_entity_decode($lc['description'])!!}
                    </p>
                    <!-- <a href="{{route('apply_now')}}" target="_blank" class="btn btn-white mt-4">Apply now</a> -->
                </div>
            </div>
            <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/images/cms/{{$rc->image}}') no-repeat">
                <div class="padding-x-lg-100 wow pulse theme-color-white">
                    <h2 class="text-white mb-4">
                        {{$rc['title']}}
                    </h2>
                    <p>
                        {!!html_entity_decode($rc['description'])!!}
                    </p>
                    <!-- <a href="{{route('apply_now')}}" target="_blank" class="btn btn-white mt-4">Apply now</a> -->
                </div>
            </div>
        </div>
    </div> <!-- END container-->
</section>
@endif
@if (isset($news) && count($news) > 0 )
<section class="padding-y-100 bg-light-v2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">
                    Latest AHIC News
                </h2>
                <div class="width-3rem height-4 rounded bg-dark mx-auto"></div>
            </div>
        </div> <!-- END row-->
        <div class="row mt-4">
            @foreach($news as $new)
            @php
            $date = date_create($new->date);
            $newdate = date_format($date,'M d, Y');
            $slug = str_replace(' ', '_', $new->title);
            @endphp
            <div class="col-lg-4 col-md-6 marginTop-30 wow slideInUp" data-wow-delay=".1s">
                <div class="card padding-30 shadow-v1" style="min-height: 500px !important;">
                    <p class="text-primary">
                        {{$newdate}}
                    </p>
                    <img class="card-img-top" src="{{asset('/')}}public/images/news/{{$new->image}}" alt="">
                    <a href="{{route('singleNews',$slug)}}" class="h4 mt-3">
                        {{$new->title}}
                    </a>
                    <!-- <p class="paddingTop-10">
                        {!! html_entity_decode(str_limit($new->description, 180)) !!}
                    </p> -->
                    <a href="{{route('singleNews',$slug)}}" class="btn btn-outline-primary align-self-start" style="position: absolute; bottom: 50px;">
                        Read More
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-12 mt-5 text-center">
                <a href="{{route('news')}}" class="btn btn-primary">
                    View All News
                </a>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
@endif
@if (isset($testimonials) && count($testimonials) > 0 )
<section class="bg-light testimonial-section pt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h2 class="mb-4">
                    Testimonials
                </h2>
                <div class="width-3rem height-4 rounded bg-dark mx-auto"></div>
            </div>
            <div class="col-12">
                <div class="owl-carousel arrow-on-hover front-testimonial-carousel" data-interval="5000" data-state-outer-class="py-5" data-items="1" data-space="30" data-arrow="true" data-auto-paly="false" data-loop="true">
                    @foreach ($testimonials as $testimonial)
                    <div class="card shadow-v3 hover:parent">
                        @if ($testimonial->image)
                        <img class="testimonial-img" src="{{asset('/')}}public/images/testimonials/{{$testimonial->image}}" alt="">
                        @else
                        <img class="testimonial-img" src="{{asset('/')}}public/ahic/img/360x220/accounting-2.jpg" alt="">
                        @endif
                        <div class="card-body">
                            <p class="mb-0" style="text-align: center !important;">
                                <!-- {{ str_limit(strip_tags($testimonial->description), 70) }} -->
                                " <?= strip_tags($testimonial->description); ?> "
                            </p>
                            <h4 class="text-center theme-color-red mt-3">
                                {{$testimonial->name or ''}}
                            </h4>
                            <p class="text-primary text-center">
                                {{ $testimonial->country->name }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
@endif
@if (isset($gallery) && count($gallery) > 0 )
<section class="paddingTop-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">
                    AHIC Gallery
                </h2>
                <div class="width-3rem height-4 rounded bg-dark mx-auto"></div>
            </div>
        </div> <!-- END row-->
        <div class="row marginTop-60">
            <div class="owl-carousel arrow-edge arrow-black" data-items="4" data-arrow="true" data-tablet-items="2" data-mobile-items="1">
                @foreach($gallery as $image)
                <div class="hover:parent  bg" style="background:url('{{asset('/')}}public/images/gallery/{{$image->image}}')">
                    <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                        <a href="{{asset('/')}}public/images/gallery/{{$image->image}}" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
@endif
@endsection
@section('style')
<style media="screen">
    .z-index-5 {
    z-index: 1;
  }
  .owl-carousel{
  }
  .bg{
    height:300px;
    width:100%;
    background-size: cover !important;
    background-position: center !important;
  }
  .error.text-danger{
    font-size:15px !important;
  }
  .testimonial-img {
    /*width:70% !important;*/
    margin:0px auto !important;
    padding:20px;
    border-radius: 50%;
    z-index: 999 !important;
  }
</style>
@endsection
@section('script')
<script type="text/javascript">
// process enq
$(function() {
  $(".front-testimonial-carousel").carousel({
    interval : 30000,
    pause: "hover",
    stopOnHover : true
  });
});
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
$('.enquiry_btn').click(function(event) {
    $(this).parent().parent().find('.error').each(function() {
        $(this).text(' ');
    })
    event.preventDefault();
    var form = $('#enquiry_form');
    var formData = form.serializeArray();
    var url = "{{route('enquiry')}}";
    //enquiry succcesss
    $.post(url, formData)
        .done(function(data) {
            $('#ex2').modal({
                fadeDuration: 250
            });
            $(document).click(function() {
                form.trigger('reset');
                location.reload();
            })

        })
        .fail(function(xhr, status, error) {
            jQuery.each(xhr.responseJSON.errors, function(key, value) {
                $("." + key).parent().find('.error').text(value);
            });
        });
});
</script>
@endsection