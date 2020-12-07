<?php 
include "database/koneksi.php"; 
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php
 include "layout/head.php";
 ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <?php
          include "layout/menu.php";
          ?>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
       <?php
       include "layout/navbar.php";
       ?>
     </div>
     <!-- /top navigation -->

     <!-- page content -->
     <div class="right_col" role="main">
       <?php

        // include database connection file

       if(isset($_GET['p'])){
         $page=$_GET['p'];
         $file="$page.php";

         if (!file_exists($file)){
           include ("home.php");
         }else{
           include ("$page.php");
         }
       }else{
         include ("home.php");
       } 
       ?>
     </div>
     <!-- /page content -->

     <!-- footer content -->
     <footer>
      <?php
      include "layout/footer.php";
      ?>
    </footer>
    <!-- /footer content -->
  </div>
</div>
<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="vendors/Flot/jquery.flot.js"></script>
<script src="vendors/Flot/jquery.flot.pie.js"></script>
<script src="vendors/Flot/jquery.flot.time.js"></script>
<script src="vendors/Flot/jquery.flot.stack.js"></script>
<script src="vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>
<script src="build/js/jquery-3.4.1.min.js"></script>

<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>


<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="vendors/starrr/dist/starrr.js"></script>



<script>
 var $jnoc = jQuery.noConflict();
 
 $jnoc("#supplier").change(function(){
  var no_supplier = $("#supplier").val();
  $jnoc.ajax({
    type: "POST",
    dataType: "html",
    url: "inputdata/cari_invoice.php",
    data: "supp="+no_supplier,
    success: function(respond){
      if(respond == ''){

        alert('Tidak ada data Hutang');
        $jnoc("#invoice").html(respond);

      }
      else{
        $jnoc("#invoice").html(respond);
      }
    }
  });
});

 $jnoc('.select2').select2({ width: '100%' });

 $jnoc(document).ready(function(){
  $jnoc('.nowrap').DataTable();
});
</script>

<!-- piutang -->
<script>
 var $jnoc = jQuery.noConflict();
 
 $jnoc("#customer").change(function(){
  var no_supplier = $("#customer").val();
  $jnoc.ajax({
    type: "POST",
    dataType: "html",
    url: "inputdata/cari_invoice_piutang.php",
    data: "supp="+no_supplier,
    success: function(respond){
      if(respond == ''){

        alert('Tidak ada data Piutang');
        $jnoc("#invoice").html(respond);

      }
      else{
        $jnoc("#invoice").html(respond);
      }
    }
  });
});

 $jnoc('.select2').select2({ width: '100%' });
 $jnoc('.select3').select2({ width: '25%' });
 $jnoc('.select4').select2({ width: '15%' });


 $jnoc(document).ready(function(){
  $jnoc('.nowrap').DataTable();
});
</script>
<script type="text/javascript">
 $(window).load(function(){
  $("#pembayaran").change(function() {
   console.log($("#pembayaran option:selected").val());
   if ($("#pembayaran option:selected").val() == 'TEMPO') {
    $('#tempo').prop('hidden', false);
  }else {
    $('#tempo').prop('hidden', 'true');
  }
});
});
</script>



</body>
</html>
