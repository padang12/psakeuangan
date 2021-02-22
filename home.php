
<!-- /top tiles -->
<?php error_reporting(error_reporting() & ~E_NOTICE) ?>

<div class="row">

  <div class="x_title">
   <h3>Bulan Ini</h3><br>
   <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
    <div class="tile-stats">
     <?php 
     $bln = date('m');
     $sql1 = mysqli_query($koneksi,"SELECT * FROM tb_pen_ket_cust, tb_pendapatan WHERE tb_pen_ket_cust.no_invoice = tb_pendapatan.no_invoice AND MONTH(tb_pen_ket_cust.tanggal)='$bln'");
     while($d = mysqli_fetch_array($sql1)){
      $pendapatan = $d['total'];
      $totpendapatan += $pendapatan;
    }
    ?>
    <div class=""> <h5><?php echo "Rp " . number_format( $totpendapatan, 0, ",", "."); ?></h5></div>
    <h3>Pendapatan</h3>
    
  </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
  <div class="tile-stats">
     <?php 
     
     $sql2 = mysqli_query($koneksi,"SELECT * FROM tb_piutang WHERE MONTH(tgl_transaksi)='$bln'");
     while($d2 = mysqli_fetch_array($sql2)){
      $piutang = $d2['jmlh_piutang'];
      $totpiutang += $piutang;
    }
    ?>
    <div class=""><h5><?php echo "Rp " . number_format( $totpiutang, 0, ",", "."); ?></h5></div>
    <h3>Piutang</h3>

  </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
  <div class="tile-stats">
 <?php 
     
     $sql3 = mysqli_query($koneksi,"SELECT * FROM tb_hutangusaha WHERE MONTH(tgl_hutang)='$bln'");
     while($d3 = mysqli_fetch_array($sql3)){
      $hutang = $d3['sisahutang'];
      $tothutang += $hutang;
    }
    ?>
    <div class=""><h5><?php echo "Rp " . number_format( $tothutang, 0, ",", "."); ?></h5></div>
    <h3>Hutang</h3>

  </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
  <div class="tile-stats">
    <?php 
     
     $sql4 = mysqli_query($koneksi,"SELECT * FROM tb_pembelian WHERE MONTH(tgl)='$bln'");
     while($d4 = mysqli_fetch_array($sql4)){
      $pembayarang = $d4['nilai'];
      $totpembayarang += $pembayarang;
    }
    ?>
    <div class=""><h5><?php echo "Rp " . number_format( $totpembayarang, 0, ",", "."); ?></h5></div>
    <h3>Pembayaran / Pembelian</h3>

  </div>
</div>
   <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
      <div class="tile-stats">
       
        <div class="count">179</div>
        <h3>Aset</h3>
        
      </div>
    </div> -->
  </div>
</div>
<br />

<div class="row">


  <div class="col-md-4 col-sm-4 ">
    <div class="x_panel tile fixed_height_320">
      <div class="x_title">
        <h2>App Versions</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <h4>App Usage across versions</h4>
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>0.1.5.2</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>123k</span>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="widget_summary">
          <div class="w_left w_25">
            <span>0.1.5.3</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>53k</span>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>0.1.5.4</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>23k</span>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>0.1.5.5</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>3k</span>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>0.1.5.6</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>1k</span>
          </div>
          <div class="clearfix"></div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-4 ">
    <div class="x_panel tile fixed_height_320 overflow_hidden">
      <div class="x_title">
        <h2>Device Usage</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="" style="width:100%">
          <tr>

            <th>
              <div class="col-lg-7 col-md-7 col-sm-7 ">
                <p class="">Device</p>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 ">
                <p class="">Progress</p>
              </div>
            </th>
          </tr>
          <tr>

            <td>
              <table class="tile_info">
                <tr>
                  <td>
                    <p><i class="fa fa-square blue"></i>IOS </p>
                  </td>
                  <td>40%</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square green"></i>Android </p>
                  </td>
                  <td>10%</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square purple"></i>Blackberry </p>
                  </td>
                  <td>20%</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square aero"></i>Symbian </p>
                  </td>
                  <td>15%</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square red"></i>Others </p>
                  </td>
                  <td>30%</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>


  <div class="col-md-4 col-sm-4 ">
    <div class="x_panel tile fixed_height_320">
      <div class="x_title">
        <h2>Quick Settings</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="dashboard-widget-content">
          <ul class="quick-list">
            <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
            </li>
            <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
            </li>
            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
            </li>
            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
            </li>
            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
            </li>
          </ul>

          
        </div>
      </div>
    </div>
  </div>

</div>

