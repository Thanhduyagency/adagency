<?php 
if(isset($_GET['code']))
{
    $orders = new orders;
    $row = $orders->get_row_by_id(" `code` = '".check_string($_GET['code'])."' AND `username` = '".$getUser['username']."' ");
    if(!$row)
    {
        msg_error("Đơn hàng không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    msg_error("Đơn hàng không tồn tại", BASE_URL(''), 0);
}

if(isset($_GET['code']) && isset($_POST['btnReport']) && isset($_POST['taikhoan']) && isset($_POST['lydo']))
{
    $taikhoan = check_string($_POST['taikhoan']);
    $lydo = check_string($_POST['lydo']);
    $code = check_string($_GET['code']);
    $id = check_string($_POST['id']);

    $tk = new taikhoan;
    $row = $tk->get_row_by_id(" `id` = '$id' AND `code` = '$code' ");
    if(!$row['id'])
    {
        msg_error("Tài khoản không hợp lệ", "", 2000);
    }
    $order = new orders;
    $shop = $order->get_row_by_id(" `code` = '$code' ")['seller'];
    $reports = new reports;
    $reports->add_new(array(
        'username' => $getUser['username'],
        'dichvu' => $row['dichvu'],
        'taikhoan' => $taikhoan,
        'lydo' => $lydo,
        'trangthai' => 'xuly',
        'thoigian' => gettime(),
        'code' => $row['code'],
        'shop' => $shop
    ));
    
    msg_success("Báo cáo của bạn đã được gửi", BASE_URL("Reports"), 1000);
}
