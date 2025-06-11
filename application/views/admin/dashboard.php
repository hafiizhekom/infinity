<?php echo $this->session->flashdata("notifikasi");?>
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
        Admin Panel <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active"> Dashboard
          </li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-blue">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-transfer" aria-hidden="true" id="icon-big"></span>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php echo $feedbacktotal; ?>
                </div>
                <div>Feedback</div>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url(ADMIN_PAGE.'/feedback'); ?>">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-file" aria-hidden="true" id="icon-big"></span>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php echo $newstotal; ?>
                </div>
                <div>Post</div>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url(ADMIN_PAGE.'/post'); ?>">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-picture" aria-hidden="true" id="icon-big"></span>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php echo $gallerytotal; ?>
                </div>
                <div>Gambar</div>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url(ADMIN_PAGE.'/gallery'); ?>">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-user" aria-hidden="true" id="icon-big"></span>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php echo $crewtotal; ?>
                </div>
                <div>Crew</div>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url(ADMIN_PAGE.'/crew'); ?>">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-4">
            <div class="thumbnail" style="background:white;">
              <div class="container-fluid">
                <form method="POST" action="<?php echo current_url(); ?>">
                  <label>Set Vision</label>
                  <div class="form-group">
                    <textarea id="summernote1" rows="12" name="vision" required><?php if(isset($visi)){echo $visi;} ?></textarea>
                    </textarea>
                  </div>
                  <button type="submit" name="savevision" value="submit" class="btn btn-primary pull-right">Save</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail" style="background:white;">
              <div class="container-fluid">
                <form method="POST" action="<?php echo current_url(); ?>">
                  <label>Set Mision</label>
                  <div class="form-group">
                    <textarea id="summernote2" rows="12" name="mision" required><?php if(isset($misi)){echo $misi;} ?></textarea>
                    </textarea>
                  </div>
                  <button type="submit" name="savemision" value="submit" class="btn btn-primary pull-right">Save</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail" style="background:white;">
              <div class="container-fluid">
                <form method="POST" action="<?php echo current_url(); ?>">
                  <label>Set Rencana Kerja</label>
                  <div class="form-group">
                    <textarea id="summernote" rows="12" name="rencana" required><?php if(isset($rencana)){echo $rencana;} ?></textarea>
                    </textarea>
                  </div>
                  <button type="submit" name="saverencana" value="submit" class="btn btn-primary pull-right">Save</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<script>
$(document).ready(function() {
$('.date-picker').datepicker({
format: "yyyy-mm-dd"
});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#summernote1').summernote({
height: 200
});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#summernote2').summernote({
height: 200
});
});
</script>