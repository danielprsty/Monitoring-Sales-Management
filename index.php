<!DOCTYPE html>
<?php
	include "connection/koneksi.php";
	session_start();
	if(isset ($_SESSION['username'])){
		header('location: beranda.php');
	} else {
?>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->

	<link rel="icon" type="image/png" href="template/masuk/images/icons/favicon2.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/masuk/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/masuk/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/masuk/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/masuk/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template/masuk/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/masuk/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/masuk/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/masuk/css/main.css">
	<!-- jQuery -->
	<script src="template/dashboard/js/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="template/dashboard/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="template/dashboard/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="template/dashboard/js/alert.js"></script>
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('template/masuk/images/img-01.jpg');">
			<div class="wrap-login100 p-t-120 p-b-30">
				<form action="" method="post" class="login100-form validate-form">
					<?php 
						if(isset($_SESSION['eror'])){
					?>
						<div class='container'>	
							<div class = 'alert alert-danger'>
								<span>
									<center>Mungkin Akun Anda Salah</center>
								</span>
							</div> 
						</div>
					<?php 
						unset($_SESSION['eror']);
						}
					?>
					<div class="login100-form-avatar">
						<img src="template/masuk/images/avatar3.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20">
						MONITORING
					</span>
					<span class="login100-form-title">
						SALES
					</span>
					<span class="login100-form-title p-b-20">
						MANAGEMENT
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>
					<?php 
						if(isset($_SESSION['username'])){
					?>
					<div class="text-center w-full">
						<a class="txt1" href="logout.php">
							Log Out
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
					<?php
						}
					?>
				</form>
					<div align="center">
<div id="footer" class="span12"> <strong> <font color='white'> <br> <?php echo date('Y'); ?> &copy; Monitoring Sales Management <br>by ParagraphNet</strong> </div>
			</div>
		</div>
	</div>

	<?php
		if(isset ($_REQUEST['login'])){
			
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];

			$akun = mysqli_query($conn, "select * from tb_user");
			echo mysqli_error($conn);
			while($r = mysqli_fetch_array($akun)){
				if($r['username'] == $username and $r['password'] == $password){
					$_SESSION['username'] = $username;
					$_SESSION['id_user'] = $r['id_user'];
					$update_log = mysqli_query($conn, "update tb_user set last_login = 'AKTIF' where username = '$username'");
					echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'beranda.php';}
			})</script>";
				
				} else {
					$_SESSION['eror'] = 'salah';
					header('location: index.php');
					echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'index.php';}
			})</script>";
				}
			} 
		} 
	?>
	
	

	
<!--===============================================================================================-->	
	<script src="template/masuk/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="template/masuk/vendor/bootstrap/js/popper.js"></script> 
	<script src="template/masuk/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="template/masuk/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="template/masuk/js/main.js"></script>

</body>
</html>
<?php
	}
?>