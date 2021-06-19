@extends('admin.layouts.app')
@section('content')


    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> formations </a></li>
                    <li>Create New formations</li>
                </ul>
            </nav>
        </div>



        <div class="card">
            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true">  اضافة سنة دراسية</a></li>
               
          
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

                             <form action="{{route("admin.formation.store")}}" method="POST">
                            {{ csrf_field() }}
                            <br>
                                
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="course_title"> العنوان<span class="required"> *</span></label>
                                        <div class="col-md-9">
                                            <input type="text"  class="form-control" id="course_title"  name="title"  placeholder="" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="course_title"> الوصف<span class="required"> *</span></label>
                                        <div class="col-md-9">
                                            <textarea  name="description" class="mytextarea"  class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label  class="col-md-3 col-form-label" for="birthDate" class=" control-label">تاريخ البدأ*</label>
                                        <div class="col-md-9">
                                            <input type="date" name="datebegun" id="birthDate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="birthDate" class="col-md-3 col-form-label"  class=" control-label">تاريخ الانتهاء*</label>
                                        <div class="col-md-9">
                                            <input type="date" name="dateend" class="form-control"  id="birthDate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="course_title">السنة الدراسية <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <div class="btn-group bootstrap-select"> 
                                                <select  name="year_id" class="selectpicker" tabindex="-98"> 
                                                    <option  selected> اختر سنة </option>
                                                    @if (isset($years) && $years->count()>0)
                                                        @foreach ($years as $year)
                                                        <option value="{{$year->id}}">{{$year->year}} </option>
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