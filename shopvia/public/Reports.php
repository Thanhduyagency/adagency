<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'LỊCH SỬ KHIẾU NẠI | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Reports.php");
    require_once("../views/Reports.php");
    require_once("../views/Footer.php");
