<div>
    <div id="wrapper">

        <div class="course-layouts">
    
            <div class="course-content bg-dark" >
    
              

                   
                   @livewire('episode', ['lesson' => $lesson])

                
    
            </div>

            @if (isset($cource)&& $cource->count()>0)
                <div class="course-sidebar">
                    <div class="course-sidebar-title">
                        <h3> Table of Contents </h3>
                    </div>
                    <div class="course-sidebar-container" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll hidden;">
    
                        <ul class="course-video-list-section uk-accordion" uk-accordion="">
                @foreach ($cource->sections as $section)
                    <li  {{-- @if ($loop->first) --}} class="uk-open" {{-- @endif --}}>
                        <a class="uk-accordion-title" href="#"> {{$section->section}} </a>
                        <div class="uk-accordion-content" hidden="" aria-hidden="true">
                            <!-- course-video-list -->
                            <ul  class="course-video-list highlight-watched">
                              @php
                                $authid=\Auth::user()->id;
                             @endphp 
        
                                @foreach ($section->lessons as $lesson) 
                                    <li  
                                        @foreach ($lesson->users as $user)
                                      
                                            @if( $user->pivot->lesson_id==$lesson->id   &&  $user->pivot->user_id==$authid    )
                                             class="watched" 
                                            
                                                
                                            @else
                                            class=""   
                                            @endif

                                        @endforeach 
                                        > 
                                       
                                       
                                        <a href="{{route("cources.lessons.vedio",$lesson->id)}}"  @if ($loop->last) class="uk-open" @endif aria-expanded="false">{{$lesson->title}}  <span> {{$lesson->duration}} دقيقة </span> </a> 
                                    </li>
                                   
        
                                           
                                   
                                @endforeach 
                               
                            </ul>
                        </div>
                    </li>
                @endforeach
                <li><i class='icon-feather-book'></i> <a href=" {{route('quiz.index',$cource->id)}} "   aria-expanded="false" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">اختبر قدراتك   </a>
                </li>
            @endif
           
                    </ul>
    
                </div></div></div><div class="simplebar-placeholder" style="width: 251px; height: 859px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 569px; transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
    
            </div>
    
        </div>
 
</div>

