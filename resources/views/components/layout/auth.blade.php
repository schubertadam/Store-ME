<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/sb_admin_pro/styles.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
</head>
<body class="bg-gradient-primary-to-secondary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container container-xl">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer-admin footer-dark mt-auto">
            @include('components.layout.partials.footer')
        </footer>
    </div>
</div>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/sb_admin_pro/scripts.js') }}"></script>
</body>
</html>
