<?php
if(isset($_POST['code']) && isset($_POST['sotien']) && isset($_SESSION['username']) && $getUser['level'] == 'admin')
{
    $code = check_string($_POST['code']);
    $sotien = check_string($_POST['sotien']);
    $ghichu = check_string($_POST['ghichu']);

    if($CMSNT->get_row("SELECT * FROM `giftcode` WHERE `code` = '$code' "))
    {
        msg_error("Giftcode này đã tồn tại trong hệ thống", "", 2000);
    }
    if($sotien <= 0)
    {
        msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $isCreate = $CMSNT->insert("giftcode", [
        'username'  => NULL,
        'sotien'    => $sotien,
        'code'      => $code,
        'thoigian'  => gettime(),
        'ghichu'    => $ghichu
    ]);
    if($isCreate)
    {
        $CMSNT->insert("logs", [
            'username'  => $getUser['username'],
            'createdate'    => gettime(),
            'content'   => 'Tạo giftcode ('.$code.')'
        ]);
        msg_success("Tạo giftcode ".$code." thành công!", "", 3000);
    }
    
}