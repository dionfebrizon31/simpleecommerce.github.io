<!DOCTYPE html>
<html lang="en">

<head>

    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="../assets/css/style.css">




</head>

<!-- [ auth-signup ] start -->

<div class="auth-wrapper">
    <div class="auth-content text-center">
        <img src="../assets/images/logo.png" alt="" class="img-fluid mb-6">
        <div class="card borderless"
            style=" width:500px; margin:0; position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="f-w-400">Sign up</h4>
                        <form action="proses_register.php" method="post" enctype="multipart/form-data">
                            <hr>

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username" Required>
                            </div>

                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    Required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="nama_lengkap"
                                    Required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="file" class="form-control" name="foto" placeholder="nama_lengkap" Required>
                            </div>
                            <div class="custom-control custom-checkbox  text-left ">

                            </div>
                            <button class="btn btn-primary btn-block mb-4">Sign up</button>
                            <hr>

                        </form>
                        <p class="mb-2">Already have an account? <a href="auth-signin.html" class="f-w-400">Signin</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>

<script src="../assets/js/pcoded.min.js"></script>



</body>

</html>