<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'CẤU HÌNH WEBSITE| '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    CheckAdmin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Admin-Settings.php");
    require_once("../views/Admin-Settings.php");
    require_once("../views/Footer.php");
