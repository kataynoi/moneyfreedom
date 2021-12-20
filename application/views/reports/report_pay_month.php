<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<html>

<body>
    <br>

    <div class="row">
        <div class="panel panel-info ">
            <div class="panel-heading w3-theme">
                <i class="fa fa-user fa-2x "></i> รายการใช้จ่ายตามหมวด แยกรายเดือน
                </span>

            </div>
            <div class="panel-body">

                <div class="navbar navbar-default">
                    <form action="#" class="navbar-form">
                        <label class="control-label"> บัญชี </label>
                        <select id="param1" style="width: 200px;" class="form-control">
                            <option value=""> เลือก </option>
                            <?php
              foreach ($account as $r) {echo "<option value=$r->id > $r->name </option>";} 
            ?>
                        </select>
                        <label class="control-label"> ปี</label>
                        <select id="param2" style="width: 200px;" class="form-control">
                            <option value="2020"> 2563 </option>
                            <option value="2021" selected> 2564 </option>
                            <option value="2022"> 2565 </option>

                        </select>
                        <label class="control-label"> เดือน</label>
                        <select id="param3" style="width: 200px;" class="form-control">
                            <option value="01"> มกราคม </option>
                            <option value="02"> กุมภาพันธ์ </option>
                            <option value="03"> มีนาคม </option>
                            <option value="04"> เมษายน </option>
                            <option value="05"> พฤษภาคม </option>
                            <option value="06"> มิถุนายน </option>
                            <option value="07"> กรกฎาคม </option>
                            <option value="08"> สิงหาคม</option>
                            <option value="09"> กันยายน</option>
                            <option value="10"> ตุลาคม</option>
                            <option value="11"> พฤศจิกายน</option>
                            <option value="12"> ธันวาคม</option>

                        </select>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="get_data" data-name='btn_get_data'>
                                <i class="glyphicon glyphicon-search"></i> แสดง
                            </button>
                        </div>
                    </form>
                    <div id="container"></div>
                </div>

                <table id="table_data" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>account</th>
                            <th>subaccount_id</th>
                            <th>sum</th>
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
    <script src="<?php echo base_url() ?>assets/apps/js/report_pay_month.js" charset="utf-8"></script>