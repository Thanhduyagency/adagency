<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>THÊM CLONE</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            THÊM CLONE
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dịch vụ</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['dichvu'];?>" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nhập danh sách tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control" name="list" rows="12"
                                            placeholder="1 dòng 1 tài khoản" required></textarea>
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
    </div>
</section>
