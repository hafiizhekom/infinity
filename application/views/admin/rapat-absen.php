<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
				Admin Panel <small>Absen Meeting </small>
				</h1>
				<ol class="breadcrumb">
					<li class="active"> Meeting
					</li>
					<li class="active"> <?php echo $this->rapat_model->rapat($crew->result()[0]->id_rapat)->result()[0]->topik; ?>
					</li>
					<li class="active"> Absen
					</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="container-fluid">
						<form action="<?php echo current_url(); ?>" method="POST">
								<div class="form-group">
								
									<table class="table table-striped" data-toggle="table" id="absenacaratable"  data-toolbar="#toolbar">
										<tbody>
											<?php foreach ($crew->result() as $key => $value) {
												$nama = $this->admin_model->profile($value->username)->result()[0]->nama;

												if($value->kehadiran==1){
													echo "<tr><td>".$nama."</td><td>
												<input type='hidden' name='username[".$key."]' value='".$value->username."'>
												<div class='col-sm-6'>
												<input type='radio' value='1' name='absen[".$key."]' checked> Hadir 
												</div>
												<div class=' col-sm-6'>
												<input type='radio' value='0' name='absen[".$key."]'	> Tidak Hadir</td></tr>
												</div>";
												}else{
												echo "<tr><td>".$nama."</td><td>
												<input type='hidden' name='username[".$key."]' value='".$value->username."'>
												<div class='col-sm-6'>
												<input type='radio' value='1' name='absen[".$key."]'> Hadir 
												</div>
												<div class=' col-sm-6'>
												<input type='radio' value='0' name='absen[".$key."]' checked> Tidak Hadir</td></tr>
												</div>";
												}
											} ?>
										</tbody>
									</table>
							</div>
							<input type="hidden" name="id_acara" value="<?php echo $id_acara; ?>"></input>
							<input class="btn btn-primary pull-right" value="Save" name="simpan_absen_rapat" type="submit">
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
  $('#absenacaratable').bootstrapTable({
  columns: [{
  title:'Name',
  field:'nama',
  align:'center',
  sortable:true
  },
  {
  title:'Absen',
  field:'absen',
  align:'center',
  sortable:false
  }],
  search: true,
  sortable:true,
  pagination:true,
  cookie: true,
  pageSize: 500
  
  });
  </script>