@extends('front.layouts.app')
@section('content')
 <!-- Wrapper -->
 <div id="wrapper">


    <!-- Header Container
       ================================================== -->
       

 

   

   <!-- Content
       ================================================== -->
   <div class="page-content">

       <div class="page-content-inner">

           <div uk-grid>
               <div class="uk-width-medium@m">

                   <div class="profile-cards" uk-sticky="offset: 90; bottom: true; media: @m;top:2">

                       <div class="user-profile-photo">
                                    @if ($user->profile_photo_path)
                                    <img src="{{$user->imagePath}}"  class="header-profile-icon"></span>
                                    @else
                                    <img src="../assets/images/avatars/home-profile.jpg" alt="">
                                    @endif 
                       </div>
<br>
                       <h4> {{$user->name}} </h4>

                       <div class="social-icons">
                           <a href="#"> <i class="icon-brand-facebook-f"></i> </a>
                           <a href="#"><i class="icon-brand-twitter"></i></a>
                           <a href="#"> <i class="icon-brand-linkedin"></i></a>
                       </div>

                      

                   </div>


               </div>
               <div class="uk-width-expand@m">

                  
<br><br><br><br>
                  
                   <div uk-grid="" class="uk-grid">
                    <div class="uk-width-2-5@m uk-first-column">

                        <div class="uk-card-default rounded text-center p-4">

                            <div class="user-profile-photo  m-auto">
                                <img src="../assets/images/avatars/home-profile.jpg" alt="">
                            </div>

                            <h4 class="mb-2 mt-3"> Elie Daniels </h4>
                            <p class="m-0"> Member since Sep 23 2017 </p>

                        </div>

                        <div class="uk-card-default rounded mt-5">
                            <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                                <h5 class="mb-0"> السطاجات </h5>
                                
                            </div>
                            <hr class="m-0">
                            <div class="p-3">
                                @if ($user->stages->count()>0 )
                                @foreach ($user->stages as $stage)
                                <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">

                                    <div class="uk-width-auto uk-first-column">
                                        <button type="button" class="btn btn-danger btn-icon-only">
                                            <span class="d-flex justify-content-center">
                                    @if($stage->genre =='stage')
                                  
                                    <i class="icon-orange icon-small"></i>
{{                                    $stage->genre 
}}                                    @else
                                    <i class="icon-green icon-small"></i>
                                    {{                                    $stage->genre 
                                    }}
                                    @endif
                                       
                                     
                                            </span>
                                          </button>
                                    </div>
                                    <div class="uk-width-expand">
                             
                                    
                              
                                <div class="uk-width-expand">
                                    <h6 ><a href="{{route("admin.showstage",$stage->id)}}">{{$stage->title}}</a></h6>
                                   
                                </div>
                                        
                                    </div>

                                </div>

                                @endforeach
                                @else
                                <h6>ليس هناك تدريبات مخصصة بعد</h6>
                            @endif
                             

                            </div>
                        </div>

                    </div>
                    <div class="uk-width-expand@m">

                        <div class="uk-card-default rounded">
                            <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                                <h5 class="mb-0"> Account details </h5>
                                    <a href="#" uk-tooltip="title:Edit Account; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                            </div>
                            <hr class="m-0">
                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-first-column">
                                    <h6 class="uk-text-bold"> First Name </h6>
                                        <p> Elie </p>
                                </div>
                                <div>
                                    <h6 class="uk-text-bold"> Seccond Name </h6>
                                        <p> Elie </p>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h6 class="uk-text-bold"> Your email address </h6>
                                        <p> eliedaniels@gmail.com </p>
                                </div>
                                <div class="uk-grid-margin">
                                    <h6 class="uk-text-bold"> Phone </h6>
                                        <p> +1 555 623 568 </p>
                                </div>

                            </div>
                        </div>

                        <div class="uk-card-default rounded mt-4">
                            <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                                <h5 class="mb-0"> Billing address </h5>
                                <a href="#" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                            </div>
                            <hr class="m-0">
                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-first-column">
                                    <h6 class="uk-text-bold"> Number </h6>
                                        <p> 23, Block C2 </p>
                                </div>
                                <div>
                                    <h6 class="uk-text-bold"> Street </h6>
                                        <p> Church Street </p>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h6 class="uk-text-bold"> City </h6>
                                        <p> Los Angeles </p>
                                </div>
                                <div class="uk-grid-margin">
                                    <h6 class="uk-text-bold"> Postal Code </h6>
                                        <p> 100065 </p>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h6 class="uk-text-bold"> State </h6>
                                        <p> CA </p>
                                </div>
                                <div class="uk-grid-margin">
                                    <h6 class="uk-text-bold"> Country </h6>
                                    <p> United States </p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                   <div class="section-small">

                    <h4 class="uk-heading-line text-center  mb-5"><span> الدورات المنخرط فيها  </span></h3>

                        <div uk-slider="finite: true" class="course-grid-slider uk-slider uk-slider-container">

                            <div class="grid-slider-header">
                                <div>
                                    <h4 class="uk-text-truncate"> الدورات المنخرط فيها 
                                    </h4>
                                </div>
                                <div class="grid-slider-header-link">
            
{{--                                     <a href="courses.html" class="button transparent uk-visible@m"> رؤية الكل  </a>
 --}}                                    <a href="#" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                                    <a href="#" class="slide-nav-next" uk-slider-item="next"></a>
            
                                </div>
                            </div>
            
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-8@m uk-grid" style="transform: translate3d(9.91821e-05px, 0px, 0px);">
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
              
                       <div class="section-small">

                           <h4 class="uk-heading-line text-center  mb-5"><span> Your Saves Books </span></h3>

                           <div class="uk-position-relative" tabindex="-1" uk-slider="autoplay: true">

                               <ul
                                   class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-child-width-1-3@s uk-grid">
                                   <li>
                                       <a href="book-description.html">
                                           <div class="book-card">
                                               <div class="book-cover">
                                                   <img src="../assets/images/book/vue-2-basics-.jpg" alt="">
                                               </div>
                                               <div class="book-content">
                                                   <h5>Vue.js Basics</h5>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="book-description.html">
                                           <div class="book-card">
                                               <div class="book-cover">
                                                   <img src="../assets/images/book/php.jpg" alt="">
                                               </div>
                                               <div class="book-content">
                                                   <h5> PHP for Beginners </h5>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="book-description.html">
                                           <div class="book-card">
                                               <div class="book-cover">
                                                   <img src="../assets/images/book/html5.jpg" alt="">
                                               </div>
                                               <div class="book-content">
                                                   <h5>HTML5 Brick Breaker</h5>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="book-description.html">
                                           <div class="book-card">
                                               <div class="book-cover">
                                                   <img src="../assets/images/book/win8.jpg" alt="">
                                               </div>
                                               <div class="book-content">
                                                   <h5>WIN8 App Development</h5>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="book-description.html">
                                           <div class="book-card">
                                               <div class="book-cover">
                                                   <img src="../assets/images/book/vue-2-basics-.jpg" alt="">
                                               </div>
                                               <div class="book-content">
                                                   <h5>Vue.js Basics</h5>
                                               </div>
                                           </div>
                                       </a>
                                   </li>
                               </ul>

                               <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev"
                                   href="#" uk-slider-item="previous"></a>
                               <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next"
                                   href="#" uk-slider-item="next"></a>

                               <div class="uk-flex uk-flex-center mt-2">
                                   <ul class="uk-slider-nav uk-dotnav"></ul>
                               </div>

                           </div>

                       </div>


                   </div>


           </div>

       </div>

   </div>
@endsection
