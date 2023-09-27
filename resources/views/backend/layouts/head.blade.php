<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> @yield('title') | InBegusarai</title>
<meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
<meta name="description" content="laravel, laravel-boilerplate">
<meta name="author" content="Yuvmedia">
<meta name="msapplication-tap-highlight" content="no">
<meta name="robots" content="index, follow">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
<!-- Favicons -->
<link rel="shortcut icon" href="{{asset('/assets/images/begusarai-logo-favicon.png')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('/assets/frontend-assets/libs/bootstrap/css/bootstrap.min.css')}}" />


<link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

<!-- Override CSS file - add your own CSS rules -->
<link rel="stylesheet" href="{{ asset('/assets/css/custom_admin_style.css') }}">


<!-- jQuery 3.4.1 -->
<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
    var CSRF_TOKEN = "{{ csrf_token() }}";
</script>


{{-- <script src="{{ asset('/frontend-assets/js/bootstrap.min.js') }}"></script> 

<link rel="stylesheet" href="frontend-assets/css/bootstrap.min.css">  --}}



<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" type="text/css"
    href="{{ asset('/assets/frontend-assets/libs/line-awesome/css/line-awesome.min.css') }}" />