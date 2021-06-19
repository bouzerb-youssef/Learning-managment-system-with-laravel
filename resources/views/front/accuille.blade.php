@extends('front.layouts.app')

@section('content')
<div class="page-content">
    @if (!$content->hero_image1==null)
        <div class="home-hero" data-src="{{$content->heroImagePath}}"   uk-img="" style="background-image: url(&quot;file:///C:/Users/pc/Desktop/main/assets/images/home-hero.png&quot;);">
    @else
    <div class="home-hero" data-src="../assets/images/amal-home.png"   uk-img="" style="background-image: url(&quot;file:///C:/Users/pc/Desktop/main/assets/images/home-hero.png&quot;);">
    @endif
       <div class="uk-width-1-1">
           <div class="page-content-inner uk-position-z-index">
               <h1>{!!$content->title1!!}</h1>
               <h4 class="my-lg-4"> {!!$content->description1!!}
               </h4>
               <a href="#" class="btn btn-default">{!!$content->button1!!} </a>
           </div>
       </div>
   </div>

   <!-- Content
================================================== -->



   <div class="section">
       <div class="page-content-inner">

           <div class="section-small text-md-left text-center">
               <div class="uk-child-width-1-2@m uk-gird-large uk-flex-middle uk-grid" uk-grid="">
                   <div class="uk-first-column">
                    @if (!$content->image2==null)
                    <img src="{{$content->imagePath}}" alt="">
                    @else
                    <img src="../assets/images/amal2.jpg" alt="">                   
                     @endif
                     
                   </div>
                   <div>
                       <h2>{!!$content->title2!!}</h2>
                           <p> {!!$content->description2!!} </p>
                           <a href="#" class="btn btn-soft-light"> {!!$content->button2!!}</a>
                   </div>
               </div>
           </div>

       </div>
   </div>

   <div class="section-small delimiter-top">

       <div class="container-small">

           <div class="text-center mb-5">
               <h3> {!!$content->title3!!} </h3>
               <h5> {!!$content->description3!!} </h5>
           </div>
           <div class="course-grid-slider mt-lg-5 uk-slider" uk-slider="finite: true">
               <div class="uk-slider-container pb-3">
                   <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid" style="transform: translate3d(-3.05176e-05px, 0px, 0px);">
                    @if (isset($cources) && $cources->count()>0)
                        
                    
                    @foreach ($cources as $cource)
                       <li tabindex="-1" class="uk-active">
                           <a href="{{route("cources.show",$cource->id)}}">
                               <div class="course-card">
                                   <div class="course-card-thumbnail ">
                                       <img  href="{{route("cources.show",$cource->id)}}" src="{{$cource->imagePath}}">
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
                                    
                                           <a href="{{route("category.show",$cource->category->id)}}"> <span class="catagroy">{{$cource->category->title}}</span></a>

                                            @else
                                            <span class="catagroy">category null</span> 
                                            @endif
                                            </div>
                                           <div>
                                               <i class="icon-feather-bookmark icon-small"></i>
                                           </div>
                                       </div>
                                       <h4><a href="{{route("cources.show",$cource->id)}}">{{$cource->title}}</a> </h4>
                                       <p> {!!$cource->short_description!!} </p>
                                       <div class="course-card-footer">
                                    @if (isset($cource->sections)&& $cource->sections->count()>0)
                                        @php
                                            foreach ($cource->Sections as $section ) {
                                               
                                                    $countlesson= $section->lessons->count();
                                                    $countlessontime= $section->lessons->sum('duration');

                                               
                                              /*   $countlesson=0;
                                                $countlessontime=0; */
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

                       </li>
                       @endforeach
                       @endif
                   </ul>


                   <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible" href="#" uk-slider-item="previous"></a>
                   <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>

               </div>
           </div>

           <div class="text-center">
               <a href="{{route("cources")}}" class="btn btn-soft-light btn-small btn-circle"> رؤية كورسات اخري</a>
           </div>
       </div>
   </div>
</div>
@endsection