<?php

$iddata = $_GET['data'];
$search = mysqli_query($koneksi, "SELECT * FROM `produk` WHERE `id_produk` = '$iddata'");
$dataproduk = mysqli_fetch_array($search);




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
                    <h5>Form Ubah Wisata</h5>
    
                    </div>
                    <div class="card-body">
                       
                        <form action="?page=produk/proses_ubah" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">



                                        <select name="idkategoribox" class="form-control">
                                            <option value="">Pilih Kategori</option>
                                            <?php
                                            $hasil = mysqli_query($koneksi, "SELECT * FROM kategori");

                                            while ($data = mysqli_fetch_array($hasil)):
                                                ?>

                                                <option value="<?= $data['id_kategori'];?>"<?= $dataproduk['id_kategori'] ==  $data['id_kategori']? 'selected':'' ?>>
                                                    
                                                    <?= $data['nama_kategori']; ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>



                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <input type="hidden" name="id_produk" value="<?= $dataproduk['id_produk']; ?>">
                                        <label for="text">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" value="<?= $dataproduk['nama_produk']; ?>"
                                            placeholder="Masukan Destinasi Wisata">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="text">Harga </label>
                                        <input type="text" class="form-control" name="Harga" value="<?= $dataproduk['harga']; ?>"
                                            placeholder="Masukan email">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">gambar</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="hidden" name="foto_lama" value="<?= $dataproduk['gambar_produk']; ?>">
                                    <img src="assets/images/user/produk/<?= $dataproduk['gambar_produk'] ?>" height="100px"
                                    alt="" srcset="">
                                        <input type="file" class="form-control" name="foto" name="foto"
                                            placeholder="Masukan email">
                                    </div>
                                    <button type="submit" name="ubahwisata" class="btn  btn-primary">Submit</button>
                                </div>
                                <div class="col-md-6">


                                    
                                    <div class="form-group">
                                        <label for="text">deskripsi </label>
                                        <textarea class="form-control" id="editor" name="deskripsi"
                                                rows="3"></textarea>
                                        <!-- <input type="text" class="form-control" name="deskripsi" value="<?= $dataproduk['deskripsi']; ?>"
                                            placeholder="Masukan email"> -->
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
<script>
    ClassicEditor
    .create(document.querySelector('#editor'))
            .then(editor => {
                // Memasukkan nilai dari PHP (misalnya dari database) ke dalam CKEditor
                editor.setData(`<?= $dataproduk['deskripsi']; ?>`);
            })
            .catch(error => {
                console.error('Ada masalah saat inisialisasi editor:', error);
            });
</script>
<!-- [ Main Content ] end -->
<!-- [ Main Content ] end -->
