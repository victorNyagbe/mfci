<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/aos.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/Admin/app-bar.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/summernote/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    @yield('css')
    <title>Mission For Christ Intl</title>
</head>
<body>
    @yield('content')

    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/lang/summernote-fr-FR.js') }}"></script>
    <script src="{{ asset('assets/summernote/lang/summernote-fr-FR.js.map') }}"></script>

    @if ($message = Session::get("guest:success"))
        <div class="guest-alert-success">
            <h1>{{ $message }}</h1>
        </div>
    @endif

    <a href="https://wa.me/12403300849" class="contact-whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @yield('js')
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/aos.min.js') }}"></script>
    <script>
        AOS.init();
        $(document).ready(function() {
            $('.menu-toggle').click(function () {
                $('.side-bar').fadeToggle()
            })

            window.addEventListener("scroll", function () {
                const menuBar = document.querySelector('.menu-bar');

                if (menuBar !== null) {
                    const scrollY = window.scrollY;

                    const scrollThreshold = 100;

                    if (scrollY > scrollThreshold) {
                        menuBar.classList.add('fixed-top');
                    } else {
                        menuBar.classList.remove('fixed-top');
                    }
                }
            });
        })
    </script>
</body>
</html>
