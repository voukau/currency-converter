<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Currency convertrer</title>
    <link rel="icon" href="./favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="vendor/flag-icon-css-master/css/flag-icon.css" rel="stylesheet">

  </head>
  <body>
		<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="home"><i class="em em-moneybag"></i> Currency Converter </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
</button>
  </nav>

  <!-- Page Content -->
  <div class="container">
      <body onload="init()">
    <div class="row">
      <div class="col-lg-12 text-center">
				<h1 class="display-4 mt-5 text-left">404 Page not Found</h1>
				<h4 class="text-left">Oops! Seems like a page you are looking for doesn't exist</h4>
				<div class="mt-4 text-left">
          <button type="button" class="btn btn-primary btn-lg re" onclick="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Go back</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="main.js"></script>

  </body>
</html>