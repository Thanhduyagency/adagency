<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DANH SÁCH ĐƠN HÀNG</h2>
        </div>
        <!-- CMSNT.CO -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH ĐƠN HÀNG
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GD</th>
                                        <th>NGƯỜI MUA</th>
                                        <th>DỊCH VỤ</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>THANH TOÁN</th>
                                        <th>LOẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $orders = new orders;
                                    foreach($orders->get_list_by_id(" `username` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['code'];?></td>
                                        <td><b><?=$row['username'];?></b></td>
                                        <td><?=$row['dichvu'];?></td>
                                        <td><?=format_cash($row['soluong']);?></td>
                                        <td><?=format_cash($row['sotien']);?></td>
                                        <td><?=display_loai($row['loai']);?></td>
                                        <td><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                        <td>
                                            <form action="" method="POST">
                                                <a type="button" href="<?=BASE_URL('Admin/Order/');?><?=$row['code'];?>"
                                                    class="btn btn-info"><i class="material-icons">search</i>
                                                    <span>XEM NGAY</span></a>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GD</th>
                                        <th>NGƯỜI MUA</th>
                                        <th>DỊCH VỤ</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>THANH TOÁN</th>
                                        <th>LOẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            Hỗ trợ cấu hình website vui lòng liên hệ Zalo 0947838128 | Facebook: <a
                href="https://www.facebook.com/ntgtanetwork/" target="_blank">FB.COM/NTGTANETWORK</a> | CMSNT.CO
        </div>
    </div>
</section>