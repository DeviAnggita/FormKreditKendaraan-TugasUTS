<?php include("header.php") ?>

<?php require 'functions.php';

//ambil data di URL
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

//querry data tb_kredit berdasarkan id
$rows = query("SELECT * FROM tb_kredit WHERE id= $id")[0];


//cek apakah tombol submit sudah ditekan atau belum 
if (isset($_POST["submit"])) {
    //cek apakah data berhasi; diubah atau belum
    if (Edit($_POST) > 0) {
        echo "
        <script>
            alert('Data BERHASIL diubah');
            document.location.href = 'halaman.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data GAGAL diubah');
            document.location.href = 'halaman.php';
        </script>";
    }
}

?>
    <h1>Halaman Admin Ubah Data</h1>
 
    <div class="mb-3 row">
        <a href="halaman.php">
            << Kembali ke halaman admin</a>
    </div>

    <h2 class="text-center">Simulasi Kredit Mobil</h2>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Id -->
        <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?php echo $rows["id"] ?>">
        </div>
    
        <!-- Harga Mobil -->
        <div class="form-group">
            <label for="HargaMobil">Harga Mobil</label>

            <input name="HargaMobil" class="form-control" required type="text" placeholder="Minimal 100000000" min="100000000" 
            value="<?= $rows["harga_mobil"]; ?>">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $HargaMobilErr != "") : ?>
                <small class="text-danger">
                    <?php echo $HargaMobilErr; ?>
                </small>
            <?php endif; ?>
        </div>
        </br>

        <!-- Uang Muka -->
        <div class="form-group">
            <label for="UangMuka">Uang Muka</label>
            <input class="form-control" name="UangMuka" required type="text" placeholder="Min 30% dan Max 100% " min="30" max="100" 
            value="<?= $rows["uang_muka"]; ?>">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $UangMukaErr != "") : ?>
                <small class="text-danger">
                    <?php echo $UangMukaErr; ?>
                </small>
            <?php endif; ?>
        </div>
        </br>

        <!-- Lama Angsuran tahun-->
        <div class="form-group">
            <label for="Angsuran">Lama Angsuran (tahun) </label>
            <select class="custom-select" name="Angsuran" required>
                <option <?php echo $rows["angsuran"] == '1' ? "selected" : "" ?>>1</option>
                <option <?php echo $rows["angsuran"] == '2' ? "selected" : "" ?>>2</option>
                <option <?php echo $rows["angsuran"] == '3' ? "selected" : "" ?>>3</option>
                <option <?php echo $rows["angsuran"] == '4' ? "selected" : "" ?>>4</option>
                <option <?php echo $rows["angsuran"] == '5' ? "selected" : "" ?>>5</option>
            </select>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $AngsuranErr != "") : ?>
                <small class="text-danger">
                    <?php echo $AngsuranErr; ?>
                </small>
            <?php endif; ?>
        </div>
        </br>

        <!-- Bunga %-->
        <div class="form-group">
            <label for="Bunga">Bunga (%) </label>
            <select class="custom-select" name="Bunga" required>
                <option <?php echo $rows["bunga"] == '5' ? "selected" : "" ?>>5</option>
                <option <?php echo $rows["bunga"] == '6' ? "selected" : "" ?>>6</option>
                <option <?php echo $rows["bunga"] == '7' ? "selected" : "" ?>>7</option>
                <option <?php echo $rows["bunga"] == '8' ? "selected" : "" ?>>8</option>
                <option <?php echo $rows["bunga"] == '9' ? "selected" : "" ?>>9</option>
                <option <?php echo $rows["bunga"] == '10' ? "selected" : "" ?>>10</option>
            </select>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $BungaErr != "") : ?>
                <small class="text-danger">
                    <?php echo $AngsuranErr; ?>
                </small>
            <?php endif; ?>
        </div>
        </br>
        </br>
        
        <div class="mb-3row"></div>
        <div class="cpl-sm-2"></div>
        <div class="cpl-sm-10">
            <button class="btn btn-primary" type="reset" name="reset" href="ubah.php">Reset</button>
            <button class="btn btn-success" type="submit" name="submit" href="halaman.php">Submit</button>
        </div>
    </br>
    </br>
    <?php include("footer.php") ?>