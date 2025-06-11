<div id="footer" style="height:auto;">
  <div class="container">
    <div class="row" id="contentfooter">
      <div class="col-md-4" id="kalbis-footer">
        <h3>Kalbis Institute</h3>
        <p>
          KALBIS Institute adalah sebuah perguruan tinggi swasta yang berlokasi di Jakarta, Indonesia. KALBIS Institute bernaung di bawah Yayasan Pendidikan KALBE (YPK) dan kualitas manajemen mutu pendidikannya dikelola oleh Yayasan Pendidikan Bina Nusantara (BINUS).
        </p>
      </div>
      <div class="col-md-4" id="findus-footer">
        <h3>Find Us</h3>
        <ul id="sosmedfooter">

          <li><i style="width: 20px;" class="fa fa-facebook"></i> facebook.com/infintykalbis</li>
          <li><i style="width: 20px;" class="fa fa-google-plus"></i> googleplus.com/infintykalbis</li>
          <li><i style="width: 20px;" class="fa fa-twitter"></i> @infintykalbis</li>
        </ul>
      </div>
      <div class="col-md-4" id="feedback-footer">
        <h3>Feedback</h3>
        <form method="post" action="<?php echo base_url(); ?>">
          <div class="form-group">
            <div class="row">
              <div class="col-xs-6">
                <input type="nama" name="nama" class="form-control" placeholder="Nama Lengkap" maxlength="20" width="100%">
              </div>
              <div class="col-xs-6">
                <input type="email" name="email" class="form-control" placeholder="E-Mail" maxlength="100">
              </div>
            </div>
          </div>
          <div class="form-group">
          <input type="text" name="phone" id="phone"  class="form-control" required="" placeholder="Telepon"></input>
          </div>
          <div class="form-group">
            <textarea placeholder="Masukan Saran & Kritik" style="color:black;width:100%;" name="isi" ></textarea>
          </div>
          <input type="submit" class="btn btn-default btn-full" value="Submit" name="saran">
        </form>
      </div>



    </div>
    <footer>
      <p class="text-center">Copyright © 2017 hafiizhekom. All rights reserved. </p>
    </footer>
  </div>
</div>
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

</body>
</html>
