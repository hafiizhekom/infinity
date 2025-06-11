

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

        <div id="toolbar">
<div class="form-inline" role="form">
                 
            <div class="btn-group">
              <button type="button" class="btn btn-default" id='del_dana'>
              <i class="glyphicon glyphicon-trash"></i>
              </button>
            </div>
            <div class="btn-group">
              <a class="btn btn-default" id='excel_dana' href="<?php echo current_url().'/excel'; ?>">
                  Export to Excel
              </a>
            </div>
            <div class="btn-group">
              <a type="button" class="btn btn-default" href="<?php echo base_url($admin_page.'/funds/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/all'); ?>">
                All
              </a>
              <a type="button" class="btn btn-default" href="<?php echo base_url($admin_page.'/funds/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/masuk'); ?>">
                Masuk
              </a>
              <a type="button" class="btn btn-default" href="<?php echo base_url($admin_page.'/funds/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/keluar'); ?>">
                Keluar
              </a>
            </div>
              
          </div>
        </div>

				<table class="table table-striped" data-toggle="table" id="danatable" data-toolbar="#toolbar">
				<tbody>
				<?php 
                    
                    foreach ($dana->result() as $key => $value) {
                        echo "<tr><td></td><td>".$value->perihal."</td><td>".$value->jenis."</td><td>Rp. ".$value->jumlah."</td><td>".nice_date($value->date_paid, 'd F Y')."</td><td>".$value->id."</td></tr>";
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
function delDana(id)
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
  $('#danatable').bootstrapTable({
  columns: [{
  field:'checkbox',
  align:'center',
  checkbox:true
  },{
  title:'Perihal',
  field:'perihal',
  align:'center',
  sortable:true
  },{
  title:'Tipe',
  field:'jenis',
  align:'center',
  sortable:true
  },{
  title:'Jumlah',
  field:'jumlah',
  align:'center',
  sortable:true
  },{
  title:'Tanggal Masuk',
  field:'date_paid',
  align:'center',
  sortable:true
  },
  {
  title:'ID',
  field:'id',
  visible: false,
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

                      $(document).ready(function() {
                        $('.date-picker').datepicker({
                          format: "yyyy-mm-dd"
                        });

                      });
</script>

<script>
  $('#del_dana').on("click",function(){
  var selects = $('#danatable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.id;
  });

  var idsjumlah = $.map(selects, function (row) {
  return row.jumlah;
  });

  idsjumlah.forEach(function(entry) {
    
  });

  ids.forEach(function(entry) {
  delDana(entry);
  });
  $('#danatable').bootstrapTable('remove', {
  field: 'id',
  values: ids
  });
  });
  </script>
