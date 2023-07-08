<?php 
if(isset($_GET['id']))
{
    $dichvu = new dichvu;
    $row = $dichvu->get_row_by_id(" `id` = '".check_string($_GET['id'])."' ");
    if(!$row)
    {
        msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 500);
    }
}
else
{
    msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 0);
}

if(isset($_POST['btnSubmit']) && isset($_POST['list']) && isset($_GET['id']) )
{
    $value_add = 0;
    $value_update = 0;
    if($getUser['level'] != 'admin')
    {
        msg_error('Chức năng này chỉ dành cho Admin.', '', 1000);
    }
    $row = $dichvu->get_row_by_id(" `id` = '".check_string($_GET['id'])."' ");
    if(!$row)
    {
        msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 500);
    }
    $list = check_string($_POST['list']);
    $list = explode(PHP_EOL, $list);
    $taikhoan = new taikhoan;
    foreach($list as $clone)
    {
        if($taikhoan->num_rows_by_id(" `chitiet` = '$clone' ") == 0)
        {
            $isAdd = $taikhoan->add_new(array(
                'chitiet' => $clone,
                'dichvu' => check_string($_GET['id']),
                'trangthai' => 'LIVE'
            ));

            if($isAdd)
            {
                $value_add++;
            }
        }
        else
        {
            $row_taikhoan = $taikhoan->get_row_by_id(" `chitiet` = '$clone' ");
            $isUpdate = $taikhoan->update_by_id(array(
                'chitiet' => $clone,
                'dichvu' => check_string($_GET['id']),
                'trangthai' => 'LIVE'
            ), $row_taikhoan['id']);

            if($isUpdate)
            {
                $value_update++;
            }
        }
    }
    $logs = new logs;
    $logs->add_new(array(
        'username' => $getUser['username'],
        'content' => 'Thêm tài khoản vào dịch vụ '.$row['dichvu'],
        'createdate' => gettime()
    ));
    msg_success("Thêm ".$value_add." | Cập nhật ".$value_update." thành công", "", 3000);

}