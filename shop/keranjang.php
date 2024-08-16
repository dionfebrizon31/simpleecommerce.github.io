<?php
if (!isset($_SESSION['id_user'])) {
    echo "<script>
        alert('login dulu dek buat akses ini');
        window.location.href = '?page=home/index'; 
    </script>";

}
if (isset($_POST['deleteproduk'])) {
    $data = $_POST['id_keranjang'];
    $deletedata = mysqli_query($koneksi, "DELETE FROM keranjang WHERE `id_keranjang` = '$data'");

    if ($deletedata) {
        echo "<script>

    window.location.href = '?page=shop/keranjang';
    </script>";
    } else {

        echo "
    <script>
    window.location.href = '?page=shop/keranjang';
    </script>
";
    }
}
if (isset($_POST['update'])) {
    $data = $_POST['id_keranjang'];
    $kuantitas = $_POST['kuantitas'];

    if ($kuantitas < 1) {
        $deletedata = mysqli_query($koneksi, "DELETE FROM keranjang WHERE `id_keranjang` = '$data'");
        if ($deletedata) {
            echo "<script>
        window.location.href = '?page=shop/keranjang';
        </script>";
        } else {

            echo "
        <script>
        window.location.href = '?page=shop/keranjang';
        </script>";
        }
    } else {

        $ubah = mysqli_query($koneksi, "UPDATE `keranjang` SET `kuantitas`='$kuantitas' WHERE `id_keranjang` = $data");

        if ($ubah) {
            echo "<script> 
        
            window.location.href = '?page=shop/keranjang';
            </script>";
        } else {

            echo "
            <script>
            window.location.href = '?page=shop/index';
            </script>
        ";
        }
    }

}
// if (isset($_POST['updatekurang'])) {
//     $data = $_POST['id_keranjang'];
//     $kuantitas = $_POST['kuantitas'];
//     $kuantitas--;
//     if ($kuantitas < 1) {
//         $deletedata = mysqli_query($koneksi, "DELETE FROM keranjang WHERE `id_keranjang` = '$data'");
//         if ($deletedata) {
//             echo "<script>
//         window.location.href = '?page=shop/keranjang';
//         </script>";
//         } else {

//             echo "
//         <script>
//         window.location.href = '?page=shop/keranjang';
//         </script>";
//         }
//     } else {

//         $ubah = mysqli_query($koneksi, "UPDATE `keranjang` SET `kuantitas`='$kuantitas' WHERE `id_keranjang` = $data");

//         if ($ubah) {
//             echo "<script> 

//             window.location.href = '?page=shop/keranjang';
//             </script>";
//         } else {

//             echo "
//             <script>
//             window.location.href = '?page=shop/index';
//             </script>
//         ";
//         }
//     }

// }
// if (isset($_POST['updatetambah'])) {
//     $data = $_POST['id_keranjang'];
//     $kuantitas = $_POST['kuantitas'];
//     $kuantitas++;
//     if ($kuantitas < 1) {
//         $deletedata = mysqli_query($koneksi, "DELETE FROM keranjang WHERE `id_keranjang` = '$data'");

//         if ($deletedata) {
//             echo "<script>
//         window.location.href = '?page=shop/keranjang';
//         </script>";
//         } else {

//             echo "
//         <script>
//         window.location.href = '?page=shop/keranjang';
//         </script>";
//         }


//     } else {

//         $ubah = mysqli_query($koneksi, "UPDATE `keranjang` SET `kuantitas`='$kuantitas' WHERE `id_keranjang` = $data");

//         if ($ubah) {
//             echo "<script> 

//             window.location.href = '?page=shop/keranjang';
//             </script>";
//         } else {

//             echo "
//             <script>
//             window.location.href = '?page=shop/index';
//             </script>
//         ";
//         }
//     }

// }

?>
<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($_SESSION['id_user'])) {
                        $iduser = $_SESSION['id_user'];
                    } else {
                        $iduser = -1;
                    }
                    $totalbayar = 0;
                    $cari = mysqli_query($koneksi, "SELECT * FROM keranjang join produk on keranjang.id_produk=produk.id_produk where id_user = $iduser");
                    while ($i = mysqli_fetch_array($cari)):
                        ?>
                        <form action="" method="post">
                            <input type="hidden" name="id_keranjang" value="<?= $i['id_keranjang'] ?>">
                            <tr>

                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="admin/assets/images/user/produk/<?= $i['gambar_produk'] ?>"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?= $i['nama_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp. <?= number_format($i['harga']) ?></p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button name="update"
                                                class="btn btn-sm btn-minussaya rounded-circle bg-light border">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="kuantitas"
                                            class="form-control form-control-sm text-center border-0"
                                            value="<?= $i['kuantitas'] ?>">
                                        <div class="input-group-btn">
                                            <button name="update"
                                                class="btn btn-sm btn-plussaya rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp. <?= number_format($i['harga'] * $i['kuantitas']) ?> </p>
                                </td>
                                <td>
                                    <button name="deleteproduk" class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>
                        </form>
                        <?php
                        $totalbayar += $i['harga'] * $i['kuantitas'];
                    endwhile; ?>

                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total:</span></h1>

                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">Rp. <?= number_format($totalbayar) ?></p>
                    </div>
                    <a href="?page=shop/checkout"
                        class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                        type="button">Proceed Checkout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->