<div class="navbar-header w3-theme">
    <a class="navbar-brand w3-theme" href="<?php echo base_url() ?>"><?php echo version(); ?>  </a>
    <a class="navbar-brand w3-theme"><?php echo $this->session->userdata('hosname') ?>
    <?php echo " " . $this->session->userdata('fullname') ?></div></a>
<!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right w3-theme">
    <li class="dropdown">
        <a  href="<?php echo base_url('/'); ?>" >
            <i class="fa fa-home fa-fw"></i> Home
        </a>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-save fa-fw"></i> บันทึกข้อมูล <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
            <li>
                <a href="<?php echo site_url('person_bypass'); ?>">
                    <div>  <i class="fa fa-save fa-fw"></i> บันทึกข้อมูลด่านตรวจวัดอุณหภูมิ </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo site_url('person_survey'); ?>">
                    <div>  <i class="fa fa-save fa-fw"> </i>บันทึกข้อมูลประชาชนที่เดินทางกลับภูมิลำเนา</div>
                </a>
            </li>
        </ul>

    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-save fa-fw"></i> รายงาน <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
            <li>
                <a href="<?php echo site_url('report/person_bypass_last7day')?>">
                    <div>  <i class="fa fa-save fa-fw"></i> จำนวนผู้ผ่านด่านตรวจ </div>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('report/person_survey')?>">
                    <div>  <i class="fa fa-save fa-fw"> </i> จำนวนประชาชนเดินทางกลับภูมิลำเนา จ.มหาสารคาม</div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo site_url('report/summary_checkpoint')?>">
                    <div>  <i class="fa fa-save fa-fw"> </i> สรุปจำนวนประชาชนผ่านด่าน รายวัน</div>
                </a>
            </li>
        </ul>

    </li>

    <li class="dropdown">

        <?php
        if ($this->session->userdata('id') != '') {
            echo "
<a class='dropdown-toggle' data-toggle='dropdown'' href='#'>
            <i class='fa fa-user fa-fw'></i> <i class='fa fa-caret-down'></i></a>
            <ul class='dropdown-menu dropdown-user'>
            <li><a href=" . site_url('user/user_profile/') . $this->session->userdata('id') . "><i class='fa fa-user fa-fw'></i> User Profile</a>
            </li>
            <li class='divider'></li>
            <li><a href=" . site_url('user/logout') . "><i class='fa fa-sign-out fa-fw'></i> Logout</a>
            </li>
        </ul> ";
        } else {
            echo "<a href='" . site_url('user/login') . "'>Login</a>";
        }
        ?>

        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
