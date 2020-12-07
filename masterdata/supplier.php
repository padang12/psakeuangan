<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2><a href="?p=masterdata/addsupplier" class="btn btn-round btn-primary">Input</a> SUPPLIER</h2>
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
                  <th>No Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat 1</th>
                  <th>Alamat 2</th>
                  <th>Alamat 3</th>
                  <th>Telpon</th>
                  <th>PIC</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                  $data = mysqli_query($koneksi,"select * from tb_supplier");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                 
                    <td><?php echo $d['no_supplier']; ?></td>
                    <td><?php echo $d['nama_supplier']; ?></td>
                    <td><?php echo $d['alamat1']; ?></td>
                    <td><?php echo $d['alamat2']; ?></td>
                    <td><?php echo $d['alamat3']; ?></td>
                    <td><?php echo $d['tlpn']; ?></td>
                    <td><?php echo $d['pic']; ?></td>
                    <td><a href="?p=masterdata/editsupplier&no=<?php echo $d['no_supplier']; ?>"><i class="fa fa-edit"></i> Edit </a></td>
                    
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