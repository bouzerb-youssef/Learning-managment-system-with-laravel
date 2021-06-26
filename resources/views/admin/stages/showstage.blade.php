@extends('front.layouts.app')
@section('content')
 <!-- Wrapper -->
 <div id="wrapper">
   <div class="page-content">

       <div class="page-content-inner">

           <div uk-grid>
               <div class="uk-width-medium@m">

                   <div class="profile-cards" uk-sticky="offset: 90; bottom: true; media: @m;top:2">

                       <div class="user-profile-photo">
                                    @if ($stage->user->photo)
                                    <img  href='{{route("admin.showstudent",$stage->user->id)}}' src="{{$stage->user->imagePath}}"  class="header-profile-icon"></span>
                                    @else
                                    <img   href='{{route("admin.showstudent",$stage->user->id)}}' src="../assets/images/avatars/home-profile.jpg" alt="">
                                    @endif 
                       </div>
<br>
                       <h4>  <a href="{{route("admin.showstudent",$stage->user->id)}}" class="name h6 mb-0 text-sm">{{$stage->user->name}}</a></h4>

                   </div>


               </div>
               <div class="uk-width-expand@m">
<br><br>
                <div class="uk-card-default rounded mt-4">
                    <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                        <h5 class="mb-0"> {{$stage->title}} </h5>
                        <a href="{{route("admin.editstage",$stage->id)}}" uk-tooltip="title: تعديل; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                    </div>
                    <hr class="m-0">
                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                        <div class="uk-grid-margin">
                            <h6 class="uk-text-bold"> العنوان </h6>
                                <p> {{$stage->title}} </p>
                        </div>
                      
                      
                       
                        <div class="uk-grid-margin">
                            <h6 class="uk-text-bold"> النوع </h6>
                                <p> {{$stage->genre}} </p>
                        </div>
                      
                     

                    </div>
                </div>


            

                <div class="uk-card-default rounded mt-4">
                 <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                     <h5 class="mb-0"> العنوان </h5>
                     <a href="{{route("admin.editstage",$stage->id)}}" uk-tooltip="title: تعديل; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                 </div>
                 <hr class="m-0">
                 <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                     
                        
                             <p>{!!$stage->address!!}</p>
 
                 </div>
             </div>
                
                <div class="uk-card-default rounded mt-4">
                 <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                     <h5 class="mb-0"> معلومات عن {{$stage->genre}} </h5>
                     <a href="{{route("admin.editstage",$stage->id)}}"uk-tooltip="title: تعديل; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                 </div>
                 <hr class="m-0">
                 <div class="{{-- uk-child-width-1-2@s --}} uk-grid-small p-4 uk-grid" uk-grid="">
                     
                        
                             <p>{!!$stage->description!!}</p>
 
                 </div>
             </div>


            </div>
          
               
                  


           </div>

       </div>

   </div>
@endsection
