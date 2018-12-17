@extends('layouts.master')

@section('style')
<style media="screen">
  .py-5.bg-cover{
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




    <div class="py-5 bg-cover text-white" data-dark-overlay="5" >
      <div class="container">
       <div class="row align-items-center">
         <div class="col-md-6">
           <h2>Agents</h2>
         </div>
         <div class="col-md-6">
          <ol class="breadcrumb justify-content-md-end bg-transparent">
            <li class="breadcrumb-item">
              <a href="{{route('home')}}">Home</a>
            </li>

            <li class="breadcrumb-item">
              Agents
            </li>
          </ol>
         </div>
       </div>
      </div>
    </div>


    <section class="padding-y-100 border-bottom border-white bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
           <ul class="nav tab-line tab-line tab-line--3x border-bottom mb-4" role="tablist">
             <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab" aria-selected="true">
                OffShore
              </a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
                OnShore
              </a>
             </li>

           </ul>

            <div class="tab-content">
              <div class="tab-pane fade show active" id="Tabs_4-1" role="tabpanel">

              <div class="row">
                @php
                  $count = 0;
                @endphp
                @foreach ($agents as $agent)
                  @foreach ($agent->documents as $company)
                    @if ($company->country != 'Australia')
                      <div class="col-lg-4 col-md-6 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
                        <div class="card height-100p shadow-v1 text-center">
                          <div class="card-body">
                            <h4>
                            {{$agent->first_name}} {{$agent->last_name}}
                            </h4>
                            <p class="mb-1">
                              {{$company->company_name}}
                            </p>
                            <p class="mb-0 ">
                              {{$company->address}}
                            </p>
                          </div>
                          <div class="card-footer border-top">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item mr-0 px-2">
                                <a href="mailto:{{$agent->email}}">{{$agent->email}}</a><br>
                                @if ($agent->telephone)
                                      {{$agent->telephone}}
                                @endif
                                @if ($agent->telephone && $agent->mobile_no)
                                    /
                                @endif
                                @if ($agent->mobile_no)
                                      {{$agent->mobile_no}}
                                @endif
                              </li>

                            </ul>
                          </div>
                        </div>
                      </div> <!-- END col-lg-3 col-md-6-->
                    @endif
                  @endforeach
                @endforeach


              </div>
            </div>
              <div class="tab-pane fade" id="Tabs_4-2" role="tabpanel">
                <div class="row">
                  @php
                    $count = 0;
                  @endphp
                  @foreach ($agents as $agent)
                    @foreach ($agent->documents as $company)
                      @if ($company->country == 'Australia')
                        <div class="col-lg-4 col-md-6 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
                          <div class="card height-100p shadow-v1 text-center">
                            <div class="card-body">
                              <h4>
                              {{$agent->first_name}} {{$agent->last_name}}
                              </h4>
                              <p class="mb-1">
                                {{$company->company_name}}
                              </p>
                              <p class="mb-0 ">
                                {{$company->address}}
                              </p>
                            </div>
                            <div class="card-footer border-top">
                              <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-0 px-2">
                                  <a href="mailto:{{$agent->email}}">{{$agent->email}}</a><br>
                                  @if ($agent->telephone)
                                        {{$agent->telephone}}
                                  @endif
                                  @if ($agent->telephone && $agent->mobile_no)
                                      /
                                  @endif
                                  @if ($agent->mobile_no)
                                        {{$agent->mobile_no}}
                                  @endif
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div> <!-- END col-lg-3 col-md-6-->
                      @endif
                    @endforeach
                  @endforeach

                </div>
              </div>

            </div> <!-- END tab-content-->
          </div> <!-- END col-12 -->
        </div> <!-- END row-->
      </div> <!-- END container-->
    </section> <!-- END section-->




@endsection
