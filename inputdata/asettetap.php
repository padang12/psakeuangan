<?php 
error_reporting(0);
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no) as kodeTerbesar FROM tb_asettetap");
$data = mysqli_fetch_array($query);
$No = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($No, 1, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
 $date=date('Y');
$huruf = "/AST/PSA-KTP/$date";
$No = sprintf("%03s", $urutan) . $huruf;
?>
<div class="row">
  <div class="col-md-12 ">

    <div class="x_panel ">
      <div class="x_title">
        <h2>Form Aset Tetap</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-label-left input_mask" method="post">

          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" required="" name="no" class="form-control" readonly value="<?php echo $No; ?>">
            </div>

            <label class="col-form-label col-md-1">Tanggal :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="date" required="" name="tgl" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Tipe Bayar :</label>
            <div class="col-md-4 col-sm-4 ">
              <select class="select2 form-control" required="" name="tipebayar">
                <option>-- Pilih Akun --</option> 
                <?php 
                $data = mysqli_query($koneksi,"SELECT no_akun, nama_akun FROM tb_coa WHERE kat3 = 'Kas dan Bank' ORDER BY no_akun");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
                <?php } ?>
              </select>
            </div>
            <label class="col-form-label col-md-1">Tipe Aset :</label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2 form-control" required="" name="tipeaset">
                <option>-- Pilih Aset --</option> 
                <?php 
                $data = mysqli_query($koneksi,"SELECT no_akun, nama_akun FROM tb_coa WHERE kat2 = 'Aset Tetap' AND saldo_normal = 'Debit' ORDER BY no_akun");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">

          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Nama Aset :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" class="form-control" required="" name="nmaset" placeholder="Nama Aset">
            </div>
            <label class="col-form-label col-md-1">Nilai :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="Number" class="form-control" onkeyup="sum()" required="" id="txt1" name="nilai" placeholder="Rp. ">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Qty :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="Number" onkeyup="sum()" class="form-control" id="txt2" required="" name="qty">
            </div>
            <label class="col-form-label col-md-1">Total :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="Number" onkeyup="sum()" readonly class="form-control" id="total" required="" name="total">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Keterangan :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" class="form-control" required="" name="ket" placeholder="Keterangan">
            </div>
            <label class="col-form-label col-md-1">Kelompok :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="Number" class="form-control" required="" name="kelompok" placeholder="Kelompok">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-md-2">Note :</label>
            <div class="col-md-4 col-sm-4 ">
             <textarea class="form-control" rows="3" required="" name="note"></textarea>
           </div>
           <label class="col-form-label col-md-2">Umur Ekonomis (Tahun) :</label>
           <div class="col-md-4 col-sm-4 ">
            <input type="Number" class="form-control" required="" name="umureko" placeholder="Tahun">
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group row">
          <div class="col-md-9 col-sm-9  offset-md-0">
            <button type='submit' name="submit" class="btn btn-success">Submit</button>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>
</div>
<script>
   function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }else{
        document.getElementById('total').value = 0;
      }
   }
</script>
<?php 

if(isset($_POST['submit'])) {
  $no = $_POST['no'];
  $tgl = $_POST['tgl'];
  $tipebayar = $_POST['tipebayar'];
  $tipeaset = $_POST['tipeaset'];
  $nmaset = $_POST['nmaset'];
  $qty = $_POST['qty'];
  $total = $_POST['total'];
  $nilai = $_POST['nilai'];
  $ket = $_POST['ket'];
  $kelompok = $_POST['kelompok'];
  $umureko = $_POST['umureko'];
  $note = $_POST['note'];
  // Insert user data into table
  mysqli_query($koneksi, "INSERT INTO tb_asettetap VALUES('','$no','$tgl','$tipebayar','$tipeaset','$nmaset','$nilai','$qty','$total','$ket','$kelompok','$umureko','$note')");
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('$no','$tgl','$tipeaset','$ket','$note','$total','','Aset Tetap')");
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('$no','$tgl','$tipebayar','$ket','$note','','$total','Aset Tetap')");
  
?> <SCRIPT> //not showing me this
alert('Input Success');
window.location.replace('index.php?p=inputdata/dataasettetap');
</SCRIPT><?php


}
?>