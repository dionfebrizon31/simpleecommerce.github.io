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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModaltambah" data-whatever="@getbootstrap">Tambah Data</button>
                        <!-- <a href="tambah.php" class="btn btn-primary rounded-circle">Tambah Data</a> -->
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nama_tim</th>
                                        <th>jabatan</th>
                                        <th>Foto</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include "../koneksi.php";
                                    $no = 1;
                                    $user = mysqli_query($koneksi, "SELECT * FROM `tim` order by id_tim desc");

                                    while ($item = mysqli_fetch_array($user)):

                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['nama_tim'] ?></td>
                                            <td><?= $item['jabatan'] ?></td>
                                            <td><img src="../assets/images/user/tim/<?= $item['foto'] ?>" height="100px"
                                                    alt="" srcset=""></td>
                                            <td> <a href="ubah.php?data=<?= $item['id_tim']; ?>"
                                                    class="btn btn-primary">Ubah</a>
                                                <a onclick="return confirm('yakin hapus data ?')"
                                                    href="hapus.php?data=<?= $item['id_tim']; ?>"
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
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tim</h5>
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
                                            <label for="username">Nama Tim</label>
                                            <input type="text" class="form-control" name="nama_tim"
                                                placeholder="Masukan Nama Tim">

                                        </div>

                                        <div class="form-group">
                                            <label for="text">Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan"
                                                placeholder="Masukan jabatan">
                                        </div>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="foto">Gambar</label>
                                            <input type="file" class="form-control" name="foto" name="foto"
                                                placeholder="Masukan email">
                                        </div>


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