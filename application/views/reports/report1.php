<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>
<body>
<br>

<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> รายงาน1
             </span>

        </div>
        <div class="panel-body">

            <table id="table_data" class="table table-responsive">
                <thead>
                <tr>
                    <th>account</th><th>subaccount_id</th><th>sum</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th colspan="2" style="text-align:right">Total:</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/apps/js/report1.js" charset="utf-8"></script>

