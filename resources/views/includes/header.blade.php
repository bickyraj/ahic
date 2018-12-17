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
            <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
              <a href="{{$contact['facebook']}}"><i class="ti-facebook"></i></a>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
              <a href="{{$contact['twitter']}}"><i class="ti-twitter"></i></a>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
              <a href="{{$contact['in']}}"><i class="ti-vimeo"></i></a>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
              <a href="{{$contact['pin']}}"><i class="ti-linkedin"></i></a>
            </li>
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
