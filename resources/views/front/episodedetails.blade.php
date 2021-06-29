<!doctype html>
<html lang="en" dir="rtl">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- CSS 
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/night-mode.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/framework-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">   
 

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet"> 
{{--     <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
 --}}   {{--  <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/demo.css" /> --}}

<style>
    /* video { width: 80%; }
    video source { width: 100%; height: auto; } */
</style>
    @livewireStyles
  @yield('styles')
  @stack('styles')
</head>

<body>

    

    <div id="wrapper">

        <div class="course-layouts course-sidebar-collapse">

            <div  class="course-content bg-dark" >

                <div class="course-header">
                    
                    <a href="#" class="btn-back" uk-toggle="target: .course-layouts; cls: course-sidebar-collapse">
                        <i class="icon-feather-chevron-left"></i>
                    </a>

                    <h4 class="text-white"> Build Responsive Websites </h4>

                    <div>
                        <a href="#" aria-expanded="false">
                            <i class="icon-feather-help-circle btns"></i> </a>
                        <div uk-drop="pos: bottom-right;mode : click" class="uk-drop">
                            <div class="uk-card-default p-4">
                                <h4> Elementum tellus id mauris faucibuss soluta nobis </h4>
                                <p class="mt-2 mb-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam liber tempor cum
                                    soluta nobis eleifend option congue nihil imperdiet</p>
                            </div>
                        </div>

                        <a hred="#" aria-expanded="false" class="">
                            <i class="icon-feather-more-vertical btns"></i>
                        </a>
                        <div class="dropdown-option-nav uk-dropdown uk-dropdown-bottom-left" uk-dropdown="pos: bottom-right ;mode : click" style="left: 105.516px; top: 47px;">
                            <ul>

                                <li><a href="#">
                                        <i class="icon-feather-bookmark"></i>
                                        Add To Bookmarks</a></li>
                                <li><a href="#">
                                        <i class="icon-feather-share-2"></i>
                                        Share With Friend </a></li>

                                <li>
                                    <a href="#" id="night-mode" class="btn-night-mode">
                                        <i class="icon-line-awesome-lightbulb-o"></i> Night mode
                                        <label class="btn-night-mode-switch">
                                            <div class="uk-switch-button"></div>
                                        </label>
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>

                </div>

                <div {{--  class="course-content-inner" --}}  >
                    @livewire('episode', ['lesson' => $lesson])
                </div>

            </div>

            <!-- course sidebar -->

            <div class="course-sidebar">
                <div class="course-sidebar-title">
                    <h3> قائمة الدروس</h3>
                </div>
                <div class="course-sidebar-container" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden;">

                    <ul   class="course-video-list highlight-watched">
                        @php
                          $authid=\Auth::user()->id;
                       @endphp 
  
                          @foreach ($cource->lessons as $lesson) 
                              <li  
                                  @foreach ($lesson->users as $user)
                                
                                      @if( $user->pivot->lesson_id==$lesson->id   &&  $user->pivot->user_id==$authid    )
                                       class="watched" 
                                      
                                          
                                      @else
                                      class=""   
                                      @endif

                                  @endforeach 
                                  > 
                                 
                                 
                                  <a href="{{route("cources.lessons.vedio",$lesson->id)}}"  @if ($loop->last) class="uk-open" @endif aria-expanded="false">{{$lesson->name}} {{--  <span> {{$lesson->duration}} دقيقة </span> --}} </a> 
                                
                              </li>
                             
  
                                     
                             
                          @endforeach 
                           <br><br><br>
                          <li> <a href=" {{route('quiz.index',$cource->id)}} "   aria-expanded="false" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">اختبر قدراتك   </a>
                          </li>
                         
                      </ul>

                </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 868px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 522px; transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>

            </div>

        </div>



    </div>
 
{{--  @livewire('episodedetails', [
    'cource' => $cource, 
    'lesson'=>$lesson,
 
]) --}}
    


</div>




 
 <style>
    .flex-wrapper {
        display: flex;
        flex-flow: row nowrap;
    }

    .single-chart {
        width: 33%;
        justify-content: space-around;
    }

    .circular-chart {
        display: block;
        margin: 10px auto;
        max-width: 80%;
        max-height: 250px;
    }

    .circle-bg {
        fill: none;
        stroke: #eee;
        stroke-width: 3.8;
    }

    .circle {
        fill: none;
        stroke-width: 2.8;
        stroke-linecap: round;
        animation: progress 1s ease-out forwards;
    }

    @keyframes progress {
        0% {
            stroke-dasharray: 0 100;
        }
    }

    .circular-chart.orange .circle {
        stroke: #ff9f00;
    }

    .circular-chart.green .circle {
        stroke: #4CC790;
    }

    .circular-chart.blue .circle {
        stroke: #3c9ee5;
    }

    .percentage {
        fill: #666;
        font-family: sans-serif;
        font-size: 0.5em;
        text-anchor: middle;
    }
</style>

@livewireScripts

<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('night-mode');
            if (document.documentElement.classList.contains('night-mode')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>
<script>
function make_button_active(tab) {
    //Get item siblings
    var siblings = tab.siblings();

    /* Remove active class on all buttons
    siblings.each(function(){
        $(this).removeClass('active');
    }) */

    //Add the clicked button class
    tab.addClass('watched');
}

//Attach events to highlight-watched
$(document).ready(function () {

    if (localStorage) {
        var ind = localStorage['tab']
        make_button_active($('.highlight-watched li').eq(ind));
    }

    $(".highlight-watched li").click(function () {
        if (localStorage) {
            localStorage['tab'] = $(this).index();
        }
        make_button_active($(this));
    });

});
</script>

<!-- javaScripts
================================================== -->
<script src="{{ asset('assets/js/framework.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/mmenu.min.js') }}"></script>
 <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
{{-- <script src="https://cdn.plyr.io/3.6.8/demo.js" crossorigin="anonymous"></script> --}}

{{-- <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
 --}}@stack('scripts')
@yield('scripts')
</body>

</html>