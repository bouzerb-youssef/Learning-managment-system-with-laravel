@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> الدورات </a></li>
                    <li>انشاء دورة جديدة</li>
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
                        <h5 class="mb-0"> انشاء دورة</h5>
                    </div>
                    <hr class="m-0">
                    <form action="{{route("admin.studentgroup.store")}}"  method="POST">
                        {{ csrf_field() }}
                                <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                        <div class="uk-grid-margin">
                                            <h5 class="uk-text-bold mb-2"> الاسم</h5>
                                            <input type="text" class="uk-input"name="title" placeholder="الاسم ">
                                        </div>
                                        <div class="uk-grid-margin uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> اختر معهد </h5>
                                            <select name="centre_id" class="uk-select">
                                                @if (isset($centres) && $centres->count()>0)
                                                @foreach ($centres as $centre)
                                                <option value="{{$centre->id}}">{{$centre->centre}} :: {{$centre->id}} </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>  
                                        <div class="uk-grid-margin uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> اختر دورة </h5>
                                            <select name="formation_id" class="uk-select">
                                                @if (isset($formations) && $formations->count()>0)
                                                @foreach ($formations as $formation)
                                                <option value="{{$formation->id}}">{{$formation->title}} </option>
                        
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>  
                                        <div  class='container' class="uk-grid-margin uk-first-column" >
                                            <h5 class="uk-text-bold mb-2"> </h5>
                                           
                                             </div>
                                </div>
                                        <div  class='container' class="uk-grid-margin uk-first-column" >
                                            <h5 class="uk-text-bold mb-2"> تعريف </h5>
                                            <textarea  name="description" class="mytextarea"  placeholder="الملاحضات"   class="form-control"></textarea>
                                             </div> 
                                           <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                            <div  class='container' class="uk-grid-margin uk-first-column" >
                                                <h5 class="uk-text-bold mb-2"> </h5>
                                               
                                                 </div>
                                            <div class="d-flex justify-content-between mb-3">

                                                <h3>  </h3>
                                        
                                                <div>
                                                    <button type="submit" class="btn btn-outline-dark">حفظ</button>
                                        
                                                </div>
                                            </div 
                                             
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