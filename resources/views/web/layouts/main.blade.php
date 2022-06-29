<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content="HTML, CSS, JavaScript" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @include('web.layouts.links')
        <title>{{isset($title)?$title:'GM Tech'}}</title>
    </head>
    <body>
        <!-- Header Start -->
        <div class="main-wrapper container">
            @include('web.layouts.header')
        
        

        @yield('content')
        
        
        
            @include('web.layouts.footer')
        
        </div>
        @include('web.layouts.scripts')
        @yield('js')
    </body>
</html>

