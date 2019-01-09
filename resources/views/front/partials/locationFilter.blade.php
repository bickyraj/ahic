<option value="" selected> SELECT A ADDRESS</option>
  @foreach ($locations as $location)
      <option value="{{$location->location}}">{{$location->location}}</option>
  @endforeach
