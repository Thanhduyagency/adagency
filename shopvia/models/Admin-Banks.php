<?php
if(isset($_GET['delete']) && $getUser['level'] == 'admin')
{
    $bank = new bank;
    $delete = check_string($_GET['delete']);
    $bank->delete_by_id($delete);
    msg_success("Xóa thành công", BASE_URL("Admin/Banks"), 300);
}
if(isset($_POST['btnThemNganHang']) && $getUser['level'] == 'admin') 
{
    $bank = new bank;
    $bank->add_new(array(
        'name' => check_string($_POST['name']),
        'stk' => check_string($_POST['stk']),
        'logo' => check_string($_POST['logo']),
        'bank_name' => check_string($_POST['bank_name']),
        'ghichu' => check_string($_POST['ghichu'])
    ));
    msg_success("Thêm thành công", '', 1000);
}
if(isset($_POST['btnSave']) && $getUser['level'] == 'admin') 
{
    $bank = new bank;
    $bank->update_by_id(array(
        'name' => check_string($_POST['name']),
        'stk' => check_string($_POST['stk']),
        'logo' => check_string($_POST['logo']),
        'bank_name' => check_string($_POST['bank_name']),
        'ghichu' => check_string($_POST['ghichu'])
    ), check_string($_POST['id']));

    msg_success("Lưu thành công", '', 1000);
}