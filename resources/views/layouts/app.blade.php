<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        
        <!-- Styles -->
        <style>
        .i-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 56.25%;
        }

        .responsive-video {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100vh;
            border: none;
        }

        @media only screen 
            and (min-width: 1024px) 
            and (max-height: 1366px) 
            and (-webkit-min-device-pixel-ratio: 2) {
                .proshow {
                    display: block !important;
                }
                .prohide {
                    display: none !important;
                }
            }

            /* Portrait */
            @media only screen 
            and (min-width: 1024px) 
            and (max-height: 1366px) 
            and (orientation: portrait) 
            and (-webkit-min-device-pixel-ratio: 2) {
                .pro-h-screen {
                    height: 100vh !important;
                }
                .proshow-p {
                    display: block !important;
                }
                .prohide-p {
                    display: none !important;
                }
                .prop-py-32 {
                    padding-top: 8rem !important;
                    padding-bottom: 8rem !important;
                }
                .prop-py-64 {
                    padding-top: 16rem !important;
                    padding-bottom: 16rem !important;
                }
                .prop-pt-96 {
                    padding-top: 24rem;
                }
                .prop-py-96 {
                    padding-top: 24rem !important;
                    padding-bottom: 24rem !important;
                }
                .prop-my-96 {
                    margin-top: 24rem !important;
                    margin-bottom: 24rem !important;
                }
                .prop-mt-96 {
                    margin-top: 24rem !important;
                }
            }

            /* Landscape */
            @media only screen 
            and (min-width: 1024px) 
            and (max-height: 1366px) 
            and (orientation: landscape) 
            and (-webkit-min-device-pixel-ratio: 2) {
                .proshow-l {
                    display: block !important;
                }
                .prohide-l {
                    display: none !important;
                }
                .prol-py-32 {
                    padding-top: 8rem !important;
                    padding-bottom: 8rem !important;
                }
                .prol-mt-32 {
                    margin-top: 8rem;
                }
            }
        </style>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen mx-auto bg-cover bg-gradient-to-r from-gray-300 via-blue-700 to-indigo-900" style="background-image: url({{asset('bg.png')}})">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            function toggleElement(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("block");
            }

            // document.addEventListener('contextmenu', function(e) {
            //     e.preventDefault();
            // });
        </script>
    </body>
</html>
