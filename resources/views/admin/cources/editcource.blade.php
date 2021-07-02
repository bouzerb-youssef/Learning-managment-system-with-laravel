@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Setting </a></li>
                    <li>Account Setting</li>
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
                        <h5 class="mb-0"> اضافة كورس</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.updatecource",$cource->id)}}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}

                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                        <div class="uk-first-column">
                                          <h5 class="uk-text-bold mb-2">Name</h5>
                                          <input type="text" class="uk-input" name="title" value='{{$cource->title}}' placeholder="Name">
                                      </div>
                                      <div class="uk-grid-margin uk-first-column">
                                          <h5 class="uk-text-bold mb-2"> Select Category </h5>
                                          <select name="category_id" class="uk-select">
                                              @if (isset($categories) && $categories->count()>0)
                                              @foreach ($categories as $category)
                                              <option  value="{{$category->id}}" >{{$category->title}}</option>
      
                                              @endforeach
                                              @endif
                                          </select>
                                      </div>
                                      <div class="uk-grid-margin uk-first-column"   >
                                        <h5 class="uk-text-bold mb-2"> Description </h5>
                                        <textarea  name="description" class="mytextarea"  placeholder="short description"   value='{{$cource->description}}' class="form-control"></textarea>
                                    </div>
                                    
                               
                                
                               
                                   
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2">Image </h5>
                                          <div class="uk-margin"> 
                                         <div class="uk-margin" uk-margin> <div uk-form-custom="target: true"> <input type="file" name='thumbnail'> <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled> </div>  </div> 
                                    </div> 
                                    
                               
      
                                  
                                 
                                    <div class="uk-flex uk-flex-right p-4">
                                
                                      <button  type="submit" class="btn btn-default">Submit</button>
                                  </div>
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