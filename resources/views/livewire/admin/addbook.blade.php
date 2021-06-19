<div>

        @foreach ($books as $book)
        <div class="sec-list-item">
            <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
              {{--   <label class="mb-0 mx-2">
                    <input class="uk-checkbox" type="checkbox"> 
                </label> --}}
                <p> {{$book->title}} </p>
            </div>
            <div>
                <div class="btn-act"> <a href="#">
                    <a href="#" class="btn btn-icon btn-hover btn-lg btn-circle" wire:click='remove({{$book->id}})' uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                        <i class="uil-trash-alt text-danger" uk-close></i> 
                    </a>  
                </div> 
            </div>
        </div>
        @endforeach
     
       <br><br>
        <h3>أضافة تصنيف ::</h3> 
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
                                <form  wire:submit.prevent='addbook' >
                                    <div class="row justify-content-center">
                                            <div class="col-xl-9">
                                                <select wire:model="categorybook_id" name="categorybook_id" class="selectpicker" 
                                                tabindex="-98"> 
                                                {{-- <option data-icon="uil-android-alt" selected> اختر صنف </option> --}} --}}

                                                        @foreach ($categorybooks as $categorybook)
                                                        <option  value="{{$categorybook->id}}" >{{$categorybook->title}}</option>
                                                @endforeach
                                            </select>
                                                <input type="text"  wire:model='title' class="uk-input" >

                                                <textarea  name="description" wire:model="description"   id="short_description" class="form-control"></textarea>

                                            
                                                <br>
                                                <input type="file" wire:model="thumbnail">
                    
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


</div>
