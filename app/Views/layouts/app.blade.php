<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Dashboard | Veltrix - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ base_url() }}assets/images/favicon.ico">

    <link href="{{ base_url() }}assets/libs/chartist/chartist.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ base_url() }}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ base_url() }}assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ base_url() }}assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ base_url() }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ base_url() }}assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ base_url() }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    @yield('style')
    <style>
        .btn-primary {
            -webkit-box-shadow: 0 2px 6px 0 rgba(81, 86, 190, .5);
            box-shadow: 0 2px 6px 0 rgba(81, 86, 190, .5);
        }

        .btn-secondary {
            -webkit-box-shadow: 0 2px 6px 0 rgba(116, 120, 141, .5);
            box-shadow: 0 2px 6px 0 rgba(116, 120, 141, .5);
        }

        .btn-success {
            -webkit-box-shadow: 0 2px 6px 0 rgba(42, 181, 125, .5);
            box-shadow: 0 2px 6px 0 rgba(42, 181, 125, .5);
        }

        .btn-info {
            -webkit-box-shadow: 0 2px 6px 0 rgba(75, 166, 239, .5);
            box-shadow: 0 2px 6px 0 rgba(75, 166, 239, .5);
        }

        .btn-warning {
            -webkit-box-shadow: 0 2px 6px 0 rgba(255, 191, 83, .5);
            box-shadow: 0 2px 6px 0 rgba(255, 191, 83, .5);
        }

        .btn-danger {
            -webkit-box-shadow: 0 2px 6px 0 rgba(253, 98, 94, .5);
            box-shadow: 0 2px 6px 0 rgba(253, 98, 94, .5);
        }

        .btn-dark {
            -webkit-box-shadow: 0 2px 6px 0 rgba(44, 48, 46, .5);
            box-shadow: 0 2px 6px 0 rgba(44, 48, 46, .5);
        }

        .btn-light {
            -webkit-box-shadow: 0 2px 6px 0 rgba(233, 233, 239, .5);
            box-shadow: 0 2px 6px 0 rgba(233, 233, 239, .5);
        }
    </style>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ base_url() }}assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ base_url() }}assets/images/logo-dark.png" alt=""
                                    height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ base_url() }}assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ base_url() }}assets/images/logo-light.png" alt=""
                                    height="18">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">
                    <!-- App Search-->

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-info rounded-circle font-size-16">
                                                    <i class="mdi mdi-glass-cocktail"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It is a long-established fact that a reader will</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-danger rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ base_url() }}assets/images/users/user-4.jpg" alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ base_url('logout') }}"><i
                                    class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        @include('inc.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    @yield('modal')
    @stack('modal')


{{--    @if ($systemMessage)--}}
{{--        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">--}}
{{--            <div id="liveToast" class="toast align-items-center text-white bg-primary border-0" role="alert"--}}
{{--                aria-live="assertive" aria-atomic="true" data-bs-animation="true" data-bs-autohide="true">--}}
{{--                <div class="toast-header">--}}
{{--                    <strong class="me-auto">YourApps</strong>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="toast-body">--}}
{{--                    {{ $systemMessage['text'] }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @else--}}
{{--        {{ null }}--}}
{{--    @endif--}}

    <!-- JAVASCRIPT -->
    <script src="{{ base_url() }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ base_url() }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ base_url() }}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ base_url() }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ base_url() }}assets/libs/node-waves/waves.min.js"></script>


    <!-- Required datatable js -->
    <script src="{{ base_url() }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ base_url() }}assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ base_url() }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ base_url() }}assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ base_url() }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ base_url() }}assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Plugin Js-->
    {{-- <script src="{{ base_url() }}assets/libs/chartist/chartist.min.js"></script> --}}
    {{-- <script src="{{ base_url() }}assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script> --}}

    <script src="{{ base_url() }}assets/js/pages/dashboard.init.js"></script>

    <script src="{{ base_url() }}assets/js/app.js"></script>

    <script src="{{ base_url() }}assets/vendor/loadingoverlay.min.js"></script>
    <script src="{{ base_url('assets/vendor/twine.min.js') }}"></script>
    <script src="{{ base_url() }}assets/vendor/axios.min.js"></script>
    <script src="{{ base_url() }}assets/js/script.js"></script>

    <script>
        axios.defaults.baseURL = axiosWithLoader.defaults.baseURL = "{{ base_url() }}";
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
        let context = {};
        $(function() {
            Twine.reset(context).bind().refresh()
        });
    </script>
    @yield('script')
    @stack('script')
</body>

</html>
