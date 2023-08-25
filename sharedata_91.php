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
<title>MSM : ShareData</title>
<meta charset="UTF-8" />
<link rel="icon" type="image/png" href="template/masuk/images/icons/favicon2.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
<link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="entri_order.php">ShareData</a></h1>
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
<div id="sidebar"><a href="entri_order.php" class="visible-phone"><i class="icon shopping-cart"></i> <span>ShareData</span></a>
  <ul>
    <?php
    if($r['id_level'] == 1){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="user.php"><i class="icon icon-user"></i> <span>Akun Pengguna</span></a> </li>
    <li class="active"> <a href="sharedata.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="input_mrtl.php"><i class="icon icon-inbox"></i> <span>Input SO/TL</span></a> </li>
    <li> <a href="daftar_mrtl.php"><i class="icon icon-tasks"></i> <span>Daftar SO/TL</span></a> </li>
     <li> <a href="pensiunan.php"><i class="icon icon-suitcase"></i> <span>Database</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  <?php
    } else if($r['id_level'] == 2){
  ?>
    <li> <a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="input_data.php"><i class="icon icon-inbox"></i> <span>Input Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-tasks"></i> <span>Monitoring</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-tasks"></i> <span>Simulasi</span></a> </li>
    <li> <a href="hasil_kunjungan.php"><i class="icon icon-print"></i> <span>Report</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
  <?php
    } else if($r['id_level'] == 54|| $r['id_level'] == 55 || $r['id_level'] == 56 || $r['id_level'] == 57 || $r['id_level'] == 58 || $r['id_level'] == 59 || $r['id_level'] == 60 || $r['id_level'] == 61 || $r['id_level'] == 62 || $r['id_level'] == 63|| $r['id_level'] == 64|| $r['id_level'] == 65|| $r['id_level'] == 66|| $r['id_level'] == 67|| $r['id_level'] == 68|| $r['id_level'] == 69|| $r['id_level'] == 70|| $r['id_level'] == 71|| $r['id_level'] == 72|| $r['id_level'] == 73|| $r['id_level'] == 74|| $r['id_level'] == 75|| $r['id_level'] == 76|| $r['id_level'] == 77|| $r['id_level'] == 78|| $r['id_level'] == 79|| $r['id_level'] == 80|| $r['id_level'] == 81|| $r['id_level'] == 82|| $r['id_level'] == 83|| $r['id_level'] == 84|| $r['id_level'] == 85|| $r['id_level'] == 86|| $r['id_level'] == 87|| $r['id_level'] == 88|| $r['id_level'] == 89|| $r['id_level'] == 90|| $r['id_level'] == 91| $r['id_level'] == 92|| $r['id_level'] == 93|| $r['id_level'] == 94|| $r['id_level'] == 95|| $r['id_level'] == 96|| $r['id_level'] == 97|| $r['id_level'] == 98|| $r['id_level'] == 99|| $r['id_level'] == 100|| $r['id_level'] == 101|| $r['id_level'] == 102|| $r['id_level'] == 103 | $r['id_level'] == 104|| $r['id_level'] == 105|| $r['id_level'] == 106|| $r['id_level'] == 107|| $r['id_level'] == 108|| $r['id_level'] == 109|| $r['id_level'] == 110|| $r['id_level'] == 111|| $r['id_level'] == 112|| $r['id_level'] == 113|| $r['id_level'] == 114 | $r['id_level'] == 115|| $r['id_level'] == 116|| $r['id_level'] == 117|| $r['id_level'] == 118|| $r['id_level'] == 119|| $r['id_level'] == 120|| $r['id_level'] == 121|| $r['id_level'] == 122|| $r['id_level'] == 123|| $r['id_level'] == 124|| $r['id_level'] == 125|| $r['id_level'] == 126|| $r['id_level'] == 127|| $r['id_level'] == 128|| $r['id_level'] == 129|| $r['id_level'] == 130|| $r['id_level'] == 132|| $r['id_level'] == 133) {
      ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="sharedata_91.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-suitcase"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    <?php
    } else if($r['id_level'] == 130){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="sharedata_1.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li> <a href="database.php"><i class="icon icon-suitcase"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  <?php
    } else if($r['id_level'] == 4|| $r['id_level'] == 5 || $r['id_level'] == 6 || $r['id_level'] == 7 || $r['id_level'] == 8 || $r['id_level'] == 9 || $r['id_level'] == 10 || $r['id_level'] == 11 || $r['id_level'] == 12 || $r['id_level'] == 13|| $r['id_level'] == 14|| $r['id_level'] == 15|| $r['id_level'] == 16|| $r['id_level'] == 17|| $r['id_level'] == 18|| $r['id_level'] == 19|| $r['id_level'] == 20|| $r['id_level'] == 21|| $r['id_level'] == 21|| $r['id_level'] == 23|| $r['id_level'] == 24|| $r['id_level'] == 25|| $r['id_level'] == 26|| $r['id_level'] == 27|| $r['id_level'] == 28|| $r['id_level'] == 29|| $r['id_level'] == 30|| $r['id_level'] == 31|| $r['id_level'] == 32|| $r['id_level'] == 33|| $r['id_level'] == 34|| $r['id_level'] == 35|| $r['id_level'] == 36|| $r['id_level'] == 37|| $r['id_level'] == 38|| $r['id_level'] == 39|| $r['id_level'] == 40|| $r['id_level'] == 41|| $r['id_level'] == 42|| $r['id_level'] == 43|| $r['id_level'] == 44|| $r['id_level'] == 45|| $r['id_level'] == 46|| $r['id_level'] == 47|| $r['id_level'] == 48|| $r['id_level'] == 49|| $r['id_level'] == 50|| $r['id_level'] == 51|| $r['id_level'] == 52|| $r['id_level'] == 53  ){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 5){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li class="active"> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
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
    <div id="breadcrumb"> <a href="entri_order.php" title="Go to here" class="tip-bottom"><i class="icon icon-cloud-upload"></i> Share Data</a></div>
  </div>
 
<!--End-breadcrumbs-->
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span8">
      <div class="widget-box">
        <div class="widget-content nopadding">  
        <form action="" method="GET" class="form-horizontal">
        <div class="control-group">
               <label class="control-label">Database :</label>
              <div class="controls">
        <select class=span6 name="form_database" id="form_database">
				<option value="">--Pilih Database--</option>
					
					<?php
					// Load file koneksi.php
					include "connection/koneksi.php";
					
					// Buat query untuk menampilkan semua data siswa
					$sql = mysqli_query($conn, "SELECT * FROM tb_91 GROUP BY keterangan ORDER by keterangan");
			
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<option value='".$data['keterangan']."'>".$data['keterangan']."</option>";
					}
					?>
				</select>
        </div>
        <div class="control-group">
              <label class="control-label">Kota/Kabupaten :</label>
              <div class="controls">
            <select class=span6 id="form_kota" name="form_kota">
            <option value="">--Pilih Kota--</option>
                    
        </select>
         </div>
            <div class="control-group">
              <label class="control-label">Kecamatan :</label>
              <div class="controls">
            <select class=span6 id="form_kec" name="form_kec">
            <option value="">--Pilih Kecamatan--</option>
                    
        </select>
         </div>
              <div class="control-group">
              <label class="control-label">Kelurahan :</label>
              <div class="controls">
            <select class=span6 id="form_kel" name="form_kel">
            <option value="">--Pilih Kelurahan--</option>
                    
        </select>
            <input type="submit" value="Tampilkan">
              </div>
               </div>
              <script type="text/javascript">
		$(document).ready(function(){

			// sembunyikan form kabupaten, kecamatan dan desa
		
			// ambil data kabupaten ketika data memilih provinsi
			$('body').on("change","#form_database",function(){
				var id = $(this).val();
				var data = "id="+id+"&data=kota";
				$.ajax({
					type: 'POST',
					url: "option_91.php",
					data: data,
					success: function(hasil) {
						$("#form_kota").html(hasil);
						$("#form_kota").show();
						$("#form_kec").show();
						$("#form_kel").show();
					}
				});
			});

			// ambil data kecamatan/kota ketika data memilih kabupaten
			$('body').on("change","#form_kota",function(){
				var id = $(this).val();
				var data = "id="+id+"&data=kecamatan";
				$.ajax({
					type: 'POST',
					url: "option_91.php",
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
					url: "option_91.php",
					data: data,
					success: function(hasil) {
						$("#form_kel").html(hasil);
						$("#form_kel").show();
					}
				});
			});
		});
		</script>
              
            
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
       <script type="text/javascript">
 function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox' ) {
                  checkboxes[i].checked = true;
              }
          }
      } else {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox') {
                  checkboxes[i].checked = false;
              }
          }
      }
  }
</script>
</div>

         <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-content nopadding">
        <form action="#" method="POST">
        <table class="table table-bordered" style="width: 100%">
                    <thead>
                      <tr>
                        
                        <th style="width:1%"><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></th>
                        <th style="width:15%">Nama Pensiunan</th>
                        <th style="width:10%">Gapok</th>
                        <th style="width:10%">Usia</th>
                        <th style="width:10%">Tahun Pensiun</th>
                        <th style="width:10%">Kota</th>
                        <th style="width:10%">Kecamatan</th>
                        <th style="width:10%">Kelurahan</th>
                        <th style="width:10%">Database</th>
                        <th style="width:15%">Alamat Peserta</th>
                        
                   

                      </tr>
                    </thead>
                    <?php
                      include "connection/koneksi.php";
                      $limit = 10;
                      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
                      $limitStart = ($page - 1) * $limit;
                      ?>
           <?php
            if (isset($_GET['form_database'],$_GET['form_kota'], $_GET['form_kec'], $_GET['form_kel'])) {
                $dataket=trim($_GET['form_database']);
                $datakota=trim($_GET['form_kota']);
                $datakec=trim($_GET['form_kec']);
                $datakel=trim($_GET['form_kel']);

                $tamPeg=mysqli_query($conn, "SELECT * FROM tb_91 WHERE kecamatan='$datakec' AND kota='$datakota' AND kelurahan='$datakel' AND keterangan='$dataket' ORDER BY id_91 DESC");
            
                $no = 1;
                while ($tpeg = mysqli_fetch_array($tamPeg)) {
                  
                
                ?>
                
            <tbody>
            
                  
                <tr>
                <td><input type="checkbox" name="kirim[]" value="<?php echo $tpeg['id_91'];?>"></td>
                    <td><?php echo $tpeg['nama_penerima'];?></td>
                    <td><?php echo $tpeg['penpok'];?></td>
                    <td><?php echo $tpeg['usia'];?></td>
                    <td><?php echo $tpeg['thn_skr'];?></td>
                    <td><?php echo $tpeg['kota'];?></td>
                    <td><?php echo $tpeg['kecamatan'];?></td>
                    <td><?php echo $tpeg['kelurahan'];?></td>
                    <td><?php echo $tpeg['keterangan'];?></td>
                    <td><?php echo $tpeg['alamat_peserta'];?></td>
                    
                   
                </tr>
               
            </tbody>
    
                </div>
                     
            <?php
            }
                }
              }
            
            ?>
            <div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
         
        <form action="" method="post" class="form-horizontal">
        <div class="control-group">
               <label class="control-label">Kirim Ke Sales Officer :</label>
              <div class="controls">
        <select class=span3 name="form_so" id="form_so">
				<option value="">--Pilih SO--</option>
                	<?php
					// Load file koneksi.php
					include "connection/koneksi.php";
					
					// Buat query untuk menampilkan semua data siswa
					$sql = mysqli_query($conn, "SELECT * FROM tb_sales_officer ORDER by nama_sales_officer");
			
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<option value='".$data['id_sales_officer']."'>".$data['id_sales_officer']." - ".$data['nama_sales_officer']." - ".$data['cabang']."</option>";
					}
					?>
				</select>
            <form action="" method="post">
                <button name="kirimso" value="<?php echo $tpeg['id_91']; ?>" class="btn btn-basic">Kirim</button>
                </div>
        </table>
        
        <script
  src="https://code.jquery.com/jquery-3.6.3.min.js">
  </script>
        <script>
          function select_all(){
            jQuery('input[type=checkbox]').each(function(){
            jQuery('#'+this.id).prop('checked',true);
            });
          }
          </script>
           
        
        <?php
        if(isset($_POST['form_so'])){
             $datamr = $_POST['form_so'];
            if($datamr=="1"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_1 (id_1,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="2"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_2 (id_2,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="3"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_3 (id_3,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="4"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_4 (id_4,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="5"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_5 (id_5,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="6"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_6 (id_6,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="7"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_7 (id_7,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="8"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_8 (id_8,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="9"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_9 (id_9,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="10"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_10 (id_10,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="11"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_11 (id_11,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="12"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_12 (id_12,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="13"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_13 (id_13,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="14"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_14 (id_14,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="15"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_15 (id_15,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="16"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_16 (id_16,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="17"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_17 (id_17,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="18"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_18 (id_18,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="19"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_19 (id_19,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="20"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_20 (id_20,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="21"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_21 (id_21,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="22"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_22 (id_22,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="23"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_23 (id_23,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="24"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_24 (id_24,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="25"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_25 (id_25,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="26"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_26 (id_26,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="27"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_27 (id_27,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="28"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_28 (id_28,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="29"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_29 (id_29,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="30"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_30 (id_30,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="31"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_31 (id_31,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="32"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_32 (id_32,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="33"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_33 (id_33,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="34"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_34 (id_34,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="35"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_35 (id_35,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="36"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_36 (id_36,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="37"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_37 (id_37,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="38"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                   $query_kirimso = "insert into tb_38 (id_38,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="39"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_39 (id_39,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="40"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_40 (id_40,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="41"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_41 (id_41,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="42"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_42 (id_42,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="43"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_43 (id_43,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="44"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_44 (id_44,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="45"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_45 (id_45,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="46"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_46 (id_46,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="47"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_47 (id_47,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="48"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_48 (id_48,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="49"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_49 (id_49,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                     $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="50"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_50 (id_50,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                      $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="51"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_128 (id_128,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                      $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="52"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_131(id_131,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                      $query_delete = "delete from tb_91 where id_91 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }if($datamr=="53"){
                  if(isset($_POST['kirimso']) && isset($_POST['kirim'])){
                    $id_100 = $_POST['kirimso'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimso = "insert into tb_132(id_132,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_100,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_100 where id_100 = $kirim";
                    $sql_kirimso = mysqli_query($conn, $query_kirimso );
                      $query_delete = "delete from tb_100 where id_100 = $kirim";
                    $sql_delete = mysqli_query($conn, $query_delete);
                    if($sql_delete){
                      header('location: sharedata.php');}
                    }
                  }
            }
            
                  } if(isset($_POST['form_tl'])){
             $datatl = $_POST['form_tl'];
            if($datatl=="1"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_91 (id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="2"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_52 (id_52,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="3"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_53 (id_53,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="4"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_54 (id_54,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="5"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_55 (id_55,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="6"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_56 (id_56,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="7"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_57 (id_57,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="8"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_58 (id_58,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="9"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_59 (id_59,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="10"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_60 (id_60,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="11"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_61 (id_61,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="12"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_62 (id_62,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="13"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_63 (id_63,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="14"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_64 (id_64,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="15"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_65 (id_65,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="16"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_66 (id_66,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="17"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_67 (id_67,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="18"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_68 (id_68,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="19"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_69 (id_69,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="20"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_70 (id_70,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="21"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_71 (id_71,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="22"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_72 (id_72,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="23"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_73 (id_73,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="24"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_74 (id_74,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="25"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_75 (id_75,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="26"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_76 (id_76,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="27"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_77 (id_77,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="28"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_78 (id_78,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="29"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_79 (id_79,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="30"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_80 (id_80,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="31"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_81 (id_81,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="32"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_82 (id_82,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="33"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_83 (id_83,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="34"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_84 (id_84,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="35"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_85 (id_85,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="36"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_86 (id_86,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="37"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_87 (id_87,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="38"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_88 (id_88,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="39"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_89 (id_89,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="40"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_90 (id_90,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="41"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_91 (id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="42"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_92 (id_92,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="43"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_93 (id_93,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="44"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_94 (id_94,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="45"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_95 (id_95,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="46"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_96 (id_96,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="47"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_97 (id_97,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="48"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_98 (id_98,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="49"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_99 (id_99,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="50"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_100 (id_100,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="51"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_101 (id_101,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="52"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_102 (id_102,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="53"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_103 (id_103,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="54"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_104 (id_104,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="55"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_105 (id_105,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="56"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_106 (id_106,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="57"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_107 (id_107,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="58"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_108 (id_108,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="59"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_109 (id_109,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="60"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_110 (id_110,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="61"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_111 (id_111,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="62"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_112 (id_112,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="63"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_113 (id_113,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="64"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_114 (id_114,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="65"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_115 (id_115,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="66"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_116 (id_116,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="67"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_117 (id_117,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="68"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_118 (id_118,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="69"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_119 (id_119,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="70"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_120 (id_120,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="71"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_121 (id_121,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="72"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_122 (id_122,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="73"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_123 (id_123,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="78"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_124 (id_124,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="75"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_125 (id_125,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="76"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_126 (id_126,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="77"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_127 (id_127,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }if($datatl=="78"){
                  if(isset($_POST['kirimtl']) && isset($_POST['kirim'])){
                    $id_91 = $_POST['kirimtl'];
                    foreach($_POST["kirim"] as $kirim){
                    $query_kirimtl = "insert into tb_132 (id_132,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker)select id_91,notas,penpok,thp,nama_penerima,tgl_lahir_penerima,thn_skr,usia,alamat_peserta,keterangan,kelurahan,kecamatan,kota,nmkanbyr,tmtpensiun,nomor_skep,telepon,awal_flag,akhir_flag,thn_pens,nmsatker from tb_91 where id_91 = $kirim";
                    $sql_kirimtl = mysqli_query($conn, $query_kirimtl );
                    }
                  }
                    }
        ?>
                <?php
               
    ?>
    <?php
              ?>
              
                          
        </div>
      </div>
    </div>
  </div>
</div>
</div>
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