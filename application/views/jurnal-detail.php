<section id="jurnal" style="padding-bottom: 50px;">
<div class="container">
<div class="text-center title">
    <h3><?php echo $jurnal->result()[0]->title; ?></h3>
    <hr>
    </div>
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <label>Abstract: </label>
    <div class="text-justify" style="text-align: justify !important;"><?php echo $jurnal->result()[0]->abstract; ?></div>
    <div class="text-center" style="padding-top:20px;">
    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('jurnal/'.$jurnal->result()[0]->file); ?>"> Download</a>
    </div>
    </div>
    
    
    
</section>
<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script>
<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#jurnal").offset().top -70
    }, 800);
});
</script>
<script>

$(document).ready(
function() {
$(".jurnal-list").niceScroll();
}
);
 </script>

