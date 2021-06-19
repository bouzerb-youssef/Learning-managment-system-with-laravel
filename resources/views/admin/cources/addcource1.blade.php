@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Course </a></li>
                    <li>Create New Course</li>
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
            <div class="card-header border-bottom-0 py-4">
                <label> Course Manager </label>
            </div>


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true"> معلومات الكورس</a></li>
                <li><a href="#" aria-expanded="false">اضافة الفصول</a></li>
              
                <li><a href="#" aria-expanded="false">الاحتياجات</a></li>
                
                <li><a href="#" aria-expanded="false">الانتهاء</a></li>
            </ul>

            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">
                  
                    <li class="uk-active">
                    <form  action="{{route("admin.addcource.store")}}" method="POST" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-9 m-auto">

                         
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title">اسم الكورس<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="uk-input" name="title" placeholder="الاسم الكامل">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">
                                        تعريف قصير</label>
                                    <div class="col-md-9">
                                        <textarea  name="short_description" class="mytextarea"  placeholder="تعريف قصير"   class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">
                                        التعريف</label>
                                    <div class="col-md-9">
                                       {{--  <textarea  name="description" class="mytextarea"  placeholder="التعريف"   class="form-control"></textarea> --}}
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description"> اختر صنف </label>
                                    <div class="col-md-9">

                                        <select name="category_id" class="uk-select">
                                            @if (isset($categories) && $categories->count()>0)
                                            @foreach ($categories as $category)
                                            <option  value="{{$category->id}}" >{{$category->title}}</option>

                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                             
                                    <div class="form-group row mb-3"> 
                                        <label class="col-md-3 col-form-label" for="short_description"> اختر صورة </label> 
                                        <div class="col-md-9">
                                              
                                            <div uk-form-custom="target: true">
                                                    <input type="file" name='thumbnail'> 
                                                    <input class=" uk-input  uk-form-width-medium" type="text" placeholder="اختر صورة" disabled> 
                                                
                                        </div>
                                    </div> 
                                </div>
                            
                            </div>
                        </div>


                    </li>

                    <li>
                        <div>
                           

                            <script type="text/JavaScript">
                                function createNewElement() {
                            // First create a DIV element.
                                var txtNewInputBox = document.createElement('div');
                            
                                // Then add the content (a new input box) of the element.
                                txtNewInputBox.innerHTML ='<div class="uk-card-default rounded"> <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4"><h5 class="mb-0">  معلومات الفصل </h5> </div><hr class="m-0"> <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""><div class="uk-first-column"><h6 class="uk-text-bold"> اسم الفصل </h6><input type="text" class="uk-input" name="section[]" placeholder="الاسم الكامل"></div><div><h6 class="uk-text-bold"> التعريف </h6><textarea  name="description[]" class="mytextarea"  placeholder="التعريف"   class="form-control"></textarea></div></div></div><br>';
                        
                            // Finally put it where it is supposed to appear.
                                 document.getElementById("newElementId").appendChild(txtNewInputBox);
                                }
                            </script>

                            <button   type='button'  class="btn btn-default mb-3"  onclick="createNewElement();"> <i class="uil-plus"></i> اضافة الفصول </button>
                            <div class="container">
                                <div  id="newElementId">    <div class="uk-card-default rounded"> <div class="uk-flex uk-flex-between uk-flex-middle py-3 px-4"><h5 class="mb-0">  معلومات الفصل </h5> </div><hr class="m-0"> <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""><div class="uk-first-column"><h6 class="uk-text-bold"> اسم الفصل </h6><input type="text" class="uk-input" name="section[]" placeholder="الاسم الكامل"></div><div><h6 class="uk-text-bold"> التعريف </h6><textarea  name="description[]" class="mytextarea"  placeholder="التعريف"   class="form-control"></textarea></div></div></div><br></div>
                            </div>
                        </div>
                            
    
                    </li>
                    <li>


                            <div class="row justify-content-center">
                                <div class="col-xl-9">

                                    <button  type='button' class="btn btn-default mb-3" onclick="acreateNewElement();"> <i
                                            class='uil-plus'></i> Requirements </button>

                                    <div id="anewElementId"> </div>

                                    <input type='text' name='detail[0]' class='uk-input'
                                        placeholder="">
                                  
                                </div>
                            </div>
                            

                            <script type="text/JavaScript">
                                function acreateNewElement() {
                             // First create a DIV element.
                              
                                var txtNewInputBox = document.createElement('input');
                                
                                    // Then add the content (a new input box) of the element.
                                    i++;
                                  txtNewInputBox.innerHTML = "<input  name='detail[] type='text' class='uk-input'>";
                                 // txtNewInputBox.setAttribute("name", "detail[]")
                                   
                                    // Finally put it where it is supposed to appear.
                                    
                                document.getElementById("anewElementId").appendChild(txtNewInputBox);
                               
                                  // dadElement.appendChild(txtNewInputBox)
                                        }
                            </script>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-12 my-lg-5">
                                <div class="text-center">
                                    <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                    <h3 class="mt-0">شكرا لك ل ملأ جميع المراحل !</h3>

                                    <p class="w-75 mb-2 mx-auto"> أضغط علي زر حفظ لتخزين الكورس  </p>

                                    <div class="mb-3 mt-3">
                                        <button type="submit" class="btn btn-default">حفظ</button>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>


                    </li>
                </form>

                </ul>

            </div>

        </div>

</div>
    
@endsection

