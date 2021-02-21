<?php 
$harga = $_POST['harga'];
$tanggal = date('Y-m-d');
$invoice = $_POST['no_invoice'];
$kode_customer = $_POST['kode_customer'];
$tgl_transaksi = $_POST['tgl_transaksi'];
$tempo=$_POST['tempo'];
if($_POST['pembayaran']=='CASH') {
  mysqli_query($koneksi,"INSERT INTO tb_jurnalumum VALUES('','$tanggal','1-110 - kas','$invoice','pendapatan jasa','$harga','')");
  mysqli_query($koneksi,"INSERT INTO tb_jurnalumum VALUES('','$tanggal','4-110 - Pendapatan Jasa','$invoice','pendapatan jasa','','$harga')");

  ?>
  <SCRIPT>
    alert('Silahkan Cetak Invoice');
    window.location.replace('dashboard.php?p=cetak/invoice_cash&no_invoice=<?php echo $invoice?>&kode_customer=<?php echo $kode_customer ?>');
  </SCRIPT>;
  <?php 

}elseif($_POST['pembayaran']=='TEMPO'){
  mysqli_query($koneksi,"INSERT INTO tb_jurnalumum VALUES('','$tanggal','1-120 - Piutang Usaha','$invoice','pendapatan jasa','$harga','')");
  mysqli_query($koneksi,"INSERT INTO tb_jurnalumum VALUES('','$tanggal','4-110 - Pendapatan Jasa','$invoice','pendapatan jasa','','$harga')");
  mysqli_query($koneksi,"INSERT INTO tb_piutang VALUES('','$tgl_transaksi','$invoice','$kode_customer','$harga','','')")
  ?>
  <SCRIPT>
    alert('Silahkan Cetak Invoice');
    window.location.replace('?p=cetak/invoice_tempo&no_invoice=<?php echo $invoice?>&kode_customer=<?php echo $kode_customer ?>');
  </SCRIPT>;
<?php }else{ ?>
  <SCRIPT> //not showing me this
  alert('Maaf Belum tersedia');
  window.location.replace('dashboard.php?p=inputdata/cetak_invoice&harga=91000&invoice=001/C-003/012020&kode_customer=C-002');
</SCRIPT>
<?php 
}
?>