<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a></li>
                            <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModaltambah" data-whatever="@getbootstrap">Tambah Data</button>
                        <a href="tambah.php" class="btn btn-primary rounded-circle">Tambah Data</a> -->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $data = $_GET['data'];

                                    $total = 0;
                                    $no = 1;

                                    $searchongkir = mysqli_query($koneksi, "SELECT * FROM pesanan where id_pesanan = '$data'");
                                    $dataku = mysqli_fetch_array($searchongkir);
                                    $user = mysqli_query($koneksi, "SELECT * FROM `detail_pesanan`
                                    join produk on detail_pesanan.id_produk= produk.id_produk
                                     where id_pesanan = '$data'");

                                    while ($item = mysqli_fetch_array($user)):
                                        $total += $item['total_harga'];
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>

                                            <td><img src="assets/images/user/produk/<?= $item['gambar_produk'] ?>"
                                                    height="100px" alt="" srcset=""></td>
                                            <td><?= $item['nama_produk'] ?></td>
                                            <td><?= $item['kuantitas'] ?></td>
                                            <td>Rp. <?= number_format($item['harga']) ?></td>
                                            <td>Rp. <?= number_format($item['total_harga']) ?></td>
                                        </tr>
                                        <?php
                                    endwhile; ?>
                                    <tr>
                                        <td>
                                        <td>
                                        <td>
                                        <td>
                                        <td>
                                            <p>Sub Total</p>
                                        <td>Rp. <?= number_format($total) ?>
                                        </td>
                                        </td>
                                        </td>
                                        </td>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <td>
                                        <td>
                                        <td>
                                        <td>
                                            <?php

                                            // Split string berdasarkan karakter ';'
                                            $parts = explode(';', $dataku['alamat_tujuan']);
                                            $nilai = trim($parts[1]);
                                            ?>
                                            <p>ongkir</p>
                                        <td>
                                            <p>Rp.
                                                <?= number_format($nilai) ?>
                                            </p>
                                        </td>
                                        </td>

                                        </td>
                                        </td>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <td>
                                        <td>
                                        <td>
                                        <td>
                                            <?php

                                            $settotal = $nilai + $total;
                                            ?>
                                            <p>Total</p>
                                        <td>
                                            <p>Rp.
                                                <?= number_format($settotal) ?>
                                            </p>
                                        </td>
                                        </td>

                                        </td>
                                        </td>
                                        </td>
                                        </td>
                                    </tr>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->

        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>