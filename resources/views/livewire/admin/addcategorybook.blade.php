<div>
          
    @foreach ($categorybooks as $category)
        <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">

            <!-- course Curriculum-->
            <li class="uk-active">

                <ul class="course-curriculum uk-accordion" uk-accordion="multiple: true">

                    <li class="uk-open">
                        <a class="uk-accordion-title" href="#"> {{$category->title}} </a>
                       <div class="container"> <div class="actions ml-3">
                    
                    
                            <a href="#" class="btn btn-icon btn-hover btn-lg btn-circle" wire:click='remove({{$category->id}})' uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                <i class="uil-trash-alt text-danger" uk-close></i> 
                            </a>  
                        </div>
                    </div>   
                    </li>
                </ul>

                </li>

        

               

            </li>

        </ul>
        @endforeach
       <br><br>
        <h3>أضافة تصنيف ::</h3> 
        <br><br>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card" x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false {{-- , $wire.fileCompleted() --}}"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
            
            
                            <div class="card-body">
                                <div class="progress my-4"  x-show="isUploading">
                                    <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
                                </div>
                                <form  wire:submit.prevent='addcategorybook' >
                                    <div class="row justify-content-center">
                                            <div class="col-xl-9">
                                                <input type="text"  wire:model='title' class="uk-input" >
                                                <input type="file" wire:model="thumbnail">
                    
                                                <div class="uk-grid-margin uk-first-column">
                                                    <input type="submit" value="حفظ" class="btn btn-default">
                                                </div>
                                
                                            </div>
                                        </div>
                                </form>
                                @error('duration')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
            
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
            @error('thumbnail')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

           


</div>