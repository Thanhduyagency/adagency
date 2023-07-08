<body class="theme-red">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar" style="background-color: <?=$CMSNT->site('theme_color');?>;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?=BASE_URL('');?>"><?=mb_strtoupper($CMSNT->site('tenweb'), 'UTF-8');?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                                class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php if(isset($_SESSION['username'])){ ?>
            <!-- User Info -->
            <div class="user-info" style="background:none;background-color: <?=$CMSNT->site('theme_color');?>;" >
                <div class="image">
                    <img src="<?=BASE_URL('template');?>/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=mb_strtoupper($getUser['username'], 'UTF-8');?></div>
                    <div class="email">SỐ DƯ: <?=format_cash($getUser['money']);?>đ</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?=BASE_URL('Auth/Profile');?>"><i class="material-icons">person</i>Hồ sơ</a></li>
                            <li><a href="<?=BASE_URL('Transfers');?>"><i class="material-icons">payment</i>Chuyển tiền</a></li>
                            <li><a href="<?=BASE_URL('Cash');?>"><i class="material-icons">monetization_on</i>Dòng tiền</a></li>
                            <li><a href="<?=BASE_URL('History');?>"><i class="material-icons">history</i>Nhật ký</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?=BASE_URL('Auth/Logout');?>"><i class="material-icons">input</i>Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">HOME</li>
                    <li class="active">
                        <a href="<?=BASE_URL('');?>">
                            <i class="material-icons">home</i>
                            <span>Trang Chủ</span>
                        </a>
                    </li>
                    <?php if(!isset($_SESSION['username'])){ ?>
                    <li>
                        <a href="<?=BASE_URL('Auth/Login');?>">
                            <i class="material-icons">perm_identity</i>
                            <span>Đăng Nhập</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Auth/Register');?>">
                            <i class="material-icons">perm_identity</i>
                            <span>Đăng Ký</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Auth/ForgotPassword');?>">
                            <i class="material-icons">cached</i>
                            <span>Quên Mật Khẩu</span>
                        </a>
                    </li>
                    <?php } else {?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>Nạp Tiền</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?=BASE_URL('Payment');?>" class="menu-toggle">
                                    <span>Nạp qua ngân hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL('NapThe');?>" class="menu-toggle">
                                    <span>Nạp thẻ cào</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Transfers');?>">
                            <i class="material-icons">payment</i>
                            <span>Chuyển Tiền</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Giftcode');?>">
                            <i class="material-icons">card_giftcard</i>
                            <span>Giftcode</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Orders');?>">
                            <i class="material-icons">shopping_cart</i>
                            <span>Lịch Sử Mua Hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Reports');?>">
                            <i class="material-icons">report</i>
                            <span>Lịch Sử Khiếu Nại</span>
                        </a>
                    </li>
                    <?php if($getUser['level'] == 'admin') { ?>
                    <li class="header">ADMIN</li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Dashboard');?>">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Add');?>">
                            <i class="material-icons">add_shopping_cart</i>
                            <span>Thêm Dịch Vụ</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Services');?>">
                            <i class="material-icons">format_list_bulleted</i>
                            <span>Danh Sách Dịch Vụ</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Users');?>">
                            <i class="material-icons">assignment_ind</i>
                            <span>Danh Sách Thành Viên</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Reports');?>">
                            <i class="material-icons">report_problem</i>
                            <span>Danh Sách Khiếu Nại</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Banks');?>">
                            <i class="material-icons">account_balance</i>
                            <span>Ngân Hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Giftcode');?>">
                            <i class="material-icons">card_giftcard</i>
                            <span>Giftcode</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Upload/Backup');?>">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Backup</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">history</i>
                            <span>Logs</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?=BASE_URL('Admin/Payments');?>">Lịch sử nạp tiền</a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL('Admin/Orders');?>">Lịch sử mua hàng</a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL('Admin/Transfers');?>">Lịch sử chuyển tiền</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=BASE_URL('Admin/Settings');?>">
                            <i class="material-icons">settings</i>
                            <span>Cấu Hình</span>
                        </a>
                    </li>
                    <?php }?>
                    <?php }?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="version">
                    <b>Version: </b> 1.0.3 - Developer by <a href="https://www.cmsnt.co/" target="_blank">CMSNT.CO</a>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>


    <?php
        if(isset($_SESSION['username']))
        {
            if($getUser['banned'] == 1)
            {
                session_destroy();
                msg_warning("Tài khoản của bạn đã bị khóa.", "", 5000);
            }
            if($getUser['level'] != 'admin')
            {
                if($CMSNT->site('baotri') == 'OFF')
                {
                    msg_warning("Hệ thống đang bảo trì định kỳ", "", 10000);
                }
            }
        }
        else
        {
            if($CMSNT->site('baotri') == 'OFF')
            {
                msg_warning("Hệ thống đang bảo trì định kỳ", "", 10000);
            }
        }

        
        
