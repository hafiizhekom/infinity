<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="limit" style="display:none;">5</div>
<div style="display:none;" id="usernameTo"><?php echo $usernameTo; ?></div>
<div style="display:none;" id="lmt">5</div>
<div id="page-wrapper">

            <div class="container-fluid">
              
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Messages</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Messages
                            </li>
							<li class="active"> <?php echo $this->admin_model->profile($usernameTo)->result()[0]->nama; ?>
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
							<ul class="nav nav-pills nav-stacked" id="chat">
								
								
							</ul>
						</div>
						<a style="width:100%;" href="#" class="btn btn-default" id="btnreadmore">Read More</a>
				</div>
				</div>
				</div>
				<div class="col-md-6" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">

          <ul class="nav nav-pills nav-stacked" id="chat_detail" style="height:200px;overflow-y: scroll;">
          </ul> 
          <div class="text-center" style="padding-top:20px;"><a href="#" id="btnreadmoredetail">Readmore</a></div>
					<form action="#" method="POST">
								<div class="form-group">
								<textarea class="form-control" placeholder="Isi" id="isi_pesan" name="isi_pesan" style="width:100%;" required></textarea>
								</div>								
								
					</form>
          <button name="add_pesan" style="width:100%;" id="add_pesan" value="submit" class="btn btn-primary btn-sm">Kirim</button>
                    
					
					
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
$('#btnreadmore').on('click', function () {
	var $limittag = $('#limit');
	var limitval = $('#limit').html();
	$limittag.html(parseInt(limitval)+5);
	$('html, body').animate({
        scrollTop: $("#btnreadmore").offset().top
    }, 2000);
	
});

$('#btnreadmoredetail').on('click', function () {
	var $limittag = $('#lmt');
	var limitval = $('#lmt').html();
	$limittag.html(parseInt(limitval)+5);
	$('#chat_detail').animate({
        scrollTop: $("#lastdetail").offset().top
    }, 1000);
});
</script>
<script>
function loadchat()
{
var limit=$('#limit').html();
$.ajax({
type: 'POST',
url: '<?php echo base_url("ajax/getChat"); ?>',
data: {
chat_limit:limit
},
success: function (response) {
// We get the element having id of display_info and put the response inside it
$( '#chat' ).html(response);
}
});
}


function loadchatdetail()
{

 var to=$('#usernameTo').html();
  var lmt=$('#lmt').html();
    

  $.ajax({
  type: 'POST',
  url: '<?php echo base_url("ajax/getChatdetail"); ?>',
  data: {
   to_username:to,
   chat_limit:lmt
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#chat_detail' ).html(response);

   
   
  }
  });

}

function adddetailchat()
{

 var to=$('#usernameTo').html();
 var isi = $('textarea#isi_pesan').val();
    

  $.ajax({
  type: 'POST',
  url: '<?php echo current_url(); ?>',
  data: {
   to_username:to,
   isi:isi
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   
   
  }
  });

}

$('#add_pesan').on('click', function () {
	adddetailchat();
	$('textarea#isi_pesan').val("");
});

setInterval(function(){
loadchat();
loadchatdetail();
}, 1000);
</script>