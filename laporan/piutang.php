<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2> Daftar Piutang</h2>
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
                  <th>Kode Customer</th>
                  <th>Nama Customer</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                 $i=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tb_piutang 
                                                INNER JOIN tb_customer ON tb_piutang.kd_customer=tb_customer.no_customer GROUP BY tb_piutang.kd_customer");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                 
                    <td><?php echo $i; ?></td>
                    <td><?php echo $d['kd_customer']; ?> </td>
                    <td><?php echo $d['nama_customer'];?> </td>
      
                    <td> <a href="?p=pelunasan/detailPiutang&cust=<?php echo $d['kd_customer']; ?>"><i class="fa fa-eye"></i> Detail </a></td>
                    
                  </tr>
                <?php 
                $i++;

              } ?>
              </tbody>
            </table>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>