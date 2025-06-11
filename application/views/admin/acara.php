<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">


            <div class="container-fluid">
 
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> 
                            Admin Panel <small>	Event</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Event
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
				<div class="row">
				<div class="col-md-12" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
					<form method="POST" action="<?php echo current_url(); ?>">
					<label>Add Event</label>
					<div class="form-group">
								<input type="text" class="form-control" placeholder="Judul" name="judul_acara" maxlength="50" required>
								</div>
								<div class="form-group">
								<input type="text" class="form-control" placeholder="Tempat" name="tempat_acara" required>
								</div>
								<div class="form-group">
								<div class="input-group">
								<input  type="text" placeholder="Tanggal"  id="date" name="date_acara" class="form-control" required>
								
									 
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
								<textarea class="form-control" placeholder="Kata Pembuka Surat Acara" name="kata_pembuka" style="width:100%;" required></textarea>
								</div>
								<div class="form-group">
								<textarea class="form-control" id="summernote" placeholder="Kata Pembuka" id="summernote" name="keterangan_acara" style="width:100%;" required>Posting</textarea>
								</div>
								
								<button type="submit" name="add_acara" value="submit" class="btn btn-primary pull-right">Save</button>
								
					</form>
					</div>
					</div>
				</div>
				</div>
                <!-- /.row -->
					
					<div class="row">
				<div class="col-md-12">
				<div class="row">
				<div class="container-fluid">
				<div id="toolbar">
					<div class="btn-group">
			            <button type="button" class="btn btn-default" id='del_acara'>
			            <i class="glyphicon glyphicon-trash"></i>
			            </button>
			          </div>

				</div>
				<table class="table table-striped" data-toggle="table" id="acaratable"  data-toolbar="#toolbar" data-unique-id="id">
				<tbody>
				<?php foreach ($acara->result() as $key => $value) {
					$linkview = $this->news_model->tempgetidberitaacara($value->id)->result()[0]->id;
					echo "<tr><td>1</td><td><a href='".base_url('event/page/'.$linkview)."'>".$value->nama_acara."</a></td><td>".nice_date($value->waktu, 'd F Y')."</td><td>".nice_date($value->waktu, 'H:i')."</td><td>".$value->tempat."</td><td><a href='".base_url($admin_page.'/eventacara/'.$value->id)."'><span class='glyphicon glyphicon-edit'></span></a> <a href='".base_url($admin_page.'/toWordAcara/'.$value->id)."'><span class='glyphicon glyphicon-download'></span></a> <a href='".base_url($admin_page.'/absenacara/'.$value->id)."'><span class='glyphicon glyphicon-user'></span></a></td><td>".$value->id."</td>";

					if($this->arsip_model->arsipacara($value->id)->num_rows()!=0){
						echo "<td>1</td>";
					}else{
						echo "<td>0</td>";
					}

					echo "</tr>";
				} ?>
				</tbody>
				</table>
				</div>
				</div>
				</div>
				
				</div>
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
										 

										<script>
  	function stateFormatter(value, row, index) {
        if (row['id']=="1") {
        	
            return {
                disabled: true
            };
        }else{
        	return {
                disabled: false
            };
        }
        if (index === -100) {
            return {
                disabled: true,
                checked: true
            }
        }
        return value;
    }
  </script>
										  

        <script>
$('#acaratable').bootstrapTable({
columns: [{
field:'checkbox',
align:'center',
formatter: stateFormatter,
checkbox:true

},{
title:'Event',
field:'acara',
align:'center',
sortable:true
},
{
title:'Date',
field:'date_event',
align:'center',
sortable:true
},{
title:'Time',
field:'time_event',
align:'center',
sortable:true
},{
title:'Place',
field:'tempat',
align:'center',
sortable:true
},
{
title:'Action',
field:'edit',
align:'center',
sortable:false
},
{
field:'idedit',
visible:false
},{
title:'ArsipCode',
field:'id',
visible:false
}],
search: true,
sortable:true,
pagination:true,
cookie: true
});
</script>
  <script>

function delAcara(id)
{
  var formData = {id:id};


 $.ajax({
    type:'POST',
    url:'<?php echo current_url(); ?>',
    data:formData,
    success: function(data){

    	
    }

     });


}
  </script>
<script>
  $('#del_acara').on("click",function(){
  var selects = $('#acaratable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.idedit;
  });
  ids.forEach(function(entry) {
  delAcara(entry);
  });
  $('#acaratable').bootstrapTable('remove', {
  field: 'idedit',
  values: ids
  });
  });
  </script>

