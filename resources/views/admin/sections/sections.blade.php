@extends('admin.layouts.app')

@section('content')
<br><br><br><br>
<div class="page-content-inner">

    <div class="d-flex">
        <nav id="breadcrumbs" class="mb-3">
            <ul>
                <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                <li><a href="#"> الكورسات  </a></li>
                
            </ul>
        </nav>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h3> </h3>

   
    </div>
<br><br>
    <div class="card">
     


        <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li ><a href="#" aria-expanded="true"> الدروس</a></li>
            <li ><a href="#" aria-expanded="true"> مرفقات</a></li>
            <li ><a href="#" aria-expanded="true"> الاحتياجات</a></li>
            
        </ul>

        <div class="card-body">

            <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                <li >

               
                    <div class="uk-width-2-4@m uk-first-column">
                    <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">

                         

                        <!-- course Curriculum-->
                                <li class="uk-active  " style="">

                                    <ul class="c-curriculum  uk-accordion" uk-accordion="multiple: true">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h3> </h3>
                                            <div>
                                                <a href="{{route('admin.lesson.add',$cource->id)}}" class="btn btn-default">
                                                    <i class="uil-plus"> </i>اضافة درس جديد
                                                </a>
                                            </div>
                                        </div>
                                                @foreach ($cource->lessons as $lesson) 
                                                <li>
                                                <div class="row">
                                                        <div class="col-md-9">

                                                            <a href="{{route("cources.lessons.vedio",$lesson->id)}}">{{$lesson->name}} </a>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="{{route('admin.lesson.remove',$lesson->id)}}"   style="padding-left:30px; "  class="delete-confirm"   uk-tooltip="مسح الدرس" title="" aria-expanded="false">
                                                                <i class="uil-trash-alt text-danger"  {{-- style='padding-bottom:200px;' --}}></i> 
                                                            </a>
                                                        
                                                            <a href="{{route('admin.lesson.edit',$lesson->id)}}"   {{-- class="btn btn-icon btn-hover btn-lg btn-circle"  --}}uk-tooltip="تعديل الدرس" title="" aria-expanded="false">
                                                                <i class="uil-pen "></i> 
                                                            </a>
                                                        </div>
                                                </div>
                                                </li>
                                        @endforeach 
            
                                    </ul>

                                </li>
                         

                            
                         

                        </ul>
                    </div>


                </li>
                
                <li >

              
                    <div class="uk-width-2-4@m uk-first-column">
                        <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">

                         

                            <!-- course Curriculum-->
                            <li class="uk-active  " style="">
                           
                                <ul class="c-curriculum  uk-accordion" uk-accordion="multiple: true">
                                  
                                    <div class="d-flex justify-content-between mb-3">
                                        <h3> </h3>
                                        <div>
                                            <a href="{{route('admin.material.add',$cource->id)}}" class="btn btn-default">
                                                <i class="uil-plus"> </i>اضافة مرفق جديد
                                            </a>
                                        </div>
                                    </div>
                                    @foreach ($cource->materials as $material)
                             
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <a href="#">{{$material->materialname}} </a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="{{route('admin.material.remove',$material->id)}}"   style="padding-left:30px; "  class="delete-confirm"   uk-tooltip="مسح المرفق" title="" aria-expanded="false">
                                                            <i class="uil-trash-alt text-danger"></i> 
                                                        </a>
                                                        <a href="{{route('admin.material.edit',$material->id)}}"   {{-- class="btn btn-icon btn-hover btn-lg btn-circle"  --}}uk-tooltip="تعديل المرفق" title="" aria-expanded="false">
                                                            <i class="uil-pen   "></i> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                    @endforeach 
        
                                </ul>

                            </li>
                        </ul>
                    </div>


                </li>
                   
                <li >

              
                    <div class="uk-width-2-4@m uk-first-column">
                        <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">

                         

                            <!-- course Curriculum-->
                            <li class="uk-active  " style="">
                           
                                <ul class="c-curriculum  uk-accordion" uk-accordion="multiple: true">
                                  
                                    <div class="d-flex justify-content-between mb-3">
                                        <h3> </h3>
                                        <div>
                                            <a href="{{route('admin.material.add',$cource->id)}}" class="btn btn-default">
                                                <i class="uil-plus"> </i>اضافة مرفق جديد
                                            </a>
                                        </div>
                                    </div>
                                    @foreach ($cource->whatinthecoures as $detail)
                             
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <a href="#">{{$detail->detail}} </a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a {{-- href="{{route('admin.material.remove',$detail->id)}}"  --}}  style="padding-left:30px; "  class="delete-confirm"   uk-tooltip="مسح المرفق" title="" aria-expanded="false">
                                                            <i class="uil-trash-alt text-danger"></i> 
                                                        </a>
                                                        <a {{-- href="{{route('admin.material.edit',$detail->id)}}" --}}   {{-- class="btn btn-icon btn-hover btn-lg btn-circle"  --}}uk-tooltip="تعديل المرفق" title="" aria-expanded="false">
                                                            <i class="uil-pen   "></i> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                    @endforeach 
        
                                </ul>

                            </li>
                        </ul>
                    </div>


                </li>

            </ul>

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