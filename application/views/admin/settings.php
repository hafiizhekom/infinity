<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Setting</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Setting
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
				<div class="row">
				<div class="col-md-12" >
					<div class="container-fluid">
					<form method="POST" action="<?php echo current_url(); ?>">
					<label>Theme</label>
					<div class="form-group">
					<?php 

					foreach ($theme->result() as $key => $value) {
						echo "<div class='radio'>
					  <label><input type='radio' name='theme' value='".$value->name_theme."'>".$value->desc_theme."</label>
					</div>";
					}

					?>
					</div>
					<input type="submit" name="setting_theme" class="btn btn-primary pull-right" value="Save">
					</form>
					</div>
					<div class="container-fluid">
					<label>Slide</label>
					<div class="form-group">
					<?php foreach ($slide->result() as $key => $value) {
                        

echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style=''>
												    <div class='hovereffect'>
												        <img class='img-responsive' src='".base_url('image/slide/'.$value->file)."' alt='' style='object-fit: cover; width:100%;height:300px;'>
												        <div class='overlay'>
												           <a class='info' href='#' data-toggle='modal' data-target='#delslide".$key."'>Delete</a>
												        </div>
												    </div>
												</div>";
                    } ?>
					</div>
					<button style="width:100%;margin-top:20px;" data-toggle="modal" data-target="#addslide" class="btn btn-primary">Add Slide</button>
					</div>
					</div>
				</div>
				</div>
                <!-- /.row -->
					
                <!-- /.row -->

            </div>



            <div class="modal fade" id="addslide" tabindex="0">
  <div class="modal-dialog">
    <div class="modal-content">
	<form action="".$actual_link."" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Image Slide</h4>
      </div>
      <div class="modal-body">
	  <div class="form-group">
	  <label>Upload Image</label>
	  <input type="file" name="image_slide" required>
	  </div>
	  <div class="form-group">
	  <label>Link</label>
	  <input class="form-control" type="text" name="link_slide" placeholder="Link">
	  </div>
    <p class="help-block">atau</p>
    <div class="form-group">
    <label>Post</label>
    <select name="post" class="form-control">
    <option value="" disabled selected>Post</option>
      <?php
        foreach ($this->news_model->berita()->result() as $key => $value) {
          echo "<option value='".$value->type_events.":".$value->id."'>".$value->judul."</option>";
        }
      ?>
    </select>
    </div>
	  </div>
		<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="addslide" value="Upload">
      </div>
	  </form>
      </div>
    </div>
  </div>

  <?php foreach ($slide->result() as $key => $value) {
  	echo "
<div id='delslide".$key."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Yakin ingin menghapus gambar slide?</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      <img style='width:100%;' src='".base_url('image/slide/'.$value->file)."'>
      <br>
      <br>
       <form method='POST' action='".current_url()."'>
       		<input type='hidden' name='file_foto' value='".$value->file."'>
        	<input type='hidden' name='id_slide' value='".$value->id."'>
        	<input type='submit' name='delslide' value='Delete' class='btn btn-primary'>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
}
  	?>