<section id="profile" style="padding-bottom: 50px;">
<div class="container">
<div class="text-center title">
    <h3>CREW</h3>
    <hr>
    </div>
  <?php
if($crew->num_rows()!=0){
    foreach ($crew->result() as $key => $value) {
      echo "<div class='media col-md-6'>
        <div class='pull-left'>";
          if($value->image==""){
            echo "<img style='object-fit: cover; width:100px;height:100px;' class='media-object' src='".base_url('foto/default.jpg')."'>";
          }else{
            echo "<img style='object-fit: cover; width:100px;height:100px;' class='media-object' src='".base_url('foto/'.$value->image)."'>";
          }

          echo "
        </div>
        <div class='media-body'>
          <h4 class='media-heading'>".$value->nama."</h4>
          ".$value->nama." adalah seorang ".$value->crew." pada Himpunan Mahasiswa Informatika Kalbis Institute.
        </div>
      </div>";
    }
  }else{

    echo "<div class='media col-md-6' style='padding-bottom:200px;'>Crew belum ditambahkan</div>";
  }
  ?>
</div>
</section>

<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#profile").offset().top -70
    }, 800);
});
</script>



