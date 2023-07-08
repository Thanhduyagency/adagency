<?php

    require_once("./config/config.php");

    require_once("./config/function.php");

    $title = 'HOME | '.$CMSNT->site('tenweb');

    require_once("./class/class.php");

    require_once("./class/Mobile_Detect.php");

    require_once("./views/Header.php");

    require_once("./views/Sidebar.php");

    require_once("./models/Home.php");

    require_once("./views/Home.php");

    require_once("./views/Footer.php");