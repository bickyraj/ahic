@extends('layouts.master')

@section('style')
<style media="screen">
  .py-5.bg-cover{
    @if (isset($banner))
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
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

  <div class="py-5 bg-cover text-white" data-dark-overlay="5" >
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




<section class="pt-5 paddingBottom-50 bg-light-v2">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mt-4">

@if (isset($page->sub_title))
  <h2>{{$page->sub_title}} </h2>
@endif
@if (isset($page->description))
  {{$page->description}}
@endif
    </div> <!-- END row-->
  </div> <!-- END container-->
  </div> <!-- END container-->
</section>  <!-- END section -->

<section class="pt-5 paddingBottom-50 bg-light-v2">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mt-4">

        @foreach ($modules as $module)
          @php
            $module = $module->module;
          @endphp
          {{-- // 1 is plain --}}
          @if ($module->display_type == '1')
            @foreach ($module->content as $content)
              <div class="row" id="">
                <div class="col-md-12">
                  <h1> {{$content->title}} </h1>
                  {!!html_entity_decode($content->description)!!}
                </div>
              </div>
            @endforeach
          @endif

        @endforeach


    </div> <!-- END row-->
  </div> <!-- END container-->
  </div> <!-- END container-->
</section>  <!-- END section -->

@endsection
