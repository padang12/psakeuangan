
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2><a href="?p=masterdata/add_kapal" class="btn btn-round btn-primary">INPUT KAPAL</a> </h2>
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
                  <th>Nama Pelabuhan</th>
                  <th>aksi</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                  $data = mysqli_query($koneksi,"select * from tb_kapal");
                  $i=1;
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                 
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $d['nama_kapal']; ?></td>
                    <td><a href="?p=masterdata/edit_kapal&id=<?php echo $d['id']; ?>"><i class="fa fa-edit"></i> Edit </a> | <a href="?p=masterdata/hapus_kapal&id=<?php echo $d['id']; ?>"><i class="fa fa-trash"></i> Hapus </a></td>
                    
                  </tr>
                <?php 
              } ?>
              </tbody>
            </table>                        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>