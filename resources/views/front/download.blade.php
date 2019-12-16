@extends('layouts.master')
@section('style')
<style media="screen">
    .py-5.bg-cover{
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position:center;
    background-size:cover;
  }
</style>
@endsection
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
<div class="py-5 bg-cover text-white" data-dark-overlay="5" s>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Downloads</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Downloads
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="padding-y-30 border-bottom border-white bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card height-100p shadow-v1 text-center">
                    <div class="card-body">
                      <div class="table-responsive my-4">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col" class="font-weight-semiBold">SN</th>
                              <th scope="col">Name</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $n = 0; ?>
                              @foreach($downloads as $download)
                                <tr>
                                  <th scope="row" class="font-weight-semiBold">{{ ++$n }}</th>
                                  <td>{{$download->title}}</td>
                                  <td>
                                      @if($download->file)
                                      <a download href="{{ url('') }}/public/files/{{ $download->file }}" target="_blank"> <button class="btn btn-primary mr-3 mb-3">Download Now</button> </a>
                                      @else
                                      <button class="btn btn-primary mr-3 mb-3 btn-disabled" disabled>
                                          No File
                                      </button>
                                      @endif
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection