@extends('admin.layouts.app')

@section('content')
<div class="page-content-inner">

    <div class="d-flex">
        <nav id="breadcrumbs" class="mb-3">
            <ul>
                <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                <li><a href="#"> Course </a></li>
                <li>Create New Course</li>
            </ul>
        </nav>
    </div>



    <div class="card">
        <div class="card-header border-bottom-0 py-4">
            <h5> Course Manager </h5>
        </div>


        <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li class="uk-active"><a href="#" aria-expanded="true">مسح الشوائب</a></li>
         
           

        </ul>

        <div class="card-body">

            <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                            <li class="uk-active">

                                <a href="{{route("delete")}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                    <i class="uil-trash-alt text-danger" ></i> 
                                </a>
                            </li>
                            
                               

               

    
           
            </ul>

        </div>

    </div>






</div>

{{-- ########################################################################################################### --}}

@endsection