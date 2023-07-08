<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <form action="" method="GET">
                <div class="col-sm-6">
                    <select class="form-control" name="loai" required>
                        <option value="">-- Tìm theo loại --</option>
                        <?=loai();?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-block waves-effect" type="submit">TÌM KIẾM</button>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <?php 
            if($CMSNT->site('theme_home') == 0)
            {
                $detect = new Mobile_Detect;
                if($detect->isMobile())
                { 
                    require_once('Widget-Home-Mobile.php');
                }
                else
                { 
                    require_once('Widget-Home-Desktop.php');
                }
            }
            else if($CMSNT->site('theme_home') == 1)
            {
                require_once('Widget-Home-Desktop.php');
            }
            else if($CMSNT->site('theme_home') == 2)
            {
                require_once('Widget-Home-Mobile.php');
            }
            ?>
            <?php if($CMSNT->site('stt_giao_dich_gan_day') == 'ON') { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            10 GIAO DỊCH GẦN ĐÂY
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NGƯỜI MUA</th>
                                        <th>SẢN PHẨM</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>THANH TOÁN</th>
                                        <th>LOẠI</th>
                                        <th>THỜI GIAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $orders = new orders;
                                    foreach($orders->get_list_by_id(" `username` IS NOT NULL ORDER BY id DESC LIMIT 10 ") as $row){
                                    ?>
                                    <tr>
                                        <td><b>****<?=substr($row['username'], 4);?></b></td>
                                        <td><?=$row['dichvu'];?></td>
                                        <td><?=format_cash($row['soluong']);?></td>
                                        <td><?=format_cash($row['sotien']);?>đ</td>
                                        <td><?=display_loai($row['loai']);?></td>
                                        <td><span class="badge badge-dark"><?=timeAgo($row['time']);?></span></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>                           
        </div>
    </div>
</section>