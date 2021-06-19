@extends('admin.layouts.app')
@section('content')


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
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> stage </a></li>
                    <li>Create New stage</li>
                </ul>
            </nav>
        </div>



        <div class="card">
            <div class="card-header border-bottom-0 py-4">
                <h5> stages Manager </h5>
            </div>


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true"> اضافة ستاج</a></li>
                
          
            </ul>

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="row">
                            <div class="col-xl-9 m-auto">

                             <form action="{{route("admin.addstage.store")}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="course_title"> التلاميد <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="btn-group bootstrap-select"> 
                                        <select name="user_id" class="selectpicker" 
                                         tabindex="-98"> 
                                        <option data-icon="uil-android-alt" selected> اختر اسم </option>
    
                                            @foreach ($users as $user) 
                                                        <option  value="{{$user->id}}" > {{$user->name}}</option>
                                            @endforeach 
                                    </select></div>
                                    
                                </div>
                            </div>
                         
                            <br>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title">اسم العمل/السطاج<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" id="course_title"  name="title"  placeholder=""  required="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description"> التعريف </label>
                                    <div class="col-md-9">
                                        <textarea  name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description"> العنوان </label>
                                    <div class="col-md-9">
                                        <textarea  name="address" id="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title"> النوع <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <div class="btn-group bootstrap-select"> 
                                            <select  name="genre" class="selectpicker" tabindex="-98"> 
                                               <option data-icon="uil-android-alt" selected> اختر نوع </option> 

                                            <option value="stage"  >سطاج</option>
                                            <option value="emploi"   >عمل</option>
                                        </select></div>
                                        
                                    </div>
                                </div>
                             {{--    <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title">صورة الكورس</label>
                                    <div class="col-md-9">
                                        <input type="file" name="thumbnail" class="form-control"  placeholder=""  required="">
                                    </div>
                                </div> --}}
                                <div class="form-group row mb-3">
                                    <button type="submit" class="btn btn-default" >حفظ</button>
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