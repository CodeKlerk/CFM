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
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<h5 class="text-center"><?= $this->session->userdata('name'); ?></h5>
							<p class="text-center text-muted"><?= $this->session->userdata('surname'); ?></p>
							<div class="profile-info">
								<h5 class="mb-20 weight-500">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?= $this->session->userdata('emailaddress'); ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?= $this->session->userdata('phonenumber'); ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link " data-toggle="tab" href="#timeline" role="tab">Timeline</a>
										</li>
										<li class="nav-item active">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade " id="timeline" role="tabpanel">
											<div class="pd-20">
												<div class="profile-timeline">

												</div>
											</div>
										</div>
										<!-- Timeline Tab End -->
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p show active" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form>
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<h4 class="text-blue mb-12">Edit Your Personal Setting</h4>
															<div class="form-group">
																<label>name</label><input class="form-control form-control-lg" value="<?= $this->session->userdata('name'); ?>" type="text">
															</div>
															<div class="form-group">
																<label>surname</label><input class="form-control form-control-lg" value="<?= $this->session->userdata('surname'); ?>" type="text">
															</div>
															<div class="form-group">
																<label>username</label><input class="form-control form-control-lg" value="<?= $this->session->userdata('username'); ?>" type="text">
															</div>
															<div class="form-group">
																<label>emailaddress</label><input class="form-control form-control-lg" value="<?= $this->session->userdata('emailaddress'); ?>" type="text">
															</div>
															<div class="form-group">
																<label>phonenumber</label><input class="form-control form-control-lg" value="<?= $this->session->userdata('phonenumber'); ?>" type="text">
															</div>
															<div class="form-group">
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="customCheck1-1">
																	<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
																</div>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Information">
															</div>
														</li>
													</ul>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('templates/script'); ?>

	<script type="text/javascript">

	</script>
</body>
</html>