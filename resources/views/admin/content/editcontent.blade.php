@extends('admin.layouts.app')

@section('content')
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
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card">
        <div class="card-header border-bottom-0 py-4">
            <h5> تعديل المحتوي  </h5>
        </div>


        <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li class="uk-active"><a href="#" aria-expanded="false"> الجزء الاول</a></li>
            <li class=""><a href="#" aria-expanded="false"> الجزء الثاني</a></li>
            <li class=""><a href="#" aria-expanded="false">الجزء الثالث</a></li>
         
         
        </ul>

        <div class="card-body">
       
            <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">
               
                  

                    <li>
                        <div class="row">
                    
                                <div class="col-xl-9 m-auto">

                                    <form action="{{route("admin.content.update.title1")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                            <div class="col-md-9">
                                                <textarea  name="title1" class="mytextarea" class="form-control">{{$content->title1}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        @error('title1')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                    <form action="{{route("admin.content.update.description1")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">
                                                التعريف</label>
                                            <div class="col-md-9">
                                               
                                                <textarea  name="description1" class="mytextarea" class="form-control">{{$content->description1}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                                </div>
                                            </div>
                                        </div>
             
                                        @error('description1')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                 
                                    <form action="{{route("admin.content.update.button1")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">الزر</label>
                                            <div class="col-md-9">
                                                <textarea  name="button1" class="mytextarea" class="form-control">{{$content->button1}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                            </div>
                                            </div>
                                        </div>
             
                                        @error('button1')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                    
                                    <form action="{{route("admin.content.update.heroimage1")}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                         
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="course_title">الصورة الرئيسية</label>
                                         
                                            <div class="col-md-9">
                                                <img src="{{$content->heroImagePath}}" alt=""> 
                                                <br><br>
                                                <input type="file" name="hero_image1" class="form-control"  placeholder=""  required="">
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                            </div>
                                            </div>
                                           
                                               
                                           
                                        </div>

             
                                        @error('hero_image1')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                
                                </div>
                        </div>
                    </li>


                    <li>
                        <div class="row">
                    
                                <div class="col-xl-9 m-auto">

                                    <form action="{{route("admin.content.update.title2")}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                            <div class="col-md-9">
                                                <textarea  name="title2" class="mytextarea" class="form-control">{{$content->title2}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                            </div>
                                            </div>
                                        </div>
             
                                        @error('title2')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                    <form action="{{route("admin.content.update.description2")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">
                                                التعريف</label>
                                            <div class="col-md-9">
                                                <textarea  name="description2" class="mytextarea" class="form-control">{{$content->description2}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                                </div>
                                            </div>
                                        </div>
             
                                        @error('description2')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                 
                                    <form action="{{route("admin.content.update.button2")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">الزر</label>
                                            <div class="col-md-9">
                                                <textarea  name="button2" class="mytextarea" class="form-control">{{$content->button2}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                            </div>
                                            </div>
                                        </div>
             
                                        @error('button2')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                    
                                    <form action="{{route("admin.content.update.image2")}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                       
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="course_title">الصورة الرئيسية</label>
                                            <div class="col-md-9">
                                                <img src="{{$content->heroImagePath}}" alt=""> 
                                                <br><br>
                                                
                                                <input type="file" name="image2" class="form-control"  placeholder=""  required="">
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                                </div>
                                            </div>
                                        </div>
             
                                        @error('image2')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                    
                                <div class="col-xl-9 m-auto">
                                    <form action="{{route("admin.content.update.title3")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                            <div class="col-md-9">
                                                <textarea  name="title3" class="mytextarea" class="form-control">{{$content->title3}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                                </div>
                                            </div>
                                        </div>
             
                                        @error('title3')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                    <form action="{{route("admin.content.update.description3")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">
                                                التعريف</label>
                                            <div class="col-md-9">
                                                
                                                <textarea  name="description3" class="mytextarea" class="form-control">{{$content->description3}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                                </div>
                                            </div>
                                        </div>
             
                                        @error('description3')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                    <form action="{{route("admin.content.update.button3")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">الزر</label>
                                            <div class="col-md-9">
                                                <textarea  name="button3" class="mytextarea" class="form-control">{{$content->button3}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                    <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                
                                                </div>
                                            </div>
                                        </div>
             
                                        @error('button3')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                </div>
                        </div>
                    </li>
            </ul>
        </form>
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