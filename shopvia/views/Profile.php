<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>THÔNG TIN</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            THÔNG TIN CÁ NHÂN
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tài khoản:</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="readonly" class="form-control"
                                        value="<?=$getUser['username'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="readonly" class="form-control"
                                        value="<?=$getUser['email'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số dư</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="readonly" class="form-control"
                                        value="<?=format_cash($getUser['money']);?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thời gian đăng ký</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="readonly" class="form-control"
                                        value="<?=$getUser['createdate'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Người giới thiệu</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="readonly" class="form-control"
                                        value="<?=$getUser['ref'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nhập lại mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="password" name="repassword" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnChangeInfo" class="btn bg-black waves-effect">
                                <i class="material-icons">save</i>
                                <span>LƯU THÔNG TIN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>