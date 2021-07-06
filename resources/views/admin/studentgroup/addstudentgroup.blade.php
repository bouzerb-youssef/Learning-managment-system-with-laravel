@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Groups </a></li>
                    <li>Add New group</li>
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
                        <h5 class="mb-0"> Add Group</h5>
                    </div>
                    <hr class="m-0">
                    <form action="{{route("admin.studentgroup.store")}}"  method="POST">
                        {{ csrf_field() }}
                                <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                        <div class="uk-grid-margin">
                                            <h5 class="uk-text-bold mb-2"> Title</h5>
                                            <input type="text" class="uk-input" name="title" placeholder="title ">
                                        </div>
                                        <div class="uk-grid-margin uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> Select Centre </h5>
                                            <select name="centre_id" class="uk-select">
                                                @if (isset($centres) && $centres->count()>0)
                                                @foreach ($centres as $centre)
                                                <option value="{{$centre->id}}">{{$centre->centre}} :: {{$centre->id}} </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>  
                                        <div class="uk-grid-margin uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> Select Formation</h5>
                                            <select name="formation_id" class="uk-select">
                                                @if (isset($formations) && $formations->count()>0)
                                                @foreach ($formations as $formation)
                                                <option value="{{$formation->id}}">{{$formation->title}} </option>
                        
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>  
                                        <div  class='container' class="uk-grid-margin uk-first-column" >
                                            <h5 class="uk-text-bold mb-2"> </h5>
                                           
                                             </div>
                                </div>
                                        <div  class='container' class="uk-grid-margin uk-first-column" >
                                            <h5 class="uk-text-bold mb-2"> Description </h5>
                                            <textarea  name="description" class="mytextarea"  placeholder="Description"   class="form-control"></textarea>
                                             </div> 
                                           <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                            <div  class='container' class="uk-grid-margin uk-first-column" >
                                                <h5 class="uk-text-bold mb-2"> </h5>
                                               
                                                 </div>
                                         </div>
                                         <div class="uk-child-width-2-6@s uk-grid-small p-4 uk-grid" uk-grid="" >
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
  language: 'en'
});
</script>

@endsection