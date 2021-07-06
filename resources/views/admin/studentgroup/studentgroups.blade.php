@extends('admin.layouts.app')

@section('content')


<div class="page-content">

<div class="page-content-inner">

    <div class="d-flex">
        <nav id="breadcrumbs" class="mb-3">
            <ul>
                <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                <li><a href="#"> Groups </a></li>
                <li>All Groups</li>
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

    <div class="d-flex justify-content-between mb-3">
        <h3 style=" font-family: Muli, Poppins, Helvetica;">Groups: {{$studentgroups->count()}} </h3>

        <div>
            <a href="{{route('admin.addstudentgroup')}}" class="
            btn btn-outline-dark" style=" font-family: Muli, Poppins, Helvetica;">
                <i class="uil-plus" > </i>Add New Group
            </a>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0" style=" font-family: Muli, Poppins, Helvetica;">Groups</h4>
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
                        <th scope="col"> Title </th>
                        <th scope="col"> Description </th>
               
                        <th scope="col">Formation </th>
                        <th scope="col">Centre </th>
                        <th scope="col"> Operations </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i=1
                    @endphp
                    @if(isset($studentgroups ) && $studentgroups->count()>0 )
                        @foreach ($studentgroups as $studentgroup)
                        <tr>
                        
                           
                            <td>{{$i++}}</td>
                            <td>{{$studentgroup->title}}</td>
                            <td>{!!$studentgroup->description!!}</td>
                            @if(isset($studentgroup->centre ) && $studentgroup->centre->count()>0 )
                            <td>{{$studentgroup->centre->centre}}</td>
                            @else
                            <td>no Centre detected</td>
                            @endif
                            @if ($studentgroup->formation)
                            <td>{{$studentgroup->formation->title}}</td>

                            @else
                            <td>no formation detected</td>  
                            @endif
                            <td class="text-right">
                                <!-- Actions -->
                                        <a href=" {{route("admin.studentgroup.remove",$studentgroup->id)}} " class="btn  delete-confirm btn-icon btn-hover btn-lg btn-circle"  uk-tooltip=" حذف" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                                        <a href=" {{route("admin.editstudentgroup",$studentgroup->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل " title="" aria-expanded="false">
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