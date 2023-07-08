<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>NẠP TIỀN</h2>
        </div>
        <!-- Example Tab -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            NẠP TIỀN QUA NGÂN HÀNG
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#bank" data-toggle="tab">NẠP TIỀN</a></li>
                            <li role="presentation"><a href="#lichsubank" data-toggle="tab">LỊCH SỬ BANK</a></li>
                            <li role="presentation"><a href="#lichsumomo" data-toggle="tab">LỊCH SỬ MOMO</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="bank">
                                <div class="alert bg-teal alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <?=$CMSNT->site('luuy_naptien');?>
                                </div>
                                <div class="row">
                                    <?php $Bank = new Bank; foreach($Bank->get_list_by_id(" `id` IS NOT NULL ") as $row) {?>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="box" style="text-align: center;">
                                            <br>
                                            <!-- /.box-header -->
                                            <div class="box-body" style="border-style: solid;border-color: black;">
                                                <br>
                                                <img src="<?=$row['logo'];?>" height="50px;"/>
                                                <br>
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: right;">STK/SDT: </td>
                                                            <td style="text-align: left; color: #00cc99;">
                                                                <b><?=$row['stk'];?></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right;">Chủ tài khoản:
                                                            </td>
                                                            <td style="text-align: left;">
                                                                <b><?=$row['bank_name'];?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right;">Nội dung CK:
                                                            </td>
                                                            <td style="text-align: left;">
                                                                <b style="color:red;"><?=$CMSNT->site("noidung_naptien").$getUser['id'];?></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><b><?=$row['ghichu'];?></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>

                                    <?php }?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="lichsubank">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>USERNAME</th>
                                                <th>MÃ GD</th>
                                                <th>MONEY</th>
                                                <th>NỘI DUNG</th>
                                                <th>THỜI GIAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $i = 0;
                                    $BankAuto = new BankAuto;
                                    foreach($BankAuto->get_list_by_id(" `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$row['username'];?></td>
                                                <td><?=$row['tid'];?></td>
                                                <td><?=$row['amount'];?></td>
                                                <td><?=$row['description'];?></td>
                                                <td><?=$row['time'];?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="lichsumomo">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>USERNAME</th>
                                                <th>MÃ GD</th>
                                                <th>SDT</th>
                                                <th>TÊN</th>
                                                <th>MONEY</th>
                                                <th>NỘI DUNG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $i = 0;
                                    $momo = new momo;
                                    foreach($momo->get_list_by_id(" `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$row['username'];?></td>
                                                <td><?=$row['tranId'];?></td>
                                                <td><?=$row['partnerId'];?></td>
                                                <td><?=$row['partnerName'];?></td>
                                                <td><?=$row['amount'];?></td>
                                                <td><?=$row['comment'];?></td>
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