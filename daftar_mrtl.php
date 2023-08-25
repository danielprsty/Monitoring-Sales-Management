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
<title>MSM : Daftar MR/TL</title>
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
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"/>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="entri_order.php">Daftar MR/TL</a></h1>
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
<div id="sidebar"><a href="entri_order.php" class="visible-phone"><i class="icon shopping-cart"></i> <span>Daftar SO/TL</span></a>
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
    <li class="active"> <a href="daftar_mrtl.php"><i class="icon icon-tasks"></i> <span>Daftar SO/TL</span></a> </li>
    <li> <a href="pensiunan.php"><i class="icon icon-suitcase"></i> <span>Database</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="report.php"><i class="icon icon-print"></i> <span>Report</span><i class="icon icon-angle-right"></i></a> </li>
    <li> <a href="approve.php"><i class="icon icon-list-alt"></i> <span>Hasil Kunjungan</span><i class="icon icon-angle-right"></i></a> </li>
    

  <?php
    } else if($r['id_level'] == 2){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li class="active"> <a href="entri_order.php"><i class="icon icon-shopping-cart"></i> <span>Entri Order</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 3){
  ?>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li> <a href="entri_transaksi.php"><i class="icon icon-inbox"></i> <span>Entri Transaksi</span></a> </li>
    <li> <a href="generate_laporan.php"><i class="icon icon-print"></i> <span>Generate Laporan</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  <?php
    } else if($r['id_level'] == 4){
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
    <div id="breadcrumb"> <a href="entri_order.php" title="Go to here" class="tip-bottom"><i class="icon icon-tasks"></i> Daftar SO/TL</a></div>
  </div>
    <?php
                  $query_data_data = "select * from tb_mrtl natural join tb_bagian";
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
                <th>No</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Wilayah</th>
                <th>Nomor HP</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
               <?php
                     
                        while($r_dt_data = mysqli_fetch_array($sql_data_data)){
                      ?>
                        <tr class="odd gradeX">
                          <td><center><?php echo $no++; ?>.</center></td>
                          <td><?php echo $r_dt_data['nama']; ?></td>
                          <td><?php echo $r_dt_data['nama_bagian']; ?></td>
                          <td><?php echo $r_dt_data['wilayah_kerja']; ?></td>
                          <td><?php echo $r_dt_data['no_telp']; ?></td>
                          <td>
                            <form action="" method="post">                  
                                <button name="hapus_data" value="<?php echo $r_dt_data['id_mrtl']; ?>" class="btn btn-danger"><i class='icon icon-trash'></i></button>
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $r_dt_data['id_mrtl']; ?>"> <i class='icon icon-pencil'></i></a>
                               
            <div class="modal fade" id="modal<?php echo $r_dt_data['id_mrtl']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <div class="modal-body">
                        <form action="" method="post" class="form-horizontal">
                            <input name="id_mrtl" type="hidden" value="<?php echo $r_dt_data['id_mrtl']; ?>">
                        <div class="form-group">
                                <label>Nama SO/TL</label>
                                <input name="nama" type="text" class="form-control" value="<?php echo $r_dt_data['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Posisi</label>
                                <select name="id_bagian">
                  <option type="text" class="form-control" value="<?php echo $r_dt_data['id_bagian']; ?>"</option></option>
                  <option value="1">SO</option>
                  <option value="2">TL</option>
                </select>
                            </div>
                            <div class="form-group">
                                <label>No.Telepon</label>
                                <input name="no_telp" type="text" class="form-control" value="<?php echo $r_dt_data['no_telp']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Wilayah Kerja</label>
                                <input name="wilayah_kerja" type="text" class="form-control" value="<?php echo $r_dt_data['wilayah_kerja']; ?>">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit"  name="kirim_simpan" class="btn btn-primary"><i class='icon icon-save'></i>&nbsp; Save changes</button>
                    </div>
                </div>
            </div>
        </div>   
                        
                              </form>
                                    <?php
            if(isset($_POST['kirim_simpan'])){
            $id_mrtl = $_POST['id_mrtl'];    
            $nama = $_POST['nama'];
            $id_bagian = $_POST['id_bagian'];
            $no_telp = $_POST['no_telp'];
            $wilayah_kerja = $_POST['wilayah_kerja'];
             
              //echo "<br>";
              //echo $nama . " || " . $id_posisi . " || " . $no_telp . " || " . $wilayah_kerja;
              //echo "<br></br>";
              $query_simpan = "update tb_mrtl set nama='$nama',id_bagian='$id_bagian',no_telp='$no_telp',wilayah_kerja='$wilayah_kerja' where id_mrtl='$id_mrtl'";
              $sql_simpan = mysqli_query($conn, $query_simpan);
              if($sql_simpan){
                header('location: daftar_mrtl.php');
                $_SESSION['simpan'] = 'sukses';
              }
            }
          ?>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>           
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
                <?php
                  if(isset($_POST['hapus_data'])){
                    $id_mrtl = $_POST['hapus_data'];
                    //echo $id_mrtl;
                    $query_hapus_data = "delete from tb_mrtl where id_mrtl = $id_mrtl";
                    $sql_hapus_data = mysqli_query($conn, $query_hapus_data);
                    if($sql_hapus_data){
                      header('location: daftar_mrtl.php');
                      //$_SESSION['hapus'] = 'sukses';
                    }if(isset($_POST['edit_data'])){
                      $id_mrtl = $_POST['edit_data'];
                      //echo $id_mrtl;
                    }
            }
          ?>
          </div>
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
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
let table = new DataTable('#datatables');
    
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