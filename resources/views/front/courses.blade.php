@extends('layouts.master')

@section('style')
<style media="screen">
  .bg-cover{
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position:center;
    background-size:cover;
  }
</style>
@endsection
@section('content')

<div class="padding-y-60 bg-cover" data-dark-overlay="6" >
  <div class="container">
   <div class="row align-items-center">
     <div class="col-lg-6 my-2 text-white">
      <ol class="breadcrumb breadcrumb-double-angle bg-transparent p-0">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
        <li class="breadcrumb-item">All Courses</li>
      </ol>
      <h2 class="h1">
        All AHIC Courses
      </h2>

     </div>
     <form class="col-lg-5 my-2 ml-auto" action="{{route('search')}}" method="POST">
       {{csrf_field()}}
       <div class="input-group bg-white rounded p-1">
         <input type="text" class="form-control border-white" placeholder="What do you want to learn?" required="" name="search_term">
         <div class="input-group-append">
           <button class="btn btn-info rounded" type="submit">
             Search
             <i class="ti-angle-right small"></i>
           </button>
         </div>
       </div>
     </form>
   </div>
  </div>
</div>




<section class="py-3 position-relative shadow-v1">
  <div class="container">
    <form class="row">
      <div class="col-md-9 my-2"></div>
      <div class="col-md-3 my-2">
        <ul class="list-inline">
          <li class="list-inline-item my-2">
            <select class="form-control" onchange="changeCategory(this)">
              <option selected>Select Category</option>
              @foreach ($categories as $category)
                @php
                  $stripped = str_replace(' ', '_', $category->name);
                @endphp
              <option
                    @if ($stripped == \Request::segment(2))
                      selected
                    @endif
                      value="{{$stripped}}">
                      {{$category->name}}
             </option>
            @endforeach

            </select>
          </li>
        </ul>
      </div>
    </form> <!-- END row-->
  </div> <!-- END container-->
</section>




<section class="padding-y-60 bg-light-v2">
  <div class="container">
    <div class="col-md-12">
      @forelse ($categories as $category)
        <h1 class="pt-4">{{$category->name}}</h1>
        <div class="row mb-4">
          @if (count($category->courses) > 0 )
            @else
              <p> No matcing courses were found. </p>
          @endif
          @foreach ($category->courses as $course)
            @php
              $stripped = str_replace(' ', '_', $course->name);
            @endphp
            <div class="col-lg-4 col-md-6 marginTop-30">
              <div href="{{route('course',$course->name)}}" class="card height-100p text-gray shadow-v1">
                {{-- <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/business-1.jpg" alt=""> --}}
                @if($course->background_image)
                  <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="">
    @else
      <img class="card-img-top" src="{{asset('/')}}public/ahic/img/360x220/accounting-2.jpg" alt="" class="img-fluid">

                @endif
                <div class="card-body">

                  <a href="{{route('course',$stripped)}}" class="h5">
                    {{$course->name}}
                  </a>
                  <p class="my-3">
                    {{$course->category->name or '-'}}
                  </p>

                </div>
                <div class="card-footer media align-items-center justify-content-between">
                    <h4 class="h5 text-right ">
                    <span class="text-primary">
                      @php
                        $string = explode(' ',$course->duration);
                      @endphp
                        @if(isset($string[0]))
                      {{$string[0]}}
                      @endif
                        @if(isset($string[1]))
                      {{$string[1]}}
                      @endif

                      </span>
                  </h4>
                </div>
              </div>
            </div>
          @endforeach

        </div> <!-- END row-->

      @empty

      @endforelse
    </div>

  </div> <!-- END container-->
</section>
@endsection

@section('script')
<script type="text/javascript">
  function changeCategory(el){
    var v = el.value;
    var a = window.location.hostname;
    var l = '{{url('/')}}/courses/'+v;
    window.location.href = l;

  }



</script>
@endsection
