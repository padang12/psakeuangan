<div class="row">
  <div class="col-md-12 ">

    <div class="x_panel ">
      <div class="x_title">
        <h2>Form Pembelian / Pembayaran</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-label-left input_mask" method="post">

          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" name="no" required="" class="form-control" placeholder="000/AA/0000">
            </div>

            <label class="col-form-label col-md-2">Tanggal :</label>
            <div class="col-md-4 col-sm-4">
              <input type="date" name="tgl" required="" class="form-control">
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
            <label class="col-form-label col-md-2">No / Nama Akun :</label>
            <div class="col-md-4 col-sm-4">
              <select class="select2 form-control" required="" name="nobiaya">
                <option>-- Pilih Pembelian / Pembayaran --</option> 
                <?php 
                $data = mysqli_query($koneksi,"SELECT no_akun, nama_akun FROM tb_coa WHERE kat1='Biaya' ORDER BY no_akun");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Nilai :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="Number" class="form-control" required="" name="nilai" placeholder="Rp. ">
            </div>
            <label class="col-form-label col-md-2">Keterangan :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" class="form-control" required="" name="ket" placeholder="Keterangan">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Note :</label>
            <div class="col-md-4 col-sm-4 ">
             <textarea class="form-control" rows="3" required="" name="note"></textarea>
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
<?php 

if(isset($_POST['submit'])) {
  $no = $_POST['no'];
  $tgl = $_POST['tgl'];
  $tipebayar = $_POST['tipebayar'];
  $nobiaya = $_POST['nobiaya'];
  $nilai = $_POST['nilai'];
  $ket = $_POST['ket'];
  $note = $_POST['note'];
  // Insert user data into table
  mysqli_query($koneksi, "INSERT INTO tb_pembelian VALUES('','$no','$tgl','$tipebayar','$nobiaya','$nilai','$ket','$note')");
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('','$tgl','$nobiaya','$ket','$note','$nilai','','Pembelian')");
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('','$tgl','$tipebayar','$ket','$note','','$nilai','Pembelian')");
  
?> <SCRIPT> //not showing me this
alert('Input Success');
window.location.replace('index.php?p=inputdata/datapembelian');
</SCRIPT><?php


}
?>