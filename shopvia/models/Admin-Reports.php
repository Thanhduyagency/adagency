<?php
if(isset($_SESSION['username']) && isset($_POST['btnSaveReport']) && isset($_POST['id']) && $getUser['level'] == 'admin')
{
    $id = check_string($_POST['id']);
    $ghichu = check_string($_POST['ghichu']);
    $reports = new reports;
    $row = $reports->get_row_by_id(" `id` = '$id' ");
    if(!$row['id'])
    {
        msg_error("Không hợp lệ", "", 1000);
    }
    $reports->update_by_id(array(
        'ghichu' => $ghichu
    ), $id);
    msg_success("Lưu thành công", "", 1000);

}
