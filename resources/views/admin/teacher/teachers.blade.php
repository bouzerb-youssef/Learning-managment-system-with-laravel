@extends('admin.layouts.app')

@section('content')
<br><br>

@if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#">الأساثذة </a></li>
                    <li>لائحة الأساثذة</li>
                </ul>
            </nav>
        </div>



        <div class="d-flex justify-content-between mb-3">
            <h3>عدد الأساثذة: {{$teachers->count()}} </h3>
    
            <div>
                <a href="{{route('admin.addteacher')}}" class="btn btn-default">
                    <i class="uil-plus"> </i> اضافة استاذ جديد
                </a>
            </div>
        </div>
        <div class="card">
            <!-- Card header -->
            <div class="card-header actions-toolbar border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="d-inline-block mb-0">الأساثذة</h4>
                    <div class="d-flex">
                       
                        <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="Search product" title="" aria-expanded="false">
                            <i class="uil-search"></i>
                        </a>
                        <div class="uk-drop" uk-drop="mode: click; pos: right-center; offset: 0">
                            <form class="uk-search uk-search-navbar uk-width-1-1" {{-- action='{{route("search.teacher")}}' --}}>
                                <input class="uk-search-input shadow-0 uk-form-small"  name='searchteacher' type="search" placeholder="البحث..." autofocus="">
                            </form>
                        </div>

                        <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="filter" title="" aria-expanded="false">
                            <i class="uil-filter"></i>
                        </a>
                        <div uk-dropdown="pos: bottom-right ; mode: click ;animation: uk-animation-scale-up" class="uk-dropdown">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#"> Newest </a></li>
                                <li><a href="#">From A-Z</a></li>
                                <li><a href="#">From Z-A</a></li>
                            </ul>
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
                    @if(isset($teachers ) && $teachers->count()>0 )
                    @foreach ($teachers as $teacher)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div>
                                        <div class="avatar-parent-child" style="width: max-content">
                                          
                                            @if (!$teacher->photo==null)
                                            <img src="{{$teacher->imagePath}}" alt="" class="avatar  rounded-circle">
                                            @else
                                            <img alt="Image placeholder" src="../assets/images/avatars/avatar-2.jpg" class="avatar  rounded-circle">
                                            @endif
                                            <span class="avatar-child avatar-badge bg-success"></span>
                                        </div>
                                    </div>
                                    <div class="media-body mr-4">
                                        <a href="{{route("admin.showteacher",$teacher->id)}}" class="name h6 mb-0 text-sm">{{$teacher->name}}</a>
                                      
                                    </div>
                                </div>
                            </th>
                            <td>{{$teacher->phone}}</td>
                            <td> {{$teacher->sex}} </td>
                            <td> {{$teacher->cin}} </td>
                            <td>{{$teacher->group->title}}</td>
                            @if(isset($teacher->group ) && $teacher->group->count()>0 ) 
                            <td>{{$teacher->group->formation->title}} </td>  
                            @else
                            <td>لا يوجد </td>  
                            @endif 
                        
                            <td class="text-right">
                                <!-- Actions -->
                                        <a href=" {{route("admin.teacher.remove",$teacher->id)}} " class="btn btn-icon btn-hover btn-lg btn-circle delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح التلميد" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.editteacher",$teacher->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل المعلومات" title="" aria-expanded="false">
                                            <i class="uil-pen "></i> 
                                        </a>    
                                        <a href="{{route('admin.teacherAttachments',$teacher->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="اضافة الوثائق" title="" aria-expanded="false">
                                                <i class="icon-material-outline-attach-file"></i> 
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