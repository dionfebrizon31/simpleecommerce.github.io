<?php
include "../layout/header.php";
include "../layout/navbar.php";
include "../koneksi.php";
$iddata = $_GET['data'];
$search = mysqli_query($koneksi, "SELECT * FROM `ARMADA` WHERE `id_armada` = '$iddata'");
$dataarmada =mysqli_fetch_array($search);

?>

<!-- [ Main Content ] start -->
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
                    <div class="card-header">
                    <h5>Form Ubah Armada</h5>
                    </div>
                    <div class="card-body">

                        <form action="proses_ubah.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">


                                    <div class="form-group">
                                        
                                    <input type="hidden" name="id_armada" value="<?= $dataarmada['id_armada']; ?>">
                                        <label for="text">nama_armada</label>
                                        <input type="text" class="form-control" name="nama_armada" value="<?= $dataarmada['nama_armada']; ?>"
                                            placeholder="Masukan nama_armada">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">harga </label>
                                        <input type="text" class="form-control" name="harga" value="<?= $dataarmada['harga']; ?>"
                                            placeholder="Masukan harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">deskripsi </label>
                                        <input type="text" class="form-control" name="deskripsi" value="<?= $dataarmada['deskripsi']; ?>"
                                            placeholder="Masukan deskripsi">
                                    </div>
                                    <button type="submit" name="ubaharmada" class="btn  btn-primary">Submit</button>
                                </div>
                                <div class="col-md-6">


                                <div class="form-group">
                                        <label for="foto">gambar</label>

                                    </div>
                                    <div class="form-group">
                                    <input type="hidden" name="foto_lama" value="<?= $dataarmada['gambar']; ?>">
                                    <img src="../assets/images/user/armada/<?= $dataarmada['gambar'] ?>" height="100px"
                                    alt="" srcset="">
                                        <input type="file" class="form-control" name="foto" name="foto"
                                            placeholder="Masukan email">
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
<!-- [ Main Content ] end -->
<?php
include "../layout/footer.php";

?>