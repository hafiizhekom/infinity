<?php echo $this->session->flashdata("notifikasi");?>
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
        Admin Panel <small>Archive</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active"> Documents
          </li>
          <li class="active"> Archive
          </li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-6">
        <div id="toolbar">
          <div class="btn-group">
            <button type="button" class="btn btn-default" id='save_arsip'>
            <i class="glyphicon glyphicon-save"></i>
            </button>
            <button type="button" class="btn btn-default" id='del_arsip'>
            <i class="glyphicon glyphicon-trash"></i>
            </button>
          </div>

          <div class="btn-group">
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/archive/'); ?>">All</a>
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/archive/none'); ?>">None</a>
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/archive/acara'); ?>">Acara</a>
            <a class="btn btn-default" href="<?php echo base_url($admin_page.'/archive/rapat'); ?>">Rapat</a>
          </div>
        </div>
        <table class="table table-striped" id="arsiptable" data-toggle="table"  data-toolbar="#toolbar">
          <div class="container-fluid">
            
            <tbody>
              <?php
              if(isset($arsip)){
               foreach ($arsip as $key => $value) {
              
              echo "<tr><td></td><td>".$value->title."</td><td>".$value->events."</td><td>".nice_date($value->date_upload, 'd M Y')."</td><td>".$value->id."</td><td><a href='".base_url('archive/'.$value->type_events.'/'.$value->file)."'><i class='glyphicon glyphicon-save'></i></a></td><td>".$value->type_events."</td><td>".base_url('archive/'.$value->type_events.'/'.$value->file)."</td><td>".$value->file."</td></tr>";
              } 
              }?>
            </tbody> 
          </table>
        </div>
        <div class="col-md-6">
          <div class="thumbnail" style="background:white;">
            <div class="container-fluid">
              <form method="POST" action="<?php echo current_url(); ?>" enctype="multipart/form-data">
                <label>Add Archive</label>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nama Arsip" name="nama_arsip" maxlength="100"
                  required>
                </div>
                <div class="form-group">
                  <select name="type_arsip" class="form-control" id="type_arsip" onchange="loadoptionselectarsip()">
                    <option value="0">None</option>
                    <option value="1">Acara</option>
                    <option value="2">Rapat</option>
                  </select>
                </div>
                <div id='getloadoptionarsip'>
                </div>
                <div class="form-group">
                  <input type="file" name="arsip" data-toggle="tooltip" data-placement="top" title="Type File .xls .xlsx .doc .docx .pdf .xml" required>
                </div>
                <button type="submit" name="add_arsip" value="submit" class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Type File .xls .xlsx .doc .docx .pdf .xml">Save</button>
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
  <form action="<?php echo base_url('adminkalbis3972/toZip'); ?>" method="POST" id="exportZip">
    
  </form>
  <script>

function delArsip(id)
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
  // When the document is ready
  $(document).ready(function() {
  $('.date-picker').datepicker({
  format: "yyyy/mm/dd"
  });
  });
  </script>
  <script type="text/javascript">
  $('#arsiptable').bootstrapTable({
  columns: [{
  field:'checkbox',
  align:'center',
  checkbox:true
  },{
  title:'Archive',
  field:'arsip',
  align:'center',
  sortable:true
  },{
  title:'Event',
  field:'event',
  align:'center',
  sortable:true
  },{
  title:'Tanggal',
  field:'date_upload',
  align:'center',
  sortable:true
  },{
  title:'ID',
  field:'id',
  visible:false,
  align:'center'
  },{
  title:'Export',
  field:'export',
  align:'center',
  valign:'center'
  },{
  title:'Type',
  field:'tipe',
   visible:false,
  align:'center',
  valign:'center'
  },{
  title:'File',
  field:'file',
  visible:false,
  align:'center',
  valign:'center'
  },{
  title:'File',
  field:'murnifile',
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
  $('#del_arsip').on("click",function(){
  var selects = $('#arsiptable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.file;
  });
  var idsmulti = $.map(selects, function (row) {
  return row.murnifile+":"+row.id+":"+row.tipe;
  });
  console.log(idsmulti);
  idsmulti.forEach(function(entry) {
  delArsip(entry);
  });
  $('#arsiptable').bootstrapTable('remove', {
  field: 'file',
  values: ids
  });
  });
  </script>
  <script>
  $('#save_arsip').on("click",function(){
  var selects = $('#arsiptable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.file;
  });
  var idsars = $.map(selects, function (row) {
  return row.arsip;
  });
  ids.forEach(function(entry) {
  
  $( "#exportZip" ).append( "<input type='hidden' name='filesexport[]' value='"+entry+"'>");
  });
  $( "#exportZip" ).submit();
  });
  </script>
