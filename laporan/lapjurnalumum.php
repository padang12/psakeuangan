<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <!-- <h2><a href="?p=masterdata/addcoa" class="btn btn-round btn-primary">Input</a> CHART OF ACCOUNT</h2> -->
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Akun</th>
                  <th>Keterangan 1</th>
                  <th>Keterangan 2</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <th>Sumber</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               $no = 1;
               $data = mysqli_query($koneksi,"select * from tb_jurnalumum");
               while($d = mysqli_fetch_array($data)){
                $deb = $d['debet'];
                $krd = $d['kredit'];
                $saldo = $deb - $krd;
                $totdeb += $deb;
                $totkrd += $krd;
                ?>
                <tr>

                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['tgl_jurnal']; ?></td>
                  <td><?php echo $d['nama_akun']; ?></td>
                  <td><?php echo $d['ket1']; ?></td>
                  <td><?php echo $d['ket2']; ?></td>
                  <td>
                    <?php
                    if ($d['debet'] == 0) {
                     echo "-";
                   }else{
                    echo $d['debet'];
                  }                     
                  ?>

                </td>
                <td>
                  <?php
                    if ($d['kredit'] == 0) {
                     echo "-";
                   }else{
                    echo $d['kredit'];
                  }                     
                  ?>
                </td>
                <td><?php echo $d['sumber']; ?></td>
                
                

              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5">Grand Total</td>
              <td ><?php echo "Rp " . number_format( $totdeb, 0, ",", "."); ?></td>
              <td ><?php echo "Rp " . number_format( $totkrd, 0, ",", "."); ?></td>
              <td ></td>
            </tr>
          </tfoot>
        </table>


      </div>
    </div>
  </div>
</div>
</div>
</div>