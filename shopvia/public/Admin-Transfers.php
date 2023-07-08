<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'LỊCH SỬ CHUYỂN TIỀN THÀNH VIÊN | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    CheckAdmin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Admin-Transfers.php");
    require_once("../views/Admin-Transfers.php");
    require_once("../views/Footer.php");
