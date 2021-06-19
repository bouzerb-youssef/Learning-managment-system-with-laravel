<div>
  
    <div id="wrapper">

        <div class="course-layouts">
    
            <div class="course-content bg-dark">
    
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
    
                        <a hred="#" aria-expanded="false">
                            <i class="icon-feather-more-vertical btns"></i>
                        </a>
                        <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : click">
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
{{--                 <input  wire:model="vedio" class="uk-input" type="submit"    value="{{$lesson->title}}" class="btn btn-default">
 --}}                                            
    @livewire('lessons'/* , ['user' => $user] */)
            </div>
    
            <!-- course sidebar -->
    
            <div class="course-sidebar">
                <div class="course-sidebar-title">
                    <h3> Table of Contents </h3>
                </div>
                <div class="course-sidebar-container" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll hidden;">
    
                    <ul class="course-video-list-section uk-accordion" uk-accordion="">
    
                      
                                <!-- course-video-list -->
                                <ul class="course-video-list highlight-watched">
                                    @foreach ($cource->lessons as $lesson) 
                                   
                                 <li   class="watched">
                                    
                                       <form wire:submit.prevent='getvedio'>
                                        <input  wire:change="vedio" class="uk-input" type="submit"    value="{{$lesson->title}}" class="btn btn-default">
                                            

{{--                                         <input type="submit" value="submit" class="btn btn-default">
 --}}{{--                                          <span>   min </span> 
 --}}                                        
                                       </form>
                                   

                                           
                                    
                                </li> 
    {{--                                 <li class="watched uk-active"> <a href="#" aria-expanded="true">{{$lesson->title}} <span>{{$lesson->duration}} min </span> </a>
     --}}                        {{--    <li> <a href="#" aria-expanded="true"> {{$lesson->title}} <span> {{$lesson->duration}}min </span> </a> </li> --}}
                                 @endforeach 
                                 
                                  
                                        </a>
                                    </li>
                                </ul>
                      
                     
    
                    </ul>
    
                </div></div></div><div class="simplebar-placeholder" style="width: 348px; height: 859px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 444px; transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
    
            </div>
    
        </div>
    
    
    
    </div>
       
</div>
