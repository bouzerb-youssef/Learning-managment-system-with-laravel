@extends('admin.layouts.app')
@section('styles')
<style type="text/css">
    #loader {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      background: rgba(0,0,0,0.75) url(images/loading2.gif) no-repeat center center;
      z-index: 10000;
    }
    </style>
@endsection
@section('content')
<br><br>
{{--  @livewire('admin.lesson.addlesson', ['cources' => $cources])    --}}    

<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Videos </a></li>
                    <li>Add Video</li>
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
<br>
        <div uk-grid="" class="uk-grid">
  

            <div class="uk-width-2-4@m">

                <div class="card rounded">
                    <div class="p-3">
                        <h5 class="mb-0">Add Video</h5>
                    </div>
                   
                    <div class="">
                                            <form  action="{{route("admin.lesson.store")}}" method="POST" enctype="multipart/form-data"  >
                                                            {{ csrf_field() }}
                                                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                                        <div class="uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">Name</h5>
                                                            <input type="text" class="uk-input" name='name' placeholder="Name">
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
                                              
                                                    </div>
                                                 
                                                    <div  class='container' class="uk-grid-margin uk-first-column" >
                                                        <div class="uk-grid-margin uk-first-column">
                                                            <h5 class="uk-text-bold mb-2">Video </h5>
                                                            <div class="uk-margin"> 
                                                                <div uk-form-custom> 
                                                                    <input type="file" name="video" id="file1" onchange="uploadFile()"> 
                                                                    <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> Select Video </button> 
                                                                </div> 
                                                            </div> 
                                                        </div>   
                                                    </div>                            
                                                <div class="uk-flex-right .uk-child-width-1-5 p-2">
                                                    
                                                        <button  type="submit" class="btn btn-outline-dark">Save</button>
                                                        <br><br>
                                                     
                                                           <progress id="progressBar"  value="0" max="100" ></progress>
                                                          
                                                       <div class="progress">
                                                           <h3 id="status"></h3>
                                                           <p id="loaded_n_total"></p>
                                                       </div>
                                                    <br><br>
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
{{-- <div id="loader"></div>
 --}}@endsection
@section('scripts')
    <script>
function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}
    </script> 
@endsection

