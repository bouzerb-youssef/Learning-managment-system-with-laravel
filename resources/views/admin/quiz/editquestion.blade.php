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
                    <form action="{{route("admin.updatequestion.update",$question->id)}}" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                        
                            <div class="uk-first-column">
                                <h5 class="uk-text-bold mb-2"> السؤال</h5>
                                <input type="text" class="uk-input"  value='{{$question->question}}' name="question" placeholder="السؤال">
                                <input type="hidden" class="uk-input"  value='{{$question->cource_id}}' name="cource_id" >
                            </div>
                          
                            <div class="uk-grid-margin uk-first-column">
                                <h5 class="uk-text-bold mb-2">التسجيل </h5>
                                <div class="uk-margin"> 
                                    <div uk-form-custom> 
                                        <input type="file" name="audio"> 
                                        <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر تسجيل </button> 
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
