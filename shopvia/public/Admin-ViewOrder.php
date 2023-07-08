<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'CHI TIẾT ĐƠN HÀNG | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    CheckAdmin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Admin-ViewOrder.php");
    require_once("../views/Admin-ViewOrder.php");
    require_once("../views/Footer.php");
