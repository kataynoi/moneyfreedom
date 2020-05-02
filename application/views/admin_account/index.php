<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>
<body>
<br>

<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> บัญชีหลัก
            <button class="btn btn-success pull-right" id="add_data" data-toggle="modal" data-target="#frmModal"><i
                    class="fa fa-plus-circle"></i> Add
            </button>
            </span>

        </div>
        <div class="panel-body">

            <table id="table_data" class="table table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อบัญชี</th>
                    <th>เลขที่บัญชี</th>
                    <th>ธนาคาร</th>
                    <th>สถานะการใช้งาน</th>
                    <th>#</th>
                </tr>
                </thead>

            </table>
        </div>

    </div>

</div>


<div class="modal fade" id="frmModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มบัญชีหลัก</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="action" value="insert">
                <input type="hidden" class="form-control" id="row_id" placeholder="ROWID" value="">

                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" placeholder="ID" value=""></div>
                <div class="form-group">
                    <label for="name">ชื่อบัญชี</label>
                    <input type="text" class="form-control" id="name" placeholder="ชื่อบัญชี" value=""></div>
                <div class="form-group">
                    <label for="account_number">เลขที่บัญชี</label>
                    <input type="text" class="form-control" id="account_number" placeholder="เลขที่บัญชี" value="">
                </div>
                <div class="form-group">
                    <label for="bank">ธนาคาร</label>
                    <input type="text" class="form-control" id="bank" placeholder="ธนาคาร" value=""></div>
                <div class="form-group">
                    <label for="active">สถานะการใช้งาน</label>
                    <input type="text" class="form-control" id="active" placeholder="สถานะการใช้งาน" value=""></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_save">Save</button>
                <button type="button" class="btn btn-danger" id="btn_close" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script src="<?php echo base_url() ?>assets/apps/js/admin_account.js" charset="utf-8"></script>
