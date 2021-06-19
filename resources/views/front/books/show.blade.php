@extends('front.layouts.app')
@section('content')
<br><br><br><br>
<div class="page-content">

    <div class="page-content-inner">

        <div class="container-small">

            <div class="uk-grid-large uk-grid" uk-grid="">

                <div class="uk-width-1-3@m uk-width-1-2@s uk-first-column">
                    <div uk-sticky="offset: 83px;bottom: true ;media @s" class="uk-sticky uk-active uk-sticky-fixed" style="position: fixed; top: 83px; width: 253px;">

                        <div uk-lightbox="">
                            <a href="" data-caption="Caption 1">
                                <img class="uk-box-shadow-xlarge" alt="" src="{{$book->imagePath}}">
                            </a>
                            <a href="" data-caption="Caption 2"> </a>
                            <a href="" data-caption="Caption 3"> </a>
                        </div>

                        <ul class="uk-list uk-list-divider text-small mt-lg-4">
                            <li> Visited 120 </li>
                            <li> Publish time 12/12/2018</li>
                            <li> Downloaded 120 </li>
                        </ul>

                        <button class="btn btn-info">
                            <i class="icon-feather-book-open mr-2"></i> Read
                        </button>
                     
                    </div><div class="uk-sticky-placeholder" style="height: 524px; margin: 0px;"></div>
                </div>

                <div class="uk-width-2-3@m uk-width-1-2@s">
                    <h2>{{$book->title}}</h2>
                    <hr class="mt-0">
                    <h4> Description </h4>
                    <p></p>
                    <p>{{$book->description}}</p>
                 
                </div>

            </div>

        </div>

    </div>

</div>

    
    
@endsection