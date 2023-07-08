<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GIFTCODE</h2>
        </div>
        <!-- CMSNT.CO -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TẠO MÃ QUÀ TẶNG
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giftcode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="code" placeholder="Nhập mã quà tặng cần tạo"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="sotien"
                                            placeholder="Nhập số tiền nhận được của mã này" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ghi chú</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control h-150px" placeholder="Nhập ghi chú nếu có"
                                            name="ghichu" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect">
                                <i class="material-icons">add</i><span>TẠO NGAY</span>
                            </button>
                            <a type="button" href="<?=BASE_URL('');?>" class="btn btn-danger btn-block waves-effect">
                                <i class="material-icons">arrow_back</i><span>TRỞ LẠI</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH MÃ QUÀ TẶNG
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>TÀI KHOẢN SỬ DỤNG</th>
                                        <th>GIFTCODE</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN TẠO</th>
                                        <th>THỜI GIAN SỬ DỤNG</th>
                                        <th>GHI CHÚ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `giftcode` WHERE `username` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['username'];?></td>
                                        <td><b><?=$row['code'];?></b></td>
                                        <td><?=format_cash($row['sotien']);?></td>
                                        <td><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                        <td><span class="badge badge-danger"><?=$row['capnhat'];?></span></td>
                                        <td><textarea class="form-control" readonly><?=$row['ghichu'];?></textarea></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>TÀI KHOẢN SỬ DỤNG</th>
                                        <th>GIFTCODE</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN TẠO</th>
                                        <th>THỜI GIAN SỬ DỤNG</th>
                                        <th>GHI CHÚ</th>
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