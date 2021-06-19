@extends('admin.layouts.app')
@section('content')
<br><br><br>

    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> students </a></li>
                    <li>Create New students</li>
                </ul>
            </nav>
        </div>



        <div class="card">
            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true">  تعديل معلومات الطالب</a></li>
               
          
            </ul>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong></strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="row">
                            <div class="col-xl-9 m-auto">

                             <form action="{{route("admin.student.update",$student->id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <br>
                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label">الاسم الكامل</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name"  value='{{$student->name}}' placeholder="الاسم الكامل" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label" for="course_title">الجنس  </label>
                                <div class="col-md-9">
                                    <div class="btn-group bootstrap-select"> 
                                        <select  name="sex" class="selectpicker" tabindex="-98"> 
                                            <option  selected> اختر جنس </option>

                                        <option value="0">انثي  </option>
                                        <option value="1">مدكر</option>
                                    
                                    </select>
                                </div>
                        </div>    
                            <div class="form-group">
                                <label for="lastName" class="col-sm-3 control-label">رقم البطاقة الوطنية</label>
                                <div class="col-sm-9">
                                    <input type="text"  value='{{$student->cin}}' name="cin" placeholder="رقم البطاقة الوطنية" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber" class="col-sm-3 control-label">رقم الهاتف </label>
                                <div class="col-sm-9">
                                    <input type="phoneNumber" value='{{$student->phone}}' name="phone" placeholder="رقم الهاتف" class="form-control">
                                    <span class="help-block">لن يتم الكشف عن رقم هاتفك لأي مكان او جهة كانت </span>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">العمر </label>
                                <div class="col-sm-9">
                                    <input  id="age"  value='{{$student->age}}'placeholder="العمر" class="form-control" name="age">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-3 col-form-label" for="course_title">الحالة الاجتماعية <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <div class="btn-group bootstrap-select"> 
                                            <select  name="familySituation" class="selectpicker" tabindex="-98"> 
                                                <option  selected> الحالات </option>

                                            <option value="1">عازب </option>
                                            <option value="2">متزوج</option>
                                            <option value="3"> مطلق</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">عدد الاطفال </label>
                                <div class="col-sm-9">
                                    <input  name="childrenNmb" value='{{$student->childrenNmb}}' placeholder="عدد الاطفال " class="form-control" name= "nombredeenfant">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">المستوي التعليمي </label>
                                <div class="col-sm-9">
                                    <input  name="educationLevel"  value='{{$student->educationLevel}}' placeholder="المستوي التعليمي" class="form-control" name="niveauscolaire">
                                </div>
                            </div>  
                         
                            <div class="form-group">
                                <label class="col-md-3 col-form-label" for="course_title"> العنوان<span class="required"> *</span></label>
                                <div class="col-md-9">
                                    <textarea  name="address"  placeholder="العنوان" class="mytextarea"  class="form-control">{{$student->address}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-form-label" for="course_title"> الملاحضات<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <textarea  name="nots" class="mytextarea"   class="form-control">{{$student->nots}}</textarea>
                                </div>
                            </div>
                            <div class="form-group >
                                <label class="col-md-3 col-form-label" for="course_title">صورة الكورس</label>
                                <div class="col-md-9">
                                    <input type="file" name="photo" class="form-control"  placeholder=""  required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label" for="course_title">المعهد  <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="btn-group bootstrap-select"> 
                                        <select  name="student_group_id" class="selectpicker" tabindex="-98"> 
                                            <option  selected> اختر مجموعة </option>
                                            @if (isset($studentgroups) && $studentgroups->count()>0)
                                                @foreach ($studentgroups as $studentgroup)
                                                  <option value="{{$studentgroup->id}}">{{$studentgroup->title}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                </div> 
                                <br><br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
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
@section('scripts')
<script src="https://cdn.tiny.cloud/1/lp3k352k7b0pyw7jy2uvuh5igu4nxqn3k2bgrocu3c6kvhho/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: '.mytextarea',
    language: 'ar'
    });
</script>

@endsection