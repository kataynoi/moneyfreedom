<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/vendor/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/vendor/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

<script>
$(document).ready(function() {


});
</script>
<html>

<body>
    <br>

    <div class="row">
        <div class="panel panel-info ">
            <div class="panel-heading w3-theme">
                <i class="fa fa-user fa-2x "></i> รายการรับจ่าย
                <button class="btn btn-success pull-right" id="add_data" data-toggle="modal" data-target="#frmModal"><i
                        class="fa fa-plus-circle"></i> Add
                </button>
                </span>

            </div>

            <div class="panel-body">

                <table id="table_data" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>ชื่อรายการ</th>
                            <th>ราคา</th>
                            <th>บัญชีหลัก</th>
                            <th>บัญชีย่อย</th>
                            <th>วันที่</th>
                            <th>บันทึกเพิ่มเติม</th>
                            <th>วันที่บันทึก</th>
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
                    <h4 class="modal-title">เพิ่มรายการรับจ่าย</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="hidden" id="action" value="insert">
                    <input type="hidden" class="form-control" id="row_id" placeholder="ROWID" value="">

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" placeholder="id" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">ชื่อรายการ</label>
                        <input type="text" class="form-control" id="name" placeholder="ชื่อรายการ" value="">
                    </div>
                    <div class="form-group">
                        <label for="price">ราคา</label>
                        <input type="text" class="form-control" id="price" placeholder="ราคา" value="">
                    </div>
                    <div class="form-group">
                        <label for="account_id">บัญชีหลัก</label>
                        <select class="form-control" id="account_id" placeholder="บัญชีหลัก" value="">
                            <option>-------</option>
                            <?php
                        foreach ($account as $r) {
                            echo "<option value=$r->id > $r->name </option>";
                        } 
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subaccount_id">บัญชีย่อย</label>
                        <select class="form-control" id="subaccount_id" placeholder="บัญชีย่อย" value="">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">วันที่</label>
                        <input id="date" class="form-control datepicker" data-date-format="mm/dd/yyyy">
                    </div>

                    <div class="form-group">
                        <label for="note">บันทึกเพิ่มเติม</label>
                        <input type="text" class="form-control" id="note" placeholder="บันทึกเพิ่มเติม" value="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btn_save">Save</button>
                    <button type="button" class="btn btn-danger" id="btn_close" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url() ?>assets/apps/js/pay_items.js" charset="utf-8"></script>
