<?php 
require 'functions.php'; 
$id=$_GET["id"];

if(Delete($id)>0)
{
    echo "
    <script>
        alert('Data BERHASIL dihapus');
        document.location.href = 'halaman.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data GAGAL dihapus');
        document.location.href = 'halaman.php';
    </script>";
}
?>