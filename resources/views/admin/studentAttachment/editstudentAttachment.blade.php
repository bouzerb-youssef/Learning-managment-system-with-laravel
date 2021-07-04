@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Student Attachments </a></li>
                    <li>Edit Student attachment</li>
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
                        <h5 class="mb-0">Edd Student attachment</h5>
                    </div>
                    <hr class="m-0">

                    <form action="{{route("admin.studentAttachment.update",$studentAttachment->id)}}" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                        
                            <div class="uk-first-column">
                                <h5 class="uk-text-bold mb-2"> Genre</h5>
                                <input type="text" class="uk-input"  value='{{$studentAttachment->genre}}' name="genre" placeholder="الاسم">
                                <input type="hidden" class="uk-input"  name="user_id" >
                            </div>
                          
                            <div class="uk-grid-margin uk-first-column">
                                <h5 class="uk-text-bold mb-2">Attachment </h5>
                                <div class="uk-margin"> 
                                    <div uk-form-custom> 
                                        <input type="file" name="file"> 
                                        <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> Select Attachment</button> 
                                    </div> 
                                </div> 
                            </div>
                            <div class="uk-grid-margin uk-first-column">
                                <h5 class="uk-text-bold mb-2"> Select student </h5>
                                <select name="user_id" class="uk-select">
                                    @if (isset($students) && $students->count()>0)
                                    @foreach ($students as $student)
                                    <option  value="{{$student->id}}" >{{$student->name}}</option>
    
                                    @endforeach
                                    @endif
                                </select>
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
