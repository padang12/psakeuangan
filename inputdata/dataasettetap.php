<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2> ASET TETAP</h2>
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
                  <th>Tipe Bayar</th>
                  <th>Tipe Aset</th>
                  <th>Nama Aset</th>
                  <th>Nilai</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Keterangan</th>
                  <th>Kelompok</th>
                  <th>Umur Ekonomis</th>
                  <th>Note</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                 $smbr = 'Aset Tetap';
                  $data = mysqli_query($koneksi,"select * from tb_asettetap");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                 
                    <td><?php echo $d['no']; ?></td>
                    <td><?php echo $d['tgl']; ?></td>
                    <td><?php echo $d['tipe_bayar']; ?></td>
                    <td><?php echo $d['tipe_aset']; ?></td>
                    <td><?php echo $d['nama_aset']; ?></td>
                    <td><?php echo $d['nilai']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td><?php echo $d['total']; ?></td>
                    <td><?php echo $d['keterangan']; ?></td>
                    <td><?php echo $d['kelompok']; ?></td>
                    <td><?php echo $d['umur_ekonomis']; ?> Tahun</td>
                    <td><?php echo $d['note']; ?></td>
                    <td><a href="?p=inputdata/inacktiveasettetap&no=<?php echo $d['no']; ?>"><i class="fa fa-trash"></i> Inactive </a></td>
                    
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>