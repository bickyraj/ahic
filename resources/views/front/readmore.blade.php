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




  <div class="py-5 bg-light-v2">
  <div class="container">
   <div class="row align-items-center">
     <div class="col-md-6">
       <h2>Principal</h2>
     </div>
     <div class="col-md-6">
      <ol class="breadcrumb justify-content-md-end bg-transparent">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
      <li class="breadcrumb-item">
          Principal
        </li>
      </ol>
     </div>
   </div>
  </div>
</div>

<section class="paddingTop-80 pb-5 pb-md-0">
  <div class="container">
    <div class="row align-items-center">
      @if ($welcome)
      <div class="col-md-6">
        <img src="{{asset('/')}}public/images/cms/{{$welcome['image']}}" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 mt-3">
      @if ($welcome['title'] != null)
        <h2>
         <small class="text-primary d-block">
           {{$welcome['title']}}
         </small>
        </h2>
      @endif
      @if ($welcome['sub_title'] != null)
        <h2>
          <small class="text-dark d-block">
           {{$welcome['sub_title']}}
         </small>
        </h2>
      @endif

            {!!html_entity_decode($welcome['description'])!!}
    @endif
      </div>
    </div>
  </div>
</section>


@endsection
