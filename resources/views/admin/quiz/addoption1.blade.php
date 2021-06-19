@extends('admin.layouts.app')

@section('content')
<br><br><br><br>


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

    @foreach ($question->questionOptions as $option)
    <div class="sec-list-item">
        <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
          {{--   <label class="mb-0 mx-2">
                <input class="uk-checkbox" type="checkbox"> 
            </label> --}}
            <p> {{$option->option}}</p>
        </div>
        <div>
            <div class="btn-act"> <a href="#">
              
                <a href=" {{route("admin.option.remove",$option->id)}} " class="delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح السؤال" title="" aria-expanded="false">
                    <i class="uil-trash-alt text-danger" ></i> 
                </a>
    
                <a href="{{route("admin.editoption",$option->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل الخيار" title="" aria-expanded="false">
                    <i class="uil-pen "></i> 
                </a>  
    
            </div> 
        </div>
    </div>
    @endforeach
    <br><br>
    
    <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
        <li class="uk-active"><a href="#" aria-expanded="true"> اضافة اختبار</a></li>
        
  
    </ul>

    <div class="card-body">

        <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

            <li class="uk-active">

                <div class="row">
                    <div class="col-xl-9 m-auto">
                     <form action="{{route("admin.addoption.store")}}" method="POST" enctype="multipart/form-data" >
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
                                <div class="row" >
                                    <div class="col-6">
                                        
                                        <input type="radio" id="vehicle1" name="points" value="0">
                                       <span> <label for="vehicle1">جواب خاطئ</label></span>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" id="vehicle1" name="points" value="1">
                                        <label for="vehicle1">جواب صحيح</label>
                                    </div>
        
                                </div>
                                <input type="hidden" name='question_id' value="{{$question->id}}">
                            </div>
                        </div> 
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="course_title">الصورة <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control"   required="">
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
