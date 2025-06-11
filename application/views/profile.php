<section id="profile" style="padding-bottom: 50px;">
<div class="container">
<div class="text-center title">
    <h3>PROFILE</h3>
    <hr>
    </div>
<?php if(isset($visi) && isset($misi) & isset($rencana)){ ?>
    <div class="row"> 
    <div class="col-md-6 title text-justify profiles" >
       <h3 style="padding-left: 20px;">VISI</h3>
        <div style="padding-left: 20px;"><?php echo $visi; ?></div>
    </div>
    <div class="col-md-6 title text-justify profiles" >
       <h3 style="padding-left: 20px;">MISI</h3>
        <div style="padding-left: 20px;"><?php echo $misi; ?></div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-12 title text-justify profiles" >
       <h3 style="padding-left: 20px;">PROGRAM KERJA</h3>
        <div style="padding-left: 20px;"><?php echo $rencana; ?></div>
    </div>
    </div>

    <?php }else{
      echo "Tidak ada profile";
      } ?>
</div>
</section>

<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#profile").offset().top -70
    }, 800);
});
</script>
