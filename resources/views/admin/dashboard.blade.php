@extends('admin.layouts.app')

@section('content')


<div class="page-content">
    <div class="page-content-inner pt-lg-0  pl-lg-0">



        <div class="ro uk-grid" uk-grid="">
            <div class="uk-width-expand@m uk-first-column">


                <div class="section-small">

                    <h3> مرحبا {{\Auth::user()->name}}</h3>

                    <div class="uk-position-relative uk-visible-toggle uk-slider uk-slider-container" tabindex="-1" uk-slider="finite: true">

                        <ul class="uk-slider-items uk-child-width-1-2@m uk-child-width-1-2@s uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                            <li tabindex="-1" >

                                <div class="card">
                                    <div class="card-body" style="
                                    width: 98%;" >
                                        <div class="uk-flex-middle uk-grid" uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <h5 class="mb-2"> مجموع التلاميد</h5>
                                                @if($users)
                                                    <h1>{{$users->count()}} </h1>
                                               @endif
                                            </div>
                                            <div class="uk-width-expand">
                                                <img  width="197" height="192" src="../assets/images/demos/student.png" alt="">
                                            </div>
                                        </div>
                                    </div>
 
                                    <div class="card-footer d-flex justify-content-between py-2">
                                        <p class="mb-0">  عدد التلاميد:  {{$users->count()}}  </p>
                                      
                                    </div>
                                </div>
                            </li>
                        
                            <li >
                            
                                <div class="card">
                                    <div class="card-body">
                                        <div class="uk-flex-middle uk-grid" uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <h5 class="mb-2"> مجموع الاساتذة </h5>
                                                    <h1> {{$teachers->count()}} </h1>
                                                
                                            </div>
                                            <div class="uk-width-expand">
                                                <img  width="197" height="192" src="../assets/images/demos/admin1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card-footer d-flex justify-content-between py-2">
                                        <p class="mb-0">عدد الاساتذة:{{$teachers->count()}}</p>
                                  </div>
                                </div>
                            </li>
                            <li>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="uk-flex-middle uk-grid" uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <h5 class="mb-2"> مجموع الكورسات </h5>
                                                <h1> {{$courcecount}} </h1>
                                                
                                            </div>
                                            <div class="uk-width-expand">
                                                <img  width="197" height="192" src="../assets/images/demos/cource.png" alt="">
                                            </div>
                                        </div>
                                    </div>
 
                                    <div class="card-footer d-flex justify-content-between py-2">
                                        <p class="mb-0">عدد الكورسات: {{$courcecount}} </p>
                                  </div>
                                </div>
                            </li>
                        </ul>


                        <ul class="uk-slider-nav uk-dotnav uk-flex-center mt-3"><li uk-slider-item="0" class="uk-active"><a href="#"></a></li><li uk-slider-item="1" class=""><a href="#"></a></li><li uk-slider-item="2" class="uk-hidden"><a href="#"></a></li></ul>

                    </div>

                    <div class="uk-child-width-1-2@m uk-grid uk-grid-stack" uk-grid="">

                        <div>

                        </div>

                        <div>

                        </div>



                    </div>

                </div>

                <div class="uk-card-default uk-card-small rounded">
                    <div class="uk-card-header py-3">
                        <span class="uk-h5"> الكورسات الجديدة</span>
                      
                    </div>
 
                    <div class="uk-height-large" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: -17px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll;">
                     @foreach ($cources as $cource)
                     <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                         <div class="uk-width-1-3@m uk-first-column">
                             
                             @if (!$cource->thumbnail==null)
                             <img src="{{$cource->imagePath}}" alt="" class="  rounded">
                             @else
                             <img src="../assets/images/course/2.png" class="  rounded" alt="">
                             @endif
                         </div>
                         <div class="uk-width-expand">
                             <h5 class="mb-2"> {{$cource->title}}</h5>
                             <p>{!!$cource->short_description!!}</p>
                             <p class="uk-text-small mb-2"> انشأت في <a href="#"> {{$cource->created_at->format('d/m/y')}} </a>
                             </p>
                             <p class="mb-0 uk-text-small mt-3">
                                 <span class="mr-3 bg-light p-2 mt-1"> {{$cource->enrolls->count()}}</span>
                             </p>
                         </div>
                     </div>
 
                     <hr class="m-0">
 
                     @endforeach
                      
                       
 
                    </div></div></div><div class="simplebar-placeholder" style="width: 719px; height: 638px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 317px; transform: translate3d(0px, 132px, 0px); visibility: visible;"></div></div></div>
 
 
                </div>

                <!-- Popular Instructers -->
                <div class="section-small">

                    <div class="uk-position-relative uk-visible-toggle uk-slider uk-slider-container" tabindex="-1" uk-slider="finite: true">

                        <div class="grid-slider-header">
                            <h4> الاساتذة </h4>
                            <div class="grid-slider-header-link">

                                <a href="/admin/teachers" class="btn uk-visible@m">رؤية الكل </a>
                                <a href="#" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                                <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

                            </div>
                        </div>

                        <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s pb-3 uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                            @foreach ($teachers as $teacher)
                            <li tabindex="-1" >
                                <div class="card">

                                        <div class="card-body text-center">
                                            <div class="avatar-parent-child">
                                                @if (!$teacher->photo==null)
                                                <img  alt="Image placeholder" src="{{$teacher->imagePath}}" alt="" class="avatar  rounded-circle avatar-lg">
                                                @else
                                                <img alt="Image placeholder" src="../assets/images/avatars/avatar-2.jpg" class="avatar  rounded-circle avatar-lg">

                                                @endif
                                               
                                                <span class="avatar-child avatar-badge bg-success"></span>
                                            </div>
                                            <h5 class="h6 mt-4 mb-0"> {{$teacher->name}} </h5>
                
                                            <div class="d-flex justify-content-between px-4">
                                                <a href="{{route("admin.editteacher",$teacher->id)}}" class="btn btn-icon btn-hover btn-circle" uk-tooltip="تعديل" title="" aria-expanded="false">
                                                    <i class="uil-edit-alt"></i> </a>
                                             
                                                <a href=" {{route("admin.teacher.remove",$teacher->id)}}"   class="btn   delete-confirm btn-icon btn-hover btn-circle" uk-tooltip="مسح" title="" aria-expanded="false">
                                                    <i class="uil-trash-alt"></i> </a>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center py-2">
                
                                           {{--  <a href="#" class="text-muted uk-text-small">{{$cource->enrolls->count()}} مسجل و مسجلة </a>
                 --}}
                                        </div>
                
                                    </div>
                
                            </li>
                            
                        @endforeach
                           
                            

                        </ul>

                    </div>

                </div>


            </div>
            <div class="uk-width-1-3@m">

                <div class="bg-white uk-card-default uk-height-1-1 uk-sticky uk-sticky-fixed" data-simplebar="init" uk-sticky="offset:70; bottom:true" style="position: fixed; top: 70px; width: 314px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll hidden;">
                   <div class="p-3 row align-items-center">

                         <div class="col-auto" style="text-align: center; ">
                         <p class="mb-0" >   التقارير :</p>

                        </div>
            
                </div>
           
                    <hr class="m-0">
                    <div class="p-3">
                        <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                            <div class="uk-width-expand">
                                <p class="uk-text-truncate mb-0"> المعاهد</p>
                                <span class="badge badge-soft-secondary mt-n1"> عدد المعاهد : @if(isset($centres) && $centres->count()>0)  {{$centres->count()}} @endif</span>
                            </div>
                            <div class="uk-width-expand">
                                <p class="uk-text-truncate mb-0"> الدورات</p>
                                <span class="badge badge-soft-secondary mt-n1">  عدد الدورات : @if(isset($formations) && $formations->count()>0)  {{$formations->count()}} @endif</span>
                            </div>
                        </div>
                        {{-- ################################### --}}
                        <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                            <div class="uk-width-expand">
                                <p class="uk-text-truncate mb-0"> المجموعات</p>
                                <span class="badge badge-soft-secondary mt-n1">  عدد المجموعات : @if(isset($groups) && $groups->count()>0)  {{$groups->count()}} @endif</span>
                            </div>
                            <div class="uk-width-expand">
                                <p class="uk-text-truncate mb-0"> الطلاب</p>
                                <span class="badge badge-soft-secondary mt-n1">  عدد الطلاب : @if(isset($users) && $users->count()>0)  {{$users->count()}} @endif</span>
                            </div>
                        </div>
                    </div>
<br>
                    <hr class="m-0">
                    <div class="p-3">
                        <h5> أخر الكورسات</h5>
                        @foreach ($cources as $cource) 
                        <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                             <div class="uk-width-auto uk-first-column">   @if (!$cource->thumbnail==null)
                                 <img class="rounded border border-200" src="{{$cource->imagePath}}" alt=""width="80"> </div>
                                 <div class="uk-width-expand">
                                 @else
                                 <img class="rounded border border-200" src="../assets/images/course/2.png" width="80" alt=""> </div>
                                 @endif</div>
                             <div class="uk-width-expand">
                                 <p class="uk-text-truncate mb-0"> {{$cource->title}}</p>
                                 <span class="badge badge-soft-secondary mt-n1"> {{$cource->enrolls->count()}} مسجل فيها</span>
                             </div>
                         </div>
                         @endforeach 


<br>
                        <a href="/admin/cources">
                            <p class="uk-heading-line uk-text-center mt-2 uk-text-small"><span>رؤية الكل
                                </span>
                            </p>
                        </a>

                        <h5> اخرالطلاب المسجلين</h5>
                        @foreach ($lastusers as $user)
   

                      <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                          <div class="uk-width-auto uk-first-column"> 
                            @if (!$user->photo==null)
                            <img src="{{$user->imagePath}}" class="rounded border border-200"  width="60" alt="">
                            @else
                            <img class="rounded border border-200" src="../assets/images/course/2.png" alt=""> 
                            @endif
                            </div>
                          <div class="uk-width-expand">
                              <p class="uk-text-truncate mb-0"> {{$user->name}}</p>
                          </div>
                          <div class="uk-width-auto"> <span class="badge badge-soft-success mt-n1">
                            {{$user->sex}} </span>
                          </div>
                      </div>

                        @endforeach 



                    {{--     <br>
                        <a href="/admin/students">
                            <p class="uk-heading-line uk-text-center mt-2 uk-text-small"><span>رؤية الكل
                                </span>
                            </p>
                        </a>
                        
                        <h5>أخر الوضائف أو التداريب  </h5>
                        @foreach ($laststages as $stage)
   

                      <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                         
                          <div class="uk-width-expand">
                              <p class="uk-text-truncate mb-0"> {{$stage->title}}</p>
                          </div>
                          <div class="uk-width-auto"> <span class="badge badge-soft-success mt-n1">
                            {{$stage->user->name}} </span>
                          </div>
                      </div>

                        @endforeach 


 --}}
                     
                        

                    </div>

                </div></div></div><div class="simplebar-placeholder" style="width: 329px; height: 937px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden; height: 848px;"></div></div></div><div class="uk-sticky-placeholder" style="height: 937px; margin: 0px;"></div>

            </div>
        </div>







</div>

@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                    $('.delete-confirm').on('click', function (event) {
                        event.preventDefault();
                        const url = $(this).attr('href');
                        swal({
                            title: 'هل انت متأكد؟',
                            text: 'هذا الشئ سيمحي من قاعدة البيانات نهائيا.',
                            icon: 'warning',
                            buttons: ["تراجع", "نعم"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>

@endsection