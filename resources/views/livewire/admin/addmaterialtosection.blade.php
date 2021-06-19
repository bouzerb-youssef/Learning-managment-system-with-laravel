<div>
  

        <div class="row">
            <div class="col-xl-10 m-auto">
                <ul class="c-curriculum uk-accordion" uk-accordion="">
                    @foreach ($section->materials as $material)
                    <li @if ($loop->first) class="uk-open" @endif>
                        <a class="uk-accordion-title" href="#"> <i class="uil-folder">
                            </i>{{$material->title}}</a>
                        
                        <div class="uk-accordion-content" aria-hidden="true" hidden="">
                            <ul class="sec-list uk-sortable" uk-sortable="handle: .uk-sortable-handle">
                                <li>
                                    <div class=" sec-list-item">
                                        <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                          {{--   <label class="mb-0 mx-2">
                                                <input class="uk-checkbox" type="checkbox"> 
                                            </label> --}}
                                            <p>خاص بالدرس  <a href="{{$material->pdfPath}}"> <br><i class="uil-external-link-alt "></i> </a></p>
                                        </div>
                                        <div class="btn-act"> <a href="#">
                                            <a href="#" class="btn btn-icon btn-hover btn-lg btn-circle" wire:click='remove({{$material->id}})' uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                                <i class="uil-trash-alt text-danger" ></i> 
                                            </a>
                        
                                            {{-- <a href="" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة الدروس" title="" aria-expanded="false">
                                                <i class="uil-pen "></i> 
                                            </a>   --}}
                                        </div> 
                                    </div>
                                </li>
                               
                            
                                
                                 
                            </ul>
                        </div>
                    </li> 
                    @endforeach  
                </ul>


            </div>
        </div>

        <br>
        <h4>اضافة اداة جديد</h4>

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
                            <form  wire:submit.prevent='addmataerialtomaterial'>
                                <div class="row justify-content-center">
                                        <div class="col-xl-9">

                                            <input type="text"  wire:model.lazy='title' class="uk-input" >
                                            <textarea  wire:model.lazy='description' id="description" class="form-control"></textarea>
                                            <input type="file" wire:model="material">
                                            <input type="submit" value="submit" class="btn btn-default">
                                            
                                        </div>
                            
                                        </div>
                                    </div>
                            </form>
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

                            @error('material')
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
