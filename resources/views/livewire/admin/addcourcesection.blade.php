<div>
   
        <div class="row">
            <div class="col-xl-10 m-auto">
                <ul class="c-curriculum uk-accordion" uk-accordion="">
                    @foreach ($cource->sections as $section)
                    <li @if ($loop->first) class="uk-open" @endif>
                        <a class="uk-accordion-title" href="#"> <i class="uil-folder">
                            </i>{{$section->section}}</a>
                        <div  class="action-btn">
                            <a href="#" class="btn btn-icon btn-hover btn-lg btn-circle" wire:click='remove({{$section->id}})' uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                                <i class="uil-trash-alt text-danger" ></i> 
                            </a>
                            <a href="{{route('admin.addlesson',$section->id)}}" class="btn btn-icon btn-hover btn-sl btn-circle" uk-tooltip="اضافة درس والادوات والاسئلة" title="" aria-expanded="false">
                                <i class="uil-pen "></i> 
                            </a>
                            <a href="{{route('admin.editsection',$section->id)}}" class="btn btn-icon btn-hover btn-sl btn-circle" uk-tooltip="تعديل الفصل" title="" aria-expanded="false">
                                <i class="uil-pen "></i> 
                            </a>
                        </div>
                        <div class="uk-accordion-content" aria-hidden="true" hidden="">
                            <ul class="sec-list uk-sortable" uk-sortable="handle: .uk-sortable-handle">
                                @foreach ($section->lessons as $lesson)
                                <li>
                                    <div class=" sec-list-item">
                                        <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                          {{--   <label class="mb-0 mx-2">
                                                <input class="uk-checkbox" type="checkbox"> 
                                            </label> --}}
                                            <p> {{$lesson->title}}  </p>
                                        </div>
                                        <div>
                                            <div class="btn-act"> <a href="#">
                                                <p uk-margin> 
                                                    <a class="uk-button uk-button-default" href="#modal-media-video" uk-toggle>Video</a> 
                                                </p> 
                                                <div id="modal-media-video" class="uk-flex-top" uk-modal> 
                                                    <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical"> 
                                                        <button class="uk-modal-close-outside" type="button" uk-close></button> 
                                                        <video controls playsinline uk-video> <source src="{{$lesson->videoPath}}" type="video/mp4"> 
                                                            <source src="{{$lesson->videoPath}}" type="video/ogg"> 
                                                        </video> 
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            
                                
                                 
                            </ul>
                        </div>
                    </li> 
                
                    @endforeach  
                </ul>


           
       


        <br>
        <h4>اضافة فصل جديد</h4>

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
                            <form  wire:submit.prevent='addcourcesection' >
                                <div class="row justify-content-center">
                                        <div class="col-xl-9">
                                            <input type="text"  wire:model.lazy='section' class="uk-input" >
                                            <textarea  wire:model.lazy='description' id="description" class="form-control"></textarea>
                                            <input type="submit" value="submit" class="btn btn-default">
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
        
        
     

   
               


               


  
</div>
