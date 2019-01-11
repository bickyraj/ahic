@extends('layouts.master')

@section('style')
<style media="screen">
  .py-5.bg-cover{
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position:center;
    background-size:cover;
  }
  #mapModal{
    z-index: 9999 !important;
    padding: 0px !important;
    height: 600px !important;

  }
  #map{
    position: static !important;
    height:100%;
    width:100%;
  }
  .modal{
    max-width: 100% !important;
  }
</style>
@endsection

@section('content')

    <div class="py-5 bg-cover text-white" data-dark-overlay="5" >
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


    <section class="padding-y-100 border-bottom border-white bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">

           <ul class="nav tab-line tab-line tab-line--3x border-bottom mb-4" role="tablist">
             <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab" aria-selected="true">
                Onshore
              </a>
             </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
                OffShore
              </a>
             </li>

           </ul>

            <div class="tab-content">
              <div class="tab-pane fade show active" id="Tabs_4-1" role="tabpanel">

              <div class="row">
                @php
                  $count = 0;
                @endphp
                @foreach ($agents as $agent)
                  @foreach ($agent->documents as $company)
                    @if ($company->country == 'Australia')
                      <div class="col-lg-4 col-md-6 marginTop-35 wow fadeInUp" data-wow-delay=".1s">
                        <div class="card height-100p shadow-v1 text-center">
                          <span class="iconbox iconbox-lg rounded  mx-auto" data-offset-top-md="-25">
                          @if($agent->logo != null)
                              <img src="{{asset('/')}}public/images/agents/{{$agent->logo}}" alt="" class="img-fluid">
                           @else
                             <img src="{{asset('/')}}public/ahic/img/logo-black.png" alt="" class="">

                         @endif
                       </span>
                          <div class="card-body">
                            <h4>
                            {{$agent->first_name}} {{$agent->last_name}}
                            </h4>
                            <p class="mb-1">
                              {{$company->company_name}}
                            </p>
                            <p class="mb-0 ">
                              {{$company->address}}
                            </p>
                          </div>
                          <div class="card-footer border-top">
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
                              <button class="btn btn-primary mt-2 mapModal"  data-address="{{$company->address}}">
                                View Map
                              </button>
                          </div>
                        </div>
                      </div> <!-- END col-lg-3 col-md-6-->
                    @endif
                  @endforeach
                @endforeach


              </div>
            </div>
              <div class="tab-pane fade" id="Tabs_4-2" role="tabpanel">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-3">
                      <div class="form-group">
                        <select name="country" class="form-control country_filter">
                          <option value="" selected> SELECT A COUNTRY</option>
                            @foreach ($countries as $country)
                              @if ($country->name == 'Australia')
                              @else
                                <option  value="{{$country->name}}">{{$country->name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <select name="country" class="form-control address_filter">
                          <option value="" selected> SELECT A LOCATION</option>
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
                          <div class="card height-100p shadow-v1 text-center">
                            <span class="iconbox iconbox-lg rounded  mx-auto" data-offset-top-md="-25">
                            @if($agent->logo != null)
                                <img src="{{asset('/')}}public/images/agents/{{$agent->logo}}" alt="" class="img-fluid">
                             @else
                               <img src="{{asset('/')}}public/ahic/img/logo-black.png" alt="" class="">

                           @endif
                         </span>
                            <div class="card-body">
                              <h4>
                              {{$agent->first_name}} {{$agent->last_name}}
                              </h4>
                              <p class="mb-1">
                                {{$company->company_name}}
                              </p>
                              <p class="mb-0 ">
                                {{$company->address}}
                              </p>
                            </div>
                            <div class="card-footer border-top">
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
                              <button class="btn btn-primary mt-2 mapModal"  data-address="{{$company->address}}">
                                View Map
                              </button>
                            </div>
                          </div>
                        </div> <!-- END col-lg-3 col-md-6-->
                      @endif
                    @endforeach
                  @endforeach

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


  <script>
  $(document).ready(function() {
//reset select options
    $('.country_filter').prop('selectedIndex',0);
    $('.address_filter').prop('selectedIndex',0);

//trigger country filter and display new contnt as response
    $('.country_filter').change(function(event) {
      var value = $(this).val();

        $.post('{{url('/')}}/agents/country_filter',{id:value},function(data){
            $('#filterDataContent').html(data);
        })

        $.post('{{url('/')}}/agents/country_filter/locations',{id:value},function(data){
            $('.address_filter').html(data);
        })


    });
    // response for location change trigger
    $('.address_filter').change(function(event) {
      var value = $(this).val();
      $.post('{{url('/')}}/agents/address_filter',{id:value},function(data){
          $('#filterDataContent').html(data);
      })

    });
  });
  </script>
  {{-- //map stuff  --}}

  <script>
  $(document).ready(function() {

    $('.mapModal').click(function(e){
      e.preventDefault();

      var address = $(this).data('address');
      var geocoder = new google.maps.Geocoder();
geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
  var latitude = results[0].geometry.location.lat();
  var longitude = results[0].geometry.location.lng();

  var map;
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat:latitude, lng:longitude},
      zoom: 15,
      styles: [
           {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
           {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
           {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
           {
             featureType: 'administrative.locality',
             elementType: 'labels.text.fill',
             stylers: [{color: '#d59563'}]
           },
           {
             featureType: 'poi',
             elementType: 'labels.text.fill',
             stylers: [{color: '#d59563'}]
           },
           {
             featureType: 'poi.park',
             elementType: 'geometry',
             stylers: [{color: '#263c3f'}]
           },
           {
             featureType: 'poi.park',
             elementType: 'labels.text.fill',
             stylers: [{color: '#6b9a76'}]
           },
           {
             featureType: 'road',
             elementType: 'geometry',
             stylers: [{color: '#38414e'}]
           },
           {
             featureType: 'road',
             elementType: 'geometry.stroke',
             stylers: [{color: '#212a37'}]
           },
           {
             featureType: 'road',
             elementType: 'labels.text.fill',
             stylers: [{color: '#9ca5b3'}]
           },
           {
             featureType: 'road.highway',
             elementType: 'geometry',
             stylers: [{color: '#746855'}]
           },
           {
             featureType: 'road.highway',
             elementType: 'geometry.stroke',
             stylers: [{color: '#1f2835'}]
           },
           {
             featureType: 'road.highway',
             elementType: 'labels.text.fill',
             stylers: [{color: '#f3d19c'}]
           },
           {
             featureType: 'transit',
             elementType: 'geometry',
             stylers: [{color: '#2f3948'}]
           },
           {
             featureType: 'transit.station',
             elementType: 'labels.text.fill',
             stylers: [{color: '#d59563'}]
           },
           {
             featureType: 'water',
             elementType: 'geometry',
             stylers: [{color: '#17263c'}]
           },
           {
             featureType: 'water',
             elementType: 'labels.text.fill',
             stylers: [{color: '#515c6d'}]
           },
           {
             featureType: 'water',
             elementType: 'labels.text.stroke',
             stylers: [{color: '#17263c'}]
           }
         ]

    });

    }
});

      $('#mapModal').modal({
        fadeDuration: 250
      });

    })
  });
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzQSFe_kpl4XGNUruHsH2dLXN3nXgOpY"
    async defer></script>

@endsection
