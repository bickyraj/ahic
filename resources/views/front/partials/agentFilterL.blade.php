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
  <p> No Agents Found In The Location</p>
    {{-- {{$agenta}} --}}
@endforelse
