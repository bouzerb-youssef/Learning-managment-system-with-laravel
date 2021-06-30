<header class="header uk-light">

    <div class="container">
        <nav uk-navbar="" class="uk-navbar">

            <!-- left Side Content -->
            <div class="uk-navbar-left">

                <!-- menu icon -->
                <span class="mmenu-trigger" uk-toggle="target: #wrapper ; cls: mobile-active">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </span>


                <!-- logo -->
                <a href="dashboard.html" class="logo">
                    <img src="../assets/images/amal-small-logo.png" {{-- width="500" height="600" --}} alt=""> 
                    <span> أمل سونطر</span>
                </a>

              
                <!-- Search box dropdown -->
              
            </div>


            <!--  Right Side Content   -->

            <div class="uk-navbar-right">
                <div class="header-widget">
                    <!-- notificiation icon  -->
              {{--       <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>   --}}
                    <!-- notificiation dropdown -->
    {{-- 
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            اللغة
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                           
                                <a  class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                      </div> --}}

                    <!-- Message  -->

                
                    @php
                        $user =App\Models\User::with('enrolls')->find(\Auth::user()->id);
                    @endphp
                    <!-- profile-icon-->
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-avatar">
                            @if ($user->photo)
                            <img src="{{$user->imagePath}}"></span>
                            @else
                            <img src="../assets/images/avatars/avatar-2.jpg" alt="">                                    
                            @endif  
                           
                        </div>
                        <div class="dropdown-user-name">
                            {{$user->name}} 
                        </div>
                    </div>


                    <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown uk-dropdown-bottom-right" style="left: -42.4969px; top: 46.9984px;">

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
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <i class="icon-feather-moon"></i> ----الوضع الليلي   
                                    <span class="btn-night-mode-switch">
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



                <!-- icon search-->
                <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
                    <i class="uil-search icon-small"></i>
                </a>
                <!-- User icons -->
                <span class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
                    

            </span></div>
            <!-- End Right Side Content / End -->


        </nav>

    </div>
    <!-- container  / End -->

</header>