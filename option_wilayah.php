<?php 
include 'connection/koneksi.php';

$data = $_POST['data'];
$id = $_POST['id'];


// $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));
?>
<?php 
if($data == "kecamatan"){
	?>
	Kecamatan
	<select id="form_kec">
		<option value="">--Pilih Kecamatan--</option>
		<?php 
		$sql = mysqli_query($conn,"SELECT kecamatan FROM wilayah WHERE kota='$id' GROUP BY kecamatan ORDER BY kecamatan");

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
		$sql = mysqli_query($conn,"SELECT kelurahan FROM wilayah WHERE kecamatan='$id' GROUP BY kelurahan ORDER BY kelurahan");

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