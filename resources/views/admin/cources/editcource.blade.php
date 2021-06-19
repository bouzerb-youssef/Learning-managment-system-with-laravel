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

        <div uk-grid="" class="uk-grid">
  

            <div class="uk-width-2-4@m">

                <div class="card rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> اضافة كورس</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.updatecource",$cource->id)}}" method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                    {{ csrf_field() }}

                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2">اسم الكورس</h5>
                                    <input type="text" class="uk-input"  value="{{$cource->title}}" name="title" placeholder="الاسم الكامل">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر صنف </h5>
                                    <select name="student_group_id" class="uk-select">
                                        @if (isset($categories) && $categories->count()>0)
                                        @foreach ($categories as $category)
                                        <option  value="{{$category->id}}" >{{$category->title}}</option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> تعريف قصير</h5>
                                    <textarea  name="short_description" class="mytextarea"  placeholder="الملاحضات"   class="form-control"> {{$cource->short_description}}</textarea>
                                </div>

                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> التعريف </h5>
                                    <textarea  name="description" class="mytextarea"  placeholder="الملاحضات"   class="form-control"> {{$cource->description}}</textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر صنف </h5>
                                    <select name="category_id" class="uk-select">
                                        @if (isset($categories) && $categories->count()>0)
                                        @foreach ($categories as $category)
                                        <option  value="{{$category->id}}" >{{$category->title}}</option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر مستوي </h5>
                                    <select name="level" class="uk-select">
                                        <option value="مبتدا"  >مبتدا</option>
                                        <option value="متوسط"   >متوسط</option>
                                        <option value="متقدم"   >متقدم</option>
                                        
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> التفاصيل </h5>
                                    <textarea  name="detail" class="mytextarea"  placeholder="الملاحضات"   class="form-control"> {{$cource->detail}}</textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">الصورة </h5>
                                    <div class="uk-margin"> 
                                        <div uk-form-custom> 
                                            <input type="file" name="thumbnail"> 
                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر صورة </button> 
                                        </div> 
                                    </div> 
                                </div> 
                            <div class="uk-flex uk-flex-right p-4">
                            
                                <button  type="submit" class="btn btn-default">حفظ البيانات</button>
                            </div>
                        </div>
                     </form>
               
                </div>

            </div>


        </div>

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