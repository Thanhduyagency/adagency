<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="<?=BASE_URL('');?>"><b><?=$CMSNT->site('tenweb');?></b></a>
            <small><?=$CMSNT->site('mota');?></small>
        </div>
        <div class="card">
            <div class="body">
                <form action="" method="POST">
                    <div class="msg">Quên mật khẩu</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email" required
                                autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">XÁC MINH</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?=BASE_URL('Auth/Register');?>">Đăng Ký Ngay!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?=BASE_URL('Auth/Login');?>">Đăng Nhập Ngay!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
