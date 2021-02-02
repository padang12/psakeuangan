<div class="row">
  <div class="col-md-12 ">

    <div class="x_panel ">
      <div class="x_title">
        <h2>PEMBELIAN / PEMBAYARAN</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-label-left input_mask" method="post">

          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor :</label>
            <div class="col-md-4 col-sm-4 ">
              <input type="text" name="no_invoice" class="form-control" placeholder="000/AA/0000" value="001/PR/0120">
            </div>
            <label class="col-form-label col-md-1">Tanggal :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="date" name="tanggal" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Tipe Bayar :</label>
            <div class="col-md-4 col-sm-4 ">
              <select class="select2 form-control" name="kode_customer">
                <option>-- Pilih Akun --</option> 
                <?php 
                $data = mysqli_query($koneksi,"SELECT * FROM tb_jurnalumum");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['nama_akun']; ?>"><?php echo $d['nama_akun']; ?></option> 
                <?php } ?>
              </select>
            </div>
            <label class="col-form-label col-md-1">Note :</label>
            <div class="col-md-5 col-sm-5 ">
              <textarea name="tanggal" class="form-control" placeholder="Note"></textarea>
            </div>
          </div>
          <div class="form-group row">

          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor / Nama Akun :</label>
            <div class="col-md-4 col-sm-4 ">
              <textarea class="form-control" name="alamat" rows="3" placeholder="Nomor / Nama Akun"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-md-2">Keterangan :</label>
            <div class="col-md-4 col-sm-4 ">
             <input type="text" class="form-control" placeholder="Pelabuhan Asal" name="Keterangan">
           </div>
        </div>

        <div class="form-group row">
           <label class="col-form-label col-md-2">Nilai :</label>
           <div class="col-md-4 col-sm-4 ">
            <input type="text" name="nilai" class="form-control" placeholder="Nilai">
          </div>
        </div>

        <div class="ln_solid"></div>
      </form>
      <div class="x_title">
      <h2>JURNAL</h2>
      <div class="clearfix"></div>
    </div>
      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No. Akun</th>
                  <th>Nama Akun</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>5-114</td>
                    <td>Biaya Keperluan Kapal</td>
                    <td>Rp. 2.000.000</td>
                    <td></td>
                    <td></td>
                  </tr>
              </tbody>
            </table>

            <div class="ln_solid"></div>
        <div class="form-group row">
          <div class="col-md-9 col-sm-9  offset-md-0">
            <button type='submit' name="submit" class="btn btn-success">Save</button>
            <button type='submit' name="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Bukti</button>
          </div>
        </div>
    </div>

  </div>
</div>
</div>
<?php 

if(isset($_POST['submit'])) {
  $no_invoice = $_POST['no_invoice'];
  $kode_customer = $_POST['kode_customer'];
  $alamat = $_POST['alamat'];
  $nama_kapal = $_POST['tipeaset'];
  $pelabuhan_asal = $_POST['pelabuhan_asal'];
  $tanggal_tiba = $_POST['tanggal_tiba'];
  $tanggal = $_POST['tanggal'];
  $pelabuhan_tujuan = $_POST['kelompok'];
  $tanggal_berangkat = $_POST['umureko'];
  // Insert user data into table
  mysqli_query($koneksi, "INSERT INTO tb_pendapatan VALUES('$no_invoice','$kode_customer','$alamat','$nama_kapal','$pelabuhan_asal','$tanggal_tiba','$tanggal','$pelabuhan_tujuan','$tanggal_berangkat')");
?> <SCRIPT> //not showing me this
alert('Input Success');
window.location.replace('dashboard.php?p=inputdata/datapendapatan');
</SCRIPT><?php


}
?>