<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Portal YourApps</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ base_url() }}assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ base_url() }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ base_url() }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ base_url() }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body >
<div class="account-pages my-5 pt-sm-5" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <img src="{{ base_url() }}assets/logo.png" alt="" class="img-fluid pt-2" style="height: 100px;margin: 0 auto">
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="p-3 text-center">
                                    <h5>Welcome Back !</h5>
                                    <p>Sign in to YourApp</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="p-2">
                            <?= form_open( base_url('login/auth'),['method'=>'post','data-parsley-validate'=>'','id'=>'form-horizontal','class'=>'needs-validation form-horizontal']) ?>

                            <div class="mb-3">
                                <label for="username" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="username" placeholder="Enter E-mail" required="required">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password"  required="required">
                            </div>


                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                            </div>


                            <?= form_close() ?>

                            <div class="mt-4">
                                <?php if ($validation): ?>
                                <ul class="list-unstyled">
                                        <?php foreach ($validation as $error) : ?>
                                    <li class="text-danger"><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                                <?php endif ?>
                            </div>

                        </div>

                        <div class="mt-5 text-center">

                            <div class="text-dark">
                                <p>© <script>document.write(new Date().getFullYear())</script> YourApp

                                </p>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- end account-pages -->

<!-- JAVASCRIPT -->
<script src="{{ base_url() }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ base_url() }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ base_url() }}assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ base_url() }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ base_url() }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ base_url() }}assets/vendor/parsley.min.js"></script>
<!-- App js -->
<script src="{{ base_url() }}assets/js/app.js"></script>


<script>
    let formHorizontal= $("#form-horizontal");
    formHorizontal.on('blur','input',function (e){
        let placeholder = $(this).attr('data-placeholder');
        $(this).attr('placeholder',placeholder);
    })

    formHorizontal.on('focus','input',function (e){
        $(this).attr('data-placeholder',$(this).attr('placeholder'));
        $(this).attr('placeholder','');
    })

    formHorizontal.parsley({
        errorClass: 'is-invalid',
        successClass: 'is-valid',
        errorsWrapper: '<ul class="parsley-errors-list list-unstyled mb-1"></ul>',
        errorTemplate: '<li class="parsley-error text-danger font-size-10"></li>'
    });
</script>

</body>
</html>
