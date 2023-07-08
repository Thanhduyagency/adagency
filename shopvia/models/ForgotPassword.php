<?php
if(isset($_POST['submit']) && isset($_POST['email']) )
{
    $email = check_string($_POST['email']);
    $users = new users;
    if (check_email($email) != True) 
    {
        msg_error('Vui lòng nhập địa chỉ email hợp lệ', '', 1000);
    }
    $row = $users->get_row_by_id(" `email` = '$email' ");
    if(!$row['email'])
    {
        msg_error('Địa chỉ email không tồn tại trong hệ thống', '', 1000);
    }
    $otp = random('0123456789', '6');
    $users->update_by_id(array(
        'otp' => $otp
    ), $row['id'] );
    $guitoi = $email;   
    $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
    $bcc = $CMSNT->site('tenweb');
    $hoten ='Client';
    $noi_dung = '<h3>Có ai đó vừa yêu cầu khôi phục lại mật khẩu bằng Email này, nếu là bạn vui lòng nhập mã xác minh phía dưới để xác minh tài khoản</h3>
    <table>
    <tbody>
    <tr>
    <td style="font-size:20px;">OTP:</td>
    <td><b style="color:blue;font-size:30px;">'.$otp.'</b></td>
    </tr>
    </tbody>
    </table>';
    sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
    msg_success('Vui lòng kiểm tra hòm thư', BASE_URL('Auth/ChangePassword'), 500);
}





