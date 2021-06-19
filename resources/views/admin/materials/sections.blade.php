@extends('admin.layouts.app')

@section('content')
<br><br><br><br>
<div class="page-content-inner">

    <div class="d-flex">
        <nav id="breadcrumbs" class="mb-3">
            <ul>
                <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                <li><a href="#"> الكورسات  </a></li>
                <li> لائحة الفصول</li>
            </ul>
        </nav>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h3> </h3>

        <div>
            <a href="{{route('admin.addsection',$cource->id)}}" class="btn btn-default">
                <i class="uil-plus"> </i>اضافة فصل جديد
            </a>
        </div>
    </div>

    <div class="card">
     


        <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li class="uk-active"><a href="#" aria-expanded="true"> الدروس</a></li>
            <li ><a href="#" aria-expanded="true"> مرفقات</a></li>
            
        </ul>

        <div class="card-body">

            <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                <li class="uk-active">

               
                    <div class="uk-width-2-4@m uk-first-column">
                        <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">

                         

                            <!-- course Curriculum-->
                            <li class="uk-active  " style="">

                                <ul class="c-curriculum  uk-accordion" uk-accordion="multiple: true">

                                    @foreach ($cource->sections as $section)
                                    <li  @if ($loop->first) class="uk-open" @endif >
                                      
                                        <a class="uk-accordion-title" href="#"> {{$section->section}}
                                         </a>
                                         <div class="action-btn">
                                            <a href="{{route('admin.section.remove',$section->id)}}"  class="delete-confirm"   {{-- class="btn btn-icon btn-hover btn-sl btn-circle"  --}} uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                                <i class="uil-trash-alt text-danger" ></i> 
                                            </a>
                                            <a href="{{route('admin.lesson.add',$section->id)}}" {{-- class="btn btn-icon btn-hover btn-sl btn-circle"  --}}uk-tooltip="اضافة درسة" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>
                                            <a href="{{route('admin.editsection',$section->id)}}" {{-- class="btn btn-icon btn-hover btn-sl btn-circle"  --}}uk-tooltip="تعديل الفصل" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>
                                        </div>
                                        <div class="uk-accordion-content" aria-hidden="false">
        
                                       
                                            <ul class="course-curriculum-list">
                                            
                                            @foreach ($section->lessons as $lesson) 
                                            <li>
                                               
                                                <a href="{{route("cources.lessons.vedio",$lesson->id)}}">{{$lesson->title}} </a>
                                                <span>     
                                                    
                                                    <div class="action-btn">
                                                        <a href="{{route('admin.lesson.remove',$lesson->id)}}"    class="delete-confirm"   uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                                            <i class="uil-trash-alt text-danger"  {{-- style='padding-bottom:200px;' --}}></i> 
                                                        </a>
                                                      
                                                        <a href="{{route('admin.lesson.edit',$lesson->id)}}"   {{-- class="btn btn-icon btn-hover btn-lg btn-circle"  --}}uk-tooltip="تعديل الفصل" title="" aria-expanded="false">
                                                            <i class="uil-pen "></i> 
                                                        </a>
                                                    </div>
                                            </span>
                                               
                                            </li>
                                            
                                            @endforeach  
                                            </ul>
        
                                        
                                        </div>
                                    </li>
                                    @endforeach 
        
                                </ul>

                            </li>

                            <li  style="">

                                <ul class="c-curriculum  uk-accordion" uk-accordion="multiple: true">

                                    @foreach ($cource->sections as $section)
                                    <li  @if ($loop->first) class="uk-open" @endif >
                                      
                                        <a class="uk-accordion-title" href="#"> {{$section->section}}
                                         </a>
                                         <div class="action-btn">
                                            <a href="{{route('admin.section.remove',$section->id)}}"  class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                                <i class="uil-trash-alt text-danger" ></i> 
                                            </a>
                                            <a href="{{-- {{route('admin.addlesson',$section->id)}} --}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة درس" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>
                                            <a href="{{route('admin.editsection',$section->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل الفصل" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>
                                        </div>
                                        <div class="uk-accordion-content" aria-hidden="false">
        
                                       
                                            <ul class="course-curriculum-list">
                                            
                                            @foreach ($section->materials as $material) 
                                            <li>
                                              
                                                <a href="#">{{$material->material}} </a>
                                            
                                               
                                               
                                            </li>
                                            
                                            @endforeach  
                                            </ul>
        
                                        
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

                                    @foreach ($cource->sections as $section)
                                    <li  @if ($loop->first) class="uk-open" @endif >
                                      
                                        <a class="uk-accordion-title" href="#"> {{$section->section}}
                                         </a>
                                         <div class="action-btn">
                                            <a href="{{route('admin.section.remove',$section->id)}}"   class="delete-confirm"  class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                                <i class="uil-trash-alt text-danger" ></i> 
                                            </a>
                                            <a href="{{-- {{route('admin.addlesson',$section->id)}} --}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة درس والادوات والاسئلة" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>
                                            <a href="{{route('admin.editsection',$section->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل الفصل" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>
                                        </div>
                                        <div class="uk-accordion-content" aria-hidden="false">
        
                                       
                                            <ul class="course-curriculum-list">
                                            
                                            @foreach ($section->materials as $material) 
                                            <li>
                                              
                                                <a href="#">{{$material->material}} </a>
                                            
                                               
                                               
                                            </li>
                                            
                                            @endforeach  
                                            </ul>
        
                                        
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