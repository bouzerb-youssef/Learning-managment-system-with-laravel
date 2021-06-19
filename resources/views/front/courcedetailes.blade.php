@extends('front.layouts.app')

@section('content')
<div class="page-content pt-lg-5">


    <div class="course-resume-wrapper topic-1">
        <div class="container">

            <div class="uk-grid-large uk-light mt-lg-3 uk-grid uk-grid-stack" uk-grid="">

                <div class="uk-width-1-2@m uk-first-column">
                   
                        
                        @if (!$cource->thumbnail==null)
                        <img src="{{$cource->imagePath}}" alt="">
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
                           
                            <li> <i class="icon-feather-users"></i>5 :: مسجل  </li>
                        </ul>
                    </div>
                    <div class="course-details-info">

                        <ul>
                           
                            <li> انشات في :{{$cource->created_at->format("d/m/y")}}<a href="#"> بواسطة أمل سونتر </a> </li>
                            
{{--                             <li>      أخر تحديث:{{$cource->updated_at->format("d/m/y")}}</li>
 --}}                            
                        </ul>

                    </div>

                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class=" uk-visible@m">
                         
                        </div>
                            
                        @if ($is_enroll->count())
                        <h4>انت مسجل مسبقا</h4>   
                        @else
                        <a href="{{route("cource.enroll",$cource->id)}}" class="btn-course-start-2 my-lg-4 mt-3"> ابدأ الان 
                            <i class="icon-feather-chevron-right"></i> </a>
                        @endif
                      
                    </div>


                </div>

            </div>

            <div class="subnav">

                <ul class="uk-child-width-expand mb-0 uk-tab" uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium" uk-tab="">
                    <li class=""><a href="#" aria-expanded="false">الكورسات</a></li>
                    <li class=""><a href="#" aria-expanded="false">الوصف</a></li>
                    <li class=""><a href="#" aria-expanded="false">الفهرس</a></li>
                    <li class=""><a href="#" aria-expanded="false">الادوات</a></li>
                    <li class=""><a href="#" aria-expanded="false">التعليقات</a></li>
                </ul>

            </div>

        </div>
    </div>

    <div class="container">

        <div class="uk-grid-large mt-4 uk-grid uk-grid-stack" uk-grid="">
            <div class="uk-width-2-3@m uk-first-column">
                <ul id="course-intro-tab" class="uk-switcher" style="touch-action: pan-y pinch-zoom;">
                    <!-- course Curriculum-->
                    <li class="" style="">
                        <h4> الدروس </h4>

                        <ul class="course-curriculum uk-accordion" uk-accordion="multiple: true">

                            @foreach ($cource->sections as $section)
                            <li  @if ($loop->first) class="uk-open" @endif >
                                <a class="uk-accordion-title" href="#"> {{$section->section}} </a>
                                <div class="uk-accordion-content" aria-hidden="false">

                                    <!-- course-video-list -->
                                
                                    <ul class="course-curriculum-list">
                                    
                                    @foreach ($section->lessons as $lesson) 
                                    <li>
                                        @if ($is_enroll->count())
                                        <a href="{{route("cources.lessons.vedio",$lesson->id)}}">{{$lesson->title}} </a>
                                        @else
                                       
                                        <a  uk-toggle="target: #modal-example"  href="#modal-example">{{$lesson->title}} </a>
                                        @endif
                                      
                                        <span> {{$lesson->duration}} دقيقة</span></li>
                                    
                                    @endforeach  
                                    </ul>

                                
                                </div>
                            </li>
                            @endforeach 

                        </ul>


                    </li>

                    <!-- course description -->
                    <li class="course-description-content uk-active  " style="">

                        <h4> الوصف </h4>
                        <p>{!!$cource->description!!} </p>


                        <h4> ماذا ستتعلم من الكورس :</h4>
                        <div class="uk-child-width-1-2@s uk-grid" uk-grid="">
                            <div class="uk-first-column">
                                <ul class="list-2">
                                   {!!$cource->detail!!}
                                </ul>
                            </div>
                   
                        </div>


                        

                    </li>
                
                    <li class="course-description-content" style="">

                        <h4 class="my-4">تفاصيل الفصول</h4>
  
                        <ul class="course-faq uk-accordion" uk-accordion="">
                            @foreach ($cource->sections as $section)
                            <li @if ($loop->first) class="uk-open" @endif>
                                <a class="uk-accordion-title" href="#"> {{$section->section}} </a>
                                <div class="uk-accordion-content" aria-hidden="true" hidden="">
                                    <p> {{$section->description}} </p>
                                </div>
                            </li>
                            @endforeach
           
                        </ul>
  
                    </li>

                   
         
                    <!-- course Announcement-->
                    <li class="" style="">

                        <h4 class="my-4">مرفقات الفصول</h4>
  
                        <ul class="course-faq uk-accordion" uk-accordion="">
                            @foreach ($cource->sections as $section)
                               
                                <li @if ($loop->first) class="uk-open" @endif>
                                    <a class="uk-accordion-title" href="#"> {{$section->section}} </a>
                                    @foreach ($section->materials as $material)
                                    <div class="uk-accordion-content" aria-hidden="true" hidden="">
                                    
                                        <p>{{$material->title}}<a href="{{$material->pdfPath}}"> <br><i class="uil-external-link-alt "></i> </a></p>
                                    </div>
                                    @endforeach
                                </li>
                             
                            @endforeach
                        </ul>
  
                    </li>
                    <!-- course Reviews-->
                    <li class="" style="">

                     
                        @auth
                            @livewire('reviews',['cource' => $cource])
                        @endauth
                    </li>

                </ul>
            </div>


            <!-- sidebar -->
            <div class="uk-width-1-3@m uk-grid-margin uk-first-column">

                <h4 class="mt-lg-4"> Related Courses</h4>
                <div class="uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                    @foreach ($cources as $cource)
                    <div class="uk-first-column">
                        <a href="course-intro.html">
                            <div class="course-card">
                                <div class="course-card-thumbnail ">
                                            @if (!$cource->thumbnail==null)
                                            <img src="{{$cource->imagePath}}" alt="">
                                            @else
                                            <img src="../assets/images/course/2.png">                       
                                            @endif
                                    <span class="play-button-trigger"></span>
                                </div>
                                <div class="course-card-body">
                                    <div class="course-card-info">
                                        <div>
                                            <span class="catagroy">Angular</span>
                                        </div>
                                        <div>
                                            <i class="icon-feather-bookmark icon-small"></i>
                                        </div>
                                    </div>
                                    <h4>{{$cource->title}}</h4>
                                    <p>{!!$cource->short_description!!}</p>
                                    <div class="course-card-footer">
                                        @if (isset($cource->sections)&& $cource->sections->count()>0)
                                        @php
                                            foreach ($cource->Sections as $section ) {
                                           
                                                    $countlesson= $section->lessons->count();
                                                    $countlessontime= $section->lessons->sum('duration');
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