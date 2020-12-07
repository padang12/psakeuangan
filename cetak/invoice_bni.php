<?php 
	include 'function.php';
	$no_invoice = $_GET['no_invoice'];
	$kode_customer = $_GET['kode_customer'];
	//data customer
	$query1=mysqli_query($koneksi,"SELECT * FROM tb_customer where no_customer='$kode_customer'");
	$d1=mysqli_fetch_array($query1);
	//data keterangan pendapatan
	$query2=mysqli_query($koneksi,"SELECT * FROM tb_pen_ket_cust where no_invoice='$no_invoice'");
	$d2=mysqli_fetch_array($query2);
	//data pendapatan
	$query3=mysqli_query($koneksi,"SELECT * FROM tb_pendapatan where no_invoice='$no_invoice'");
	

	$angka = 55300933;

 ?>
<div class="">
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12">
         <div class="x_panel">
            <div class="x_title">
            	<div class="text-center"><img src="title.png" alt="" style=" width: 990px;"></div>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <section class="content invoice">
                  <!-- title row -->
                  <div class="row">
                     <div class=" invoice-header">
                     	 <h1>
                             <u>Invoice</u>
                         </h1>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                     <div class="col-sm-3 invoice-col">
             
                        <address>
                           <strong>NO Invoice</strong>
                           <br>Tanggal Invoice
                           <br>Nama Kapal
                           <br>Tanggal Kedatangan (TA)
                           <br>Tangaal Keberangkatan (TB)
                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-3 invoice-col">
            
                        <address>
                           <strong>: <?=$d2['no_invoice'] ?></strong>
                           <br>: <?=date('d-m-Y',strtotime($d2['tanggal'])) ?>
                           <br>: <?=$d2['nama_kapal'] ?>
                           <br>: <?=$d2['tanggal_berangkat'] ?>
                           <br>: <?=$d2['tanggal_tiba'] ?>
                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-3 invoice-col" >
                        <b>Kepada Yth:</b>
                        <br><?php echo $d1['nama_customer'] ?>
                        <br><?php echo $d1['alamat1']; ?>
                        <br><?php echo $d1['alamat2']?>-<?php echo $d1['alamat3'] ?>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <!-- Table row -->
                  <div class="row">
                     <div class="  table">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Uraian</th>
                                 <th>Qty</th>
                                 <th>Satuan</th>
                                 <th>Rupiah</th>
                                 <th>Total</th>

                              </tr>
                           </thead>
                           <tbody>
                           		<?php
                                 error_reporting(0);
                           		$i=1; 
                           		while ($d3=mysqli_fetch_array($query3)) {
                           			$dharga = $d3['total'];
                                    $totharga += $dharga;
                                    //total ppn
                                    $dppn = $d3['ppn'];
                                    $totppn += $dppn;
                                    

                           		 ?>
                           		<tr>
                           			<td><?php echo $i; ?></td>
                           			<td><?php echo $d3['uraian']; ?></td>
                           			<td><?php echo $d3['qty']; ?></td>
                           			<td><?php echo $d3['satuan']; ?></td>
                           			<td><?php echo rupiah($d3['harga']); ?></td>
                           			<td><?php echo rupiah($d3['total']); ?></td>
                           		</tr>
                           	<?php
                           	$i++;
                           	 } ?>
                           </tbody>
                        </table>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                     <!-- accepted payments column -->
                     <div class="col-md-6">
                     <b>Catatan :</b>
                     <br>Bank BNI 46 CABANG KETAPANG
                     <br>IDR ACCOUNT : 00962241
                     <br>A/n.PT.Putra Sagara Abadi
                     </div>
                     <!-- /.col -->
                     <div class="col-md-6">
                        <div class="table-responsive">
                           <table class="table">
                              <tbody>
                                 <tr>
                                    <th style="width:50%">JUMLAH:</th>
                                    <td><?php echo rupiah($totharga); ?></td>
                                 </tr>
                                 <tr>
                                    <th>PPn (10%)</th>
                                    <td><?php echo rupiah($totppn); ?></td>
                                 </tr>
                                 <tr>
                                    <th>SUB TOTAL:</th>
                                    <td> <?=rupiah($totharga+$totppn); ?> </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- /.col -->
                  </div>
                  <div class="row" >
                  	<div class="col-md-12">
                        <div class="table-responsive">
                         <table class="table table-striped">
                            <tbody>
                               <tr>
                                  <th >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan : </th>
                               </tr>
                               <tr>
                                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terbilang : #<?php echo terbilang($totharga+$totppn) ?></th>
                               </tr>
                            </tbody>
                         </table>  
                        </div>
                     </div>
                  </div>
                  <!-- /.row -->
                  <!-- row -->
                  <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-3"></div>
                     <div class="col-md-3"></div>
                     <div class="col-md-3" style="text-align: center;"> <?=date('d-m-Y',strtotime($d2['tanggal'])) ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br> <u>H. ABDULBAD. H.A. RANI</u>
                        <br>Direktur Utama
                     </div>
                  </div>
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                     <div class=" ">
                        <button class="btn btn-default d-print-none" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <a href="?p=inputdata/pendapatan" class="btn btn-warning  d-print-none"> <i class="fa fa-sign-out"></i> Kembali</a>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </div>
</div>
