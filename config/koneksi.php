<?php
$koneksi = mysqli_connect("localhost", "root", "", "crud-php");

if (!$koneksi) {
    die("Koneksi gagal: ") . mysqli_connect_errno();
}

?>
