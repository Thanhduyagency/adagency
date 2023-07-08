<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GIFTCODE</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            NHẬP MÃ QUÀ TẶNG
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giftcode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="code" placeholder="Nhập mã quà tặng của bạn"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect">
                                <i class="material-icons">card_giftcard</i><span>SỬ DỤNG NGAY</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LỊCH SỬ SỬ DỤNG GIFTCODE
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>GIFTCODE</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN SỬ DỤNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `giftcode` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><b><?=$row['code'];?></b></td>
                                        <td><?=format_cash($row['sotien']);?></td>
                                        <td><span class="badge badge-danger"><?=$row['capnhat'];?></span></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>GIFTCODE</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN SỬ DỤNG</th>
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