

<div class="container">
<br>
    <div class="text-center">
        <h1 class="display-4">Create Account</h1>
    </div>
<br>
<div class="row justify-content-md-center">

<div class="col-6 card bg-light">
<article class="card-body mx-auto">

<?php echo form_open('users/signup', array('id'=>'signup_form')); ?>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input class="form-control" name="name" placeholder="Name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input class="form-control" name="email" placeholder="Email" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password2" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="login">Log In</a> </p>
<?php echo form_close(); ?>
</article>
</div> <!-- card.// -->

</div>
</div>
<!--container end.//-->
<script type="text/javascript">
$(document).ready(function () {
    var sUrequest;
    $("#signup_form").submit(function (e) {
        e.preventDefault();
        if (sUrequest) {
            sUrequest.abort();
        }
        var inputs = $(this).find("input, select, button, textarea"),
                serializedData = $(this).serialize(),
                postURL = $(this).attr("action");
        inputs.prop("disabled", true);
        sUrequest = $.ajax({
            url: postURL,
            type: "post",
            data: serializedData,
            dataType: 'json'
        });
        sUrequest.done(function (response, statusText, jqXHR) {
            if (response.status == 'error') {
                $.each(response.messages, function (key, value) {
                    var element = $('[name=' + key + ']');
                    element.closest('div.form-group input-group')
                            .removeClass('has-error')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .find('.text-danger')
                            .remove();

                    element.after(value);
                });
            } else {
                window.location.href = response.url;
            }
        });
        sUrequest.fail(function (jqXHR, statusText, thrownError) {
            console.log("jq:" + jqXHR + " st:" + statusText + " te:" + thrownError);
        });
        sUrequest.always(function () {
            inputs.prop("disabled", false);
        });
    });
});

</script>