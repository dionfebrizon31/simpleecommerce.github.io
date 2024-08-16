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

                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Harga</th>

                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!isset($_SESSION['id_user'])) {
                        echo "<script>
                            alert('Login dulu')
                            window.location.href = '?page=home/index';
                        </script>";
                    } else {

                        $iduser = $_SESSION['id_user'];
                        $pesanan = $_GET['data'];
                    }
                    $total = 0;
                    $search = mysqli_query($koneksi, "SELECT * FROM detail_pesanan join produk on detail_pesanan.id_produk=produk.id_produk where id_pesanan = '$pesanan'");
                    while ($i = mysqli_fetch_array($search)):
                        ?>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="admin/assets/images/user/produk/<?= $i['gambar_produk'] ?>"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4"><?= $i['nama_produk'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?= $i['kuantitas'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp. <?= number_format($i['harga']) ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp.<?= number_format($i['total_harga']) ?></p>
                            </td>


                        </tr>
                        <tr><a href="?page=shop/keranjang" class="position-end me-4 my-auto">
                                <i class="fa fa-home fa-2x"></i></a></tr>
                        <?php
                        $total += $i['total_harga'];
                    endwhile; ?>
                </tbody>
            </table>
            <!-- Cart Page Start -->
            <div class="container-fluid py-5">
                <div class="container py-5">


                    <div class="row g-4 justify-content-end">
                        <div class="col-8"></div>
                        <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                            <div class="bg-light rounded">
                                <div class="p-4">
                                    <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total:
                                            Rp.<?= number_format($total) ?></span>
                                    </h1>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- Cart Page End -->