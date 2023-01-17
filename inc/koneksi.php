<?php
$koneksi = new mysqli("localhost", "root", "", "dbsales");
if ($koneksi->connect_errno != 0) {
    echo $koneksi->connect_errno;
    exit();
}
