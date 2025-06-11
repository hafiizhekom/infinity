<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>HIMIF KALBIS</title>
  <link rel="icon" href="<?php echo base_url(); ?>image/logo/logo.png" sizes="16x16">
  <?php echo($this->theme->current_theme()); ?>
  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>js/caption.js"></script>
  <script src="<?php echo base_url(); ?>js/modal.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.bxslider.js"></script>
  <link href="<?php echo base_url(); ?>css/jquery.bxslider.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome-min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fullheader.css">
  <?php echo "<link rel='stylesheet' type='text/css' href='".base_url()."css/news.css'>"; ?>
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class=" navbar-header">
        <button type="button" class="navbar-toggle collapsed" style="max-width:100px;" data-toggle="collapse" data-target="#menunavbarcollapse"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>image/logo/logo.png" alt="brand" height="20">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="menunavbarcollapse">
        <ul class="nav navbar-nav nav-pills">
          <li>
            <a href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>news">News</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>event">Event</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>profile">Profile</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>crew">Crew</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>journal">Journal</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>gallery">Gallery</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="http://kalbis.ac.id">Kalbis</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>join">Join Us</a>
          </li>
        </ul>
      </div>
    </div>

  </nav>
  <div class="main">

    <section id="home-jumbotron">
      <div class="container-fluid">
        <div class="row">
          <div class="jumbotron text-center">
            <div class="container-fluid">
              <div class="row"> 
              <div class="col-md-3">
              </div>
              <div class="col-md-6">
                <img src="<?php echo base_url(); ?>image/logo/logo.png" width="20%">
                <h1>INFINITY</h1>
                <p>Himpunan Mahasiswa Teknik Informatika Kalbis Institute</p>
              </div>
              <div class="col-md-3">
              
              </div>
              </div>
              <div class="text-center">
                <a class="btn btn-primary outline header-btn" id="findout">FIND OUT MORE</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
