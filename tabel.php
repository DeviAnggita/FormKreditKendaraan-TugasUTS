<div class="container">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Motor</th>
            <th>Harga</th>
            <th>Tahun</th>
        </tr>
        <?php
        $koneksi = mysqli_connect('localhost', 'root', '', 'ci4');

        $keyword = $_GET['keyword'];


        $kueri = mysqli_query($koneksi, "SELECT * FROM motor WHERE nama_motor LIKE '%$keyword%' OR id_motor LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR tahun LIKE '%$keyword%'");
        while ($d = mysqli_fetch_array($kueri)) {
        ?>
            <tr>
                <td><?= $d['id_motor']; ?></td>
                <td><?= $d['nama_motor']; ?></td>
                <td><?= $d['harga']; ?></td>
                <td><?= $d['tahun']; ?></td>
            </tr>
        <?php
        } ?>

    </table>
    <br>
</div>