@extends('admin.layouts.app')
@section('content')
<div class="page-content">

  
 <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>


       <div class="page-content-inner">



           <h2>الحساب : </h2>

        

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
                           <h5 class="mb-0"> الوثائق </h5>
                               <a href="{{route('admin.addstudentAttachment',$student->id)}}"> اضافة وثيقة </a>
                       </div>
                       <hr class="m-0">
                       <div class="p-3">
                        @foreach($student->studentattachments as $item)
                           
                            <div class="d-flex justify-content-between mb-3">

                                    <div class="uk-width-auto uk-first-column">
                                    
                                        <span >
                                            <a href="{{asset('storage/studentAttachement/'.$item->file)}}">  {{ $item->genre}}</a>
                                                
                                        </span>
                                    
                                </div>

                                <div >
                                    
                                    <a href="{{asset('storage/studentAttachement/'.$item->file)}}">مشاهدة</a>
                                  
                                     <a href=" {{route("admin.editstudentAttachment",$item->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل السؤال" title="" aria-expanded="false">
                                        <i class="uil-pen "></i> 
                                    </a>
                                    
                                </div>

                            </div>
                               

                         
                           @endforeach

                       </div>
                   </div>

                   <div class="uk-card-default rounded mt-5">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> السطاجات </h5>
                        
                    </div>
                    <hr class="m-0">
                    <div class="p-3">
                        @if ($student->stages->count()>0 )
                        @foreach ($student->stages as $stage)
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
                            <div class="uk-grid-margin">
                                <h6 class="uk-text-bold"> الجنس </h6>
                                    <p> {{$student->sex}}</p>
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
