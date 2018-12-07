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


  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
    <!-- <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
    </ol> -->

    <div class="carousel-inner">
      <div class="carousel-item padding-y-80 height-80vh active">
       <div class="bg-absolute" data-dark-overlay="5" style="background:url('{{asset('/')}}public/ahic/img/heroBanner/1.jpg') no-repeat"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-10 mx-auto  text-white">
                <h1 class="display-lg-4 font-weight-bold text-primary animated slideInUp">
                  Study In Australia
                </h1>
                <h4 class="display-lg-4 font-weight-bold animated slideInUp">
                  Where Seekers Become <br>Achievers
                </h4>
                <p class="lead animated fadeInUp">
                  Harbour College can offer you a range of flexible course delivery <br>options appropriate to your preferred learning style.
                </p>

                <!-- <a href="#" class="btn btn-primary mt-3 mx-2 animated slideInUp">Learn More</a> -->
              </div>
            </div>
          </div>
      </div>
      <div class="carousel-item padding-y-80 height-80vh ">
       <div class="bg-absolute" data-dark-overlay="5"  style="background:url('{{asset('/')}}public/ahic/img/heroBanner/2.jpg') no-repeat"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-10 mx-auto  text-white">
                <h1 class="display-lg-4 font-weight-bold text-primary animated slideInUp">
                  Study In Australia
                </h1>
                <h2 class="display-lg-3 font-weight-bold animated slideInUp">
                  Where Seekers Become Achievers
                </h2>
                <p class="lead animated fadeInUp">
                  Harbour College can offer you a range of flexible course delivery <br>options appropriate to your preferred learning style.
                </p>

                <!-- <a href="#" class="btn btn-primary mt-3 mx-2 animated slideInUp">Learn More</a> -->
              </div>
            </div>
          </div>
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <i class="ti-angle-left iconbox bg-black-0_5 hover:primary"></i>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <i class="ti-angle-right iconbox bg-black-0_5 hover:primary"></i>
    </a>
  </div>

<!-- <section class="height-90vh py-5 flex-center jarallax" data-dark-overlay="2" style="background:url(assets/img/1920x800/1.jpg) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 text-white">
        <h2 class="display-lg-4 font-weight-bold text-primary wow slideInUp">
          Study In Australia
        </h2>
        <h1 class="display-lg-3 font-weight-bold text-white wow slideInUp">
          Where Seekers Become Achievers
        </h1>
        <p class="lead wow slideInUp">
          Harbour College can offer you a range of flexible course delivery options appropriate to your preferred learning style.
        </p>
        <a href="#" class="btn btn-primary btn-lg mt-3 wow slideInUp">Read More</a>
      </div>
    </div>
  </div>
</section> -->







<section class="padding-y-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row align-items-center">
          <div class="col-md-6 my-5">
           <div class="position-relative">
            <img class="rounded w-100" src="{{asset('/')}}public/ahic/img/360x400/1.jpg" alt="">
            <!-- <a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="iconbox iconbox-lg bg-white position-absolute absolute-center">
              <i class="ti-control-play text-primary"></i>
            </a> -->
           </div>
          </div>
          <div class="col-md-6 mt-4">
            <h2>
              <small class="d-block text-gray">Welcome to</small>
               <span class="text-primary">Harbour</span> College
            </h2>
            <p class="my-4">
              Harbour college is conveniently located in the heart of Sydney’s Central Business District (CBD). Harbour College can offer you a range of flexible course delivery options appropriate to your preferred learning style.
            </p>
            <a href="welcome-read-more.php" class="btn btn-outline-primary">
              Read More
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-5 mt-md-0">
        <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160">
          <div class="card-header bg-primary text-white border-bottom-0">
            <span class="lead font-semiBold text-uppercase">
              Enquiry Form
            </span>
          </div>

          <div class="p-4 border-bottom wow fadeInUp">
            <!-- <p class="text-primary mb-1">
              Name
            </p> -->

              <div class="form-group">
               <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
               <input type="text" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
               <input type="text" class="form-control" placeholder="Phone">
              </div>
              <div class="form-group">
              <div class="input-group">
                <select data-placeholder="Select Course" class="chosen-select ec-select my_select_box" tabindex="5">
                  <option value=""></option>
                  <option>Certificate IV in Business</option>
                  <option>Diploma of Business</option>
                  <option>Advanced Diploma of Business</option>
                  <option>Certificate IV in Accounting and Bookkeeping</option>
                  <option>Diploma of Accounting</option>
                </select>

              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <select data-placeholder="Your Country" class="select ec-select" tabindex="3">
            <option value=""></option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Nepal">Nepal</option>
          </select>
              </div>
            </div>
              <div class="form-group">
                 <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-primary mr-3 mb-3" style="float:right;">Submit</button>
              </div>
          </div>

          <!-- <div class="p-4 border-bottom wow fadeInUp">
            <p class="text-primary mb-1">
              July 17, 2018
            </p>
            <a href="#">
              Nullam quis ante etiam sit amet eget eros faucibus
            </a>
          </div>

          <div class="p-4 border-bottom wow fadeInUp">
            <p class="text-primary mb-1">
              June 08, 2018
            </p>
            <a href="#">
              Adsing eusmo tempor indeduny
            </a>
          </div>

          <div class="p-4 border-bottom wow fadeInUp">
            <p class="text-primary mb-1">
              June 20, 2018
            </p>
            <a href="#">
              Nullam quis ante etiam sit amet eget eros faucibus
            </a>
          </div>
          <div class="p-4">
            <a href="#" class="btn btn-link pl-0">
              View All Notices
            </a>
          </div> -->
        </div>
      </div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>


<section class="padding-y-100 bg-light">
  <div class="container">
    <div class="row">
     <div class="col-12 text-center mb-5">
       <h2 class="mb-4">
        Courses
      </h2>
      <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
     </div>
      <div class="col-12">
       <div class="owl-carousel arrow-on-hover" data-state-outer-class="py-3" data-space="30" data-arrow="true" data-loop="true">
         @foreach ($courses as $course)
           <div class="card shadow-v3 hover:parent">
            <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/business-1.jpg" alt="">
            <div class="card-body">
              <h4>
                {{$course->category->name}}
              </h4>
              <p class="text-primary">
                {{ str_limit($course->name, 28) }}


              </p>
              <p class="mb-0">
                {{ str_limit($course->description, 180) }}
              </p>
            </div>
            <div class="d-flex justify-content-between align-items-center border-top position-relative p-4">
             <span class="d-inline-block bg-primary text-white px-4 py-1 rounded-pill">
               {{ str_limit($course->duration, 8) }}

             </span>

              <a href="courseDetail.php" class="position-absolute btn btn-primary btn-m left-20 hover:show">
                View Details
              </a>
            </div>
          </div>

         @endforeach
       </div>
      </div>
      <div class="col-12 mt-5 text-center">
        <a href="all-courses.php" class="btn btn-primary">
          See All Courses
        </a>
      </div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>



<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/ahic/img/960x560/admission.jpg') no-repeat">
        <div class="padding-x-lg-100 wow pulse">
          <h2 class="text-white mb-4">
            Admission Open for 2018
          </h2>
          <p>
            Investig ationes demons travge vunt lectores legere lrus quodk legunt saepius claritas est cnsectetur adip sicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Consectetur adipi sicing.
          </p>
          <a href="apply-no1w.php" class="btn btn-white mt-4">Apply now</a>
        </div>
      </div>
      <div class="col-md-6 bg-cover bg-center text-white padding-y-80" style="background:url('{{asset('/')}}public/ahic/img/960x560/orientation.jpg') no-repeat">
        <div class="padding-x-lg-100 wow pulse">
          <h2 class="text-white mb-4">
            Students Orientation 2018
          </h2>
          <p>
            Investig ationes demons travge vunt lectores legere lrus quodk legunt saepius claritas est cnsectetur adip sicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Consectetur adipi sicing.
          </p>
          <a href="apply-no1w.php" class="btn btn-white mt-4">Apply now</a>
        </div>
      </div>
    </div>
  </div> <!-- END container-->
</section>





<section class="padding-y-100 bg-light-v2">
  <div class="container">
    <div class="row">

      <div class="col-12 text-center">
        <h2 class="mb-4">
          Latest AHIC News
        </h2>
        <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
      </div>
    </div> <!-- END row-->

    <div class="row mt-4">

      <div class="col-lg-4 col-md-6 marginTop-30 wow slideInUp" data-wow-delay=".1s">
        <div class="card padding-30 shadow-v1">
         <p class="text-primary">
           Oct 13, 2018
         </p>
         <a href="news-detail.php" class="h4 mb-3">
           Orientation Program
         </a>
         <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/news-1.jpg" alt="">

         <p class="paddingTop-10">
           Investig ationes demons trave sed vunt lectores legere do kurus qodk legunt saepiu claritas ekist conse tetur adipi sicing elit, sed kdo.
         </p>
         <a href="news-detail.php" class="btn btn-outline-primary align-self-start mt-2">
           Read More
         </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 marginTop-30 wow slideInUp" data-wow-delay=".2s">
        <div class="card padding-30 shadow-v1">
         <p class="text-primary">
           Oct 13, 2018
         </p>
         <a href="news-detail.php" class="h4 mb-3">
           Graduation Day
         </a>
         <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/news-2.jpg" alt="">

         <p class="paddingTop-10">
           Investig ationes demons trave sed vunt lectores legere do kurus qodk legunt saepiu claritas ekist conse tetur adipi sicing elit, sed kdo.
         </p>
         <a href="news-detail.php" class="btn btn-outline-primary align-self-start mt-2">
           Read More
         </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 marginTop-30 wow slideInUp" data-wow-delay=".3s">
        <div class="card padding-30 shadow-v1">
         <p class="text-primary">
           Aug 13, 2018
         </p>
         <a href="news-detail.php" class="h4 mb-3">
           New Year Celebration
         </a>
         <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/news-3.jpg" alt="">

         <p class="paddingTop-10">
           Investig ationes demons trave sed vunt lectores legere do kurus qodk legunt saepiu claritas ekist conse tetur adipi sicing elit, sed kdo.
         </p>
         <a href="news-detail.php" class="btn btn-outline-primary align-self-start mt-2">
           Read More
         </a>
        </div>
      </div>
      <div class="col-12 mt-5 text-center">
        <a href="news-listing.php" class="btn btn-primary">
          View All News
        </a>
      </div>


    </div> <!-- END row-->
  </div> <!-- END container-->
</section>





<section class="paddingTop-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="mb-4">
          AHIC Gallery
        </h2>
        <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
      </div>
    </div> <!-- END row-->

    <div class="row marginTop-60">
      <div class="owl-carousel arrow-edge arrow-black" data-items="4" data-arrow="true" data-tablet-items="2" data-mobile-items="1">
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/21.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/21.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/22.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/22.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/23.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/23.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/24.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/24.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/15.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/25.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/18.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/11.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
        <div class="hover:parent">
          <img class="w-100 transition-0_3 hover:zoomin" src="{{asset('/')}}public/ahic/img/school/26.jpg" alt="">
          <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
            <a href="{{asset('/')}}public/ahic/img/school/26.jpg" data-fancybox="gallery1" class="iconbox bg-white ti-zoom-in text-primary"></a>
          </div>
        </div>
      </div>
    </div> <!-- END row-->

  </div> <!-- END container-->
</section>

@endsection
