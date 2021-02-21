<?php
include "database/koneksi.php"; 
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tb_kapal where id='$id'");
?>
 <SCRIPT> //not showing me this
 alert('Hapus Success');
 window.location.replace('dashboard.php?p=masterdata/kapal');
</SCRIPT>