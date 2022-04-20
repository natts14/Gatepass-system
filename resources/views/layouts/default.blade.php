<!doctype html>
<html>

<head>
    @include('includes.head')
</head>
<body onload="startTime()">

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    </div>
</body>

</html>