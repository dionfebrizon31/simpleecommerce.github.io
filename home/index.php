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


<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-black">100% Original Produck</h4>
                <h1 class="mb-5 display-3 text-primary"> Original Product</h1>
                <div class="position-relative mx-auto">
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="admin/assets/images/user/produk/Laptop-ASUS-terbaik-Zenbook-Pro-14-Duo-OLED.jpg"
                                class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Asus</a>
                        </div>
                        <?php
                        $categoris = mysqli_query($koneksi, "SELECT * FROM produk join kategori on produk.id_kategori=kategori.id_kategori");
                        while ($sk = mysqli_fetch_array($categoris)):
                            ?>

                            <div class="carousel-item rounded">
                                <img src="admin/assets/images/user/produk/<?= $sk['gambar_produk'] ?>"
                                    class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded"><?= $sk['nama_kategori'] ?></a>
                            </div>
                            <?php
                        endwhile;
                        ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Featurs Section Start -->
<!-- <div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Free Shipping</h5>
                        <p class="mb-0">Free on order over $300</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Security Payment</h5>
                        <p class="mb-0">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>30 Day Return</h5>
                        <p class="mb-0">30 day money guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>24/7 Support</h5>
                        <p class="mb-0">Support every time fast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Featurs Section End -->


<!-- Fruits Shop Start--><!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Products</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-0">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>
                        <?php
                        $categori = mysqli_query($koneksi, "SELECT * FROM kategori ");
                        while ($k = mysqli_fetch_array($categori)):
                            ?>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill"
                                    href="#tab-<?= $k['id_kategori'] ?>">
                                    <span class="text-dark" style="width: 130px;"><?= $k['nama_kategori'] ?></span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-0" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                <?php
                                // Per page limit
                                $limit = 4;

                                // Get current page number
                                if (isset($_GET['page_no_all']) && $_GET['page_no_all'] != "") {
                                    $page_no_all = $_GET['page_no_all'];
                                } else {
                                    $page_no_all = 1;
                                }

                                // Calculate offset value
                                $offset_all = ($page_no_all - 1) * $limit;

                                // Total records query
                                $result_count_all = mysqli_query($koneksi, "SELECT COUNT(*) AS total_records FROM produk");
                                $total_records_all = mysqli_fetch_array($result_count_all);
                                $total_records_all = $total_records_all['total_records'];

                                // Get total pages
                                $total_no_of_pages_all = ceil($total_records_all / $limit);

                                // Pagination query
                                $allprod = mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori LIMIT $offset_all, $limit");

                                while ($all = mysqli_fetch_array($allprod)):
                                    ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="admin/assets/images/user/produk/<?= $all['gambar_produk'] ?>"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;"><?= $all['nama_kategori'] ?></div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4><?= $all['nama_produk'] ?></h4>
                                                <p><?= frist_panjang(20, $all['deskripsi']) ?></p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">
                                                        Rp<?= number_format($all['harga']) ?></p>
                                                    <a href="?page=shop/detail_produk&idproduk=<?= $all['id_produk']; ?>"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="pagination d-flex justify-content-center mt-5">
                        <?php if ($page_no_all > 1): ?>
                            <a href="?page=home/index&page_no_all=<?= $page_no_all - 1 ?>" class="rounded">&laquo;</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_no_of_pages_all; $i++): ?>
                            <?php if ($i == $page_no_all): ?>
                                <a href="?page=home/index&page_no_all=<?= $i ?>" class="active rounded"><?= $i ?></a>
                            <?php else: ?>
                                <a href="?page=home/index&page_no_all=<?= $i ?>" class="rounded"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($page_no_all < $total_no_of_pages_all): ?>
                            <a href="?page=home/index&page_no_all=<?= $page_no_all + 1 ?>" class="rounded">&raquo;</a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                $categories = mysqli_query($koneksi, "SELECT * FROM kategori");
                while ($category = mysqli_fetch_array($categories)):
                    $cat_id = $category['id_kategori'];
                    if (mysqli_num_rows($categories) > 0):
                        ?>
                        <div id="tab-<?= $cat_id ?>" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php
                                        // Get current page number for each category
                                        if (isset($_GET['page_no_' . $cat_id]) && $_GET['page_no_' . $cat_id] != "") {
                                            $page_no_cat = $_GET['page_no_' . $cat_id];
                                        } else {
                                            $page_no_cat = 1;
                                        }

                                        // Calculate offset value for each category
                                        $offset_cat = ($page_no_cat - 1) * $limit;

                                        // Total records query for each category
                                        $result_count_cat = mysqli_query($koneksi, "SELECT COUNT(*) AS total_records FROM produk WHERE id_kategori = $cat_id");
                                        $total_records_cat = mysqli_fetch_array($result_count_cat);
                                        $total_records_cat = $total_records_cat['total_records'];

                                        // Get total pages for each category
                                        $total_no_of_pages_cat = ceil($total_records_cat / $limit);

                                        // Pagination query for each category
                                        $manggil = mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE kategori.id_kategori = $cat_id LIMIT $offset_cat, $limit");

                                        while ($a = mysqli_fetch_array($manggil)):
                                            ?>
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="admin/assets/images/user/produk/<?= $a['gambar_produk'] ?>"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                        style="top: 10px; left: 10px;"><?= $a['nama_kategori'] ?></div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4><?= $a['nama_produk'] ?></h4>
                                                        <p><?= get_first_50_words($a['deskripsi']) ?></p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                                Rp<?= number_format($a['harga']) ?></p>
                                                            <a href="?page=shop/detail_pesanan&idproduk=<?= $a['id_produk'] ?>"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary">
                                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination d-flex justify-content-center mt-5">
                                <?php if ($page_no_cat > 1): ?>
                                    <a href="?page=home/index&page_no_<?= $cat_id ?>=<?= $page_no_cat - 1 ?>"
                                        class="rounded">&laquo;</a>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_no_of_pages_cat; $i++): ?>
                                    <?php if ($i == $page_no_cat): ?>
                                        <a href="?page=home/index&page_no_<?= $cat_id ?>=<?= $i ?>" class="active rounded"><?= $i ?></a>
                                    <?php else: ?>
                                        <a href="?page=home/index&page_no_<?= $cat_id ?>=<?= $i ?>" class="rounded"><?= $i ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($page_no_cat < $total_no_of_pages_cat): ?>
                                    <a href="?page=home/index&page_no_<?= $cat_id ?>=<?= $page_no_cat + 1 ?>"
                                        class="rounded">&raquo;</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>

        </div>
    </div>
</div>
<!-- Fruits Shop End-->

<!-- Fruits Shop End-->


<!-- Featurs Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <h1 class="mb-0">Promo Produks</h1>
            <?php
            $search = mysqli_query($koneksi, "SELECT *, SUM(kuantitas) AS total_kuantitas
                                        FROM detail_pesanan
                                        JOIN produk ON detail_pesanan.id_produk = produk.id_produk
                                        GROUP BY produk.id_produk
                                        ORDER BY total_kuantitas ASC
                                        LIMIT 1");
            $k = mysqli_fetch_array($search);
            $oldharga = $k['harga'];
            $newharga = $k['harga'] - ($k['harga'] * 0.2);
            $idmurah = $k['id_produk'];
            $namamurah = $k['nama_produk'];
            $detailmurah = $k['deskripsi'];
            $gambarmurah = $k['gambar_produk'];

            $toppromo = mysqli_query($koneksi, "SELECT *, SUM(kuantitas) AS total_kuantitas
                                        FROM detail_pesanan
                                        JOIN produk ON detail_pesanan.id_produk = produk.id_produk
                                        GROUP BY produk.id_produk
                                        ORDER BY total_kuantitas ASC
                                        LIMIT 0,2");
            while ($top = mysqli_fetch_array($toppromo)):
                $hargapromo = $top['harga'] - ($top['harga'] * 0.2);
                ?>



                <div class="col-md-6 col-lg-4">
                    <a href="?page=shop/detail_produk_promo&idproduk=<?= $top['id_produk'] ?>&s=1">
                        <div class="service-item bg-primary rounded border border-primary">
                            <div class="position-relative">
                                <img src="admin/assets/images/user/produk/<?= $top['gambar_produk'] ?>"
                                    class="img-fluid w-100 rounded-top" alt="">
                                <div class="d-flex align-items-center justify-content-center bg-white position-absolute"
                                    style="width: 160px; height: 160px; top: 0; left: 0; border-bottom-right-radius: 50%;20px">
                                    <!-- <h1 style="font-size: 100px;">1</h1> -->
                                    <div class="d-flex flex-column">
                                        <span class="h4 mb-0"
                                            style=" text-decoration: line-through;">Rp<?= number_format($top['harga']) ?>
                                        </span>
                                        <span class="h5 mb-0">Rp<?= number_format($hargapromo) ?></span>
                                        <!-- <span class="h4 text-muted mb-0">kg</span> -->
                                    </div>
                                </div>
                            </div>



                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
            <!-- <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-dark rounded border border-dark">
                        <img src="assets/img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Tasty Fruits</h5>
                                <h3 class="mb-0">Free delivery</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-primary rounded border border-primary">
                        <img src="assets/img/featur-3.jpg" class="img-fluid rounded-top w-100" alt="">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-secondary text-center p-4 rounded">
                                <h5 class="text-white">Exotic Vegitable</h5>
                                <h3 class="mb-0">Discount 30$</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</div>
<!-- Featurs End -->


<!-- Vesitable Shop Start-->
<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Top Populer Produk</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php
            $pop = mysqli_query($koneksi, "SELECT *, SUM(kuantitas) AS total_kuantitas
FROM detail_pesanan
JOIN produk ON detail_pesanan.id_produk = produk.id_produk
JOIN kategori ON produk.id_kategori = kategori.id_kategori
GROUP BY produk.id_produk,kategori.id_kategori
ORDER BY total_kuantitas ASC
LIMIT 0,3;");
            while ($populer = mysqli_fetch_array($pop)):
                ?>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="admin/assets/images/user/produk/<?= $populer['gambar_produk'] ?>"
                            class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
                        <?= $populer['nama_kategori'] ?>
                    </div>
                    <div class="p-4 rounded-bottom">
                        <h4><?= $populer['nama_produk'] ?></h4>
                        <p><?= frist_panjang(20, $populer['deskripsi']) ?></p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp. <?= number_format($populer['harga']) ?></p>
                            <a href="?page=shop/detail_produk&idproduk=<?= $populer['id_produk'] ?>"
                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<!-- Vesitable Shop End -->


<!-- Banner Section Start-->
<div class="container-fluid banner bg-primary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h5 class="display-3 text-white"><?= $namamurah ?></h5>
                    <!-- <p class="fw-normal display-3 text-dark mb-4">in Our Store</p> -->
                    <h5 class="mb-4 text-white"><?= frist_panjang(20, $detailmurah) ?>.....</h5>
                    <a href="?page=shop/detail_produk_promo&idproduk=<?= $k['id_produk'] ?>"
                        class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="admin/assets/images/user/produk/<?= $gambarmurah ?>" class="img-fluid w-100 rounded"
                        alt="">
                    <div class="d-flex align-items-center justify-content-center bg-white position-absolute"
                        style="width: 220px; height: 220px; top: 0; left: 0; border-bottom-right-radius: 50%;20px">
                        <!-- <h1 style="font-size: 100px;">1</h1> -->
                        <div class="d-flex flex-column">
                            <span class="h2 mb-0" style=" text-decoration: line-through;">Rp
                                <?= number_format($oldharga) ?></span>
                            <span class="h2 mb-0">Rp <?= number_format($newharga) ?></span>
                            <!-- <span class="h4 text-muted mb-0">kg</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->