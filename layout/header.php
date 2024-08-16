<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GearUp-Next-Level Gear, Every Game</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- raja ongkir  -->
    <!-- <link rel="stylesheet" href="assets/raja/css/bootstrap.min.css"> -->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a
                            href="https://maps.app.goo.gl/Hpc6iTpU6VWeMPeF9" class="text-white">Jl. Dr. Sutomo No.151 B,
                            Kubu Marapalam</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">dion.febrizon24@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="?page=home/index" class="navbar-brand">
                    <h1 class="text-primary display-6">GearUp</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="?page=home/index" class="nav-item nav-link active">Home</a>
                        <a href="?page=shop/index" class="nav-item nav-link">Shop</a>

                        <a href="?page=home/contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex m-3 me-0">

                        <a href="?page=shop/keranjang" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <?php
                            if (isset($_SESSION['id_user'])): {
                                    $search = mysqli_query($koneksi, "SELECT COUNT(id_keranjang) AS jumlah FROM keranjang where id_user = '$_SESSION[id_user]'");
                                    $row = mysqli_fetch_assoc($search);
                                }
                                ?>
                                <span
                                    class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                    style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?= $row['jumlah'] ?></span><?php endif; ?>
                        </a>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <a href="#" class="my-auto">
                                    <i class="fas fa-user fa-2x"></i>
                                </a>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="main-menu-header">
                                    <center>
                                        <?php
                                        if (isset($_SESSION['id_user'])):
                                            ?>
                                            <img class="img-radius"
                                                src="admin/assets/images/user/user/<?= $_SESSION['foto']; ?>" width="50px"
                                                alt="User-Profile-Image">
                                        </center>
                                        <div class="user-details">
                                            <span><?= $_SESSION['nama_lengkap']; ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>


                                <?php
                                if (isset($_SESSION['id_user'])):
                                    ?>
                                    <li><a class="dropdown-item" href="?page=shop/mpesanan">Pesanan</a></li>
                                    <li><a class="dropdown-item" href="logout.php">log out</a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="admin/login/index.php">login</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->