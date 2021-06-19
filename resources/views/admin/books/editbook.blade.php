@extends('admin.layouts.app')

@section('content')
    

<div class="page-content">


    <div class="page-content-inner">
        <div class="card">
            <div class="card-header border-bottom-0 py-4">
                <h5> ادارة  الكتب </h5>
            </div>


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true"> اللائحة</a></li>
            </ul>
            <div class="card-body">
                

            <br><br>
                <h3>أضافة كتاب ::</h3> 
                <br><br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card" x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false "
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    
                    
                                    <div class="card-body">
                                        <div class="progress my-4"  x-show="isUploading">
                                            <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
                                        </div>

                                        <form action="{{route("admin.book.update",$book->id)}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}   
                                                                                          
                                                    <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                        <label for="">الصنف</label>   
                                                        <select name="categorybook_id"   class="selectpicker" 
                                                        tabindex="-98"> 
                                                        <option    selected> اختر صنف </option> 

                                                                @foreach ($categorybooks as $categorybook)
                                                                <option  value="{{$categorybook->id}}" >{{$categorybook->title}}</option>
                                                                @endforeach
                                                         </select>
                                                         <br>
                                                         <label for="">اسم الكتاب</label>
                                                        <input type="text"  value="{{$book->title}}" name='title' class="uk-input" >
                                                        <label for="">الوصف</label>
                                                        <textarea  name="description" value="{{$book->description}}" class="mytextarea" class="form-control"></textarea>

                                                    
                                                        <br>
                                                        <label for="">صورة للكتاب</label>
                                                        <input type="file" name="thumbnail">
                            
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <input type="submit" value="حفظ" class="btn btn-default">
                                                        </div>
                                        
                                                    </div>
                                                </div>
                                        </form>
                                    
                    
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    


                @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                @error('thumbnail')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                @error('categorybook_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror      

                        </li>
                 
                    </li> 
                </ul>

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