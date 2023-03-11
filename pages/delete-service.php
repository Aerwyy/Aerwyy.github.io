<?php
include '../connect.php';
$delete = mysqli_query($connect, "DELETE FROM service WHERE id_gambar = '".$_GET['id']."'");
if($delete){
    header('location:dashboard.php');
} else {
    echo 'Hapus Gagal';
}
?>