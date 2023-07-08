<?php
if(isset($_POST['btnSubmit']) && isset($_POST['dichvu']) && isset($_POST['loai']) && isset($_POST['gia']) && $getUser['level'] == 'admin')
{
    if($getUser['level'] != 'admin')
    {
        msg_error('Chức năng này chỉ dành cho Admin.', '', 2000);
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
    $create = $dv->add_new(array(
        'username' => $getUser['username'],
        'dichvu' => $dichvu,
        'gia' => $gia,
        'loai' => $loai,
        'thoigian' => gettime(),
        'mota' => $mota,
        'mua_toi_da' => $mua_toi_da,
        'display' => 'SHOW'
    ));
    if($create)
    {
        $logs = new logs;
        $logs->add_new(array(
            'username' => $getUser['username'],
            'content' => 'Tạo dịch vụ '.$dichvu,
            'createdate' => gettime()
        ));
        msg_success("Tạo dịch vụ thành công", BASE_URL('Admin/Services'), 1000);
    }
    else
    {
        msg_error("Không thể thêm dịch vụ, vui lòng thử lại sau.", "", 2000);
    }
}