<div class="row">
  <div class="col-md-12 ">

    <div class="x_panel ">
      <div class="x_title">
        <h2>PELUNASAN HUTANG</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-label-left input_mask" method="post">

          <div class="form-group row">
            <label class="col-form-label col-md-2">Kode Supplier :</label>
            <div class="col-md-4 col-sm-4 ">
              <select class="select2 form-control" required="" id="supplier" name="supplier">
                <option>-- Pilih Kode --</option> 
                <?php 
                $data = mysqli_query($koneksi,"SELECT DISTINCT tb_supplier.no_supplier, tb_supplier.nama_supplier FROM tb_hutangusaha, tb_supplier WHERE tb_supplier.no_supplier=tb_hutangusaha.no_supplier AND tb_hutangusaha.status='Belum Lunas'");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['no_supplier'];?>"><?php echo $d['no_supplier']; ?> - <?php echo $d['nama_supplier']; ?></option> 
                <?php } ?>
              </select>

            </div>
            
            <label class="col-form-label col-md-1">Tanggal :</label>
            <div class="col-md-5 col-sm-5 ">
              <input type="date" name="tanggal" required="" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-2">Nomor :</label>
            <div class="col-md-4 col-sm-4 ">
             <select name="invoice" required="" class="select2 form-control" id="invoice">
             </select>
           </div>
           <label class="col-form-label col-md-1">Note :</label>
           <div class="col-md-5 col-sm-5 ">
            <textarea name="note" class="form-control" required="" placeholder="Note"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-md-2">Tipe Bayar :</label>
          <div class="col-md-4 col-sm-4 ">
            <select class="select2 form-control" required="" name="tipe_bayar">
            <option>-- Pilih Akun --</option> 
            <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM tb_coa where kat3='Kas dan Bank' ORDER BY no_akun");
            while($d = mysqli_fetch_array($data)){
              ?>
              <option value="<?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?>"><?php echo $d['no_akun']; ?> - <?php echo $d['nama_akun']; ?></option> 
            <?php } ?>
          </select>            
        </div>
      </div>

      <div class="form-group row">
        <label class="col-form-label col-md-2">Nomor / Nama Akun :</label>
        <div class="col-md-4 col-sm-4 ">
         <select class="select2 form-control" required="" name="kode_akun">
          <option>-- Pilih Akun --</option> 
          <?php 
          $data = mysqli_query($koneksi,"SELECT * FROM tb_coa where kat3='Hutang Usaha' ORDER BY no_akun");
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
       <input type="text" required="" class="form-control" placeholder="Keterangan" name="keterangan">
     </div>
   </div>

   <div class="form-group row">
     <label class="col-form-label col-md-2">Nilai :</label>
     <div class="col-md-4 col-sm-4 ">
      <input type="number" required="" name="nilai" class="form-control" placeholder="Nilai">
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
<!-- <div class="x_title"> -->

        <!-- <form method="post">
          <input type="submit" value="Periode">
          <input type="date" name="periode">
          
        </form> -->
       

        <!-- <div class="clearfix">

        </div>
      </div> -->
     <!--  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No. Transaksi</th>
            <th>Tanggal</th>
            <th>Kode Supplier</th>
            <th>No - Nama Akun</th>
            <th>Keterangan</th>
            <th>Nilai</th>
            <th>Note</th>
            <th>Cetak</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $data = mysqli_query($koneksi,"select * from tb_hutangusaha, tb_supplier where tb_hutangusaha.no_supplier=tb_supplier.no_supplier and tb_hutangusaha.status='Lunas'");
         while($d = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><?php echo $d['no_trxhutang']; ?></td>
            <td><?php echo $d['tgl_hutang']; ?></td>
            <td><?php echo $d['no_supplier']; ?> - <?php echo $d['nama_supplier']; ?></td>
            <td><?php echo $d['no_akun']; ?></td>
            <td><?php echo $d['keterangan']; ?></td>
            <td><?php echo $d['nilai']; ?></td>
            <td><?php echo $d['note']; ?></td>
            <td><a href="#" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table> -->


  </div>

</div>
</div>
</div>

<?php 

if(isset($_POST['submit'])) {
  $no_invoice = $_POST['invoice'];
  $kode_supplier = $_POST['supplier'];
  $kode_akun = $_POST['kode_akun'];
  $tipe_bayar = $_POST['tipe_bayar'];
  $note = $_POST['note'];
  $keterangan = $_POST['keterangan'];
  $nilai = $_POST['nilai'];
  $tanggal = $_POST['tanggal'];

  // Insert user data into table
 

  $sisa = mysqli_query($koneksi,"select * from tb_hutangusaha where no_trxhutang='$no_invoice'");
  while($x = mysqli_fetch_array($sisa)){
    $hutang = $x['nilai'];
    $sisahutang = $x['sisahutang'];
    if ($sisahutang == 0) {
       $jmlsisa = $hutang - $nilai;
    }else{
      $jmlsisa = $sisahutang - $nilai;
    }
   
  }
  
  if ($jmlsisa == 0) {
    mysqli_query($koneksi,"update tb_hutangusaha set sisahutang='$jmlsisa', status='Lunas' where no_trxhutang='$no_invoice'");
  }else{
    mysqli_query($koneksi,"update tb_hutangusaha set sisahutang='$jmlsisa' where no_trxhutang='$no_invoice'");
  }

   mysqli_query($koneksi, "INSERT INTO tb_pelunasanhutang VALUES('','$no_invoice','$kode_supplier','$kode_akun','$tipe_bayar','$keterangan','$nilai','$tanggal','$note','$jmlsisa')");

  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('','$tanggal','$kode_akun','$keterangan','$note','$nilai','','Pelunasan Hutang')");
  mysqli_query($koneksi, "INSERT INTO tb_jurnalumum VALUES('','$tanggal','$tipe_bayar','$keterangan','$note','','$nilai','Pelunasan Hutang')");
  ?>
<SCRIPT> //not showing me this
alert('Input Success');
window.location.replace('?p=inputdata/pelunasanutang');
</SCRIPT>
<?php


}
?>