<?php include("header.php") ?>

<?php require 'functions.php';

$rows = query("SELECT * FROM tb_kredit");

?>

<h1>Data Kredit Nasabah</h1>
<p>
    <a href="/UTS/index.php">
        <input type="button" class="btn btn-primary" value="Tambah Data Baru" />
    </a>
</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">No</th>
            <th class="align-middle">Harga Mobil</th>
            <th class="align-middle">Uang Muka(%)</th>
            <th class="align-middle">Uang Muka(,-)</th>
            <th class="align-middle">Lama Angsuran(tahun)</th>
            <th class="align-middle">Bunga (%)</th>
            <th class="align-middle">Angsuran (bulan)</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo rupiah($row["harga_mobil"]) ?></td>
                <td><?php echo persen($row["uang_muka"]) ?></td>
                <td><?php echo rupiah(uang_muka($row['harga_mobil'],$row['uang_muka'])) ?></td>
                <td><?php echo $row["angsuran"] ?></td>
                <td><?php echo persen($row["bunga"]) ?></td>
                <td><?php echo rupiah (angsuran($row['harga_mobil'],$row['uang_muka'],$row['angsuran'],$row['bunga'])) ?></td>
                <td>
                    <a href="ubah.php?id=<?php echo $row["id"] ?>">
                        <span class="badge bg-danger">Edit</span>
                    </a>

                    <a href="hapus.php?id=<?php echo $row["id"] ?>" onclick="return confirm ('Apakah anda yakin akan menghapus data?')">
                        <span class="badge bg-warning text-dark">Delete</span>
                    </a>
                <td>
                </td>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include("footer.php") ?>