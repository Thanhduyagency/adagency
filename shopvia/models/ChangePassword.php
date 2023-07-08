<?php
if(isset($_POST['btnSubmit']) && isset($_POST['password']) && isset($_POST['otp']) && isset($_POST['repassword']))
{

    $otp = check_string($_POST['otp']);
    $repassword = check_string($_POST['repassword']);
    $password = check_string($_POST['password']);
    $user = new users;
    $row = $user->get_row_by_id(" `otp` = '$otp' ");
    if(!$row['username'])
    {
        msg_error("OTP không tồn tại trong hệ thống", "", 1000);
    }
    if($password != $repassword)
    {
        msg_error("Nhập lại mật khẩu không đúng", "", 1000);
    }
    if(strlen($password) < 5)
    {
        msg_error('Vui lòng nhập mật khẩu có ích nhất 5 ký tự', '', 1000);
    }
    $user->update_by_id(array(
        'otp' => NULL,
        'password' => TypePassword($password)
    ), $row['id']);

    msg_success("Mật khẩu của bạn đã được thay đổi thành công", BASE_URL('Auth/Login'), 1000);
}