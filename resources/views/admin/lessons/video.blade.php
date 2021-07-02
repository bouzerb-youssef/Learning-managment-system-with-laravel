@extends('admin.layouts.app')
@section('content')
<div>
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
                       
                        <div class="">
                            <div class="">              
                                    <div class="card" x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false {{-- , $wire.fileCompleted() --}}"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        
                        
                                        <div class="card-body">
                                            <div class="progress my-4"  x-show="isUploading">
                                                <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
                                            </div>
    
                                            <form  action="{{route("admin.video.store")}}" method="POST" enctype="multipart/form-data" >
                                                {{ csrf_field() }}
                                                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                            <div class="uk-first-column">
                                                                <h5 class="uk-text-bold mb-2">اسم الدرس</h5>
                                                                <input type="text" class="uk-input" name='name' placeholder="اسم الدرس">
                                                            </div>
                                                           {{--  <div class="uk-first-column">
                                                                <h5 class="uk-text-bold mb-2">عدد الدقائق</h5>
                                                                <input type="text" class="uk-input"  wire:model='duration' placeholder="عدد الدقائق">
                                                            </div> --}}
                                                    
                                                        
                                                        </div>
                                                        <div  class='container' class="uk-grid-margin uk-first-column" >
                                                            <div class="uk-grid-margin uk-first-column">
                                                                <h5 class="uk-text-bold mb-2">الفيديو </h5>
                                                                <div class="uk-margin"> 
                                                                    <div uk-form-custom> 
                                                                        <input type="file" name='video'> 
                                                                        <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر فيديو </button> 
                                                                    </div> 
                                                                </div> 
                                                            </div> 
                                                        </div>                            
                                                    <div class="uk-flex-right .uk-child-width-1-5 p-2">
                                                        
                                                            <button  type="submit" class="btn btn-default">حفظ البيانات</button>
                                                        </div>
                                                
                                                    
                                                </form>
                                                
                                            @error('duration')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            @error('vedio')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
    
                                        </div>
    
                                    </div>
                                
                            </div>
                        </div> 
                    </div>
    
                    
                    </div>
    
                </div>
    
    
            </div>
    
        </div>
    
    </div>    
    

</div> 
        

@endsection