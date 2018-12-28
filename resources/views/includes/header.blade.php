@if ($contact)


    <header class="site-header bg-dark text-white-0_5">
      <div class="container">
        <div class="row align-items-center justify-content-between mx-0">
          <ul class="list-inline d-none d-lg-block mb-0">
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
              <i class="ti-headphone mr-2"></i>
              @if ($contact['phone'])
                <a href="tel:{{$contact['phone']}}">{{$contact['phone']}}</a>
              @endif
             </div>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            @if (isset($contact['fb']))
              <li class="list-inline-item mr-0 p-3  border-left border-white-0_1">
                <a href="https://{{$contact['fb']}}"><i class="ti-facebook"></i></a>
              </li>
            @endif
            @if (isset($contact['tw']))
              <li class="list-inline-item mr-0 p-3 border-left  border-white-0_1">
                <a href="https://{{$contact['tw']}}"><i class="ti-twitter"></i></a>
              </li>
            @endif
            @if (isset($contact['in']))
              <li class="list-inline-item mr-0 p-3 border-left border-white-0_1">
                <a href="https://{{$contact['in']}}"><i class="ti-instagram"></i></a>
              </li>
            @endif
            @if (isset($contact['yt']))
              <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                <a href="https://{{$contact['yt']}}"><i class="ti-youtube"></i></a>
              </li>
            @endif

          </ul>
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
              {{-- <a href="https://learner.mywisenet.com.au/AHI/Account/LogOn?ReturnUrl=/AHI" target="_blank">My AHIC Login</a> --}}
              <a href="#" target="_blank">My AHIC Login</a>
            </li>
            <!-- <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">
              <a href="page-signup.html">Register</a>
            </li> -->
          </ul>
        </div> <!-- END END row-->
      </div> <!-- END container-->
    </header><!-- END site header-->

@endif
