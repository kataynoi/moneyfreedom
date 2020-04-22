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
        จำนวนประชาชนที่เดินทาง  วันที่ <?php echo to_thai_date(date('Y-m-d'));?>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>รายการ</th>
                <th>จำนวน</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>จำนวนผู้เข้าด่านตรวจทั้งหมด</td>
                <td><?php echo $report->total; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>ชาย</td>
                <td><?php echo $report->male; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>หญิง</td>
                <td><?php echo $report->female; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>ข้อมูลเพศไม่ครบถ้วน</td>
                <td><?php echo $report->total-($report->female+$report->female); ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>เข้ามาพักในจังหวัดมหาสารคาม</td>
                <td><?php echo $report->in_mk; ?></td>
            </tr>            <tr>
                <td>3</td>
                <td>ผลการตรวจอุฦณหภูมิ</td>
                <td><?php echo $report->total; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>ปกติ</td>
                <td><?php echo $report->temp_normal; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>ผิดปกติ</td>
                <td><?php echo $report->temp_abnormal; ?></td>
            </tr>

            </tbody>

        </table>
        <br>
        <hr class="hr">
        ยานพาหนะเดินทาง
        <table class="table table-striped">
            <thead>
            <tr>
                <td class='text-center'>#</td>
                <td class='text-center'>ยานพาหนะ</td>
                <td class='text-center'>จำนวน</td>
            </tr>
            <?php
            $stotal = 0;$n=1;
            foreach ($car as $r) {
                echo "<tr>";
                echo "<td>$n</td>
                <td>$r->name </td>
                <td class='text-center'>" . number_format($r->total) . "</td>";
                echo "</tr>";
                $n++;
                $stotal = $stotal + $r->total;
            }
            echo "<tr><td></td><td>รวม</td><td class='text-center'>$stotal</td></tr>";
            ?>

            </thead>
        </table>
        ข้อมูล วันที่ <?php echo to_thai_date_time(date('Y-m-d H:m:s')); ?>
    </div>
</div>