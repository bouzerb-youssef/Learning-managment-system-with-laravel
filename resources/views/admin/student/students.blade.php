@extends('admin.layouts.app')

@section('content')




<div class="page-content">
    <div class="page-content-inner pt-lg-0  pl-lg-0">



        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#">Students </a></li>
                    <li>All Students</li>
                </ul>
            </nav>
        </div>



        <div class="d-flex justify-content-between mb-3">
            <h5>Studunts Number: {{$students->count()}} </h5>
    
            <div>
                <a href="{{route('admin.addstudent')}}" class="btn btn-outline-dark">
                    <i class="uil-plus"> </i>Add New Student
                </a>
            </div>
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
        <div class="card">
            <!-- Card header -->
            <div class="card-header actions-toolbar border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="d-inline-block mb-0">Students</h4>
                    <div class="d-flex">
                       
                        <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="Search product" title="" aria-expanded="false">
                            <i class="uil-search"></i>
                        </a>
                        <div class="uk-drop" uk-drop="mode: click; pos: right-center; offset: 0">
                            <form class="uk-search uk-search-navbar uk-width-1-1" action='{{route("search.student")}}'>
                                <input class="uk-search-input shadow-0 uk-form-small"  name='searchstudent' type="search" placeholder="??????????..." autofocus="">
                            </form>
                        </div>



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
                            <th scope="col">Sex </th>
                            <th scope="col">CIN </th>
                            <th scope="col">Formation</th>
                            <th scope="col"> Group</th>
                            <br>
                            <th scope="col" style='padding-left: 100px;'> Oparations</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                    @if(isset($students ) && $students->count()>0 )
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div>
                                        <div class="avatar-parent-child" style="width: max-content">
                                          
                                            @if (!$student->photo==null)
                                            <img src="{{$student->imagePath}}" alt="" class="avatar  ">
                                            @else
                                            <img alt="Image placeholder" src="../assets/images/avatars/avatar-2.jpg" class="avatar  ">
                                            @endif
{{--                                             <span class="avatar-child avatar-badge bg-success"></span>
 --}}                                        </div>
                                    </div>
                                    <div class="media-body mr-4" style='padding-left: 35px'>
                                        <a href="{{route("admin.showstudent",$student->id)}}" class="name h6 mb-0 text-sm">{{$student->name}}</a>
                                      
                                    </div>
                                </div>
                            </th>
                            <td>{{$student->phone}}</td>
                            <td>
                                 @if ($student->sex == 0)
                                     Female
                                 @else
                                     male
                                 @endif 
                            </td>
                            <td> {{$student->cin}} </td>
                            <td>{{$student->group->title}}</td>
                            @if(isset($student->group ) && $student->group->count()>0 ) 
                            <td>{{$student->group->title}} </td>  
                            @else
                            <td>???? ???????? </td>  
                            @endif 
                        
                            <td class="text-right">
                                <!-- Actions -->
                                        <a href=" {{route("admin.student.remove",$student->id)}} " class="btn btn-icon btn-hover btn-lg btn-circle delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="?????? ??????????????" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                                        <a href=" {{route("admin.editstudent",$student->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="?????????? ??????????????????" title="" aria-expanded="false">
                                            <i class="uil-pen "></i> 
                                        </a>    
                                        <a href="{{route('admin.studentattachment',$student->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="?????????? ??????????????" title="" aria-expanded="false">
                                                <i class="icon-material-outline-attach-file"></i> 
                                        </a> 
                                        <a href="{{route('admin.stage.add',$student->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="?????? ???? ??????????" title="" aria-expanded="false">
                                            <i class=" icon-line-awesome-inbox"></i> 
                                        </a> 
                                       
                            </td>
                        </tr>
                        @endforeach
                        @endif 
                    
                    </tbody>
                </table>
            </div>
         
             
        </div>
   <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
                {{ $students->links() }}
             </ul>


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
                            title: '???? ?????? ????????????',
                            text: '?????? ???????? ?????????? ???? ?????????? ???????????????? ????????????.',
                            icon: 'warning',
                            buttons: ["??????????", "??????"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>       
@endsection