<!doctype html>
<html    >

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="../assets/images/favicon.png" rel="icon" type="image/png">

    <!-- CSS 
    ================================================== -->

 

    <link rel="stylesheet" href="{{ asset('../assets/css/night-mode.css') }}">
   
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/framework.css') }}">
 
  {{--   <link rel="stylesheet" href="{{ asset('../assets/css/style-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/framework-rtl.css') }}">
   --}}
  
   

    
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.css') }}"> 
    @toastr_css
    

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('../assets/css/icons.css') }}">
    @livewireStyles
     <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
     @yield('styles')
    @stack('styles')


 <style>
     input[type=radio] {
       
    height:58px;
    border:0px;
        }
 </style>
</head>

<body>

    <div id="wrapper" class="admin-panel">
        @include('admin.inc.sidebar')
        @include('admin.inc.header')
      
        @yield('content')
       <br><br><br><br><br>
        @include('admin.inc.footer')
        





          
   
        
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



             
        <!-- javaScripts
    ================================================== -->
    @livewireScripts
        <script src="{{ asset('../assets/js/framework.js') }}"></script>
        <script src="{{ asset('../assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('../assets/js/simplebar.js') }}"></script>
        <script src="{{ asset('../assets/js/main.js') }}"></script>
        <script src="{{ asset('../assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('../assets/js/chart-custom.js') }}"></script>
        @yield('scripts')
        @stack('scripts')
      
        @toastr_js
        @toastr_render
      
</body>

</html>