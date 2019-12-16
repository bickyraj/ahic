<option value="" selected> All Locations</option>
  @foreach ($locations as $location)
      <option value="{{$location->location}}">{{$location->location}}</option>
  @endforeach
