<?php
include "../database/koneksi.php";

$supp = $_POST["supp"];

$sql = "select * from tb_hutangusaha where no_supplier='$supp' and status='Belum Lunas'";
$hasil = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_array($hasil)) {
	?>
	<option value="<?php echo  $data['no_trxhutang']; ?>"><?php echo $data['no_trxhutang']; ?></option>
	<?php
}

?>