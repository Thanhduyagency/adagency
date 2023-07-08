<?php
$Users = new Users;
if(isset($_SESSION['username']) && isset($_POST['btnChangeInfo']) && isset($_POST['password']) && isset($_POST['repassword']) )
{
    $row = $Users->get_row_by_id(" `username` = '".$_SESSION['username']."' ");
    if(!$row['id'])
    {
        msg_error('Người dùng không hợp lệ.', BASE_URL(''), 2000);
    }
    $password = check_string($_POST['password']);
    $repassword = check_string($_POST['repassword']);
    if ($password != $repassword) 
    {
        msg_error('Nhập lại mật khẩu không đúng', '', 2000);
        
    }
    $Users->update_by_id(array(
        'password' => TypePassword($password)
    ), $row['id']); 
    msg_success('Thay đổi thông tin thành công', BASE_URL(""), 2000);
}