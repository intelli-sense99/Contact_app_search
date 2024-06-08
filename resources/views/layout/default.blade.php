<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.header')
    <div style="min-height:600px; max-height:900px">
        @yield('content')
    </div>


    @include('partials.footer')
    @include('partials.footer-script')
</body>

</html>
