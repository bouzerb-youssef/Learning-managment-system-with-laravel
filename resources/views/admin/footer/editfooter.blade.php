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
            <h5> تعديل محتوي الفوتر  </h5>
        </div>


        <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li class=""><a href="#" aria-expanded="false">الفوتر</a></li>
     
         
         
        </ul>

        <div class="card-body">
       
            <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">
               
                  

                    <li>
                        <div class="row">
                    
                                <div class="col-xl-9 m-auto">

                                    <form action="{{route("admin.footer.update.title")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                            <div class="col-md-9">
                                                <textarea  name="title"  class="mytextarea" class="form-control">{{$footercontent->title}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @error('title')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                    <form action="{{route("admin.footer.update.description")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">
                                                التعريف</label>
                                            <div class="col-md-9">
                                                <textarea  name="description" class="mytextarea"  class="form-control">{{$footercontent->description}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @error('description')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form> 
                                 
                                    <form action="{{route("admin.footer.update.facebook")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">رابط الفيسبوك</label>
                                            <div class="col-md-9">
                                                <textarea  name="facebook"  class="form-control">{{$footercontent->facebook}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @error('facebook')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                    <form action="{{route("admin.footer.update.twitter")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">رابط تويتر</label>
                                            <div class="col-md-9">
                                                <textarea  name="twitter"  class="form-control">{{$footercontent->twitter}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @error('twitter')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                    <form action="{{route("admin.footer.update.instagram")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">رابط انستغرام</label>
                                            <div class="col-md-9">
                                                <textarea  name="instagram"  class="form-control">{{$footercontent->instagram}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @error('instagram')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </form>
                                    <form action="{{route("admin.footer.update.youtube")}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">رابط اليوتيوب</label>
                                            <div class="col-md-9">
                                                <textarea  name="youtube"  class="form-control">{{$footercontent->youtube}}</textarea>
                                                <br>
                                                <div class="text-center">
                                                  
                                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @error('youtube')
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
