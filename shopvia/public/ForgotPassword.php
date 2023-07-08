<?php

    require_once("../config/config.php");
    require_once("../config/function.php");
    $title = 'QUÊN MẬT KHẨU | '.$CMSNT->site('tenweb');
    require_once("../class/class.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
    require_once("../views/Header.php");
    require_once("../views/ForgotPassword.php");
    require_once("../models/ForgotPassword.php");
    require_once("../views/Footer.php");
