<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>DETAIL HUTANG USAHA
        <?php 
         $invoice = $_GET['no'];
         echo " - Invoice : " . $invoice;
       ?>
     </h2>
     <ul class="nav navbar-right panel_toolbox">
        <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li> -->

        <!-- <li>

          <form method="post">
           <select class="select2 form-control" name="supplier" style="font-size: 12px;">
            <option>-- Pilih Kode --</option> 
            <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM tb_supplier");
            while($d = mysqli_fetch_array($data)){
              ?>
              <option value="<?php echo $d['no_supplier'];?>"><?php echo $d['no_supplier']; ?> - <?php echo $d['nama_supplier']; ?></option> 
            <?php } ?>
          </select>
          <input type="submit" value="supplier" class="btn btn-primary">
        </form>
      </li> -->
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box table-responsive">

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead style="font-size: 12px;">
              <tr>
                <th>No</th>
                <th>Tanggal Pembayaran</th>
                <th>No. Invoice</th>
                <th>Jumlah Hutang</th>
                <th>Pembayaran</th>
                <th>Sisa Hutang</th>
                <!--  <th>Action</th> -->
              </tr>
            </thead>
            <tbody style="font-size: 12px;">
             <?php 
              $supp = $_GET['no'];

               $no = 1;
               $data = mysqli_query($koneksi,"select * from tb_hutangusaha, tb_pelunasanhutang where tb_hutangusaha.no_trxhutang=tb_pelunasanhutang.no_trxhutang and tb_hutangusaha.no_trxhutang = '$invoice' and tb_hutangusaha.status = 'Belum Lunas'");
               while($d = mysqli_fetch_array($data)){
                 $nb = $d['nilai_bayar'];
                 $jml = $d['nilai'];               
                 ?>
                 <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['tgl_bayar']; ?></td>
                  <td><?php echo $d['no_trxhutang']; ?></td>
                  <td><?php echo "Rp " . number_format($jml, 0, ",", "."); ?></td>
                  <td><?php echo "Rp " . number_format($nb, 0, ",", "."); ?></td>
                  <td><?php echo "Rp " . number_format($d['sisa_hutang'], 0, ",", "."); ?></td>
                  </tr>
                <?php }?>
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>
</div>
</div>