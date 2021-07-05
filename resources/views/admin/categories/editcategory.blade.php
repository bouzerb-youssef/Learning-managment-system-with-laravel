@extends('admin.layouts.app')

@section('content')
    
@if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif
<div class="page-content">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="page-content">
    <div class="page-content-inner">

    

    

        <div class="card">
            <div class="card-header border-bottom-0 py-4">
                <h5> ادارة الاصناف </h5>
            </div>


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true"> اللائحة</a></li>
                
          
            </ul>

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="row">
                            <div class="col-xl-9 m-auto">

                             <form action="{{route("admin.editcategory.update",$category->id)}}" method="POST">
                            {{ csrf_field() }}
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title">اسم الصنف<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" id="course_title"  name="title"  placeholder=""  required="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <h3>  </h3>
                            
                                    <div class="form-group row mb-3">
                                        <button type="submit" class="btn btn-outline-dark">حفظ</button>
                                    </div>
                                    
                                </div>
                               
                      

                            </div>
                        </div>


                    </li>
                 
                    </li> 
                </ul>

            </div>

        </div>






</div>
@endsection