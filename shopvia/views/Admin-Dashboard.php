<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG ĐƠN HÀNG</div>
                        <div class="number count-to"><?=format_cash($tong_don_hang);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-indigo">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG THÀNH VIÊN</div>
                        <div class="number count-to"><?=$tong_thanh_vien;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-purple">
                        <i class="material-icons">account_balance</i>
                    </div>
                    <div class="content">
                        <div class="text">TỔNG SỐ DƯ</div>
                        <div class="number count-to"><?=format_cash($so_du_toan_thanh_vien);?>đ</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-deep-purple">
                        <i class="material-icons">shopping_basket</i>
                    </div>
                    <div class="content">
                        <div class="text">TÀI KHOẢN ĐÃ BÁN</div>
                        <div class="number count-to"><?=format_cash($tai_khoan_da_ban);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-pink">
                        <i class="material-icons">add_shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">TÀI KHOẢN ĐANG BÁN</div>
                        <div class="number count-to"><?=format_cash($tai_khoan_dang_ban);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-blue">
                        <i class="material-icons">beenhere</i>
                    </div>
                    <div class="content">
                        <div class="text">TÀI KHOẢN DIE</div>
                        <div class="number count-to"><?=format_cash($tai_khoan_die);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-light-blue">
                        <i class="material-icons">report</i>
                    </div>
                    <div class="content">
                        <div class="text">TÀI KHOẢN BỊ KHIẾU NẠI</div>
                        <div class="number count-to"><?=format_cash($tai_khoan_bi_khieu_nai);?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-cyan">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">DOANH THU BÁN HÀNG HÔM NAY</div>
                        <div class="number count-to"><?=format_cash($doanh_thu_today);?>đ</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-teal">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="content">
                        <div class="text">ĐƠN HÀNG HÔM NAY</div>
                        <div class="number count-to"><?=format_cash($don_hang_today);?></div>
                    </div>
                </div>
            </div>
            <!-- Answered Tickets -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-red">
                        <div class="font-bold m-b--35">TIỀN NẠP HÔM NAY</div>
                        <ul class="dashboard-stat-list">
                            <li>
                                NGÂN HÀNG TỰ ĐỘNG
                                <span class="pull-right"><b><?=format_cash($nap_tien_bank_today);?></b> <small>đ</small></span>
                            </li>
                            <li>
                                MOMO TỰ ĐỘNG
                                <span class="pull-right"><b><?=format_cash($nap_tien_momo_today);?></b> <small>đ</small></span>
                            </li>
                            <li>
                                THẺ CÀO TỰ ĐỘNG
                                <span class="pull-right"><b><?=format_cash($nap_tien_card_today);?></b> <small>đ</small></span>
                            </li>
                            <li>
                                TỔNG
                                <span class="pull-right" style="font-size:25px;"><b><?=format_cash($tong_nap_today);?></b> <small>đ</small></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Answered Tickets -->
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        LỊCH SỬ DÒNG TIỀN
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>USERNAME</th>
                                    <th>SỐ TIỀN TRƯỚC</th>
                                    <th>SỐ TIỀN THAY ĐỔI</th>
                                    <th>SỐ TIỀN HIỆN TẠI</th>
                                    <th>THỜI GIAN</th>
                                    <th>NỘI DUNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $user = new users;
                                    $dongtien = new DongTien;
                                    foreach($dongtien->get_list_by_id(" `username` IS NOT NULL ORDER BY id DESC ") as $row){
                                        $get_id  = $user->get_row_by_id(" `username` = '".$row['username']."' ")['id'];
                                    ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><a type="button" href="<?=BASE_URL('Admin/User/Edit/');?><?=$get_id;?>"
                                            class="btn bg-black"><span><?=$row['username'];?></span></a></td>
                                    <td><?=format_cash($row['sotientruoc']);?></td>
                                    <td><?=format_cash($row['sotienthaydoi']);?></td>
                                    <td><?=format_cash($row['sotiensau']);?></td>
                                    <td><span class="badge badge-dark px-3"><?=$row['thoigian'];?></span></td>
                                    <td><?=$row['noidung'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>USERNAME</th>
                                    <th>SỐ TIỀN TRƯỚC</th>
                                    <th>SỐ TIỀN THAY ĐỔI</th>
                                    <th>SỐ TIỀN HIỆN TẠI</th>
                                    <th>THỜI GIAN</th>
                                    <th>NỘI DUNG</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        NHẬT KÝ HOẠT ĐỘNG
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>USERNAME</th>
                                    <th>HÀNH ĐỘNG</th>
                                    <th>THỜI GIAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $logs = new logs;
                                    $user = new users;
                                    foreach($logs->get_list_by_id(" `username` IS NOT NULL ORDER BY id DESC ") as $row){
                                        $get_id  = $user->get_row_by_id(" `username` = '".$row['username']."' ")['id'];
                                    ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><a type="button" href="<?=BASE_URL('Admin/User/Edit/');?><?=$get_id;?>"
                                            class="btn bg-black"><span><?=$row['username'];?></span></a></td>
                                    <td><?=$row['content'];?></td>
                                    <td><span class="badge badge-dark px-3"><?=$row['createdate'];?></span></td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>USERNAME</th>
                                    <th>HÀNH ĐỘNG</th>
                                    <th>THỜI GIAN</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-danger">
            Hỗ trợ cấu hình website vui lòng liên hệ Zalo 0983699291 | Facebook: <a
                href="https://www.facebook.com/hoang.an.ytb/" target="_blank">FB.COM/HOANG.AN.YTB</a> | ANORI.COM.VN
        </div>
    </div>
</section>


<script src="<?=BASE_URL('template/'.$theme);?>/js/pages/widgets/infobox/infobox-1.js"></script>