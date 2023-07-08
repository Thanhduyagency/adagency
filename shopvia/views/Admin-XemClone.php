<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DANH SÁCH TÀI KHOẢN  <?=mb_strtoupper($row['dichvu'], 'UTF-8');?></h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        <?=mb_strtoupper($row['dichvu'], 'UTF-8');?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>DỊCH VỤ</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>CHI TIẾT</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $taikhoan = new taikhoan;
                                    $dichvu = new dichvu;
                                    foreach($taikhoan->get_list_by_id(" `dichvu` = '".$row['id']."' AND `code` IS NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$dichvu->get_row_by_id(" `id` = '".$row['dichvu']."' ")['dichvu'];?></td>
                                        <td><?=livefb($row['trangthai']);?></td>
                                        <td width="50%" id="coypy<?=$row['id'];?>"><?=$row['chitiet'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-info copy"
                                                data-clipboard-target="#coypy<?=$row['id'];?>"><i
                                                    class="material-icons">content_copy</i>
                                                <span>COPY</span></button>
                                            <a type="button"
                                                href="<?=BASE_URL('public/Admin-XemClone.php?id='.$_GET['id'].'&delete='.$row['id']);?>"
                                                class="btn mb-1 btn-danger"><i
                                                    class="material-icons">delete</i><span>XÓA NGAY</span></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>DỊCH VỤ</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>CHI TIẾT</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a type="button" href="<?=BASE_URL('Admin/Services');?>" class="btn btn-danger btn-block waves-effect">
                                <i class="material-icons">arrow_back</i><span>TRỞ LẠI</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>