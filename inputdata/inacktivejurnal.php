<?php
include "database/koneksi.php"; 
$no = $_GET["no"];
$sumber = "Jurnal Umum";

mysqli_query($koneksi, "UPDATE tb_jurnalumum SET debet='0', kredit = '0' WHERE id_jurnal='$no' AND sumber = '$sumber'");
?>
 <SCRIPT> 
 alert('Inactive');
 window.location.replace('index.php?p=inputdata/jurnalumum');
</SCRIPT>