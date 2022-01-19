<?php

$conn = mysqli_connect('localhost','root','','kredit');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [] ;
    while ($row = mysqli_fetch_assoc($result)){
    $rows[] =$row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $HargaMobil = htmlspecialchars($data["HargaMobil"]);
    $UangMuka = htmlspecialchars ($data["UangMuka"]);
    $Angsuran = htmlspecialchars ($data["Angsuran"]);
    $Bunga = htmlspecialchars ($data["Bunga"]) ;
    
    $query="INSERT INTO tb_kredit (id,harga_mobil, uang_muka, angsuran, bunga) VALUES 
    ('','$HargaMobil','$UangMuka','$Angsuran','$Bunga')";

     
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function Delete($id)
{
    global $conn;
    $query ="DELETE FROM tb_kredit WHERE id=$id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function Edit($data){
    
    global $conn;
    $id = $data["id"];
    $HargaMobil = htmlspecialchars($data["HargaMobil"]);
    $UangMuka = htmlspecialchars ($data["UangMuka"]);
    $Angsuran = htmlspecialchars ($data["Angsuran"]);
    $Bunga = htmlspecialchars ($data["Bunga"]) ;

    $query ="UPDATE tb_kredit SET 
            harga_mobil='$HargaMobil', 
            uang_muka='$UangMuka',
            angsuran='$Angsuran',
            bunga='$Bunga',
            WHERE id='$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function persen($persentase){
    $persen ="$persentase" ." % ";
    
    return $persen;
}

function rupiah($angka){
    $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}

function uang_muka($harga_mobil,$uang_muka){
    $bayar_uang_muka = ($uang_muka/100)*$harga_mobil;

    return $bayar_uang_muka;
}

function angsuran($harga_mobil, $uang_muka, $angsuran, $bunga){
    $bayar_uang_muka = ($uang_muka/100)*$harga_mobil;
    $bayar_asli = ($harga_mobil-$bayar_uang_muka) / (12*$angsuran);
    $bayar_bunga = ($bunga/100) * (($harga_mobil-$bayar_uang_muka)*$angsuran)/(12*$angsuran);
    $bayar_angsuran = $bayar_asli + $bayar_bunga;

    return $bayar_angsuran;
}
