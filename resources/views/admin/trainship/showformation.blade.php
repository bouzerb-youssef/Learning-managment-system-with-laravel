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
                                    @if ($stage->user->profile_photo_path)
                                    <img src="{{$stage->user->imagePath}}"  class="header-profile-icon"></span>
                                    @else
                                    <img src="../assets/images/avatars/home-profile.jpg" alt="">
                                    @endif 
                       </div>
<br>
                       <h4> {{$stage->user->name}} </h4>

                       <div class="social-icons">
                           <a href="#"> <i class="icon-brand-facebook-f"></i> </a>
                           <a href="#"><i class="icon-brand-twitter"></i></a>
                           <a href="#"> <i class="icon-brand-linkedin"></i></a>
                       </div>

                      

                   </div>


               </div>
               <div class="uk-width-expand@m">

                  
<br><br><br><br>
                  
                  

                        <div class="uk-card-default rounded mt-4">
                            <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4">
                                <h5 class="mb-0"> {{$stage->title}} </h5>
                                <a href="#" uk-tooltip="title: Edit Billing address; pos: left" title="" aria-expanded="false"> <i class="icon-feather-settings"></i> </a>
                            </div>
                            <hr class="m-0">
                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-first-column">
                                    <h6 class="uk-text-bold"> address </h6>
                                        <p> {{$stage->address}}</p>
                                </div>
                                <div>
                                    <h6 class="uk-text-bold"> description </h6>
                                        <p> {{$stage->description}} </p>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h6 class="uk-text-bold"> address </h6>
                                        <p> {{$stage->address}} </p>
                                </div>
                                <div class="uk-grid-margin">
                                    <h6 class="uk-text-bold"> genre </h6>
                                        <p> {{$stage->genre}} </p>
                                </div>
                              
                             

                            </div>
                        </div>

                    </div>
                </div>
                  


           </div>

       </div>

   </div>
@endsection
