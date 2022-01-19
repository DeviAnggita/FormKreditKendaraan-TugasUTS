<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'ci4');

$keyword = $_GET['keyword'];

?>


<table id="tabels" border="1">
    <tr>
        <th>ID</th>
        <th>Nama Motor</th>
        <th>Harga</th>
        <th>Tahun</th>
        <th>Jumlah Beli</th>
        <th>Total Beli</th>
    </tr>
    <?php $kueri = mysqli_query($koneksi, "SELECT * FROM motor WHERE nama_motor LIKE '%$keyword%'");
    while ($d = mysqli_fetch_array($kueri)) {
        $total = $d['harga'] * $_GET['key']; ?>
        <tr>
            <td><?= $d['id_motor']; ?></td>
            <td><?= $d['nama_motor']; ?></td>
            <td id="harga"><?= number_format($d['harga']); ?></td>
            <td><?= $d['tahun']; ?></td>
            <td><?= $_GET['key']; ?></td>
            <td><?= $total ?></td>
        </tr>


    <?php }
    ?>

</table>

<script>
    var tabel = window.parent.document.getElementById('tabels'),
        sumVal = 0
    var tempe = window.parent.document.getElementById('jumelah')
    semua.addEventListener('click', function() {
        for (var i = 1; i < tabel.rows.length; i++) {
            sumVal += parseInt(tabel.rows[i].cells[5].innerHTML)
        }
        // console.log(tabel.rows.length)
        tempe.innerHTML = sumVal
    })
</script>