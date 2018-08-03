<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/head_view'); ?>
</head>
<body>
	<?php $this->load->view('templates/header_view'); ?>
	<?php $this->load->view('templates/sidebar_view'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="row clearfix progress-box">
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-briefcase"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-blue weight-500 font-24">40,000</span>
								<p class="weight-400 font-18">Total Contribution</p>
							</div>
						</div>
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Pledge Target(emerald)</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">450,000</div>
							</div>
							<div class="progress" style="height: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-green text-white">
									<i class="fa fa-handshake-o"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-light-green weight-500 font-24">20,000</span>
								<p class="weight-400 font-18">Due Amount</p>
							</div>
						</div>
						<div class="project-info-progress">
							<div class="row">
								<div class="col-sm-12 text-left text-muted weight-500">Due in 5 days</div>
								<!-- <div class="col-sm-6 text-right weight-500 font-14 text-muted">50</div> -->
							</div>
							<a class="btn pull-left btn-outline-info btn-sm " data-backdrop="static" data-toggle="modal" data-target="#login-modal">Make MPESA Payment</a>
						</div>
					</div>
					<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">

						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<img src="<?=  base_url(); ?>assets/images/mpesa-logo.png" alt="MPESA" class="login-img mCS_img_loaded">
									<h2 class="text-center mb-30">Pay with MPESA?</h2>
									<p>Send MPESA payment request to</p>
									<form>
										<div class="input-group custom input-group-lg">
											<input type="text" class="form-control" placeholder="phone" value="0700200000">
											<div class="input-group-append custom">
												<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
											</div>
										</div>
										<div class="input-group custom input-group-lg">
											<input type="number" value="20000" class="form-control">
											<div class="input-group-append custom">
												<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="input-group">
									<!--
										use code for form submit
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
									-->
									<a class="btn btn-primary btn-lg btn-block" href="index.php">Make Payment</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
	<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
		<div class="project-info clearfix">
			<div class="project-info-left">
				<div class="icon box-shadow bg-light-orange text-white">
					<i class="fa fa-list-alt"></i>
				</div>
			</div>
			<div class="project-info-right">
				<span class="no text-light-orange weight-500 font-24">2 payments</span>
				<p class="weight-400 font-18">Timely Contributions</p>
			</div>
		</div>
		<div class="project-info-progress">
			<div class="row clearfix">
				<div class="col-sm-6 text-muted weight-500">Review</div>
				<div class="col-sm-6 text-right weight-500 font-14 text-muted">Good</div>
			</div>
			<div class="progress" style="height: 10px;">
				<div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width: 14%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
	<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
		<div class="project-info clearfix">
			<div class="project-info-left">
				<div class="icon box-shadow bg-light-purple text-white">
					<i class="fa fa-podcast"></i>
				</div>
			</div>
			<div class="project-info-right">
				<span class="no text-light-purple weight-500 font-24">12 Payments</span>
				<p class="weight-400 font-18">Remaining</p>
			</div>
		</div>
		<div class="project-info-progress">
			<div class="row clearfix">
				<div class="col-sm-6 text-muted weight-500">Review</div>
				<div class="col-sm-6 text-right weight-500 font-14 text-muted">Average</div>
			</div>
			<div class="progress" style="height: 10px;">
				<div class="progress-bar bg-light-purple progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="row clearfix">
	<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<h4 class="mb-30">Magadi Project overview</h4>
			<div class="device-manage-progress-chart">
				<ul>
					<li class="clearfix">
						<div class="device-name">Total Budget</div>
						<div class="device-progress">
							<div class="progress">
								<div class="progress-bar window border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
								</div>
							</div>
						</div>
						<div class="device-total">60</div>
					</li>
					<li class="clearfix">
						<div class="device-name">Pledged</div>
						<div class="device-progress">
							<div class="progress">
								<div class="progress-bar android border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
								</div>
							</div>
						</div>
						<div class="device-total">30</div>
					</li>
					<li class="clearfix">
						<div class="device-name">Raised</div>
						<div class="device-progress">
							<div class="progress">
								<div class="progress-bar mac border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
								</div>
							</div>
						</div>
						<div class="device-total">20</div>
					</li>
					<li class="clearfix">
						<div class="device-name">Deficit</div>
						<div class="device-progress">
							<div class="progress">
								<div class="progress-bar linux border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
								</div>
							</div>
						</div>
						<div class="device-total">10</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
			<h5 class="mb-20">Project updates. <small class="pull-right text-muted">Currently in Ephesus</small></h5>
			<div class="notification-list mx-h-450 customscroll">
				<ul>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="<?=  base_url(); ?>assets/images/img.jpg" alt="">
							<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('templates/footer_view'); ?>
</div>
</div>
<?php $this->load->view('templates/script'); ?>

<script type="text/javascript">

</script>
</body>
</html>