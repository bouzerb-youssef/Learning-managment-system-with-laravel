@extends('admin.layouts.app')

@section('content')
    
@if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif 
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

                                    @foreach ($categories as $category)
                                        <div class="sec-list-item">
                                            <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                            {{--   <label class="mb-0 mx-2">
                                                    <input class="uk-checkbox" type="checkbox"> 
                                                </label> --}}
                                                <p> {{$category->title}} </p>
                                            </div>
                                            <div>
                                                <div class="btn-act"> <a href="#">
                                                    <a  href="{{route("admin.category.remove",$category->id)}}"  class="btn btn-icon btn-hover btn-lg btn-circle"  class="button delete-confirm"   uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                                        <i class="uil-trash-alt text-danger" ></i> 
                                                    </a>
                                
                                                    <a href="{{route("admin.editcategory",$category->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة الدروس" title="" aria-expanded="false">
                                                        <i class="uil-pen "></i> 
                                                    </a>  
                                
                                                </div> 
                                            </div>
                                        </div>
                                    @endforeach
                                    <br><br>
                                   <h3>اضافة صنف:<h3>
                                    <br><br>
                                    <form action="{{route("admin.addcategory.store")}}" method="POST" >
                                        {{ csrf_field() }}
                                            <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                        <input type="text"  name='title' class="uk-input" >
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <input type="submit" value="submit" class="btn btn-default">
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