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




  <div class="py-5 bg-cover text-white" data-dark-overlay="5" style="background:url('{{asset('/')}}public/ahic/img/admission.jpg') no-repeat">
    <div class="container">
     <div class="row align-items-center">
       <div class="col-md-6">
         <h2>News Listing</h2>
       </div>
       <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end bg-transparent">
          <li class="breadcrumb-item">
            <a href="{{url('/')}}">Home</a>
          </li>
          <li class="breadcrumb-item">
            News Listing
          </li>
        </ol>
       </div>
     </div>
    </div>
  </div>





   <section class="pt-5 paddingBottom-100 bg-light-v2">
     <div class="container">
       <div class="row">
           @foreach($news as $new)
               @php
              $date = date_create($new->date);
              $newdate = date_format($date,'M d, Y');
                  $slug = str_replace(' ', '_', $new->title);
           @endphp

         <div class="col-lg-4 col-md-6 marginTop-30">
           <div class="card shadow-v1">
        <img class="card-img-top" src="{{asset('/')}}public/images/news/{{$new->image}}"  src="assets/img/newsDetail/1.jpg" alt="">
             <div class="card-body">
            <a href="{{route('singleNews',$slug)}}" class="h6 mb-3">
                {{$new->title}}
               </a>
               <p class="mb-0">
                {!! html_entity_decode($new->description) !!}
               </p>
             </div>
             <div class="card-footer">
               <div class="media">
                 <!-- <img class="iconbox" src="assets/img/avatar/4.jpg" alt=""> -->
                 <div class="media-body ml-4">
                   <!-- <a href="#" class="text-primary">Alex</a> <br> -->
         {{$newdate}}
                   <!-- - <a href="#" class="text-primary">in Design</a> -->
                 </div>
               </div>
             </div>
           </div>
         </div>
         @endforeach
         <!-- <div class="col-12 marginTop-70">
           <ul class="pagination pagination-primary align-items-center justify-content-center">
            <li class="page-item mx-2">
              <a href="#">
                <i class="ti-arrow-left small mr-2"></i>
                Previous
              </a>
            </li>
            <li class="page-item mx-2 font-weight-bold">2/45</li>
            <li class="page-item mx-2">
              <a href="#">
                Next
                <i class="ti-arrow-right small ml-2"></i>
              </a>
            </li>
          </ul>
         </div> -->
       </div> <!--END row-->
     </div> <!-- END container-->
   </section>


@endsection