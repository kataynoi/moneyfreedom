<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?PHP
    $theme = 'https://www.w3schools.com/lib/w3-theme-blue.css'; ?>
    <title><?php echo version(); ?></title>
    <script src="<?php echo base_url() ?>assets/vendor/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/js/jquery.blockUI.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/css/style.css" rel="stylesheet">
    <!-- MetisMenu CSS -->

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <!--
        https://www.w3schools.com/w3css/w3css_color_themes.asp
    -->
    <!-- theme Color-->

    <!-- Alert Css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/v4-shims.css">
    <!-- Alert Css-->

    <!-- Custom Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Kanit');
    </style>
</head>
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
<style>
    body {
        font-family: 'Kanit', sans-serif;
        font-size: 100%;
    }
</style>
<!-- Custom Fonts -->

<!-- jQuery -->

<style>
    #page-wrapper {
        margin-left: 0px;
    }
</style>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/vendor/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>assets/vendor/js/underscore.min.js"></script>

<script src="<?php echo base_url() ?>assets/vendor/js/jquery.cookie.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url() ?>assets/apps/js/apps.js"></script>
<script type="text/javascript" charset="utf-8">
    var site_url = '<?php echo site_url() ?>';
    var base_url = '<?php echo base_url() ?>';
    var user_id = '<?php echo $this->session->userdata('id') ?>';
    var year = '<?php echo date('Y'); ?>'
    var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>

<body>

    <div id="wrapper">

        <div>
            <div id="page-wrapper" style="padding-left: 3%;border: 0px;">
                <!-- <button id="hide_left" data-show="true">Hide</button>-->
                <?php echo $content_for_layout ?>
            </div>
        </div>

    </div>

</body>

</html>