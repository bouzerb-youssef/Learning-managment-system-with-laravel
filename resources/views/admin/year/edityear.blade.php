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
                    <li><a href="#"> years </a></li>
                    <li>Create New years</li>
                </ul>
            </nav>
        </div>



        <div class="card">
            <div class="card-header border-bottom-0 py-4">
                <h5> years Manager </h5>
            </div>


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true">  اضافة سنة دراسية</a></li>
                
          
            </ul>

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="row">
                            <div class="col-xl-9 m-auto">

                             <form action="{{route("admin.year.update",$year->id)}}" method="POST">
                            {{ csrf_field() }}
                            <br>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title"> السنة الدراسية<span class="required"> *</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="year" class="form-control" id="course_title" value="{{$year->year}}"  name="title"  placeholder="" >
                                        <button type="submit" class="btn btn-default" >تعديل</button>
                                    </div>
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