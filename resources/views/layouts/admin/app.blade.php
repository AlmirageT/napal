<!doctype html>
<html lang="es">
    <head>
        @include('layouts.admin.title')
        @include('layouts.admin.head')
        @yield('css')
    </head>
    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('layouts.admin.topbar')
            @include('layouts.admin.sidebar')
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @include('layouts.admin.page-title')
                        @yield('content')
                    </div> 
                </div>
                @include('layouts.admin.footer')
            </div>
        </div>
        @include('layouts.admin.right-sidebar')
        @include('layouts.admin.scripts')
        @yield('script')

    </body>
</html>
