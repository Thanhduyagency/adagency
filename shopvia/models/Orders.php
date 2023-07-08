<?php
// DOWNLOAD LIST CLONE //
if(isset($_GET['DownloadFile']) && isset($_GET['code']) && isset($_SESSION['username']) )
{
    $code = check_string($_GET['code']);
    $orders = new orders;
    $row = $orders->get_row_by_id(" code = '$code' AND username = '".$getUser['username']."' ");
    if(!$row)
    {
        msg_error('Đơn hàng không hợp lệ', "", 2000);
    }
    $clone = 'DỊCH VỤ: '.$row['dichvu'].' SỐ LƯỢNG: '.$row['soluong'].' | GIÁ: '.format_cash($row['sotien']).'đ';
    
    $tk = new taikhoan;
    $data = $tk->get_list_by_id(" `code` = '$code' ");
    foreach($data as $row1)
    {
        $clone = $clone.PHP_EOL.htmlspecialchars_decode($row1['chitiet']);
    }
    $file = $code.".txt";
    $txt = fopen($file, "w") or die("Unable to open file!");
    fwrite($txt, $clone);
    fclose($txt);
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    header("Content-Type: text/plain");
    readfile($file);
    unlink($code.".txt");
    
}
?>