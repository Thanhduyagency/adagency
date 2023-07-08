<?php 
    require_once("../config/config.php");
    require_once("../class/verifyEmaill.php");
    require_once("../config/function.php");
    require_once("../class/class.php");

    if(isset($_POST['value']) && isset($_POST['dichvu']) )
    {
        if(!isset($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập để thực hiện giao dịch.", BASE_URL("Auth/Login"), 1000);
        }
        $dichvu = check_string($_POST['dichvu']);
        $value = check_string($_POST['value']);
        $dv = new dichvu;
        $taikhoan = new taikhoan;
        $row = $dv->get_row_by_id(" `id` = '$dichvu' ");
        $loai = $row['loai'];
        $ten_dv = $row['dichvu'];
        $token = $getUser['token'];
        if(!$row)
        {
            msg_error2("Dịch vụ không hợp lệ");
        }
        if($row['display'] != 'SHOW')
        {
            msg_error2("Dịch vụ này không khả dụng");
        }
        if($value <= 0)
        {
            msg_error2("Số lượng mua không phù hợp");
        }
        if($value > $row['mua_toi_da'])
        {
            msg_error2("Số lượng tối đa 1 lần là ".$row['mua_toi_da']);
        }
        if($taikhoan->num_rows_by_id(" `dichvu` = '$dichvu' AND `trangthai` = 'LIVE' AND `code` IS NULL ") < $value)
        {
            msg_error2("Số lượng trong hệ thống không đủ");
        }
        $giatien = $row['gia'] * $value;
        $giatien = $giatien - $giatien * $getUser['chietkhau'] / 100;
        if($getUser['money'] < $giatien)
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm");
        }
        if($row['loai'] == 'FACEBOOK'){
            $data = $taikhoan->get_list_by_id(" `dichvu` = '$dichvu' AND `code` IS NULL AND `trangthai` = 'LIVE' ");
            $i = 0;
            foreach($data as $row1)
            {
                if($i < $value)
                {
                    $tk = explode("|", $row1['chitiet']);
                    if(CheckLiveClone($tk[0]) == 'DIE')
                    {
                        $taikhoan->update_by_id(array(
                            'trangthai' => 'DIE'
                        ), $row1['id']);
                    }
                    else
                    {
                        $i++;
                    }
                }
                else
                {
                    break;
                }
            }
        }
        else if($row['loai'] == 'GMAIL'){
            $data = $taikhoan->get_list_by_id(" `dichvu` = '$dichvu' AND `code` IS NULL AND `trangthai` = 'LIVE' ");
            $i = 0;
            foreach($data as $row1)
            {
                if($i < $value)
                {
                    $tk = explode("|", $row1['chitiet']);
                    if(CheckLiveEmail($tk[0]) == 'DIE')
                    {
                        $taikhoan->update_by_id(array(
                            'trangthai' => 'DIE'
                        ), $row1['id']);
                    }
                    else
                    {
                        $i++;
                    }
                }
                else
                {
                    break;
                }
            }
        }
        else{
            $i = $value;
        }
        if($i >= $value)
        {
            if($getUser['money'] < $giatien)
            {
                msg_error2("Số dư không đủ vui lòng nạp thêm");
            }
            /* TRỪ TIỀN USER */
            /*$isCheckMoney = $CMSNT->update("users", array(
                'money' => $getUser['money'] - $giatien
            ), " `id` = '".$getUser['id']."' ");*/
            $isCheckMoney = $CMSNT->query(" UPDATE `users` SET `money` = `money` - '$giatien' WHERE `username` = '".$getUser['username']."' ");
            if($isCheckMoney)
            {
                $getMoneyUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `token` = '".$token."' ")['money'];
                if ($getMoneyUser < 0)
                {
                    msg_error("Tài khoản của bạn đã bị chấm dứt vì sử dụng BUG!", "", 2000);
                }
                $ma_giaodich = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                /* CẬP NHẬT DÒNG TIỀN */
                $CMSNT->insert("dongtien", array(
                    'sotientruoc' => $getUser['money'],
                    'sotienthaydoi' => $giatien,
                    'sotiensau' => $getUser['money'] - $giatien,
                    'thoigian' => gettime(),
                    'noidung' => 'Thanh toán đơn hàng (#'.$ma_giaodich.')',
                    'username' => $getUser['username']
                ));
                /* GHI LOG */
                $logs = new logs;
                $logs->add_new(array(
                    'username' => $getUser['username'],
                    'content' => 'Thực hiện mua tài khoản: '.$ten_dv,
                    'createdate' => gettime()
                ));

                /* CẬP NHẬT CLONE */
                $CMSNT->update_value("taikhoan", array(
                    'code' => $ma_giaodich
                ), " `dichvu` = '$dichvu' AND `code` IS NULL AND `trangthai` = 'LIVE'", $value); 
                /* TẠO ĐƠN HÀNG */
                $order = new orders;
                $order->add_new(array(
                    'code' => $ma_giaodich,
                    'username' => $_SESSION['username'],
                    'seller' => $row['username'],
                    'dichvu' => $ten_dv,
                    'loai' => $loai,
                    'soluong' => $value,
                    'sotien' => $giatien,
                    'ip'    => myip(),
                    'thoigian' => gettime(),
                    'time'  => time()
                ));
                msg_success("Giao dịch thành công!", BASE_URL("Order/".$ma_giaodich), 1000);
            }
            else
            {
                msg_error2("Số dư không đủ");
            }
            
        }
        else
        {
            msg_error2("Số lượng tài khoản trong hệ thống không đủ");
        }
    }