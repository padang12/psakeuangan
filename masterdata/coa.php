<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2><a href="?p=masterdata/addcoa" class="btn btn-round btn-primary">INPUT AKUN</a> </h2>
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
                  <th>No Akun</th>
                  <th>Nama Akun</th>
                  <th>Saldo Normal</th>
                  <th>Laporan</th>
                  <th>Kategori 1</th>
                  <th>Kategori 2</th>
                  <th>Kategori 3</th>
                  <th>List - Nama Akun</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                  $data = mysqli_query($koneksi,"select * from tb_coa");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                 
                    <td><?php echo $d['no_akun']; ?></td>
                    <td><?php echo $d['nama_akun']; ?></td>
                    <td><?php echo $d['saldo_normal']; ?></td>
                    <td><?php echo $d['laporan']; ?></td>
                    <td><?php echo $d['kat1']; ?></td>
                    <td><?php echo $d['kat2']; ?></td>
                    <td><?php echo $d['kat3']; ?></td>
                    <td><?php echo $d['no_akun']; ?> | <?php echo $d['nama_akun']; ?></td>
                    <td><a href="?p=masterdata/editcoa&no=<?php echo $d['no_akun']; ?>"><i class="fa fa-edit"></i> Edit </a> | <a href="?p=masterdata/hapuscoa&no=<?php echo $d['no_akun']; ?>"><i class="fa fa-trash"></i> Inactive </a></td>
                    
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