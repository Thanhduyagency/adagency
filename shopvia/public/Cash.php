<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'DÒNG TIỀN | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    CheckLogin();
    require_once("../views/Header.php");
    require_once("../views/Sidebar.php");
    require_once("../models/Cash.php");
    require_once("../views/Cash.php");
    require_once("../views/Footer.php");
