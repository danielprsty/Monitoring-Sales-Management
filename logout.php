<?php
session_start();
include "connection/koneksi.php";
$username=$_SESSION['username'];
$update_log = mysqli_query($conn, "update tb_user set last_login = 'TIDAK AKTIF' where username = '$username'");
session_destroy();
header('location:index.php');
die();

?>