<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>My Store</title>
  <link rel="icon" href="<?php echo base_url(); ?>image/logo/logo.png" sizes="16x16">
  <?php echo($this->theme->current_theme()); ?>
  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>js/caption.js"></script>
  <script src="<?php echo base_url(); ?>js/modal.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
</head>

<body>
  <?php
if(isset($notif['n_login'])){
	echo "<div style='position:fixed;right:2px;top:2px;'><span class='label label-default'>".$notif['n_login']."</span></div>";
}
?>
    <div class="container">
      <div class="thumbnail" style="width:500px;margin:10% auto 10%;">
        <div class="container-fluid">
          <form method="post" action='<?php echo base_url('adminkalbis3972 '); ?>'>
            <div class="form-group">
              <label>Username</label>
              <input type="text" placeholder="Username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" placeholder="Password" name="password" class="form-control"
                required>
            </div>
            <div class="form-group">
              <input type="submit" value="Login" name="admin_login" class="btn btn-default pull-right">
            </div>
          </form>
        </div>
      </div>
    </div>

</html>
