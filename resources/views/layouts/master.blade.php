{{-- Ini sama Kaya layouts.app --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet">

</head>
<body>

    @yield('content')
    
<script src="/js/jquery-3.5.1.slim.min.js"></script>
    {{-- <script src="/js/popper.min.js"></script> --}}
    <script src="/js/bootstrap.min.js"></script>
    <script src="{{ asset('select2/select2.min.js') }}"></script>
    <script>
        $(".selectHobi").select2({
            placeholder: "Pilih Hobi Anda"
        });
    </script>
</body>
</html>