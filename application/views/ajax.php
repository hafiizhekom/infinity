<script type="text/javascript">
function loadoptionselectarsip()
{

  var type = $("#type_arsip").children(":selected").attr("value");
  var uri = '';
  if (type=='1'){
  	$.ajax({
		url: '<?php echo base_url("ajax/getAcaraOptionSelect"); ?>',
		success: function (response) {
		// We get the element having id of display_info and put the response inside it
		$( '#getloadoptionarsip' ).html(response);

		}
	});
  }else if (type=='2') {
  	$.ajax({
		url: '<?php echo base_url("ajax/getRapatOptionSelect"); ?>',
		success: function (response) {
		// We get the element having id of display_info and put the response inside it
		$( '#getloadoptionarsip' ).html(response);

		}
	});
  }else{
  	$("#getloadoptionarsip").html("");
  }


}


function loadmessagescounternotif()
{
$.ajax({
url: '<?php echo base_url("ajax/getMessagesCounterNotif"); ?>',
success: function (response) {
// We get the element having id of display_info and put the response inside it
$( '#messagescounternotif' ).html(response);

}
});
}

function loadmessagesnotif()
{


 $.ajax({
url: '<?php echo base_url("ajax/getMessagesNotif"); ?>',
 success: function (response) {
  // We get the element having id of display_info and put the response inside it
  $( '#messagesnotif' ).html(response);

 }
 });


}

function loadfeedbackcounternotif()
{


$.ajax({
url: '<?php echo base_url("ajax/getFeedbackCounterNotif"); ?>',
success: function (response) {
// We get the element having id of display_info and put the response inside it
$( '#feedbackcounternotif' ).html(response);

}
});


}

function loadfeedbacknotif()
{


 $.ajax({
 url: '<?php echo base_url("ajax/getFeedbackNotif"); ?>',
 success: function (response) {
  // We get the element having id of display_info and put the response inside it
  $( '#feedbacknotif' ).html(response);

 }
 });


}




$('#type_arsip').change(loadoptionselectarsip);
setInterval(function(){
loadmessagescounternotif();
loadmessagesnotif();
loadfeedbacknotif();
loadfeedbackcounternotif();
}, 1000);


</script>
