<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT DỊCH VỤ</h2>
        </div>
        <!-- CMSNT.CO -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT DỊCH VỤ
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dịch vụ</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="text" name="dichvu" value="<?=$row['dichvu'];?>" class="form-control" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="number" name="gia" value="<?=$row['gia'];?>" class="form-control" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mua tối đa 1 lần</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="number" name="mua_toi_da" value="<?=$row['mua_toi_da'];?>" placeholder="Nếu có check live khi mua thì nên để giới hạn 100 nick 1 lần" class="form-control" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phân loại</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="loai" required>
                                        <option value="<?=$row['loai'];?>"><?=$row['loai'];?></option>
                                        <?=loai();?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                <div class="col-sm-9">
                                <div class="form-line">
                                    <textarea class="form-control h-150px" name="mota" rows="6" required><?=$row['mota'];?></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="display" required>
                                        <option value="<?=$row['display'];?>"><?=$row['display'];?></option>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnSubmit" class="btn btn-primary btn-block waves-effect">
                                <i class="material-icons">save</i><span>LƯU</span>
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
            Hỗ trợ cấu hình website vui lòng liên hệ Zalo 0983699291 | Facebook: <a
                href="https://www.facebook.com/hoang.an.ytb/" target="_blank">FB.COM/HOANG.AN.YTB</a> | ANORI.COM.VN
        </div>
    </div>
</section>


<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
//CKEDITOR.replace('mota');
</script>