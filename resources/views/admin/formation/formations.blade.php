@extends('admin.layouts.app')

@section('content')

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
                <li><a href="#"> Formations </a></li>
                <li>All Formations</li>
            </ul>
        </nav>
    </div>


    <div class="d-flex justify-content-between mb-3">
        <h3>Formations: {{$formations->count()}} </h3>

        <div>
            <a href="{{route('admin.addformation')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i>Add New Formation
            </a>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0">Formation</h4>
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
                        <th scope="col"> title </th>
                        <th scope="col"> Description </th>
                        <th scope="col"> begun Date</th>
                        <th scope="col"> End Date </th>
                        <th scope="col"> Academic year </th>
                        <th scope="col"> Operations </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i=1
                    @endphp
                    @if(isset($formations ) && $formations->count()>0 )
                        @foreach ($formations as $formation)
                        <tr>
                        
                           
                            <td>{{$i++}}</td>
                            <td>{{$formation->title}}</td>
                            <td>{!!$formation->description!!}</td>
                            <td>{{$formation->datebegun}}</td>
                            <td>{{$formation->dateend}}</td>
                            @if($formation->year)
                            <td>{{$formation->year->year}}</td>
                            @else
                            <td> no academy year yet</td>
                            @endif
                            
                            <td class="text-right">
                                <!-- Actions -->
                               
                                        <a href=" {{route("admin.formation.remove",$formation->id)}} "  class="btn  delete-confirm btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح السؤال" title="" aria-expanded="false">
                                            <i class="uil-trash-alt text-danger" ></i> 
                                        </a>
                    
                                        <a href=" {{route("admin.editformation",$formation->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل السؤال" title="" aria-expanded="false">
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