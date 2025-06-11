<?php echo $this->session->flashdata('notifikasi'); ?>
<div id="limit" style="display:none;">5</div>
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
						<a style="color:black;width: 100%;margin-bottom: 10px;" href="#" class="btn btn-default" id="btnreadmore">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="thumbnail" style="background:white;">
					<div class="container-fluid">
						<form method="POST" action="<?php echo current_url(); ?>">
							<label>Send Messages</label>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="kepada_pesan" id="username-pesan" required>
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Messages" name="isi_pesan" style="width:100%;" required></textarea>
							</div>
							<button type="submit" name="add_pesan" value="submit" class="btn btn-primary pull-right" id="test">Send</button>
							
						</form>
					</div>
				</div>
			</div>
			<!-- /.row -->
			
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
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
setInterval(function(){
loadchat();
}, 1000);
</script>
<script>
	var $input = $('#username-pesan');
	function checkingUsername(){
				var username = $input.val();
				
				$.ajax({
				type: 'POST',
url: '<?php echo base_url("ajax/checkingUsername"); ?>',
data: {
userdataname:username
},
success: function (response) {
// We get the element having id of display_info and put the response inside it
if(response=="1"){
}else{
	if(username!=""){
		alert("Username tidak ditemukan");
		$input.val("");
	}

}
}
});
}
$input.on('blur', function () {
checkingUsername();
});
</script>
<script>
$('#btnreadmore').on('click', function () {
	var $limittag = $('#limit');
	var limitval = $('#limit').html();
	$limittag.html(parseInt(limitval)+5);
});
</script>