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
           <h2>Downloads</h2>
         </div>
         <div class="col-md-6">
          <ol class="breadcrumb justify-content-md-end bg-transparent">
            <li class="breadcrumb-item">
              <a href="{{route('home')}}">Home</a>
            </li>

            <li class="breadcrumb-item">
              Downloads
            </li>
          </ol>
         </div>
       </div>
      </div>
    </div>

  <section class="padding-y-100 border-bottom border-white bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
          <div class="card height-100p shadow-v1 text-center">
            <!-- <img class="card-img-top" src="assets/img/262x230/5.jpg" alt=""> -->
            <div class="card-body">
              <h4>
                Student Application Form
              </h4>
              <!-- <p class="mb-0">
                Eden Academy Consultancy Pvt. Ltd.<br>
                Dharan-6, Bhanuchowk, Sunsari, Nepal
              </p> -->
            </div>
            <div class="card-footer border-top">
              <button class="btn btn-primary mr-3 mb-3">Download Now</button>
            </div>
          </div>
        </div> <!-- END col-lg-3 col-md-6-->
        <div class="col-lg-4 col-md-4 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
          <div class="card height-100p shadow-v1 text-center">
            <!-- <img class="card-img-top" src="assets/img/262x230/5.jpg" alt=""> -->
            <div class="card-body">
              <h4>
                Student Handbook
              </h4>
              <!-- <p class="mb-0">
                Eden Academy Consultancy Pvt. Ltd.<br>
                Dharan-6, Bhanuchowk, Sunsari, Nepal
              </p> -->
            </div>
            <div class="card-footer border-top">
              <button class="btn btn-primary mr-3 mb-3">Download Now</button>
            </div>
          </div>
        </div> <!-- END col-lg-3 col-md-6-->
        <div class="col-lg-4 col-md-4 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
          <div class="card height-100p shadow-v1 text-center">
            <!-- <img class="card-img-top" src="assets/img/262x230/5.jpg" alt=""> -->
            <div class="card-body">
              <h4>
                Terms and Condition / Refund Policy
              </h4>
              <!-- <p class="mb-0">
                Eden Academy Consultancy Pvt. Ltd.<br>
                Dharan-6, Bhanuchowk, Sunsari, Nepal
              </p> -->
            </div>
            <div class="card-footer border-top">
              <button class="btn btn-primary mr-3 mb-3">Download Now</button>
            </div>
          </div>
        </div> <!-- END col-lg-3 col-md-6-->
        <div class="col-lg-4 col-md-4 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
          <div class="card height-100p shadow-v1 text-center">
            <!-- <img class="card-img-top" src="assets/img/262x230/5.jpg" alt=""> -->
            <div class="card-body">
              <h4>
                Assessment Cover Sheet
              </h4>
              <!-- <p class="mb-0">
                Eden Academy Consultancy Pvt. Ltd.<br>
                Dharan-6, Bhanuchowk, Sunsari, Nepal
              </p> -->
            </div>
            <div class="card-footer border-top">
              <button class="btn btn-primary mr-3 mb-3">Download Now</button>
            </div>
          </div>
        </div> <!-- END col-lg-3 col-md-6-->
        <div class="col-lg-4 col-md-4 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
          <div class="card height-100p shadow-v1 text-center">
            <!-- <img class="card-img-top" src="assets/img/262x230/5.jpg" alt=""> -->
            <div class="card-body">
              <h4>
                AHIC Booklet
              </h4>
              <!-- <p class="mb-0">
                Eden Academy Consultancy Pvt. Ltd.<br>
                Dharan-6, Bhanuchowk, Sunsari, Nepal
              </p> -->
            </div>
            <div class="card-footer border-top">
              <button class="btn btn-primary mr-3 mb-3">Download Now</button>
            </div>
          </div>
        </div> <!-- END col-lg-3 col-md-6-->
        <div class="col-lg-4 col-md-4 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
          <div class="card height-100p shadow-v1 text-center">
            <!-- <img class="card-img-top" src="assets/img/262x230/5.jpg" alt=""> -->
            <div class="card-body">
              <h4>
                Course Variation
              </h4>
              <!-- <p class="mb-0">
                Eden Academy Consultancy Pvt. Ltd.<br>
                Dharan-6, Bhanuchowk, Sunsari, Nepal
              </p> -->
            </div>
            <div class="card-footer border-top">
              <button class="btn btn-primary mr-3 mb-3">Download Now</button>
            </div>
          </div>
        </div> <!-- END col-lg-3 col-md-6-->

      </div>
    </div>
  </section>


@endsection
