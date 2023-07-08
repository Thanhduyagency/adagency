<?php 
//ĐĂNG NHẬP
if(isset($_POST['btnLogin']) && isset($_POST['username']) && isset($_POST['password']) )
{
    $Users = new Users;
    $username = check_string($_POST['username']);
    if(!$Users->get_row_by_id(" username = '$username' "))
    {
        msg_error('Tên đăng nhập không tồn tại', '', 1000);
    }
    if($Users->get_row_by_id(" username = '$username' AND banned = '1' "))
    {
        msg_error('Tài khoản này đã bị khóa bởi BQT', '', 1000);
    }
    $password = TypePassword(check_string($_POST['password']));
    if(!$Users->get_row_by_id(" `username` = '$username' AND `password` = '$password' "))
    {
        msg_error('Mật khẩu đăng nhập không chính xác', '', 1000);
    }
    $logs = new logs;
    $logs->add_new(array(
        'username' => $username,
        'content' => 'Thực hiện đăng nhập',
        'createdate' => gettime()
    ));
    $CMSNT->update("users", [
        'otp' => NULL
    ], " `username` = '$username' ");

    $_SESSION['username'] = $username;

    msg_success('Đăng nhập thành công ', BASE_URL(''), 0);
}
