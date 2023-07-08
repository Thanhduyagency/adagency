<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DANH SÁCH KHIẾU NẠI</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH KHIẾU NẠI
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>MÃ GD</th>
                                        <th width="30%">TÀI KHOẢN</th>
                                        <th>LÝ DO</th>
                                        <th>THỜI GIAN</th>
                                        <th>TRẢ LỜI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $reports = new reports;
                                    foreach($reports->get_list_by_id(" `shop` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['username'];?></td>
                                        <td><a href="<?=BASE_URL("Admin/Order/".$row['code']);?>"><?=$row['code'];?></a>
                                        </td>
                                        <td><?=$row['taikhoan'];?></td>
                                        <td><?=$row['lydo'];?></td>
                                        <td><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                        <td><?=$row['ghichu'];?></td>
                                        <td><button type="button" data-toggle="modal"
                                                data-target="#edit<?=$row['id'];?>" class="btn bg-black"><i
                                                    class="material-icons">mode_edit</i>
                                                <span>EDIT</span></button></td>
                                    </tr>
                                    <div class="modal fade" id="edit<?=$row['id'];?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">EDIT REPORT
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Lý
                                                                do:</label>
                                                            <div class="form-line">
                                                                <textarea class="form-control"
                                                                    readonly><?=$row['lydo'];?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Tài khoản
                                                                cần báo cáo:</label>
                                                            <div class="form-line">
                                                                <textarea class="form-control"
                                                                    readonly><?=$row['taikhoan'];?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Phản
                                                                hồi:</label>
                                                            <div class="form-line">
                                                                <textarea class="form-control"
                                                                    name="ghichu"><?=$row['ghichu'];?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?=$row['id'];?>">
                                                        <button type="button" class="btn btn-danger waves-effect"
                                                            data-dismiss="modal"><i
                                                                class="material-icons">arrow_back</i><span>ĐÓNG</span></button>
                                                        <button type="submit" name="btnSaveReport"
                                                            class="btn btn-primary waves-effect"><i
                                                                class="material-icons">save</i><span>XÁC
                                                                NHẬN</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>MÃ GD</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>LÝ DO</th>
                                        <th>THỜI GIAN</th>
                                        <th>TRẢ LỜI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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