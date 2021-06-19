@extends('admin.layouts.app')
@section('content')
<div class="page-content">

  
 <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>


       <div class="page-content-inner">



           <h2>الحساب </h2>

        

           <div uk-grid="" class="uk-grid">
               <div class="uk-width-2-5@m uk-first-column">

                   <div class="uk-card-default rounded text-center p-4">

                       <div class="user-profile-photo  m-auto">
                        @if (!$student->photo==null)
                        <img src="{{$student->imagePath}}" alt="">
                        @else
                        <img src="../assets/images/avatars/home-profile.jpg" alt="">
                        @endif
                          
                       </div>

                       <h4 class="mb-2 mt-3">{{$student->name}} </h4>
                       <p class="m-0"> {{$student->sex}}</p>

                   </div>

                   <div class="uk-card-default rounded mt-5">
                       <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                           <h5 class="mb-0"> Progress </h5>
                               <a href="#"> more </a>
                       </div>
                       <hr class="m-0">
                       <div class="p-3">

                           <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">

                               <div class="uk-width-auto uk-first-column">
                                   <button type="button" class="btn btn-danger btn-icon-only">
                                       <span class="d-flex justify-content-center">
                                  <i class="icon-brand-angular icon-small"></i>
                                       </span>
                                     </button>
                               </div>
                               <div class="uk-width-expand">
                                   <h5 class="mb-2"> Angular </h5>
                                   <div class="course-progressbar">
                                       <div class="course-progressbar-filler" style="width:100%"></div>
                                   </div>
                               </div>

                           </div>

                           <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">

                               <div class="uk-width-auto uk-first-column">
                                   <button type="button" class="btn btn-warning btn-icon-only">
                                       <span class="d-flex justify-content-center">
                                           <i class="icon-brand-html5 icon-small"></i>
                                       </span>
                                     </button>
                               </div>
                               <div class="uk-width-expand">
                                   <h5 class="mb-2"> html5 </h5>
                                   <div class="course-progressbar">
                                       <div class="course-progressbar-filler" style="width:35%"></div>
                                   </div>
                               </div>

                           </div>

                           <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">

                               <div class="uk-width-auto uk-first-column">
                                   <button type="button" class="btn btn-primary btn-icon-only">
                                       <span class="d-flex justify-content-center">
                                           <i class="icon-brand-css3-alt icon-small"></i>
                                       </span>
                                     </button>
                               </div>
                               <div class="uk-width-expand">
                                   <h5 class="mb-2"> css3 </h5>
                                   <div class="course-progressbar">
                                       <div class="course-progressbar-filler" style="width:65%"></div>
                                   </div>
                               </div>

                           </div>

                       </div>
                   </div>

               </div>
               <div class="uk-width-expand@m">

                   <div class="uk-card-default rounded">
                       <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                           <h5 class="mb-0"> معلومات الحساب </h5>
                               <a href="{{route('admin.editstudent',$student->id)}}" uk-tooltip="title:Edit Account; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                       </div>
                       <hr class="m-0">
                       <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الاسم </h6>
                                   <p>{{$student->name}} </p>
                           </div>
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الايميل </h6>
                                   <p>{{$student->email}} </p>
                           </div>
                        
                        
                           <div class="uk-grid-margin">
                               <h6 class="uk-text-bold"> رقم الهاتف </h6>
                                   <p> {{$student->phone}}</p>
                            </div>
                   </div>

                   <div class="uk-card-default rounded mt-4">
                       <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                           <h5 class="mb-0"> المعلومات الشخصية </h5>
                           <a href="{{route('admin.editstudent',$student->id)}}" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                       </div>
                       <hr class="m-0">
                       <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الحالة الاجتماعية </h6>
                                   <p>{{$student->familySituation}}</p>
                           </div>
                           <div>
                               <h6 class="uk-text-bold"> عدد  الاطفال </h6>
                                   <p> {{$student->childrenNmb}} </p>
                           </div>
                           <div class="uk-grid-margin uk-first-column">
                               <h6 class="uk-text-bold"> المستوي الدراسي </h6>
                                   <p> {{$student->educationLevel}}</p>
                           </div>
                           <div class="uk-grid-margin uk-first-column">
                               <h6 class="uk-text-bold"> رقم البطاقة الوطنية </h6>
                                   <p> {{$student->cin}} </p>
                           </div>
                           <div>
                               <h6 class="uk-text-bold"> العمر </h6>
                                   <p>{{$student->age}} </p>
                           </div>
                       </div>
                   </div>

                   <div class="uk-card-default rounded mt-4">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> العنوان </h5>
                        <a href="{{route('admin.editstudent',$student->id)}}" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                    </div>
                    <hr class="m-0">
                    <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                        
                           
                                <p>{!!$student->address!!}</p>
    
                    </div>
                </div>
                   
                   <div class="uk-card-default rounded mt-4">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> الملاحضات </h5>
                        <a href="{{route('admin.editstudent',$student->id)}}"uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                    </div>
                    <hr class="m-0">
                    <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                        
                           
                                <p>{!!$student->nots!!}</p>
    
                    </div>
                </div>


               </div>
           </div>
       </div>

   </div>

  
@endsection
