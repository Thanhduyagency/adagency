<?php
if(isset($_POST['code']) && isset($_SESSION['username']))
{
    $code = check_string($_POST['code']);
    $row = $CMSNT->get_row("SELECT * FROM `giftcode` WHERE `code` = '$code' ");
    if(!$row)
    {
        msg_error("Giftcode này không tồn tại trong hệ thống!", "", 2000);
    }
    if($row['username'] == $getUser['username'])
    {
        msg_error("Bạn đã sử dụng giftcode này rồi !", "", 2000);
    }
    $create = $CMSNT->update("giftcode", [
        'username'  => $getUser['username'],
        'capnhat'   => gettime()
    ], " `code` = '$code' ");
    if($create)
    {
        // Ghi log dòng tiền
        $CMSNT->insert("dongtien", array(
            'sotientruoc' => $getUser['money'],
            'sotienthaydoi' => $row['sotien'],
            'sotiensau' => $getUser['money'] + $row['sotien'],
            'thoigian' => gettime(),
            'noidung' => 'Sử dụng Giftcode ('.$code.')',
            'username' => $getUser['username']
        ));
        // Cộng tiền
        $CMSNT->update("users", [
            'money' => $getUser['money'] + $row['sotien']
        ], " `username` = '".$getUser['username']."' ");
        msg_success("Sử dụng giftcode thành công, nhận được ".format_cash($row['sotien']), '', 2000);
    }
}