    <?php if($slide->num_rows()!=0){ ?>
<section id="news">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <?php if($slide->num_rows()!=0){ ?>
        <div class="text-center title">
          <h3>NEWS</h3> 
          <hr>
          </div>
        <ul class="bxslider">
        <?php

              foreach ($slide->result() as $key => $value) {
                  if(strpos($value->link, "none:")!==false){
                    $idlink=substr($value->link, strpos($value->link, ":")+1, strlen($value->link));
                    $link=base_url('news/page/'.$idlink);
                  }else if(strpos($value->link, "acara:")!==false){
                    $idlink=substr($value->link, strpos($value->link, ":")+1, strlen($value->link));
                    $link=base_url('event/page/'.$idlink);
                  }else{
                    $link=$value->link;
                  }
                  echo "<li>
                  <a href='".$link."'><img src='".base_url()."image/slide/".$value->file."' width='100%'></a>
                </li>";
              }

             ?>
        </ul>
        <?php } ?>
        
      </div>
    </div>
  </div>
</section>
<?php }else{ ?>

<section id="news">

  <div class="container">
    <div class="row">



        


        <?php foreach ($articles->result() as $key => $value) {
          $top_image="";
          $view=substr(strip_tags($value->isi), 0, 100);
          $tgl=$value->date_posted;
          $dom = new DOMDocument;
          @$dom->loadHTML($value->isi);
          $img = $dom->getElementsByTagName('img');
          if($img->length!=0){
          $top_image = $img[0]->getAttribute('src');
          }else{
            $top_image="";
          }

          

          //$spaceTitle = 50-strlen($berita['judul']);
          echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12' id='newssquare'>
                  <div class='hovereffect'>";

                if($top_image!=""){
                  echo "<img class='img-responsive' src='$top_image' alt='' style='object-fit: cover; width:100%;height:200px;'>";
                }else{
                  echo "<img class='img-responsive' src='image/default.jpg' alt=''>";
                }

                echo "<h2>".$value->judul."</h2>
                  <div class='overlay point' onclick=location.href='".base_url('/news/page/'.$value->id)."'>
                  ";


                  echo "
                   
                    <div class='rotate'>
                <p class='group1'>
                    <a href='https://twitter.com/share?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-twitter'></i>
                    </a>
                    <a href='https://www.facebook.com/sharer/sharer.php?u=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-facebook'></i>
                    </a>
                </p>
                    <hr>
                    <hr>
                <p class='group2'>
                    <a href='http://www.tumblr.com/share/link?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-tumblr'></i>
                    </a>
                    <a href='https://plus.google.com/share?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-google-plus'></i>
                    </a>
                </p>
            </div>
                
                  </div>
    </div>
</div>
                ";

              $top_image="";
        } ?>
        <div class="text-center title">
          <a class="btn btn-primary more-news-index" href="<?php echo base_url('news'); ?>">MORE NEWS</a>
                
         </div>
      
    </div>
  </div>
</section>
<?php } ?>
<?php if($slide->num_rows()!=0){ ?>
<?php if($articles1->num_rows()>=4){ ?>
<section id="post">
 <?php 


 foreach ($articles1->result() as $key => $value) {
          $top_image="";
          $view=substr(strip_tags($value->isi), 0, 100);
          $tgl=$value->date_posted;
          $dom = new DOMDocument;
          @$dom->loadHTML($value->isi);
          $img = $dom->getElementsByTagName('img');
          if($img->length!=0){
          $top_image = $img->item(0)->getAttribute('src');
          }else{
            $top_image="";
          }

          
          if($key<4){
          //$spaceTitle = 50-strlen($berita['judul']);
          echo "
            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 postnews'>
                <div class='hovereffect'>";

                if($top_image!=""){
                  echo "<img class='img-responsive' src='$top_image' style='object-fit: cover; width:100%;height:200px;'>";
                }else{
                  echo "<img class='img-responsive' src='image/default.jpg' style='object-fit: cover; width:100%;height:200px;' >";
                }

          echo "<h2>".$value->judul."</h2>
                  <div class='overlay point' onclick=location.href='".base_url('/news/page/'.$value->id)."'>
                ";


                  echo "
                    <div class='rotate'>
                      <p class='group1'>
                    <a href='https://twitter.com/share?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-twitter'></i>
                    </a>
                    <a href='https://www.facebook.com/sharer/sharer.php?u=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-facebook'></i>
                    </a>
                </p>
                    <hr>
                    <hr>
                <p class='group2'>
                    <a href='http://www.tumblr.com/share/link?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-tumblr'></i>
                    </a>
                    <a href='https://plus.google.com/share?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-google-plus'></i>
                    </a>
                </p>
                    </div>
                  </div>
                </div>
              </div>
                ";

              $top_image="";
            }
        } ?>

        <?php 
if($articles2->num_rows()>=4){
 foreach ($articles2->result() as $key => $value) {
          $top_image="";
          $view=substr(strip_tags($value->isi), 0, 100);
          $tgl=$value->date_posted;
          $dom = new DOMDocument;
          @$dom->loadHTML($value->isi);
          $img = $dom->getElementsByTagName('img');
          if($img->length!=0){
          $top_image = $img->item(0)->getAttribute('src');
          }else{
            $top_image="";
          }

          
          
          //$spaceTitle = 50-strlen($berita['judul']);
          echo "
            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 postnews'>
                <div class='hovereffect'>";

                if($top_image!=""){
                  echo "<img class='img-responsive' src='$top_image' style='object-fit: cover; width:100%;height:200px;'>";
                }else{
                  echo "<img class='img-responsive' src='image/default.jpg' style='object-fit: cover; width:100%;height:200px;'>";
                }

          echo "<h2>".$value->judul."</h2>
                  <div class='overlay point' onclick=location.href='".base_url('/news/page/'.$value->id)."'>
                ";


                  echo "
                    <div class='rotate'>
                     <p class='group1'>
                    <a href='https://twitter.com/share?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-twitter'></i>
                    </a>
                    <a href='https://www.facebook.com/sharer/sharer.php?u=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-facebook'></i>
                    </a>
                </p>
                    <hr>
                    <hr>
                <p class='group2'>
                    <a href='http://www.tumblr.com/share/link?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-tumblr'></i>
                    </a>
                    <a href='https://plus.google.com/share?url=".base_url('/news/page'.$value->id)."' target='_blank'>
                        <i class='fa fa-google-plus'></i>
                    </a>
                </p>
                    </div>
                  </div>
                </div>
              </div>
                ";

              $top_image="";
            }
        
        }?>


<div style="clear:both;"></div>
</section>

<?php } } ?>
<?php if($slide->num_rows()!=0){ ?>
<section id="morenews">
  <div class="container">
    <div class="text-center title">
    <h3>Want More News?</h3>
    <hr>
                <a class="btn btn-primary outline header-btn" href="<?php echo base_url('news'); ?>">CHECK NEWS</a>
    </div>
  </div>
</section>
<?php } ?>
<section id="education">
  <div class="container">
    <div class="difline">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center" id="read-journal">
            <h2 id="padspace">READ JOURNAL</h2>
            <p id="padspace">Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet</p>
            <a href="<?php echo base_url('journal'); ?>" class="btn btn-primary">START READ</a>
          </div>
        </div>
        <div class="col-md-6" id="start-learning">
          <div class="text-center">
            <h2 id="padspace">JOIN US</h2>
            <p id="padspace">Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet</p>
            <a href="<?php echo base_url('join'); ?>" class="btn btn-primary">REGISTER</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

$(document).ready(function(){
  $('.bxslider').bxSlider({
  adaptiveHeight: true
});
});

</script>

<script>

$('#findout').on('click',function(){
   $('html, body').animate({
        scrollTop: $("#news").offset().top -50
    }, 800);
});

</script>
