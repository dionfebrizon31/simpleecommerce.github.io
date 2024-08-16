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
    <h1 class="text-center text-white display-12">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-4">
        <li class="breadcrumb-item"><a href="?page=home/index">Home</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">

        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label for="fruits">Default Sorting:</label>
                            <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                form="fruitform">
                                <option value="volvo">Nothing</option>
                                <option value="saab">Popularity</option>
                                <option value="opel">Organic</option>
                                <option value="audi">Fantastic</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-10">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <?php
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
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            <?php
                            // Database connection
                            
                            // Per page limit
                            $limit = 6;

                            // Get current page number
                            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                $page_no = $_GET['page_no'];
                            } else {
                                $page_no = 1;
                            }

                            // Calculate offset value
                            $offset = ($page_no - 1) * $limit;

                            // Total records query
                            $result_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_records FROM produk");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            // Get total pages
                            $total_no_of_pages = ceil($total_records / $limit);

                            // Pagination query
                            $search = mysqli_query($koneksi, "SELECT * FROM produk 
                                          JOIN kategori ON produk.id_kategori = kategori.id_kategori 
                                          ORDER BY id_produk LIMIT $offset, $limit");

                            while ($p = mysqli_fetch_array($search)):
                                ?>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="admin/assets/images/user/produk/<?= $p['gambar_produk'] ?>"
                                                class="img-fluid w-90 rounded-top" alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;"><?= $p['nama_kategori'] ?></div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4><?= $p['nama_produk'] ?></h4>
                                            <p><?= get_first_50_words($p["deskripsi"]) ?>...</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">Rp. <?= number_format($p['harga']) ?>
                                                </p>
                                                <a href="?page=shop/detail_produk&idproduk=<?= $p['id_produk'] ?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <?php if ($page_no > 1): ?>
                                        <a href="?page=shop/index&page_no=<?= $page_no - 1 ?>" class="rounded">&laquo;</a>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $total_no_of_pages; $i++): ?>
                                        <?php if ($i == $page_no): ?>
                                            <a href="?page=shop/index&page_no=<?= $i ?>" class="active rounded"><?= $i ?></a>
                                        <?php else: ?>
                                            <a href="?page=shop/index&page_no=<?= $i ?>" class="rounded"><?= $i ?></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($page_no < $total_no_of_pages): ?>
                                        <a href="?page=shop/index&page_no=<?= $page_no + 1 ?>" class="rounded">&raquo;</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->