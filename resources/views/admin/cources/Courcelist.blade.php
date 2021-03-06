@extends('admin.layouts.app')

@section('content')

<div class="page-content">
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
            <li> Cources </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h4>  Cources :{{$cources->count()}} </h4>

        <div>
            <a href="{{route('admin.addcource')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> Add New Cource
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-4@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
        @foreach ($cources as $cource)
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip"><a href="#">
                    @if (!$cource->thumbnail== null)
                    <img src="{{asset('cources/'.$cource->thumbnail)}}" alt="">
                    @else
                    <img src="../assets/images/course/2.png" alt="">
                    @endif
                
                    <div class="card-body text-center pb-3">
                        <h6 class=" mb-0"><a href="{{route('admin.editcource',$cource->id)}}">{{$cource->title}}</a> </h6>
                      
                        <div class="">
                          <h8><a href="#"   class="text-muted"> {{$cource->enrolls->count()}}  Enerolled</a></h8>
                        </div>
                        <br>
                        <div class="actions ml-3">
                                   
                            <a href="{{route('admin.editcource',$cource->id)}}"  uk-tooltip="Edit " title="" aria-expanded="false">
                                <i class="uil-pen" style="padding-right:20px;" ></i> </a>
                               <a href="{{route('admin.remove',$cource->id)}}"  class="delete-confirm"  uk-tooltip="Delete " title="" aria-expanded="false">
                                <i class="uil-trash-alt text-danger" style="padding-right:20px;" ></i> </a>
                               {{--  <a href="{{route('admin.sections',$cource->id)}}"  uk-tooltip="????????????" title="" aria-expanded="false">
                                    <i class="icon-line-awesome-outdent " style="padding-right:20px;" ></i> </a>
                                    <a href="{{route('admin.showquestion',$cource->id)}}" uk-tooltip="?????????? ????????????????" title="" aria-expanded="false">
                                        <i class="icon-material-outline-library-books " style="padding-right:20px;" ></i> </a> --}}
                        </div>
                    </div>
                    </a>
                 
                </div>
            
        </div>
        @endforeach
      

    </div>


    <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
       {{ $cources->links() }}
    </ul>
    
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