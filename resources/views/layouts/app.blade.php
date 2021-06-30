<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('assets/css/night-mode.css') }}">
        @if (App::getlocale()== 'fr')
        <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('../assets/css/framework.css') }}">
        @else
        <link rel="stylesheet" href="{{ asset('../assets/css/style-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('../assets/css/framework-rtl.css') }}">
        @endif
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">    
    
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
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
    </body>
</html>
