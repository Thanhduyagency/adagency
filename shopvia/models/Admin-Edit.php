<?php 
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $dichvu = new dichvu;
    $row = $dichvu->get_row_by_id(" `id` = '".check_string($_GET['id'])."' AND `username` = '".$getUser['username']."' ");
    if(!$row)
    {
        msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 500);
    }
}
else
{
    msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 0);
}

if( isset($_POST['btnSubmit']) && isset($_POST['dichvu']) && isset($_POST['loai']) && isset($_POST['gia']) )
{
    if($getUser['level'] != 'admin')
    {
        msg_error('Chức năng này chỉ dành cho Admin.', '', 1000);
    }
    $row = $dichvu->get_row_by_id(" `id` = '".check_string($_GET['id'])."' AND `username` = '".$getUser['username']."' ");
    if(!$row)
    {
        msg_error("Dịch vụ không hợp lệ", BASE_URL(''), 500);
    }
    $mua_toi_da = check_string($_POST['mua_toi_da']);
    if($mua_toi_da <= 0)
    {
        msg_error("Số lượng mua tối đa không hợp lệ", '', 1000);
    }
    $dichvu = check_string($_POST['dichvu']);
    $loai = check_string($_POST['loai']);
    $gia = check_string($_POST['gia']);
    $mota = check_string($_POST['mota']);
    $dv = new dichvu;
    $display = check_string($_POST['display']);
    $create = $dv->update_by_id(array(
        'dichvu' => $dichvu,
        'gia' => $gia,
        'loai' => $loai,
        'capnhat' => gettime(),
        'mota' => $mota,
        'mua_toi_da' => $mua_toi_da,
        'display' => $display
    ), check_string($_GET['id']));
    if($create)
    {
        $logs = new logs;
        $logs->add_new(array(
            'username' => $getUser['username'],
            'content' => 'Chỉnh sửa dịch vụ '.$dichvu,
            'createdate' => gettime()
        ));
        msg_success("Thay đổi thông tin dịch vụ thành công", "", 1000);
    }
    else
    {
        msg_error("Không thể lưu, vui lòng thử lại sau.", "", 2000);
    }
}