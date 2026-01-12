<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @yield('styles')
</head>

<body>
    @yield('content')


    {{-- Scripts --}}
    @include('includes.scripts')
    @yield('scripts')
</body>
</html>