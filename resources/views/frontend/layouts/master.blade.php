<!DOCTYPE html>
<html>

<head>
    @include('frontend.layouts.head')
</head>

<body>
    {{-- <div class="custom-overlay"></div> --}}
    <div id="wrapper">

        @include('frontend.layouts.header')
        <div class="container-fluid g-0">
            <section>
                @yield('content')
            </section>
            <!-- Footer section -->
            <footer>
                @include('frontend.layouts.footer')
            </footer>
        </div>
    </div>
</body>

</html>
