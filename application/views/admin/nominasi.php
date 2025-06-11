<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Registration</small>
                        </h1>
                        <ol class="breadcrumb">
              <li class="active"> Registration
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
        </div>
        <table class="table table-striped" id="nominasitable" data-toggle="table"  data-toolbar="#toolbar">
        <tbody>
        <?php
          foreach ($nominasi->result() as $key => $value) {
            echo "<tr><td></td><td>".$value->nim."</td><td>".$value->nama."</td><td>".$value->telepon."</td><td>".$value->email."</td><td>".$value->tanggal_lahir."</td><td><a data-toggle='modal' data-target='#modalnominasi".$key."' href=''><span class='glyphicon glyphicon-eye-open'></span></a></td><td>".$value->id."</td></tr>";
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

        <?php

        foreach ($nominasi->result() as $key => $value) {
          echo "
<div id='modalnominasi".$key."' class='modal fade' >
  <div class='modal-dialog'>
    <!-- Modal content-->
    <form action='".current_url()."' method='POST'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Import Registration</h4>
      </div>
      <div class='modal-body'>
        <p>NIM: ".$value->nim."</p>
        <p>Nama: ".$value->nama."</p> 
        <p>Telepon: ".$value->telepon."</p>
        <p>Email: ".$value->email."</p>
        <p>Motivasi: <br>".$value->motivasi."</p>
        
        <div class='thumbnail' style='background-color:white;'>Apa anda yakin ingin memindahkan nominasi ke crew?</div>
          <div class='form-group'>
          <input type='text' name='username' placeholder='Username' maxlength='12'  class='form-control' required>
          </div>
          <div class='form-group'>
           <input type='password' class='form-control' placeholder='Password' name='password_anggota' id='password_anggota' required>
          </div>
          <div class='form-group'>
            <input type='password' class='form-control' placeholder='Ulangi Password' name='ulangi_password_anggota' id='ulangi_password_anggota' required>
          </div>
          <div class='form-group'>
            <select required class='form-control' name='sebagai_anggota' >
                <option value='' disabled selected>Sebagai</option>";

                foreach ($jabs->result() as $key => $valjabs) {
                  echo "<option value='".$valjabs->id."'>".$valjabs->jabatan."</option>";
                  }

                echo "</select>
          </div>

              <div class='form-group'>
                <select required class='form-control' name='jabatan_anggota' >
                  <option value='' disabled selected>Jabatan</option>";

                  foreach ($crew->result() as $key => $valcrews) {
                   echo "<option value='".$valcrews->id."'>".$valcrews->crew."</option>";
                  }

                  echo "
                </select>
              </div>
      </div>
      <div class='modal-footer'>
      <input type='hidden' name='id_import' value='".$value->id."'>
    <input type='submit' name='import' value='Import' id='import' class='btn btn-primary' disabled>
  </div>
    </div>
    </form>
  </div>
</div>";
        }

        ?>
          <script>

function delNominasi(id)
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
  $('#nominasitable').bootstrapTable({
  columns: [{
  field:'checkbox',
  align:'center',
  checkbox:true
  },{
  title:'NIM',
  field:'nim',
  align:'center',
  sortable:true
  },{
  title:'Nama',
  field:'author',
  align:'center',
  sortable:true
  },{
  title:'Telepon',
  field:'phone',
  align:'center',
  sortable:true
  },{
  title:'Email',
  field:'email',
  visible:true,
  align:'center'
  },{
  title:'Tanggal Lahir',
  field:'ttl',
  visible:true,
  align:'center'
  },{
  title:'Action',
  field:'action',
  visible:true,
  align:'center'
  },
  {
  title:'ID',
  field:'id',
  visible:false,
  align:'center'
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
  var selects = $('#nominasitable').bootstrapTable('getSelections');
  var ids = $.map(selects, function (row) {
  return row.id;
  });

//console.log(idsmulti);
  ids.forEach(function(entry) {
  delNominasi(entry);
  });
  $('#nominasitable').bootstrapTable('remove', {
  field: 'id',
  values: ids
  });
  });
  </script>

  <script>
var $secpass = $('#ulangi_password_anggota');
var $firstpass = $('#password_anggota');

$secpass.on('blur', function () {
if($secpass.val() == $firstpass.val()){
   $('#import').prop("disabled", false);
}else{
  $('#import').prop("disabled", true);
  $secpass.val("");
  $firstpass.val("");
  alert("Password tidak sama");
}
});

$firstpass.on('blur', function () {
if($secpass.val() == $firstpass.val()){
   $('#import').prop("disabled", false);
}else{
  $('#import').prop("disabled", true);
}
});
</script>