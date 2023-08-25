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
<title>MSM : Database</title>
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
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet"/>

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="entri_order.php">Database</a></h1>
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
<div id="sidebar"><a href="entri_order.php" class="visible-phone"><i class="icon icon-suitcase"></i> <span>Database</span></a>
  <ul>
    <?php
    if($r['id_level'] == 1){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="user.php"><i class="icon icon-user"></i> <span>Akun Pengguna</span></a> </li>
    <li> <a href="sharedata.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="input_mrtl.php"><i class="icon icon-inbox"></i> <span>Input SO/TL</span></a> </li>
    <li> <a href="daftar_mrtl.php"><i class="icon icon-tasks"></i> <span>Daftar SO/TL</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-suitcase"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  <?php
    } else if($r['id_level'] == 2){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="hasil_kunjungan.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database_so.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 54 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_51.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 55 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_52.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 56 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_53.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 57 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_54.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 58 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_55.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 59 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_56.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 60 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_57.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 61 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_58.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 62 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_59.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 63 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_60.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 64 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_61.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 65 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_62.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 66 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_63.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 67 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_64.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 68 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_65.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 69 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_66.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 70 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_67.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 71 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_68.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 72 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_69.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 73 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_70.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 74 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_71.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 75 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_72.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 76 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_73.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 77 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_74.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 78 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_75.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 79 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_76.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 80 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_77.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 81 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_78.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 82 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_79.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 83 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_80.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 84 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_81.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 85 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_82.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 86 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_83.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 87 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_84.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 88 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_85.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 89 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_86.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 90 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_87.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 91 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_88.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 92 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_89.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 93 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_90.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 94 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_91.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 95 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_92.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 96 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_93.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 97 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_94.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 98 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_95.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 99 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_96.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 100 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_97.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 101 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_98.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 102 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_99.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 103 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_100.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 104 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_101.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 105 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_102.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 106 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_103.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 107 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_104.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 108 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_105.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 109 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_106.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 110 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_107.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 111 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_108.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 112 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_109.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 113 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_110.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 114 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_111.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 115 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_112.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 116 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_113.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 117 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_114.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 118 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_115.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 119 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_116.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 120 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_117.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 121 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_118.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 122 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_119.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 123 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_120.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 124 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_121.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 125 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_122.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 126 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_123.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 127 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_124.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 128 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_125.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 129 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_126.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 130 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_127.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 132 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_129.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 133 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_130.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li></li>
      <?php
    } else if($r['id_level'] == 136 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_133.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li></li>
      <?php
    } else if($r['id_level'] == 137 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_134.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li></li>
  <?php
        } else if($r['id_level'] == 4|| $r['id_level'] == 5 || $r['id_level'] == 6 || $r['id_level'] == 7 || $r['id_level'] == 8 || $r['id_level'] == 9 || $r['id_level'] == 10 || $r['id_level'] == 11 || $r['id_level'] == 12 || $r['id_level'] == 13|| $r['id_level'] == 14|| $r['id_level'] == 15|| $r['id_level'] == 16|| $r['id_level'] == 17|| $r['id_level'] == 18|| $r['id_level'] == 19|| $r['id_level'] == 20|| $r['id_level'] == 21|| $r['id_level'] == 21|| $r['id_level'] == 23|| $r['id_level'] == 24|| $r['id_level'] == 25|| $r['id_level'] == 26|| $r['id_level'] == 27|| $r['id_level'] == 28|| $r['id_level'] == 29|| $r['id_level'] == 30|| $r['id_level'] == 31|| $r['id_level'] == 32|| $r['id_level'] == 33|| $r['id_level'] == 34|| $r['id_level'] == 35|| $r['id_level'] == 36|| $r['id_level'] == 37|| $r['id_level'] == 38|| $r['id_level'] == 39|| $r['id_level'] == 40|| $r['id_level'] == 41|| $r['id_level'] == 42|| $r['id_level'] == 43|| $r['id_level'] == 44|| $r['id_level'] == 45|| $r['id_level'] == 46|| $r['id_level'] == 47|| $r['id_level'] == 48|| $r['id_level'] == 49|| $r['id_level'] == 50|| $r['id_level'] == 51|| $r['id_level'] == 52|| $r['id_level'] == 53|| $r['id_level'] == 131|| $r['id_level'] == 134||$r['id_level']==135   ) {
      ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
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
    <div id="breadcrumb"> <a href="entri_order.php" title="Go to here" class="tip-bottom"><i class="icon icon-suitcase"></i> Database</a></div>
  </div>
   <?php
      if($r['id_level'] == 1){
    ?>
   
                <?php
                  $query_data_data = "select * from tb_database";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
              <form class="form-inline">
                <div class="form-group">
                  <select class="form-control" id="Kolom" name="Kolom" required="">
                    <?php
                    $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
                    ?>
                    <option value="nama_penerima" <?php if ($kolom=="nama_penerima") echo "selected"; ?>>Nama</option>
                    <option value="kota" <?php if ($kolom=="kota") echo "selected"; ?>>Kota</option>
  </select>
    <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci'])) echo $_GET['KataKunci']; ?>">
  <button type="submit" class="btn btn-primary">Cari</button>
  <a href="database.php" class="btn btn-danger">Reset</a>
  </div>  
</form>
</div>
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>
                       

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    <?php
      //kondisi jika parameter pencarian kosong
      if($kolomCari=="" && $kolomKataKunci==""){
        $SqlQuery = mysqli_query($conn, "SELECT * FROM tb_database");
      }else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($conn, "SELECT * FROM tb_database WHERE $kolomCari LIKE '%$kolomKataKunci%'");
      }     
    
       
    ?>
    
    
           <?php
        }else if($r['id_level'] == 4) {
      ?>
       
                <?php
                  $query_data_data = "select * from tb_1";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
              
              <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                      <tr>
                        <br>
                        <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                          <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
     <?php
        }else if($r['id_level'] == 5) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_2";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
              
<div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                            

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 6) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_3";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                          

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 7) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_4";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 8) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_5";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     
                     
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 9) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_6";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 10) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_7";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 11) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_8";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 12) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_9";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 13) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_10";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                          

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 14) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_11";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 15) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_12";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 16) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_13";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 17) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_14";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 18) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_15";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 19) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_16";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 20) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_17";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 21) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_18";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 22) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_19";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                          

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 23) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_20";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 24) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_21";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 25) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_22";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
             
  <?php
        }else if($r['id_level'] == 26) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_23";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 27) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_24";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 28) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_25";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 29) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_26";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 30) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_27";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                          

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 31) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_28";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 32) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_29";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 33) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_30";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 34) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_31";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 35) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_32";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 36) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_33";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 37) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_34";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 38) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_35";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 39) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_36";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 40) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_37";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                     

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 41) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_38";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 42) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_39";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 43) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_40";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 44) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_41";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 45) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_42";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 46) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_43";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 47) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_44";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 48) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_45";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  <?php
        }else if($r['id_level'] == 49) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_46";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              
  <?php
        }else if($r['id_level'] == 50) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_47";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 51) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_48";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 52) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_49";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                          
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
               
  <?php
        }else if($r['id_level'] == 53) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_50";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   <?php
        }else if($r['id_level'] == 54) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_51";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
  <?php
        }else if($r['id_level'] == 55) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_52";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 56) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_53";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     

                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
  <?php
        }else if($r['id_level'] == 57) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_54";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                 

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 58) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_55";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 59) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_56";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 60) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_57";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
 
    
    
  <?php
        }else if($r['id_level'] == 61) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_58";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
   

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 62) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_59";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
   

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 63) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_60";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 64) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_61";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 65) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_62";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 66) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_63";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 67) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_64";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
 
    
    
  <?php
        }else if($r['id_level'] == 68) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_65";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 69) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_66";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
        

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 70) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_67";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 71) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_68";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 72) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_69";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
    
    
    
  <?php
        }else if($r['id_level'] == 73) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_70";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
   

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
  <?php
        }else if($r['id_level'] == 74) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_71";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 75) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_72";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 76) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_73";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                   

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 77) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_74";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
            

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 78) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_75";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
          

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 79) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_76";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
        

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 80) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_77";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 81) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_78";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
         

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
  <?php
        }else if($r['id_level'] == 82) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_79";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
           

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 83) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_80";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 84) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_81";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
          

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 85) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_82";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
          

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 86) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_83";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                   

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 87) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_84";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 88) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_85";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
               

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 89) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_86";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 90) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_87";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
             

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 91) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_88";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
           

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 92) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_89";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                     

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 93) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_90";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
            

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
    
  <?php
        }else if($r['id_level'] == 94) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_91";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
            

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 95) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_92";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 96) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_93";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
            

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 97) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_94";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
        

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 98) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_95";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 99) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_96";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
           

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
  <?php
        }else if($r['id_level'] == 100) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_97";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
           

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 101) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_98";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
  
    
    
  <?php
        }else if($r['id_level'] == 102) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_99";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 103) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_100";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    ?>
    
    
  <?php
        }else if($r['id_level'] == 104) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_101";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 105) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_102";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
         

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 106) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_103";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                 

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 107) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_104";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
        

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 108) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_105";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                     

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 109) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_106";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                  

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 110) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_107";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 111) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_108";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
               

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 112) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_109";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 113) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_110";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 114) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_111";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
          

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                      

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
  
    
    
  <?php
        }else if($r['id_level'] == 115) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_112";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                  

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 116) {
      ?>
                <?php
                  $query_data_data = "select * from tb_113";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
              <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      


                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                          <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
      
                
                
    
       
    
    
  <?php
        }else if($r['id_level'] == 117) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_114";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
          

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                     
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 118) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_115";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
 
  
    
    
  <?php
        }else if($r['id_level'] == 119) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_116";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
     
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 120) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_117";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
             

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 121) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_118";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                        
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 122) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_119";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
   
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 123) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_120";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
              

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 124) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_121";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
    
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 125) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_122";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
     
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 126) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_123";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                    
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
  
    
    
  <?php
        }else if($r['id_level'] == 127) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_124";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 128) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_125";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

  
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    <?php
      //kondisi jika parameter pencarian kosong
      if($kolomCari=="" && $kolomKataKunci==""){
        $SqlQuery = mysqli_query($conn, "SELECT * FROM tb_125");
      }else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($conn, "SELECT * FROM tb_125 WHERE $kolomCari LIKE '%$kolomKataKunci%'");
      }     
    
       
    ?>
    
    
  <?php
        }else if($r['id_level'] == 129) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_126";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                  
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                         

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 130) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_127";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

                  
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                       

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 131) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_128";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      

              
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                          
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 132) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_129";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                         
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 133) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_133";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
        
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                     
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
    
    
    
  <?php
        }else if($r['id_level'] == 134) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_131";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
        
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                  

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }else if($r['id_level'] == 135) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_132";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
        
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                  

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
        }else if($r['id_level'] == 136) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_133";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
        
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                  

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
        }else if($r['id_level'] == 137) {
      ?>
      
                <?php
                  $query_data_data = "select * from tb_134";
                  $sql_data_data = mysqli_query($conn, $query_data_data);
                  $no = 1;
                ?>
              
               
 <div class="row">
      <div class="col-12">

      </div>  
    </div>
     <div class="widget-box">
          <table id="datatables" class="display">
                    <thead>
                    <tr>
                        <br>
                          <th>No.</th>
                        <th>Nama Pensiunan</th>
                        <th>Usia</th>
                        <th>Tahun Pensiun</th>
                        <th>Kota</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Penghasilan Pokok</th>
                        <th>Thp</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
        
                       

                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          
                         <td><?php echo $no++; ?></td>
                         <td><?php echo $r_dt_data['nama_penerima']; ?></td>
                          <td><?php echo $r_dt_data['usia']; ?></td>
                          <td><?php echo $r_dt_data['thn_skr']; ?></td>
                          <td><?php echo $r_dt_data['kota']; ?></td>
                          <td><?php echo $r_dt_data['tgl_lahir_penerima']; ?></td>
                          <td><?php echo $r_dt_data['alamat_peserta']; ?></td>
                          <td><?php echo $r_dt_data['penpok']; ?></td>
                          <td><?php echo $r_dt_data['thp']; ?></td>
                          <td><?php echo $r_dt_data['kecamatan']; ?></td>
                          <td><?php echo $r_dt_data['kelurahan']; ?></td>
                          <td><?php echo $r_dt_data['nmkanbyr']; ?></td>
                          <td><?php echo $r_dt_data['tmtpensiun']; ?></td>
                          <td><?php echo $r_dt_data['nomor_skep']; ?></td>
                          <td><?php echo $r_dt_data['telepon']; ?></td>
                          <td><?php echo $r_dt_data['awal_flag']; ?></td>
                          <td><?php echo $r_dt_data['akhir_flag']; ?></td>
                        
                  

                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
   
    
    
  <?php
        }
        ?>
</div>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Monitoring Sales Management <a href="#">by ParagraphNet</a> </div>
  

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
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.js"></script>

<script type="text/javascript">

$('#datatables').DataTable( {
  responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                  
                   
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        }
    } );
    </script>
    <script>
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