<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'DANH SÁCH CLONE | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    CheckAdmin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Admin-XemClone.php");
    require_once("../views/Admin-XemClone.php");
    require_once("../views/Footer.php");
