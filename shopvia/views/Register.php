<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="<?=BASE_URL('');?>"><b><?=$CMSNT->site('tenweb');?></b></a>
            <small><?=$CMSNT->site('mota');?></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Đăng ký thành viên mới</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập"
                                required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email"
                                required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" name="password" minlength="6"
                                placeholder="Nhập mật khẩu" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="repassword" minlength="6"
                                placeholder="Nhập lại mật khẩu" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink" required>
                        <label for="terms">Chấp nhận <a href="javascript:void(0);" type="button"  data-toggle="modal" data-target="#dieukhoan">điều khoản</a> của chúng tôi.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="btnRegister" type="submit">SIGN
                        UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?=BASE_URL('Auth/Login');?>">Bạn đã có tài khoản?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="dieukhoan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ĐIỀU KHOẢN SỬ DỤNG</h5>
                </div>
                <div class="modal-body">
                    <?=$CMSNT->site('chinhsach');?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ĐÓNG</button>
                </div>
            </div>
        </div>
    </div>