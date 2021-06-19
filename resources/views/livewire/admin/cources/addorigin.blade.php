<div>
    <br><br><br>
    <div class="page-content-inner">

     

        <div class="card">
            <div class="card-header border-bottom-0 py-4">
                <label> انشاء الكورس </label>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    

            <ul  class="uk-child-width-expand  uk-tab"  uk-switcher="connect: #course-edit-tab; {{-- animation: uk-animation-slide-left-medium --}},  uk-animation-slide-right-medium ">
                <li ><a href="#" aria-expanded="false"> معلومات الكورس</a></li>
                <li><a href="#" aria-expanded="false">اضافة الفصول</a></li>
                <li><a href="#" aria-expanded="false">المرفقات</a></li>
                <li><a href="#" aria-expanded="false">الاحتياجات</a></li>
                <li><a href="#" aria-expanded="false">الانتهاء</a></li>
            </ul>
            <div class="card-body">
            <form  wire:submit.prevent='store'   action="">
                {{ csrf_field() }}
                <ul    class="uk-switcher"  id="course-edit-tab" style="touch-action: pan-y ;">
                  
                        <li >
                            <div class="row">
                                <div class="col-xl-9 m-auto">
    
                            
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="course_title">اسم الكورس<span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="uk-input" wire:model.lazy="title" placeholder="الاسم الكامل">
                                        </div>
                                    </div>
    
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="short_description">
                                            تعريف قصير</label>
                                        <div class="col-md-9">
                                            <textarea  wire:model.lazy="short_description" class="mytextarea"  placeholder="تعريف قصير" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="short_description">
                                            التعريف</label>
                                        <div class="col-md-9">
                                            <textarea  wire:model.lazy="desc" class="mytextarea"  placeholder="التعريف"   class="form-control"></textarea> 
                                        </div>
                                    </div>
    
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="short_description"> اختر صنف </label>
                                        <div class="col-md-9">
    
                                            <select wire:model.lazy="category_id" class="uk-select">
                                                @if (isset($categories) && $categories->count()>0)
                                                @foreach ($categories as $category)
                                                <option  value="{{$category->id}}" >{{$category->title}}</option>
    
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                        <div class="form-group row mb-3"> 
                                            <label class="col-md-3 col-form-label" for="short_description"> اختر صورة </label> 
                                            <div class="col-md-9">
                                                
                                                <div uk-form-custom="target: true">
                                                        <input type="file" wire:model.lazy='thumbnail'> 
                                                        <input class=" uk-input  uk-form-width-medium" type="text" placeholder="اختر صورة" disabled> 
                                                    
                                                </div>
                                            </div> 
                                        </div>
                                
                                </div>
                            </div>
                        </li>
                    
                        <li  >
                            <div > 
                                <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add1({{$j}})" >    اضافة الدروس </button>
                                
                                
                                    @foreach($inputs1 as $key1 => $value1)
                                    <div class="card" x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false {{-- , $wire.fileCompleted() --}}"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    
                    
                                    <div class="card-body">
                                        <div class="progress my-4"  x-show="isUploading">
                                            <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
                                        </div>
                                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                     
                                                        <div class="uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">اسم الدرس</h5>
                                                            <input type="text" class="uk-input" wire:model.lazy='name.{{ $value1 }}' placeholder="اسم الدرس">
                                                        </div>
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">الفيديو </h5>
                                                          {{--   <div class="uk-margin"> 
                                                                <div uk-form-custom>  --}}
                                                                    <input type="file" wire:model.lazy='vedio.{{ $value1 }}'> 
                                                      {{--           </div> 
                                                            </div>  --}}
                                                        </div>
                                                        <a   uk-tooltip="حدف " wire:click.prevent="remove1({{$key1}})" aria-expanded="false">
                                                            <i class="uil-trash-alt text-danger"  ></i> </a> 
                                                    </div>
                                    </div>
                                </div>
                
                                                                
                                                             
                                @endforeach
                            </div>       
                        </li> 
                        <li >
                            <div > 
                                <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add2({{$k}})" >    اضافة المرفقات </button>
                                
                                
                                    @foreach($inputs2 as $key2 => $value2)
                
                                                                
                                    <div class="uk-width-2-4@m">

                                        <div class="card rounded">
                                            <div class="p-3">
                                                <h5 class="mb-0"> اضافة فصل</h5>
                                            </div>
                                            <hr class="m-0">
                                          
                                                           
                                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                        <div class="uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">اسم الفصل</h5>
                                                            <input type="text" class="uk-input" wire:model.lazy="materialname.{{ $value2 }}" placeholder="الاسم الكامل">
                                                        </div>
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">المرفق </h5>
                                                           
                                                                    <input type="file" wire:model.lazy="material.{{ $value2 }}"> 
                                                        </div>
                                                    </div>
                                                    <a   uk-tooltip="حدف " wire:click.prevent="remove2({{$key2}})" aria-expanded="false">
                                                        <i class="uil-trash-alt text-danger"  ></i> </a> 
                                        </div>
                        
                                    </div>
                                        @endforeach
                            </div>       
                        </li> 
                    <li class="" >
                            <div >
                                <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add({{$i}})" >    اضافة الاحتياجات </button>     
                                @foreach($inputs as $key => $value)
                                <div class="row"> <div class="col-md-9">  <input type='text' wire:model='detail.{{ $value }}' class='uk-input'
                                    placeholder=""></div>
                                    <div class="col-md-2">          <div class="col-md-2">  <a   uk-tooltip="حدف " wire:click.prevent="remove({{$key}})" aria-expanded="false">
                                        <i class="uil-trash-alt text-danger"  ></i> </a></div>
                                    </div></div>  
                                    @error('detail.{{ $value }}') <span class="text-danger error">{{ $message }}</span>@enderror
                                @endforeach
                            </div>
                                      
                    </li> 
                    <li>
                        <div class="row">
                            <div class="col-12 my-lg-5">
                                <div class="text-center">
                                    <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                    <h3 class="mt-0">شكرا لك ل ملأ جميع المراحل !</h3>

                                    <p class="w-75 mb-2 mx-auto"> أضغط علي زر حفظ لتخزين الكورس  </p>

                                    <div class="mb-3 mt-3">
                                        
                                    <button type="submit" {{-- wire:click="store" --}} >حفظ</button>
                            
                                </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                   
                    </li>    
                       
                </ul>
            </form>
  


</div>
