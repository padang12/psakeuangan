<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2><a href="?p=inputdata/pendapatan" class="btn btn-round btn-primary">INPUT</a> PENDAPATAN</h2>
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
                  <th>No. Invoice</th>
                  <th>Kode Customer</th>
                  <th>Alamat</th>
                  <th>Nama Kapal</th>
                  <th>Pelabuhan Asal</th>
                  <th>Tanggal Tiba</th>
                  <th>Tanggal</th>
                  <th>Pelabuhan Tujuan</th>
                  <th>Tanggal Berangkat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                  $data = mysqli_query($koneksi,"select * from tb_pen_ket_cust");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                    <td><?php echo $d['no_invoice']; ?></td>
                    <td><?php echo $d['kode_customer']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['nama_kapal']; ?></td>
                    <td><?php echo $d['pelabuhan_asal']; ?></td>
                    <td><?php echo $d['tanggal_tiba']; ?></td>
                    <td><?php echo $d['tanggal']; ?></td>
                    <td><?php echo $d['pelabuhan_tujuan']; ?></td>
                    <td><?php echo $d['tanggal_berangkat']; ?></td>
                    <td><a href="?p=masterdata/editpendapatan&no=<?php echo $d['no_invoice']; ?>"><i class="fa fa-edit"></i> Edit </a> | <a href="?p=masterdata/hapuspendapatan&no=<?php echo $d['no_invoice']; ?>"><i class="fa fa-trash"></i> Delete </a></td>
                    
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