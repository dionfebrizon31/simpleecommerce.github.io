<?php
include "../layout/header.php";
include "../layout/navbar.php";
include "../koneksi.php";

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
                        <h5>Form Tambah Armada</h5>
                        <hr>
                        <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="text">Nama Armada</label>
                                        <input type="text" class="form-control" name="nama_armada"
                                            placeholder="Masukan Nama Armada">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Harga </label>
                                        <input type="text" class="form-control" name="harga"
                                            placeholder="Masukan Harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Deskripsi </label>
                                        <input type="text" class="form-control" name="deskripsi"
                                            placeholder="Masukan Deskripsi">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </div>
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="foto">Gambar</label>
                                        <input type="file" class="form-control" name="foto" name="foto"
                                            placeholder="Upload Gambar">
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
<?php
include "../layout/footer.php";

?>