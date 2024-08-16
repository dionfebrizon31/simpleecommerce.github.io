<?php
// include "../layout/header.php";
// include "../layout/navbar.php";
include "../koneksi.php";

$iddata = $_GET['data'];
$search = mysqli_query($koneksi, "SELECT * FROM `kategori` WHERE `id_kategori` = '$iddata'");
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
                    <div class="card-header">
                    <h5>Form Ubah kategori</h5>
                  
                    </div>
                    <div class="card-body">
                       
                        <form action="kategori/proses_ubah.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id_kategori" value="<?= $data['id_kategori']; ?>">
                                        <label for="namakategori">Nama Kategori</label>
                                        <input type="text" class="form-control" name="namakategori" value="<?= $data['nama_kategori']; ?>"
                                            placeholder=" Masukan Nama Kategori">

                                    </div>
                                
                                    <button type="submit" class="btn  btn-primary" name="ubahdata">Submit</button>
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
<?php
include "../layout/footer.php";

?>