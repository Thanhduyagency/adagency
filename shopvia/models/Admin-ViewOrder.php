<?php 
if(isset($_GET['code']))
{
    $orders = new orders;
    $row = $orders->get_row_by_id(" `code` = '".check_string($_GET['code'])."'  ");
    if(!$row)
    {
        msg_error("Đơn hàng không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    msg_error("Đơn hàng không tồn tại", BASE_URL(''), 0);
}


