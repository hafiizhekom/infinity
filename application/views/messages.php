<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Pesan</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Messages
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
				<div class="col-md-6">
				<div class="row">
				<div class="container-fluid">
				<div class="thumbnail" style="background:white;">
				<ul class="nav nav-pills nav-stacked">
					<?php //echo pesan($limit); ?>
					<li style="border-bottom:1px solid #DDD;"><a style="color:black;" href="pesan.php?limit=<?php //$limit=$limit+5; echo $limit; ?>">
      
    <div class="text-center">Read More</div>
	</a></li>
				</ul>
				
				</div>
				</div>
				</div>
				</div>
				<div class="col-md-6" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
					<form method="POST" action="pesan.php?limit=<?php //echo $limit; ?>">
					<label>Kirim Pesan</label>
					<div class="form-group">
								<input type="text" class="form-control" placeholder="Username Tujuan" name="kepada_pesan" required>
								</div>
								<div class="form-group">
								<textarea class="form-control" placeholder="Isi" name="isi_pesan" style="width:100%;" required></textarea>
								</div>
								<button type="submit" name="add_pesan" value="submit" class="btn btn-primary pull-right">Kirim</button>
								
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