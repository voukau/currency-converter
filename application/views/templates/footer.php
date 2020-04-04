<div class="mt-5">
<footer id="myFooter">
        <div class="container">
            <div class="row mt-3 mb-5">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="home">Home</a></li>
                        <?php if(!$this->session->userdata('logged_in')) : ?>
                        <li><a href="signup">Sign up</a></li>
                        <?php endif; ?>
                        <?php if($this->session->userdata('logged_in')) : ?>
                        <li><a href="#" id="myToastr">Sign up</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="faq">FAQ</a></li>
                        <li><a href="https://gitlab.pld.ttu.ee/paflei/currencyconverter">Source code</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 info">
                    <h5>Information</h5>
                    <p>Currency converter is ICD0007 Web technologies course project.<br>All rights reserved &#169 2019</p>
                </div>
          </div>
    </footer>
</div>

<script>
    document.getElementById('myToastr')
    .addEventListener('click', function(){
        toastr["info"]("You must be logged out to register as a new user.", "Error", {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });
    })
</script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="main.js"></script>

    <script src="vendor/listgroup/listgroup.js"></script>
    <script src="vendor/listgroup/listgroup.jquery.json"></script>
    <script src="vendor/listgroup/listgroup.min.js"></script>

    <!-- Cookie message provided by cookieinfoscript.com -->
    <script type="text/javascript" id="cookieinfo"
	src="//cookieinfoscript.com/js/cookieinfo.min.js"
	data-bg="#645862"
    data-fg="#FFFFFF"
    data-linkmsg=""
    data-divlink="#FFFFFF"
    data-divlinkbg="#0069D9"
	data-cookie="CookieInfoScript"
	data-text-align="left"
    data-close-text="Got it!">
    </script>



</body>
</html>