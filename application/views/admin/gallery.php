<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Gallery</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Gallery
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
				<div class="row">
				<div class="col-md-12" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
					<form method="POST" action="" enctype="multipart/form-data">
					<label>Add Images</label>
					<div class="form-group" >
					<input type="text" name="album_new" class="form-control" placeholder="Album Baru" maxlength="50">
					</div>
					<p class="help-block">atau</p>
					<div class="form-group" >
					<select name="album_option" class="form-control">
					<option value="" disabled selected>Album</option>
					  <?php foreach ($album->result() as $key => $value) {
					  	echo "<option value='".$value->id."'>".$value->album."</option>";
					  } ?>
					</select>
					</div>
					<div class="form-group">
					<input type="file" name="foto[]" multiple>
					</div>
					<button type="submit" name="gambar" class="btn btn-primary pull-right">Upload</button>
					</form>
					</div>
					</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
					  <div class="panel-heading"><h3 class="panel-title">Album</h3></div>
					  <div class="panel-body">
						<ul class="nav nav-pills nav-stacked" style="color:white;" id="nav-pandan">
							<?php 
									if($album->num_rows()!=0){
									foreach ($album->result() as $key => $value) {
										echo "<li><a href='' data-toggle='modal' data-target='#modalalbum".$key."'>".$value->album."</a></li>";
									}
								}else{
										echo "<li>Tidak ada album</li>";
									}
								
							?>
						</ul>
					  </div>
					  </div>

				
				</div>
				<?php 

									if(isset($foto)){
										foreach ($foto->result() as $key => $value) {

											echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12' style=''>
												    <div class='hovereffect'>
												        <img class='img-responsive' src='".base_url('image/gallery/'.$value->file)."' alt='' style='object-fit: cover; width:230px;height:230px;'>
												        <div class='overlay'>
												           <a class='info' href='#' data-toggle='modal' data-target='#modal".$key."'>delete</a>
												        </div>
												    </div>
												</div>";
										}
									}
								
								?>
				</div>

				
								

				
				
                <!-- /.row -->
					
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>


        <?php 
									if(isset($foto)){
										foreach ($foto->result() as $key => $value) {

											echo "
<div id='modal".$key."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Yakin ingin menghapus?</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      	
        <form method='POST' action='".current_url()."'>
        <input type='hidden' name='file_foto' value='".$value->file."'>	
        	<input type='hidden' name='id_foto' value='".$value->aselole."'>	
       		<input type='submit' name='hapus' value='Hapus' class='btn btn-primary'> <a class='btn btn-default' data-dismiss='modal'>Batal</a>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
										}
									}





								
								?>


								<?php 
								if($album->num_rows()!=0){
									foreach ($album->result() as $key => $value) {
										echo "
<div id='modalalbum".$key."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Album ".$value->album."</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      <p class='text-center'>Total Image: ".$this->gallery_model->totalfoto($value->id)."</p>
       <form method='POST' action='".current_url()."'>
        	<input type='hidden' name='id_album' value='".$value->id."'>	
       		<a class='btn btn-default' href='".base_url($admin_page.'/gallery/'.$value->id)."'>View</a> <input type='submit' name='delalbum' value='Delete Album' class='btn btn-primary'>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
									}
								}
								
							?>
