<?php 
   $kode_customer = $_GET['kode_customer'];
   $invoice = $_GET['invoice'];
   $totharga = $_GET['harga'];
   function rupiah($angka){
     $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
     return $hasil_rupiah;
   }
   $query= mysqli_query($koneksi,"SELECT * FROM tb_pen_ket_cust where no_invoice='$invoice'");
   $data= mysqli_fetch_array($query);

    ?>
<div class="row">
   <div class="col-md-12 ">
      <div class="x_panel ">
         <div class="x_title">
            <h2>PT PUTRA SEGERA ABADI</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <br />
            <form class="form-label-left input_mask" action="?p=inputdata/aksi_pendapatan" method="post">
               <div class="form-group row">
                     <input type="hidden" name="kode_customer" value="<?php echo $kode_customer ?>">
                     <input type="hidden" name="tgl_transaksi" value="<?php echo $data['tanggal'] ?>">
                  <label class="col-form-label col-md-2">Pembayaran No. Invoice</label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="text" name="no_invoice" class="form-control"  value="<?=$invoice ?>" readonly>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-form-label col-md-2">Jumlah Tagihan</label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="text" id="tagihan" class="form-control" name="harga" value="<?=$totharga ?>" readonly>
                  </div>
               </div>
               <div class="form-group row">
               </div>

               <div class="form-group row">
                  <label class="col-form-label col-md-2">Jenis Pembayaran</label>
                  <div class="col-md-4 col-sm-4 ">
                     <select class="form-control" name="pembayaran" id="pembayaran" required>
                        <option value="">--PILIH--</option>
                        <option value="CASH">CASH</option>
                        <option value="BNI">BNI</option>
                        <option value="BRI">BRI</option>
                        <option value="TEMPO">TEMPO</option>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="" class="col-form-label col-md-2">Tanggal Jatuh Tempo</label>
                  <div class="col-md-4 col-sm-4">
                     <input type="date" class="form-control" id="tempo" name="tempo" placeholder="Hanya Untuk Pembayaran Tempo" hidden required="">
                  </div>
               </div>
               <div class="ln_solid"></div>
               <div class="form-group row">
                  <div class="col-md-9 col-sm-9  offset-md-0">
                     <button type='submit' name="submit" class="btn btn-success"><i class="fa fa-print"></i> Cetak Invoice</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


