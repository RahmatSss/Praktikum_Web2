<div id="top" class="row mb-3">
    <div class="col">
        <h3>Ubah Data Karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawan" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";
        
        if (isset($_POST['simpan_button'])) {
            $nik = $_POST["nik"];
            $nama = $_POST['nama'];
            $tanggal_mulai = $_POST['tanggal_mulai'];
            $gaji_pokok = $_POST['gaji_pokok'];
            $status_karyawan = $_POST['status_karyawan'];
            $bagian_id = $_POST['bagian_id'];

            $updateSQL = "UPDATE karyawan SET
                nama='$nama',
                tanggal_mulai='$tanggal_mulai',
                gaji_pokok='$gaji_pokok',
                status_karyawan='$status_karyawan',
                bagian_id='$bagian_id'
                WHERE nik='$nik'";
           
            $result = mysqli_query($connection, $updateSQL);
            if ($result) {
        ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fab fa-exclamation-circle"></i>
                        <?php echo mysqli_error($connection) ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fab fa-check-circle"></i>
                        Ubah data berhasil disimpan
                    </div>
        <?php
                
            }
        }

        $nik = $_GET['nik'];
        $selectSQL = "SELECT * FROM karyawan WHERE nik = $nik";
        $result = mysqli_query($connection, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo '<meta http-equiv="refresh" content="0;url=?page=karyawan">';
        }
        $row = mysqli_fetch_assoc($result);
        $tetap_checked = $row["status_karyawan"] == "TETAP" ? checked : "";
        $kontrak_checked = $row["status_karyawan"] == "KONTRAK" ? checked : "";
        $magang_checked = $row["status_karyawan"] == "MAGANG" ? checked : "";
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
              <div class="mb-3 mt-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="misal : 0001" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="misal : Fulan" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tanggal_mulai" class="form-label">tanggal_mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>