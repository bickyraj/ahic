@extends('layouts.master')
@section('style')
<style media="screen">
    .bg-cover{
/*background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;*/
background:url('{{asset('/')}}public/images/courses/default-bg.png') no-repeat;
background-position:center;
background-size:cover;
}
</style>
@endsection
@section('content')
<div class="padding-y-60 bg-cover" data-dark-overlay="6">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 my-2 text-white">
                <ol class="breadcrumb breadcrumb-double-angle bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
                    <li class="breadcrumb-item"> {{ str_replace('_', ' ', \Request::segment(2)) }}</li>
                </ol>
                <h2 class="h1">
                    {{ str_replace('_', ' ', \Request::segment(2)) }}
                </h2>
            </div>
        <!--     <form class="col-lg-5 my-2 ml-auto" action="{{route('search')}}" method="POST">
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
            </form> -->
        </div>
    </div>
</div>
<section class="mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <ul class="nav flex-column tab-state-primary mb-3 justify-content-center bg-light-v2" role="tablist">
                    <li class="nav-item category-nav-item">
                        <a class="<?= ((\Request::segment(2) == "")?'active':''); ?>" data-toggle="tab" href="#Tabs_0; ?>" data-course="" role="tab" aria-selected="false">
                            All
                        </a>
                    </li>
                    @foreach ($categories as $category)
                    @php
                    $stripped = str_replace(' ', '_', $category->name);
                    @endphp
                    <li class="nav-item category-nav-item">
                        <a class="<?= (($stripped == \Request::segment(2))?'active':''); ?>" data-toggle="tab" href="#Tabs_<?= $category->id; ?>" data-course="<?= $stripped; ?>" role="tab" aria-selected="false">
                            <!-- <i class="ti-home d-block mb-1"></i> -->
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div> <!-- END col-12 -->
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                    @if($catgs != null)
                    @foreach ($catgs->courses as $course)
                    @php
                    $stripped = str_replace(' ', '_', $course->name);
                    @endphp
                    <div class="col-lg-4 col-md-4 marginTop-30">
                        <div class="card shadow-v3 hover:parent">
                            @if ($course->background_image)
                            <img class="card-img-top" src="{{asset('/')}}public/images/courses/{{$course->background_image}}" alt="">
                            @else
                            <img class="card-img-top" src="{{asset('/')}}public/front/img/360x220/accounting-2.jpg" alt="" class="img-fluid">
                            @endif
                            <div class="card-body theme-course-card-body">
                                <div class="theme-ribbon-right"></div>
                                <h4 class="category-detail-card-title">
                                    <!-- {{ str_limit($course->name, 28) }} -->
                                    {{ $course->name }}
                                </h4>
                                <p class="text-primary">
                                    {{$course->cricos_code or 'Cricos Code'}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top position-relative p-4">
                                <div class="theme-ribbon-bottom-left"></div>
                                <small><span class="d-inline-block px-2 py-1">
                                                                    <i class="far fa-clock" style="color: #a7a7a7;"></i>
                                                                    @php
                                                                    $string = explode(' ',$course->duration);
                                                                    $slug = str_replace(' ', '_', $course->name);
                                                                    @endphp
                                                                    @if (isset($string[0]))
                                                                    {{$string[0]}}
                                                                    @endif
                                                                    @if (isset($string[1]))
                                                                    {{$string[1]}}
                                                                    @endif
                                                                </span></small>
                                <a href="{{route('course',$slug)}}" class="btn btn-primary btn-sm left-20">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <script>
                    window.location.href = "{{route('courses')}}"
                    </script>
                    @endif
                </div>
                <div class="row py-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?= $catgs['description']; ?>
                    </div>
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
<section class="padding-y-30 course-page-bottom-block bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <h6 class="text-center">Study in Sydney CBD</h6>
                <div class="page-block">
                    
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <h6 class="text-center">Living in Sydney</h6>
                <div class="page-block">
                    
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <h6 class="text-center">Explore Australia</h6>
                <div class="page-block">
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = $(e.target).data('course') // activated tab
        var v = target;
        if (v == "") {
            var l = '{{url('/')}}/courses';
            window.location.href = l;
        } else {
            window.location.replace(v);
        }
    });

});
// function changeCategory(el){
//   var v = el.value;
//   // var host = window.location.hostname + '/cms/';
//   window.location.replace(v);

// }
</script>
@endsection