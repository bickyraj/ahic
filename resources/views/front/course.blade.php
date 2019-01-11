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
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
          <li class="breadcrumb-item"><a href="{{route('course', \Request::segment(2))}}">  {{ str_replace('_', ' ', \Request::segment(2)) }} </a></li>
          <li class="breadcrumb-item">Details</li>
        </ol>
        <h2 class="h1">
          Courses Details
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






  <section class="paddingBottom-100">
    <div class="container">

     <div class="row">
        <div class="col-lg-9 marginTop-30">
          <h1>
          {{$course->name}}
          </h1>
          <div class="row mt-3">
            <div class="col-lg-3 col-md-6 my-2">
              <div class="border-right height-100p">
                <span class="text-gray d-block">Categories:</span>
                <a href="#" class="h6">{{$course->category->name}}</a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 my-2">
              <div class="border-right height-100p">
                <span class="text-gray">Study Methods:</span>
                <p class="mb-0">
                  <span class="text-dark"> {{$course->study_method}} </span>
                  {{-- <span>(per Week)</span> --}}
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 my-2">
              <div class="text-md-right height-100p">
                <h2 class="font-weight-bold text-primary mb-2">
                  @php
                    $string = explode(' ',$course->duration);
                  @endphp
@if(isset($string[0]))
  {{$string[0]}}
@endif
@if(isset($string[1]))
  {{$string[1]}}
@endif
                </h2>
                <a class="btn btn-primary" href="{{route('apply_now')}}" target="_blank">Apply Now</a>
              </div>
            </div>
          </div> <!-- END row-->

          <div class="ec-video-container my-4">
            @if($course->background_image)

            <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="" class="img-fluid">
          @else
            <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/accounting-2.jpg" alt="" class="img-fluid">
          @endif
            <!-- <iframe src="https://www.youtube.com/embed/nrJtHemSPW4?rel=0"></iframe> -->
          </div>

          <div class="card padding-30 shadow-v3">
            <h4>
              Features Includes:
            </h4>
            <ul class="list-inline mb-0 mt-2">
              <li class="list-inline-item my-2 pr-md-4">
                <i class="ti-headphone small text-primary"></i>
                <span class="ml-2">246 lectures</span>
              </li>
              <li class="list-inline-item my-2 pr-md-4">
                <i class="ti-time small text-primary"></i>
                <span class="ml-2">27.5 Hours</span>
              </li>
              <li class="list-inline-item my-2 pr-md-4">
                <i class="ti-user small text-primary"></i>
                <span class="ml-2">98,250 students entrolled</span>
              </li>
              <li class="list-inline-item my-2 pr-md-4">
                <i class="ti-reload small text-primary"></i>
                <span class="ml-2">Lifetime access</span>
              </li>
              <li class="list-inline-item my-2 pr-md-4">
                <i class="ti-crown small text-primary"></i>
                <span class="ml-2">Certificate of Completion</span>
              </li>
              <li class="list-inline-item my-2 pr-md-4">
                <i class="ti-crown small text-primary"></i>
                <span class="ml-2">30-Day Money-Back Guarantee of Completion</span>
              </li>
            </ul>
          </div>

          <div class="col-12 mt-4">
           <ul class="nav tab-line tab-line tab-line--3x border-bottom mb-5" role="tablist">
             <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabDescription" role="tab" aria-selected="true">
                Description
              </a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabCurriculum" role="tab" aria-selected="true">
                Unit Of Competence
              </a>
             </li>
              <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabPaymentOption" role="tab" aria-selected="true">
                Payment Option
              </a>
             </li>
             <!--<li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabRPL" role="tab" aria-selected="true">
                Recognition of Prior Learning (RPL)
              </a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabPO" role="tab" aria-selected="true">
                Payment Option
              </a>
             </li> -->
           </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabDescription" role="tabpanel">
                <h4>
                  Course Description
                </h4>
                <p>
                  {{ strip_tags($course->description) }}

                </p>
                <div class="row mt-5">

                  @if (count($course->requirements)>0)
                  <div class="col-md-6 my-2">
                   <h4>
                     Course Requirments
                   </h4>
                    <ul class="list-unstyled list-style-icon list-icon-check">
                        @foreach ($course->requirements as $requirement)
                          <li>{{$requirement->description}}</li>
                        @endforeach
                    </ul>
                  </div>
                @endif

                @if(count($course->outcomes)>0)
                  <div class="col-md-6 my-2">
                   <h4>
                     Career Oppurtunities
                   </h4>
                    <ul class="list-unstyled list-style-icon list-icon-bullet">
                      @foreach ($course->outcomes as $outcome)
                        <li>{{$outcome->description}}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                @if ($course->assessment)
                  <div class="col-md-6 my-2">
                   <h4>
                     Assessments Methods
                   </h4>
                    <p>
                        {{ strip_tags($course->assessment->description) }}
                    </p>
                  </div>
                @endif

                @if ($course->rpl)
                  <div class="col-md-6 my-2">
                   <h4>
                     Recognition of Prior Learning (RPL)
                   </h4>
                   <p>
                       {{ strip_tags($course->rpl->description) }}
                   </p>
                  </div>
                @endif

                </div> <!-- END row-->
              </div> <!-- END tab-pane-->

              <div class="tab-pane fade" id="tabCurriculum" role="tabpanel">
              <div id="accordionCurriculum">

                @php
                  $count =0;
                @endphp
                @foreach ($course->relation as $relation)
                    @if ($relation->course_unit_category_id == '2')
                       @php
                         $count++;
                       @endphp
                    @endif
                @endforeach


@if ($count >0)

                  <div class="accordion-item list-group mb-3">
                    <div class="list-group-item bg-light">
                     <a class="row" href="#accordionCurriculum_1" data-toggle="collapse" aria-expanded="true">
                       <span class="col-9 col-md-8">
                         <span class="accordion__icon text-primary mr-2">
                          <i class="ti-plus"></i>
                          <i class="ti-minus"></i>
                        </span>
                        <span class="h6 d-inline">Elective Units</span>
                       </span>
                       <span class="col-2 d-none d-md-block text-right">
                         <!-- 6 Lectures -->
                       </span>
                       <span class="col-3 col-md-2 text-right">

                          {{$count}} Units

                       </span>
                     </a>
                    </div>

                    <div id="accordionCurriculum_1" class="collapse show" data-parent="#accordionCurriculum">

                        @foreach ($course->relation as $relation)
                            @if ($relation->course_unit_category_id == '2')
                              <div class="list-group-item">
                                <span class="row">
                                  <a class="col-9 col-md-8" href="#">
                                    <i class="ti-control-play small mr-1 text-primary"></i>
                                    {{$relation->competence->description}}
                                  </a>

                                  <span class="col-3 col-md-2 ml-auto text-right">
                                    {{$relation->competence->unit_code}}
                                   </span>
                                </span>
                              </div>
                            @endif
                        @endforeach
                    </div>
                  </div> <!-- END accordion-item -->
@endif





@php
  $count =0;
@endphp
@foreach ($course->relation as $relation)
    @if ($relation->course_unit_category_id == '1')
       @php
         $count++;
       @endphp
    @endif
@endforeach

    @if ($count >0)
      <div class="accordion-item list-group mb-3">

        <div class="list-group-item bg-light">
         <a class="row collapsed" href="#accordionCurriculum_2" data-toggle="collapse" aria-expanded="true">
           <span class="col-9 col-md-8">
             <span class="accordion__icon text-primary mr-2">
              <i class="ti-plus"></i>
              <i class="ti-minus"></i>
            </span>
            <span class="h6 d-inline">Core Units</span>
           </span>
           <span class="col-2 d-none d-md-block text-right">
             <!-- 19 Lectures -->
           </span>
           <span class="col-3 col-md-2 text-right">

              {{$count}} Units
           </span>
         </a>
        </div>

        <div id="accordionCurriculum_2" class="collapse" data-parent="#accordionCurriculum">

          @foreach ($course->relation as $relation)
              @if ($relation->course_unit_category_id == '1')
                <div class="list-group-item">
                  <span class="row">
                    <a class="col-9 col-md-8" href="#">
                      <i class="ti-control-play small mr-1 text-primary"></i>
                      {{$relation->competence->description}}
                    </a>

                    <span class="col-3 col-md-2 ml-auto text-right">
                      {{$relation->competence->unit_code}}
                     </span>
                  </span>
                </div>
              @endif
          @endforeach



        </div>
      </div> <!-- END accordion-item -->


    @endif

                </div> <!-- END accordion-->
              </div> <!-- END tab-pane -->

              <div class="tab-pane fade" id="tabPaymentOption" role="tabpanel">
              <div id="accordionPaymentOption">
                @foreach ($payment as $option )
                  <div class="accordion-item list-group mb-3">

                    <div class="list-group-item bg-light">
                     <a class="row" href="#accordionPaymentOption_{{$option->id}}" data-toggle="collapse" aria-expanded="true">
                       <span class="col-9 col-md-8">
                         <span class="accordion__icon text-primary mr-2">
                          <i class="ti-plus"></i>
                          <i class="ti-minus"></i>
                        </span>
                        <span class="h6 d-inline"> {{$option->title}}</span>
                       </span>
                       <span class="col-2 d-none d-md-block text-right">
                         <!-- 6 Lectures -->
                       </span>
                       <span class="col-3 col-md-2 text-right">
                         <!-- 9 Units -->
                       </span>
                     </a>
                    </div>

                    <div id="accordionPaymentOption_{{$option->id}}" class="collapse show" data-parent="#accordionPaymentOption">

                      <div class="list-group-item text-primary text-left">
                        {!!html_entity_decode($option->description)!!}

                      </div>

                    </div>
                  </div> <!-- END accordion-item -->

                @endforeach
                </div> <!-- END accordion-->
              </div> <!-- END tab-pane -->






            </div> <!-- END tab-content-->
        </div> <!-- END col-12 -->
        </div> <!-- END col-lg-9 -->

       <aside class="col-lg-3">
         <div class="card border border-light marginTop-30 shadow-v1">
           <h4 class="card-header border-bottom mb-0 h6">Courses</h4>
           <ul class="card-body list-unstyled mb-0">
             @foreach ($categories as $category)
               @php
                 $route = str_replace(' ', '_',$category->name);
               @endphp
               <li class="mb-2"><a href="{{route('courseCategory',$route)}}">{{$category->name}}</a></li>
             @endforeach
           </ul>
         </div>

       </aside> <!-- END col-lg-3 -->

     </div> <!-- END row-->
    </div> <!-- END container-->
  </section>

@endsection
