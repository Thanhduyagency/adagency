<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>THÊM DỊCH VỤ</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            THÊM DỊCH VỤ
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dịch vụ</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="text" name="dichvu" placeholder="Tên dịch vụ" class="form-control" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="number" name="gia" placeholder="Đơn giá tài khoản" class="form-control" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mua tối đa 1 lần</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="number" name="mua_toi_da" placeholder="Nếu có check live khi mua thì nên để giới hạn 100 nick 1 lần" class="form-control" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phân loại</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="loai" required>
                                        <option value="">* Chọn loại dịch vụ</option>
                                        <?=loai();?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <textarea class="form-control h-150px" placeholder="Mô tả chi tiết dịch vụ, có thể sử dụng icon" name="mota" rows="6" required></textarea>
                                </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSubmit" class="btn btn-primary btn-block waves-effect">
                                <i class="material-icons">add</i><span>THÊM NGAY</span>
                            </button>
                            <a type="button" href="<?=BASE_URL('Admin/Services');?>" class="btn btn-danger btn-block waves-effect">
                                <i class="material-icons">arrow_back</i><span>TRỞ LẠI</span>
                            </a>
                        </form>
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


<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
//CKEDITOR.replace('mota');
</script>