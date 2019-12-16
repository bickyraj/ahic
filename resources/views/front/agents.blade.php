@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('/')}}public/front/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="{{asset('/')}}public/front/vendor/toastr/toastr.min.css">
<style media="screen">
.py-5.bg-cover {
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position: center;
    background-size: cover;
}

#mapModal {
    z-index: 2222 !important;
    padding: 0px !important;
    height: 600px !important;

}

#map {
    position: static !important;
    height: 100%;
    width: 100%;
    z-index: 2222 !important;


}

.modal {
    max-width: 100% !important;
}
</style>
@endsection
@section('content')
<div class="py-5 bg-cover text-white" data-dark-overlay="5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Agents</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Agents
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="padding-y-30 border-bottom border-white bg-light">
    <div class="container">
        <div class="row">
<!--             @if(Session::get('success_message'))
                <div class="col">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times gray"></i></span><span
                                    class="sr-only">Close</span></button>
                        {!! Session::get('success_message') !!}
                    </div>
                </div>
            @endif -->
            <div class="col-12">
                <ul class="nav tab-line tab-line tab-line--3x border-bottom mb-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab" aria-selected="true">
                            Authorized Agent For Australia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
                            Authorized International Agent
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Tabs_4-3" role="tab" aria-selected="true">
                            Become Agent
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Tabs_4-1" role="tabpanel">
                        <div class="row">
                            @php
                                $count = 0;
                            @endphp
                            @if($agents)
                                @foreach ($agents as $agent)
                                    @foreach ($agent->documents as $company)
                                        @if ($company->country == 'Australia')
                                            @php
                                                $count++;
                                            @endphp
                                            <div class="col-lg-4 col-md-6 marginTop-35 wow fadeInUp position-relative" data-wow-delay=".1s">
                                                <div class='business-card'>
                                                  <div class='bc__logo'>
                                                    {{-- <figure><i></i></figure> --}}
                                                    <h2>{{$company->company_name}}</h2>
                                                  </div>
                                                  <div class='bc__tagline'>
                                                    <p>{{$agent->first_name}} {{$agent->last_name}}<br>{{$company->location}}</p>
                                                  </div>
                                                </div>
                                                <!-- <div class="card height-100p shadow-v1 text-center">
                                                    {{-- <span class="iconbox iconbox-lg rounded  mx-auto" data-offset-top-md="-25">
                                                        @if($agent->logo != null)
                                                        <img src="{{asset('/')}}public/images/agents/{{$agent->logo}}" alt="" class="img-fluid">
                                                        @else
                                                        <img src="{{asset('/')}}public/front/img/logo-black.png" alt="" class="">
                                                        @endif
                                                    </span> --}}
                                                    <div class="card-body">
                                                        <h4>
                                                            {{$agent->first_name}} {{$agent->last_name}}
                                                        </h4>
                                                        <p class="mb-1">
                                                            {{$company->company_name}}
                                                        </p>
                                                        <p class="mb-0 ">
                                                            {{$company->location}}
                                                        </p>
                                                    </div>
                                                   {{--  <div class="card-footer border-top">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item mr-0 px-2">
                                                                <a href="mailto:{{$agent->email}}">{{$agent->email}}</a><br>
                                                                @if ($agent->telephone)
                                                                {{$agent->telephone}}
                                                                @endif
                                                                @if ($agent->telephone && $agent->mobile_no)
                                                                /
                                                                @endif
                                                                @if ($agent->mobile_no)
                                                                {{$agent->mobile_no}}
                                                                @endif
                                                            </li>
                                                        </ul>
                                                        <button class="btn btn-primary mt-2 mapModal" data-companyname="{{ $company->company_name }}" data-address="{{$company->address}}">
                                                            View Map
                                                        </button>
                                                    </div> --}}
                                                </div> -->
                                            </div> <!-- END col-lg-3 col-md-6-->
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                <p>No Agents Onshore Yet</p>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Tabs_4-2" role="tabpanel">
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="country" class="form-control form-control-sm country_filter">
                                        <option value="" selected> All Countries</option>
                                        @foreach ($countries as $country)
                                        @if ($country->name == 'Australia')
                                        @else
                                        <option value="{{$country->name}}">{{$country->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="country" class="form-control form-control-sm address_filter">
                                        <option value="" selected> All Location</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="filterDataContent">
                            @php
                            $count = 0;
                            @endphp
                            @foreach ($agents as $agent)
                            @foreach ($agent->documents as $company)
                            @if ($company->country != 'Australia')
                            <div class="col-lg-4 col-md-6 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
                                <div class='business-card'>
                                  <div class='bc__logo'>
                                    {{-- <figure><i></i></figure> --}}
                                    <h2>{{$company->company_name}}</h2>
                                  </div>
                                  <div class='bc__tagline'>
                                    <p>{{$agent->first_name}} {{$agent->last_name}}<br>{{$company->location}}</p>
                                  </div>
                                </div>
                                <!-- <div class="card height-100p shadow-v1 text-center">
                                    {{-- <span class="iconbox iconbox-lg rounded  mx-auto" data-offset-top-md="-25">
                                        @if($agent->logo != null)
                                        <img src="{{asset('/')}}public/images/agents/{{$agent->logo}}" alt="" class="img-fluid">
                                        @else
                                        <img src="{{asset('/')}}public/front/img/logo-black.png" alt="" class="">
                                        @endif
                                    </span> --}}
                                    {{-- <div class="card-body">
                                        <h4>
                                            {{$agent->first_name}} {{$agent->last_name}}
                                        </h4>
                                        <p class="mb-1">
                                            {{$company->company_name}}
                                        </p>
                                        <p class="mb-0 ">
                                            {{$company->location}}
                                        </p>
                                    </div> --}}
                                    {{-- <div class="card-footer border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mr-0 px-2">
                                                <a href="mailto:{{$agent->email}}">{{$agent->email}}</a><br>
                                                @if ($agent->telephone)
                                                {{$agent->telephone}}
                                                @endif
                                                @if ($agent->telephone && $agent->mobile_no)
                                                /
                                                @endif
                                                @if ($agent->mobile_no)
                                                {{$agent->mobile_no}}
                                                @endif
                                            </li>
                                        </ul>
                                        <button class="btn btn-primary mt-2 mapModal" data-companyname="{{ $company->company_name }}" data-address="{{$company->address}}">
                                            View Map
                                        </button>
                                    </div> --}}
                                </div> -->
                            </div> <!-- END col-lg-3 col-md-6-->
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Tabs_4-3" role="tabpanel">
                        <div class="row py-2" style="background-color: white;">
                            <div class="col">
                                <form class="form" method="POST" action="{{ route('agents.store') }}" enctype="multipart/form-data">
                                    {{ @csrf_field()}}
                                  <div class="form-group">
                                    <label for="">ABN / Registration No / PAN </label>
                                    <input type="text" name="pan" class="form-control form-control-sm" placeholder="" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="text" name="start_date" class="form-control datepicker" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" name="logo" class="form-control form-control-sm">
                                  </div>
                                  <div class="form-group">
                                    <label for="">First Name </label>
                                    <input type="text" name="first_name" class="form-control form-control-sm" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Last Name </label>
                                    <input type="text" name="last_name" class="form-control form-control-sm" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Telephone </label>
                                    <input type="text" name="telephone" class="form-control form-control-sm" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Mobile Number </label>
                                    <input type="text" name="mobile_no" class="form-control form-control-sm" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control form-control-sm" placeholder="" required>
                                  </div>
                                  <div>
                                      <input type="submit" value="Submit" class="btn btn-sm btn-primary" required>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- END tab-content-->
            </div> <!-- END col-12 -->
        </div> <!-- END row-->
    </div> <!-- END container-->
</section> <!-- END section-->
<div id="mapModal" class="modal">
    <div id="map"></div>
</div>
@endsection
@section('script')
<script src="{{asset('/')}}public/front/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"> </script>
<script src="{{asset('/')}}public/front/vendor/toastr/toastr.min.js"> </script>
<script>
$(document).ready(function() {
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd'
    });
    //reset select options
    $('.country_filter').prop('selectedIndex', 0);
    $('.address_filter').prop('selectedIndex', 0);

    //trigger country filter and display new contnt as response
    $('.country_filter').change(function(event) {
        var value = $(this).val();
        var url = '{{ url('') }}/agents/country_filter';
        $.post(url, { id: value }, function(data) {
            $('#filterDataContent').html(data);
        })

        var url = '{{ url('') }}/agents/country_filter/locations';
        $.post(url, { id: value }, function(data) {
            $('.address_filter').html(data);
        })


    });
    // response for location change trigger
    $('.address_filter').change(function(event) {
        var value = $(this).val();
        $.post('{{url('')}}/agents/address_filter', { id: value }, function(data) {
            $('#filterDataContent').html(data);
        })

    });
});
</script>
{{-- //map stuff --}}
<script>
$(document).ready(function() {
    var success_message = '<?php echo Session::get("success_message");?>';

    if (success_message) {
        toastr.success('<?php echo Session::get("success_message");?>');
    }

    $('.mapModal').click(function(e) {
        e.preventDefault();

        var address = $(this).data('address');
        var self = $(this);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                var map;
                var center = { lat: latitude, lng: longitude };
                map = new google.maps.Map(document.getElementById('map'), {
                    center: center,
                    zoom: 15,
                    // styles: [
                    //     { elementType: 'geometry', stylers: [{ color: '#242f3e' }] },
                    //     { elementType: 'labels.text.stroke', stylers: [{ color: '#242f3e' }] },
                    //     { elementType: 'labels.text.fill', stylers: [{ color: '#746855' }] },
                    //     {
                    //         featureType: 'administrative.locality',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#d59563' }]
                    //     },
                    //     {
                    //         featureType: 'poi',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#d59563' }]
                    //     },
                    //     {
                    //         featureType: 'poi.park',
                    //         elementType: 'geometry',
                    //         stylers: [{ color: '#263c3f' }]
                    //     },
                    //     {
                    //         featureType: 'poi.park',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#6b9a76' }]
                    //     },
                    //     {
                    //         featureType: 'road',
                    //         elementType: 'geometry',
                    //         stylers: [{ color: '#38414e' }]
                    //     },
                    //     {
                    //         featureType: 'road',
                    //         elementType: 'geometry.stroke',
                    //         stylers: [{ color: '#212a37' }]
                    //     },
                    //     {
                    //         featureType: 'road',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#9ca5b3' }]
                    //     },
                    //     {
                    //         featureType: 'road.highway',
                    //         elementType: 'geometry',
                    //         stylers: [{ color: '#746855' }]
                    //     },
                    //     {
                    //         featureType: 'road.highway',
                    //         elementType: 'geometry.stroke',
                    //         stylers: [{ color: '#1f2835' }]
                    //     },
                    //     {
                    //         featureType: 'road.highway',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#f3d19c' }]
                    //     },
                    //     {
                    //         featureType: 'transit',
                    //         elementType: 'geometry',
                    //         stylers: [{ color: '#2f3948' }]
                    //     },
                    //     {
                    //         featureType: 'transit.station',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#d59563' }]
                    //     },
                    //     {
                    //         featureType: 'water',
                    //         elementType: 'geometry',
                    //         stylers: [{ color: '#17263c' }]
                    //     },
                    //     {
                    //         featureType: 'water',
                    //         elementType: 'labels.text.fill',
                    //         stylers: [{ color: '#515c6d' }]
                    //     },
                    //     {
                    //         featureType: 'water',
                    //         elementType: 'labels.text.stroke',
                    //         stylers: [{ color: '#17263c' }]
                    //     }
                    // ]

                });
                var marker = new google.maps.Marker({
                    position: center,
                    map: map,
                    title: self.data('companyname')
                });

            }
        });

        $('#mapModal').modal({
            fadeDuration: 250
        });

    })
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzQSFe_kpl4XGNUruHsH2dLXN3nXgOpY" async defer></script>
@endsection