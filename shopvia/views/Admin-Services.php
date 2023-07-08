<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DANH SÁCH DỊCH VỤ</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DANH SÁCH DỊCH VỤ
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>DỊCH VỤ</th>
                                        <th>GIÁ</th>
                                        <th>LOẠI</th>
                                        <th>HIỂN THỊ</th>
                                        <th>ĐÃ BÁN</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $dichvu = new dichvu;
                                    $taikhoan = new taikhoan;
                                    foreach($dichvu->get_list_by_id(" `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><b><?=$row['dichvu'];?></b></td>
                                        <td><span class="badge bg-pink"><?=format_cash($row['gia']);?></span></td>
                                        <td><?=display_loai($row['loai']);?></td>
                                        <td><?=display($row['display']);?></td>
                                        <td><span class="badge bg-orange"><?=format_cash($taikhoan->num_rows_by_id(" `dichvu` = '".$row['id']."' AND `code` IS NOT NULL "));?></span>
                                        </td>
                                        <td>
                                            <a type="button" href="<?=BASE_URL('Admin/XemClone');?>/<?=$row['id'];?>"
                                                class="btn btn-primary"><i class="material-icons">shopping_cart</i>
                                                <span>ĐANG BÁN
                                                    <?=format_cash($taikhoan->num_rows_by_id(" `dichvu` = '".$row['id']."' AND `code` IS NULL AND `trangthai` = 'LIVE' "));?> LIVE / <?=format_cash($taikhoan->num_rows_by_id(" `dichvu` = '".$row['id']."' AND `code` IS NULL "));?> DIE</span></a>
                                            <a type="button" href="<?=BASE_URL('Admin/ThemClone');?>/<?=$row['id'];?>"
                                                class="btn btn-info"><i class="material-icons">playlist_add</i>
                                                <span>THÊM CLONE</span></a>
                                            <a type="button" href="<?=BASE_URL('Admin/XoaClone');?>/<?=$row['id'];?>"
                                                class="btn btn-danger"><i class="material-icons">delete</i>
                                                <span>XÓA CLONE</span></a>
                                            <a type="button" href="<?=BASE_URL('Admin/Edit');?>/<?=$row['id'];?>"
                                                class="btn bg-black"><i class="material-icons">mode_edit</i>
                                                <span>EDIT</span></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>DỊCH VỤ</th>
                                        <th>GIÁ</th>
                                        <th>LOẠI</th>
                                        <th>HIỂN THỊ</th>
                                        <th>ĐÃ BÁN</th>
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