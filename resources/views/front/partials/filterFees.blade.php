
@foreach ($courses as $category)
@if (count($category->courses) > 0)

<div class="col-lg-6 col-md-6 marginTop-30 wow fadeInUp float-left" data-wow-delay=".1s">
    <div class=" p-1 text-center bg-light bg-primary border-bottom">
        <h5 class="my-4 text-white">
            {{$category->name}}
        </h5>
    </div>
    @foreach ($category->courses as $course)
    @if ($course->course_category_id == $category->id)
    <div class="p-4 bg-light border-bottom">
        <div class="media justify-content-between">
            <ul class="list-unstyled mb-0">
                <li class="mb-1">
                    <h5 class="my-4">
                        {{$course->name}}
                    </h5>
                </li>
                <li class="mb-1">
                    {{$course->code}}
                </li>
            </ul>
            <ul class="list-unstyled mb-0  text-right">
                <li class="mb-1">
                    <h5 class="my-4 d-block text-primary">
                        @php
                        $off_fee ="";
                        @endphp
                        @foreach ($fees as $fee)
                        @if ($fee->course_id == $course->id)
                        @php
                        $off_fee = $fee->fee;
                        @endphp
                        @endif
                        @endforeach
                        @if (isset($off_fee) && $off_fee !="")
                        {{$off_fee}}
                        @else
                        {{$course->offshore_fee}}
                        @endif
                    </h5>
                </li>
                <li class="mb-1">
                    @php
                    $string = explode(' ',$course->duration);
                    @endphp
                    @if (isset($string[0]))
                    {{$string[0]}}
                    @endif
                    @if (isset($string[1]))
                    {{$string[1]}}
                    @endif
                </li>
            </ul>

        </div>

    </div>
    @endif
    @endforeach

</div>
@endif

@endforeach
