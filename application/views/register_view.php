<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/head_view'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<i class="icon-copy fa fa-chevron-left" aria-hidden="true"></i>
			<a class="text-center" href="<?=  base_url(); ?>account/login">Login</a>
			<img src="<?=  base_url(); ?>assets/images/cfm-logo-horizontal.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Sign up</h2>
			<form>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" id="fullnames" placeholder="Full name">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" id="surname" placeholder="surname">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" id="username" placeholder="username">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="email" class="form-control" id="email" placeholder="email">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fi-mail" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" id="password" placeholder="password">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" id="confirm-password" placeholder="confirm password" required="">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							-->
							<a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Sign Up</a>
						</div>

					</div>

				</div>
			</form>
		</div>
	</div>
	<?php $this->load->view('templates/script'); ?>
	<script type="text/javascript">
		$(function(){
			$('#login-form').click(function(e){
				$('#login-form').submit();				
			});

			var fullnames = $('#fullnames').val();
			var surname = $('#surname').val();
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var confirm = $('#confirm-password').val();

			var data ={
				name: fullnames,
				surname:surname,
				username:username,
				email:email,
				password,password
			} 

			$('#login-form').submit(function(e){
				console.log('form submitted');

				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: success,
					dataType: dataType
				});

				e.preventDefault();
			});

		});
	</script>

</body>
</html>