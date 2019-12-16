@extends('layouts.master')
@section('style')
<style media="screen">
    .py-5.bg-cover{
    @if (isset($page->image))
    background:url('{{asset('/')}}public/images/pages/{{$page->image}}') no-repeat;
    @endif
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
                <h2 class="text-capitalize">
           {{$page->name}}
         </h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}/{{$page->slug}}" class="text-capitalize"> {{$page->name}}</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- <section class="pt-5 paddingBottom-50 bg-light-v2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mt-4">
                @if (isset($page->sub_title))
                <h2>{{$page->sub_title}} </h2>
                @endif
            </div> END row
        </div> END container
    </div> END container
</section> END section -->
@if($page->slug != "intakes")
<section class="pt-5 paddingBottom-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                      <ul class="nav flex-column mb-3 justify-content-center bg-light-v2" role="tablist">
                          @php
                          $count = 0;
                          $counter= 0;
                          @endphp
                          @if($page->slug != "how-to-apply")
                              @if(isset($page->description))
                              <li class="nav-item category-nav-item">
                                  <?php $count++; ?>
                                  <a class="nav-link border rounded text-center active" data-toggle="tab" href="#Tabs_description" role="tab" aria-selected="true">{{ ((!empty($page->sub_title))?$page->sub_title: "Description") }}</a>
                              </li>
                              @endif
                              @foreach ($modules as $mod)
                              <li class="nav-item category-nav-item">
                                  <a class="nav-link border rounded text-center @if ($count == 0) active @endif " data-toggle="tab" href="#Tabs_99-1{{$count}}" role="tab" aria-selected="true">
                                    {{$mod->module->title}}
                                   </a>
                              </li>
                              @php
                              $count++;
                              @endphp
                              @endforeach
                          @endif
                      </ul>
                  </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="card p-4 shadow-v3">
                            <!-- <ul class="nav tab-state-primary mb-3" role="tablist">
                                @php
                                $count = 0;
                                $counter= 0;
                                @endphp
                                @if($page->slug != "how-to-apply")
                                    @if(isset($page->description))
                                    <li class="nav-item m-1">
                                        <?php $count++; ?>
                                        <a class="nav-link border rounded text-center active" data-toggle="tab" href="#Tabs_description" role="tab" aria-selected="true">{{ ((!empty($page->sub_title))?$page->sub_title: "Description") }}</a>
                                    </li>
                                    @endif
                                    @foreach ($modules as $mod)
                                    <li class="nav-item m-1">
                                        <a class="nav-link border rounded text-center @if ($count == 0) active @endif " data-toggle="tab" href="#Tabs_99-1{{$count}}" role="tab" aria-selected="true">
                                          {{$mod->module->title}}
                                         </a>
                                    </li>
                                    @php
                                    $count++;
                                    @endphp
                                    @endforeach
                                @endif
                            </ul> -->
                            <div class="tab-content">
                                @php
                                $count = 0;
                                @endphp
                                @if(isset($page->description))
                                <div class="tab-pane fade show active" id="Tabs_description" role="tabpanel">
                                    <?php $count++; ?>
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <div class="p-4">
                                                {!!html_entity_decode($page->description)!!}
                                            </div>
                                        </div> <!-- END col-md-12 -->
                                    </div>
                                </div>
                                @endif
                                @foreach ($modules as $mod)
                                <div class="tab-pane fade show  @if ($count == 0) active @endif " id="Tabs_99-1{{$count}}" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <div id="accordion-4" class="accordion-style-4">
                                                @if($mod['module']['display_type'] == 2)
                                                @php
                                                $sn = 1;
                                                @endphp
                                                <ul class="ec-timeline-portlet list-unstyled bullet-line-list">
                                                    @foreach ($mod->module->content as $content)
                                                        @php
                                                        $num ='';
                                                        if($sn > 10){
                                                          $c = $sn % 10;
                                                        }
                                                        else{
                                                          $c = $sn;
                                                        }

                                                        if ($c === 1) {
                                                          $num = $sn.  "st";
                                                        }
                                                        elseif ($c === 2) {
                                                          $num = $sn. "nd";
                                                        }
                                                        elseif ($c === 3) {
                                                          $num = $sn. "rd";
                                                        }
                                                        else{
                                                          $num = $sn.  "th";
                                                        }
                                                        @endphp
                                                        <li class="ec-timeline-portlet__item">
                                                            <h6>{!!html_entity_decode($num)!!}</h6>
                                                            <p class="mb-0 text-uppercase">{{$content['title']}}</p>
                                                            <p class="text-muted marginTop-30">
                                                                {!!html_entity_decode($content['description'])!!}
                                                            </p>
                                                        </li>
                                                        @php
                                                          $sn++;
                                                        @endphp
                                                    @endforeach
                                                </ul>
                                                @else
                                                @foreach ($mod->module->content as $content)
                                                    <div class="accordion-item mb-3">
                                                        <a href="#acc4_{{$counter}}" class="accordion__title h6 border p-3 mb-0" data-toggle="collapse"  @if ($count == 0) aria-expanded="true" @endif >
                                                        {{$content->title}}
                                                       <span class="accordion__icon float-right small mt-1">
                                                        <i class="ti-plus"></i>
                                                        <i class="ti-minus"></i>
                                                      </span>
                                                     </a>
                                                        <div id="acc4_{{$counter}}" class="collapse show" data-parent="#accordion-4">
                                                            <div class="p-4 border border-top-0 ahic-module-desc">
                                                                {!!html_entity_decode($content->description)!!}
                                                            </div>
                                                        </div>
                                                    </div> <!-- END accordion-item-->
                                                @php
                                                $counter++;
                                                @endphp
                                                @endforeach
                                                @endif
                                            </div> <!-- END accordion-4-->
                                        </div> <!-- END col-md-12 -->
                                    </div>
                                </div>
                                @php
                                $count++;
                                @endphp
                                @endforeach
                            </div> <!-- END tab-content-->
                        </div> <!-- END card -->
                    </div> <!-- END col-12 -->
                </div> <!-- END row-->
            </div> <!-- END row-->
        </div> <!-- END container-->
    </div> <!-- END container-->
</section> <!-- END section -->
@else
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
@endif
@endsection