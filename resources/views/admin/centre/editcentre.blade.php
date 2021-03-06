@extends('admin.layouts.app')
@section('content')



<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Centres </a></li>
                    <li>Add New CEntre</li>
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
           


           

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="row">
                            <div class="col-xl-9 m-auto">

                             <form action="{{route("admin.centre.update",$centre->id)}}" method="POST">
                            {{ csrf_field() }}
                            <br>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title"> Centre<span class="required"> *</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="centre" class="form-control" id="course_title" value="{{$centre->centre}}"  name="title"  placeholder="" >
                                        <div class="d-flex justify-content-between mb-3">

                                            <h3>  </h3>
                                    
                                            <div>
                                                <button type="submit" class="btn btn-outline-dark">Edit</button>
                                    
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