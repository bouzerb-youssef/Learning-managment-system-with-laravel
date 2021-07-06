@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#">Teachers </a></li>
                    <li>All Teachers</li>
                </ul>
            </nav>
        </div>

        @if(session()->has('message'))
        <div class="container">
            <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
                <p> {{ session()->get('message') }}</p> 
            </div> 
        </div>
            
        @endif
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

        <div class="d-flex justify-content-between mb-3">
            <h3>Teachers: {{$teachers->count()}} </h3>
    
            <div>
                <a href="{{route('admin.addteacher')}}" class="btn btn-outline-dark">
                    <i class="uil-plus"> </i> Add New Teacher
                </a>
            </div>
        </div>
        <div class="card">
            <!-- Card header -->
            <div class="card-header actions-toolbar border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="d-inline-block mb-0">Teachers</h4>
                    <div class="d-flex">
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead>
                        <tr>
                           
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender </th>
                           
                        {{--   <th scope="col">Formation</th> --}}
                            <th scope="col"> Group</th>
                            <th scope="col"> Centre</th>
                           
                            <th scope="col"> Operations</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                    @if(isset($teachers ) && $teachers->count()>0 )
                    @foreach ($teachers as $teacher)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div>
                                        <div class="avatar-parent-child" style="width: max-content">
                                          
                                            @if (!$teacher->photo==null)
                                            <img src="{{$teacher->imagePath}}" alt="" class="avatar ">
                                            @else
                                            <img alt="Image placeholder" src="../assets/images/avatars/avatar-2.jpg" class="avatar ">
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="media-body mr-4">
                                        <a href="{{route("admin.showteacher",$teacher->id)}}"  style='padding-left: 10px;' class="name h6 mb-0 text-sm">{{$teacher->name}}</a>
                                      
                                    </div>
                                </div>
                            </th>
                            <td>{{$teacher->phone}}</td>
                            <td> {{$teacher->sex}} </td>
                         {{--    @if(isset($teacher->formation ) && $teacher->formation->count()>0 ) 
                            <td>{{$teacher->formation->title}} </td>  
                            @else
                            <td> No Formation detected</td>  
                            @endif --}}
                            @if(isset($teacher->group ) && $teacher->group->count()>0 ) 
                            <td>{{$teacher->group->title}} </td>  
                            @else
                            <td> No Group detected</td>  
                            @endif 
                           
                           
                            @if(isset($teacher->center ) && $teacher->center->count()>0 ) 
                            <td>{{$teacher->center->centre}} </td>  
                            @else
                            <td> No centre detected</td>  
                            @endif 
                        
                            <td class="text-right">
                                <!-- Actions -->
                                        <a href=" {{route("admin.teacher.remove",$teacher->id)}} " class="btn  delete-confirm btn-icon btn-hover btn-lg btn-circle " class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip=" حذف" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.editteacher",$teacher->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل " title="" aria-expanded="false">
                                            <i class="uil-pen "></i> 
                                        </a>    
                                       {{--  <a href="{{route('admin.teacherAttachments',$teacher->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="اضافة الوثائق" title="" aria-expanded="false">
                                                <i class="icon-material-outline-attach-file"></i> 
                                        </a>  --}} 
                            </td>
                        </tr>
                        @endforeach
                        @endif 
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                    $('.delete-confirm').on('click', function (event) {
                        event.preventDefault();
                        const url = $(this).attr('href');
                        swal({
                            title: 'هل انت متأكد؟',
                            text: 'هذا الشئ سيمحي من قاعدة البيانات نهائيا.',
                          //  icon: 'warning',
                            buttons: ["تراجع", "نعم"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>       
@endsection