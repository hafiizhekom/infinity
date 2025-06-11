

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Dana</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Dokumen
                            </li>
							<li class="active"> Dana 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
				<div class="col-md-12">
        <form method="POST" action="<?php echo base_url($admin_page.'/post'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Judul" name="judul_post" required>
                  </div>
                  <div class="form-group">

                    <textarea id="summernote" rows="12" name="post">Hello Summernote</textarea>
                    </textarea>
                  </div>
                  <button type="submit" name="berita" value="submit" class="btn btn-primary pull-right">Tambah Post</button>


                </form>

				</div>
				</div>
                <!-- /.row -->
					
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