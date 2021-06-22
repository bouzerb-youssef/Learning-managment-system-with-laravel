@extends('front.layouts.app')
@section('content')
<div class="page-content">

    <div class="container">

        <div class="mt-lg-5 uk-grid" uk-grid="">
            <div class="uk-width-1-4@m uk-first-column">

                <div class="sidebar-filter uk-sticky" uk-sticky="top:20 ;offset: 90; bottom: true ; media : @m" style="">

                    <button class="btn-sidebar-filter" uk-toggle="target: .sidebar-filter; cls: sidebar-filter-visible">Filter </button>

                    <div class="sidebar-filter-contents">


                        <h4> Filter By </h4>

                        <ul class="sidebar-filter-list uk-accordion" uk-accordion="multiple: true">


                        </ul>



                    </div>

                </div><div class="uk-sticky-placeholder" style="height: 665px; margin: 0px;" hidden=""></div>


            </div>

            <div class="uk-width-expand@m">

                <div class="section-header mb-lg-3">
                    <div class="section-header-left">

                        <h4> Web Development </h4>

                    </div>
                    <div class="section-header-right">


                     


                    </div>
                </div>



                <div class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid" uk-grid="">
                @foreach ($cources as $cource)
                    <div >
                        <a href="course-intro.html">
                            <div class="course-card">
                                <div class="course-card-thumbnail ">
                                    <img src="{{$cource->thumbnail}}">
                                    <span class="play-button-trigger"></span>
                                </div>
                                <div class="course-card-body">
                                    <div class="course-card-info">
                                        <div>
                                            @php
                                                $check =$cource->category
                                            @endphp 
                                          @if ( !$check==null)
                                         {{--  @foreach ($cource->category as $cat)     
                                          <p>{{$cat->title}}</p>
                                        
                                           @endforeach --}}
                                  
                                          <span class="catagroy">الصنف : {{$cource->category->title}} </span>
             
                                          @else
                                          <span class="catagroy">category null</span> 
                                          @endif
                                          </div>
                                        <div>
                                            <i class="icon-feather-bookmark icon-small"></i>
                                        </div>
                                    </div>
                                    <h4>{{$cource->title}} </h4>
                                    <p> {{$cource->short_description}} </p>
                                    <div class="course-card-footer">
                                        <h5> <i class="icon-feather-film"></i> {{$cource->lessons->count()}} </h5>
                                        <h5> <i class="icon-feather-clock"></i>{{$cource->lessons->sum('duration')}} </h5>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endforeach
                </div>

                <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
                    {{ $cources->links() }}
                </ul>

            </div>

        </div>

    </div>

</div>
</div>


    
    
@endsection