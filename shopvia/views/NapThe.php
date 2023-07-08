<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>NẠP THẺ CÀO</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            NẠP THẺ CÀO
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#napthe" data-toggle="tab">NẠP THẺ</a></li>
                            <li role="presentation"><a href="#lichsunap" data-toggle="tab">LỊCH SỬ NẠP THẺ</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="napthe">
                                <div class="alert bg-teal alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <?=$CMSNT->site('luuy_naptien');?>
                                </div>
                                <form action="" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Nhập seri:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="seri"
                                                placeholder="10006139342354">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Nhập mã thẻ:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="pin"
                                                placeholder="313036630666891">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Loại thẻ:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select class="custom-select" name="loaithe" required="">
                                                <?=file_get_contents("https://doithe24h.net/api/loaithe.php");?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Mệnh giá:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <select class="custom-select" name="menhgia" id="menhgia" required="">
                                                <?=file_get_contents("https://doithe24h.net/api/menhgia.php");?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Thực nhận:</label>
                                        <div class="col-sm-12 col-md-10">
                                            <b id="ketqua" style="color:red;">0</b><b style="color:red;">đ</b>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-block waves-effect">
                                            <i class="material-icons">send</i><span>NẠP NGAY</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="lichsunap">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>SERI</th>
                                                <th>PIN</th>
                                                <th>LOẠI THẺ</th>
                                                <th>MỆNH GIÁ</th>
                                                <th>THỰC NHẬN</th>
                                                <th>THỜI GIAN</th>
                                                <th>TRẠNG THÁI</th>
                                                <th>GHI CHÚ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $i = 0;
                                    $cards = new cards;
                                    foreach($cards->get_list_by_id(" `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                            <tr>
                                                <td><?=$i;?> <?php $i++;?></td>
                                                <td><?=$row['seri'];?></td>
                                                <td><?=$row['pin'];?></td>
                                                <td><span class="badge badge-danger"><?=$row['loaithe'];?></span></td>
                                                <td><?=format_cash($row['menhgia']);?></td>
                                                <td><?=format_cash($row['thucnhan']);?></td>
                                                <td><span class="badge badge-dark"><?=$row['createdate'];?></span></td>
                                                <td><?=status($row['status']);?></td>
                                                <td><?=$row['note'];?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
$('#menhgia').on('change', function() {
    var menhgia = $('#menhgia').val();
    var ck = <?=$CMSNT->site('ck_card');?>;
    var ketqua = menhgia - menhgia * ck / 100;
    $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g, '$1,'));
});
</script>