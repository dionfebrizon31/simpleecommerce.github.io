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
                        <a href="?page=produk/tambah" class="btn btn-primary rounded-circle">Tambah Data</a>
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" -->
                        <!-- data-target="#exampleModaltambah" data-whatever="@getbootstrap">Tambah Data</button> -->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Nama Kategori</th>
                                        <th>nama_produk</th>
                                        <th>deskripsi</th>
                                        <th>harga</th>
                                        <th>Foto</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $no = 1;
                                    $user = mysqli_query($koneksi, "SELECT * FROM `produk`join kategori on produk.id_kategori=kategori.id_kategori order by id_produk desc");

                                    while ($item = mysqli_fetch_array($user)):
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>

                                            <td><?= $item['nama_kategori'] ?></td>
                                            <td><?= $item['nama_produk'] ?></td>
                                            <td><?= get_first_5_words($item["deskripsi"]) ?></td>
                                            <td>Rp.<?= number_format($item['harga']) ?></td>
                                            <td><img src="assets/images/user/produk/<?= $item['gambar_produk'] ?>"
                                                    height="100px" alt="" srcset=""></td>
                                            <td> <a href="?page=produk/ubah&data=<?= $item['id_produk']; ?>"
                                                    class="btn btn-primary">Ubah</a>
                                                <a onclick="return confirm('yakin hapus data ?')"
                                                    href="produk/hapus.php?data=<?= $item['id_produk']; ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    endwhile; ?>


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


<!-- [ Main Content ] end -->