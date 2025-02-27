<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.head')
</head>


<body >
<!-- Loader -->

<!-- /Loader -->
<div class="container-fluid page-body-wrapper">

    @include('admin.layouts.main-header')
    @include('admin.layouts.main-sidebar')

{{--@include('admin.layouts.fineupload')--}}
<!-- container -->

    <div class="main-panel  w-auto mt-lg-5 mt-md-5 mt-sm-4" style="width: 100% !important;">
        <div class="content-wrapper">

@yield('page-header')
@yield('content')

        @include('admin.layouts.footer')
        </div>
    </div>




@include('admin.layouts.footer-scripts')
@yield('js')
</div>
</body>
</html>
