<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LỊCH SỬ KHIẾU NẠI</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LỊCH SỬ KHIẾU NẠI
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GD</th>
                                        <th width="30%">TÀI KHOẢN</th>
                                        <th>LÝ DO</th>
                                        <th>THỜI GIAN</th>
                                        <th>TRẢ LỜI</th>
                                        <th>GHI CHÚ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $reports = new reports;
                                    foreach($reports->get_list_by_id(" `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><a href="<?=BASE_URL("Order/".$row['code']);?>"><?=$row['code'];?></a></td>
                                        <td><?=$row['taikhoan'];?></td>
                                        <td><?=$row['lydo'];?></td>
                                        <td><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                        <td><?=$row['ghichu'];?></td>
                                        <td><?=$row['ghichu'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GD</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>LÝ DO</th>
                                        <th>THỜI GIAN</th>
                                        <th>TRẢ LỜI</th>
                                        <th>GHI CHÚ</th>
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