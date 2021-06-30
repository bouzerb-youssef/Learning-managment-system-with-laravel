<!doctype html>
<html lang="en" dir="rtl">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- CSS 
    ================================================== -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/night-mode.css') }}">
        @if (App::getlocale()== 'fr')
        <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('../assets/css/framework.css') }}">
        @else
        <link rel="stylesheet" href="{{ asset('../assets/css/style-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('../assets/css/framework-rtl.css') }}">
        @endif
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">    
    

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

    @livewireStyles
  @yield('styles')

</head>

<body {{-- style="background: #edeff0 !important;" --}}>

    <div id="wrapper">
        <div class="hs-dummy-scrollbar-size"><div style="height: 200%; width: 200%; margin: 10px 0;"></div></div>
        @include('front.inc.header')
        @include('front.inc.sidebar') 

        @yield('content')
        <br><br><br><br>
       <div class="container">@include('front.inc.footer')
    </div></div> 
</div> 

 
  @livewireScripts
  @yield('scripts')
    <!-- For Night mode -->
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);


        (function (window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('night-mode');
                if (document.documentElement.classList.contains('night-mode')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);

        })(window, document);
    </script>
 <script>
    function make_button_active(tab) {
        //Get item siblings
        var siblings = tab.siblings();

        /* Remove active class on all buttons
        siblings.each(function(){
            $(this).removeClass('active');
        }) */

        //Add the clicked button class
        tab.addClass('watched');
    }

    //Attach events to highlight-watched
    $(document).ready(function () {

        if (localStorage) {
            var ind = localStorage['tab']
            make_button_active($('.highlight-watched li').eq(ind));
        }

        $(".highlight-watched li").click(function () {
            if (localStorage) {
                localStorage['tab'] = $(this).index();
            }
            make_button_active($(this));
        });

    });
</script>

    <!-- javaScripts
    ================================================== -->
    <script src="{{ asset('assets/js/framework.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/mmenu.min.js') }}"></script>

    @stack('scripts')
    @yield('scripts')
</body>

</html>