<?php

$users = new Users;
$tong_thanh_vien = $users->num_rows_by_id(" `username` IS NOT NULL ");
$so_du_toan_thanh_vien = $CMSNT->get_row(" SELECT SUM(`money`) FROM `users` ")['SUM(`money`)'];
$orders = new orders;
$tong_don_hang = $orders->num_rows_by_id(" `username` IS NOT NULL ");
$taikhoan = new taikhoan;
$tai_khoan_da_ban = $taikhoan->num_rows_by_id(" `code` IS NOT NULL ");
$tai_khoan_dang_ban = $taikhoan->num_rows_by_id(" `code` IS NULL AND `trangthai` = 'live' ");
$tai_khoan_die = $taikhoan->num_rows_by_id(" `code` IS NULL AND `trangthai` = 'die' ");
$tai_khoan_bi_khieu_nai = $CMSNT->num_rows("SELECT DISTINCT `taikhoan` FROM `reports` ");
$doanh_thu_today = $CMSNT->get_row("SELECT SUM(`sotien`) FROM `orders` WHERE `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`sotien`)'];
$don_hang_today = $orders->num_rows_by_id(" `username` IS NOT NULL AND `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY ");
$nap_tien_bank_today = $CMSNT->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'];
$nap_tien_momo_today = $CMSNT->get_row("SELECT SUM(`amount`) FROM `momo` WHERE `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'];
$nap_tien_card_today = $CMSNT->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`thucnhan`)'];
$tong_nap_today = $nap_tien_bank_today + $nap_tien_momo_today + $nap_tien_card_today;