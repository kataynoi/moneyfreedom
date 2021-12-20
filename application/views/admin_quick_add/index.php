<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>
<body>
<br>

<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> เพิ่มค่าใช้จ่ายแบบด่วน
             <button class="btn btn-success pull-right" id="add_data" data-toggle="modal" data-target="#frmModal"><i class="fa fa-plus-circle"></i> Add</button>
</span>

        </div>
        <div class="panel-body">

            <table id="table_data" class="table table-responsive">
                <thead>
                <tr>
                    <th>ID</th><th>ชื่อสั้นๆ</th><th>ชื่อที่บันทึกลง</th><th>ราคา</th><th>บัญชีหลัก</th><th>บัญชีรอง</th>
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
        <h4 class="modal-title">เพิ่มเพิ่มค่าใช้จ่ายแบบด่วน</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="hidden" id="action" value="insert">
        <input type="hidden" class="form-control" id="row_id" placeholder="ROWID" value=""><div class="form-group">
                  
                    <input type="hidden" class="form-control" id="id" placeholder="" value=""></div><div class="form-group">
                    <label for="shortname">ชื่อสั้นๆ</label>
                    <input type="text" class="form-control" id="shortname" placeholder="ชื่อสั้นๆ" value=""></div><div class="form-group">
                    <label for="name"></label>
                    <input type="text" class="form-control" id="name" placeholder="" value=""></div><div class="form-group">
                    <label for="price">ราคา</label>
                    <input type="text" class="form-control" id="price" placeholder="ราคา" value=""></div><div class="form-group">
                    <label for="account_id">บัญชีหลัก</label>
                    <select  class="form-control" id="account_id" placeholder="บัญชีหลัก" value="">
                        <option>-------</option>
                        <?php
                        foreach ($account as $r) {
                                echo "<option value=$r->id > $r->name </option>";} ?>
                    </select></div><div class="form-group">
                    <label for="subaccount_id">บัญชีรอง</label>
                    <select  class="form-control" id="subaccount_id" placeholder="บัญชีรอง" value="">
                        <option>-------</option>
                        <?php
                        foreach ($sub_account as $r) {
                                echo "<option value=$r->id > $r->name </option>";} ?>
                    </select></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn_save">Save</button><button type="button" class="btn btn-danger" id="btn_close" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script src="<?php echo base_url() ?>assets/apps/js/admin_quick_add.js" charset="utf-8"></script>

<!--         foreach ($invit_type as $r) {
                                if ($outsite["invit_type"] == $r->id) {
                                    $s = "selected";
                                } else {
                                    $s = "";
                                }
                                echo "<option value=" $r->id" $s > $r->name </option>";

}
-->