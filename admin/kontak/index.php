<?php
include "../layout/header.php";
include "../layout/navbar.php";

?>
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
                        <!-- <a href="tambah.php" class="btn btn-primary rounded-circle">Tambah Data</a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModaltambah" data-whatever="@getbootstrap">Tambah Data</button>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>judul</th>
                                        <th>isi</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include "../koneksi.php";
                                    $no = 1;
                                    $user = mysqli_query($koneksi, "SELECT * FROM `kontak` order by id_kontak desc");

                                    while ($item = mysqli_fetch_array($user)):

                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['judul'] ?></td>
                                            <td><?= $item['isi'] ?></td>


                                            <td> <a href="ubah.php?data=<?= $item['id_kontak']; ?>"
                                                    class="btn btn-primary">Ubah</a>
                                                <a onclick="return confirm('yakin hapus data ?')"
                                                    href="hapus.php?data=<?= $item['id_kontak']; ?>"
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
<div class="modal fade" id="exampleModaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kontak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!-- [ form-element ] start -->
                    <div class="col-sm-12">
                        <div class="card-body">
                            <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="judul"> Judul</label>
                                            <input type="text" class="form-control" name="judul"
                                                placeholder="Masukan judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Isi</label>
                                            <input type="text" class="form-control" name="isi"
                                                placeholder="Masukan  isi">
                                        </div>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- [ form-element ] end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>

        </div>
    </div>
</div>
<!-- end modal tambah -->
<!-- [ Main Content ] end -->
<?php
include "../layout/footer.php";

?>