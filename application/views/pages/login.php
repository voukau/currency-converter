

<div class="container">
<br>
    <div class="text-center">
        <h1 class="display-4">Log In</h1>
    </div>
<br>
<div class="row justify-content-md-center">

<div class="col-6 card bg-light">
<article class="card-body mx-auto">

<?php echo validation_errors(); ?>

<?php echo form_open('users/login', array('id'=>'login_form')); ?>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
         </div>
        <input class="form-control" name="email" placeholder="Your email" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input class="form-control" name="password" placeholder="Your password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Login </button>
    </div> <!-- form-group// -->
    <p class="text-center">or <a href="signup">create an account</a> </p>
<?php echo form_close(); ?>
</article>
</div> <!-- card.// -->

</div>
</div>
<!--container end.//-->
