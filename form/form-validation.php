<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables and set to empty values
$HargaMobilErr = $UangMukaErr = $AngsuranErr = $BungaErr = "";

$HargaMobil = $UangMuka = $Angsuran = $Bunga  = "";

$requireMessage = "Isian harus diisi!";
$validationMessage = "Harap isi dengan benar!";

$isValid = false;

//Untuk Validation Harga Mobil
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["HargaMobil"])) {
    $HargaMobilErr = $requireMessage;
  } else {
    $HargaMobil = test_input($_POST["HargaMobil"]);
    // check if Harga Mobil
    if (!is_numeric($HargaMobil)) {
    $HargaMobilErr = $validationMessage;
    }
  }


  //Untuk Validation Uang Muka 
  if (empty($_POST["UangMuka"])) {
    $UangMukaErr = $requireMessage;
  } else {
    $UangMuka = test_input($_POST["UangMuka"]);
    // check if Uang Muka  is well-formed
    if (!is_numeric($UangMuka)){
    $UangMukaErr = $validationMessage;
    }
  }

  //Untuk Validation Angsuran
  if (empty($_POST["Angsuran"])) {
    $AngsuranErr = $requireMessage;
  } else {
      $Angsuran = test_input($_POST["Angsuran"]);
      if (
      $Angsuran != "1" && 
      $Angsuran != "2" && 
      $Angsuran != "3" &&
      $Angsuran != "4" &&
      $Angsuran != "5" 
      ) {
          $AngsuranErr = $validationMessage;
      }
  }

  //Untuk Validation Bunga 
  if (empty($_POST["Bunga"])) {
    $BungaErr = $requireMessage;
  } else {
      $Bunga = test_input($_POST["Bunga"]);
      if (
      $Bunga != "5" && 
      $Bunga != "6" && 
      $Bunga != "7" &&
      $Bunga != "8" &&
      $Bunga != "9" &&
      $Bunga != "10"
      ) {
          $BungaErr = $validationMessage;
      }
  }
  
  //Untuk Validation isian form yang nantinya merujuk ke file admin/halaman.php
      if ($HargaMobilErr == "" && $UangMukaErr == "" && $AngsuranErr == "" && $BungaErr == "" ){
      require '/admin/halaman.php';
  }
}