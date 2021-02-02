
<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>INPUT AKUN</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="post">

            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">No Akun<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="noakun" required="" />
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Akun<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="nm_akun" required="" />
              </div>
            </div>
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Saldo Normal<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <select name="saldo" class="form-control">
                 <option>-- Pilih Tipe Saldo --</option>
                 <option value="Debit"> Debit</option>
                 <option value="Kredit"> Kredit</option>
               </select>

             </div>
           </div>
           <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Laporan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <select name="lap" class="form-control">
                 <option>-- Pilih Tipe Laporan --</option>
                 <option value="Neraca Saldo"> Neraca Saldo</option>
                 <option value="Laba/Rugi"> Laba/Rugi</option>
               </select>
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori 1<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <select name="kategori1" class="form-control">
                 <option>-- Pilih Kategori 1 --</option>
                 <option value="Aset"> Aset</option>
                 <option value="Liabilitas"> Liabilitas</option>
                 <option value="Ekuitas"> Ekuitas</option>
                 <option value="Pendapatan"> Pendapatan</option>
                 <option value="Biaya"> Biaya</option>
               </select>
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori 2<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <select name="kategori2" class="form-control">
                 <option>-- Pilih Kategori 2 --</option>
                 <option value="Aset Lancar"> Aset Lancar</option>
                 <option value="Aset Tetap"> Aset Tetap</option>
                 <option value="Hutang Lancar"> Hutang Lancar</option>
                 <option value="Modal"> Modal</option>
                 <option value="Pendapatan"> Pendapatan</option>
                 <option value="Pendapatan Diluar Operasional"> Pendapatan Diluar Operasional</option>
                 <option value="Biaya Administrasi dan Umum"> Biaya Administrasi dan Umum</option>
                 <option value="Biaya Di luar Operasional"> Biaya Di luar Operasional</option>
               </select>
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori 3<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input class="form-control" type="text" name="kategori3" required="" />
             
          </div>

          <div class="ln_solid">
            <br>
            <div class="form-group">
              <div class="col-md-6 offset-md-3">
                <button type='submit' name="submit" class="btn btn-primary">Submit</button>

              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<?php 

if(isset($_POST['submit'])) {
  $no = $_POST['noakun'];
  $nm = $_POST['nm_akun'];
  $sldo = $_POST['saldo'];
  $lap = $_POST['lap'];
  $kat1 = $_POST['kategori1'];
  $kat2 = $_POST['kategori2'];
  $kat3 = $_POST['kategori3'];
  $status = 'Active';
  mysqli_query($koneksi, "INSERT INTO tb_coa VALUES('$no','$nm','$sldo','$lap','$kat1','$kat2','$kat3', '$status')");

  ?> 
  <SCRIPT> 
    alert('Input Success');
    window.location.replace('dashboard.php?p=masterdata/coa');
  </SCRIPT>
<?php } ?>
