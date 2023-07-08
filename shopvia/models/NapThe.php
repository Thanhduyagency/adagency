<?php
/*MÃ NGUỒN ĐƯỢC PHÁT TRIỂN BỞI CMSNT.CO DEV NTTHANH - LH ZALO 0947838128*/
if(isset($_SESSION['username']) && isset($_POST['loaithe']) && isset($_POST['menhgia']) && isset($_POST['seri']) && isset($_POST['pin']) )
{
    $loaithe = check_string($_POST['loaithe']);
    $menhgia = check_string($_POST['menhgia']);
    $seri = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);
    $code = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 32);
    $thucnhan = $menhgia - $menhgia * $CMSNT->site('ck_card') / 100;

    if (strlen($seri) < 5 || strlen($pin) < 5)
    {
        msg_error("Mã thẻ hoặc seri không đúng định dạng!", '', 1000);
    }
    $data = card24h($loaithe, $menhgia, $seri, $pin, $code);
    if (isset($data['data']))
    {
        if ($data['data']['status'] == 'error')
        {
            msg_error($data['data']['msg'], '', 1000);
        }
        else if ($data['data']['status'] == 'success')
        {
            $cards = new cards;
            $cards->add_new(array(
                'code' => $code,
                'seri' => $seri,
                'pin'  => $pin,
                'loaithe' => $loaithe,
                'menhgia' => $menhgia,
                'thucnhan' => $thucnhan,
                'username' => $getUser['username'],
                'status' => 'xuly',
                'note' => '',
                'createdate' => gettime()
            ));

            msg_success("Gửi thẻ thành công, vui lòng đợi kết quả", "", 2000);
        }
    }
    else
    {
        msg_error("Không thể nhập dữ liệu vào API", "", 2000);
    }

}