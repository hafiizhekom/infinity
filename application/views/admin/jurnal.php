<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Jurnal</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Jurnal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
				<div class="col-md-12">
				<div id="toolbar">
          <div class="btn-group">
            <button type="button" class="btn btn-default" id='save_arsip'>
            <i class="glyphicon glyphicon-save"></i>
            </button>
            <?php if(isset($jabatan)){
              if($jabatan=="admin"){

                ?>
            <button type="button" class="btn btn-default" id='del_jurnal'>
            <i class="glyphicon glyphicon-trash"></i>
            </button>
            <?php }
                }
                 ?>
          </div>

          <div class="btn-group">
            <a class="btn btn-default" href="" data-toggle="modal" data-target="#addjurnal">Add Jurnal</a>
          </div>
        </div>
				<table class="table table-striped" id="jurnaltable" data-toggle="table"  data-toolbar="#toolbar">
				<tbody>
				<?php
					foreach ($jurnal->result() as $key => $value) {
						echo "<tr><td></td><td>".$value->title."</td><td>".$value->tanggal_upload."</td><td><a href='".base_url('jurnal/'.$value->file)."'><i class='glyphicon glyphicon-save'></i></a></td><td>".$value->id."</td><td>".base_url('jurnal/'.$value->file)."</td></tr>";
					}
				?>
				</tbody>
				</table>
				</div>
				</div>
                <!-- /.row -->
					
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

        <div class="modal fade" id="addjurnal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form action="<?php echo current_url(); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Jurnal</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="Title"  maxlength="200" required="">
      </div>
      <div class="form-group">
        <input type="file" name="jurnal" required="">
      </div>
      <div class="form-group">
        <textarea  name="abstract" id="summernote" required="">Abstract</textarea>
      </div>
      <input type="hidden" name="addjurnal" value="addjurnal">
      </div>
      <div class="modal-footer">
        <button type="submit" name="" class="btn btn-primary" value="Save">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
<form action="<?php echo base_url('adminkalbis3972/toZipJurnal'); ?>" method="POST" id="exportZip">
    
  </form>

          <script>

function delJurnal(id)
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
          <script type="text/javascript">
  $('#jurnaltable').bootstrapTable({
  columns: [{
  field:'checkbox',
  align:'center',
  checkbox:true
  },{
  title:'Title',
  field:'title',
  align:'center',
  sortable:true
  },{
  title:'Date',
  field:'date',
  align:'center',
  sortable:true
  },{
  title:'Action',
  field:'action',
  align:'center',
  sortable:true
  },{
  title:'ID',
  field:'id',
  align:'center',
  visible: false,
  sortable:true
  },{
  title:'File',
  field:'file',
  align:'center',
  visible: false,
  sortable:true
  }],
  toolbar:'#toolbar',
  search: true,
  sortable:true,
  pagination:true,
  cookie: true
  });
  </script>
    <script>
  $('#del_jurnal').on("click",function(){
  var selects = $('#jurnaltable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.id;
  });

//console.log(idsmulti);
  ids.forEach(function(entry) {
  delJurnal(entry);
  });
  $('#jurnaltable').bootstrapTable('remove', {
  field: 'id',
  values: ids
  });
  });
  </script>

    <script>
  $('#save_arsip').on("click",function(){
  var selects = $('#jurnaltable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.file;
  });
  ids.forEach(function(entry) {
  $( "#exportZip" ).append( "<input type='hidden' name='filesexport[]' value='"+entry+"'>");
  });
  $( "#exportZip" ).submit();
  });
  </script>