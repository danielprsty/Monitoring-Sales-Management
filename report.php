<!DOCTYPE html>
<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_user'];

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_posisi where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  //Jumlah Minat
  $query_jml_mnt = "select count(*) AS jumlah_mnt from tb_minat";
  $sql_jml_mnt = mysqli_query($conn, $query_jml_mnt);
  $result_mnt = mysqli_fetch_array($sql_jml_mnt);

  //Jumlah Belum
  $query_jml_blm = "select count(*) AS jumlah_blm from tb_belum";
  $sql_jml_blm = mysqli_query($conn, $query_jml_blm);
  $result_blm = mysqli_fetch_array($sql_jml_blm);

  //Jumlah Belum
  $query_jml_ln = "select count(*) AS jumlah_ln from tb_lainnya";
  $sql_jml_ln = mysqli_query($conn, $query_jml_ln);
  $result_ln = mysqli_fetch_array($sql_jml_ln);

  //Jumlah db
  $query_jml_db = "select count(*) AS jumlah_db from tb_database";
  $sql_jml_db = mysqli_query($conn, $query_jml_db);
  $result_db = mysqli_fetch_array($sql_jml_db);

   //Jumlah dbso
   $query_jml_dbso = "select count(*) AS jumlah_dbso from tb_10";
   $sql_jml_dbso = mysqli_query($conn, $query_jml_dbso);
   $result_dbso = mysqli_fetch_array($sql_jml_dbso);

    //Jumlah dbtl
    $query_jml_dbtl = "select count(*) AS jumlah_dbtl from tb_tl";
    $sql_jml_dbtl = mysqli_query($conn, $query_jml_dbtl);
    $result_dbtl = mysqli_fetch_array($sql_jml_dbtl);
 
  

 

  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];
    //$id_level = $r['id_level'];

?>

<html lang="en">
<head>
<title>MSM : Dashboard</title>
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
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.php">Dashboard</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $r['nama_user'];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['jenis_posisi'];?></a></li>
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
<div id="sidebar"><a href="beranda.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
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
    <li> <a href="pensiunan.php"><i class="icon icon-suitcase"></i> <span>Database</span><i class="icon icon-angle-right"></i></a> </li>
    <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    
    
 
 <?php
    } else if($r['id_level'] == 54 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_51.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 55 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_52.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 56 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_53.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 57 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_54.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 58 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_55.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 59 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_56.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 60 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_57.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 61 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_58.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 62 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_59.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 63 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_60.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 64 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_61.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 65 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_62.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 66 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_63.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 67 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_64.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 68 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_65.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 69 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_66.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 70 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_67.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 71 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_68.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 72 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_69.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 73 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_70.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 74 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_71.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 75 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_72.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 76 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_73.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 77 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_74.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 78 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_75.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 79 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_76.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 80 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_77.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 81 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_78.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 82 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_79.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 83 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_80.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 84 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_81.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 85 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_82.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 86 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_83.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 87 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_84.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 88 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_85.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 89 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_86.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 90 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_87.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 91 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_88.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 92 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_89.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 93 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_90.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 94 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_91.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 95 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_92.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 96 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_93.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 97 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_94.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 98 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_95.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 99 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_96.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 100 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_97.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 101 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_98.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 102 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_99.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 103 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_100.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 104 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_101.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 105 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_102.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 106 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_103.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 107 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_104.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 108 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_105.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 109 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_106.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 110 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_107.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 111 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_108.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 112 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_109.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 113 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_110.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 114 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_111.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 115 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_112.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 116 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_113.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 117 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_114.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 118 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_115.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 119 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_116.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 120 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_117.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 121 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_118.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 122 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_119.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 123 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_120.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 124 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_121.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 125 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_122.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 126 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_123.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 127 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_124.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 128 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_125.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 129 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_126.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 130 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_127.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 132 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_129.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
   <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  
    <?php
    } else if($r['id_level'] == 133 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_130.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
   <?php
    } else if($r['id_level'] == 136 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_133.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
     <?php
    } else if($r['id_level'] == 137 ){
    ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_134.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  <?php
    } else if($r['id_level'] == 4|| $r['id_level'] == 5 || $r['id_level'] == 6 || $r['id_level'] == 7 || $r['id_level'] == 8 || $r['id_level'] == 9 || $r['id_level'] == 10 || $r['id_level'] == 11 || $r['id_level'] == 12 || $r['id_level'] == 13|| $r['id_level'] == 14|| $r['id_level'] == 15|| $r['id_level'] == 16|| $r['id_level'] == 17|| $r['id_level'] == 18|| $r['id_level'] == 19|| $r['id_level'] == 20|| $r['id_level'] == 21|| $r['id_level'] == 21|| $r['id_level'] == 23|| $r['id_level'] == 24|| $r['id_level'] == 25|| $r['id_level'] == 26|| $r['id_level'] == 27|| $r['id_level'] == 28|| $r['id_level'] == 29|| $r['id_level'] == 30|| $r['id_level'] == 31|| $r['id_level'] == 32|| $r['id_level'] == 33|| $r['id_level'] == 34|| $r['id_level'] == 35|| $r['id_level'] == 36|| $r['id_level'] == 37|| $r['id_level'] == 38|| $r['id_level'] == 39|| $r['id_level'] == 40|| $r['id_level'] == 41|| $r['id_level'] == 42|| $r['id_level'] == 43|| $r['id_level'] == 44|| $r['id_level'] == 45|| $r['id_level'] == 46|| $r['id_level'] == 47|| $r['id_level'] == 48|| $r['id_level'] == 49|| $r['id_level'] == 50|| $r['id_level'] == 51|| $r['id_level'] == 52|| $r['id_level'] == 53|| $r['id_level'] == 131|| $r['id_level'] == 134|| $r['id_level'] == 135  ){
  ?>
   <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
     <li class="active"> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
  <li> <a href="hot_prospek.php"><i class="icon icon-fire"></i> <span>Hot Prospek</span></a> </li>
    <li> <a href="followup.php"><i class="icon icon-tag"></i> <span>Follow Up</span></a> </li>
    <li> <a href="data_prospek.php"><i class="icon icon-bar-chart"></i> <span>Data Prospek</span></a> </li><i class="icon icon-angle-right"></i></a> </li>
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
    <div id="breadcrumb"> <a href="beranda.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard Kunjungan</a></div>
  </div>
<!--End-breadcrumbs-->
  
<!--Action boxes-->
  <div class="container-fluid">
  <div class="row-fluid">
    <?php
      if($r['id_level'] == 1){
    ?>
      
        
        <div class="widget-content" >
          
              <div class="span7">
              <div class="widget-box">
                  <ul class="site-stats quick-actions">
                    <li class="bg_ls"><i class="icon-fire"></i> <strong><?php echo $result_mnt['jumlah_mnt']; ?></strong> <small>Hot Prospek</small></li>
                    <li class="bg_ly"><i class="icon-tag"></i> <strong><?php echo $result_ln['jumlah_ln']; ?></strong> <small>Follow Up</small></li>
                    <li class="bg_lg"><i class="icon-bar-chart"></i> <strong><?php echo $result_blm['jumlah_blm']; ?></strong> <small>Data Prospek</small></li>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        } else if($r['id_level'] == 4|| $r['id_level'] == 5 || $r['id_level'] == 6 || $r['id_level'] == 7 || $r['id_level'] == 8 || $r['id_level'] == 9 || $r['id_level'] == 10 || $r['id_level'] == 11 || $r['id_level'] == 12 || $r['id_level'] == 13|| $r['id_level'] == 14|| $r['id_level'] == 15|| $r['id_level'] == 16|| $r['id_level'] == 17|| $r['id_level'] == 18|| $r['id_level'] == 19|| $r['id_level'] == 20|| $r['id_level'] == 21|| $r['id_level'] == 21|| $r['id_level'] == 23|| $r['id_level'] == 24|| $r['id_level'] == 25|| $r['id_level'] == 26|| $r['id_level'] == 27|| $r['id_level'] == 28|| $r['id_level'] == 29|| $r['id_level'] == 30|| $r['id_level'] == 31|| $r['id_level'] == 32|| $r['id_level'] == 33|| $r['id_level'] == 34|| $r['id_level'] == 35|| $r['id_level'] == 36|| $r['id_level'] == 37|| $r['id_level'] == 38|| $r['id_level'] == 39|| $r['id_level'] == 40|| $r['id_level'] == 41|| $r['id_level'] == 42|| $r['id_level'] == 43|| $r['id_level'] == 44|| $r['id_level'] == 45|| $r['id_level'] == 46|| $r['id_level'] == 47|| $r['id_level'] == 48|| $r['id_level'] == 49|| $r['id_level'] == 50|| $r['id_level'] == 51|| $r['id_level'] == 52|| $r['id_level'] == 53 || $r['id_level'] == 54|| $r['id_level'] == 131|| $r['id_level'] == 134|| $r['id_level'] == 135 ) {
      ?>
       
        
       <div class="widget-content" >
          
          <div class="span7">
            <div class="widget-box">
            <div class="widget-content nopadding">
                <ul class="site-stats quick-actions">
                  <li class="bg_ls"><i class="icon-fire"></i> <strong><?php echo $result_mnt['jumlah_mnt']; ?></strong> <small>Hot Prospek</small></li>
                    <li class="bg_ly"><i class="icon-tag"></i> <strong><?php echo $result_ln['jumlah_ln']; ?></strong> <small>Follow Up</small></li>
                    <li class="bg_lg"><i class="icon-bar-chart"></i> <strong><?php echo $result_blm['jumlah_blm']; ?></strong> <small>Data Prospek</small></li>
                </ul>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    } else if($r['id_level'] == 54|| $r['id_level'] == 55 || $r['id_level'] == 56 || $r['id_level'] == 57 || $r['id_level'] == 58 || $r['id_level'] == 59 || $r['id_level'] == 60 || $r['id_level'] == 61 || $r['id_level'] == 62 || $r['id_level'] == 63|| $r['id_level'] == 64|| $r['id_level'] == 65|| $r['id_level'] == 66|| $r['id_level'] == 67|| $r['id_level'] == 68|| $r['id_level'] == 69|| $r['id_level'] == 70|| $r['id_level'] == 71|| $r['id_level'] == 72|| $r['id_level'] == 73|| $r['id_level'] == 74|| $r['id_level'] == 75|| $r['id_level'] == 76|| $r['id_level'] == 77|| $r['id_level'] == 78|| $r['id_level'] == 79|| $r['id_level'] == 80|| $r['id_level'] == 81|| $r['id_level'] == 82|| $r['id_level'] == 83|| $r['id_level'] == 84|| $r['id_level'] == 85|| $r['id_level'] == 86|| $r['id_level'] == 87|| $r['id_level'] == 88|| $r['id_level'] == 89|| $r['id_level'] == 90|| $r['id_level'] == 91| $r['id_level'] == 92|| $r['id_level'] == 93|| $r['id_level'] == 94|| $r['id_level'] == 95|| $r['id_level'] == 96|| $r['id_level'] == 97|| $r['id_level'] == 98|| $r['id_level'] == 99|| $r['id_level'] == 100|| $r['id_level'] == 101|| $r['id_level'] == 102|| $r['id_level'] == 103 | $r['id_level'] == 104|| $r['id_level'] == 105|| $r['id_level'] == 106|| $r['id_level'] == 107|| $r['id_level'] == 108|| $r['id_level'] == 109|| $r['id_level'] == 110|| $r['id_level'] == 111|| $r['id_level'] == 112|| $r['id_level'] == 113|| $r['id_level'] == 114 | $r['id_level'] == 115|| $r['id_level'] == 116|| $r['id_level'] == 117|| $r['id_level'] == 118|| $r['id_level'] == 119|| $r['id_level'] == 120|| $r['id_level'] == 121|| $r['id_level'] == 122|| $r['id_level'] == 123|| $r['id_level'] == 124|| $r['id_level'] == 125|| $r['id_level'] == 126|| $r['id_level'] == 127|| $r['id_level'] == 128|| $r['id_level'] == 129|| $r['id_level'] == 130|| $r['id_level'] == 132|| $r['id_level'] == 133|| $r['id_level'] == 136|| $r['id_level'] == 137) {
      ?>
       
        
       <div class="widget-content" >
          
          <div class="span7">
            <div class="widget-box">
            <div class="widget-content nopadding">
                <ul class="site-stats quick-actions">
                    <li class="bg_ls"><i class="icon-fire"></i> <strong><?php echo $result_mnt['jumlah_mnt']; ?></strong> <small>Hot Prospek</small></li>
                    <li class="bg_ly"><i class="icon-tag"></i> <strong><?php echo $result_ln['jumlah_ln']; ?></strong> <small>Follow Up</small></li>
                    <li class="bg_lg"><i class="icon-bar-chart"></i> <strong><?php echo $result_blm['jumlah_blm']; ?></strong> <small>Data Prospek</small></li>
                </ul>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        } else if($r['id_level'] == 3) {
          ?>
           
        
       <div class="widget-content" >
          
          <div class="span7">
            <div class="widget-box">
            <div class="widget-content nopadding">
                <ul class="site-stats quick-actions">
                  <li class="bg_ls"><i class="icon-folder-open"></i> <strong><?php echo $result_dk['jumlah_dk']; ?></strong> <small>Dikunjungi</small></li>
                  <li class="bg_ly"><i class="icon-tasks"></i> <strong><?php echo $result_dbtl['jumlah_dbtl']; ?></strong> <small>Belum Dikunjungi</small></li>
                  <li class="bg_lg"><i class="icon-book"></i> <strong><?php echo $result_dk['jumlah_dk']; ?></strong> <small>Report</small></li>
                </ul>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        }else{
          ?>
               
        </center>
      </div>
      <?php
        }
      ?>
    </div>
<!--End-Action boxes-->    
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Monitoring Sales Management <a href="#">by ParagraphNet</a> </div>
</div>

<!--end-Footer-part-->

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