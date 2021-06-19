<div>
    @if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif
        @foreach ($categories as $category)
        <div class="sec-list-item">
            <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
              {{--   <label class="mb-0 mx-2">
                    <input class="uk-checkbox" type="checkbox"> 
   {{-- {{--              </label> --}}
                <p> {{$category->title}} </p>
            </div>
            <div>
                <div class="btn-act"> <a href="#">
                    <a  wire:click='remove({{$category->id}})' class="btn btn-icon btn-hover btn-lg btn-circle"  class="button delete-confirm"   wire:click='remove({{$category->id}})' uk-tooltip="مسح الفصل" title="" aria-expanded="false">
                        <i class="uil-trash-alt text-danger" ></i> 
                    </a>

                    <a href="{{route("admin.editcategory",$category->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة الدروس" title="" aria-expanded="false">
                        <i class="uil-pen "></i> 
                    </a>  

                </div> 
            </div>
        </div>
        @endforeach
        <br><br> --}} --}}
     {{--   <h3>اضافة صنف:<h3>
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
         --}}
     

            @push('scripts')
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                    $('.delete-confirm').on('click', function (event) {
                        event.preventDefault();
                        const url = $(this).attr('href');
                        swal({
                            title: 'هل انت متأكد؟',
                            text: 'هذا الشئ سيمحي من قاعدة البيانات نهائيا.',
                            icon: 'warning',
                            buttons: ["تراجع", "نعم"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>
        @endpush       

           


</div>
 