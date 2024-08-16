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
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-3">Billing details</h1>
        <form action="shop/procheck.php" method="post" enctype="multipart/form-data">
            <div class="row g-6">

                <div class="col-md-5 col-lg-5 col-xl-5">
                    <input type="hidden" id="alamatsaya" name="alamatsaya">
                    <input type="hidden" name="total_berat" value="1200">
                    <input type="hidden" id="alamatku" name="alamatku">
                    <!-- <label class="form-check-label" for="Shipping-1">alamat detail</label> -->
                    <input type="hidden" id="alamatkudetail" name="alamatkudetail">
                    <div class="form-item">

                        <label class="form-label my-3">Nomor Tujuan<sup>*</sup></label>
                        <input type="text" name="nomortujuan" class="form-control">
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Address <sup>*</sup></label>
                        <textarea name="alamattujuan" class="form-control"
                            placeholder="House Number Street Name"></textarea>
                    </div>
                    <div class="form-item">
                        <!-- <> -->
                        <label class="form-label my-3">Province <sup>*</sup></label>
                        <select name="nama_provinsi" id="nama_provinsi" class="form-control" id="">
                        </select>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Kota/Kabupaten <sup>*</sup></label>
                        <select name="nama_kota" id="nama_kota" class="form-control" id="">
                        </select>

                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Ekspedisi <sup>*</sup></label>
                        <select name="nama_ekspedisi" id="nama_ekspedisi" class=" form-control" id="">

                        </select>
                        <!-- <input type="text" name="alamattujuan" class="form-control"
                            placeholder="House Number Street Name"> -->
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Paket <sup>*</sup></label>
                        <select name="nama_paket" id="nama_paket" class="form-control" id="">
                            <option value="">Pilih Paket</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Upload Bukti pembayaran<sup>*</sup></label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                            Order</button>
                    </div>


                </div>

                <div class="col-md-7 col-lg-7 col-xl-7">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-2">Products</th>
                                    <th scope="col" class="px-2">Name</th>
                                    <th scope="col" class="px-5">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" class="px-5">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalbayar = 0;
                                $iduser = $_SESSION['id_user'];
                                $search = mysqli_query($koneksi, "SELECT * FROM keranjang join produk on keranjang.id_produk=produk.id_produk where id_user=$iduser");
                                while ($k = mysqli_fetch_array($search)):
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="admin/assets/images/user/produk/<?= $k['gambar_produk'] ?>"
                                                    class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                    alt="">
                                            </div>
                                        </th>
                                        <td class="py-5 md-5"><?= $k['nama_produk']; ?></td>
                                        <td class="py-5 md-5">Rp. <?= number_format($k['harga']) ?></td>
                                        <td class="py-5 md-5 align-items-center"><?= $k['kuantitas'] ?></td>
                                        <td class="py-5 md-5">Rp. <?= number_format($k['harga'] * $k['kuantitas']) ?></td>
                                    </tr>
                                    <?php
                                    $totalbayar += $k['harga'] * $k['kuantitas'];

                                endwhile;
                                ?>

                                <tr>
                                    <th scope="row">

                                    </th>
                                    <td>
                                    <td>
                                        <p class="mb-0 text-dark text-uppercase py-1">Sub Total</p>
                                    <td>
                                    <td class="py-3">
                                        <p id="subtotal" name="subtotal">Rp. <?= number_format($totalbayar) ?></p>

                                    </td>
                                    </td>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td>
                                    <td>
                                        <p class="mb-0 text-dark py-2">Ongkir</p>
                                    <td>
                                    <td class="py-2">
                                        <input type="text" name="ongkir" disabled>
                                    </td>
                                    </td>
                                    </td>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-3"></td>
                                    <td class="py-3">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-3"></td>
                                    <td class="py-3">
                                        <div class="py-3 border-bottom border-top">
                                            <!-- <p class="mb-0 text-dark" id="totalbayarsaya">Rp </p> -->
                                            <input type="hidden" id="totalbayarsayaold" value="<?= $totalbayar ?>"
                                                disabled>
                                            <input type="text" id="totalbayarsaya" name="totalbayarsaya" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark" name="totalbayarsaya">Rp <?= $totalbayar ?></p>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>

        </form>
    </div>
</div>
<!-- Checkout Page End -->


<script src="assets/raja/js/jquery.min.js"></script>
<script src="assets/raja/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajax({
            type: 'post',
            url: 'wilayah/data_provinsi.php',
            success: function (hasil_provinsi) {
                $("select[name=nama_provinsi").html(hasil_provinsi);
            }
        });


        $("select[name=nama_provinsi]").on("change", function () {
            //ambil id_provinsi yang dipilih (dari atribut pribadi)
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi")
            $.ajax({
                type: 'post',
                url: 'wilayah/data_kota.php',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function (hasil_kota) {
                    $("select[name=nama_kota]").html(hasil_kota)

                }
            })
        });

        $.ajax({
            type: 'post',
            url: 'wilayah/data_ekspedisi.php',
            success: function (hasil_ekspedisi) {
                $("select[name=nama_ekspedisi").html(hasil_ekspedisi);
            }
        });
        $("select[name=nama_provinsi]").on("change", function () {

            $("input[name=alamatku]").val('');
            $("input[name=alamatkudetail]").val('');
            $("input[name=alamatsaya]").val('');
            $("input[name=ongkir]").val('');
            $("input[name=totalbayarsaya]").val('');
            var selectElement1 = document.getElementById('nama_ekspedisi');
            var selectElement2 = document.getElementById('nama_paket');
            // var selectElement = document.getElementById('nama_ekspedisi');
            selectElement1.value = ''; // Mengatur Provinsi 2 sebagai pilihan terpilih
            selectElement2.value = ''; // Mengatur Provinsi 2 sebagai pilihan terpilih


        });
        // $("select[name=nama_provinsi]").on("change", function () {



        // });
        $("select[name=nama_kota]").on("change", function () {
            $("input[name=ongkir]").val('');
            var selectElement = document.getElementById('nama_ekspedisi');
            selectElement.value = ''; // Mengatur Provinsi 2 sebagai pilihan terpilih
            console.log(selectElement);

        });


        $("select[name=nama_ekspedisi").on("change", function () {
            //mendapatkan data ongkos kirim

            //mendapatkan ekspedisi yang dipilih
            var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();

            //mendapatkan id_kota yang dipilih pengguna
            var kota_terpilih = $("option:selected", "select[name=nama_kota]").attr("id_kota")

            //mendapatkan total berat dari inputan
            var total_berat = $("input[name=total_berat]").val();

            $.ajax({
                type: 'post',
                url: 'wilayah/data_paket.php',
                data: 'ekspedisi=' + ekspedisi_terpilih + '&kota=' + kota_terpilih + '&berat=' + total_berat,
                success: function (hasil_paket) {
                    $("select[name=nama_paket]").html(hasil_paket);
                    cosole.log(ekspedisi_terpilih);

                    //letakkan nama ekspedisi terpilih di input ekspedisi
                    // $("input[name=ekspedisi").val(ekspedisi_terpilih);
                    var alamat1 = document.getElementById("alamatku").value;
                    var alamatfull = document.getElementById("alamatsaya");
                    var fullAddress = alamat1;
                    alamatfull.value = fullAddress;

                }
            })
        });

        $("select[name=nama_kota]").on("change", function () {
            var prov = $("option:selected", this).attr("nama_provinsi");
            var kot = $("option:selected", this).attr("nama_kota");
            var tipe = $("option:selected", this).attr("tipe_kota");
            var kode_pos = $("option:selected", this).attr("kode_pos");
            var alamatku = tipe + ' ' + kot + ' ' + 'Provinsi' + ' ' + prov + ' Kode Pos ' + kode_pos;
            // var alamatku = 'provinsi' + ' ' + prov + '; ' + tipe + ' ' + kot + '; ' + kode_pos

            $("input[name=alamatku]").val(alamatku);
            // $("input[name=provinsi]").val(prov);
            // $("input[name=kota]").val(kot);
            // $("input[name=tipe]").val(tipe);
            // $("input[name=kode_pos]").val(kode_pos);
        });

        // $("select[name=nama_paket]").on("change", function () {
        //     var paket = $("option:selected", this).attr("paket");
        //     var ongkir = $("option:selected", this).attr("ongkir");
        //     var etd = $("option:selected", this).attr("etd");



        //     var alamatull = paket + '; ' + ongkir + '; ' + etd;
        //     // var alamatull = alamatku + '; ' + paket + '; ' + ongkir + '; ' + etd;

        //     $("input[name=alamatkudetail]").val(alamatull);
        //     // $("input[name=paket]").val(paket);
        //     // $("input[name=ongkir]").val(ongkir);
        //     $("input[name=ongkir]").val(ongkir);
        //     // $("input[name=estimasi]").val(etd);
        // });
        $("select[name=nama_paket]").on("change", function () {
            function formatNumber(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            var paket = $("option:selected", this).attr("paket");
            var ongkir = $("option:selected", this).attr("ongkir");
            var etd = $("option:selected", this).attr("etd");



            var alamatull = paket + '; ' + ongkir + '; ' + etd;
            // var alamatull = alamatku + '; ' + paket + '; ' + ongkir + '; ' + etd;

            $("input[name=alamatkudetail]").val(alamatull);
            // $("input[name=paket]").val(paket);
            // $("input[name=ongkir]").val(ongkir);
            $("input[name=ongkir]").val("Rp. " + formatNumber(ongkir));
            // $("input[name=estimasi]").val(etd);


            //============area atas untuk inset ke detail sedang dibawah untuk gabungkan..
            var alamat1 = document.getElementById("alamatku").value;
            var alamat2 = document.getElementById("alamatkudetail").value;
            var alamatfull = document.getElementById("alamatsaya");
            var ekspedisi = $("select[name=nama_ekspedisi]").val();


            var fullAddress = alamat1 + ' ' + ekspedisi + ' ' + alamat2 + ' ' + 'Hari';
            alamatfull.value = fullAddress;

            ////==============================================
            var totalbayarsayaold = parseFloat(document.getElementById('totalbayarsayaold').value);
            var ongkirdua = parseFloat($("option:selected", this).attr("ongkir")); // 

            // var totalbayarsayaold = document.getElementById('totalbayarsayaold');
            var totkurongkir = totalbayarsayaold + ongkirdua;
            $("input[name=totalbayarsaya]").val("Rp. " + formatNumber(totkurongkir));
            console.log(totkurongkir);


        });
    });
</script>