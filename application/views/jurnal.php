<section id="jurnal" style="padding-bottom: 50px;">
<div class="container">
<div class="text-center title">
    <h3>JOURNAL</h3>
    <hr>
    </div>
    
    <div class="col-md-6 col-md-offset-3">
<?php if(isset($jurnal)){ ?>
      <ul class="nav nav-pills nav-stacked jurnal-list">
      <?php foreach ($jurnal->result() as $key => $value) {
        echo "<li><a href='".base_url('/journal/page/'.$value->id)."'>".$value->title."<span class='pull-right text-muted'>- ".$value->author."</span></a></li>";
      }
      ?>
      </ul>

<?php }else{
  echo "<div class='text-center'>Tidak ada jurnal</div>";
  } ?>
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

