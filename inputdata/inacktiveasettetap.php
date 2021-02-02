<?php
include "database/koneksi.php"; 
$no = $_GET["no"];
$sumber = "Aset Tetap";

mysqli_query($koneksi, "UPDATE tb_asettetap SET nilai='0', qty = '0', total = '0', kelompok = '0', umur_ekonomis = '0' WHERE no='$no'");

mysqli_query($koneksi, "UPDATE tb_jurnalumum SET debet='0', kredit = '0' WHERE id_jurnal='$no' AND sumber = '$sumber'");
?>
 <SCRIPT> 
 alert('Inactive');
 window.location.replace('dashboard.php?p=inputdata/dataasettetap');
</SCRIPT>