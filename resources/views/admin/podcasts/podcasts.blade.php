@extends('admin.layouts.app')

@section('content')

<br><br><br><br>
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
            <li> podcasts </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h4>  podcasts :{{$podcasts->count()}} </h4>

        <div>
            <a href="{{route('admin.podcast.add')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> Add New podcast
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-6@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
        @foreach ($podcasts as $podcast)
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip"><a href="#">
                    @if (!$podcast->podcast== null)
                    <img src="../assets/images/course/podcast.png" alt="">
                    @else
                    <img src="../assets/images/course/2.png" alt="">
                    @endif
                
                    <div class="card-body text-center pb-3">
                        <h6 class=" "><a href="{{asset('podcasts/'.$podcast->podcast)}}">{{$podcast->name}}</a> </h6>
                                    
                                    
                      
                     
                        <div class="actions ml-3">
                                   
                            <a href="{{route('admin.podcast.edit',$podcast->id)}}"  uk-tooltip="Edit " title="" aria-expanded="false">
                                <i class="uil-pen" style="padding-right:20px;" ></i> </a>
                               <a href="{{route('admin.podcast.remove',$podcast->id)}}"  class="delete-confirm"  uk-tooltip="Delete " title="" aria-expanded="false">
                                <i class="uil-trash-alt text-danger" style="padding-right:20px;" ></i> </a>
                               {{--  <a href="{{route('admin.sections',$podcast->id)}}"  uk-tooltip="الدروس" title="" aria-expanded="false">
                                    <i class="icon-line-awesome-outdent " style="padding-right:20px;" ></i> </a>
                                    <a href="{{route('admin.showquestion',$podcast->id)}}" uk-tooltip="اسئلة الاختبار" title="" aria-expanded="false">
                                        <i class="icon-podcast-outline-library-books " style="padding-right:20px;" ></i> </a> --}}
                        </div>
                    </div>
                    </a>
                 
                </div>
            
        </div>
        @endforeach
      

    </div>


    <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
       {{ $podcasts->links() }}
    </ul>
    
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