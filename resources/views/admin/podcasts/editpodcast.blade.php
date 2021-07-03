@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> podcasts </a></li>
                    <li>Edit podcast</li>
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
                        <h5 class="mb-0"> Edit podcast</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.podcast.update",$podcast->id)}}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                        <div class="uk-first-column">
                                            <h5 class="uk-text-bold mb-2">Name</h5>
                                            <input type="text" class="uk-input"  value='{{$podcast->name}}' name="name" placeholder="name">
                                        </div>
                                        <div class="uk-grid-margin uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> Select Cource </h5>
                                            <select name="cource_id" class="uk-select">
                                                @if (isset($cources) && $cources->count()>0)
                                                @foreach ($cources as $cource)
                                                <option  value="{{$cource->id}}" >{{$cource->title}}</option>
        
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-grid-margin uk-first-column">
                                            <h5 class="uk-text-bold mb-2">podcast </h5>
                                            <div class="uk-margin"> 
                                                <div uk-form-custom> 
                                                    <input type="file" name="podcast"> 
                                                    <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> Select podcast </button> 
                                                </div> 
                                            </div> 
                                        </div>
                            
                                      
                                  
                                      
                                    </div>
                                                   
                                                      
                          <div class="uk-flex-right .uk-child-width-1-5 p-2">
                            
                            <button  type="submit" class="btn btn-outline-dark">Save</button>
                        </div>
                       
                        
                     </form>
               
                </div>

            </div>


        </div>

    </div>

</div>    

    
@endsection