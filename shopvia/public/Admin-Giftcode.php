<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'QUẢN LÝ GIFTCODE | '.$CMSNT->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Admin-Giftcode.php");
    require_once("../views/Admin-Giftcode.php");
    require_once("../views/Footer.php");
