<?php 
$kd_cust = $_GET['cust'];
include 'function.php';
$ah=mysqli_query($koneksi,"SELECT * FROM tb_customer where no_customer='$kd_cust'");
$uwu=mysqli_fetch_array($ah);
 ?>
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>DETAIL PIUTANG <?php echo $uwu['no_customer'] ?> | <?php echo $uwu['nama_customer'] ?>

     </h2>
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
                <th>Tanggal Transaksi</th>
                <th>No. Invoice</th>
                <th>Jumlah Piutang</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Jumlah Bayar</th>
                <th>Total Tagihan</th>
           
                <!--  <th>Action</th> -->
              </tr>
            </thead>
            <tbody style="font-size: 12px;">
             <?php 
              
                error_reporting(0);
               $no = 1;
               $data = mysqli_query($koneksi,"SELECT * FROM tb_piutang where kd_customer='$kd_cust'");
               while($d = mysqli_fetch_array($data)){ 
                $piutang=$d['jmlh_piutang'];
                $ptng+=$piutang;

                $bayar=$d['jmlh_bayar'];
                $byr+=$bayar;

                $tt=$d['jmlh_piutang']-$d['jmlh_bayar'];
                $tb+=$tt;           
                 ?>
                 <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($d['tgl_transaksi'])) ?></td>
                  <td><?php echo $d['no_invoice'] ?></td>
                  <td><?php echo rupiah($d['jmlh_piutang']) ?></td>
                  <td><?php echo date('d-m-Y', strtotime($d['tgl_bayar'])) ?> </td>
                  <td><?php echo rupiah($d['jmlh_bayar'])?></td>
                  <td><?php echo rupiah($tt) ?></td>
                
                  </tr>
                <?php }?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="3"></th>
                <th><?php echo rupiah($ptng) ?> </th>
                <th></th>
                <th><?php echo rupiah($byr) ?></th>
                <th><?php echo rupiah($tb)?></th>
    
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>
  </div>
</div>
</div>