@extends('layouts.master')
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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
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
               @if (isset($string[0]))
               {{$string[0]}}
               @endif
             @endif

            </h2>
                            <p class="my-4">
                                @if ($header['description'])
                                {!!html_entity_decode($header['description'])!!}
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
                            <form id="enquiry_form">
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
                                        <select data-placeholder="Select Course" class="chosen-select ec-select my_select_box course_id" tabindex="5" name="course_id">
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
                                        <select data-placeholder="Your Country" class="select ec-select country_id" tabindex="3" name="country_id">
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
<section class="padding-y-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="mb-4">
        Courses
      </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
            </div>
            <div class="col-12">
                <div class="owl-carousel arrow-on-hover" data-state-outer-class="py-3" data-space="30" data-arrow="true" data-loop="true">
                    @foreach ($courses as $course)
                    <div class="card shadow-v3 hover:parent">
                        @if ($course->background_image)
                        <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="">

             @else
                        <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/accounting-2.jpg" alt="" class="img-fluid">

             @endif
                        <div class="card-body">
                            <h4>
                {{$course->category->name or ''}}
              </h4>
                            <p class="text-primary">
                                {{ str_limit($course->name, 28) }}
                            </p>
                            <p class="mb-0">
                                {{ str_limit(strip_tags($course->description), 180) }}
                            </p>
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
@if (isset($lc) && isset($rc))
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/images/cms/{{$lc->image}}') no-repeat">
                <div class="padding-x-lg-100 wow pulse">
                    <h2 class="text-white mb-4">
            {{$lc['title']}}
            </h2>
                    <p>
                        {!!html_entity_decode($lc['description'])!!}
                    </p>
                    <a href="apply-no1w.php" class="btn btn-white mt-4">Apply now</a>
                </div>
            </div>
            <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/images/cms/{{$rc->image}}') no-repeat">
                <div class="padding-x-lg-100 wow pulse">
                    <h2 class="text-white mb-4">
              {{$rc['title']}}
            </h2>
                    <p>
                        {!!html_entity_decode($rc['description'])!!}
                    </p>
                    <a href="apply-no1w.php" class="btn btn-white mt-4">Apply now</a>
                </div>
            </div>
        </div>
    </div> <!-- END container-->
</section>
@endif
<section class="padding-y-100 bg-light-v2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">
          Latest AHIC News
        </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
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
                <div class="card padding-30 shadow-v1">
                    <p class="text-primary">
                        {{$newdate}}
                    </p>
                    <a href="{{route('singleNews',$slug)}}" class="h4 mb-3">

            {{$new->title}}
         </a>
                    <img class="card-img-top" src="{{asset('/')}}public/images/news/{{$new->image}}" alt="">
                    <p class="paddingTop-10">
                        {!! html_entity_decode(str_limit($new->description, 180)) !!}
                    </p>
                    <a href="{{route('singleNews',$slug)}}" class="btn btn-outline-primary align-self-start mt-2">
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
<section class="paddingTop-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">
          AHIC Gallery
        </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
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
@endsection
@section('style')
<style media="screen">
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
</style>
@endsection
@section('script')
<script type="text/javascript">
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
$('.enquiry_btn').click(function(event) {
    $(this).parent().parent().find('.error').each(function() {
        $(this).text(' ');
    })
    event.preventDefault();
    var form = $('#enquiry_form');
    var formData = form.serializeArray();
    // console.log(formData);
    var url = "{{route('enquiry')}}";

    $.post(url, formData)
        .done(function(data) {
            if (data == 'true') {
                form.trigger('reset');
                $.notify({
                    // options
                    icon: 'glyphicon glyphicon-warning-sign',
                    message: 'Thank You For Enquiry',
                    target: '_blank'
                }, {
                    // settings
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "center"
                    },
                    offset: 120,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                });
            } else if (data == 'false') {


                $.notify({
                    // options
                    icon: 'glyphicon glyphicon-warning-sign',
                    message: 'Enquiry Failed',
                    target: '_blank'
                }, {
                    // settings
                    element: 'body',
                    position: null,
                    type: "danger",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "center"
                    },
                    offset: 120,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                });

            }
        })
        .fail(function(xhr, status, error) {
            jQuery.each(xhr.responseJSON.errors, function(key, value) {
                $("." + key).parent().find('.error').text(value);
            });

            // alert('lets fo it');
        });
});
</script>
@endsection