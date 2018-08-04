<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view( 'templates/head_view' ); ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
    <?php $this->load->view( 'templates/header_view' ); ?>
    <?php $this->load->view( 'templates/sidebar_view' ); ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <!-- New Pledge Form Start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue">New Pledge</h4>
                            <p class="mb-30 font-14">New pledge towards the CFM Magadi church building</p>
                        </div>
                    </div>
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Member</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="pledge-member">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Pledge Name (e.g Jesus Jar) ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Stake</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="pledge-stake">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Amount</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Enter Amount within stake range">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Payment Period</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="pledge-period">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- New Pledge Form End -->
            </div>
            <?php $this->load->view('templates/footer_view'); ?>
        </div>
    </div>

    <?php $this->load->view( 'templates/script' ); ?>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
    <script>
        $('document').ready(function () {
          $.getJSON('<?= base_url()."api/lookup/members/json";?>', function (data) {
              console.log(data);
              var $select = $('#pledge-member'); 
              $select.find('option').remove();  

              $.each(data,function(key, value) {
                console.log('key '+ value.member.fullName)
                $select.append('<option value=' + value.member.id + '>' + value.member.fullName + '</option>');
            });
          });

          $.getJSON('<?= base_url()."api/lookup/stakes/json";?>', function (data) {
              console.log(data);
              var $select = $('#pledge-stake'); 
              $select.find('option').remove();  

              $.each(data,function(key, value) {
                console.log('key '+ value.pledgeStake.name)
                $select.append('<option value=' + value.pledgeStake.id + '>' + value.pledgeStake.name + '  ('+ value.pledgeStake.minimum.toLocaleString()+' - '+value.pledgeStake.maximum.toLocaleString() + ')</option>');
            });


          });

          $.getJSON('<?= base_url()."api/lookup/paymentperiods/json";?>', function (data) {
              console.log(data);
              var $select = $('#pledge-period'); 
              $select.find('option').remove();  

              $.each(data,function(key, value) {
                console.log('key '+ value.paymentPeriod.name)
                $select.append('<option value=' + value.paymentPeriod.id + '>' + value.paymentPeriod.name + '</option>');
            });


          });
      });


  </script>
</body>
</html>