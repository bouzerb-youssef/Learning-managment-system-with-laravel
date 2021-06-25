@extends('admin.layouts.app')

@section('content')
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
                <li><a href="#"> الاصناف </a></li>
                <li>لائحة الاصناف</li>
            </ul>
        </nav>
    </div>


    <div class="d-flex justify-content-between mb-3">
        <h3> عدد الاصناف :{{$categories->count()}} </h3>

        <div>
            <a href="{{route('admin.addcategory')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> اضافة صنف جديد
            </a>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0">الاصناف</h4>
                <div class="d-flex">

                  
                


                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th scope="col">##</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">العمليات</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                    $i=1
                @endphp
                    @foreach ($categories as  $category)
                    <tr>
                      
                           
                        <td>{{$i++}}</td>
                        <th scope="row">
                            <div class="media align-items-center">
                                
                                <div class="media-body mr-4">
                                    <a href="#" class="name h6 mb-0 text-sm">{{$category->title}}

                                    </a>
                                   
                                </div>
                            </div>
                        </th>
                      
                        <td class="text-right">
                            <!-- Actions -->
                           
                                    <a href="{{route("admin.category.remove",$category->id)}}"  class="btn  delete-confirm btn-icon btn-hover btn-lg btn-circle"   wire:click='remove({{$category->id}})' uk-tooltip="حذف " title="" aria-expanded="false">
                                        <i class="uil-trash-alt text-danger" ></i> 
                                    </a>
                
                                    <a href="{{route("admin.editcategory",$category->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل" title="" aria-expanded="false">
                                        <i class="uil-pen "></i> 
                                    </a>   
                        </td>
                        
                      
                    </tr>  
                    @endforeach 
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
                            //icon: 'warning',
                            buttons: ["تراجع", "نعم"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>

@endsection