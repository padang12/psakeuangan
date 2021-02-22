<?php 
// error_reporting(0);
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_trxhutang) as kodeTerbesar FROM tb_hutangusaha");
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
$huruf = "/HTG/PSA-KTP/$date";
$No = sprintf("%03s", $urutan) . $huruf;
?>
<div class="row">
  <div class="col-md-12 ">

    <div class="x_panel ">
      <div class="x_title">
        <h2>HUTANG USAHA</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-label-left input_mask" method="post">

          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" required="" name="no_invoice" class="form-control" readonly value="<?php echo $No; ?>">
            </div>
            <label class="col-form-label col-md-1">Tanggal :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="date" id="datepicker" required="" id="tanggal" name="tanggal" class="form-control">
            </div>
          </div>
          <div class="form-group row">
<!--             <label class="col-form-label col-md-2">Kode Supplier :</label>
            <div class="col-md-4 col-sm-4 ">
              <select class="select2 form-control" required="" name="kode_supplier">
                <option>-- Pilih Kode --</option> 
                <?php 
                $data = mysqli_query($koneksi,"SELECT * FROM tb_supplier");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['no_supplier']; ?>"><?php echo $d['no_supplier']; ?> - <?php echo $d['nama_supplier']; ?></option> 
                <?php } ?>
              </select>
            </div> -->
            <label class="col-form-label col-md-2">Note :</label>
            <div class="col-md-4 col-sm-4 ">
              <textarea name="note" required="" class="form-control" placeholder="Note"></textarea>
            </div>
          </div>
          <div class="form-group row">

          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor / Nama Akun :</label>
            <div class="col-md-4 col-sm-4 ">
             <select class="select2 form-control" required="" name="kode_akun">
              <option>-- Pilih Akun --</option> 
              <?php 
              $data = mysqli_query($koneksi,"SELECT * FROM tb_coa where kat1='Biaya' ORDER BY no_akun");
              while($d = mysqli_fetch_array($data)){
                ?>
                <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
              <?php } ?>
            </select>            
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-md-2">Keterangan :</label>
          <div class="col-md-4 col-sm-4 ">
           <input type="text" class="form-control" required="" placeholder="Keterangan" name="keterangan">
         </div>
       </div>

       <div class="form-group row">
         <label class="col-form-label col-md-2">Nilai :</label>
         <div class="col-md-4 col-sm-4 ">
          <input type="number" name="nilai" required="" class="form-control" placeholder="Nilai">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group row">
        <div class="col-md-9 col-sm-9  offset-md-0">
          <button type='submit' name="submit" class="btn btn-success">Save</button>
          <!--  <button type='submit' name="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button> -->
        </div>
      </div>
    </form>
    <div class="ln_solid"></div>
    <div class="x_title">

        <!-- <form method="post">
          <input type="submit" value="Periode">
          <input type="date" name="periode">
          
        </form> -->
        Hutang Belum lunas

        <div class="clearfix">

        </div>
      </div>
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No. Transaksi</th>
            <th>Tanggal</th>
            <th>No - Nama Akun</th>
            <th>Keterangan</th>
            <th>Nilai</th>
            <th>Note</th>
            <th><center> Action </center></th>
          </tr>
        </thead>
        <tbody>
         <?php
         $data = mysqli_query($koneksi,"select * from tb_hutangusaha where status='Belum Lunas'");
         while($d = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><?php echo $d['no_trxhutang']; ?></td>
            <td><?php echo $d['tgl_hutang']; ?></td>
            
            <td><?php echo $d['no_akun']; ?></td>
            <td><?php echo $d['keterangan']; ?></td>
            <td><?php echo $d['nilai']; ?></td>
            <td><?php echo $d['note']; ?></td>
            <td><!-- <a href="#" class="btn btn-primary"><i class="fa fa-print"></i> Cetak <a href="?p=inputdata/inacktivehutang&no=<?php echo $d['no_trxhutang']; ?>" class="btn btn-primary"> --><i class="fa fa-trash"></i> Inactive</a></a></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>


  </div>

</div>
</div>
</div>
<?php 

if(isset($_POST['submit'])) {
  $no_invoice = $_POST['no_invoice'];
 
  $kode_akun = $_POST['kode_akun'];
  $note = $_POST['note'];
  $keterangan = $_POST['keterangan'];
  $nilai = $_POST['nilai'];
  $tanggal = $_POST['tanggal'];

  // Insert user data into table
  mysqli_query($koneksi, "INSERT INTO tb_hutangusaha VALUES('$no_invoice','$kode_akun','$keterangan','$nilai','$tanggal','$note','','Belum Lunas')");

  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('$no_invoice','$tanggal','$kode_akun','$keterangan','$note','$nilai','','Hutang Usaha')");
  
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('$no_invoice','$tanggal','2-110 - Hutang Usaha','$keterangan','$note','','$nilai','Hutang Usaha')");
  ?>
<SCRIPT> //not showing me this
alert('Input Success');
window.location.replace('dashboard.php?p=inputdata/hutangusaha');
</SCRIPT>
<?php


}
?>