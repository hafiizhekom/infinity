<?php $id = $jurnal->result()[0]->id;
        $link = base_url('/event/news/'.$id);
        ?>
<section id="event" style="padding-bottom: 50px;">
<div class="container">
<div class="text-center title">
    <h3><?php echo $jurnal->result()[0]->judul; ?></h3>
    <hr>
    </div>
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div class="text-justify posting" style="text-align: justify !important;"><?php echo $jurnal->result()[0]->isi; ?></div>
    <div class="text-muted">Diposting oleh <?php echo $this->admin_model->profile($jurnal->result()[0]->author)->result()[0]->nama." pada tanggal ";
    echo nice_date($jurnal->result()[0]->date_posted, 'd F Y'); ?></div>
    </div>
    
    
    
</section>

<ul class="sharegroup">
    <li ><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>" class=" btn-circle btn-primary" style="vertical-align: center;"><div class='fa fa-facebook' style="font-size:20px;"></div></a></li>
    <li ><a target="_blank" href="https://twitter.com/share?url=<?php echo $link; ?>" class=" btn-circle btn-primary" style="vertical-align: center;"><div class='fa fa-twitter' style="font-size:20px;"></div></a></li>
    <li ><a target="_blank" href="https://plus.google.com/share?url=<?php echo $link; ?>" class=" btn-circle btn-primary" style="vertical-align: center;"><div class='fa fa-google-plus' style="font-size:20px;"></div></a></li>
    <li ><a target="_blank" href="http://www.tumblr.com/share/link?url=<?php echo $link; ?>" class=" btn-circle btn-primary" style="vertical-align: center;"><div class='fa fa-tumblr' style="font-size:20px;"></div></a></li>
</ul>
<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#event").offset().top -70
    }, 800);
});
</script>

