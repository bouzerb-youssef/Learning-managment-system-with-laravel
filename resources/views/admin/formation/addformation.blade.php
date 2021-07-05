@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Formations </a></li>
                    <li>Add New Formation</li>
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
                        <h5 class="mb-0"> Add Formation</h5>
                    </div>
                    <hr class="m-0">
                    <form action="{{route("admin.formation.store")}}"   method="POST">
                        {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" >
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> Name</h5>
                                    <input type="text" class="uk-input"name="title" placeholder="Name ">
                                </div>
                        
                             
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> Begun Date* </h5>
                                    <input type="date" name="datebegun" id="birthDate" class="form-control">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> End Date* </h5>
                                    <input type="date" name="dateend" id="birthDate" class="form-control">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Select Group </h5>
                                    <select name="year_id" class="uk-select">
                                        @if (isset($years) && $years->count()>0)
                                        @foreach ($years as $year)
                                        <option value="{{$year->id}}">{{$year->year}} </option>
                
                                        @endforeach
                                        @endif
                                    </select>
                                </div>  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Description </h5>
                                    <textarea  name="description"   class="form-control"></textarea>
                                </div>

                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                   
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                   
                                </div>
                                <div class="d-flex justify-content-between ">
        
                                    <h3>  </h3>
                            
                                    <div >
                                        <button  type="submit" class="btn btn-outline-dark">Save </button>
                                    </div>  
                                </div>
                            </div>
                        </form>
                    </div>
                  
                
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