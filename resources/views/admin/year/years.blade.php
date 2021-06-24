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
                <li><a href="#"> السنوات الدراسية </a></li>
                <li>لائحة السنوات</li>
            </ul>
        </nav>
    </div>
<br>

    <div class="d-flex justify-content-between mb-3">
        <h5> عدد السنوات الدراسية : {{$years->count()}} </h5>

        <div>
            <a  href="{{route('admin.addyear')}}"  uk-toggle="target: #modal-close-default" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> اضافة سنة دراسية جديد
            </a>
     

        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0">السنوات الدراسية</h4>
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
                        <th scope="col"> السنة الدراسية </th>
                        <th scope="col"> العمليات </th>
                   
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i=1
                    @endphp
                    @if(isset($years ) && $years->count()>0 )
                        @foreach ($years as $year)
                        <tr>
                        
                            <td></td>
                            <td>{{$i++}}</td>
                            <th scope="row">
                                <div class="media align-items-center">
                                    
                                    <div class="media-body mr-4">
                                    
                                            
                                    
                                        <a href="#" class="name h6 mb-0 text-sm">{{$year->year}}  </a>

                                      
                                    
                                    </div>
                                </div>
                            </th>
                            <td class="text-right">
                                <!-- Actions -->
                               
                                        <a href=" {{route("admin.year.remove",$year->id)}} "  class="btn btn-icon btn-hover btn-lg btn-circle"  class="delete-confirm" uk-tooltip="حذف" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.edityear",$year->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل " title="" aria-expanded="false">
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

<!-- This is the modal with the default close button --> 
<div id="modal-close-default" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
      
             
                <div class="card-body">
    
                    <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">
    
                        <li class="uk-active">
    
                            <div class="row">
                                <div class="col-xl-12 m-auto">
    
                                    <form action="{{route("admin.year.store")}}" method="POST">
                                            {{ csrf_field() }}
                                        <div class="uk-grid-margin uk-first-column">
                                         <h5 class="uk-text-bold mb-2">  السنة الدراسية :</h5>
                                            <input type="text"  class="uk-input" name="year" placeholder="السنة الدراسية">
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <h3>  </h3>
                                    
                                            <div>
                                                <button type="submit" class="btn btn-outline-dark">حفظ</button>
                                    
                                            </div>
                                        </div
                                        <div class="uk-grid-margin uk-first-column">
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
    
    
                        </li> 
                    </ul>
                </div>
        

    </div> 
</div> <!-- This is a button toggling the modal with the outside close button --> 
  

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