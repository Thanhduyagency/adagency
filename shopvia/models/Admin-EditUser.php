<?php
/* BẢN QUYỀN THUỘC VỀ CMSNT.CO | NTTHANH LEADER NT TEAM */
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $users = new users;
    $row = $users->get_row_by_id(" `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        msg_error("Người dùng này không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['btnCongTien']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $create = $CMSNT->insert("dongtien", [
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] + $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin cộng tiền ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $CMSNT->update("users", [
            'money' => $row['money'] + $value
        ], " `username` = '".$row['username']."' ");
        msg_success("Cộng tiền thành công!", "", 2000);
    }
    else
    {
        msg_error("Vui lòng liên hệ kỹ thuật Zalo 0947838128", "", 12000);
    }
    
}

if(isset($_POST['btnTruTien']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $create = $CMSNT->insert("dongtien", [
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] - $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin trừ tiền ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $CMSNT->update("users", [
            'money' => $row['money'] - $value
        ], " `username` = '".$row['username']."' ");
        msg_success("Trừ tiền thành công!", "", 2000);
    }
    else
    {
        msg_error("Vui lòng liên hệ kỹ thuật Zalo 0947838128", "", 12000);
    }
    
}


if(isset($_POST['btnSaveUser']) && isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $token = check_string($_POST['token']);
    $otp = check_string($_POST['otp']);
    $email = check_string($_POST['email']);
    $money = check_string($_POST['money']);
    $level = check_string($_POST['level']);
    $daily = check_string($_POST['daily']);
    $banned = check_string($_POST['banned']);
    $chietkhau = check_string($_POST['chietkhau']);

    if($row['money'] != $money)
    {
        $dongtien = new dongtien;
        $dongtien->add_new(array(
            'sotientruoc' => $row['money'],
            'sotienthaydoi' => $money - $row['money'],
            'sotiensau' => $money,
            'thoigian' => gettime(),
            'noidung' => 'Admin thay đổi số dư ',
            'username' => $row['username']
        ));
    }
    $users = new Users;
    $users->update_by_id(array(
        'otp' => $otp,
        'token' => $token,
        'email' => $email,
        'money' => $money,
        'level' => $level,
        'chietkhau' => $chietkhau,
        'banned' => $banned
    ), $row['id']);

    $logs = new logs;
    $logs->add_new(array(
        'username' => $getUser['username'],
        'content' => 'Chỉnh sửa thành viên '.$row['username'],
        'createdate' => gettime()
    ));

    msg_success("Thay đổi user thành công", "", 1000);
}