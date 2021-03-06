@extends('front.layouts.app')

@section('content')
<div class="page-content pt-lg-5">


    <div class="course-resume-wrapper topic-1">
        <div class="container">

            <div class="uk-grid-large uk-light mt-lg-3 uk-grid uk-grid-stack" uk-grid="">

                <div class="uk-width-1-2@m uk-first-column">
                   
   
                        @if (!$cource->thumbnail==null)
                        <img src="{{asset('cources/'.$cource->thumbnail)}}"  width="500" height="400" alt="">
                        @else
                        <img src="../assets/images/course/2.png">                       
                        @endif

                   

                </div>
                <div class="uk-width-1-2@m course-details uk-grid-margin uk-first-column">
                    <h2> {{$cource->title}}</h2>
                    <div> 
                        {!!$cource->short_description!!}
                    </div>

                    <div class="course-details-info mt-5">
                        <ul>
                           
                            <li> <i class="icon-feather-users"  style='padding-left: 14px;'   ></i> مسجل   ::  <span style='padding-right: 7px;'> {{$cource->enrolls->count()}}<span></li>
                        </ul>
                    </div>
                    <div class="course-details-info">

                        <ul>
                           
                            <li> انشات في :{{$cource->created_at->format("d/m/y")}}<a href="#"> By Amal Tadrib </a> </li>
                            
                        
                        </ul>

                    </div>

                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class=" uk-visible@m">
                        </div>
                            
                        @if ($is_enroll->count())
                        <h5>انت مسجل مسبقا</h5>   
                        @else
                        <a href="{{route("cource.enroll",$cource->id)}}" class="btn-course-start-2 my-lg-4 mt-3"> ابدأ الان 
                            <i class="icon-feather-chevron-right"></i> </a>
                        @endif
                      
                    </div>


                </div>

            </div>

            <div class="subnav">

                <ul class="uk-child-width-expand mb-0 uk-tab" uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium" uk-tab="">
                    <li class=""><a href="#" aria-expanded="false">الدروس </a></li>
                   
                  
                 
                    <li class=""><a href="#" aria-expanded="false">التعليقات</a></li>
                </ul>

            </div>

        </div>
    </div>

    <div class="container">

        <div class="uk-grid-large mt-4 uk-grid uk-grid-stack" uk-grid="">
            <div class="uk-width-2-3@m uk-first-column" >
           
                        <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">


                            <!-- course Curriculum-->
                            <li class="uk-active  " style="">

                                <ul class="course-curriculum uk-accordion" uk-accordion="multiple: true">

                                    <li class="">
                                        <a class="uk-accordion-title" href="#">الدروس </a>
                                        <div class="uk-accordion-content" aria-hidden="true" hidden="">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                    
                                                @foreach ($cource->lessons as $lesson) 
                                                <li>
            
                                                  <a href="{{route("cources.lessons.vedio",$lesson->id)}}">{{$lesson->name}} </a>
                                         
                                                @endforeach  
                                                </ul>

                                        </div>
                                    </li>

                                    <li class="">
                                        <a class="uk-accordion-title" href="#">  المرفقات</a>
                                        <div class="uk-accordion-content" aria-hidden="true" hidden="">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                @foreach ($cource->materials as $material)
                                                <li>{{$material->materialname}} <span><i class='
                                                    icon-material-outline-attach-file'></i> {{$material->material}} </span>
                                              
                                                @endforeach
                                            </ul>

                                        </div>
                                    </li>
                               

                                    <li class="">
                                        <a class="uk-accordion-title" href="#"> البودكاست </a>
                                        <div class="uk-accordion-content" aria-hidden="true" hidden="">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                @foreach ($cource->podcasts as $podcast)
                                                 
                                                  <li>{{$podcast->podcast}}<span>{{$podcast->podcast}} </span></li>
                                                 @endforeach
                                             
                                            </ul>

                                        </div>
                                    </li>

                                    <li class="">
                                        <a class="uk-accordion-title" href="#">الاختبار  </a>
                                        <div class="uk-accordion-content" aria-hidden="true" hidden="">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                <li> Something to Ponder<span> 23 min </span> </li>
                                                <li> Tables <span> 23 min </span> </li>
                                                <li> HTML Entities <a href="#trailer-modal" uk-toggle=""> Preview
                                                    </a><span> 23 min </span> </li>
                                                <li> HTML Iframes <span> 23 min </span> </li>
                                                <li> Some important things <span> 23 min </span> </li>
                                            </ul>

                                        </div>
                                    </li>

                                </ul>

                            </li>
                                <li class="" style="">

                                
                                    @auth
                                        @livewire('reviews',['cource' => $cource])
                                    @endauth
                                </li>

                </ul> 
            </div>


            <!-- sidebar -->
            <div class="uk-width-1-3@m uk-grid-margin uk-first-column">

                <h4 class="mt-lg-4"> كورسات أخري</h4>
                <div class="uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                    @foreach ($cources as $cource)
                    <div class="uk-first-column">
                        <a href="{{route("cources.show",$cource->id)}}">
                            <div class="course-card">
                                <div class="course-card-thumbnail ">
                                            @if (!$cource->thumbnail==null)
                                            <img src="{{asset('cources/'.$cource->thumbnail)}}" alt="">
                                            @else
                                            <img src="../assets/images/course/2.png" >                       
                                            @endif
                                    <span class="play-button-trigger"></span>
                                </div>
                                <div class="course-card-body">
                                    <div class="course-card-info">
                                        <div>
                                            @if ($cource->category)
                                            <span class="catagroy"> الصنف :{{$cource->category->title}}</span>
                                            @endif
                                         
                                        </div>
                                        <div>
                                            <i class="icon-feather-bookmark icon-small"></i>
                                        </div>
                                    </div>
                                    <h4>{{$cource->title}}</h4>
                                    <p>{!!$cource->short_description!!}</p>
                                    <div class="course-card-footer">
                                        @if (isset($cource->lessons)&& $cource->lessons->count()>0)
                                        @php
                                            
                                           
                                                    $countlesson= $cource->lessons->count();
                                                   /*  $countlessontime= $section->lessons->sum('duration'); */
                                           
                                        @endphp
                                        <h5> <i class="icon-feather-film"></i> {{$countlesson}} دروس </h5>
                                      {{--   <h5> <i class="icon-feather-clock"></i> {{ $countlessontime}} دقيقة </h5>
                                        @else --}}
                                      
                                        
                                        
                                         @endif
                                    </div>
                                </div>

                            </div>
                        </a>

                    </div>
                    @endforeach
                    
                </div>

            </div>
<div id="modal-example" uk-modal> <div class="uk-modal-dialog uk-modal-body"> 
    <button class="uk-modal-close-default" type="button" uk-close></button> 
    <p>
        يجب عليك أولا أن تقوم بالتسجيل 
    </p>

            <!-- video demo model -->
            <div class="p-3">
                <div class="uk-child-width-1-2 uk-grid-small mb-4 uk-grid" uk-grid="">
                    <div class="uk-first-column">
                        <a href="{{route("cource.enroll",$cource->id)}}" class="btn-course-start-2 my-lg-4 mt-3"> ابدأ الان 
                    </div>
                   
                </div>
            </div>
        {{-- </div> --}}
        <div class="uk-sticky-placeholder" style="height: 551px; margin: 0px;" hidden=""></div>
   
    </div> 
</div>
 




@endsection