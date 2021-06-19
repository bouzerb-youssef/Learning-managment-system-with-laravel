@extends('front.layouts.app')
@section('content')
<br><br><br><br>
<div class="page-content-inner">


    <h1> Books </h1>


    <div class="mt-lg-5 uk-grid" uk-grid="">

        <div class="uk-width-3-4@m uk-first-column">

            <h4> Featured books </h4>

            <div class="uk-position-relative uk-slider uk-slider-container" tabindex="-1" uk-slider="autoplay: true">
                
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(209.978px, 0px, 0px);">
                    @foreach ($categorybooks as $categorybook)
                        
                   
                    <li tabindex="-1" class="" style="">
                        <a href="book-description.html">
                            <div class="book-card">
                                <div class="book-cover">
                                    <img src="{{$categorybook->imagePath}}" alt="">
                                </div>
                                <div class="book-content">
                                    <h5>{{$categorybook->title}}</h5>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>


                <div class="uk-flex uk-flex-center mt-2">
                    <ul class="uk-slider-nav uk-dotnav"><li uk-slider-item="0" class=""><a href="#"></a></li><li uk-slider-item="1" class="uk-active"><a href="#"></a></li><li uk-slider-item="2" class=""><a href="#"></a></li><li uk-slider-item="3" class=""><a href="#"></a></li><li uk-slider-item="4" class=""><a href="#"></a></li></ul>
                </div>

            </div>

        </div>

       

    </div>

    <h3> Category</h3>

    <nav class="responsive-tab style-1 ">
        <ul>
            <li class="uk-active"><a href="#">JavaScript</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">HTML</a></li>
            <li><a href="#">Coding</a></li>
        </ul>
    </nav>

    <div class="section-small">
      
    

            <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid="">
                @foreach ($books as $book)
                <div class="uk-grid-margin">
                    <a href="{{route("books.show",$book->id)}}" class="uk-text-bold">
                        <img src="{{$book->imagePath}}" class="mb-2 w-100 shadow rounded">
                    {{$book->title}}
                    </a>
                </div>
                @endforeach

            </div>
    </div>


    <!-- pagination-->
    <ul class="uk-pagination uk-flex-center uk-margin-medium">
        <li class="uk-active">
            <span>1</span>
        </li>
        <li>
            <a href="#">2</a>
        </li>
        <li>
            <a href="#">3</a>
        </li>
        <li>
            <a href="#">4</a>
        </li>
        <li>
            <a href="#">5</a>
        </li>
        <li>
            <a href="#"><i class="icon-feather-chevron-right uk-margin-small-top"></i></a>
        </li>
        <li>
            <a href="#">12</a>
        </li>
    </ul>


</div>


    
    
@endsection