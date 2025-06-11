
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
                  echo "<li>
                  <a href='".$value->link."'><img src='".base_url()."image/slide/".$value->file."' width='100%'></a>
                </li>";
              }

             ?>
        </ul>
        <?php } ?>
        
      </div>
    </div>
  </div>
</section>

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
          $top_image = $img[0]->getAttribute('src');
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
                  <div class='overlay point'>
                ";


                  echo "
                    <div class='rotate'>
                      <p class='group1'>
                          <a href='#'>
                              <i class='fa fa-twitter'></i>
                          </a>
                          <a href='#'>
                              <i class='fa fa-facebook'></i>
                          </a>
                      </p>
                      <hr>
                      <hr>
                      <p class='group2'>
                          <a href='#'>
                              <i class='fa fa-instagram'></i>
                          </a>
                          <a href='#'>
                              <i class='fa fa-dribbble'></i>
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
          $top_image = $img[0]->getAttribute('src');
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
                  <div class='overlay point'>
                ";


                  echo "
                    <div class='rotate'>
                      <p class='group1'>
                          <a href='#'>
                              <i class='fa fa-twitter'></i>
                          </a>
                          <a href='#'>
                              <i class='fa fa-facebook'></i>
                          </a>
                      </p>
                      <hr>
                      <hr>
                      <p class='group2'>
                          <a href='#'>
                              <i class='fa fa-instagram'></i>
                          </a>
                          <a href='#'>
                              <i class='fa fa-dribbble'></i>
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

<?php } ?>
<section id="morenews">
  <div class="container">
    <div class="text-center title">
    <h3>Want More News?</h3>
    <hr>
                <a class="btn btn-primary outline header-btn">CHECK NEWS</a>
    </div>
  </div>
</section>
<section id="education">
  <div class="container">
    <div class="difline">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center" id="read-journal">
            <h2 id="padspace">READ JOURNAL</h2>
            <p id="padspace">Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet</p>
            <a href="" class="btn btn-primary">Mulai Baca -></a>
          </div>
        </div>
        <div class="col-md-6" id="start-learning">
          <div class="text-center">
            <h2 id="padspace">START LEARNING</h2>
            <p id="padspace">Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet</p>
            <a href="" class="btn btn-primary">Mulai Latihan -></a>
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
