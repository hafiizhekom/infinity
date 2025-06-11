<?php echo $this->session->flashdata('notifikasi'); ?>
<section id="join" style="padding-bottom: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title text-center">
        <h3>JOIN US</h3>
        <hr>
      </div>
      <div class="col-lg-offset-3 col-md-offset-8 col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <form action="<?php echo current_url(); ?>" method="POST">
          <div class="form-group">
            <label>NIM </label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
              <input type="text" name="nim" class="form-control" placeholder="NIM" maxlength="10" id="nim" required="">
            </div>
          </div>

          <div class="form-group">
            <label>Nama </label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-font" aria-hidden="true"></span></div>
              <input type="text" name="nama" placeholder="Nama" class="form-control" maxlength="100" required="">
            </div>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir </label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
              <input type="text" name="ttl" placeholder="Tanggal Lahir" class="form-control" id="date" maxlength="10" required="">
            </div>
          </div>

          <div class="form-group">
            <label>Nomor Telepon </label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>
              <input type="text" name="phone" placeholder="Nomor Telepon" class="form-control" id="phone" maxlength="15" required="">
            </div>
          </div>

          <div class="form-group">
            <label>Email </label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
              <input type="email" name="email" placeholder="Email" class="form-control" maxlength="100" required="">
            </div>
          </div>

          <div class="form-group">
            <label>Motivasi </label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span></div>
              <textarea name="motivasi" class="form-control" required=""></textarea>
            </div>
          </div>

          <input type="submit" name="registration" value="Submit" class="btn btn-primary pull-right"></input>
          
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function () {
  $('html, body').animate({
        scrollTop: $("#join").offset().top -70
    }, 800);
});
</script>
<script>
  $(document).ready(function() {
    $("#nim").keydown(function (e) {
        
        //8 itu hapus
        //9 itu tab

        if ($.inArray(e.keyCode, [8, 9]) !== -1 ||
             
             //arah panah
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 
                 return;
        }

        //48-57 itu angka
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57))) {
            e.preventDefault();
        }
    });
});
</script>

<script>
  $(document).ready(function() {
    $("#phone").keydown(function (e) {
        
        //8 itu hapus
        //9 itu tab

        if ($.inArray(e.keyCode, [8, 9]) !== -1 ||
             
             //arah panah
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 
                 return;
        }

        //48-57 itu angka
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57))) {
            e.preventDefault();
        }
    });
});
</script>
<script type="text/javascript">
                      // When the document is ready
                      $(document).ready(function () {
                        
                        $('#date').datepicker({
                          format: "yyyy-mm-dd"
                        });  
                      
                      });
                    </script>
