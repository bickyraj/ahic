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
                <li class="ec-timeline-portlet__item">
                    <h6>1st</h6>
                    <p class="mb-0">FILLING OUT FORMS</p>
                    <p class="text-muted marginTop-30">
                        <!-- <i class="mdi mdi-clock"></i> -->

                        International students applying from overseas*
                        must fill out: Streamline Student Visa Framework
                        (SSVF) Questionnaire, AHIC Enrolment Form.
                        SSVF Assessment Form, Statutory Declaration
                        Form Statement of Purpose of studying at AHIC
                        must be forwarded to AHIC Admission department
                        together with the above filled out forms.<br><br>
                        *Please contact AHIC Marketing or Admission Department
                    </p>
                </li>
                <li class="ec-timeline-portlet__item">
                    <h6>2nd</h6>
                    <p class="mb-0">APPLICATION ASSESSMENT</p>
                    <p class="text-muted">
                        <i class="mdi mdi-clock"></i>
                        Once we receive your application we will assess
                        whether you meet the English Language and
                        academic entry requirements for your chosen
                        programme.
                    </p>
                </li>
                <li class="ec-timeline-portlet__item">
                    <h6>3rd</h6>
                    <p class="mb-0">LETTER OF OFFER</p>
                    <p class="text-muted">
                        <i class="mdi mdi-clock"></i>
                        If your application is approved, we will send you
                        a letter of Offer. This will include payment details,
                        airport arrival and accommodation information.
                    </p>
                </li>
                <li class="ec-timeline-portlet__item">
                    <h6>4th</h6>
                    <p class="mb-0">FEE PAYMENT</p>
                    <p class="text-muted">
                        <i class="mdi mdi-clock"></i>
                        Fee payment details are included in your letter of
                        Offer. Ensure you have read and understood the
                        AHIC refund policy before you make payment to
                        AHIC.
                    </p>
                </li>
                <li class="ec-timeline-portlet__item">
                    <h6>5th</h6>
                    <p class="mb-0">APPLY FOR A STUDENT VISA</p>
                    <p class="text-muted">
                        <i class="mdi mdi-clock"></i>
                        Once we receive your fee payment, we will issue
                        you with a fee receipt to support your student visa
                        application. <br>
                        Visit: http://www.border.gov.au/Trav/Stud
                        for visa requirements and processes.
                    </p>
                </li>
                <li class="ec-timeline-portlet__item">
                    <h6>6th</h6>
                    <p class="mb-0">PLANNING FOR ARRIVAL</p>
                    <p class="text-muted">
                        <i class="mdi mdi-clock"></i>
                        Plan to arrive at AHIC in time to attend the
                        International Student Orientation. Once you have
                        booked your flights, organise your airport pick
                        up and accommodation at least 10 working days
                        before you arrive.
                    </p>
                </li>
                <li class="ec-timeline-portlet__item">
                    <h6>7th</h6>
                    <p class="mb-0">AHIC ORIENTATION Program</p>
                    <p class="text-muted">
                        <i class="mdi mdi-clock"></i>
                        Join other international students for the AHIC
                        Orientation program, finalise your enrolment, and
                        commence your studies.
                    </p>
                </li>
              </ul>
            </div>
            <div class="col-md-12 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
              <div class="media border rounded p-4">
                <!-- <span class="iconbox">
                  <i class="ti-magnet font-size-40"></i>
                </span> -->
                <div class="media-body ml-4">
                  <h5 class="border-bottom mb-4">
                    Contact our Admission Department
                  </h5>
                  <p>
                    AHIC ensures that all students who gain access into a Nationally Accredited Program have the appropriate skills and abilities they require to be successful in their studies.
                  </p>
                  <p>
                    Each course has specific entry requirements as listed in the course information sheet for the particular course. You can obtain a copy of course information sheet under courses section of our website.
                  </p>
                  <p>
                    We will assist you with Admissions into your chosen program and will guide you through the admissions process.
                  </p>
                  <p>
                    If you have any questions with regards to Admissions, please speak to the Marketing and Admissions Team or see the Institute’s Student Entry Requirements, Selection, Enrolment and Orientation Policy.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="Tabs_4-3" role="tabpanel">


                  @foreach ($intakeyear as $year)
                    <div class="container marginTop-30">
                        <div class="row">
                    <div class="col-12 text-center mb-4">
                      <h4>Year - <span class="text-primary">{{$year->year}}</span></h4>
                    </div>
                    @foreach ($intakes as $intake)
                      @if($intake->year == $year->year)
                        <div class="col-md-6 mt-5 wow fadeInUp" data-wow-delay=".1s">
                         <div class="card text-center height-100p border  p-4 p-lg-5 shadow-v2">
                          <span class="iconbox iconbox-lg rounded bg-primary mx-auto" data-offset-top-md="-75">
                             {{$intake->term}} <br> Term
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
