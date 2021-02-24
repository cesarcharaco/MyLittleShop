<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>My Little Shop | @yield('title')</title>
    @include('layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <main class="py-12">
                @yield('content')
            </main>
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.scripts')
</body>
</html>
