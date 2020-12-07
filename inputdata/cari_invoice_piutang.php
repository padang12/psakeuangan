<?php
include "../database/koneksi.php";

$supp = $_POST["supp"];

$sql = "select * from tb_piutang where kd_customer='$supp'";
$hasil = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_array($hasil)) {
	?>
	<option value="<?php echo  $data['no_invoice']; ?>"><?php echo $data['no_invoice']; ?></option>
	<?php
}

?>