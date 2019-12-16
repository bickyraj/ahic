@extends('layouts.master')
@section('content')
<style> .heroBannerTextAdded p { line-height: 40px !important; font-weight: bolder !important; color: #f4f60b;   } </style>
<?php //print_r($sliders);die(); ?>
@if (isset($sliders) && count($sliders) > 0 )
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="home-carousel carousel-inner">
        @foreach ($sliders as $slider)
        <div class="carousel-item padding-y-20 height-60vh @if($sliders[0] == $slider) active @endif">
            <div class="bg-absolute" data-dark-overlay="5" style="background:url('{{asset('/')}}public/images/sliders/{{$slider->image}}') no-repeat"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto  text-white paddingTop-30">
                         <h1 class="display-lg-6 font-weight-bold animated slideInUp heroBannerTextAdded">
                            {{-- {{$slider->title}} --}}
                            <?= $slider->description; ?>
                        </h1>
                        <h4 class="display-lg-4 font-weight-bold animated slideInUp">
                            {{-- {{$slider->sub_title}} --}}
                        </h4>
                        <p class="lead animated fadeInUp">
                            {{-- {{ strip_tags($slider->description) }} --}}
                             <!-- <?= $slider->description; ?>  -->
                        </p>
                        @if(isset($slider->link) && !empty($slider->link))
                            <a href="{{ $slider->link }}" class="btn btn-primary mt-3 mx-2 slider-link-button">Learn More</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="sub-banner">
        Harbour College <i class="fas fa-angle-double-right"></i> Where Seekers Become Achievers
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
@if(isset($courses_categories) && !empty($courses_categories))
<section class="padding-y-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Explore Our Cources & Programs</h3>
                <div class="row programs-block">
                    @foreach($courses_categories as $category)
                        <div class="col-lg-6 col-md-6 col-xs-12 text-center">
                            <a href="{{ $category['link'] }}" class="program">
                                <img src="{{ url('/public/img/testimonial-bg.jpg') }}" alt="">
                                <div class="layout">
                                    <div class="title">
                                        <h2>{{ $category['name'] }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- courses module -->
@if (isset($courses) && count($courses) > 0 )
<section class="padding-y-30 bg-light bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h3 class="text-center mb-2 new-heading-underline"><span>Courses</span></h3>
                {{-- <div class="ribbon">
                    Courses
                  <i></i>
                  <i></i>
                  <i></i>
                  <i></i>
                </div> --}}
                {{-- <div class="width-3rem height-4 rounded bg-dark mx-auto"></div> --}}
            </div>
            <div class="col-12">
                <div class="owl-carousel arrow-on-hover" data-state-outer-class="py-3" data-space="30" data-arrow="true" data-loop="true">
                    @foreach ($courses as $course)
                    <div class="card shadow-v3 hover:parent">
                        @if ($course->background_image)
                        <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="">
                        @else
                        <img class="card-img-top" src="{{asset('/')}}public/front/img/360x220/accounting-2.jpg" alt="" class="img-fluid">
                        @endif
                        <div class="card-body theme-course-card-body">
                            <div class="theme-ribbon-right"></div>
                            <h4>
                                <!-- {{ str_limit($course->name, 28) }} -->
                                {{ $course->name }}
                            </h4>
                            <p class="text-primary">
                              {{$course->cricos_code or 'Cricos Code'}}
                            </p>
                            <!-- <p class="mb-0">
                                {{ str_limit(strip_tags($course->description), 180) }}
                            </p> -->
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-top position-relative p-4">
                            <div class="theme-ribbon-bottom-left"></div>
                            <span class="d-inline-block px-4 py-1">
                                <i class="far fa-clock" style="color: #a7a7a7;"></i>
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
                            <a href="{{route('course',$slug)}}" class="btn btn-primary btn-sm left-20">
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

<section class="padding-y-30 enroll-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center mb-5 heading-underline">Know more to Enroll in Harbour College</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12 home-enroll-block-1">
                        <h4>Study in Sydney CBD</h4>
                        <hr class="mt-2">
                        <p>
                            Australia is a top destination for many international students. Overseas students love our Aussie sun, summer barbeques and our laid-back, relaxed lifestyle. The jewel in Australia’s crown is without question our beloved city of Sydney, which is (in our opinion) the most enjoyable city in the world.
                        </p>
                        <p>You really should do yourself a favour and choose Sydney because:</p>
                        <p>
                            Sydney enjoys a temperate climate with warm summers and mild winters. That means that you’ll get many opportunities to go out and explore the city.
                        </p>
                        <p>
                            Sydney is by far the most celebrated city in Australia and the home of many world-famous attractions. Sydney Opera House, Bondi Beach, The Rocks, Sydney Harbour Bridge, Sydney Harbour, Paddy’s Markets, Darling Harbour, the Blue Mountains and so much more… – these are all here for you to enjoy.
                        </p>
                        <a href="" class="btn btn-primary mt-3 mx-2 theme-link-btn">Learn More</a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-xs-12 home-enroll-block-2">
                        <h4><strong>Why Study in AHIC?</strong></h4>
                        <div class="row">
                            @if($ahic_studies)
                                @foreach($ahic_studies as $study)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <a href="{{ $study['link'] }}">
                                        <div class="media">
                                            <div class="icon mr-3">
                                                <i class="fas fa-users"></i>
                                            </div>
                                          <div class="media-body">
                                            <h6 class="mt-0 mb-0"><strong>{{ $study['title'] }}</strong></h6>
                                            <?= $study['description']; ?>
                                          </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- next orientation -->
<section class="padding-y-30 orientation-block  bg-light">
    <div class="container">
        <div class="row">
            <h3>Next Orientation</h3>
            <div class="col-lg-12">
                <div class="row orientation-row">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="orientation-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="orientation-list">Next Orientation:</div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="orientation-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="orientation-list">
                            When
                            <br>
                            <br>
                            Date: 19 Oct 2019
                            <br>
                            <br>
                            Time:
                            <br>
                            Additional:
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="orientation-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="orientation-list">
                            Where
                            <br>
                            <br>
                            Date: 19 Oct 2019
                            <br>
                            <br>
                            College Address
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="orientation-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="orientation-list" style="width: 207px;">
                            Info
                            <br>
                            <br>
                            Bring your 
                            <br>
                            Necessary Documents at the time of enrolment.
                            <br>
                            <br>
                            See orientation Staff to assist you.
                            <br>
                            <a href="" class="btn btn-xs btn-primary mt-3 theme-link-btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of next orientation -->
<!-- principle message and enquiry form -->
@if (isset($header))
<!-- <section class="padding-y-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row align-items-center">
                    {{-- <div class="col-md-6 my-5">
                        <div class="position-relative">
                            @if ($header['image'])
                            <img class="rounded w-100" src="{{asset('/')}}public/images/cms/{{$header['image']}}" alt="">
                            @endif
                        </div>
                    </div> --}}
                    <div class="col mt-1">
                        <h2>
                            <small class="d-block" style="color: #ae0303;">
                                @if ($header['title'])
                                {{$header['title']}}
                                @endif
                            </small>
                            @if ($header['sub_title'])
                            <span class="text-primary">{{ $header['sub_title'] }}</span>
                            @endif
                        </h2>
                        <p class="my-4">
                            @if ($header['description'])
                            {{-- {{ str_limit(strip_tags($header['description']), 500) }} --}}
                            <?= $header['description']; ?>
                            @endif
                        </p>
                        {{-- <a href="{{route('welcome')}}" class="btn btn-outline-primary">
                            Read More
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-md-0">
                <div class="card shadow-v2 z-index-5" data-offset-top-xl="-83">
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
    <!-- </div>  END container
</section> -->
@endif

<!-- two block module -->
@if (isset($lc) && isset($rc))
<!-- <section>
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
                    <a href="{{route('apply_now')}}" target="_blank" class="btn btn-white mt-4">Apply now</a> -->
                <!-- </div>
            </div>
            <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/images/cms/{{$rc->image}}') no-repeat">
                <div class="padding-x-lg-100 wow pulse theme-color-white">
                    <h2 class="text-white mb-4">
                        {{$rc['title']}}
                    </h2>
                    <p>
                        {!!html_entity_decode($rc['description'])!!}
                    </p> -->
                    <!-- <a href="{{route('apply_now')}}" target="_blank" class="btn btn-white mt-4">Apply now</a> -->
               <!--  </div>
            </div>
        </div>
    </div>  END container-->
<!-- </section> --> 
@endif
<!-- Testimonial Module -->
@if (isset($testimonials) && !empty($testimonials))
<?php 
    // echo "<pre>";
    // print_r($testimonials);
    // die('h');
 ?>
<section class="padding-y-30 testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h4 class="mb-2 home-h2 text-black">
                    Testimonials
                </h4>
                {{-- <div class="width-3rem height-4 rounded bg-dark mx-auto"></div> --}}
            </div>
            <div class="col-12">
                <div class="owl-carousel arrow-on-hover front-testimonial-carousel" data-autospeed="5000" data-state-outer-class="py-3" data-items="1" data-space="30" data-autoplay="true" data-autoplayhoverpause="true" data-arrow="true" data-loop="true">
                    @foreach ($testimonials as $testimonial)
                    <div class="card shadow-v3 hover:parent">
                        @if ($testimonial['image'])
                        <img class="testimonial-img" src="{{asset('/')}}public/images/testimonials/{{$testimonial['image']}}" alt="">
                        @else
                        <img class="testimonial-img" src="{{asset('/')}}public/front/img/360x220/accounting-2.jpg" alt="">
                        @endif
                        <div class="card-body">
                            <p class="mb-0" style="text-align: center !important;">
                                <!-- {{ str_limit(strip_tags($testimonial['description']), 70) }} -->
                                " <?= strip_tags($testimonial['description']); ?> "
                            </p>
                            <p class="text-center mt-3">{{$testimonial['name'] or ''}}</p>
                            {{-- <p class="text-primary text-center">
                                {{ $testimonial['country']['name'] }}
                            </p> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
@endif
<!-- News Module -->
@if (isset($news) && count($news) > 0 )
<section class="padding-y-30 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                {{-- <h2 class="mb-2 home-h2">
                    Latest AHIC News
                </h2> --}}
                <h3 class="text-center mb-2 new-heading-underline"><span>News and Events</span></h3>
                
                {{-- <div class="ribbon">
                    News and Events
                  <i></i>
                  <i></i>
                  <i></i>
                  <i></i>
                </div> --}}
                {{-- <div class="width-3rem height-4 rounded bg-dark mx-auto"></div> --}}
            </div>
        </div> <!-- END row-->
        <div class="row mt-4">
            @foreach($news as $new)
            <?php 
                // echo "<pre>";
                // print_r($new);

             ?>
            @php
            $date = date_create($new->date);
            $newdate = date_format($date,'M d, Y');
            $slug = str_replace(' ', '_', $new->title);
            @endphp
            <div class="col-lg-4 col-md-6 marginTop-30 wow slideInUp" data-wow-delay=".1s">
                <div class="card padding-10 shadow-v1 theme-news-card" style="min-height: 400px !important;">
                    <img class="card-img-top" src="{{asset('/')}}public/images/news/{{$new->image}}" alt="">
                    <a href="{{route('singleNews',$slug)}}" class="h4 mt-3">
                        <b>{{$new->title}}</b>
                    </a>
                    <p class="news-description">
                        <?= substr(strip_tags($new->description), 0, 180); ?>
                    </p>
                    <a href="{{route('singleNews',$slug)}}" class="btn align-self-start news-btn" style="position: absolute; bottom: 10px;">
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

<!-- @if (isset($gallery_category) && count($gallery_category) > 0)
<section class="paddingTop-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                {{-- <h2 class="mb-2 home-h2">
                    AHIC Gallery
                </h2> --}}
                <div class="ribbon">
                    AHIC Gallery
                  <i></i>
                  <i></i>
                  <i></i>
                  <i></i>
                </div>
                {{-- <div class="width-3rem height-4 rounded bg-dark mx-auto"></div> --}}
            </div>
        </div> END row
        <div class="row">
            <div class="col">
                <a href="{{route('galleries')}}" class="btn btn-primary" style="float: right;">
                    Go To Gallery
                </a>
            </div>
        </div>
        <div class="row marginTop-20">
            <div class="owl-carousel arrow-edge arrow-black" data-items="4" data-arrow="true" data-tablet-items="2" data-mobile-items="1">
                @foreach($gallery_category as $category)
                <div class="hover:parent  bg" style="background:url('{{asset('/')}}public/images/gallery/{{$category['latest_gallery']['image']}}')">
                    <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                        <a href="{{asset('/')}}public/images/gallery/{{$category['latest_gallery']['image']}}" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div> END row
    </div> END container
</section>
@endif -->
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