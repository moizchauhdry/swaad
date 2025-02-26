<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Swaad Foods Gmbh</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <!-- MY CUSTOMS -->
    <link rel="stylesheet" href="{{asset('public/frontend/custom/custom.css')}}">
    <link href="{{asset('public/frontend/plugins/fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('public/frontend/images/favicon.png')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="{{asset('public/frontend/custom/responsive.css?v=1.0')}}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{asset('public/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('public/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

    <style>
        .hidden {
            display: none;
        }

        img.rounded.w-100.h-100 {
            cursor: pointer;
        }
    </style>

    @yield('styles')

</head>

<body class="goto-here">

    @include('frontend.includes.header')

    @yield('slider')
    @yield('content')

    @include('frontend.includes.footer')

    <div class="modal fade" id="imagePopupModal" tabindex="-1" aria-labelledby="imagePopupModal" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-transparent">
            <div class="modal-content bg-transparent">
                <div class="bg-transparent">
                    <div class="bg-transparent text-center">
                        <img src="" alt="" id="popup_image" class="w-100 rounded" style="cursor: pointer">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=" {{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/aos.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('public/frontend/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{asset('public/frontend/js/google-map.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    @if(Session::has('ERROR'))
    <script>
        sweetAlert("Oops...", '{{  Session::get('ERROR') }}', "error")
    </script>
    @endif

    @if(Session::has('WARNING'))
    <script>
        sweetAlert("Oops...", '{{  Session::get('WARNING') }}', "warning")
    </script>
    @endif

    @if(Session::has('SUCCESS'))
    <script>
        sweetAlert("{{session('lan') == 'en' ? 'Success' : 'Erfolg'}}", '{{  Session::get('SUCCESS') }}', "success")
    </script>
    @endif

    <script>
        $("#language").change(function (e) {
            e.preventDefault();
            var lan = $("#language").val();
            $( "#changeLanguageForm" ).submit();
        });

        $('body').on('click','img',function(){
            $('#imagePopupModal').modal('show');
            $('#popup_image').attr('src', $(this).attr('src'));
        })
    </script>

    <!-- DataTables -->
    <script src="{{asset('public/dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}">
    </script>
    <script src="{{asset('public/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}">
    </script>

    @yield('scripts')

</body>

</html>
