 @extends('admin.layouts.app')
@section('content')
<br><br><br>

     @livewire('admin.quiz.addquestion',['cource' => $cource])
    
    
@endsection

{{--  @extends('admin.layouts.app')
 @section('content')
 <br><br><br>
 <div class="page-content">
     <div class="page-content-inner">
 
         <div class="d-flex">
             <nav id="breadcrumbs" class="mb-3">
                 <ul>
                     <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                     <li><a href="#"> الكورسات </a></li>
                     <li>الاسئلة</li>
                 </ul>
             </nav>
         </div>
 
         @if ($errors->any())
         <div class="alert alert-danger">
             <strong></strong> There were some problems with your input.<br><br><br><br>
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
 
         <div uk-grid="" class="uk-grid">
   
 
             <div class="uk-width-2-4@m">
 
                 <div class="card rounded">
                     <div class="p-3">
                         <h5 class="mb-0"> اضافة سؤال</h5>
                     </div>
                     <hr class="m-0">
                     <form action="{{route("admin.addquestion.store")}}" method="POST"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                         
                             <div class="uk-first-column">
                                 <h5 class="uk-text-bold mb-2"> السؤال</h5>
                                 <input type="text" class="uk-input" name="question" placeholder="السؤال">
                                 <input type="hidden" class="uk-input"  value='{{$cource->id}}' name="cource_id" >
                             </div>
                             <div class="uk-grid-margin uk-first-column">
                                 <h5 class="uk-text-bold mb-2">التسجيل </h5>
                                 <div class="uk-margin"> 
                                     <div uk-form-custom> 
                                         <input type="file" name="audio> 
                                         <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر تسجيل </button> 
                                     </div> 
                                 </div> 
                             </div>
                         </div>
                         <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                         
                             <div class="uk-first-column">
                                 <h5 class="uk-text-bold mb-2"> الخيار الاول</h5>
                                 <input type="text" name="option[]" class="form-control" id="course_title"    placeholder=""  required="">
                                 <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                 <select name="points[]" class="uk-select">    
                                     <option value="">من فضلك حدد الاجابة</option>
                                         <option value="0">جواب صحيح </option>
                                         <option value="1">جواب خطأ</option>
                                 </select>
                                 <br><br>
                                 <h5 class="uk-text-bold mb-2">الصورة </h5>
                                 <div class="uk-margin"> 
                                     <div uk-form-custom> 
                                         <input type="file" name="image[]"> 
                                         <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                      
                                     </div> 
                                 </div> 
 
                             </div>
                             <div class="uk-grid-margin uk-first-column">
                                 <div class="uk-first-column">
                                     <h5 class="uk-text-bold mb-2"> الخيار الثاني</h5>
                                     <input type="text" name="option[]" class="form-control" id="course_title"    placeholder=""  required="">
                                     <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                     <select name="points[]" class="uk-select">    
                                         <option value="">من فضلك حدد الاجابة</option>
                                             <option value="0">جواب صحيح </option>
                                             <option value="1">جواب خطأ</option>
                                     </select>
                                     <br><br>
                                     <h5 class="uk-text-bold mb-2">الصورة </h5>
                                     <div class="uk-margin"> 
                                         <div uk-form-custom> 
                                             <input type="file" name="image[]"> 
                                             <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                          
                                         </div> 
                                     </div> 
     
                                 </div>
                               
                             </div>
                         </div>
                       <br><br>
                       <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                         
                         <div class="uk-first-column">
                             <h5 class="uk-text-bold mb-2"> الخيار الثالث</h5>
                             <input type="text" name="option[]" class="form-control" id="course_title"    placeholder=""  required="">
                             <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                             <select name="points[]" class="uk-select">    
                                 <option value="">من فضلك حدد الاجابة</option>
                                     <option value="0">جواب صحيح </option>
                                     <option value="1">جواب خطأ</option>
                             </select>
                             <br><br>
                             <h5 class="uk-text-bold mb-2">الصورة </h5>
                             <div class="uk-margin"> 
                                 <div uk-form-custom> 
                                     <input type="file" name="image[]"> 
                                     <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                  
                                 </div> 
                             </div> 
 
                         </div>
                         <div class="uk-grid-margin uk-first-column">
                             <div class="uk-first-column">
                                 <h5 class="uk-text-bold mb-2"> الخيار الرابع</h5>
                                 <input type="text" name="option[]" class="form-control" id="course_title"    placeholder=""  required="">
                                 <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                 <select name="points[]" class="uk-select">    
                                     <option value="">من فضلك حدد الاجابة</option>
                                         <option value="0">جواب صحيح </option>
                                         <option value="1">جواب خطأ</option>
                                 </select>
                                 <br><br>
                                 <h5 class="uk-text-bold mb-2">الصورة </h5>
                                 <div class="uk-margin"> 
                                     <div uk-form-custom> 
                                         <input type="file" name="image[]"> 
                                         <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                      
                                     </div> 
                                 </div> 
 
                             </div>
                           
                         </div>
                         
                        
                         <div class="uk-grid-margin uk-first-column">
 
                             <div class="mb-3 mt-3">
                                 <button type="submit" class="btn btn-default">حفظ</button>
                             </div>
                         </div>
                     </div>
                      </form>
                
                 </div>
 
             </div>
 
 
         </div>
 
     </div>
 
 </div>    
 
     
 @endsection --}}