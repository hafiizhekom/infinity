

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Funds</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active"> Document
                            </li>
                            <li class="active"> Funds
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-md-6">
                <table class="table table-striped" data-toggle="table" id="danatable">
                <tbody>
                <?php 
                    foreach ($periodedana->result() as $key => $value) {
                        echo "<tr><td><a href='".current_url()."/".$value->bulan."/".$value->tahun."/all'>Dana ".nice_date('2000-'.$value->bulan.'-01', 'F')." ".$value->tahun."</a></td></tr>";
                    }
                 ?>
                </tbody>
                </table>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail" style="background:white;">
              <div class="container-fluid">
                <form action="<?php echo current_url(); ?>" method="POST">
                  <label>Tambah Laporan Dana</label>
<div class="form-group">
                    <select name="jenis_laporan" class="form-control" required>
                      <option value="" disabled selected>Jenis Laporan</option>
                      <option value="Masuk">Dana Masuk</option>
                      <option value="Keluar">Dana Keluar</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" name="perihal_dana" placeholder="Perihal" class="form-control" maxlength="50" required="">
                  </div>

                  <div class="form-group">
                    <input type="number" name="jumlah_dana" placeholder="Sejumlah" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" placeholder="Tanggal Pembayaran" id="date-pembayaran" name="date_pembayaran"
                        class="form-control date-picker" required="">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                  <button type="submit" name="add_laporan_dana" value="simpan" class="btn btn-primary pull-right">Simpan</button>
                </form>
              </div>
            </div>
                </div>
                </div>
                <!-- /.row -->
                    
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <script>
  $('#danatable').bootstrapTable({
  columns: [{
  title:'Dana Periode',
  field:'dana',
  align:'center',
  sortable:true
  }],
  search: true,
  sortable:true,
  pagination:true,
  cookie: true
  
  });
  </script>
  <script>

                      $(document).ready(function() {
                        $('.date-picker').datepicker({
                          format: "yyyy-mm-dd"
                        });

                      });
</script>