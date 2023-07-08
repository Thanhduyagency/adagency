<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="<?=BASE_URL('');?>"><b><?=$CMSNT->site('tenweb');?></b></a>
            <small><?=$CMSNT->site('mota');?></small>
        </div>
        <div class="card">
            <div class="body">
                <form action="" method="POST">
                    <div class="msg">Vui lòng đăng nhập</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required
                                autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Mât khẩu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Lưu mật khẩu</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="btnLogin" type="submit">LOGIN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?=BASE_URL('Auth/Register');?>">Đăng Ký Ngay!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?=BASE_URL('Auth/ForgotPassword');?>">Quên Mật Khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
