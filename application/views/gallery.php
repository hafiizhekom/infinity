<section id="galleryes" style="padding-bottom: 50px;">
<div class="container">
    <div class="text-center title">
    <h3>GALLERY</h3>
    <hr>
    </div>
<div class="row">
<?php
    if($album->num_rows()!=0){
      foreach ($album->result() as $key => $value) {
          echo "<div class='col-md-3 text-center'><a style='text-decoration:none;' href='".base_url('gallery/album/'.$value->id.'')."'><div class='album'>".$value->album."</div></a></div>";
      }
    }else{
      echo "<div class='text-center'>Tidak ada album yang tersedia</div>";
    }
    ?>
   </div>
</div>
</section>

<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#galleryes").offset().top -70
    }, 800);
});
</script>

