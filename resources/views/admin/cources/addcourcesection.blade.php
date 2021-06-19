@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Course </a></li>
                    <li>Create New Course</li>
                </ul>
            </nav>
        </div>



        <div class="card">
            <div class="card-header border-bottom-0 py-4">
                <h5> Course Manager </h5>
            </div>


            <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active"><a href="#" aria-expanded="true"> الفصول</a></li>
                <li class=""><a href="#" aria-expanded="true"> التفاصيل</a></li>
                <li class=""><a href="#" aria-expanded="true"> اضافة الاسئلة</a></li>
                
            </ul>
      
            <div class="card-body">

                <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                                <li class="uk-active">
                                    @livewire('admin.addcourcesection', ['cource' => $cource])          
                                </li>
                                <li class="">
                                    @livewire('admin.courcedetailes',['cource' => $cource])    
                                </li>  
                                <li class="">
                                    
                                    <div class="container-xl">
                                        <div class="table-responsive">
                                            <div class="table-wrapper">
                                                <div class="table-title">
                                                    <div class="row">
                                                   
                                                        <div class="col-sm-7"> <a class="uk-button uk-button-default" href="#modal-sections" uk-toggle>اضف سؤال</a> </div>
                                                        <br><br>
                                                        <div class="col-sm-4">
                                                          {{--   <div class="search-box">
                                    
                                                                <input type="text" class="form-control" placeholder="Search&hellip;">
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover table-bordered">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>السؤال <i class="fa fa-sort"></i></th>
                                                           
                                                           <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Thomas Hardy</td>
                                                      
                                    
                                                            <td>
                                                                <a href="#" class="text-warning"  data-toggle="tooltip" data-toggle="modal" data-target="#Modal_update">تعديل</a>
                                                                <a href="#" class="text-danger"  data-toggle="tooltip" >مسح</a>
                                                            </td>
                                                        </tr>
                                    
                                                    </tbody>
                                                </table>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    </body>
                                    </html>
                                    
                                    
                                    <!-- Modal-Add -->
                                   
                                    <div id="modal-sections" uk-modal> 
                                        <div class="uk-modal-dialog"> 
                                            <button class="uk-modal-close-default" type="button" uk-close></button> 
                                            <div class="uk-modal-header"> 
                                                <h2 class="uk-modal-title">Modal Title</h2> 
                                            </div> 
                                            <div class="uk-modal-body"> 
                                                <div class="modal-body">
                                                    <form action="{{route("admin.addquestion")}}" method="POST" >
                                                        {{ csrf_field() }}  
                                                    <div class="row">
                                                      <div class="col-md-6">السؤال</div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-6"><input name='question'id="addInputName" class="form-control"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" >A</div>
                                                        <div class="col-md-6">B</div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-6"><input name='opa' id="addInputName" class="form-control"></div>
                                                        <div class="col-md-6"><input name='opb' id="addInputName" class="form-control"></div>
                                                      </div>  
                                                      <div class="row">
                                                        <div class="col-md-6">C</div>
                                                        <div class="col-md-6">D</div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-6"><input name='opc' id="addInputName" class="form-control"></div>
                                                        <div class="col-md-6"><input name='opd' id="addInputName" class="form-control"></div>
                                                      </div> 
                                                      <div class="row">
                                                        <div class="col-md-6">الجواب</div>
                                                        
                                                      </div>
                                                      <div class="row">
                                                        <select name='answer' class="form-select" aria-label="Default select example">
                                                            <option value="opa">A</option>
                                                            <option value="opb">B</option>
                                                            <option value="opc">C</option>
                                                            <option value="opd">D</option>
                                                          </select>
                                                          <input name='cource_id' type='hidden' value="{{$cource->id}}" class="form-control">
                                                      </div> 
                                                   
                                                  </div>
                                            </div> 
                                            <div class="uk-modal-footer uk-text-right"> 
                                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button> 
                                                <button type="submit" class="btn btn-default">حفظ</button>
                                            </div> 
                                        </form>
                                        </div> 
                                    </div>
                                    
                                    <!-- Modal-Update -->
                                    <div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-md-6">Name</div>
                                            
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6"><input id="updateInputName" class="form-control"></div>
                                              <div class="col-md-6"><input id="updateInputMobile" class="form-control"></div>
                                    
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                               
                            </li>  
                </ul>
           
            </div>

        </div>





</div>
    
@endsection