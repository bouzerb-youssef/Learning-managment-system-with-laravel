@extends('admin.layouts.app')

@section('content')
<br><br><br><br>
@if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif

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
        <h5> ادارة الكورس</h5>
    </div>
    <br><br>
    
    <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
        <li class="uk-active"><a href="#" aria-expanded="true"> تعديل اختبار</a></li>
        
  
    </ul>

    <div class="card-body">

        <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

            <li class="uk-active">

                <div class="row">
                    <div class="col-xl-9 m-auto">

                     <form action="{{route("admin.updateoption.update",$option->id)}}" method="POST" >
                    {{ csrf_field() }}
         
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="course_title"> الخيار<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="option" class="form-control" id="course_title"    placeholder=""  required="">
                            </div>
                        </div>  
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="course_title">الجواب الصحيح<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="points" class="form-control" id="course_title"    placeholder=" اذا كان هذاهو الجواب الصحيح اذخل 1 غير ذالك أذخل 0"  required="">
                                <input type="hidden" name='question_id' value="{{$question}}">
                            </div>
                        </div> 

                        <div class="form-group row mb-3">
                            <button type="submit" class="btn btn-default">حفظ</button>
                        </div>
                    </div>
                </div>


            </li>

        </form>
        </ul>

    </div>

</div>






</div>
@endsection