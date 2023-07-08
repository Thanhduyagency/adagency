<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'NHẬT KÝ HOẠT ĐỘNG | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/History.php");
    require_once("../views/History.php");
    require_once("../views/Footer.php");
