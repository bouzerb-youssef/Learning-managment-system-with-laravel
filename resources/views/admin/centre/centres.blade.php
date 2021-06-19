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
                <li><a href="#"> المعاهد </a></li>
                <li>لائحة المعاهد</li>
            </ul>
        </nav>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h3> عدد المعاهد : {{$centres->count()}} </h3>
        <div>
            <a href="{{route('admin.addcentre')}}" class="btn btn-default" uk-toggle="target: #modal-close-default">
                <i class="uil-plus"> </i> اضافة معهد جديد
            </a>
        </div>
    </div>
    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0">المعاهد</h4>
                <div class="d-flex">
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">##</th>
                        <th scope="col"> المعهد </th>
                   
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i=1
                    @endphp
                    @if(isset($centres ) && $centres->count()>0 )
                        @foreach ($centres as $centre)
                        <tr>
                            <td></td>
                            <td>{{$i++}}</td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body mr-4">
                                        <a href="#" class="name h6 mb-0 text-sm">{{$centre->centre}}  </a>
                                    </div>
                                </div>
                            </th>
                            <td class="text-right">
                                <!-- Actions -->
                               
                                        <a href=" {{route("admin.centre.remove",$centre->id)}} " class="button delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح السؤال" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.editcentre",$centre->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل السؤال" title="" aria-expanded="false">
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
{{-- add  --}}
<div id="modal-close-default" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <div class="card-body">
                <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                    <li class="uk-active"><a href="#" aria-expanded="true">  اضافة سنة دراسية</a></li>
                </ul>
                <div class="card-body">
    
                    <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">
    
                        <li class="uk-active">
    
                            <div class="row">
                                <div class="col-xl-12 m-auto">
    
                                    <form action="{{route("admin.centre.store")}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="uk-grid-margin uk-first-column">
                                         <h5 class="uk-text-bold mb-2">المعهد</h5>
                                         <input type="text"  class="uk-input"  name="centre"  placeholder="المعهد">
                                        </div>
                                        <div class="uk-grid-margin uk-first-column">
                                            <button type="submit" class="btn btn-default">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
    
    
                        </li> 
                    </ul>
                </div>
        </div>

    </div> 
</div>
{{-- end add --}}
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