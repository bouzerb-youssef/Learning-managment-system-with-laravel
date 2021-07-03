@extends('admin.layouts.app')

@section('content')

<br><br><br><br>
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
            <li> lessons </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h4>  lessons :{{$lessons->count()}} </h4>

        <div>
            <a href="{{route('admin.lesson.add')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> Add New lesson
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-3@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
       @php
              use Vimeo\Laravel\Facades\Vimeo;

       @endphp
    @if(isset($lessons) && $lessons->count()>0)
        @foreach ($lessons as $lesson)
        @php
 
     
        $result= Vimeo::request($lesson->video, ['per_page' => 2], 'GET');
       //dd( $result['body'])
        @endphp
        <li tabindex="-1" class="uk-active">
            <a href="{{route('cources.lessons.vedio',$lesson->id)}}">
                <div class="course-card episode-card animate-this">
                    <div class="course-card-thumbnail ">
                       
                         <span class="item-tag">{{$lesson->cource->title}}</span>
                       <span >{{$result['body']['duration']}}</span> 
                        <img src="{{$result['body']['pictures']['sizes'][4]['link']}}">
                        <span class="play-button-trigger">
                         
                        </span>
                    </div>
                    <div class="course-card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="mb-0"> {{$lesson->name}}</h4>
                    
                            <div>
                                <a href="{{route('admin.lesson.remove',$lesson->id)}}"  class="delete-confirm"  uk-tooltip="Delete " title="" aria-expanded="false">
                                    <i class="uil-trash-alt text-danger" style="padding-right:20px;" ></i></a>
                                    <a href="{{route('admin.lesson.edit',$lesson->id)}}"  uk-tooltip="Edit " title="" aria-expanded="false">
                                        <i class="uil-pen" style="padding-right:20px;" ></i> </a>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </a>
        </li>
        
      
        @endforeach
    @endif
      

    </div>


    <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
       {{ $lessons->links() }}
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