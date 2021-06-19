@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Setting </a></li>
                    <li>Account Setting</li>
                </ul>
            </nav>
        </div>



        <div uk-grid="" class="uk-grid">
  

            <div class="uk-width-2-4@m">

                <div class="card rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> اضافة فصل</h5>
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
                    <hr class="m-0">
                    <form action="{{route("admin.addoption.store")}}" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                        
                            <div class="uk-first-column">
                                <h5 class="uk-text-bold mb-2"> الخيار</h5>
                                <input type="text" name="option" class="form-control" id="course_title"    placeholder=""  required="">
                                <input type="hidden" name='question_id' value="{{$question->id}}">

                            </div>
                            <div class="uk-grid-margin uk-first-column">
                                <h5 class="uk-text-bold mb-2">الصورة </h5>
                                <div class="uk-margin"> 
                                    <div uk-form-custom> 
                                        <input type="file" name="image"> 
                                        <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                    </div> 
                                </div> 
                            </div>
                            <div class="uk-first-column">
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
                            </div>
                          
                           
                        </div>
                                
                    
                    
                        <div class="uk-flex-right .uk-child-width-1-5 p-2">
                                
                            <button  type="submit" class="btn btn-default">حفظ البيانات</button>
                        </div>            
                         
                       
                        
                     </form>
               
                </div>

            </div>


        </div>

    </div>

</div>    

    
@endsection
