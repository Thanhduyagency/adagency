<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CẤU HÌNH</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CẤU HÌNH WEBSITE
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenweb" value="<?=$CMSNT->site('tenweb');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="mota" value="<?=$CMSNT->site('mota');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Từ khóa tìm kiếm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tukhoa" value="<?=$CMSNT->site('tukhoa');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Logo website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="logo" value="<?=$CMSNT->site('logo');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Favicon website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="favicon" value="<?=$CMSNT->site('favicon');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh giới thiệu website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="anhbia" value="<?=$CMSNT->site('anhbia');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Màu website</label>
                                <div class="col-sm-9">
                                    <div class="colorpicker">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="theme_color"
                                                value="<?=$CMSNT->site('theme_color');?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Template Home</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="theme_home" required>
                                        <option value="<?=$CMSNT->site('theme_home');?>">TEMPLATE
                                            <?=$CMSNT->site('theme_home');?></option>
                                        <option value="0">TEMPLATE 0</option>
                                        <option value="1">TEMPLATE 1</option>
                                        <option value="2">TEMPLATE 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Website</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="baotri" required>
                                        <option value="<?=$CMSNT->site('baotri');?>"><?=$CMSNT->site('baotri');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF 10 Lịch Sử Giao Dịch Gần Đây</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="stt_giao_dich_gan_day" required>
                                        <option value="<?=$CMSNT->site('stt_giao_dich_gan_day');?>"><?=$CMSNT->site('stt_giao_dich_gan_day');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Nạp Thẻ [<a href="https://doithe24h.net/" target="_blank">DOITHE24H.NET</a>]</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_card" value="<?=$CMSNT->site('api_card');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chiết Khấu Nạp Thẻ</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="ck_card" placeholder="Nhập chiết khấu thực nhận khi nạp thẻ cào" value="<?=$CMSNT->site('ck_card');?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Bank Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_bank" value="<?=$CMSNT->site('api_bank');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Momo Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_momo" value="<?=$CMSNT->site('api_momo');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Config Email SMTP</label>
                                <div class="col-sm-9">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                        placeholder="Nhập Email liên kết ví MOMO" name="email"
                                                        value="<?=$CMSNT->site('email');?>" placeholder="col-sm-6" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control"
                                                        placeholder="Nhập mật khẩu Email" name="pass_email"
                                                        value="<?=$CMSNT->site('pass_email');?>"
                                                        placeholder="col-sm-6" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lưu ý nạp tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control h-150px" name="luuy_naptien"
                                            rows="6"><?=$CMSNT->site('luuy_naptien');?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nội dung nạp tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="noidung_naptien"
                                            value="<?=$CMSNT->site('noidung_naptien');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chiếu khấu đại lý</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="ck_daily" value="<?=$CMSNT->site('ck_daily');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thông báo</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control h-150px" name="thongbao"
                                            rows="6"><?=$CMSNT->site('thongbao');?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chính Sách Đăng Ký</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control h-150px" name="chinhsach"
                                            rows="6"><?=$CMSNT->site('chinhsach');?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn bg-black btn-block waves-effect"><i
                                    class="material-icons">save</i>
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            Hỗ trợ cấu hình website vui lòng liên hệ Zalo 0983699291 | Facebook: <a
                href="https://www.facebook.com/hoang.an.ytb/" target="_blank">FB.COM/HOANG.AN.YTB</a> | ANORI.COM.VN
        </div>
    </div>
</section>

<!-- Bootstrap Colorpicker Js -->
<script src="<?=BASE_URL('template');?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script>
$('.colorpicker').colorpicker();
</script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('luuy_naptien');
CKEDITOR.replace('thongbao');
CKEDITOR.replace('chinhsach');
</script>