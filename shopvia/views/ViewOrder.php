<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CHI TIẾT ĐƠN HÀNG #<?=$row['code'];?></h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH TÀI KHOẢN
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">STT</th>
                                        <th>CHI TIẾT</th>
                                        <th width="30%">THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $taikhoan = new taikhoan;
                                    foreach($taikhoan->get_list_by_id(" `code` = '".$row['code']."' ORDER BY id DESC ") as $row1){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td id="coypy<?=$row1['id'];?>"><?=$row1['chitiet'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-info copy"
                                                data-clipboard-target="#coypy<?=$row1['id'];?>"><i
                                                    class="material-icons">content_copy</i>
                                                <span>COPY</span></button>
                                            <button type="button" data-toggle="modal" data-target="#bug<?=$row1['id'];?>"
                                                class="btn btn-danger"><i
                                                    class="material-icons">report</i><span>BÁO LỖI</span></button>
                                            <?php if($row['loai'] == "FB" || $row['loai'] == 'FACEBOOK'){  ?>
                                            <a type="button" target="_blank"
                                                href="<?=BASE_URL('backup/'.explode("|", $row1['chitiet'])[0].'.zip');?>"
                                                class="btn bg-teal waves-effect"><i class="material-icons">file_download</i>
                                                <span>
                                                    TẢI BACKUP
                                                </span>
                                            </a>
                                            <?PHP }?>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="bug<?=$row1['id'];?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">KHIẾU NẠI ĐƠN HÀNG
                                                    </h5>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Lý
                                                                do:</label>
                                                            <div class="form-line">
                                                                <textarea class="form-control" name="lydo"
                                                                    required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Tài khoản
                                                                cần báo cáo:</label>
                                                            <div class="form-line">
                                                                <textarea class="form-control no-resize" name="taikhoan"
                                                                    readonly><?=$row1['chitiet'];?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">ĐÓNG</button>
                                                        <input type="hidden" name="id" value="<?=$row1['id'];?>">
                                                        <button type="submit" name="btnReport"
                                                            class="btn btn-primary">GỬI BÁO CÁO</button>
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
                                        <th>CHI TIẾT</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>