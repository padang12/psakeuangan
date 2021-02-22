<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>LAPORAN HUTANG USAHA
        <?php 
       //  if(isset($_POST['supplier'])){

       //   $supp = $_POST['supplier'];
       //   echo " - Supplier : " . $supp;
       // }

        ?>
      </h2>
      <div class="clearfix"></div>
    <!--  <form method="post" class="nav navbar-right">
      <select class="select3" name="supplier" style="font-size: 12px;">
        <option>-- Pilih Kode --</option> 
        <?php 
        $data = mysqli_query($koneksi,"SELECT * FROM tb_supplier");
        while($d = mysqli_fetch_array($data)){
          ?>
          <option value="<?php echo $d['no_supplier'];?>"><?php echo $d['no_supplier']; ?> - <?php echo $d['nama_supplier']; ?></option> 
        <?php } ?>
      </select>&nbsp
      <input type="submit" value="GO" class="btn btn-primary">
    </form> -->
    
    
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
                <th>Invoice</th>
                <th>Total Hutang</th>
                <th>Sisa Hutang</th>
                <th>Detail</th>
                <!--  <th>Action</th> -->
              </tr>
            </thead>
            <tbody style="font-size: 12px;">
             <?php 
             $no = 1;

             $data = mysqli_query($koneksi,"SELECT SUM(tb_hutangusaha.nilai) AS total , SUM(tb_hutangusaha.sisahutang) AS sisa, tb_hutangusaha.no_trxhutang AS invoice FROM tb_hutangusaha WHERE status='Belum Lunas'");

             while($d = mysqli_fetch_array($data)){ 
              $ssh = $d['sisa'];
              if ($ssh==0) {
               $ssh = $d['total'];
             }              
             ?>
             <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['invoice']; ?></td>
              <td><?php echo "Rp " . number_format($d['total'], 0, ",", "."); ?></td>
              <td><?php echo "Rp " . number_format($ssh, 0, ",", "."); ?></td>
              <td><a href="?p=laporan/detailhutang&no=<?php echo $d['invoice']; ?>"><i class="fa fa-eye"></i> Detail </a>
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