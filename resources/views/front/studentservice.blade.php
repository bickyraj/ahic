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




  <div class="py-5 bg-cover text-white"  data-dark-overlay="5"  style="background:url('{{asset('/')}}public/ahic/img/admission.jpg') no-repeat">
    <div class="container">
     <div class="row align-items-center">
       <div class="col-md-6">
         <h2>Student Service</h2>
       </div>
       <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end bg-transparent">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Home</a>
          </li>

          <li class="breadcrumb-item">
            Student Service
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
       <div class="card p-4 shadow-v3">
       <ul class="nav tab-state-primary mb-3" role="tablist">
         @php
           $count = 0;
           $counter= 0;
         @endphp
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

       </ul>

        <div class="tab-content">
          @php
            $count = 0;
          @endphp
          @foreach ($modules as $mod)

            <div class="tab-pane fade show  @if ($count == 0) active @endif " id="Tabs_99-1{{$count}}" role="tabpanel">
              <div class="row">
                <div class="col-md-12 my-2">
                  <div id="accordion-4" class="accordion-style-4">

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
  </div> <!-- END container-->
</section> <!-- END section-->


@endsection


@section('style')
  <style media="screen">
    .ahic-module-desc a{
      color: rgb(69, 93, 195) !important;
    }
  </style>
@endsection
