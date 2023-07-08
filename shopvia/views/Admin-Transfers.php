<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LỊCH SỬ CHUYỂN TIỀN THÀNH VIÊN</h2>
        </div>
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LỊCH SỬ CHUYỂN TIỀN THÀNH VIÊN
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>NGƯỜI CHUYỂN</th>
                                        <th>NGƯỜI NHẬN</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN</th>
                                        <th>LÝ DO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `chuyentien` WHERE `nguoichuyen` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['nguoichuyen'];?></td>
                                        <td><?=$row['nguoinhan'];?></td>
                                        <td><?=format_cash($row['sotien']);?></td>
                                        <td><span class="badge badge-dark px-3"><?=$row['thoigian'];?></span></td>
                                        <td><?=$row['lydo'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>NGƯỜI CHUYỂN</th>
                                        <th>NGƯỜI NHẬN</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN</th>
                                        <th>LÝ DO</th>
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