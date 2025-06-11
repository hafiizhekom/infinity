<section id="image" style="padding-bottom: 50px;">
<div class="container">
<?php if(isset($foto)){ ?>
    <div class="text-center title">
    <h3>Image of <?php echo $foto->result()[0]->album; ?></h3>
    <hr>
    </div>
<div class="row">
  <?php
    
      foreach ($foto->result() as $key => $value) {

                        echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>
    <div class='hovereffect'>
        <img class='img-responsive' src='".base_url('image/gallery/'.$value->file)."' style='object-fit: cover; width:100%;height:230px;'>
        <div class='overlay'>
           <a class='info' href='#' data-toggle='modal' data-target='#image".$key."'>View</a>
        </div>
    </div>
</div>";
                    }
      

   ?>
   </div>
   <?php } ?>
</div>
</section>
<?php
    
      foreach ($foto->result() as $key => $value) {

                        echo "<div class='modal fade' id='image".$key."' tabindex='-1'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>".$value->album."</h4>
      </div>
      <div class='modal-body'>
        <img class='img-responsive' src='".base_url('image/gallery/'.$value->file)."' style='width:100%;'>
      </div>
    </div>
  </div>
</div>";
                    }
      

   ?>

<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#image").offset().top -70
    }, 800);
});
</script>

