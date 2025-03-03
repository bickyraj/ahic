@if ($contact)
<style type="text/css">
  .footer-sponser-ul {
    padding: 0px; list-style-type: none; margin: 0px;
    /*margin-top: 50px !important;*/
  }
  .footer-sponser-ul li {
    width: 140px;
    padding: 13px;
    background-color: white;
    margin-bottom: 15px;
    border-radius: 3px;
  }
</style>
  <footer class="site-footer">
    <div class="footer-top bg-dark text-white-0_6 pt-5 paddingBottom-50">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-5 mt-3">
           <!-- <img src="{{asset('/')}}public/front/img/logo-black.png" alt="Logo" width="55"> {{$contact['name']}} -->
           <h4 class="h5 text-white">Australian Harbour International College</h4>
           <div class="margin-y-20">
             <p>
              ABN: {{$contact['ABN']}} <br> RTO NO:{{$contact['RTO']}} <br> CRICOS Provider Code: {{$contact['CRICOS']}}
            </p>
           </div>
           <ul class="footer-sponser-ul">
             <li>
              <img src="{{asset('/')}}public/images/sponsers/sponser1.jpg" alt="img">
             </li>
             <!-- <li>
              <img src="{{asset('/')}}public/images/sponsers/sponser2.jpg" alt="img">
             </li> -->
           </ul>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['fb']}}"><i class="ti-facebook"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['tw']}}"><i class="ti-twitter"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['in']}}"><i class="ti-instagram"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['yt']}}"><i class="ti-youtube"></i></a></li>
            </ul>
          </div>
          
          {{-- <div class="col-lg-2 col-md-6 mt-3">
            <ul class="footer-sponser-ul">
              <li>
               <img src="{{asset('/')}}public/images/sponsers/sponser1.jpg" alt="img">
              </li>
              <!-- <li>
               <img src="{{asset('/')}}public/images/sponsers/sponser2.jpg" alt="img">
              </li> -->
            </ul>
          </div> --}}

          <div class="col-lg-3 col-md-3 mt-3">
            <h4 class="h5 text-white">Contact Us</h4>
            <div class="width-3rem bg-white height-3 mt-3"></div>
            <ul class="list-unstyled marginTop-40 theme-footer-ul">
              <li class="mb-1"><i class="ti-mobile mr-3"></i><a href="tel:+8801740411513">{{$contact['phone']}} </a></li>
              <li class="mb-1"><i class="ti-email mr-3"></i><a href="mailto:{{$contact['email']}}">{{$contact['email']}}</a></li>
              <li class="mb-1">
               <div class="media">
                <i class="ti-location-pin mt-2 mr-3"></i>
                <div class="media-body">
                  <span>{{$contact['street_name']}}, {{$contact['address']}} </span>
                </div>
               </div>
              </li>
            </ul>
          </div>

          <!-- <div class="col-lg-2 col-md-6 mt-3">
            <h4 class="h5 text-white">Quick links</h4>
            <div class="width-3rem bg-white height-3 mt-3"></div>
            <ul class="list-unstyled marginTop-40">
              @foreach ($menus as $menu)
                @if(isset($menu['parent_page']))
                  @php
                     $name= $menu['parent_page']['name'];
                     $name = strTolower($name);
                     $slug = str_replace(' ', '-', $name);
                     $route = route('home').'/'. $slug;
                  @endphp
                  @if ($menu['name'] =="home")
          
                    @else
                      <li class="mb-2 text-capitalize"><a href="{{$route}}">{{$menu['name']}}</a></li>
          
                  @endif
                @endif
          
              @endforeach
            </ul>
          </div> -->

          <div class="col-lg-4 col-md-4 mt-3">
            <h4 class="h5 text-white">Newsletter</h4>
            <div class="width-3rem bg-white height-3 mt-3"></div>
            <div class="marginTop-40">
              <p class="mb-4">Subscribe to get update and information. Don't worry, we won't send spam!</p>
                <div class="input-group">
                  <input type="text" placeholder="Enter your email"id="subscribe_email" class="form-control py-3 border-white" >
                  <div class="input-group-append">
                    <button class="btn btn-primary subscribe_btn" type="button">Subscribe</button>
                  </div>
                </div>
                <p class="text-danger email_val"></p>
            </div>
          </div>

        </div> <!-- END row-->
      </div> <!-- END container-->
    </div> <!-- END footer-top-->

    <div class="footer-bottom bg-black-0_9 py-5 text-center">
      <div class="container">
        <p class="text-white-0_5 mb-0">&copy; 2018 AHIC. All rights reserved. Created by <a href="https://innologysolution.com/" target="_blunk">Innology Solution</a></p>
      </div>
    </div>  <!-- END footer-bottom-->
  </footer> <!-- END site-footer -->


  <div class="scroll-top">
    <i class="ti-angle-up"></i>
  </div>

@endif
