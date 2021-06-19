@extends('admin.layouts.app')

@section('content')
<br><br><br><br>
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
            <li> الكتب </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h3>  عدد الكتب :{{$books->count()}} </h3>

        <div>
            <a href="{{route('admin.addbook')}}" class="btn btn-default">
                <i class="uil-plus"> </i> اضافة كتاب جديد
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-5@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
        @foreach ($books as $book)
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip"><a href="#">
                    @if (!$book->thumbnail==null)
                    <img src="{{$book->imagePath}}" alt="">
                    @else
                    <img src="../assets/images/course/2.png" alt="">
                    @endif
                   

                    <div class="card-body text-center pb-3">
                        <h6 class=" mb-0"><a href="{{-- {{route('admin.editbook',$book->id)}} --}}">{{$book->title}}</a> </h6>
                    </div>
                    </a><div class="card-footer py-0 border-top-0"><a href="#">
                        </a><div class="row align-items-center text-center"><a href="#">
                         
                          
                            
                                <!-- Actions -->
                                <div class="actions ml-3">
                                 <a href="{{route("admin.book.remove",$book->id)}}"  class="delete-confirm" class="btn btn-icon btn-hover btn-lg btn-circle"  uk-tooltip="مسح الكتاب" title="" aria-expanded="false">
                                        <i class="uil-trash-alt text-danger" ></i> 
                                    </a>  
                                    <a href="{{route('admin.editbook',$book->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="تعديل الكتاب" title="" aria-expanded="false">
                                        <i class="uil-pen "></i> </a>
                                   {{--  <a href="{{route('admin.addbookdetail',$book->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة تفاصيل" title="" aria-expanded="false">
                                        <i class="uil-external-link-alt "></i> </a>
                                   
                                       <a href="{{route('admin.remove',$book->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="حدف الكورس" title="" aria-expanded="false">
                                        <i class="uil-trash-alt text-danger"></i> </a>
                                        <a href="{{route('admin.addbooksection',$book->id)}}" class="btn btn-icon btn-hover btn-lg btn-circle" uk-tooltip="اضافة الفصول" title="" aria-expanded="false">
                                            <i class="uil-external-link-alt "></i> </a> --}}
                                </div>
                        </div>
                    </div>
                </div>
            
        </div>
        @endforeach
      

    </div>


    <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
{{--      {{ $books->links() }} 
 --}}    </ul>

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
