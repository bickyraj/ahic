  <option value=""> Select A Date</option>
@foreach ($dates as $date)
  <option value="{{$date->date}}">{{$date->date}}</option>
@endforeach
