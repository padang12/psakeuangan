<?php
include "database/koneksi.php"; 
$no = $_GET["no"];

mysqli_query($koneksi, "UPDATE tb_coa SET status='Inaktive' WHERE no_akun='$no'");
?>
 <SCRIPT> //not showing me this
 alert('Hapus Success');
 window.location.replace('index.php?p=masterdata/coa');
</SCRIPT>