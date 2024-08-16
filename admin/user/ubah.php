<?php


$iddata = $_GET['data'];
$search = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `id_user` = '$iddata'");
$data = mysqli_fetch_array($search);

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
                            <h5 class="m-b-10">Form Elements</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Elements</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Form Ubah Data User</h5>
                        <hr>
                        <form action="?page=user/proses_ubah" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
                                        <label for="username">username</label>
                                        <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>"
                                            placeholder=" Masukan username">

                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" value="<?= $data['password']; ?>"
                                            placeholder="Masukan Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap" value="<?= $data['nama_lengkap']; ?>"
                                            placeholder="Masukan Nama Lengkap">
                                    </div>
                                    <button type="submit" class="btn  btn-primary" name="ubahdata">Submit</button>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="text">Level</label>
                                        <select name="level" id="" class="form-control">
                                            <option value="">Pilih level User</option>
                                            <option value="admin" <?= $data['level'] == 'admin'?'selected':''?>>Admin </option>
                                            <option value="member" <?= $data['level'] == 'member'?'selected':''?>>Member</option>
                                        </select>


                                    </div>
                               
                                    <div class="form-group">
                                    <label for="foto">Gambar</label><br>
                                        <img src="assets/images/user/user/<?= $data['foto'] ?>" height="100px" alt=""
                                        srcset="">
                                        <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">
                                        <input type="file" class="form-control" name="foto" name="foto"
                                            placeholder="Upload Foto" value="<?= $data['foto']; ?>">
                                    </div>


                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
<!-- [ Main Content ] end -->
