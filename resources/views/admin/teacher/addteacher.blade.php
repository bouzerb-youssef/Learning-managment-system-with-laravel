@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> الأساتذة </a></li>
                    <li> اضافة الأساتذة</li>
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
                        <h5 class="mb-0"> تسجيل الأستاذ</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.teacher.store")}}" method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                    {{ csrf_field() }}
                                    <div class="uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> الاسم الكامل</h5>
                                        <input type="text" class="uk-input" name="name" placeholder="الاسم الكامل">
                                    </div> 
                                  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الجنس </h5>
                                    <select  name="sex"  class="uk-select">
                                        <option value="أنثي"
                                         >انثي</option>
                                        <option value="مذكر"
                                        >مذكر</option>
                                    </select>
                                </div>
                              
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> رقم الهاتف </h5>
                                    <input type="text" class="uk-input"  name="phone" placeholder="رقم الهاتف">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">الصورة الشخصية</h5>
                                    <div class="uk-margin"> 
                                        <div uk-form-custom> 
                                            <input type="file" name="photo"> 
                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1">اختر صورة شخصية</button> 
                                        </div> 
                                    </div> 
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر مجموعة </h5>
                                    <select name="group_id" class="uk-select">
                                        @if (isset($groups) && $groups->count()>0)
                                        @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}} </option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر معهد </h5>
                                    <select name="center_id" class="uk-select">
                                        @if (isset($centres) && $centres->count()>0)
                                        @foreach ($centres as $centre)
                                        <option value="{{$centre->id}}">{{$centre->id}}::{{$centre->centre}} </option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                           
                               
                               
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> العنوان</h5>
                                    <textarea  name="address" placeholder="العنوان" {{-- class="mytextarea"  --}} class="form-control"></textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الملاحضات</h5>
                                    <textarea  name="nots" {{-- class="mytextarea" --}}  placeholder="الملاحضات"   class="form-control"></textarea>
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