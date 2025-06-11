<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
				Admin Panel <small>Crew</small>
				</h1>
				<ol class="breadcrumb">
					<li class="active"> Dokumen
					</li>
					<li class="active"> Crew
					</li>
				</ol>
			</div> 
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="container-fluid">
						<table class="table table-striped" class="table table-striped" data-toggle="table" id="crewtable"  data-toolbar="#toolbar">
							<tbody>
								<?php foreach ($crewadmin->result() as $key => $value) {
									if($value->active==0){
										echo "<tr class='danger'><td>".$value->nama."</td><td>".$value->username."</td><td>".$value->jabatan."</td><td>".$value->crew."</td><td>
										<a href='' data-toggle='modal' data-target='#viewimage".$value->id."'><span class='glyphicon glyphicon-eye-open'></span></a> 
										<a href='' data-toggle='modal' data-target='#edit".$value->id."'><span class='glyphicon  glyphicon-pencil'></span></a> 
										<a href='' data-toggle='modal' data-target='#aktif".$value->id."'><span class='glyphicon glyphicon-ok'></span></a> 
										<a href='' data-toggle='modal' data-target='#del".$value->id."'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
									}else{
										echo "<tr><td>".$value->nama."</td><td>".$value->username."</td><td>".$value->jabatan."</td><td>".$value->crew."</td><td>
										<a href='' data-toggle='modal' data-target='#viewimage".$value->id."'><span class='glyphicon glyphicon-eye-open'></span></a> 
										<a href='' data-toggle='modal' data-target='#edit".$value->id."'><span class='glyphicon  glyphicon-pencil'></span></a> 
										<a href='' data-toggle='modal' data-target='#non".$value->id."'><span class='glyphicon glyphicon-remove'></span></a> 
										<a href='' data-toggle='modal' data-target='#del".$value->id."'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
									}
									
								} ?>
							</tbody>
						</table>
						<table class="table table-striped" data-toggle="table" id="crewstatustable"  data-toolbar="#toolbar">
							<tbody>
								<?php foreach ($this->crew_model->crewstatus()->result() as $key => $value) {
									echo "<tr><td>".$value->crew."</td><td><a href='' data-toggle='modal' data-target='#delcrewstats".$key."'><span class='glyphicon glyphicon-trash'></span></a></td>";
									
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
						<form method="POST" action="<?php echo current_url(); ?>" enctype="multipart/form-data">
							<label>Add Crew</label>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Nama" name="nama_anggota" maxlength="50" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="username_anggota" maxlength="12" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password_anggota" id="password_anggota" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Ulangi Password" name="ulangi_password_anggota" id="ulangi_password_anggota" required>
							</div>
							<div class="form-group">
								<select required class="form-control" name="sebagai_anggota" >
									<option value="" disabled selected>Sebagai</option>
									<?php foreach ($jabatans->result() as $key => $value) {
									echo "<option value='".$value->id."'>".$value->jabatan."</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<select required class="form-control" name="jabatan_anggota" >
									<option value="" disabled selected>Jabatan</option>
									<?php foreach ($crew->result() as $key => $value) {
									echo "<option value='".$value->id."'>".$value->crew."</option>";
									}
									?>
								</select>
							</div>
							<button type="submit" id="add_crew" name="add_crew" value="submit" class="btn btn-primary pull-right" disabled="">Save</button>
						</form>
					</div>
				</div>
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
						<form method="POST" action="<?php echo current_url(); ?>">
							<label>Add Jabatan</label>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Jabatan" name="jabatan" maxlength="50" required>
							</div>
							<button type="submit" id="add_jabatan" name="add_jabatan" value="submit" class="btn btn-primary pull-right">Save</button>
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
<?php
	foreach ($crewadmin->result() as $key => $value) {
			
			if($value->image==""){
				$image = base_url('foto/default.jpg');
			}else{
				$image = base_url('foto/'.$value->image);
			}

		echo "
<div id='viewimage".$value->id."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>".$value->nama."</h4>
      </div>
      <div class='modal-body'>
        <img style='width:100%;' src='".$image."'>
      </div>
    </div>
  </div>
</div>";
	}

	foreach ($crewadmin->result() as $key => $value) {
		echo "<div class='modal fade' id='edit".$value->id."' tabindex='0'>
  <div class='modal-dialog'>
    <div class='modal-content'>
	<form action='".current_url()."' method='POST' enctype='multipart/form-data' autocomplete='off'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title'>Edit</h4>
      </div>
      <div class='modal-body'>
	  <div class='form-group'><label>Nama</label>
								<input type='text' class='form-control' placeholder='Nama' name='nama_anggota' value='".$value->nama."' maxlength='50' required>
								</div>
								<div class='form-group'>
								<label>Username</label>
								<input type='text' class='form-control' id='disabledInput' placeholder='Username' name='username_anggota' value='".$value->username."' disabled>
								</div>
								<div class='form-group'>
								<label>Foto</label>
								<input type='file' name='foto_anggota'>
								*Biarkan kosong jika tidak ingin memperbarui gambar
								</div>
								<div class='form-group'>
								<label>Sebagai</label>
								<select required class='form-control' name='sebagai_anggota' >
								<option value='' disabled selected>Sebagai</option>";

									foreach ($jabatans->result() as $key => $valjabs) {
									
									if($valjabs->id==$value->id_jabatan){
										echo "<option value='".$valjabs->id."' selected=''>".$valjabs->jabatan."</option>";
									}else{
										echo "<option value='".$valjabs->id."'>".$valjabs->jabatan."</option>";
									}
									}

								echo "
								</select>
								</div>
								
								<div class='form-group'>
								<label>Jabatan</label>
								<select required class='form-control' name='jabatan_anggota' >
								<option value='' disabled selected>Jabatan</option> 
								";

								foreach ($crew->result() as $key => $valcrw) {
									
									if($valcrw->id==$value->id_crew){
										echo "<option value='".$valcrw->id."' selected=''>".$valcrw->crew."</option>";
									}else{
										echo "<option value='".$valcrw->id."'>".$valcrw->crew."</option>";
									}
									}

								echo"
								</select>
								</div>
		<input type='hidden' name='id' value='".$value->idokcomputer."'>
		</div>
		<div class='modal-footer'>
		<button type='submit' class='btn btn-primary' name='edit_crew' value='Save'>Save</button>
      </div>
	  </form>
      </div>
    </div>
  </div>";
	}

	foreach ($crewadmin->result() as $key => $value) {
			
			if($value->image==""){
				$image = base_url('foto/default.jpg');
			}else{
				$image = base_url('foto/'.$value->image);
			}


			if($value->active==1){

			

		echo "
<div id='non".$value->id."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Yakin ingin menonaktifkan?</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      	<div class='thumbnail' style='background:#fff;'>Menonaktifkan Akun akan menyebabkan akun tidak dapat digunakan untuk login.</div>
        <p class='text-center'>".$value->nama." | ".$value->username."</p>
        <form method='POST' action='".current_url()."'>
        	<input type='hidden' name='username' value='".$value->username."'>	
       		<input type='submit' name='nonaktif' value='Non Aktifkan' class='btn btn-primary'> <a class='btn btn-default' data-dismiss='modal'>Batal</a>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
	}else{
		echo "
<div id='aktif".$value->id."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Yakin ingin mengaktifkan?</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      	<div class='thumbnail' style='background:#fff;'>Menonaktifkan Akun akan menyebabkan akun tidak dapat digunakan untuk login.</div>
        <p class='text-center'>".$value->nama." | ".$value->username."</p>
        <form method='POST' action='".current_url()."'>
        	<input type='hidden' name='username' value='".$value->username."'>	
       		<input type='submit' name='aktif' value='Aktifkan' class='btn btn-primary'> <a class='btn btn-default' data-dismiss='modal'>Batal</a>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
	}
}

	foreach ($crewadmin->result() as $key => $value) {
			
			if($value->image==""){
				$image = base_url('foto/default.jpg');
			}else{
				$image = base_url('foto/'.$value->image);
			}

		echo "
<div id='del".$value->id."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Yakin ingin menghapus?</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      	<div class='thumbnail' style='background:#fff;'>Menghapus Akun akan menghilangkan akun untuk selamanya. Akun tidak dapat dikembalikan.</div>
        <p class='text-center'>".$value->nama." | ".$value->username."</p>
        <form method='POST' action='".current_url()."'>
        	<input type='hidden' name='username' value='".$value->username."'>	
       		<input type='submit' name='delete' value='Delete' class='btn btn-primary'> <a class='btn btn-default' data-dismiss='modal'>Batal</a>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
	}


	foreach ($this->crew_model->crewstatus()->result() as $key => $value) {
		echo "
<div id='delcrewstats".$key."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Yakin ingin menghapus?</h4>
      </div>
      <div class='modal-body'>
      <div class='text-center'>
      	<div class='thumbnail' style='background:#fff;'>Jabatan yang sedang dimiliki user tidak akan bisa dihapus.</div>
        <form method='POST' action='".current_url()."'>
        	<input type='hidden' name='idcrewstats' value='".$value->id."'>	
       		<input type='submit' name='deletecrewstats' value='Delete' class='btn btn-primary'> <a class='btn btn-default' data-dismiss='modal'>Batal</a>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>";
	}
?>

<script>
$('#crewtable').bootstrapTable({
columns: [{
title:'Nama',
field:'nama',
align:'center',
sortable:true
},
{
title:'Username',
field:'username',
align:'center',
sortable:true
},{
title:'Sebagai',
field:'jabatan',
align:'center',
sortable:true
},{
title:'Jabatan',
field:'crew',
align:'center',
sortable:true
},{
title:'Action',
field:'action',
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
$('#crewstatustable').bootstrapTable({
columns: [{
title:'Jabatan',
field:'jabatan',
align:'center',
sortable:true
},{
title:'Action',
field:'action',
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
var $secpass = $('#ulangi_password_anggota');
var $firstpass = $('#password_anggota');

$secpass.on('blur', function () {
if($secpass.val() == $firstpass.val()){
	 $('#add_crew').prop("disabled", false);
}else{
	$('#add_crew').prop("disabled", true);
	$secpass.val("");
	$firstpass.val("");
	alert("Password tidak sama");
}
});

$firstpass.on('blur', function () {
if($secpass.val() == $firstpass.val()){
	 $('#add_crew').prop("disabled", false);
}else{
	$('#add_crew').prop("disabled", true);
}
});
</script>