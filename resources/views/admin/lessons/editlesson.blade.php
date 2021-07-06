@extends('admin.layouts.app')

@section('content')
<br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Video </a></li>
                    <li>Edit Video</li>
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
                        <h5 class="mb-0">Edit Video</h5>
                    </div>
                   
                    <div class="">
                     
                     
                        
                        <div id="status"></div>
                        
                                            <form  action="{{route("admin.lesson.update",$lesson->id)}}" method="POST" enctype="multipart/form-data"  >
                                                            {{ csrf_field() }}
                                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                        <div class="uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">Name</h5>
                                                            <input type="text" class="uk-input"  value='{{$lesson->name}}' name='name' placeholder="Name">
                                                        </div>
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2"> Select Cource </h5>
                                                            <select name="cource_id" class="uk-select">
                                                                @if (isset($cources) && $cources->count()>0)
                                                                @foreach ($cources as $cource)
                                                                <option  value="{{$cource->id}}" @if ($cource->cource_id==$cource->id)
                                                                    selected
                                                                @endif >{{$cource->title}}</option>
                        
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">Select Video </h5>
                                                              <div class="uk-margin"> 
                                                             <div class="uk-margin" uk-margin> <div uk-form-custom="target: true"> <input type="file" name='video'> <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled> </div>  
                                                            </div>
                                                        </div>  
                                                        </div> 
                                              
                                                    </div>
                                                 
                                                                         
                                                <div class="uk-flex-right .uk-child-width-1-5 p-2">
                                                    
                                                    <button  type="submit" class="btn btn-outline-dark">Save</button>

                                                    </div>
                                            
                                                
                                            </form>
                                            
                                        @error('duration')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        @error('vedio')
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

</div>    

         
@endsection
