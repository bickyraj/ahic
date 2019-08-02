<?php  
  // echo "<pre>";
  // print_r($keyword);
?>
@extends('layouts.master')

@section('style')
<style media="screen">
  .bg-cover{
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position:center;
    background-size:cover;
  }
</style>
@endsection
@section('content')

<div class="padding-y-60 bg-cover" data-dark-overlay="6" >
  <div class="container">
   <div class="row align-items-center">
     <div class="col-lg-6 my-2 text-white">
      <ol class="breadcrumb breadcrumb-double-angle bg-transparent p-0">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
        <li class="breadcrumb-item">All Courses</li>
      </ol>
      <h2 class="h1">
        All AHIC Courses
      </h2>

     </div>
     <form class="col-lg-5 my-2 ml-auto" action="{{route('search')}}" method="POST">
       {{csrf_field()}}
       <div class="input-group bg-white rounded p-1">
         <input type="text" class="form-control border-white" placeholder="What do you want to learn?" required="" name="search_term">
         <div class="input-group-append">
           <button class="btn btn-info rounded" type="submit">
             Search
             <i class="ti-angle-right small"></i>
           </button>
         </div>
       </div>
     </form>
   </div>
  </div>
</div>


<section class="py-3 position-relative shadow-v1">
  <div class="container">
    <div class="row">
      <div class="col-12">
       <ul class="nav tab-state-primary mb-3 justify-content-center" role="tablist">
          <li class="nav-item m-1">
            <a class="nav-link border rounded text-center p-3 <?= ((\Request::segment(2) == "")?'active':''); ?>" data-toggle="tab" href="#Tabs_0; ?>" data-course="" role="tab" aria-selected="false">
              All
            </a>
          </li>
          @foreach ($categories as $category)
            @php
              $stripped = str_replace(' ', '_', $category->name);
            @endphp
            <li class="nav-item m-1">
              <a class="nav-link border rounded text-center p-3 <?= (($stripped == \Request::segment(2))?'active':''); ?>" data-toggle="tab" href="#Tabs_<?= $category->id; ?>" data-course="<?= $stripped; ?>" role="tab" aria-selected="false">
               <!-- <i class="ti-home d-block mb-1"></i> -->
                {{ $category->name }}
              </a>
            </li>
        @endforeach
       </ul>
      </div> <!-- END col-12 -->    
    </div>
  </div>
</section>

<section class="padding-y-30 bg-light-v2">
  <div class="container">
    <div class="col-md-12">
        <h1 class="pt-4">Results for '{{$keyword}}'</h1>
        <div class="row mb-4">
          @if (count($courses) > 0 )
            @else
              <div class="col">
                <p> No matcing courses were found. </p>
              </div>
          @endif
          @foreach ($courses as $course)
            @php
              $stripped = str_replace(' ', '_', $course->name);
            @endphp
            <div class="col-lg-4 col-md-6 marginTop-30">
              <div class="card shadow-v3 hover:parent">
                  @if ($course->background_image)
                  <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="">
                  @else
                  <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/accounting-2.jpg" alt="" class="img-fluid">
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
            </div>
          @endforeach

        </div> <!-- END row-->
    </div>

  </div> <!-- END container-->
</section>
@endsection

@section('script')
<script type="text/javascript">
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).data('course') // activated tab
    var v = target;
    var a = window.location.hostname;
    var l = '{{url('/')}}/courses/'+v;
    window.location.href = l;
  });
</script>
@endsection
