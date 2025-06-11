
<section id="event" style="padding-bottom: 50px;">
  <div class="container">
    <div class="row">
    <div class="col-md-12 text-center title">
    <h3>EVENT</h3>
    <hr>
    </div>
    <!--<div class="search-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="search-box">
              <form class="searchbox-input" id="searchbox_input" role="form" action="https://www.codepolitan.com" method="get">
                <input class="form-control search-input" placeholder="Search" name="s" value="" type="text">
                <button class="search-button"><span class="fa fa-search"></span></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>-->
        <?php foreach ($event->result() as $key => $value) {
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
      		echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12' id='newssquare'>
                  <div class='hovereffect'>";

      					if($top_image!=""){
      						echo "<img class='img-responsive' src='$top_image' alt='' style='object-fit: cover; width:100%;height:200px;'>";
      					}else{
      						echo "<img class='img-responsive' src='image/default.jpg' alt='' style='object-fit: cover; width:100%;height:200px;'>";
      					}

      					echo "<h2>".$value->judul."</h2>
      					  <div class='overlay point' onclick=location.href='".base_url('/event/page/'.$value->id)."'>
      						";


      						echo "
      						 
                    <div class='rotate'>
                <p class='group1'>
                    <a href='https://twitter.com/share?url=".base_url('/event/page/'.$value->id)."' target='_blank'>
                        <i class='fa fa-twitter'></i>
                    </a>
                    <a href='https://www.facebook.com/sharer/sharer.php?u=".base_url('/event/page/'.$value->id)."' target='_blank'>
                        <i class='fa fa-facebook'></i>
                    </a>
                </p>
                    <hr>
                    <hr>
                <p class='group2'>
                    <a href='http://www.tumblr.com/share/link?url=".base_url('/event/page/'.$value->id)."' target='_blank'>
                        <i class='fa fa-tumblr'></i>
                    </a>
                    <a href='https://plus.google.com/share?url=".base_url('/event/page/'.$value->id)."' target='_blank'>
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
    </div>
    <div class="row">
        <div class="readmoregroup text-center">
        <?php

          if(strtolower($this->uri->segment(1))=="event" && $this->uri->segment(2)==""){
            if($this->news_model->event()->num_rows()>4){
              echo "<a href='".base_url('event/limit/12')."' class='btn btn-primary' id='readmorebtn'>Readmore</a>";
            }else{

            }
          }else if(strtolower($this->uri->segment(1))=="news" && strtolower($this->uri->segment(2))=="limit"){

            $lmt=$this->uri->segment(3);
            if($lmt<$this->news_model->event()->num_rows()){
            $lmt=$lmt+4;
            echo "<a href='".base_url('event/limit/'.$lmt)."' class='btn btn-primary' id='readmorebtn'>Readmore</a>";
            }else{
            }
          }

        ?>    
          
        
        </div>
        </div>
  </div>
</section>
<ul class="sharegroup">
    <li ><a href="#" class=" btn-circle btn-primary" style="vertical-align: center;" data-toggle="modal" data-target="#searchevent"><div class='glyphicon glyphicon-search' style="font-size:20px;"></div></a></li>
</ul>
<div id="searchevent" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form action="<?php echo base_url('event/search'); ?>" method="GET">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Search Event</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Keyword:</label>
          <input type="text" name="keyword" placeholder="Keyword" class="form-control"></input>
        </div>

        
          <label>Date:</label>
        
        <div class="row">
        <div class="col-md-6">
          <input  type="text" placeholder="From"  id="date1" name="date1" class="form-control" >
          </div>
          <div class="col-md-6">
          <input  type="text" placeholder="To"  id="date2" name="date2" class="form-control">
          </div>
        
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#event").offset().top -70
    }, 800);
});
</script>
<script type="text/javascript">
                      // When the document is ready
                      $(document).ready(function () {
                        
                        $('#date1').datepicker({
                          format: "yyyy-mm-dd"
                        });  
                      
                      });
                    </script>
                    <script type="text/javascript">
                      // When the document is ready
                      $(document).ready(function () {
                        
                        $('#date2').datepicker({
                          format: "yyyy-mm-dd"
                        });  
                      
                      });
                    </script>

