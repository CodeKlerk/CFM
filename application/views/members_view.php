<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view( 'templates/head_view' ); ?>
</head>
<body>
    <?php $this->load->view( 'templates/header_view' ); ?>
    <?php $this->load->view( 'templates/sidebar_view' ); ?>
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Members</li>
                </ol>
            </nav>
            <div class="min-height-200px">
                <!-- Bordered table  start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">names</th>
                                <th scope="col">names</th>
                                <th scope="col">telephone</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">names</th>
                                <th scope="col">names</th>
                                <th scope="col">telephone</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Bordered table End -->
            </div>
            <?php $this->load->view( 'templates/footer_view' ); ?>
        </div>
    </div>
    <?php $this->load->view( 'templates/script' ); ?>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
    <script src="<?= base_url();?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            $('.table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                ajax: '<?= base_url(); ?>api/getmembers/datatable',
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