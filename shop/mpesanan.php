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
    <h1 class="text-center text-white display-6">Pesanan</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item text"><a href="#">Home</a></li>

        <li class="breadcrumb-item active text-white">Pesanan</li>
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
                        <th scope="col">ID Pesanan </th>

                        <th scope="col">Tanggal Pesanan</th>
                        <th scope="col">No Tujuan</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Ongkir</th>

                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status Pesanan</th>
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
                    }
                    $search = mysqli_query($koneksi, "SELECT * FROM pesanan where id_user = '$iduser'  order by id_pesanan desc");
                    while ($i = mysqli_fetch_array($search)):
                        ?>
                        <tr>

                            <td>
                                <p class="mb-0 mt-4"><?= $i['id_pesanan'] ?></p>
                            </td>

                            <td>
                                <p class="mb-0 mt-4"><?= $i['tgl_pesanan'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?= $i['no_tujuan'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4 "><?= $i['alamat_tujuan'] ?></p>
                            </td>
                            <td>
                                <?php


                                // Split string berdasarkan karakter ';'
                                $parts = explode(';', $i['alamat_tujuan']);
                                $nilai = trim($parts[1]);
                                ?>
                                <p class="mb-0 mt-4 pd-2" style="width:150px">Rp. <?= number_format($nilai) ?></p>

                            </td>

                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="admin/assets/images/user/buktipembayaran/<?= $i['bukti_bayar'] ?>"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>

                                <p class="mb-0 mt-4"></p><a href="?page=shop/dpesanan&data=<?= $i['id_pesanan']; ?>"
                                    class="btn btn-primary">Detail</a></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?= $i['status_pesanan'] ?></p>
                            </td>




                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<!-- Cart Page End -->