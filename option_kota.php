<?php 
include 'connection/koneksi.php';

$data = $_POST['data'];
$id = $_POST['id'];


// $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));
?>
<?php 
if($data == "kota"){
	?>
	Kecamatan
	<select id="form_kota">
		<option value="">--Pilih Kota--</option>
		<?php 
		$sql = mysqli_query($conn,"SELECT kota FROM tb_database WHERE keterangan='$id' GROUP BY kota ORDER BY kota");

		while($d = mysqli_fetch_array($sql)){
			?>
			<option value="<?php echo $d['kota']; ?>"><?php echo $d['kota']; ?></option>
			<?php 
		}
		?>
	</select>
<?php 
}
?>