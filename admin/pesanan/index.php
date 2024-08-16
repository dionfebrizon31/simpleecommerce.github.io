<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a></li>
                            <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModaltambah" data-whatever="@getbootstrap">Tambah Data</button>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Nomor Tujuan</th>
                                        <th>Alamat Tujuan</th>
                                        <th>Bukti Bayar</th>
                                        <th>Detail Pesanan</th>
                                        <th>Status Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $user = mysqli_query($koneksi, "SELECT * FROM `pesanan`
                                    JOIN user ON user.id_user = pesanan.id_user
                                    ORDER BY id_pesanan DESC");

                                    while ($item = mysqli_fetch_array($user)): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['nama_lengkap'] ?></td>
                                            <td><?= $item['tgl_pesanan'] ?></td>
                                            <td><?= $item['no_tujuan'] ?></td>
                                            <td><?= get_first_5_words($item['alamat_tujuan']) ?></td>
                                            <td><img src="../admin/assets/images/user/buktipembayaran/<?= $item['bukti_bayar'] ?>"
                                                    height="50px" width="100px" alt="Bukti Bayar"></td>
                                            <td><a href="?page=pesanan/dpesanan&data=<?= $item['id_pesanan']; ?>"
                                                    class="btn btn-primary">Detail</a></td>
                                            <td>
                                                <form class="update-status-form" data-id="<?= $item['id_pesanan']; ?>">
                                                    <input type="hidden" name="id_userpesan"
                                                        value="<?= $item['id_user'] ?>">
                                                    <input type="hidden" name="id_pesanan"
                                                        value="<?= $item['id_pesanan'] ?>">
                                                    <div class="form-group" style="width: 120px;">
                                                        <select name="status_pesanan" class="form-control status_pesanan">
                                                            <option value="">Pilih Kategori</option>
                                                            <option value="pending" <?= $item['status_pesanan'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                                            <option value="dikirim" <?= $item['status_pesanan'] == 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
                                                            <option value="ditolak" <?= $item['status_pesanan'] == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                                            <option value="diterima" <?= $item['status_pesanan'] == 'diterima' ? 'selected' : '' ?>>Diterima</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle the change event for status_pesanan select elements
        $("select[name=status_pesanan]").on("change", function () {
            var form = $(this).closest('form');
            var idPesanan = form.data('id');
            var idUserPesan = form.find("input[name=id_userpesan]").val();
            var newStatus = $(this).val();

            if (newStatus) { // Make sure a status is selected
                $.ajax({
                    type: 'POST',
                    url: 'pesanan/updatepesan.php',
                    data: {
                        id_pesanan: idPesanan,
                        id_userpesan: idUserPesan,
                        status_pesanan: newStatus
                    },
                    success: function (response) {
                        var res = JSON.parse(response);
                        alert(res.message);
                        if (res.status === 'success') {
                            // Additional actions if needed on success
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Terjadi kesalahan: " + error);
                        alert("Terjadi kesalahan: " + error);
                    }
                });
            } else {
                alert('Silakan pilih status terlebih dahulu');
            }
        });
    });
</script>