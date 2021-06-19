<div class="side-nav uk-animation-slide-left-medium">


    <div class="side-nav-bg"></div>

    <!-- logo -->
    <div class="logo uk-visible@s">
        <a href="dashboard.html">
            <i class=" uil-graduation-hat"></i>
        </a>
    </div>

    <ul>
        <li>
            <a href="#"> <i class="uil-play-circle"></i> </a>
            <div class="side-menu-slide">
                <div class="side-menu-slide-content">
                    <ul data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll hidden;">
                        <li><a href="#">الاصناف</a>
                            @php
                                
                                $categories = App\Models\Category::select("id","title")->take(6)->get();
                            @endphp
                            <ul class="dropdown-nav nav-large nav-courses">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{route("category.show",$category->id)}}">
                                         {{$category->title}}
                                    </a>
                                </li>
                            @endforeach
                </div></div></div><div class="simplebar-placeholder" style="width: 230px; height: 929px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></ul></div>
            </div>
        </li>
        <li>
            <!-- book -->
            <a href="/books"> <i class="uil-book-alt"></i> <span class="tooltips"> الكتب</span> </a>
        </li>
        <li>
            <!-- Blog-->
{{--             <a href="blog-1.html"> <i class="uil-file-alt"></i> <span class="tooltips"> Blog</span></a>
 --}}        </li>
      

    </ul>
    @Auth
        @php
            $user =App\Models\User::with('enrolls')->find(\Auth::user()->id);
        @endphp
    
    @endauth
    <ul class="uk-position-bottom">
 
        <li>
            @auth
            <a @auth href="#" @endauth href="/login" aria-expanded="false">
                <span class="icon-feather-user"></span>
            </a>
            <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small" class="uk-drop">
                <div class="uk-card-default rounded p-0">
                    <a href="/profile" class="p-0">

                        <div class="dropdown-user-details">
                            <div class="dropdown-user-avatar">
                                @if ($user->profile_photo_path)
                                <img src="{{$user->imagePath}}"></span>
                                @else
                                <img src="../assets/images/avatars/avatar-2.jpg" alt="">                                    
                                @endif  
                               
                            </div>
                            <div class="dropdown-user-name">
                                {{$user->name}} 
                            </div>
                        </div>

                    </a>
                 @endauth
                </div>
            </div>
        </li>
    </ul>
</div>