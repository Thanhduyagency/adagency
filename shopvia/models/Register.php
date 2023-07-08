<?php 
$Users = new Users;

// ĐĂNG KÝ
if( isset($_GET['ref']) )
{
    $id = check_string($_GET['ref']);
    $row = $Users->get_list_by_id(" id = '$id' ");
    $_SESSION['ref'] = $row['username'];
    $ref = $_SESSION['ref'];
}
if(empty($_SESSION['ref']))
{
    $_SESSION['ref'] = NULL;
}
if(isset($_POST['btnRegister']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) )
{
    $username = check_string($_POST['username']);
    if(strlen($username) < 5 || strlen($username) > 64)
    {
        msg_error('Tài khoản phải từ 5 đến 64 ký tự', '', 1000);
    }
    if(check_username($username) != True)
    {
        msg_error('Vui lòng nhập định dạng tài khoản hợp lệ', '', 1000);
    }
    $email = check_string($_POST['email']);
    if(check_email($email) != True)
    {
        msg_error('Định dạng email không đúng !', '', 1000);
    }
    $password = check_string($_POST['password']);
    if(strlen($password) < 5)
    {
        msg_error('Vui lòng đặt mật khẩu trên 4 ký tự', '', 1000);
    }
    $repassword = check_string($_POST['repassword']);
    if($password != $repassword)
    {
        msg_error('Nhập lại mật khẩu không chính xác', '', 1000);
    }
    if($Users->get_row_by_id(" username = '$username' "))
    {
        msg_error('Tên đăng nhập đã tồn tại!', '', 1000);
    }
    if($Users->get_row_by_id(" email = '$email' "))
    {
        msg_error('Địa chỉ email đã tồn tại', '', 1000);
    }
    if($Users->num_rows_by_id(" `ip` = '".myip()."' ") > 5)
    {
        msg_error('Bạn đã đạt giới hạn tạo tài khoản', '', 1000);
    }
    $create = $Users->add_new(array(
        'username' => $username,
        'password' => TypePassword($password),
        'email'    => $email,
        'token'    => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
        'money'    => 0,
        'ref'      => $_SESSION['ref'],
        'banned'   => 0,
        'ip'       => myip(),
        'time'     => time(),
        'createdate' => gettime()
    ));
    if ($create)
    {   
        $_SESSION['username'] = $username;
        msg_success('Tạo tài khoản thành công', BASE_URL('Auth/Login'), 1000);
    }
    else
    {
        msg_error('Vui lòng kiểm tra cấu hình DATABASE', '', 3000);
    }
}