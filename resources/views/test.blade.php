@extends('front.layouts.app')

@section('content')
{{-- <div class='container'>
 --}} <div class="page-content">


    <div class="home-hero" data-src="{{$content->heroImagePath}}" uk-img="" style="background-image: url(&quot;file:///C:/Users/pc/Desktop/main/assets/images/home-hero.png&quot;);">
        <div class="uk-width-1-1">
            <div class="page-content-inner uk-position-z-index">
                <h1>{{$content->title1}}</h1>
                <h4 class="my-lg-4"> {{$content->description1}} </h4>
                <a href="#" class="button grey">{{$content->button1}}</a>
            </div>
        </div>
    </div>

    <div class="container">


        <!-- course card resume sliders  -->
        @guest
            <br> <br> <br> <br>
        @endguest
        @auth
        <div class="section-small">

            <div uk-slider="finite: true" class="course-grid-slider uk-slider uk-slider-container">

                <div class="grid-slider-header">
                    <div>
                        <h4 class="uk-text-truncate"> الدورات المنخرط فيها 
                        </h4>
                    </div>
                    <div class="grid-slider-header-link">

                        <a href="courses.html" class="button transparent uk-visible@m"> رؤية الكل  </a>
                        <a href="#" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                        <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

                    </div>
                </div>

                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-grid" style="transform: translate3d(9.91821e-05px, 0px, 0px);">
                    @foreach ($user->enrolls as $enroll)
                                  
                  
                    <li tabindex="-1" class="uk-active">
                        <a href="course-lesson-1.html">
                            <div class="course-card-resume">
                                <div class="course-card-resume-thumbnail">
                                    @if (!$enroll->cource->thumbnail==null)
                                    <img src="{{$enroll->cource->imagePath}}">
                                    @else
                                    <img src="../assets/images/course/2.png" alt="">
                                    @endif
                                  
                                </div>
                                <div class="course-card-resume-body">
                                    <h5>{{$enroll->cource->title}}</h5>
                                    <span class="number"> 3/20 </span>
                                    <div class="course-progressbar">
                                        <div class="course-progressbar-filler" style="width:65%"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
                   
                  
                </ul>

            </div>

        </div> 
        @endauth
      


        <div class="section-small pt-0">

            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                <div class="grid-slider-header">
                    <div>
                        <h4 class="uk-text-truncate"> <a href="#" class="text-muted">التصنيفات المشهورة </a> </h4>
                    </div>
                    <div class="grid-slider-header-link">

                        <a href="course-path.html" class="button transparent uk-visible@m"> رؤية الكل</a>
                        <a href="#" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                        <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

                    </div>
                </div>

               
             <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(6.86646e-05px, 0px, 0px);">
                    @foreach ($categories as $item)
                    <li tabindex="-1" class="uk-active">
                        <a href="{{route("category.show",$item->id)}}" class="skill-card">
                            <i class="icon-brand-angular skill-card-icon" style="color:#dd0031"></i>
                            <div>
                                <h2 class="skill-card-title"> {{$item->title}}</h2>
                                <p class="skill-card-subtitle">  الدورات :{{$item->cources->count()}} <span class="skill-card-bullet"></span>
                                   
                                </p>
                            </div>
                        </a>
                    </li>
                        
                    @endforeach
               
                </ul>

            </div>

        </div>


       


        <div class="section-small pt-0">

            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                <div class="grid-slider-header">
                    <div>
                        <h4 class="uk-text-truncate"> 
                            <a href="#" class="text-muted"> الدورات المتعلقة بهذا التصنيف</a> </h4>
                    </div>
                    <div class="grid-slider-header-link">

                        <a href="courses.html" class="button transparent uk-visible@m"> رؤية الكل</a>
                        <a href="#" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                        <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

                    </div>
                </div>

                
                <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(6.86646e-05px, 0px, 0px);">
                   
                   @foreach ($category->cources as $cource)
                       
                  
                   <li tabindex="-1" class="uk-active">
                    <a href="{{route("cources.show",$cource->id)}}">
                        <div class="course-card">
                            <div class="course-card-thumbnail ">
                                <img src="{{$cource->imagePath}}">
                                <span class="play-button-trigger"></span>
                            </div>
                            <div class="course-card-body">
                                <div class="course-card-info">
                                    <div>
                                        <span class="catagroy">{{$category->title}}</span>
                                    </div>
                                    <div>
                                        <i class="icon-feather-bookmark icon-small"></i>
                                    </div>
                                </div>
                                <h4><a href="{{route("cources.show",$cource->id)}}">{{$cource->title}}</a></h4>
                                <p> {!!$cource->short_description!!} </p>
                                <div class="course-card-footer">
                                    @if (isset($cource->sections)&& $cource->sections->count()>0)
                                    @php
                                        foreach ($cource->Sections as $section ) {
                                         /*    if (isset($cource->sections)&& $cource->sections->count()>0){ */
                                                $countlesson= $section->lessons->count();
                                                $countlessontime= $section->lessons->sum('duration');

                                        /*     }
                                            $countlesson=0;
                                            $countlessontime=0; */
                                        }
                                    @endphp
                                    <h5> <i class="icon-feather-film"></i> {{$countlesson}} دروس </h5>
                                    <h5> <i class="icon-feather-clock"></i> {{ $countlessontime}} دقيقة </h5>
                                    @else
                                    <h5> <i class="icon-feather-film"></i> ليس هناك فصول بعد </h5>
                                    <h5> <i class="icon-feather-clock"></i> ليس هناك فصول بعد </h5>
                                    
                                     @endif
                                </div>
                            </div>

                        </div>
                    </a>

                 </li>
                @endforeach
            
                    
                </ul>

            </div>

        </div>

        <div class="section-small pt-0">

            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                <div class="grid-slider-header">
                    <div>
                        <h4 class="uk-text-truncate">
                            <a href="episode.html" class="text-muted"> الحلقات التي تنتمي الي هذا الصنف</a> </h4>
                    </div>
                    <div class="grid-slider-header-link">

                        <a href="courses.html" class="button transparent uk-visible@m">رؤية الكل </a>
                        <a href="#" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                        <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

                    </div>
                </div>

                <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(1.52588e-05px, 0px, 0px);">
                    @foreach ($category->cources as $cource)
                        @foreach ($cource->sections as $section)
                            @foreach ($section->lessons as $lesson)
                                <li tabindex="-1" class="uk-active">
                                

                                    <a href="episode-details.html">
                                        <div class="course-card episode-card animate-this">
                                            <div class="course-card-thumbnail ">

                                                <span class="item-tag">{{$cource->title}}</span>
                                                <span class="duration">{{$lesson->duration}} دقيقة</span>
                                                @if (!$lesson->thumbnail_image==null)
                                                    <img src="{{asset('storage/lessons/'.$lesson->title .'/'.$lesson->thumbnail_image)}}">
                                                    @else
                                                    <img src="../assets/images/episodes/2.png">
                                                    @endif
                                                <span class="play-button-trigger"></span>
                                            </div>
                                            <div class="course-card-body">
                                                <h4 class="mb-0"> {{$lesson->title}}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </li> 
                            @endforeach
                        @endforeach
                        
                    @endforeach
                    
                </ul>

            </div>

        </div>
    </div>
</div>
@endsection