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
                            data-target="#exampleModaltambah" data-whatever="@getbootstrap">Tambah Data</button> -->
                        <a href="?page=kategori/tambah" class="btn btn-primary rounded-pill">Tambah Data</a>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Nama Kategori</th>

                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $no = 1;
                                    $user = mysqli_query($koneksi, "SELECT * FROM `kategori` order by id_kategori desc");

                                    while ($item = mysqli_fetch_array($user)):

                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['nama_kategori'] ?></td>

                                            <td> <a href="?page=kategori/ubah&data=<?= $item['id_kategori']; ?>"
                                                    class="btn btn-primary">Ubah</a>
                                                <a onclick="return confirm('yakin hapus data ?')"
                                                    href="kategori/hapus.php?data=<?= $item['id_kategori']; ?>"
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




<!-- Modal -->

<!-- end modal tambah -->
<!-- [ Main Content ] end -->