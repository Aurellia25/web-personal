<?php
$konektor = mysqli_connect("localhost", "root", "", "dbexol");
// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>