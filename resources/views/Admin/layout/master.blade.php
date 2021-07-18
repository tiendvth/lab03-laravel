<!doctype html>
<html class="fixed">
<head>
    @include('.Admin.layout.head')
</head>
<body>
<section class="body">
    @include('Admin.layout.master-header')
    <div class="inner-wrapper">
        @include('Admin.layout.sidebar')
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>@yield('header_page')</h2>
            </header>
            @yield('main')
        </section>
    </div>
</section>
@include('.Admin.layout.script')
</body>
</html>
