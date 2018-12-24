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




  <div class="py-5 bg-cover text-white" data-dark-overlay="6"  >
    <div class="container">
     <div class="row align-items-center">
       <div class="col-md-6 text-white">
         <h2>Admission</h2>
       </div>
       <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end bg-transparent">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item">
          Admission
          </li>
        </ol>
       </div>
     </div>
    </div>
  </div>

  <section class="padding-y-100 border-bottom border-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
       <ul class="nav tab-line tab-line tab-line--3x border-bottom mb-4" role="tablist">
         <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab" aria-selected="true">
           <!-- <i class="ti-home mr-1"></i> -->
            Course Fee Structure
          </a>
         </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
           <!-- <i class="ti-user mr-1"></i> -->
            How To Apply
          </a>
         </li>
         <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="tab" href="#Tabs_4-3" role="tab" aria-selected="true">
           <!-- <i class="ti-settings mr-1"></i> -->
            Intake Dates
          </a>

         </li>
       </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="Tabs_4-1" role="tabpanel">
            <div class="col-12">
             <ul class="nav tab-state-primary mb-3 justify-content-center" role="tablist">
               <li class="nav-item m-1">
                 <a class="nav-link border rounded text-center p-3 active" data-toggle="tab" href="#Tabs_8-1" role="tab" aria-selected="true">
                  <span class=" d-block">  OnShore Fee</span>

                 </a>
               </li>
               <li class="nav-item m-1">
                 <a class="nav-link border rounded text-center p-3" data-toggle="tab" href="#Tabs_8-2" role="tab" aria-selected="true">
                  <span class=" d-block">  OffShore Fee</span>
                 </a>
               </li>
               <li class="nav-item m-1 ">
                 <a class="nav-link border rounded text-center p-3" href="#" role="tab" aria-selected="true">
                  <span class=" d-block ">Apply Now</span>
                 </a>
               </li>

             </ul>

              <div class="tab-content">
                <div class="tab-pane fade show active" id="Tabs_8-1" role="tabpanel">
                  <div class="row">
                    @foreach ($categories as $category)
                      <div class="col-lg-6 col-md-6 marginTop-30 wow fadeInUp " data-wow-delay=".1s">
                        <div class=" p-1 text-center bg-light bg-primary border-bottom">
                          <h5 class="my-4 text-white">
                            {{$category->name}}
                          </h5>
                        </div>
                        @foreach ($courses as $course)
                          @if ($course->course_category_id == $category->id)
                            <div class="p-4 bg-light border-bottom">
                              <div class="media justify-content-between">
                                <ul class="list-unstyled mb-0">
                                  <li class="mb-1">

                                    <h5 class="my-4">
                                      {{$course->name}}
                                    </h5>
                                  </li>
                                  <li class="mb-1">
                                    {{-- BSB40215 --}}
                                  </li>
                                </ul>
                                <ul class="list-unstyled mb-0  text-right">
                                  <li class="mb-1">
                                    <h5 class="my-4 d-block text-primary">{{$course->onshore_fee}}</h5>

                                  </li>
                                  <li class="mb-1">
                                    {{$course->duration}}
                                  </li>
                                </ul>

                              </div>

                            </div>
                          @endif
                        @endforeach

                      </div>
                    @endforeach

                  </div>
                </div>
                <div class="tab-pane fade show fade" id="Tabs_8-2" role="tabpanel">
                  <div class="row">
                    @foreach ($categories as $category)
                      <div class="col-lg-6 col-md-6 marginTop-30 wow fadeInUp " data-wow-delay=".1s">
                        <div class=" p-1 text-center bg-light bg-primary border-bottom">
                          <h5 class="my-4 text-white">
                            {{$category->name}}
                          </h5>
                        </div>
                        @foreach ($courses as $course)
                          @if ($course->course_category_id == $category->id)
                            <div class="p-4 bg-light border-bottom">
                              <div class="media justify-content-between">
                                <ul class="list-unstyled mb-0">
                                  <li class="mb-1">

                                    <h5 class="my-4">
                                      {{$course->name}}
                                    </h5>
                                  </li>
                                  <li class="mb-1">
                                    {{-- BSB40215 --}}
                                  </li>
                                </ul>
                                <ul class="list-unstyled mb-0  text-right">
                                  <li class="mb-1">
                                    <h5 class="my-4 d-block text-primary">{{$course->offshore_fee}}</h5>

                                  </li>
                                  <li class="mb-1">
                                    {{$course->duration}}
                                  </li>
                                </ul>

                              </div>

                            </div>
                          @endif
                        @endforeach

                      </div>
                    @endforeach
                  </div>
                </div>

              </div> <!-- END tab-content-->

              <div class="col-lg-12 col-md-12 marginTop-30 wow fadeInUp " data-wow-delay=".5s">
                <h5 class="border-bottom mb-4">
                  Note:
                </h5>
                <p>
                The above mentioned charges are for course tuition fees only, and do not include other applicable Administration / Service Charges. Please click here for a list of additional Administration / Service Charges.
                </p>
                <p>
                  <i>
                  "Currently AHIC is offering special price for individual courses. Please contact with college or speak with AHIC approved educational consultant for special price."
                  </i>
                </p>

              </div>
            </div> <!-- END col-12 -->
          </div>
          <div class="tab-pane fade" id="Tabs_4-2" role="tabpanel">
            <div class="col-12">
              <ul class="ec-timeline-portlet list-unstyled bullet-line-list">
                @php
                  $count = 1;
                @endphp
                @foreach ($modules as $mod)
                  @if($mod['module']['display_type'] == 2)
                    @foreach ($mod['module']['content'] as $module)
                      @php
                      $num ='';
                      if($count > 10){
                        $c = $count % 10;
                      }
                      else{
                        $c = $count;
                      }

                      if ($c === 1) {
                        $num = $count.  "st";
                      }
                      elseif ($c === 2) {
                        $num = $count. "nd";
                      }
                      elseif ($c === 3) {
                        $num = $count. "nd";
                      }
                      else{
                        $num = $count.  "th";
                      }

                      @endphp
                      <li class="ec-timeline-portlet__item">
                          <h6>{!!html_entity_decode($num)!!}</h6>
                          <p class="mb-0 text-uppercase">{{$module['title']}}</p>
                          <p class="text-muted marginTop-30">
                              {!!html_entity_decode($module['description'])!!}
                          </p>
                      </li>

                      @php
                        $count++;
                      @endphp
                    @endforeach
                  @endif
                @endforeach

              </ul>
            </div>

            @foreach ($modules as $mod)
@if($mod['module']['display_type'] != 2)
                @foreach ($mod['module']['content'] as $module)
                  <div class="col-md-12 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
                    <div class="media border rounded p-4">

                      <div class="media-body ml-4">
                        <h5 class="border-bottom mb-4">
                            {{$module['title']}}
                        </h5>
                        {!!html_entity_decode($module['description'])!!}
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            @endforeach

          </div>
          <div class="tab-pane fade" id="Tabs_4-3" role="tabpanel">


                  @foreach ($intakeyear as $year)
                    <div class="container marginTop-30">
                        <div class="row">
                    <div class="col-12 text-center mb-4">
                      <h4>Year - <span class="text-primary">{{$year->year}}</span></h4>
                    </div>

                    @foreach ($intakes as $intake)

                      @php
                      $num ='';
                    if($intake->term > 0){
                      if($intake->term > 10){
                        $c = $intake->term % 10;
                      }
                      else{
                        $c = $intake->term;
                      }
                      if ($c == 1) {
                        $num = $intake->term.  "st";
                      }
                      elseif ($c == 2) {
                        $num = $intake->term. "nd";
                      }
                      elseif ($c == 3) {
                        $num = $intake->term. "nd";
                      }
                      else{
                        $num = $intake->term.  "th";
                      }
                    }
                      @endphp
                      @if($intake->year == $year->year)
                        <div class="col-md-6 mt-5 wow fadeInUp" data-wow-delay=".1s">
                         <div class="card text-center height-100p border  p-4 p-lg-5 shadow-v2">
                          <span class="iconbox iconbox-lg rounded bg-primary mx-auto" data-offset-top-md="-75">
                             {{$num}} <br> Term
                           </span>
                           <div class="table-responsive my-4">
                             <table class="table text-left table-hover">
                               <thead>
                                 <tr>
                                   <th scope="col">Start Date</th>
                                   <th scope="col">{{$intake->date}}</th>

                                 </tr>
                               </thead>
                               <tbody>
                                 <tr>
                                   <th scope="row">Mid Term</th>
                                   <td>{{$intake->mid_term}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">End Date</th>
                                   <td>{{$intake->end_date}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Duration</th>
                                   <td>{{$intake->duration}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Holiday Start</th>
                                   <td>{{$intake->holiday_start}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Holiday End</th>
                                   <td>{{$intake->holiday_end}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Holiday Duration</th>
                                   <td>{{$intake->holiday_duration}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Credential Release</th>
                                   <td>{{$intake->credential_release}}</td>
                                 </tr>

                               </tbody>
                             </table>
                           </div>
                         </div>
                        </div>

                      @endif

                    @endforeach

                  </div>
                  </div>

                  @endforeach
          </div>
        </div> <!-- END tab-content-->
      </div> <!-- END col-12 -->
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END section-->




@endsection
