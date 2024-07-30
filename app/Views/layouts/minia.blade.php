<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> @yield('title','LastClues') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="LastClues" name="author">
    <?= csrf_meta() ?>
            <!-- App favicon -->
    <link rel="shortcut icon" href="{{ base_url() }}assets/panel/favicon.ico" />

    <link href="{{ base_url() }}assets/panel/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{ base_url() }}assets/panel/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/panel/libs/sweetalert2/sweetalert2.min.css">
    <link href="{{ base_url() }}assets/panel/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Css -->
    <link href="{{ base_url() }}assets/panel/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ base_url() }}assets/panel/css/icons.min.css" rel="stylesheet" type="text/css">

    <link href="{{base_url()}}assets/panel/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ base_url()  }}assets/vendor/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ base_url() }}assets/panel/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <link href="{{ base_url()  }}assets/vendor/uikit/css/uikit.css" rel="stylesheet" type="text/css" />
    <script src="{{ base_url()  }}assets/vendor/uikit/js/uikit.min.js" ></script>


    @yield('style')
    <style>
        body{ background: #f8f9fa;}
        body[data-topbar=dark] .navbar-brand-box{
            background-color: #11141e;
            border-color: unset;
        }
        body[data-topbar=dark] #page-topbar {
            background-color: #11141e;
        }
        body[data-sidebar=dark] .vertical-menu {
            background: #11141e;
        }

    </style>
</head>

<body >

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                        <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                        <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>


            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="icon-lg"></i>
                        <span class="badge bg-danger rounded-pill">5</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">James Lemire</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">It will seem like simplified English.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your order is placed</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your item is shipped</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Salena Layfield</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item topbar-light bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span class="d-none d-xl-inline-block ms-1 fw-medium">Shawn L.</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    @include('inc.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © <script>document.write(new Date().getFullYear())</script>  <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> </span>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

@yield('modal')
@stack('modal')


@if($systemMessage)
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="true"  data-bs-autohide="true">
            <div class="toast-header">
                <strong class="me-auto">{{ $title }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $systemMessage['text'] }}
            </div>
        </div>
    </div>
@endif

<!-- JAVASCRIPT -->
<script src="{{ base_url() }}assets/panel/libs/jquery/jquery.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/simplebar/simplebar.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/node-waves/waves.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/feather-icons/feather.min.js"></script>

<script src="{{ base_url() }}assets/panel/libs/parsleyjs/parsley.min.js" ></script>
<script src="{{ base_url() }}assets/vendor/loadingoverlay.min.js" ></script>
<script  src="{{ base_url() }}assets/vendor/twine.min.js"></script>
<script  src="{{ base_url() }}assets/vendor/collect.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/sweetalert2/sweetalert2.min.js" ></script>
<script src="{{ base_url() }}assets/vendor/axios.min.js"></script>


<script src="{{ base_url() }}assets/panel/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ base_url() }}assets/panel/libs/select2/js/select2.min.js"></script>


<script src="{{ base_url() }}assets/panel/js/app.js"></script>
<script src="{{ base_url()  }}assets/vendor/script.js" ></script>
<script type="text/javascript">
    axios.defaults.baseURL = axiosWithLoader.defaults.baseURL= "{{ admin_url() }}";
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

    let context = {}; $(function() {Twine.reset(context).bind().refresh();});
    let myToast = new bootstrap.Toast(document.getElementById('liveToast'));
    @if($systemMessage)
    myToast.show();
    @endif
</script>
@yield('script')
@stack('script')
</body>
</html>