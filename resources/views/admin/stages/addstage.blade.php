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
                        <h5 class="mb-0"> اضافة فصل</h5>
                    </div>
                    <hr class="m-0">
                     <form  action="{{route("admin.stage.store")}}" method="POST"  >
                                    {{ csrf_field() }}
                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> أسم التدريب/العمل </h5>
                                    <input type="text" class="uk-input" name="title" placeholder="أسم التدريب/العمل">
                                    <input type="hidden" class="uk-input" name="user_id" value='{{$student->id}}' >

                    
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر النوع   </h5>
                                    <select name="genre" class="uk-select">
                                        <option value="عمل" >
                                            عمل
                                        </option>
                                        <option value="تدريب" >
                                            تدريب</option>
                                    
                                        
                                    </select>
                                </div>
                                <div  class='container' class="uk-grid-margin uk-first-column" >
                                    <h5 class="uk-text-bold mb-2"> تعريف </h5>
                                    <textarea  name="description" class="mytextarea"  placeholder="التعريف"   class="form-control"></textarea>
                                </div>  
                                <div  class='container' class="uk-grid-margin uk-first-column" >
                                    <h5 class="uk-text-bold mb-2"> العنوان </h5>
                                    <textarea  name="address" class="mytextarea"  placeholder="العنوان"   class="form-control"></textarea>
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
@section('scripts')
<script src="https://cdn.tiny.cloud/1/lp3k352k7b0pyw7jy2uvuh5igu4nxqn3k2bgrocu3c6kvhho/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: '.mytextarea',
  language: 'ar'
});
</script>

@endsection