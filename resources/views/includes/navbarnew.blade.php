
  <nav class="ec-nav sticky-top bg-white">
  <div class="container">
    <div class="navbar p-0 navbar-expand-lg">
      <div class="navbar-brand">
        <a class="logo-default" href="{{route('home')}}">
          <div class="" style="float:left;">
            <img alt="" src="{{asset('/')}}public/ahic/img/logo-black.png" class="responsive" width="60">
          </div>
          <div class="marginTop-10" style="float:left; padding-left:15px;">
            <div class="">
              <span class="font-weight-bold" style="color: #dc0102;"> Harbour College </span>
            </div>
            <div style="margin-top:-10px;">
               <small class="text-primary" style="font-size:12px;"> "Where Seekers Become Achievers"</small>

            </div>
          </div>
          </a>
      </div>
      <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>
      <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
        <ul class="nav navbar-nav ec-nav__navbar ml-auto">
          <?php foreach ($menus as $menu): ?>
                             @if ($menu['parent_page']['slug'] =='courses')
                               <li class="nav-item nav-item__has-dropdown">
                                 <a href="{{url('/')}}/{{$menu['parent_page']['slug']}}"  class="nav-link text-capitalize dropdown-toggle course_dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                   {{$menu['name']}}
                                    <span class="caret"></span></a>
                                 <ul class="dropdown-menu ">
                                       @foreach ($cats as $cat)
                                         @php
                                         $name = str_replace(' ', '_', $cat->name);
                                         @endphp
                                         {{-- <li class=""><a href="/{{$menu['parent_page']['slug']}}/{{$name}}" class="nav-link__list"> --}}
                                         <li class=""><a href="{{route('courseCategory',$name)}}" class="nav-link__list">
                                              {{ $cat->name }}</a></li>
                                       @endforeach
                                 </ul>
                               </li>

                                               @elseif (!empty($menu['submenus']))
                                                 <li class="nav-item nav-item__has-dropdown">
                                                   <a href="{{url('/')}}/{{$menu['parent_page']['slug']}}"  class="nav-link text-capitalize dropdown-toggle course_dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                     {{$menu['name']}}
                                                     <span class="caret"></span></a>
                                                     <ul class="dropdown-menu ">
                                                       @foreach ($menu['submenus'] as $submenus)
                                                         {{-- <li class=""><a href="/{{$menu['parent_page']['slug']}}/{{$name}}" class="nav-link__list"> --}}
                                                         <li class=""><a href="{{url('/')}}/{{$menu['parent_page']['slug']}}/{{$submenus['name']}}"  class="nav-link__list">
                                                           {{$submenus['name']}}
                                                         </a></li>
                                                       @endforeach
                                                     </ul>
                                                   </li>

                              @elseif ($menu['parent_page']['slug'] == 'home')
                               <li class="nav-item"><a href="{{url('/')}}" class="nav-link text-capitalize <?= ((\Request::segment(1) == $menu['parent_page']['slug'] || ($menu['parent_page']['slug'] == 'home' && \Request::segment(1) == ''))?'active': ''); ?>">
                                 {{ $menu['name'] }}</a></li>
                                 @else
                                   @if(isset($menu['parent_page']))

                                   @php
                                     // $route = route($menu['parent_page']['slug']);
                                     $route = $menu['parent_page']['slug'];
                                   @endphp
                                   {{-- //issue with route!!!! --}}
                                   @if (Route::has($route))
                                     <li class="nav-item"><a href="{{route($route)}}" class="nav-link text-capitalize <?= ((\Request::segment(1) == $menu['parent_page']['slug'] || ($menu['parent_page']['slug'] == 'home' && \Request::segment(1) == ''))?'active': ''); ?>">
                                       {{ $menu['name'] }}</a></li>
                                     @else
                                       <li class="nav-item"><a href="{{url('/')}}/{{$route}}" class="nav-link text-capitalize <?= ((\Request::segment(1) == $menu['parent_page']['slug'] || ($menu['parent_page']['slug'] == 'home' && \Request::segment(1) == ''))?'active': ''); ?>">
                                         {{ $menu['name'] }}</a></li>
                                   @endif

                                     @else
                                     @endif

                             @endif

                           {{-- @endif --}}
             <?php endforeach; ?>


        </ul>
      </div>

    </div>
  </div> <!-- END container-->
  </nav> <!-- END ec-nav -->


@section('script')


@endsection
