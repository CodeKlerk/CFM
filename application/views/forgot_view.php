<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/head_view'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="<?=  base_url(); ?>assets/images/cfm-logo-horizontal.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Forgot Password</h2>
			<form>
				<p>Enter your email address to reset your password</p>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" placeholder="Email">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
							-->
							<a class="btn btn-primary btn-lg btn-block" href="<?= base_url() ?>account/login">Submit</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password"><a href="login.php" class="btn btn-outline-primary btn-lg btn-block">Sign In</a></div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php $this->load->view('templates/script'); ?>
</body>
</html>