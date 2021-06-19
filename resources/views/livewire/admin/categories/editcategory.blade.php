<div>
    @foreach ($categories as $category)
    <div class="sec-list-item">
        <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
          {{--   <label class="mb-0 mx-2">
                <input class="uk-checkbox" type="checkbox"> 
            </label> --}}
            <p> {{$category->title}} </p>
        </div>
        <div>
            <div class="btn-act"> <a href="#">
                <a href="#" class="btn btn-icon btn-hover btn-lg btn-circle" wire:click='remove({{$category->id}})' uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                    <i class="uil-trash-alt text-danger" ></i> 
                </a>

                {{-- <a href="" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة الدروس" title="" aria-expanded="false">
                    <i class="uil-pen "></i> 
                </a>   --}}
            </div> 
        </div>
    </div>
    @endforeach
    <br><br>
   <h1>اضافة صنف<h1>
    <br><br>
        <form  wire:submit.prevent='addcategory' >
            <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <input type="text"  wire:model='title' class="uk-input" >
                        <div class="uk-grid-margin uk-first-column">
                            <input type="submit" value="submit" class="btn btn-default">
                        </div>
        
                    </div>
                </div>
        </form>
    
 


           

       


</div>

