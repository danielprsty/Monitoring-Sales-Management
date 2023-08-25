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
  
  //Jumlah pensiunan
  $query_jml_ps = "select count(*) AS jumlah_ps from tb_pensiunan";
  $sql_jml_ps = mysqli_query($conn, $query_jml_ps);
  $result_ps = mysqli_fetch_array($sql_jml_ps);

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
<div id="sidebar"><a href="pensiunan.php" class="visible-phone"><i class="icon icon-suitcase"></i> <span>Pensiunan</span></a>
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
    <li class="active"> <a href="pensiunan.php"><i class="icon icon-suitcase"></i> <span>Database</span></a> </li><i class="icon icon-angle-down"></i></a> </li>
    <li class="active"> <a href="pensiunan.php"><i class="icon icon-suitcase"></i> <span>Pensiunan</span></a> </li>
    <li> <a href="bup.php"><i class="icon icon-suitcase"></i> <span>BUP</span></a></a> </li><i class="icon icon-angle-right"></i> </li>
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
    } else if($r['id_level'] == 54|| $r['id_level'] == 55 || $r['id_level'] == 56 || $r['id_level'] == 57 || $r['id_level'] == 58 || $r['id_level'] == 59 || $r['id_level'] == 60 || $r['id_level'] == 61 || $r['id_level'] == 62 || $r['id_level'] == 63|| $r['id_level'] == 64|| $r['id_level'] == 65|| $r['id_level'] == 66|| $r['id_level'] == 67|| $r['id_level'] == 68|| $r['id_level'] == 69|| $r['id_level'] == 70|| $r['id_level'] == 71|| $r['id_level'] == 72|| $r['id_level'] == 73|| $r['id_level'] == 74|| $r['id_level'] == 75|| $r['id_level'] == 76|| $r['id_level'] == 77|| $r['id_level'] == 78|| $r['id_level'] == 79|| $r['id_level'] == 80|| $r['id_level'] == 81|| $r['id_level'] == 82|| $r['id_level'] == 83|| $r['id_level'] == 84|| $r['id_level'] == 85|| $r['id_level'] == 86|| $r['id_level'] == 87|| $r['id_level'] == 88|| $r['id_level'] == 89|| $r['id_level'] == 90|| $r['id_level'] == 91| $r['id_level'] == 92|| $r['id_level'] == 93|| $r['id_level'] == 94|| $r['id_level'] == 95|| $r['id_level'] == 96|| $r['id_level'] == 97|| $r['id_level'] == 98|| $r['id_level'] == 99|| $r['id_level'] == 100|| $r['id_level'] == 101|| $r['id_level'] == 102|| $r['id_level'] == 103 | $r['id_level'] == 104|| $r['id_level'] == 105|| $r['id_level'] == 106|| $r['id_level'] == 107|| $r['id_level'] == 108|| $r['id_level'] == 109|| $r['id_level'] == 110|| $r['id_level'] == 111|| $r['id_level'] == 112|| $r['id_level'] == 113|| $r['id_level'] == 114 | $r['id_level'] == 115|| $r['id_level'] == 116|| $r['id_level'] == 117|| $r['id_level'] == 118|| $r['id_level'] == 119|| $r['id_level'] == 120|| $r['id_level'] == 121|| $r['id_level'] == 122|| $r['id_level'] == 123|| $r['id_level'] == 124|| $r['id_level'] == 125|| $r['id_level'] == 126|| $r['id_level'] == 127|| $r['id_level'] == 128) {
      ?>
   <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="sharedata_tl.php"><i class="icon icon-cloud-upload"></i> <span>Share Data</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
     <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
  <?php
        } else if($r['id_level'] == 4|| $r['id_level'] == 5 || $r['id_level'] == 6 || $r['id_level'] == 7 || $r['id_level'] == 8 || $r['id_level'] == 9 || $r['id_level'] == 10 || $r['id_level'] == 11 || $r['id_level'] == 12 || $r['id_level'] == 13|| $r['id_level'] == 14|| $r['id_level'] == 15|| $r['id_level'] == 16|| $r['id_level'] == 17|| $r['id_level'] == 18|| $r['id_level'] == 19|| $r['id_level'] == 20|| $r['id_level'] == 21|| $r['id_level'] == 21|| $r['id_level'] == 23|| $r['id_level'] == 24|| $r['id_level'] == 25|| $r['id_level'] == 26|| $r['id_level'] == 27|| $r['id_level'] == 28|| $r['id_level'] == 29|| $r['id_level'] == 30|| $r['id_level'] == 31|| $r['id_level'] == 32|| $r['id_level'] == 33|| $r['id_level'] == 34|| $r['id_level'] == 35|| $r['id_level'] == 36|| $r['id_level'] == 37|| $r['id_level'] == 38|| $r['id_level'] == 39|| $r['id_level'] == 40|| $r['id_level'] == 41|| $r['id_level'] == 42|| $r['id_level'] == 43|| $r['id_level'] == 44|| $r['id_level'] == 45|| $r['id_level'] == 46|| $r['id_level'] == 47|| $r['id_level'] == 48|| $r['id_level'] == 49|| $r['id_level'] == 50|| $r['id_level'] == 51|| $r['id_level'] == 52|| $r['id_level'] == 53   ) {
      ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="input_data.php"><i class="icon icon-plus"></i> <span>Tambah Data Pengajuan</span></a> </li>
    <li> <a href="monitoring.php"><i class="icon icon-desktop"></i> <span>Monitoring</span></a> </li>
    <li class="active"> <a href="database.php"><i class="icon icon-print"></i> <span>Database</span></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
  
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
    <div id="breadcrumb"> <a href="entri_order.php" title="Go to here" class="tip-bottom"><i class="icon icon-suitcase"></i> Database Pensiunan</a></div>
  </div>
   <?php
      if($r['id_level'] == 1){
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
                        <th>Kantor Bayar</th>
                        <th>Tamat Pensiun</th>
                        <th>Nomor Skep</th>
                        <th>Telepon</th>
                        <th>Awal Flag</th>
                        <th>Akhir Flag</th>
                        

                      </tr>
                    </thead>
                    <tbody>
                      
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
<script src="template/dashboard/js/matrix.tables.js"></script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
<script>
$(function(){

             $('#datatables').DataTable({
               "processing": true,
              "serverSide": true,
              "responsive": {
                 "details": {
                "display": $.fn.dataTable.Responsive.display.modal( {
                  
                   
                } ),
                "renderer": $.fn.dataTable.Responsive.renderer.tableAll()
            }
                    },
              "ajax":{
                       "url": "ajax/ajax_pensiunan.php?action=table_data",
                       "dataType": "json",
                       "type": "POST"
                     },
              "columns": [
                  { "data": "no" },
                   { "data": "nama_penerima" },
                  { "data": "usia" },
                  { "data": "thn_skr" },
                  { "data": "kota" },
                  { "data": "tgl_lahir_penerima" },
                   { "data": "alamat_peserta" },
                  { "data": "penpok" },
                  { "data": "thp" },
                  { "data": "kecamatan" },
                  { "data": "kelurahan" },
                  { "data": "nmkanbyr" },
                   { "data": "tmtpensiun" },
                  { "data": "nomor_skep" },
                  { "data": "telepon" },
                  { "data": "awal_flag" },
                  { "data": "akhir_flag" },
                  
              ]  
           
          });
        });
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