<br>
<script src="<?php echo base_url() ?>assets/vendor/js/highcharts.js"></script>

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