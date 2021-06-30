@extends('admin.layouts.app')

@section('content')
<br><br>



<div class="page-content">
    <div class="page-content-inner pt-lg-0  pl-lg-0">



        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#">التلاميذ </a></li>
                    <li>لائحة التلاميذ</li>
                </ul>
            </nav>
        </div>



        <div class="d-flex justify-content-between mb-3">
            <h3>عدد التلاميذ: {{$students->count()}} </h3>
    
            <div>
                <a href="{{route('admin.addstudent')}}" class="btn btn-outline-dark">
                    <i class="uil-plus"> </i> اضافة تلميذ جديد
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
                    <h4 class="d-inline-block mb-0">التلاميذ</h4>
                    <div class="d-flex">
                       
                        <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="Search product" title="" aria-expanded="false">
                            <i class="uil-search"></i>
                        </a>
                        <div class="uk-drop" uk-drop="mode: click; pos: right-center; offset: 0">
                            <form class="uk-search uk-search-navbar uk-width-1-1" action='{{route("search.student")}}'>
                                <input class="uk-search-input shadow-0 uk-form-small"  name='searchstudent' type="search" placeholder="البحث..." autofocus="">
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
                            <th scope="col">الاسم</th>
                            <th scope="col">الهاتف</th>
                            <th scope="col">الجنس </th>
                            <th scope="col">رقم البطاقة </th>
                            <th scope="col">الدورة</th>
                            <th scope="col"> المجموعة</th>
                            <th scope="col"> العمليات</th>
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
                                            <img src="{{$student->imagePath}}" alt="" class="avatar  rounded-circle">
                                            @else
                                            <img alt="Image placeholder" src="../assets/images/avatars/avatar-2.jpg" class="avatar  rounded-circle">
                                            @endif
                                            <span class="avatar-child avatar-badge bg-success"></span>
                                        </div>
                                    </div>
                                    <div class="media-body mr-4">
                                        <a href="{{route("admin.showstudent",$student->id)}}" class="name h6 mb-0 text-sm">{{$student->name}}</a>
                                      
                                    </div>
                                </div>
                            </th>
                            <td>{{$student->phone}}</td>
                            <td> {{$student->sex}} </td>
                            <td> {{$student->cin}} </td>
                            <td>{{$student->group->title}}</td>
                            @if(isset($student->group ) && $student->group->count()>0 ) 
                            <td>{{$student->group->formation->title}} </td>  
                            @else
                            <td>لا يوجد </td>  
                            @endif 
                        
                            <td class="text-right">
                                <!-- Actions -->
                                        <a href=" {{route("admin.student.remove",$student->id)}} " class="btn btn-icon btn-hover btn-lg btn-circle delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح التلميد" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.editstudent",$student->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل المعلومات" title="" aria-expanded="false">
                                            <i class="uil-pen "></i> 
                                        </a>    
                                        <a href="{{route('admin.studentAttachments',$student->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="اضافة الوثائق" title="" aria-expanded="false">
                                                <i class="icon-material-outline-attach-file"></i> 
                                        </a> 
                                        <a href="{{route('admin.stage.add',$student->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="عمل أو تدريب" title="" aria-expanded="false">
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
                            icon: 'warning',
                            buttons: ["تراجع", "نعم"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>       
@endsection