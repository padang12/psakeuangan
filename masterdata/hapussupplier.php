<?php
include "database/koneksi.php"; 
$no = $_GET["no"];
mysqli_query($koneksi,"DELETE FROM tb_supplier WHERE no_supplier = '$no'");

 ?>
 <SCRIPT> //not showing me this
alert('Hapus Success');
window.location.replace('dashboard.php?p=masterdata/supplier');
</SCRIPT>