@forelse ($agents as $agenta)
  @php
    $company = $agenta;
    $agent = $company->agent;
  @endphp
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

@empty
  <p> No Agents Found In The Country</p>
    {{-- {{$agenta}} --}}
@endforelse


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
