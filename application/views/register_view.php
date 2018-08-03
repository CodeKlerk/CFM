<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/head_view'); ?>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-4 ">
				<img src="<?=  base_url(); ?>assets/images/cfm-logo-horizontal.png" style="height:100px" alt="signup" class="signup-img">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-8 justify-content-center ">
				<div class="signup-box bg-white box-shadow pd-30 border-radius-5">
					<i class="icon-copy fa fa-chevron-left" aria-hidden="true"></i>
					<a class="text-center" href="<?=  base_url(); ?>account/login">Login</a>
					<h4 class="text-center mb-30">signup</h4>
					<form id="signup-form" action="" method="POST">
						<div class="row">
							<div class="col-md-7 col-sm-12">
								<div class="input-group custom input-group-lg">
									<input type="text" class="form-control" placeholder="Full name" id="fullname">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-5 col-sm-12">

								<div class="input-group custom input-group-lg">
									<input type="text" class="form-control" placeholder="Surname" id="surname">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7 col-sm-12">

								<div class="input-group custom input-group-lg">
									<input type="email" class="form-control" placeholder="Email" id="email">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-sm-12">
								<div class="input-group custom input-group-lg">
									<input type="text" class="form-control" placeholder="Username" id="username">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7 col-sm-12">
								<div class="input-group custom input-group-lg">
									<input type="password" class="form-control" placeholder="Password" id="password">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-sm-12">
								<div class="input-group custom input-group-lg">
									<input type="password" class="form-control" placeholder="Confirm Password" id="confirm-password">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									<a class="btn btn-outline-primary btn-lg btn-block" id="submit-btn" href="javascript:;;">Sign Up</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('templates/script'); ?>
	<script type="text/javascript">
		$(function(){
			$('#submit-btn').click(function(e){
				$('#signup-form').submit();				
			});
			var url = "<?= base_url();?>api/signup";
			$('#signup-form').submit(function(e){
				NProgress.start();

				var fullname = $('#fullname').val();
				var surname = $('#surname').val();
				var username = $('#username').val();
				var email = $('#email').val();
				var password = $('#password').val();
				var confirm = $('#confirm-password').val();

				var data ={
					fullname: fullname,
					surname:surname,
					username:username,
					email:email,
					password,password
				} 
				console.log('form submitted');


				$.post(url, data, function(result,status){
					NProgress.done();
					console.log(result);
				// window.location = result.redirect;
			});

				e.preventDefault();
			});

		});
	</script>
</body>
</html>