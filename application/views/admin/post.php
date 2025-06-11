<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Post</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Post
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
				<div class="col-md-12">
				<div id="toolbar">
          <div class="btn-group">
            <button type="button" class="btn btn-default" id='del_berita'>
            <i class="glyphicon glyphicon-trash"></i>
            </button>
          </div>

          <div class="btn-group">
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/post/'); ?>">All</a>
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/post/none'); ?>">None</a>
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/post/acara'); ?>">Acara</a>
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/post/rapat'); ?>" disabled="">Rapat</a>
          </div>

          <div class="btn-group">
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/post/add'); ?>">Add Post</a>
          </div>
        </div>
				<table class="table table-striped" id="beritatable" data-toggle="table"  data-toolbar="#toolbar">
				<tbody>
				<?php
					foreach ($berita->result() as $key => $value) {
						echo "<tr><td></td><td><a href='".base_url($admin_page.'/post')."/".$value->type_events."-".$value->id."'>".$value->judul."</a></td><td>".$value->author."</td><td>".$value->date_posted."</td><td>".$value->id_events."</td><td>".$value->type_events."</td><td>".$value->id."</td><td>".$value->type_events."-".$value->id."</td></tr>";
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
          <script>

function delBerita(id)
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
  $('#beritatable').bootstrapTable({
  columns: [{
  field:'checkbox',
  align:'center',
  checkbox:true
  },{
  title:'Judul',
  field:'judul',
  align:'center',
  sortable:true
  },{
  title:'Author',
  field:'author',
  align:'center',
  sortable:true
  },{
  title:'Date',
  field:'date_posted',
  align:'center',
  sortable:true
  },{
  title:'ID Events',
  field:'id_events',
  visible:false,
  align:'center'
  },{
  title:'Type Events',
  field:'tipe_events',
  visible: false,
  align:'center',
  valign:'center'
  },{
  title:'ID',
  field:'id',
  visible:false,
  align:'center',
  valign:'center'
  },{
  title:'Kode',
  field:'kode',
  visible:false,
  align:'center',
  valign:'center'
  }],
  toolbar:'#toolbar',
  search: true,
  sortable:true,
  pagination:true,
  cookie: true
  });
  </script>
    <script>
  $('#del_berita').on("click",function(){
  var selects = $('#beritatable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.kode;
  });
  var idsmulti = $.map(selects, function (row) {

  return row.id+":"+row.tipe_events;
  });

//console.log(idsmulti);
  idsmulti.forEach(function(entry) {
  delBerita(entry);
  });
  $('#beritatable').bootstrapTable('remove', {
  field: 'kode',
  values: ids
  });
  });
  </script>