<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if(isset($_SESSION['edit_menu'])){
  echo $_SESSION['edit_menu'];
  unset($_SESSION['edit_menu']);

}

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_posisi where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];

?>

<html lang="en">
<head>
<title>MSM : TambahDataPengajuan</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/png" href="template/masuk/images/icons/favicon2.ico"/>
<link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
<link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script></head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="entri_order.php">Tambah Data Pengajuan</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $r['nama_user'];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['nama_level'];?></a></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="entri_order.php" class="visible-phone"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a>
  <ul>
    <?php
    if($r['id_level'] == 1){
  ?>
    <li> <a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="user.php"><i class="icon icon-user"></i> <span>Akun Pengguna</span></a> </li>
    <li> <a href="sharedata.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="input_mrtl.php"><i class="icon icon-inbox"></i> <span>Input SO/TL</span></a> </li>
    <li> <a href="daftar_mrtl.php"><i class="icon icon-tasks"></i> <span>Daftar SO/TL</span></a> </li>
    <li> <a href="pensiunan.php"><i class="icon icon-suitcase"></i> <span>Database</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
 
    
  <?php
    } else if($r['id_level'] == 2){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="hasil_kunjungan_so.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database_so.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
 <?php
    } else if($r['id_level'] == 54 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_51.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 55 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_52.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 56 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_53.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 57 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_54.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 58 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_55.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 59 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_56.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 60 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_57.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 61 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_58.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 62 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_59.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 63 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_60.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 64 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_61.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 65 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_62.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 66 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_63.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 67 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_64.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 68 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_65.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 69 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_66.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 70 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_67.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 71 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_68.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 72 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_69.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 73 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_70.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 74 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_71.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 75 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_72.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 76 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_73.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 77 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_74.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 78 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_75.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 79 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_76.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 80 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_77.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 81 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_78.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 82 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_79.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 83 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_80.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 84 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_81.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 85 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_82.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 86 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_83.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 87 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_84.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 88 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_85.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 89 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_86.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 90 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_87.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 91 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_88.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 92 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_89.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 93 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_90.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 94 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_91.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 95 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_92.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 96 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_93.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 97 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_94.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 98 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_95.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 99 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_96.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 100 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_97.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 101 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_98.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 102 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_99.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 103 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_100.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 104 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_101.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 105 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_102.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 106 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_103.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 107 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_104.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 108 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_105.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 109 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_106.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 110 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_107.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 111 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_108.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 112 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_109.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 113 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_110.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 114 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_111.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 115 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_112.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 116 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_113.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 117 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_114.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 118 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_115.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 119 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_116.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 120 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_117.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 121 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_118.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 122 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_119.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 123 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_120.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 124 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_121.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 125 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_122.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 126 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_123.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 127 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_124.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 128 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_125.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 129 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_126.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 130 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_127.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 132 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_129.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 133 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_130.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
     <?php
    } else if($r['id_level'] == 136 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_133.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
     <?php
    } else if($r['id_level'] == 137 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_134.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  <?php
    } else if($r['id_level'] == 4|| $r['id_level'] == 5 || $r['id_level'] == 6 || $r['id_level'] == 7 || $r['id_level'] == 8 || $r['id_level'] == 9 || $r['id_level'] == 10 || $r['id_level'] == 11 || $r['id_level'] == 12 || $r['id_level'] == 13|| $r['id_level'] == 14|| $r['id_level'] == 15|| $r['id_level'] == 16|| $r['id_level'] == 17|| $r['id_level'] == 18|| $r['id_level'] == 19|| $r['id_level'] == 20|| $r['id_level'] == 21|| $r['id_level'] == 21|| $r['id_level'] == 23|| $r['id_level'] == 24|| $r['id_level'] == 25|| $r['id_level'] == 26|| $r['id_level'] == 27|| $r['id_level'] == 28|| $r['id_level'] == 29|| $r['id_level'] == 30|| $r['id_level'] == 31|| $r['id_level'] == 32|| $r['id_level'] == 33|| $r['id_level'] == 34|| $r['id_level'] == 35|| $r['id_level'] == 36|| $r['id_level'] == 37|| $r['id_level'] == 38|| $r['id_level'] == 39|| $r['id_level'] == 40|| $r['id_level'] == 41|| $r['id_level'] == 42|| $r['id_level'] == 43|| $r['id_level'] == 44|| $r['id_level'] == 45|| $r['id_level'] == 46|| $r['id_level'] == 47|| $r['id_level'] == 48|| $r['id_level'] == 49|| $r['id_level'] == 50|| $r['id_level'] == 51|| $r['id_level'] == 52|| $r['id_level'] == 53|| $r['id_level'] == 131|| $r['id_level'] == 134||$r['id_level']==135  ){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
 
  <?php
    }
  ?>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="input_data.php" title="Go to here" class="tip-bottom"><i class="icon icon-plus"></i> Tambah Data Pengajuan</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span11">
      <div class="widget-box">
        <div class="widget-content nopadding">

          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nama Pensiunan :</label>
              <div class="controls">
                <input name="nama_pensiunan" type="text" class="span11" placeholder="Nama Pensiunan" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Notas :</label>
              <div class="controls">
                <input name="notas" type="text" class="span11" placeholder="Dxxxxxxxxxx" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Penghasilan Pokok :</label>
              <div class="controls">
                <input name="nama_penerima" type="text" class="span11" placeholder="x,xxx,xxx" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">THP :</label>
              <div class="controls">
                <input name="plafond" type="text" class="span11" placeholder="x,xxx,xxx" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Lahir :</label>
              <div class="controls">
                <input name="alm_peserta" type="text"  class="span11" placeholder="xx/xx/xxxx"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tahun Pensiun :</label>
              <div class="controls">
                <input name="alm_peserta" type="text"  class="span11" placeholder="xx/xx/xxxx"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Usia :</label>
              <div class="controls">
                <input name="alm_peserta" type="text"  class="span11" placeholder="max:60"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Telepon :</label>
              <div class="controls">
                <input name="alm_peserta" type="text"  class="span11" placeholder="xxx-xxxxxxxxx"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kota :</label>
              <div class="controls">
        <select class=span11 name="form_kota" id="form_kota">
					<option value="">--Pilih Kota--</option>
					
					<?php
					// Load file koneksi.php
					include "connection/koneksi.php";
					
					// Buat query untuk menampilkan semua data siswa
					$sql = mysqli_query($conn, "SELECT * FROM wilayah GROUP BY kota ORDER by kota");
			
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<option value='".$data['kota']."'>".$data['kota']."</option>";
					}
					?>
				</select>
        </div>
        </div>
            <div class="control-group">
              <label class="control-label">Kecamatan :</label>
              <div class="controls">
            <select class=span11 id="form_kec" name="form_kec">
            <option value="">--Pilih Kecamatan--</option>
                    
        </select>
              </div>
        </div>
              <div class="control-group">
              <label class="control-label">Kelurahan :</label>
              <div class="controls">
            <select class=span11 id="form_kel" name="form_kel">
            <option value="">--Pilih Kelurahan--</option>
                    
        </select>
              </div>
        </div>
            <div class="control-group">
              <label class="control-label">Alamat :</label>
              <div class="controls">
                <input name="alm_peserta" type="text"  class="span11"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jenis Pensiun :</label>
              <div class="controls">
                <select class="span11" name="id_pensiun">
                  <option value="">--Pilih Jenis Pensiun--</option>
                  <option value="1">Pensiun</option>
                  <option value="2">Pra Pensiun</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jenis Pinjaman :</label>
              <div class="controls">
                <select class="span11" name="id_pinjaman">
                  <option value="">--Pilih Jenis Pinjaman--</option>
                  <option value="1">Pensiun</option>
                  <option value="2">MPP</option>
                </select>
              </div>
            </div>
            <script type="text/javascript">
		$(document).ready(function(){

			// sembunyikan form kabupaten, kecamatan dan desa
		
			// ambil data kabupaten ketika data memilih provinsi
			$('body').on("change","#form_kota",function(){
				var id = $(this).val();
				var data = "id="+id+"&data=kecamatan";
				$.ajax({
					type: 'POST',
					url: "option_wilayah.php",
					data: data,
					success: function(hasil) {
						$("#form_kec").html(hasil);
						$("#form_kec").show();
						$("#form_kel").show();
					}
				});
			});

			// ambil data kecamatan/kota ketika data memilih kabupaten
			$('body').on("change","#form_kec",function(){
				var id = $(this).val();
				var data = "id="+id+"&data=kelurahan";
				$.ajax({
					type: 'POST',
					url: "option_wilayah.php",
					data: data,
					success: function(hasil) {
						$("#form_kel").html(hasil);
						$("#form_kel").show();
					}
				});
			});



		});
	</script>
            <div class="form-actions">
              <button type="submit" name="kirim_simpan" class="btn btn-success"><i class='icon icon-save'></i>&nbsp; Simpan</button>
            </div>
          </form>
          <?php
            if(isset($_POST['kirim_simpan'])){
              $nama_pensiunan = $_POST['nama_pensiunan'];
              $notas = $_POST['notas'];
              $nama_penerima = $_POST['nama_penerima'];
              $alm_peserta = $_POST['alm_peserta'];
              $kota = $_POST['kota'];
     
              
              //echo "<br>";
              //echo $nama_mr . " || " . $nopen . " || " . $nama_debitur . " || " . $plafond . " || " . $alamat . " || " . $id_kota . " || " . $id_pensiun . " || " . $id_pinjaman . " || " . $status;
              //echo "<br></br>";
              $query_simpan = "insert into tb_database values ('$nama_pensiunan','$notas','$nama_penerima','$alm_peserta','$kota')";
              $sql_simpan = mysqli_query($conn, $query_simpan);
              if($sql_simpan){
                header('location: beranda.php');
                $_SESSION['simpan'] = 'sukses';
              }
            }

          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Monitoring Sales Management <a href="#">by ParagraphNet</a> </div>
</div>
  
<script src="template/dashboard/js/excanvas.min.js"></script> 
<script src="template/dashboard/js/jquery.min.js"></script> 
<script src="template/dashboard/js/jquery.ui.custom.js"></script> 
<script src="template/dashboard/js/bootstrap.min.js"></script> 
<script src="template/dashboard/js/jquery.flot.min.js"></script> 
<script src="template/dashboard/js/jquery.flot.resize.min.js"></script> 
<script src="template/dashboard/js/jquery.peity.min.js"></script> 
<script src="template/dashboard/js/fullcalendar.min.js"></script> 
<script src="template/dashboard/js/matrix.js"></script> 
<script src="template/dashboard/js/matrix.dashboard.js"></script> 
<script src="template/dashboard/js/jquery.gritter.min.js"></script> 
<script src="template/dashboard/js/matrix.interface.js"></script> 
<script src="template/dashboard/js/matrix.chat.js"></script> 
<script src="template/dashboard/js/jquery.validate.js"></script> 
<script src="template/dashboard/js/matrix.form_validation.js"></script> 
<script src="template/dashboard/js/jquery.wizard.js"></script> 
<script src="template/dashboard/js/jquery.uniform.js"></script> 
<script src="template/dashboard/js/select2.min.js"></script> 
<script src="template/dashboard/js/matrix.popover.js"></script> 
<script src="template/dashboard/js/jquery.dataTables.min.js"></script> 
<script src="template/dashboard/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>