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
            <h5> Course Manager </h5>
        </div>


        <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
            <li class=""><a href="#" aria-expanded="false"> الجزء الاول</a></li>
            <li class=""><a href="#" aria-expanded="false"> الجزء الثاني</a></li>
            <li class="uk-active"><a href="#" aria-expanded="true">الجزء الثالث</a></li>
         
            <li class=""><a href="#" aria-expanded="false">الانتهاء</a></li>
        </ul>

        <div class="card-body">
        <form action="{{route("admin.addcontent.store")}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">
               
                    <li>
                        <div class="row">
                    
                                <div class="col-xl-9 m-auto">

                            
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                        <div class="col-md-9">
                                            <textarea  name="title1" class="mytextarea" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    @error('title1')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="short_description">
                                            التعريف</label>
                                        <div class="col-md-9">
                                            <textarea  name="description1" class="mytextarea" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="short_description">الزر</label>
                                        <div class="col-md-9">
                                            <textarea  name="button1" class="mytextarea" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="course_title">الصورة الرئيسية</label>
                                        <div class="col-md-9">
                                            <input type="file" name="hero_image1" class="form-control"  placeholder=""  required="">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </li>

                    <li>


                        <div class="row">
                    
                            <div class="col-xl-9 m-auto">

                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                    <div class="col-md-9">
                                        <textarea  name="title2" class="mytextarea" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">
                                        التعريف</label>
                                    <div class="col-md-9">
                                        <textarea  name="description2" class="mytextarea" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">الزر</label>
                                    <div class="col-md-9">
                                        <textarea  name="button2" class="mytextarea" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="course_title">الصورة الرئيسية</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image2" class="form-control"  placeholder=""  required="">
                                    </div>
                                </div>
                            </div>
                    </div>


                    </li>


                    <li class="uk-active  " style="">

                        <div class="row">
                    
                            <div class="col-xl-9 m-auto">

                        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">العنوان</label>
                                    <div class="col-md-9">
                                        <textarea  name="title3" class="mytextarea" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">
                                        التعريف</label>
                                    <div class="col-md-9">
                                        <textarea  name="description3" class="mytextarea" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="short_description">الزر</label>
                                    <div class="col-md-9">
                                        <textarea  name="button3" class="mytextarea" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="" style="">

                                <div class="row">
                                    <div class="col-12 my-lg-5">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                            <div class="mb-3 mt-3">
                                                <button type="submit" class="btn btn-default">حفظ</button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
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