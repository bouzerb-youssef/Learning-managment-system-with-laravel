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
          {{--   <div class="uk-width-1-4@m uk-flex-last@m uk-first-column">

                <nav class="responsive-tab style-3 setting-menu card uk-sticky" uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top" style="">

                    <ul>
                        <li class="uk-active"><a href="#"> <i class="uil-cog"></i> General </a></li>
                        <li><a href="#"> <i class="uil-user"></i> Profile </a></li>
                        <li><a href="#"> <i class="uil-usd-circle"></i> Monetization</a></li>
                        <li><a href="#"> <i class="uil-unlock-alt"></i> Password </a></li>
                        <li><a href="#"> <i class="uil-dollar-alt"></i> Earning</a></li>
                        <li><a href="#"> <i class="uil-scenery"></i> Avatar &amp; Cover</a></li>
                        <li><a href="#"> <i class="uil-shield-check"></i> Security</a></li>
                        <li><a href="#"> <i class="uil-bolt"></i> Membarship</a></li>
                        <li><a href="#"> <i class="uil-history"></i> Manage Sessions</a></li>
                        <li><a href="#"> <i class="uil-trash-alt"></i> Delete account</a></li>
                    </ul>
                </nav><div class="uk-sticky-placeholder" style="height: 522px; margin: 0px 0px 20px;" hidden=""></div>

            </div> --}}

            <div class="uk-width-2-4@m">

                <div class="card rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> تسجيل الطالب (تعديل)</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.student.update",$student->id)}}" method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                    {{ csrf_field() }}
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الاسم الكامل</h5>
                                    <input type="text" class="uk-input" value="{{$student->name}}" name="name" placeholder="الاسم الكامل">
                                </div>
                               
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الايميل</h5>
                                    <input type="text" class="uk-input"  value="{{$student->email}}" name="email" placeholder="الايميل">
                                </div>
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> كلمة السر</h5>
                                    <input type="text" class="uk-input"   value="{{$student->password}}"name="password" placeholder="كلمة السر">
                                </div> 
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الجنس </h5>
                                    <select  name="sex"  class="uk-select">
                                        <option value="0" >انثي</option>
                                        <option value="1">مدكر</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> رقم البطاقة الوطنية </h5>
                                    <input type="text" class="uk-input"  value="{{$student->cin}}"  name="cin" placeholder="رقم البطاقة الوطنية">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> رقم الهاتف </h5>
                                    <input type="text" class="uk-input"  value="{{$student->phone}}"  name="phone" placeholder="رقم الهاتف">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> العمر</h5>
                                    <input type="text" class="uk-input" placeholder="العمر" value="{{$student->age}}"   name="age">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الحالة الاجتماعية </h5>
                                    <select name="familySituation" class="uk-select">
                                        <option value="0" >عازب</option>
                                        <option value="1">متزوج</option>
                                        <option value="2">مطلق</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> عدد الاطفال</h5>
                                    <input type="text" class="uk-input" name="childrenNmb"  value="{{$student->childrenNmb}}" placeholder="عدد الاطفال ">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> المستوي التعليمي</h5>
                                    <input type="text" class="uk-input" name="educationLevel" value="{{$student->educationLevel}}" placeholder="المستوي التعليمي">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> العنوان</h5>
                                    <textarea  name="address" placeholder="العنوان" {{-- class="mytextarea"  --}} class="form-control">{{$student->address}}</textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الملاحضات</h5>
                                    <textarea  name="nots" {{-- class="mytextarea" --}}  placeholder="الملاحضات"   class="form-control">{{$student->nots}}</textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">الصورة الشخصية</h5>
                                    <div class="uk-margin"> 
                                        <div uk-form-custom> 
                                            <input type="file"    name="photo"> 
                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1">اختر صورة شخصية</button> 
                                        </div> 
                                    </div> 
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر مجموعة </h5>
                                    <select name="group_id" class="uk-select">
                                        @if (isset($studentgroups) && $studentgroups->count()>0)
                                        @foreach ($studentgroups as $studentgroup)
                                        <option value="{{$studentgroup->id}}">{{$studentgroup->title}} </option>

                                        @endforeach
                                        @endif
                                    </select>
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