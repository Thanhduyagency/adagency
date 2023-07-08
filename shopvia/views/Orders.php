<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ĐƠN HÀNG</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LỊCH SỬ ĐƠN HÀNG
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GD</th>
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
                                    foreach($orders->get_list_by_id(" `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['code'];?></td>
                                        <td><?=$row['dichvu'];?></td>
                                        <td><?=format_cash($row['soluong']);?></td>
                                        <td><?=format_cash($row['sotien']);?>đ</td>
                                        <td><?=display_loai($row['loai']);?></td>
                                        <td><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                        <td>
                                            <form action="" method="POST">
                                                <a type="button" href="<?=BASE_URL('Order/');?><?=$row['code'];?>"
                                                    class="btn btn-info"><i class="material-icons">search</i>
                                                    <span>XEM NGAY</span></a>

                                                <a type="button"
                                                    href="<?=BASE_URL('file/index.php?DownloadFile=True&code='.$row['code']);?>"
                                                    target="_blank" class="btn btn-danger"><i class="material-icons">file_download</i>
                                                    <span>TẢI VỀ</span></a>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GD</th>
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
    </div>
</section>