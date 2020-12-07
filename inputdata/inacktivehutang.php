<?php
include "database/koneksi.php"; 
$no = $_GET["no"];
$sumber = "Hutang Usaha";

mysqli_query($koneksi, "UPDATE tb_hutangusaha SET nilai='0', sisahutang = '0', status = 'Lunas' WHERE no_trxhutang='$no'");

mysqli_query($koneksi, "UPDATE tb_jurnalumum SET debet='0', kredit = '0' WHERE id_jurnal='$no' AND sumber = '$sumber'");
?>
 <SCRIPT> 
 alert('Inactive');
 window.location.replace('index.php?p=inputdata/hutangusaha');
</SCRIPT>