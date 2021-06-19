@extends('admin.layouts.app')

@section('content')
<br><br><br><br>
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
            <li> Courses </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h3>  عدد الكورسات :{{$cources->count()}} </h3>

        <div>
            <a href="{{route('admin.addcource')}}" class="btn btn-default">
                <i class="uil-plus"> </i> اضافة كورس جديد
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-3@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
        @foreach ($cources as $cource)
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip"><a href="#">
                    @if (!$cource->thumbnail== null)
                    <img src="{{$cource->imagePath}}" alt="">
                    @else
                    <img src="../assets/images/course/2.png" alt="">
                    @endif
                
                    <div class="card-body text-center pb-3">
                        <h6 class=" mb-0"><a href="{{route('admin.editcource',$cource->id)}}">{{$cource->title}}</a> </h6>
                      
                        <div class="">
                            <a href="#"   class="text-muted"> {{$cource->enrolls->count()}} مسجل(ة) </a>
                        </div>
                        <br>
                        <div class="actions ml-3">
                                   
                            <a href="{{route('admin.editcource',$cource->id)}}"  uk-tooltip="تعديل " title="" aria-expanded="false">
                                <i class="uil-pen" style="padding-right:20px;" ></i> </a>
                               <a href="{{route('admin.remove',$cource->id)}}"  class="delete-confirm"  uk-tooltip="حدف " title="" aria-expanded="false">
                                <i class="uil-trash-alt text-danger" style="padding-right:20px;" ></i> </a>
                                <a href="{{route('admin.sections',$cource->id)}}"  uk-tooltip="الفصول" title="" aria-expanded="false">
                                    <i class="icon-line-awesome-outdent " style="padding-right:20px;" ></i> </a>
                                    <a href="{{route('admin.showquestion',$cource->id)}}" uk-tooltip="اسئلة الاختبار" title="" aria-expanded="false">
                                        <i class="icon-material-outline-library-books " style="padding-right:20px;" ></i> </a>
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

</div>
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