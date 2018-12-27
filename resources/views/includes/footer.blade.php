@if ($contact)
  <footer class="site-footer">
    <div class="footer-top bg-dark text-white-0_6 pt-5 paddingBottom-100">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 mt-5">
           <img src="{{asset('/')}}public/ahic/img/logo-black.png" alt="Logo" width="55"> {{$contact['name']}}
           <div class="margin-y-40">
             <p>
              ABN: {{$contact['ABN']}} <br> RTO NO:{{$contact['RTO']}} <br> CRICOS Provider Code: {{$contact['CRICOS']}}
            </p>
           </div>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['fb']}}"><i class="ti-facebook"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['tw']}}"><i class="ti-twitter"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['in']}}"><i class="ti-instagram"> </i></a></li>
              <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{$contact['yt']}}"><i class="ti-youtube"></i></a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mt-5">
            <h4 class="h5 text-white">Contact Us</h4>
            <div class="width-3rem bg-primary height-3 mt-3"></div>
            <ul class="list-unstyled marginTop-40">
              <li class="mb-3"><i class="ti-headphone mr-3"></i><a href="tel:+8801740411513">{{$contact['phone']}} </a></li>
              <li class="mb-3"><i class="ti-email mr-3"></i><a href="mailto:{{$contact['email']}}">{{$contact['email']}}</a></li>
              <li class="mb-3">
               <div class="media">
                <i class="ti-location-pin mt-2 mr-3"></i>
                <div class="media-body">
                  <span>{{$contact['address']}} {{$contact['street_name']}}</span>
                </div>
               </div>
              </li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 mt-5">
            <h4 class="h5 text-white">Quick links</h4>
            <div class="width-3rem bg-primary height-3 mt-3"></div>
            <ul class="list-unstyled marginTop-40">
              @foreach ($menus as $menu)
                @if(isset($menu['parent_page']))
                  @php
                     $route = route($menu['parent_page']['slug']);
                  @endphp
                  @if ($menu['name'] =="home")

                    @else
                      <li class="mb-2 text-capitalize"><a href="{{$route}}">{{$menu['name']}}</a></li>

                  @endif
                @endif

              @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <h4 class="h5 text-white">Newsletter</h4>
            <div class="width-3rem bg-primary height-3 mt-3"></div>
            <div class="marginTop-40">
              <p class="mb-4">Subscribe to get update and information. Don't worry, we won't send spam!</p>
              <form class="marginTop-30" action="#" method="POST">
                <div class="input-group">
                  <input type="text" placeholder="Enter your email" class="form-control py-3 border-white" required="">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </div>
                </div>
              </form>
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
