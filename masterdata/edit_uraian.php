<?php 
$id = $_GET['id'];

$query = mysqli_query($koneksi,"SELECT * FROM tb_uraian where id='$id'");
$data = mysqli_fetch_array($query);

 ?>
<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>INPUT URAIAN PENDAPATAN</h2>
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
            <input type="hidden" value="<?php echo $data['id']?>" name="id">
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Akun<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="nama_uraian" value="<?php echo $data['nama_uraian'] ?>" required="" />
              </div>
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

  $id = $_POST['id'];
  $nama_uraian = $_POST['nama_uraian'];

  mysqli_query($koneksi, "UPDATE tb_uraian SET nama_uraian='$nama_uraian' where id='$id' ");

  ?> 
  <SCRIPT> 
    alert('Data Berhasi Di Edit');
    window.location.replace('dashboard.php?p=masterdata/uraian');
  </SCRIPT>
<?php } ?>
