@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Teachers </a></li>
                    <li> Add Teacher</li>
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
                        <h5 class="mb-0">Inscription teacher</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.teacher.store")}}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">        
                                    <div class="uk-first-column">
                                        <h5 class="uk-text-bold mb-2">Name</h5>
                                        <input type="text" class="uk-input" name="name" placeholder="name">
                                    </div> 
                                    <div class="uk-first-column">
                                        <h5 class="uk-text-bold mb-2">Select photo</h5>
                                        <div class="uk-margin"> 
                                            <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                                <input type="file" name='photo'>
                                                <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Photo" disabled="">
                                            </div>
                                        </div> 
                                    </div>
                                  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Gender </h5>
                                    <select  name="sex"  class="uk-select">
                                        <option value="femele"
                                         >femele</option>
                                        <option value="Male"
                                        >Male</option>
                                    </select>
                                </div>
                              
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2">Phone </h5>
                                    <input type="text" class="uk-input"  name="phone" placeholder="Phone">
                                </div>
                             
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Select Group </h5>
                                    <select name="group_id" class="uk-select">
                                        @if (isset($groups) && $groups->count()>0)
                                        @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}} </option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Select Centre </h5>
                                    <select name="center_id" class="uk-select">
                                        @if (isset($centres) && $centres->count()>0)
                                        @foreach ($centres as $centre)
                                        <option value="{{$centre->id}}">{{$centre->id}}::{{$centre->centre}} </option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                        </div>
                        <div class="uk-child-width-2-6@s uk-grid-small p-4 uk-grid" uk-grid="">
                            <div class="uk-grid-margin uk-first-column">
                                <h5 class="uk-text-bold mb-2"> Address</h5>
                                <textarea  name="address" placeholder="Address" {{-- class="mytextarea"  --}} class="form-control"></textarea>
                            </div>
                            <div class="uk-grid-margin uk-first-column">
                                <h5 class="uk-text-bold mb-2"> Nots</h5>
                                <textarea  name="nots" {{-- class="mytextarea" --}}  placeholder="Nots"   class="form-control"></textarea>
                            </div>
                          
                        </div>
                        
                            <div class="uk-child-width-2-6@s uk-grid-small p-4 uk-grid" uk-grid="">
                                <button type="submit" class="btn btn-outline-dark">Save</button>
                    
                            </div>
                     
                        
                     </form>
               
                </div>

            </div>


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