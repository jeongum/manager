<!--

=========================================================
* Swipe - Mobile App One Page Bootstrap 5 Template
=========================================================

* Product Page: https://themesberg.com/product/bootstrap/swipe-free-mobile-app-one-page-bootstrap-5-template
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Contact us if you want to remove it.

-->
<!DOCTYPE html>

<html lang="ko-kr">

    @include('layouts._header')
  	@include('layouts._css')
    <body>
    
         @include('layouts._navigation')
         
        <main class="bg-soft">
            @yield('content')
        </main>
    
        @include('layouts._footer')
        
        @include('layouts._scripts')

    </body>
</html>