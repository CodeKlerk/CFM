<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/head_view'); ?>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-4 ">
				<img src="<?=  base_url(); ?>assets/images/cfm-logo-horizontal.png" style="height:100px" alt="login" class="login-img">
			</div>
		</div>
		<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
			<div class="login-box bg-white box-shadow pd-30 border-radius-5">
				<i class="icon-copy fa fa-chevron-right" aria-hidden="true"></i>
				<a class="text-center" href="<?=  base_url(); ?>account/create">Register new account</a>
				<h4 class="text-center mb-30">Login</h4>
				<form id="login-form" action="" method="POST">
					<div class="input-group custom input-group-lg">
						<input type="text" class="form-control" placeholder="Username" id="username">
						<div class="input-group-append custom">
							<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="input-group custom input-group-lg">
						<input type="password" class="form-control" placeholder="**********" id="password">
						<div class="input-group-append custom">
							<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							-->
							<a class="btn btn-outline-primary btn-lg btn-block" id="submit-btn" href="javascript:;;">Sign In</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password padding-top-10"><a href="<?= base_url() ?>account/forgot">Forgot Password</a></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('templates/script'); ?>
<script type="text/javascript">
	$(function(){
		$('#submit-btn').click(function(e){
			$('#login-form').submit();				
		});
		var url = "<?= base_url();?>api/login";
		$('#login-form').submit(function(e){
			NProgress.start();
			var username = $('#username').val();
			var password = $('#password').val();
			var data ={
				username: username,
				password,password
			} 
			console.log('form submitted');

				$.post(url, data, function(result,status){
				NProgress.done();

            if (result.error == 'none'){
            console.log('login succesfull!', '')
		    // console.log(data);
		    // window.location = data.redirect;
                
            }else{
            console.log(data.error, '')
                // Materialize.toast(data.error, 4000);
            }

        })

			e.preventDefault();
		});

	});
</script>
</body>
</html>