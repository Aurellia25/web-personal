<?php
include 'konektor.php';



// menangkap data yang di kirim dari form
$fariabel1 = $_POST['tanggal'];
$fariabel2 = $_POST['nama'];
$fariabel3 = $_POST['email'];
$fariabel4 = $_POST['komentar'];

// menginput data ke database
mysqli_query($konektor, "insert into bukutamu values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
