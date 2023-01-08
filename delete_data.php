<?php
include 'koneksi.php';
    $hapus=mysqli_query($database, "delete from data_monitoring where project_name = '$_GET[project_name]'");
    if($hapus){
        header('location:../WEBDEVMONITORING/index.php?p=monitoring');
    }
?>