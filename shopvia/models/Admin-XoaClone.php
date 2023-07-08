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

if(isset($_POST['btnSubmit']) && isset($_POST['list']) && isset($_GET['id']) )
{
    $value = 0;
    if($getUser['level'] != 'admin')
    {
        msg_error('Chức năng này chỉ dành cho Admin.', '', 2000);
    }
    $row = $dichvu->get_row_by_id(" `id` = '".check_string($_GET['id'])."' AND `username` = '".$getUser['username']."' ");
    if(!$row)
    {
        msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 500);
    }
    $list = check_string($_POST['list']);
    $list = explode(PHP_EOL, $list);
    foreach($list as $clone)
    {
        $create = $CMSNT->remove("taikhoan", " `chitiet` = '$clone' ");
        if($create)
        {
            $value++;
        }
    }
    $logs = new logs;
    $logs->add_new(array(
        'username' => $getUser['username'],
        'content' => 'Xóa tài khoản dịch vụ '.$row['dichvu'],
        'createdate' => gettime()
    ));
    msg_success("Xóa thành công ".$value." tài khoản", "", 1000);
}