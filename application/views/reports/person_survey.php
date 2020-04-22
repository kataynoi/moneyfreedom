<br>
<br>

<script>
    $('#left_menu').hide();
</script>
<style>
    #page-wrapper {
        margin-left: 0px;
    }
</style>
<div class="panel panel-info">
    <div class="panel-heading">
        จำนวนประชาชนที่เดินทางกลับภูมิลำเนา ของจังหวัดมหาสารคาม โดยการรวมรายงานทั้ง 3 ระบบ *

    </div>
    <div class="panel-body">

        <span class="pull-right">
                <a href="<?php echo site_url('excel_export/person_survey_excel/'); ?>"
                   class="btn btn-outline btn-success"> ส่งออกรายชื่อ Excel (เฉพาะอำเภอของท่าน) </a>

        </span>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>อำเภอ</th>
                <th class='text-center'>จำนวนท้งหมด</th>
                <th class='text-center'>
                    <?php echo '22 มี.ค. 2563 - ' . to_thai_date_short(date('Y-m-d', strtotime("-1 days"))); ?></th>
                <th class='text-center'>
                    <?php echo to_thai_date_short(date('Y-m-d')); ?>
                </th>
                <th class='text-center'>
                    ผู้เดินทางจาก กรุงเทพ ปริมณฑลสะสม
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $n = 1;
            $sdaynow = 0;
            $sdaynow1 = 0;
            $stotal = 0;
            $sbkk = 0;
            foreach ($report as $r) {
                echo "<tr>";
                echo "<td>$n</td>
            <td>$r->ampurname </td>
            <td class='text-center'>" . number_format($r->total) . "</td>
            <td class='text-center'>" . number_format($r->daynow1) . " </td>
            <td class='text-center'>" . number_format($r->daynow) . "</td>
            <td class='text-center'>" . number_format($r->bkk) . "</td>";
                echo "</tr>";
                $n++;
                $stotal = $stotal + $r->total;
                $sbkk = $sbkk + $r->bkk;
                $sdaynow = $sdaynow + $r->daynow;
                $sdaynow1 = $sdaynow1 + $r->daynow1;
            }
            echo "<tr>
                  <td colspan='2'> รวม</td>
                    <td class='text-center'>" . number_format($stotal) . "</button></td>
                    <td class='text-center'>" . number_format($sdaynow1) . "</td>
                    <td class='text-center'>" . number_format($sdaynow) . "</td>
                    <td class='text-center'>" . number_format($sbkk) . "</td>
                </tr>"
            ?>
            </tbody>

        </table>
        <hr class="hr">
        ระบบเก็บข้อมูลทั้ง 3 ระบบ <br>
        1. ระบบบันทึกข้อมูล สสจ.มหาสารคาม (ระบบเดิมคือ GoogleForm ปัจจุบันเป็นเว็บ)<br>
        2. ระบบบันทึกข้อมูลผ่าน Line เขตสุขภาพที่ 7 <br>
        3. ระบบบันทึกข้อมูลมหาดไทย ThaiQM โดยให้อำเภอส่งข้อมูลเพื่อนำเข้าก่อน 10.00 ทุกวัน <br>
    </div>
</div>