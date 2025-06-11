<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>	Meeting</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Meeting
                            </li>
                            <li class="active"> Edit
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php 
                if($rapat->num_rows()==0){
                	redirect(base_url($admin_page));
                }else{
                	$datarapat=$rapat->result()[0];
                }
                ?>
				<div class="row">
				<div class="col-md-12" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
					<form method="POST" action="<?php echo current_url(); ?>">
					<label>Edit Meeting</label>
					<div class="form-group">
								<input type="text" class="form-control" placeholder="Judul" name="judul_acara" value="<?php echo $datarapat->topik; ?>" maxlength="50" required>
								</div>
								<div class="form-group">
								<input type="text" class="form-control" placeholder="Tempat" name="tempat_acara" value="<?php echo $datarapat->tempat; ?>" required>
								</div>
								<div class="form-group">
								<div class="input-group">
								<input  type="text" placeholder="Tanggal"  id="date" name="date_acara" value="<?php echo nice_date($datarapat->waktu,'Y-m-d'); ?>"class="form-control" required>
								
									 
										<div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
								</div>
								</div>
								<div class="form-group">
								<div class="row">
								<div class="col-md-6">
								<select required class="form-control" name="jam_acara" >
								<option value="" disabled selected>Jam</option> 
								<?php $jam=0; while($jam<=23){echo "<option value='$jam'>$jam</option>";$jam=$jam+1;}?>
					</select>
					</div><div class="col-md-6">
					<select required class="form-control" name="menit_acara">
								<option value="" disabled selected>Menit</option> 
								<?php $mnt=0; while($mnt<=59){echo "<option value='$mnt'>$mnt</option>";$mnt=$mnt+1;}?>
					</select>
								</div></div></div>
								<div class="form-group">
								<textarea class="form-control" placeholder="Kata Pembuka" name="keterangan_acara" style="width:100%;" required><?php echo $datarapat->keterangan; ?></textarea>
								</div>
								<input type="hidden" name="id_acara" value="<?php echo $datarapat->id; ?>">
								<button type="submit" name="update_acara" value="submit" class="btn btn-primary pull-right">Update Meeting</button>
								
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
<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#date').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
										</script>