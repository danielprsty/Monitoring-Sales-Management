<?php 
include 'connection/koneksi.php';

$data = $_POST['data'];
$id = $_POST['id'];


// $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));
?>
<?php 
if($data == "kota"){
	?>
	Kota
	<select id="form_kota">
		<option value="">--Pilih Kota--</option>
		<?php 
		$sql = mysqli_query($conn,"SELECT kota FROM tb_85 WHERE keterangan='$id' GROUP BY kota ORDER BY kota");

		while($d = mysqli_fetch_array($sql)){
			?>
			<option value="<?php echo $d['kota']; ?>"><?php echo $d['kota']; ?></option>
			<?php 
		}
		?>
	</select>
<?php 
}else if($data == "kecamatan"){
	?>
	Kecamatan
	<select id="form_kec">
		<option value="">--Pilih Kecamatan--</option>
		<?php 
		$sql = mysqli_query($conn,"SELECT kecamatan FROM tb_85 WHERE kota='$id' GROUP BY kecamatan ORDER BY kecamatan");

		while($d = mysqli_fetch_array($sql)){
			?>
			<option value="<?php echo $d['kecamatan']; ?>"><?php echo $d['kecamatan']; ?></option>
			<?php 
		}
		?>
	</select>

	<?php 
}else if($data == "kelurahan"){ 
	?>
	Kelurahan
	<select id="form_kel">
		<option value="">--Pilih Kelurahan--</option>
		<?php 
		$sql = mysqli_query($conn,"SELECT kelurahan FROM tb_85 WHERE kecamatan='$id' GROUP BY kelurahan ORDER BY kelurahan");

		while($d = mysqli_fetch_array($sql)){
			?>
			<option value="<?php echo $d['kelurahan']; ?>"><?php echo $d['kelurahan']; ?></option>
			<?php 
		}
		?>
	</select>
	<?php 

}
?>