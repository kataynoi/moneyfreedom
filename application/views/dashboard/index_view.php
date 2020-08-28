<br>
<script src="<?php echo base_url() ?>assets/vendor/js/highcharts.js"></script>
<div class="row" style="padding-top: 20px">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="percent_audit"><?php echo number_format($items1->items1);?></div>
                        <div>ค่าอาหาร</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('/demographic/')?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="percent_audit_true"><?php echo number_format($items2->items2);"x"; ?></div>
                        <div>ค่าแก๊สน้ำมัน</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo "x";?></div>
                        <div>ค่าน้ำไฟโทรศัพย์</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียดเพิ่มเติม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo "x";?></div>
                        <div>ผู้ใช้งาน</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียดเพิ่มเติม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col col-lg-12'>
        <div class='panel panel-info'>
            <div class="panel-heading"><span class='glyphicon glyphicon-th'></span> กราฟแสดงการเงินรายเดือน
            </div>
            <div class="navbar navbar-default">
                <form action="#" class="navbar-form">
         <span>ปี
                 <select id="txt_year" style="width: 180px;" class="form-control">
                     <?php
                     $year = date('Y');
                     for ($i = $year - 5; $i <= $year; $i++) {
                         if ($i == $year) {
                             echo "<option value=" . $i . " selected=selected> " . ($i + 543) . " </option>";
                         } else {
                             echo "<option value=" . $i . "> " . ($i + 543) . " </option>";
                         }
                     }
                     ?>

                 </select>

             <button class="btn btn-info" id='btn_show_chart'><span class="glyphicon glyphicon-print"></span> แสดงกราฟ
             </button>
     </span>

                </form>
            </div>
            <div class='panel-body'>
                <div id="disease_year"></div>

            </div>
        </div>
    </div>

</div>

<div class='row'>
    <div class='col col-lg-12'>
        <div class='panel panel-info'>
            <div class="panel-heading"><span class='glyphicon glyphicon-th'></span> กราฟแสดงการเงินรายเดือนแยกบัญชีย่อย
            </div>
            <div class="navbar navbar-default">
                <form action="#" class="navbar-form">
         <span>ปี
                 <select id="txt_year" style="width: 180px;" class="form-control">
                     <?php
                     $year = date('Y');
                     for ($i = $year - 5; $i <= $year; $i++) {
                         if ($i == $year) {
                             echo "<option value=" . $i . " selected=selected> " . ($i + 543) . " </option>";
                         } else {
                             echo "<option value=" . $i . "> " . ($i + 543) . " </option>";
                         }
                     }
                     ?>

                 </select>

             <button class="btn btn-info" id='btn_show_chart'><span class="glyphicon glyphicon-print"></span> แสดงกราฟ
             </button>
     </span>

                </form>
            </div>
            <div class='panel-body'>
                <div id="subaccount"></div>

            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url() ?>assets/apps/js/dashboard.js" charset="utf-8"></script>