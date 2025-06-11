<?php echo $this->session->flashdata("notifikasi"); ?>
    <div id="page-wrapper">
    <div id="limit" style="display: none;">5</div>

    <div id="email" style="display: none;"><?php if($email!=""){echo $email;}?>
    </div>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small>Feedback</small>
                        </h1>
                        <ol class="breadcrumb">
							<li><a href="<?php echo base_url($admin_page.'/feedback'); ?>">Feedback</a>
                            </li>
                            <li class="active"><?php if($email!=""){$email=str_replace("_dot_", ".", $email);
  $email=str_replace("_at_", "@", $email);echo $email;}?>
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
				<ul class="nav nav-pills nav-stacked" id="feedback" style="height:200px;overflow-y: scroll;">
					<?php //echo feedback($limit); ?>
			
				</ul>
                <div class="text-center" style="padding-top:20px;"><a href="#" id="btnreadmore">Readmore</a></div>
                <form method="POST" action="<?php current_url(); ?>">
                <textarea class="form-control" name="isifeedback"></textarea>
				
                <input type="hidden" name="emailfeedback" value="<?php echo $email; ?>">
                <input type="submit" class="btn btn-primary" id="btnreadmore" style="width:100%;margin-top: 10px;" name="sendfeedback" value="Send">
                </form>
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
var email=$('#email').html();
$.ajax({
type: 'POST',
url: '<?php echo base_url("ajax/getFeedbackdetail"); ?>',
data: {
feedback_limit:limit,
email: email
},
success: function (response) {

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
    $('#feedback').animate({
        scrollTop: $("#lastdetail").offset().top
    }, 1000);
});

</script>