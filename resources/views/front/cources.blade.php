@extends('front.layouts.app')
@section('content')
<br><br>
<div class="page-content">

    <div class="container">

        <div class="mt-lg-5 uk-grid" uk-grid="">
            <div class="uk-width-1-4@m uk-first-column">

                <div class="sidebar-filter uk-sticky" uk-sticky="top:20 ;offset: 90; bottom: true ; media : @m" style="">

                    <button class="btn-sidebar-filter" uk-toggle="target: .sidebar-filter; cls: sidebar-filter-visible">Filter </button>


                </div><div class="uk-sticky-placeholder" style="height: 665px; margin: 0px;" hidden=""></div>


            </div>

            <div class="uk-width-expand@m">

                <div class="section-header mb-lg-3">
                    <div class="section-header-left">

                        <h4> جميع الكورسات </h4>

                    </div>
                    <div class="section-header-right">


                     


                    </div>
                </div>



                <div class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid" uk-grid="">
                @foreach ($cources as $cource)
                    <div >
                        <a href="{{route('cources.show',$cource->id)}}">
                            <div class="course-card">
                                <div class="course-card-thumbnail ">
                                    @if (!$cource->thumbnail==null)
                                    <img src="{{$cource->imagePath}}" alt="">
                                    @else
                                    <img src="../assets/images/course/2.png" alt="">
                                    @endif                                   
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
                                    <p> {!!$cource->short_description!!} </p>
                                    <div class="course-card-footer">
                                        @if (isset($cource->sections)&& $cource->sections->count()>0)
                                        @php
                                            foreach ($cource->Sections as $section ) {
                                                    $countlesson= $section->lessons->count();
                                                    $countlessontime= $section->lessons->sum('duration');
                                            }
                                        @endphp
                                        <h5> <i class="icon-feather-film"></i> {{$countlesson}} دروس </h5>
                                        <h5> <i class="icon-feather-clock"></i> {{ $countlessontime}} دقيقة </h5>
                                        @else
                                        <h5> <i class="icon-feather-film"></i> ليس هناك فصول بعد </h5>
                                        <h5> <i class="icon-feather-clock"></i> ليس هناك فصول بعد </h5>
                                    @endif
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