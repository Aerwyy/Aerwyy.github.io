<?php
include '../connect.php';
$delete = mysqli_query($connect, "DELETE FROM message WHERE id_message = '".$_GET['id']."'");
if($delete){
    header('location:dashboard.php');
} else {
    echo 'Hapus Gagal';
}
?>