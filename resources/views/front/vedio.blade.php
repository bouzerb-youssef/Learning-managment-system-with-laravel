@extends('front.layouts.app')
@section('content')
<br><br><br><br>
<div class="container"><div class="uk-width-expand@m">

    <div class="section-header mb-lg-3">
        <div class="section-header-left">

            <h4> {{$cource->title}}</h4>

        </div>
        <div class="section-header-right">
        </div>
    </div>

        @foreach ($cource->lessons as $lesson)
        <div class="course-card course-card-list">
                <div class="course-card-thumbnail">
                    <img src="../assets/images/course/1.png">
                    <a href="{{route("cources.lessons.vedio",$lesson->id)}}" class="play-button-trigger"></a>
                </div>
                <div class="course-card-body">
                    <a href="{{route("cources.lessons.vedio",$lesson->id)}}">
                        <h4>{{$lesson->titel}} </h4>
                    </a>
                    <p>HTML is the building blocks of the web. It gives pages structure and applies meaning
                        to
                        content. Take this course to learn how it all works and create your own pages!</p>
                    <div class="course-details-info">
                        <ul>
                            <li> <i class="icon-feather-sliders"></i> Advance level </li>
                        </ul>
                    </div>
                </div>
        </div>
        @endforeach

           

 




</div></div>


@endsection