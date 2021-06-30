@extends('admin.layouts.app')
@section('content')
<div class="page-content">

  
 <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>


       <div class="page-content-inner">



           <h4>الحساب : </h4>

        

           <div uk-grid="" class="uk-grid">
               <div class="uk-width-2-5@m uk-first-column">

                   <div class="uk-card-default rounded text-center p-4">

                       <div class="user-profile-photo  m-auto">
                        @if (!$teacher->photo==null)
                        <img src="{{$teacher->imagePath}}" alt="">
                        @else
                        <img src="../assets/images/avatars/home-profile.jpg" alt="">
                        @endif
                          
                       </div>

                       <h4 class="mb-2 mt-3">{{$teacher->name}} </h4>
                       <p class="m-0"> {{$teacher->sex}}</p>

                   </div>

     

               </div>
               <div class="uk-width-expand@m">

                   <div class="uk-card-default rounded">
                       <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                           <h5 class="mb-0"> معلومات الحساب </h5>
                               <a href="{{route('admin.editteacher',$teacher->id)}}" uk-tooltip="title:Edit Account; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                       </div>
                       <hr class="m-0">
                       <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الاسم </h6>
                                   <p>{{$teacher->name}} </p>
                           </div>
                           <div class="uk-first-column">
                               <h6 class="uk-text-bold"> الايميل </h6>
                                   <p>{{$teacher->email}} </p>
                           </div>
                        
                        
                           <div class="uk-grid-margin">
                               <h6 class="uk-text-bold"> رقم الهاتف </h6>
                                   <p> {{$teacher->phone}}</p>
                            </div>
                            <div class="uk-grid-margin">
                                <h6 class="uk-text-bold"> الجنس </h6>
                                    <p> {{$teacher->sex}}</p>
                             </div>
                   </div>

                

                   <div class="uk-card-default rounded mt-4">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> العنوان </h5>
                        <a href="{{route('admin.editteacher',$teacher->id)}}" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                    </div>
                    <hr class="m-0">
                    <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                        
                           
                                <p>{!!$teacher->address!!}</p>
    
                    </div>
                </div>
                   
                   <div class="uk-card-default rounded mt-4">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> الملاحضات </h5>
                        <a href="{{route('admin.editteacher',$teacher->id)}}"uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                    </div>
                    <hr class="m-0">
                    <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                        
                           
                                <p>{!!$teacher->nots!!}</p>
    
                    </div>
                </div>


               </div>
           </div>
       </div>

   </div>

  
@endsection
