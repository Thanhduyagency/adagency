<?php 
if(isset($_GET['id']))
{
    $dichvu = new dichvu;
    $row = $dichvu->get_row_by_id(" `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 500);
    }
}
else
{
    msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 0);
}

if(isset($_GET['id']) && isset($_GET['delete']))
{
    $dichvu = check_string($_GET['id']);
    $taikhoan = new taikhoan;
    $delete = check_string($_GET['delete']);
    if($taikhoan->num_rows_by_id(" `dichvu` = '$dichvu' ") == 0)
    {
        msg_error("Tài khoản này không tồn tại trong hệ thống", BASE_URL("Admin/XemClone/".$dichvu), 1000);
    }
    $taikhoan->delete_by_id($delete);
    msg_success("Xóa thành công", BASE_URL("Admin/XemClone/".$dichvu), 300);
}