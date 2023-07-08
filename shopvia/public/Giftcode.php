<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'GIFTCODE | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Giftcode.php");
    require_once("../views/Giftcode.php");
    require_once("../views/Footer.php");
