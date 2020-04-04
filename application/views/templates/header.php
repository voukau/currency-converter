
<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Currency Converter</title>
    <link rel="icon" href="./favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="cookiealert.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="vendor/assets/css/footer.css">
    <link href="vendor/flag-icon-css-master/css/flag-icon.css" rel="stylesheet">
    <link href="vendor/assets/css/toastr.css" rel="stylesheet"/>
    <link href="vendor/assets/css/landing-page.css" rel="stylesheet"/>
    <link href="vendor/assets/css/landing-page.min.css" rel="stylesheet"/>
    <script src="vendor/assets/js/toastr.min.js"></script>

    <!-- Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">
    <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>

  </head>
  <body>
    <!-- Navigation -->
    <!-- Cookies warning
    <div class="alert alert-info text-center cookiealert" role="alert">
	  <div class="cookiealert-container">
	    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="http://cookiesandyou.com/" target="_blank">Learn more</a>
	    <button type="button" class="btn btn-primary btn-sm acceptcookies" data-dismiss="alert" aria-label="Close">I agree</button>
    </div>
	</div>-->
 <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
      <?php if(!$this->session->userdata('logged_in')) : ?>
      <a class="navbar-brand" href="home"><i class="em em-moneybag"></i> Currency Converter </a>
      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')) : ?>
      <a class="navbar-brand" href="converter-premium"><i class="em em-moneybag"></i> Currency Converter </a>
      <?php endif; ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="converter-free">Converter</a>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="converter-premium">Converter</a>
          </li>
          <?php endif; ?>
          <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="no-access">Historical Data</a>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="history">Historical Data</a>
          </li>
          <?php endif; ?>

          <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="pricing">Pricing</a>
          </li>
          <?php endif; ?>

          <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="profile">Settings</a>
          </li>
          <?php endif; ?>

          <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <div class="ml-2">
              <a href="login" class="btn btn-outline-primary btn" role="button" aria-pressed="true">Log in</a>
            </div>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <div class="ml-2">
              <a href="users/logout" class="btn btn-outline-primary btn" role="button" aria-pressed="true">Logout</a>
            </div>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- Flash messages -->
    <?php if($this->session->flashdata('user_registered')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('log_in_failed')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('log_in_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_logged_in')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_logged_out')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('preferences_saved')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('preferences_saved').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('preferences_error')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('preferences_error').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('free_trial_expired')): ?>
      <?php echo '<p class="alert alert-info">'.$this->session->flashdata('free_trial_expired').'</p>'; ?>
    <?php endif; ?>

    <!-- Disabled JavaScript warning -->
    <noscript>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span><strong>Notice: </strong> JavaScript is not enabled. <a href="http://enable-javascript.com/" class="alert-link">Please Enable JavaScript</a>.</span>
      </div>
    </noscript>

  </div>

