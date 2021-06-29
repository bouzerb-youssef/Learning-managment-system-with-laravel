@extends('admin.layouts.app')

@section('content')
    
@if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif 
<br> <br> <br>
    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> الاصناف </a></li>
                    <li>لائحة الاصناف</li>
                </ul>
            </nav>
        </div>
    

        @if ($errors->any())
        <div class="alert alert-danger">
          
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="card">
           

            <br> <br> 
            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true"> ادارة الاصناف</a></li>
                
          
            </ul>

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                                <li class="uk-active">

                                   
                                   <h5>اضافة صنف:<h5>
                                   
                                    <form action="{{route("admin.addcategory.store")}}" method="POST" >
                                        {{ csrf_field() }}
                                            <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                        <input type="text"  name='title' class="uk-input" >
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <h3>  </h3>
                                                    
                                                            <div class="form-group row mb-3">
                                                                <button type="submit" class="btn btn-outline-dark">حفظ</button>
                                                            </div>
                                                            
                                                        </div>
                                        
                                                    </div>
                                                </div>
                                        </form>
                                </li>
                    </li> 
                </ul>

            </div>

        </div>







@endsection