<?php 
   $kode_customer = $_GET['kode_customer'];
   $invoice =$_GET['invoice'];
   include 'function.php';
    ?>
<div class="row">
   <div class="col-md-12 ">
      <div class="x_panel ">
         <div class="x_title">
            <h2>PENDAPATAN</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <br />
            <form class="form-label-left input_mask" method="post">
               <div class="form-group row">
                  <label class="col-form-label col-md-2">No. Invoice </label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="text" name="no_invoice" class="form-control"  value="<?=$invoice ?>" readonly>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-form-label col-md-2">Uraian</label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="text" name="jasa" class="form-control" placeholder="Uraian jasa" required="">
                  </div>
               </div>
               <div class="form-group row">
               </div>
               <div class="form-group row">
                  <label class="col-form-label col-md-2">Jumlah</label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="number" id="txt1" onkeyup="sum()" class="form-control" name="qty" rows="3" placeholder="Qty" required="">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-form-label col-md-2">Satuan </label>
                  <div class="col-md-4 col-sm-4 ">
                     <input class="form-control" name="satuan" rows="3" placeholder="satuan" required="">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-form-label col-md-2">Harga</label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="number" id="txt2" onkeyup="sum()" class="form-control" name="harga" placeholder="Harga Satuan" required="">
                  </div>
               </div>
               
               <div class="form-group row">
                  <label class="col-form-label col-md-2">Total</label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="number" id="txt3" class="form-control" onkeyup="tugas2()" name="total" placeholder="Total" readonly="" required="">
                  </div>
               </div>

               <div class="form-group row">
                  <label class="col-form-label col-md-2"></label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="checkbox" id="menu1" value="10/100 " onClick="tugas2()"> <label> PPN 10% </label><br> 
                  </div>
               </div>

                <div class="form-group row">
                  <label class="col-form-label col-md-2">PPn </label>
                  <div class="col-md-4 col-sm-4 ">
                     <input type="text" class="form-control" name="ppn" id="total" readonly>
                  </div>
               </div>

  
               <div class="ln_solid"></div>
               <div class="form-group row">
                  <div class="col-md-9 col-sm-9  offset-md-0">
                     <button type='submit' name="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
         <div class="x_title">
            <h2>
               <form  method="post"><button name="selesai"  class="btn btn-info"> <i class="fa fa-check"></i> Selesai</button> </form>
               DAFTAR JASA
            </h2>
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
                              <th>NO</th>
                              <th>Uraian</th>
                              <th>Qty</th>
                              <th>Satuan</th>
                              <th>Harga</th>
                              <th>Total</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              error_reporting(0);
                               $i=1;
                                 $data = mysqli_query($koneksi,"select * from tb_pendapatan_temp");
                                 while($d = mysqli_fetch_array($data)){
                                       $dharga = $d['total'];
                                       $totharga += $dharga;
                                   ?>
                           <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $d['uraian']; ?></td>
                              <td><?php echo $d['qty']; ?></td>
                              <td><?php echo $d['satuan'] ?></td>
                              <td style="text-align: right;"><?php   echo rupiah($d['harga']) ?></td>
                              <td  style="text-align: right;"><?php echo rupiah($d['total']); ?></td>
                              <td><a href="?p=inputdata/batalPendapatan&id=<?php echo $d['id']; ?>"><i class="fa fa-trash"></i> Batal </a></td>
                           </tr>
                           <?php
                              $i++;
                              } ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td style="text-align: center;" colspan="5">Total</td>
                              <td style="text-align: right;"><?php echo rupiah($totharga) ?></td>
                              <td style="text-align: center;">-</td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
 function tugas2()
   {
   var jumlah=document.getElementById("txt3").value;;
   var harga;

   if(document.getElementById("menu1").checked)
      {
      jumlah=parseInt(jumlah)*10/100;
         document.getElementById("total").value=jumlah;
      }else{
         document.getElementById("total").value=0;
      }


   }
</script>
<?php 
   if(isset($_POST['submit'])) {
    $no_invoice=$_POST['no_invoice'];
    $jasa=$_POST['jasa'];
    $qty=$_POST['qty'];
    $satuan = $_POST['satuan'];
    $harga=$_POST['harga'];
    $total = $_POST['total'];
    $ppn = $_POST['ppn'];
   
     // Insert user data into table
     $query= mysqli_query($koneksi,"INSERT INTO tb_pendapatan_temp VALUES('','$no_invoice','$jasa','$qty','$satuan','$harga','$total','$ppn')");
     if($query){
         ?> <SCRIPT> //not showing me this
   window.location.replace('dashboard.php?p=inputdata/lanjutan_pendapatan&invoice=<?php echo $no_invoice ?>&kode_customer=<?php echo $kode_customer ?>');
</SCRIPT><?php
   }
   }elseif(isset($_POST['selesai'])){
   
      mysqli_query($koneksi,"INSERT INTO tb_pendapatan (no_invoice,uraian,qty,satuan,harga,total,ppn) SELECT no_invoice,uraian,qty,satuan,harga,total,ppn FROM tb_pendapatan_temp ");
      $q= mysqli_query($koneksi,"DELETE FROM tb_pendapatan_temp");
      
      ?>
      <script>window.location.replace('dashboard.php?p=inputdata/pendapatan_bayar&harga=<?php echo $totharga ?>&invoice=<?=$invoice ?>&kode_customer=<?php echo $kode_customer ?>');</script><?php
   }
   ?>