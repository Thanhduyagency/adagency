<?php
if(isset($_POST['nguoinhan']) && isset($_POST['sotien']) && isset($_SESSION['username']))
{
    $nguoinhan = check_string($_POST['nguoinhan']);
    $nguoichuyen = $_SESSION['username'];
    $sotien = check_string($_POST['sotien']);
    $lydo = check_string($_POST['lydo']);
    $row_nguoinhan = $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '$nguoinhan' ");
    if($nguoinhan == $nguoichuyen)
    {
        msg_error("Bạn không thể tự chuyển tiền cho bản thân", "", 2000);
    }
    if(!$row_nguoinhan)
    {
        msg_error("Tài khoản người nhận không tồn tại trong hệ thống", "", 2000);
    }
    if($sotien < 10000)
    {
        msg_error("Số tiền chuyển tối thiểu là: 10.000đ", "", 2000);
    }
    if($sotien > $getUser['money'])
    {
        msg_error("Số dư của bạn không có nhiều như vậy", "", 2000);
    }
    if($getUser['banned'] == 1)
    {
        msg_error("Tài khoản của bạn đã bị khóa, không thể thực hiện giao dịch", "", 2000);
    }
    // Trừ tiền người chuyển
    $create = $CMSNT->update("users", [
        'money' => $getUser['money'] - $sotien
    ], " `username` = '$nguoichuyen' ");
    if($create)
    {
        // Ghi log người chuyển
        $CMSNT->insert("dongtien", array(
            'sotientruoc' => $getUser['money'],
            'sotienthaydoi' => $sotien,
            'sotiensau' => $getUser['money'] - $sotien,
            'thoigian' => gettime(),
            'noidung' => 'Chuyển tiền cho tài khoản ('.$nguoinhan.')',
            'username' => $nguoichuyen
        ));

        // Cộng tiền người nhận
        $isCongTien = $CMSNT->update("users", [
            'money' => $row_nguoinhan['money'] + $sotien
        ], " `username` = '$nguoinhan' ");

        if($isCongTien)
        {
            // Ghi log người nhận
            $CMSNT->insert("dongtien", array(
                'sotientruoc' => $row_nguoinhan['money'],
                'sotienthaydoi' => $sotien,
                'sotiensau' => $row_nguoinhan['money'] + $sotien,
                'thoigian' => gettime(),
                'noidung' => 'Nhận tiền từ tài khoản ('.$nguoichuyen.')',
                'username' => $nguoinhan
            ));

            // Ghi log chuyển tiền
            $CMSNT->insert("chuyentien", [
                'nguoinhan' => $nguoinhan,
                'nguoichuyen' => $getUser['username'],
                'sotien'    => $sotien,
                'thoigian'  => gettime(),
                'lydo'  => $lydo
            ]);

            msg_success("Chuyển tiền hoàn tất", "", 2000);
        }
    }
}