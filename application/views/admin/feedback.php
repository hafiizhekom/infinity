<?php echo $this->session->flashdata('notifikasi'); ?>
    <div id="page-wrapper">
    <div id="limit" style="display: none;">5</div>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Feedback</small>
                        </h1>
                        <ol class="breadcrumb">
							<li class="active"> Feedback
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
				<div class="col-md-12">
				<div class="row">
				<div class="container-fluid">
				<div class="thumbnail" style="background:white;">
				<ul class="nav nav-pills nav-stacked" id="feedback">
					<?php //echo feedback($limit); ?>
			
				</ul>
                <button class="btn btn-primary" id="btnreadmore" style="width:100%;">Readmore</button>
				
				</div>
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
function loadchat()
{
var limit=$('#limit').html();
$.ajax({
type: 'POST',
url: '<?php echo base_url("ajax/getFeedback"); ?>',
data: {
feedback_limit:limit
},
success: function (response) {
// We get the element having id of display_info and put the response inside it
$( '#feedback' ).html(response);
}
});
}
setInterval(function(){
loadchat();
}, 1000);
</script>
<script>
$('#btnreadmore').on('click', function () {

    var $limittag = $('#limit');
    var limitval = $('#limit').html();
    $limittag.html(parseInt(limitval)+5);
    
});
</script>