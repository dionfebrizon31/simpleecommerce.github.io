<?php
$idproduk = $_GET['idproduk'];
$search = mysqli_query($koneksi, "SELECT * FROM produk join kategori on produk.id_kategori=kategori.id_kategori WHERE id_produk=$idproduk");
$pd = mysqli_fetch_array($search);
$stat = $_GET['s'];

?>

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop Detail</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Shop Detail</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="admin/assets/images/user/produk/<?= $pd['gambar_produk'] ?>"
                                    class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3"><?= $pd['nama_produk'] ?></h4>
                        <p class="mb-3">Category: <?= $pd['nama_kategori'] ?></p>
                        <?php
                        if ($stat == '1'):
                            $newharga = $pd['harga'] - ($pd['harga'] * 0.2);
                            ?>
                            <input type="hidden" name="status" value="1">
                            <h5 class="fw-bold mb-3">Rp <?= number_format($newharga) ?> </h5>
                            <input type="hidden" name="id_produk" value="0">
                        <?php else: ?>
                            <h5 class="fw-bold mb-3">Rp <?= number_format($pd['harga']) ?> </h5>
                        <?php endif; ?>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="mb-4"><?= frist_panjang(20, $pd["deskripsi"]) ?>.....</p>

                        <form action="shop/proses_addcart.php" method="post">
                            <input type="hidden" name="id_produk" value=<?= $pd['id_produk'] ?>>
                            <div class="input-group quantity-ku mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button type="button"
                                        class="btn btn-sm btn-minussaya rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="kuantitas"
                                    class="form-control form-control-sm text-center border-0" value="1">
                                <div class="input-group-btn">
                                    <button type="button"
                                        class="btn btn-sm btn-plussaya rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>


                            </div>
                            <button type="submit"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>

                        </form>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p><?= $pd['deskripsi'] ?> </p>


                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition
                                            injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                                    tempor sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                    labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <div class="input-group w-100 mx-auto d-flex mb-4">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                        <div class="mb-4">
                            <h4>Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <?php
                                // $sql = "SELECT id_kategori, COUNT(*) as jumlah FROM produk GROUP BY id_kategori;";
                                
                                // $searckan = mysqli_query($koneksi, $sql);
                                // $countcat = mysqli_fetch_array($searckan);
                                $categori = mysqli_query($koneksi, "SELECT k.nama_kategori, COUNT(p.id_kategori) as jumlah 
            FROM kategori k 
            LEFT JOIN produk p ON k.id_kategori = p.id_kategori 
            GROUP BY k.id_kategori 
            ORDER BY k.id_kategori");
                                while ($cat = mysqli_fetch_array($categori)):
                                    ?>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i
                                                    class="fas fa-apple-alt me-2"></i><?= $cat['nama_kategori'] ?></a>
                                            <span>(<?= $cat['jumlah'] ?>)</span>
                                        </div>
                                    </li>
                                <?php endwhile; ?>

                            </ul>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <h1 class="fw-bold mb-0">Related products</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php
                $related = mysqli_query($koneksi, "SELECT * FROM produk join kategori on produk.id_kategori=kategori.id_kategori WHERE kategori.id_kategori='$pd[id_kategori]'");
                while ($rl = mysqli_fetch_array($related)):
                    ?>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="admin/assets/images/user/produk/<?= $rl['gambar_produk'] ?>"
                                class="img-fluid w-100 rounded-top bg-light" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">
                            <?= $rl['nama_kategori'] ?>
                        </div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4><?= $rl['nama_produk'] ?></h4>
                            <p><?= frist_panjang(20, $rl['deskripsi']) ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">Rp. <?= number_format($rl['harga']) ?></p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->