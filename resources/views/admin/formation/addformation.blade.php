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
                        <h5 class="mb-0"> انشاء دورة</h5>
                    </div>
                    <hr class="m-0">
                    <form action="{{route("admin.formation.store")}}"   method="POST">
                        {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" >
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> الاسم</h5>
                                    <input type="text" class="uk-input"name="title" placeholder="الاسم ">
                                </div>
                        
                             
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> تاريخ البدأ* </h5>
                                    <input type="date" name="datebegun" id="birthDate" class="form-control">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> تاريخ الانتهاء* </h5>
                                    <input type="date" name="dateend" id="birthDate" class="form-control">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> اختر مجموعة </h5>
                                    <select name="year_id" class="uk-select">
                                        @if (isset($years) && $years->count()>0)
                                        @foreach ($years as $year)
                                        <option value="{{$year->id}}">{{$year->year}} </option>
                
                                        @endforeach
                                        @endif
                                    </select>
                                </div>  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> الوصف </h5>
                                    <textarea  name="description"   class="form-control"></textarea>
                                </div>

                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                   
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                   
                                </div>
                                <div class="d-flex justify-content-between ">
        
                                    <h3>  </h3>
                            
                                    <div >
                                        <button  type="submit" class="btn btn-outline-dark">حفظ </button>
                                    </div>  
                                </div>
                            </div>
                        </form>
                    </div>
                  
                
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