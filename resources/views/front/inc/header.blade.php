<header class="header header-transparent uk-sticky header-sticky uk-sticky-below uk-sticky-fixed" uk-sticky="top:20 ; cls-active:header-sticky ; cls-inactive: uk-light" style="position: fixed; top: 0px; width: 1375px;">

    <div class="container">
        <nav uk-navbar="" class="uk-navbar">

            <!-- left Side Content -->
            <div class="uk-navbar-left">

                <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>



                <!-- logo -->
                <a href="dashboard.html" class="logo">
                    <img src="../assets/images/logo-dark.svg" alt="">
                    <span> Courseplus</span>
                </a>

                <!-- breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a style="font-size: large;"  href="/"> الرئيسية </a></li>
                        <li><a style="font-size: large;" href="/cources">الكورسات</a></li>
                        
                    </ul>
                </nav>


            </div>


            <!--  Right Side Content   -->
     @auth
           {{--  <ul>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul> --}}

            <div class="uk-navbar-right">

                <div class="header-widget">
                    <!-- User icons close mobile-->
                    <span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"> </span>


                    <a href="#" class="header-widget-icon" uk-tooltip="title: My Courses ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-youtube-alt"></i>
                    </a>

                    <!-- courses dropdown List -->
                    <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-notifications my-courses-dropdown uk-dropdown">

                        <!-- notivication header -->
                        <div class="dropdown-notifications-headline">
                            <h4>كورساتك</h4>
                            <a href="#">
                                <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left" title="" aria-expanded="false"></i>
                            </a>
                        </div>
                     
                        <!-- notification contents -->
                        <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: -17px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll;">

                            <!-- notiviation list -->
                            <ul>
               
                                @php
                                $user =App\Models\User::with('enrolls')->find(\Auth::user()->id);
                            @endphp
        
               
                        @if($user->enrolls->count()>0)
                                @foreach ($user->enrolls as $enroll)
                                @if ($enroll->cource)
                                      <li class="notifications-not-read">
                                    <a href="course-intro.html">
                                        <span class="notification-image">
                                           
                                            @if (!$enroll->cource->thumbnail==null)
                                            <img src="{{$enroll->cource->imagePath}}"></span>
                                            @else
                                            <img src="../assets/images/course/1.png" alt=""> </span>
                                            @endif    
                                            <span class="notification-text">
                                            <span class="course-title">{{$enroll->cource->title}} &amp; {{$enroll->cource->title}}
                                            </span>
                                           
                                          
                                        </span>

                                        <!-- option menu -->
                                        <span class="btn-option" aria-expanded="false">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                        <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : hover">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <i class="icon-material-outline-dashboard"></i>
                                                        Course Dashboard</span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="icon-feather-video"></i>
                                                        Resume Course</span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="icon-feather-x"></i>
                                                        Remove Course</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </a>

                                </li>
                                @endif 
                                @endforeach
                                @endif
                              
                               
                            </ul>
       
                        </div></div></div><div class="simplebar-placeholder" style="width: 339px; height: 712px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 139px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
                        <div class="dropdown-notifications-footer">
                            <a href="#"> sell all</a>
                        </div>
                    </div>


    

                        <!-- User Name / Avatar -->
                        <a href="">

                            <div  {{-- style='padding-bottom:60px;' --}} class=" dropdown-user-details ">
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
                        <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown">

                        <!-- User menu -->

                        <ul class="dropdown-user-menu">
                            <li>
                                <a href="/profile">
                                    <i class="icon-material-outline-dashboard"></i> الصفحة الشخصية</a>
                            </li>
                          
                            <li><a href="user/profile">
                                <i class="icon-feather-settings"></i> ادارة الحساب</a>
                            </li>
                          
                            <li>
                                <a href="#" id="night-mode" class="btn-night-mode" >
                                  <i style='margin-right:50px;' ></i> الوضع الليلي
                                    <span class="btn-night-mode-switch"  style='margin-top:11px;'>
                                   
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                            </li>
                            <li> 
                                <a href="/login">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
        
                                        <dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                          <i class="icon-feather-log-out">{{ __('الخروج') }}</i>  
                                        </dropdown-link>
                                    </form></a>   
                                
                                
                            </li>
                        </ul>


                    </div>


                </div>

                @endauth
                <!-- icon search-->
                <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
                    <i class="uil-search icon-small"></i>
                </a>
                
                <!-- User icons -->
                    <a href="#" class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
                    </a>
                    

            </div>
            <!-- End Right Side Content / End -->


        </nav>

    </div>
    <!-- container  / End -->

</header>