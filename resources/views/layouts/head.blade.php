<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Simple Kasir') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/print.min.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/4fd0239997.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" ></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="height: 70px;">
            <div class="container">

                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    <img src="/foto/logo.png" width="40px;">
                    Alan Resto
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
        </nav>

        @yield('content')

    </div>
</body>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#bleh').removeAttr('hidden');
                $('#bleh').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('input[type="file"]').change(function(event) {
            var namaFile = event.target.files[0].name;
            $('.na').text('You Selected : '+namaFile);
            readURL(this);
        });
    });
</script>

<script type="text/javascript">
    function ribu() {
        var bilangan = document.getElementById('harga').value;
        if (bilangan != 0 && bilangan != null) {
            var reverse = bilangan.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
        
            document.getElementById('aa').innerHTML = 'Rp. '+ribuan;
        }else{
            document.getElementById('aa').innerHTML = 'Rp. 0';
        }
        
    }
</script>

</html>
