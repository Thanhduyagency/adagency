<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CHUYỂN TIỀN</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            NHẬP THÔNG TIN CHUYỂN TIỀN
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tài khoản nhận tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="nguoinhan" placeholder="Nhập tên tài khoản nhận tiền"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số tiền cần chuyển</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="sotien" placeholder="Nhập số tiền cần chuyển"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lý do chuyển tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control h-150px"
                                            placeholder="Nhập lý do chuyển tiền nếu có" name="lydo" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect">
                                <i class="material-icons">payment</i><span>CHUYỂN NGAY</span>
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
                            LỊCH SỬ CHUYỂN TIỀN
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>NGƯỜI NHẬN</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN</th>
                                        <th>LÝ DO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `chuyentien` WHERE `nguoichuyen` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LỊCH SỬ NHẬN TIỀN
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>NGƯỜI CHUYỂN</th>
                                        <th>SỐ TIỀN</th>
                                        <th>THỜI GIAN</th>
                                        <th>LÝ DO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `chuyentien` WHERE `nguoinhan` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['nguoichuyen'];?></td>
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