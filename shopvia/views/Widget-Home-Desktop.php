<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>
                DANH SÁCH DỊCH VỤ
            </h2>
        </div>
        <div class="body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Kho hàng</th>
                            <th scope="col">Đã bán</th>
                            <th scope="col">Loại</th>
                            <th width="40%" scope="col">Mô tả</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $dichvu = new dichvu;
            $tk = new taikhoan;
            foreach($list_dichvu as $row){
            ?>
                        <tr>
                            <th scope="row">#<?=$row['id'];?></th>
                            <td><b><?=mb_strtoupper($row['dichvu'], 'UTF-8');?></b></td>
                            <td><span class="badge bg-pink"><?=format_cash($row['gia']);?>đ</span></td>
                            <td><span
                                    class="badge bg-teal"><?=format_cash($tk->num_rows_by_id(" `dichvu` = '".$row['id']."' AND `trangthai` = 'LIVE' AND `code` IS NULL "));?></span>
                            </td>
                            <td><span
                                    class="badge bg-orange"><?=format_cash($tk->num_rows_by_id(" `dichvu` = '".$row['id']."' AND `trangthai` = 'LIVE' AND `code` IS NOT NULL "));?></span>
                            </td>
                            <td><?=display_loai($row['loai']);?></td>
                            <td>
                                <?=$row['mota'];?>
                            </td>
                            <td><a class="btn btn-primary" data-toggle="modal" data-target="#BUY<?=$row['id'];?>"
                                    type="button" href="javascript:void()"><i
                                        class="material-icons">add_shopping_cart</i>
                                    <span>MUA NGAY</span></a></td>
                        </tr>




                        <div class="modal fade" id="BUY<?=$row['id'];?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">THANH TOÁN</h5>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Dịch vụ:</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly="readonly" class="form-control"
                                                        value="<?=$row['dichvu'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Đơn giá:</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly="readonly" class="form-control"
                                                        value="<?=format_cash($row['gia']);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Số dư của
                                                    bạn:</label>
                                                <div class="col-sm-7">
                                                    <input type="text" readonly="readonly" class="form-control"
                                                        value="<?=format_cash($my_money);?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Thành tiền:</label>
                                                <div class="col-sm-7">
                                                    <b id="ketqua<?=$row['id'];?>">0</b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Số lượng cần mua:
                                                </label>
                                                <div class="col-sm-7">
                                                    <div class="form-line">
                                                        <input type="number" id="value<?=$row['id'];?>" name="value"
                                                            class="form-control" value="0">
                                                    </div>
                                                    <input type="hidden" id="dichvu<?=$row['id'];?>" name="dichvu"
                                                        value="<?=$row['id'];?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div id="load<?=$row['id'];?>"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                    class="material-icons">arrow_back</i><span>ĐÓNG</span></button>
                                            <button type="button" name="btnBuy" id="btn_submit<?=$row['id'];?>"
                                                class="btn btn-primary"><i
                                                    class="material-icons">shopping_cart</i><span>MUA NGAY</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="thongbao<?=$row['id'];?>"></div>
                        <script type="text/javascript">
                        $('#value<?=$row['id'];?>').keyup(function() {
                            var soluong = $("#value<?=$row['id'];?>").val();
                            var ketqua1 = <?=$row['gia'];?> * soluong;
                            var ketqua = ketqua1 - ketqua1 * <?=$my_chietkhau;?> / 100;
                            $('#ketqua<?=$row['id'];?>').html(ketqua.toString().replace(
                                /(.)(?=(\d{3})+$)/g, '$1,'));
                        });
                        $("#btn_submit<?=$row['id'];?>").on("click", function() {
                            var value = $("#value<?=$row['id'];?>").val();
                            var dichvu = $("#dichvu<?=$row['id'];?>").val();

                            if (!value) {
                                swal("Thất Bại", "Vui lòng nhập số lượng", "error");
                                return false;
                            }
                            if (value <= 0) {
                                swal("Thất Bại", "Số lượng mua không hợp lệ", "error");
                                return false;
                            }
                            if (!dichvu) {
                                swal("Thất Bại", "Dịch vụ không hợp lệ", "error");
                                return false;
                            }
                            $('#btn_submit<?=$row['id'];?>').addClass('btn btn-info').html(
                                'ĐANG XỬ LÝ GIAO DỊCH').prop('disabled', true);
                            $('#load<?=$row['id'];?>').html(
                                '<div class="progress"><div class="progress-bar bg-cyan progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">ĐANG CHECK LIVE</div></div>'
                            );
                            $.ajax({
                                url: "<?=BASE_URL("ajax/Home.php");?>",
                                method: "POST",
                                data: {
                                    value: value,
                                    dichvu: dichvu
                                },
                                success: function(response) {
                                    $("#thongbao<?=$row['id'];?>").html(response);
                                    $('#btn_submit<?=$row['id'];?>').html('MUA NGAY').prop(
                                        'disabled', false);
                                    $('#load<?=$row['id'];?>').html('');
                                }
                            });
                        });
                        </script>




                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Kho hàng</th>
                            <th scope="col">Đã bán</th>
                            <th scope="col">Loại</th>
                            <th width="40%" scope="col">Mô tả</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>