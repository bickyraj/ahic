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
      <div class="col-md-6">
        <img src="assets/img/1_1.png" alt="">
      </div>
      <div class="col-md-6 mt-3">
        <h2>
         <small class="text-primary d-block">
           Hello, and
         </small>
          welcome to Harbour.
        </h2>
        <p class="lead">
          People make a college great, so whether you are a prospective student, current student, professor.
        </p>
        <p>
          Harbour college is conveniently located in the heart of Sydney’s Central Business District (CBD). Harbour College can offer you a range of flexible course delivery options appropriate to your preferred learning style. 
        </p>
        <h4 class="mt-2">
          John Joe
        </h4>
        <p>
          Principal of Australian Harbour <br> International College
        </p>
        <img src="assets/img/sign.png" alt="">
      </div>
    </div>
  </div>
</section>


@endsection