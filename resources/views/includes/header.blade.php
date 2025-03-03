@if ($contact)


    <header class="site-header bg-dark text-white-0_5" style="height: 40px;">
      <div class="container">
        <div class="row align-items-center justify-content-between mx-0" style="line-height: 0px;">
          <ul class="list-inline d-none d-lg-block mb-0 theme-header-social-ul">
            <li class="list-inline-item mr-3">
             <div class="d-flex align-items-center">
              <i class="ti-email mr-2"></i>
              @if ($contact['email'])
                <a href="mailto:{{$contact['email']}}">{{$contact['email']}}</a>
              @endif
             </div>
            </li>
            <li class="list-inline-item mr-3">
             <div class="d-flex align-items-center">
              <i class="ti-mobile mr-2"></i>
              @if ($contact['phone'])
                <a href="tel:{{$contact['phone']}}">{{$contact['phone']}}</a>
              @endif
             </div>
            </li>
          </ul>
          <ul class="list-inline mb-0 theme-header-social-ul theme-social-ul">
            @if (isset($contact['fb']))
              <li class="list-inline-item">
                <a href="{{$contact['fb']}}"><i class="ti-facebook"></i></a>
              </li>
            @endif
            @if (isset($contact['tw']))
              <li class="list-inline-item">
                <a href="{{$contact['tw']}}"><i class="ti-twitter"></i></a>
              </li>
            @endif
            @if (isset($contact['in']))
              <li class="list-inline-item">
                <a href="{{$contact['in']}}"><i class="ti-instagram"></i></a>
              </li>
            @endif
            @if (isset($contact['yt']))
              <li class="list-inline-item">
                <a href="{{$contact['yt']}}"><i class="ti-youtube"></i></a>
              </li>
            @endif

          </ul>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a class="mr-0 border-right border-left border-white-0_1 theme-login" href="https://learner.mywisenet.com.au/AHI/Account/LogOn?ReturnUrl=%2FAHI" target="_blank">My AHIC Login</a>
              <!-- <a href="#" target="_blank">My AHIC Login</a> -->
            </li>
            <!-- <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">
              <a href="page-signup.html">Register</a>
            </li> -->
          </ul>
        </div> <!-- END END row-->
      </div> <!-- END container-->
    </header><!-- END site header-->

@endif
