@extends('admin.layouts.app')
@section('content')


<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> المعاهد </a></li>
                    <li>اضافة معهد جديد</li>
                </ul>
            </nav>
        </div>

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

        <div class="card">
           


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true">  اضافة  معهد</a></li>
                
          
            </ul>

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="row">
                            <div class="col-xl-9 m-auto">

                             <form action="{{route("admin.centre.update",$centre->id)}}" method="POST">
                            {{ csrf_field() }}
                            <br>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title"> المعهد<span class="required"> *</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="centre" class="form-control" id="course_title" value="{{$centre->centre}}"  name="title"  placeholder="" >
                                        <div class="d-flex justify-content-between mb-3">

                                            <h3>  </h3>
                                    
                                            <div>
                                                <button type="submit" class="btn btn-outline-dark">تعديل</button>
                                    
                                            </div>
                                        </div
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