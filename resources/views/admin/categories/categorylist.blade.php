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
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> الاصناف </a></li>
                    <li>لائحة الاصناف </li>
                </ul>
            </nav>
        </div>



        <div uk-grid="" class="uk-grid">
            <div class="uk-width-1-3@m uk-first-column">

                <nav class="responsive-tab style-3 setting-menu card uk-sticky" uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top" style="">
                    <h5 class="mb-0 p-3 uk-visible@m"> Catagries </h5>
                    <hr class="m-0 uk-visible@m">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="uk-active">
                                <a href="{{route("admin.categories",$category->id)}}"> <i class="uil-brush-alt "></i> {{$category->title}} 
                                    <span class="badge badge-light mr-2 badge-sm"> {{$category->cources->count()}}</span> 
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav><div class="uk-sticky-placeholder" style="height: 734px; margin: 0px 0px 20px;" hidden=""></div>

            </div>

            <div class="uk-width-2-3@m">

                <div class="card rounded">
                    <div class="p-3 d-flex align-items-center justify-content-between">
                        @php
                        use App\Models\Category;
                     $category=Category::findorfail($category_id);
                     
               @endphp
                        <h5 class="mb-0"> الكورسات </h5> <span> {{$category->cources->count()}} كورس </span>
                    </div>
                    <hr class="m-0">
                
                        @foreach ($category->cources as $cource)
                                <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                                    <div class="uk-width-1-3@m uk-first-column">
                                        @if (!$cource->thumbnail==null)
                                        <img src="{{$cource->imagePath}}" alt="" class="  rounded">
                                        @else
                                        <img src="../assets/images/course/2.png" class="  rounded" alt="">
                                        @endif
                                    </div>
                                    <div class="uk-width-expand">
                                        <h5 class="mb-2"> {{$cource->title}} </h5>
                                        <br>
                                        <p class="uk-text-small mb-2"> {!!$cource->short_description!!}  </a>
                                        </p>
                                        <p class="mb-0 uk-text-small mt-3">
                                            <span class="mr-3 bg-light p-2 mt-1"> {{$cource->enrolls->count()}} مسجل (ة)</span><span style='padding-left:80px;'> {{$cource->updated_at->diffForHumans()}} </span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                    


                </div>



              {{--   <ul class="uk-pagination mt-5 uk-flex-center" uk-margin="">
                    <li class="uk-active uk-first-column"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="uk-disabled"><span>...</span></li>
                    <li><a href="#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-next"><polyline fill="none" stroke="#000" stroke-width="1.2" points="6 1 1 6 6 11"></polyline></svg></span></a></li>
                </ul> --}}



            </div>


        </div>
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