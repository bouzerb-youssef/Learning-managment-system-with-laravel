@extends('admin.layouts.app')

@section('content')
<br><br>
<br><br><br>
@if(session()->has('message'))
<div class="container">
    <div class="uk-alert-success" uk-alert> <a class="uk-alert-close" uk-close></a> 
        <p> {{ session()->get('message') }}</p> 
    </div> 
</div>
    
@endif
<div class="page-content-inner">

    <div class="d-flex">
        <nav id="breadcrumbs" class="mb-3">
            <ul>
                <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                <li><a href="#"> الوثائق </a></li>
                <li>لائحة الوثائق</li>
            </ul>
        </nav>
    </div>


    <div class="d-flex justify-content-between mb-3">
        <h3>عدد الوثائق: {{$student->studentAttachments->count()}} </h3>

        <div>
            <a href="{{route('admin.addstudentAttachment',$student->id)}}" class="btn btn-default">
                <i class="uil-plus"> </i> اضافة وثيقة جديدة
            </a>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0">الوثائق</h4>
               
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        
                        <th scope="col">##</th>
                        <th scope="col"> الاسم </th>
                         <th scope="col"> الملف </th>
                        <th scope="col">  العمليات</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i=1
                    @endphp
                    @if(isset($student->studentAttachments ) && $student->studentAttachments->count()>0 )
                        @foreach ($student->studentAttachments as $studentAttachment)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a href=''>{{$studentAttachment->genre}}</a></td>
                            <td>{{$studentAttachment->file}}</td>
                            <td class="text-right">
                                <!-- Actions -->
                                        <a href=" {{route("admin.studentAttachment.remove",$studentAttachment->id)}} " class="btn btn-icon btn-hover btn-lg btn-circle delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح السؤال" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.editstudentAttachment",$studentAttachment->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل السؤال" title="" aria-expanded="false">
                                            <i class="uil-pen "></i> 
                                        </a>     
                            </td>
                        </tr>  
                        @endforeach
                    @endif 
                </tbody>
            </table>
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