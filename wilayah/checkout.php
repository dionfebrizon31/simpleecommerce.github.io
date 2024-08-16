<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../assets/raja/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3>Data Belanjaan</h3>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Sub Harga</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <h3>Alamat</h3>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="nama_provinsi" class="form-control" id="">

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Kota / Kabupaten</label>
                        <select name="nama_kota" class="form-control" id="">

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="nama_ekspedisi" class="form-control" id="">

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="nama_paket" class="form-control" id="">
                            <option value="">Pilih Paket</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="text" name="total_berat" value="1200">
            <input type="text" name="provinsi">
            <input type="text" name="kota">
            <input type="text" name="tipe">
            <input type="text" name="kode_pos">
            <input type="text" name="ekspedisi">
            <input type="text" name="paket">
            <input type="text" name="ongkir">
            <input type="text" name="estimasi">
        </form>
    </div>

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

                        //letakkan nama ekspedisi terpilih di input ekspedisi
                        $("input[name=ekspedisi").val(ekspedisi_terpilih);
                    }
                })
            });

            $("select[name=nama_kota]").on("change", function () {
                var prov = $("option:selected", this).attr("nama_provinsi");
                var kot = $("option:selected", this).attr("nama_kota");
                var tipe = $("option:selected", this).attr("tipe_kota");
                var kode_pos = $("option:selected", this).attr("kode_pos");

                $("input[name=provinsi]").val(prov);
                $("input[name=kota]").val(kot);
                $("input[name=tipe]").val(tipe);
                $("input[name=kode_pos]").val(kode_pos);
            });

            $("select[name=nama_paket]").on("change", function () {
                var paket = $("option:selected", this).attr("paket");
                var ongkir = $("option:selected", this).attr("ongkir");
                var etd = $("option:selected", this).attr("etd");
                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=estimasi]").val(etd);
            });
        });
    </script>
</body>

</html>