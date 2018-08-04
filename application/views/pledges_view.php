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
                <!-- Simple Datatable start -->
                <div class="page-header">
                    <div class="row" style="margin-bottom: 8px;">
                        <div class="col-md-6 col-sm-12">

                         <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pledges</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="<?= base_url()?>pledges/create" role="button">
                            New Pledge
                        </a>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                <div class="row">
                    <table class="data-table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <td>Initial Payment</td>
                                <th>Balance</th>
                                <th>Contributed</th>
                                <th>Stake</th>
                                <th>Member</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                            </button>
                            <h2 class="text-center mb-30">Pledge</h2>
                            <form>
                                <div class="input-group custom input-group-lg">
                                    <input type="text" class="form-control" placeholder="Name" disabled>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom input-group-lg">
                                    <input type="text" class="form-control" placeholder="Amount" disabled>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom input-group-lg">
                                    <input type="text" class="form-control" placeholder="Project" disabled>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom input-group-lg">
                                    <input type="text" class="form-control" placeholder="Initial Amount" disabled>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom input-group-lg">
                                    <input type="text" class="form-control" placeholder="Amount Contributed" disabled>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom input-group-lg">
                                    <input type="text" class="form-control" placeholder="Amount Remaining" disabled>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                                <!--
													use code for form submit
													<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
												-->
                                                <!--                                                <a class="btn btn-primary btn-lg btn-block" href="index.php">Sign-->
                                                    <!--                                                    In</a>-->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Simple Datatable End -->
            </div>
            <?php $this->load->view( 'templates/footer_view' ); ?>
        </div>
    </div>
    <?php $this->load->view( 'templates/script' ); ?>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
    <!-- buttons for Export datatable -->
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/buttons.print.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/buttons.html5.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/buttons.flash.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
    <script>
        $('document').ready(function () {
            $('.data-table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                ajax: '<?= base_url(); ?>api/getpledges/datatable',
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search"
                },
            });
            
            var table = $('.select-row').DataTable();
            $('.select-row tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var multipletable = $('.multiple-select-row').DataTable();
            $('.multiple-select-row tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });
        });
    </script>
</body>
</html>