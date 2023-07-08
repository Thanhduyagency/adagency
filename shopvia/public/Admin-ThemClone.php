<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'THÊM CLONE| '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    CheckAdmin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Admin-ThemClone.php");
    require_once("../views/Admin-ThemClone.php");
    require_once("../views/Footer.php");
