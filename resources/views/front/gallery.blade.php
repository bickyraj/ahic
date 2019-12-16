@extends('layouts.master')
@section('content')
<div class="py-5 bg-cover text-white" data-dark-overlay="5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Galleries</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Galleries
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="padding-y-100 border-bottom border-light">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12 text-center mb-5">
                <h4>Gallery - <span class="text-primary">01</span></h4>
            </div> --}}
            <div class="col-12 text-center">
                <ul class="nav tab-line tab-line--2x border-bottom mb-4 nav-isotop-filter">
                    <a class="nav-item nav-link active" href="#" data-filter="*">
                        All
                    </a>
                    @foreach($categories as $category)
                    <a class="nav-item nav-link" href="#" data-filter=".category_<?= $category->id; ?>">
                        {{ $category->name }} 
                    </a>
                    @endforeach
                </ul>
            </div> <!-- END col-12 -->
        </div> <!-- END row-->
        <div class="row isotop-filter">
            @foreach($galleries as $gallery)
                <div class="col-lg-4 col-md-6 marginTop-30 category_{{ $gallery->gallery_category_id }}">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="{{ asset('/')}}public/images/gallery/{{$gallery->image }}" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="{{ asset('/')}}public/images/gallery/{{$gallery->image }}" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>

@endsection