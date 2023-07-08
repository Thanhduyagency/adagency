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
                                        <th width="20%">THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $taikhoan = new taikhoan;
                                    foreach($taikhoan->get_list_by_id(" `code` = '".$row['code']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td id="coypy<?=$row['id'];?>"><?=$row['chitiet'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-info copy"
                                                data-clipboard-target="#coypy<?=$row['id'];?>"><i
                                                    class="material-icons">content_copy</i>
                                                <span>COPY</span></button>
                                        </td>
                                    </tr>
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