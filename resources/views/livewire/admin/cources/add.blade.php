<div>
    <div class="page-content">
        <div class="page-content-inner">
    
            <div class="d-flex">
                <nav id="breadcrumbs" class="mb-3">
                    <ul>
                        <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                        <li><a href="#"> الكورسات </a></li>
                        
                    </ul>
                </nav>
            </div>
    
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong></strong> <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($createAccountError)
        <div class="uk-alert-danger" uk-alert>   <p>{{ $createAccountError }} </p> </div>
        
         @endif
    
            <div uk-grid="" class="uk-grid">
                <div class="uk-width-2-4@m">
    
                    <div class="card rounded">
                        <div class="p-3">
                            <h5 class="mb-0"> تسجيل الكورس</h5>
                          
                        </div>
                        <hr class="m-0">
                        <form  wire:submit.prevent='store' method="POST" enctype="multipart/form-data" >
                                            {{ csrf_field() }}
                                @if ($currentPage === 1)
                                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                                        <div class="uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">اسم الكورس</h5>
                                                            <input type="text" class="uk-input" wire:model.lazy="title" placeholder="الاسم الكامل">
                                                            @error('title')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror
                                                        </div>
                                                        
                                                      
                                                        <div class="uk-grid-margin uk-first-column" wire:ignore>
                                                            <h5 class="uk-text-bold mb-2"> اختر صنف </h5>
                                                      
                                                            <select wire:model.lazy="category_id" class="uk-select">    
                                                                <option value="">--اختر صنف--</option>
                                                                @if (isset($categories) && $categories->count()>0)
                                                                @foreach ($categories as $category)
                                                                <option value="{{$category->id}}" >{{$category->id}}::{{$category->title}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            @error('category_id')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror
                                                        </div>
                                                      
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2"> تعريف قصير</h5>
                                                            <textarea  wire:model.lazy="short_description" class="mytextarea"  placeholder="الملاحضات"   class="form-control"></textarea>
                                                            @error('short_description')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror
                                                        </div>
                                                     
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2"> التعريف </h5>
                                                            <textarea  wire:model.lazy="desc" class="mytextarea"  placeholder="الملاحضات"   class="form-control"></textarea>
                                                            @error('desc')<div class="uk-alert-danger" uk-alert> <p>{{ $message }} </p> </div> @enderror
                                                        </div>
                                                      
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">الصورة </h5>
                                                                    
                                                                    <input id="files" type='file' style='height:58px;border:0px;' name='ikhan'    class="inputfile" wire:model.lazy="thumbnail"> 
                                                                    @error('thumbnail')<div class="uk-alert-danger" uk-alert> <p>{{ $message }} </p> </div> @enderror
                                                        </div> 
                                                     
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2"></h5>
                                                            <input type="hidden" class="uk-input" >
                                                        </div>
                                                     
                                                        
                                                    </div>
                                                    {{-- ############################################################################## --}}
                                                    @elseif ($currentPage === 2)
                                                    <br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-9">
                                                            <div > 
                                                                <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add2({{$k}})" >    اضافة المرفقات </button>
                                                                <div class="uk-width-2-4@m">
                                
                                                                    <div class="card rounded">
                                                                                <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                                                    <div class="uk-first-column">
                                                                                        <h5 class="uk-text-bold mb-2">اسم المرفق</h5>
                                                                                        <input type="text"  class="uk-input"   wire:model="materialname.0" placeholder="الاسم الكامل">
                                                                                        @error('materialname')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                    </div>
                                                                                    <div class="uk-grid-margin uk-first-column">
                                                                                        <h5 class="uk-text-bold mb-2">المرفق </h5>
                                                                                       
                                                                                                <input type='file' style='height:58px;border:0px;'  class="inputfile" wire:model="material.0"> 
                                                                                                @error('material')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                    </div>
                                                                                </div>
                                                                               
                                                                                   
                                                                    </div>
                                                    
                                                                </div>
                                                          
                                                                
                                                                
                                                                    @foreach($inputs2 as $key2 => $value2)
                                                
                                                                                                
                                                                    <div class="uk-width-2-4@m">
                                
                                                                        <div class="card rounded">
                                                                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                                                        <div class="uk-first-column">
                                                                                            <h5 class="uk-text-bold mb-2">اسم المرفق</h5>
                                                                                            <input type="text" class="uk-input"  wire:model.lazy="materialname.{{ $value2 }}" placeholder="الاسم الكامل">
                                                                                            @error('materialname')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                        </div>
                                                                                        <div class="uk-grid-margin uk-first-column">
                                                                                            <h5 class="uk-text-bold mb-2">المرفق </h5>
                                                                                           
                                                                                                    <input type='file' style='height:58px;border:0px;'     wire:model.lazy="material.{{ $value2 }}"> 
                                                                                                    @error('material')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                        </div>
                                                                                    </div>
                                                                                    <a uk-tooltip="حدف " wire:click.prevent="remove2({{$key2}})" aria-expanded="false">
                                                                                        <i class="uil-trash-alt text-danger"  ></i> </a> 
                                                                        </div>
                                                        
                                                                    </div>
                                                                        @endforeach
                                                            </div>  
                                                        </div> 
                                                    </div>

                                                    
                                                    
                                        
                                                            
                                        
                                        

                                                    {{-- </div> --}}
                                                    @elseif ($currentPage === 3)
                                                    {{-- ######################################################################################### --}}
                                            
                                                        <br>
                                                  

                                                        <div class="col-xl-9 m-auto">
                                                            
                                                                <button   type='button'  class="btn btn-default mb-3"  wire:click.defer="add1({{$j}})" >    اضافة الدروس </button>
                                                                
                                                                        <div class="card" x-data="{ isUploading: false, progress: 0 }"
                                                                        x-on:livewire-upload-start="isUploading = true"
                                                                        x-on:livewire-upload-finish="isUploading = false {{-- , $wire.fileCompleted() --}}"
                                                                        x-on:livewire-upload-error="isUploading = false"
                                                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                        
                                                        
                                                                            <div class="card-body">
                                                                                <div class="progress my-4"  x-show="isUploading">
                                                                                    <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
                                                                                </div>
                                                                                            <div class="uk-child-width-1-2@s uk-grid-small p-1 uk-grid" uk-grid=""> 
                                                                                            
                                                                                                <div class="uk-first-column">
                                                                                                    <h5 class="uk-text-bold mb-2">اسم الدرس</h5>
                                                                                                    <input type="text" class="uk-input" wire:model.lazy='name.0' placeholder="اسم الدرس">
                                                                                                    @error('name')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                                </div>
                                                                                                <div class="uk-grid-margin uk-first-column">
                                                                                                    <h5 class="uk-text-bold mb-2">الفيديو </h5>
                                                                                            
                                                                                                            <input type='file' style='height:58px;border:0px;'  wire:model.lazy='vedio.0'> 
                                                                                                            @error('vedio')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                            
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    {{-- lesson 2 --}}
                                                              
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
                                                                                        <div class="uk-child-width-1-2@s uk-grid-small p-1 uk-grid" uk-grid=""> 
                                                                                        
                                                                                            <div class="uk-first-column">
                                                                                                <h5 class="uk-text-bold mb-2">اسم الدرس</h5>
                                                                                                <input type="text" class="uk-input" wire:model.lazy='name.{{ $value1 }}' placeholder="اسم الدرس">
                                                                                                @error('name')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                            </div>
                                                                                            <div class="uk-grid-margin uk-first-column">
                                                                                                <h5 class="uk-text-bold mb-2">الفيديو </h5>
                                                                                        
                                                                                                        <input type='file' style='height:58px;border:0px;'  wire:model.lazy='vedio.{{ $value1 }}'> 
                                                                                                        @error('vedio')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                                        
                                                                                            </div>
                                                                                            <a   uk-tooltip="حدف " wire:click.defer="remove1({{$key1}})" aria-expanded="false">
                                                                                                <i class="uil-trash-alt text-danger"  ></i> </a> 
                                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                            
                                                
                                                                                                
                                                                                             
                                                                @endforeach
                                                            
                                                        </div> 
                                                  
                            
                                                  
                                                    @elseif ($currentPage === 4)
                                                    {{-- ######################################################################################### --}}
                                              
                                                    <br>
                                                    
                                                    <div class="col-xl-9">
                                                      
                                                            <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add({{$i}})" >    اضافة الاحتياجات </button>    
                                                            <div class="row"> <div class="col-md-9">  <input type='text' wire:model.lazy='detail.0' class='uk-input'
                                                                placeholder="">
                                                                @error('detail.0')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                            </div>
                                                                <div class="col-md-2">          <div class="col-md-2">  </div>
                                                                </div></div>  
                                                                @error('detail') <span class="text-danger error">{{ $message }}</span>@enderror 
                                                               
                                                                    
                                                            @foreach($inputs as $key => $value)
                                                            <div class="row"> <div class="col-md-9">  <input type='text' wire:model.lazy='detail.{{ $value }}' class='uk-input'
                                                                placeholder=""></div>
                                                                <div class="col-md-2">          <div class="col-md-2">  <a   uk-tooltip="حدف " wire:click.prevent="remove({{$key}})" aria-expanded="false">
                                                                    <i class="uil-trash-alt text-danger"  ></i> </a></div>
                                                                </div></div>  
                                                                @error('detail')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror
                                                            @endforeach
                                                        
                        
                                                       
                                                    </div>
                                                        
                                                   
                                                   
                                                 

                                                    @elseif ($currentPage === 5)
                                                    {{-- ######################################################################################## --}}
                                                    
                                                {{--   <div class="row">--}}
                                                        <div class="col-12 my-lg-5"> 
                                                            <div class="text-center">
                                                                <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                                                <h3 class="mt-0">شكرا لك ل ملأ جميع المراحل !</h3>
                            
                                                                <p class="w-75 mb-2 mx-auto"> أضغط علي زر حفظ لتخزين الكورس  </p>
                            
                                                            
                                                                    
                                                            
                                                            </div>
                                                        </div> <!-- end col -->
                                                
                                                        {{--   </div> --}}
                                                                {{-- ############################################################################### --}}
                                                                   
                                                                 
                                                                @endif
                                                                    <div class="d-flex justify-content-between mb-3 px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                        @if ($currentPage === 1)
                                                                            <div></div>
                                                                        @else
                                                                            <button wire:click="goToPreviousPage" type="button" class="btn btn-outline-warning"  >
                                                                                الرجوع
                                                                            </button>
                                                                        @endif
                                                                        @if ($currentPage === count($pages))
                                                                      
                                                                     
                                                                            <button type="submit"   class='btn btn-outline-dark'   >
                                                                                حفظ
                                                                            </button>
                                                                        @else
                                                                            <button wire:click="goToNextPage" type="button" class="btn btn-outline-success" >
                                                                                التالي
                                                                            </button>
                                                                    
                                                                    </div>
                                                                @endif
                        </form>
                   
                    </div>
    
                </div>
    
    
            </div>
    
        </div>
    
    </div>    
</div>
