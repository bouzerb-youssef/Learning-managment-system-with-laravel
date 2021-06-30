@extends('front.layouts.app')
@section('content')
 <div class="page-content">

  
 <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>


       <div class="page-content-inner">



           <h2>الحساب : </h2>

        

           <div uk-grid="" class="uk-grid">
               <div class="uk-width-2-5@m uk-first-column">

                   <div class="uk-card-default rounded text-center p-4">

                       <div class="user-profile-photo  m-auto">
                        @if (!$user->photo==null)
                        <img src="{{$user->imagePath}}" alt="">
                        @else
                        <img src="../assets/images/avatars/home-profile.jpg" alt="">
                        @endif
                          
                       </div>

                       <h4 class="mb-2 mt-3">{{$user->name}} </h4>
                       <p class="m-0"> {{$user->sex}}</p>

                   </div>

               

                   <div class="uk-card-default rounded mt-5">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> السطاجات </h5>
                        
                    </div>
                    <hr class="m-0">
                    <div class="p-3">
                        @if ($user->stages->count()>0 )
                        @foreach ($user->stages as $stage)
                        <div class="d-flex justify-content-between mb-3">
                            <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">

                                    <div class="uk-width-auto uk-first-column">
                                        <button type="button" class="btn btn-danger btn-icon-only">
                                            <span class="d-flex justify-content-center">
                                    @if($stage->genre =='stage')
                                
                                    <i class="icon-orange icon-small"></i>
                                            {{$stage->genre }}                                    
                                            @else
                                    <i class="icon-green icon-small"></i>
                                    {{$stage->genre }}
                                    
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
                            <div >
                                    
                                <a href="{{route("admin.showstage",$stage->id)}}">مشاهدة</a>
                                
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
                           <h5 class="mb-0"> معلومات الحساب </h5>
                               <a href="{{route('admin.editstudent',$user->id)}}" uk-tooltip="title:Edit Account; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                       </div>
                       <hr class="m-0">
                       <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الاسم </h6>
                                   <p>{{$user->name}} </p>
                           </div>
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الايميل </h6>
                                   <p>{{$user->email}} </p>
                           </div>
                        
                        
                           <div class="uk-grid-margin">
                               <h6 class="uk-text-bold"> رقم الهاتف </h6>
                                   <p> {{$user->phone}}</p>
                            </div>
                            <div class="uk-grid-margin">
                                <h6 class="uk-text-bold"> الجنس </h6>
                                    <p> {{$user->sex}}</p>
                             </div>
                   </div>

                   <div class="uk-card-default rounded mt-4">
                       <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                           <h5 class="mb-0"> المعلومات الشخصية </h5>
                           <a href="{{route('admin.editstudent',$user->id)}}" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                       </div>
                       <hr class="m-0">
                       <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الحالة الاجتماعية </h6>
                                   <p>{{$user->familySituation}}</p>
                           </div>
                           <div>
                               <h6 class="uk-text-bold"> عدد  الاطفال </h6>
                                   <p> {{$user->childrenNmb}} </p>
                           </div>
                           <div class="uk-grid-margin uk-first-column">
                               <h6 class="uk-text-bold"> المستوي الدراسي </h6>
                                   <p> {{$user->educationLevel}}</p>
                           </div>
                           <div class="uk-grid-margin uk-first-column">
                               <h6 class="uk-text-bold"> رقم البطاقة الوطنية </h6>
                                   <p> {{$user->cin}} </p>
                           </div>
                           <div>
                               <h6 class="uk-text-bold"> العمر </h6>
                                   <p>{{$user->age}} </p>
                           </div>
                       </div>
                   </div>

                   <div class="uk-card-default rounded mt-4">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> العنوان </h5>
                        <a href="{{route('admin.editstudent',$user->id)}}" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                    </div>
                    <hr class="m-0">
                    <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                        
                           
                                <p>{!!$user->address!!}</p>
    
                    </div>
                </div>
                   
               

               </div>
           </div>
       </div>
       {{-- ################################################################## --}}
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

   </div>
@endsection
