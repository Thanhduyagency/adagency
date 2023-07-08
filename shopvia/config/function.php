<?php
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
$CMSNT = new CMSNT;
$theme = $CMSNT->site('theme');
$MEMO_PREFIX = $CMSNT->site('noidung_naptien');
$site_gmail_momo = $CMSNT->site('email');
$site_pass_momo = $CMSNT->site('pass_email');
$api_card = $CMSNT->site('api_card');
/* MÃ NGUỒN CHÚNG TÔI OPEN FULL SOURCE KHÔNG MÃ HÓA ĐỂ ĐẢM BẢO AN TÂM CHO KHÁCH HÀNG KHI SỬ DỤNG MÃ NGUỒN, VUI LÒNG KHÔNG COPY MÃ NGUỒN BÁN LẠI DƯỚI MỌI HÌNH THỨC */

function loai()
{
    $html = '
    <option value="FACEBOOK">FACEBOOK 🔰</option>
    <option value="GMAIL">GMAIL 🔰</option>
    <option value="FB">FACEBOOK</option>
    <option value="MAIL">MAIL</option>
    <option value="TRAODOISUB">XU TRAODOISUB</option>
    <option value="TUONGTACCHEO">XU TUONGTACCHEO</option>
    <option value="XU">XU</option>
    <option value="HOTMAIL">HOTMAIL</option>
    <option value="ZALO">ZALO</option>
    <option value="TWITTER">TWITTER</option>
    <option value="MAILEDU">MAILEDU</option>
    <option value="VPS">VPS</option>
    <option value="MAIL EDU">MAIL EDU</option>
    <option value="AZURE">AZURE</option>
    <option value="AWS">AWS</option>
    ';
    return $html;
}
function display_loai($data)
{
    if ($data == 'FACEBOOK')
    {
        $show = '<span class="badge bg-cyan">FACEBOOK</span>';
    }
    else if ($data == 'GMAIL')
    {
        $show = '<span class="badge bg-orange">GMAIL</span>';
    }
    else if ($data == 'HOTMAIL')
    {
        $show = '<span class="badge bg-orange">HOTMAIL</span>';
    }
    else if ($data == 'ZALO')
    {
        $show = '<span class="badge bg-cyan">ZALO</span>';
    }
    else if ($data == 'TWITTER')
    {
        $show = '<span class="badge bg-Secondary">TWITTER</span>';
    }
    else if ($data == 'MAILEDU')
    {
        $show = '<span class="badge bg-orange">MAIL EDU</span>';
    }
    else
    {
        $show = '<span class="badge bg-cyan">'.$data.'</span>';
    }
    return $show;
}
function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; // GMAIL STMP
        $mail->Password = $site_pass_momo; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function parse_order_id($des)
{
    global $MEMO_PREFIX;
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP - ZALO 0947838128*/
// inbox facebook
set_time_limit(0);
function curl_post($url, $method, $postinfo, $cookie_file_path) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie_file_path);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
    curl_setopt($ch,CURLOPT_COOKIEFILE, $cookie_file_path);
    curl_setopt($ch, CURLOPT_USERAGENT,
        "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    if ($method=='POST') 
    {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
    }
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}
function convertTokenToCookie($token) {
    $html = json_decode(file_get_contents("https://api.facebook.com/method/auth.getSessionforApp?access_token=$token&format=json&new_app_id=350685531728&generate_session_cookies=1"), true);
    $cookie = $html['session_cookies'][0]['name']."=".$html['session_cookies'][0]['value'].";".$html['session_cookies'][1]['name']."=".$html['session_cookies'][1]['value'].";".$html['session_cookies'][2]['name']."=".$html['session_cookies'][2]['value'].";".$html['session_cookies'][3]['name']."=".$html['session_cookies'][3]['value'];
    return $cookie;
}
/* ZALO 0947838128 | WWW.CMSNT.CO */
function senInboxCSM($cookie, $noiDungTinNhan, $idAnh, $idNguoiNhan)
{

//lấy id người gửi
    preg_match("/c_user=([0-9]+);/", $cookie, $idNguoiGui);
    $idNguoiGui = $idNguoiGui[1];

//lấy dtsg
    $html =  curl_post('https://m.facebook.com', 'GET' , "" , $cookie);
    $re = "/<input type=\"hidden\" name=\"fb_dtsg\" value=\"(.*?)\" autocomplete=\"off\" \\/>/"; 
    preg_match($re, $html, $dtsg);
    $dtsg = $dtsg[1];


//tách chuỗi thành vòng lặp, lấy từng người nhận ra
    $ex = explode("|", $idNguoiNhan);
    foreach ($ex as $idNguoiNhan) {
    // echo ".$idNguoiNhan.";


    //lấy tids
        $html1 = curl_post("https://m.facebook.com/messages/read/?fbid=$idNguoiNhan&_rdr",'GET','', $cookie);
        $re = "/tids=(.*?)\&/"; 
        preg_match($re, $html1, $tid);
        if (isset($tid[1])) {
        $tid=urldecode($tid[1]);  //encode mã tids lại
        $data = array("fb_dtsg" => "$dtsg",
            "body" => "$noiDungTinNhan",
            "send" => "Gá»­i",
            "photo_ids" => "$idAnh",
            "tids" => "$tid",
            "referrer" => "",
            "ctype" => "",
            "cver" => "legacy");
    } else {
        $data = array("fb_dtsg" => "$dtsg",
            "body" => "$noiDungTinNhan",
            "Send" => "Gá»­i",
            "ids[0]" => "$idNguoiNhan",
            "photo" => "",
            "waterfall_source" => "message");
    }

    //Gửi tin nhắn
    $html = curl_post('https://m.facebook.com/messages/send/?icm=1&refid=12', 'POST', http_build_query($data), $cookie);
    $re = preg_match("/send_success/", $html, $rep); //bắt kết quả trả về
    if (isset($rep[0])) {
        return true;
        ob_flush();
        flush();
    } else {
        return false;
        ob_flush();
        flush();
    }
}
}

function BASE_URL($url)
{
    global $base_url;
    return $base_url.$url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes(strip_tags($data))));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function msg_success2($text)
{
    return die('<script type="text/javascript">swal("Thành Công", "'.$text.'","success");</script>');
}
function msg_error2($text)
{
    return die('<script type="text/javascript">swal("Thất Bại", "'.$text.'","error");</script>');
}
function msg_warning2($text)
{
    return die('<script type="text/javascript">swal("Thông Báo", "'.$text.'","warning");</script>');
}

function msg_success($text, $url, $time)
{
    
    return die('<script type="text/javascript">swal("Thành công","'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">swal("Thất Bại", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">swal("Thông Báo", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="btn btn-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="btn btn-success">Hoạt động</span>';
    }
    return $show;
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function livefb($data)
{
    if ($data == 'DIE')
    {
        $show = '<span class="btn btn-danger waves-effect">DIE</span>';
    }
    else if ($data == 'LIVE')
    {
        $show = '<span class="btn btn-success waves-effect">LIVE</span>';
    }
    return $show;
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function display($data)
{
    if ($data == 'HIDE')
    {
        $show = '<span class="btn btn-danger">ẨN</span>';
    }
    else if ($data == 'SHOW')
    {
        $show = '<span class="btn btn-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="btn btn-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="btn btn-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="btn btn-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="btn btn-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="btn btn-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="btn btn-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="btn btn-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="btn btn-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="btn btn-warning">Đang đợi nạp</span>';
    }
    else{
        $show = '<span class="btn btn-warning">Khác</span>';
    }
    return $show;
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function CheckLiveEmail($email)
{
	$vmail = new verifyEmail();
	if ($vmail->check($email))
	{
		return 'LIVE';
	} 
	elseif (verifyEmail::validate($email))
	{
		return 'DIE';
	} 
	else
	{
		return 'DIE';
	}
}
function CheckLiveClone1($uid)
{
    $url = "https://graph.facebook.com/".$uid."/picture?redirect=false";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);

    $json = $data;
    curl_close($ch);
    if(empty($json['data']['height']) || empty($json['data']['width']))
    {
        return 'DIE';
    }
    else
    {
        return 'LIVE';
    }
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function CheckLiveClone($uid)
{
    $json = json_decode(curl_get("https://graph.facebook.com/".$uid."/picture?redirect=false"), true);
    if(empty($json['data']['height']) || empty($json['data']['width']))
    {
        return 'DIE';
    }
    else
    {
        return 'LIVE';
    }
}
function CheckLiveBm($token, $link)
{
    $data = json_decode(curl_get("https://graph.facebook.com/".$link."?access_token=".$token."&_index=0&_reqName=object%3Abrand&_reqSrc=BrandResourceRequests.brands&date_format=U&fields=%5B%22id%22%2C%22name%22%2C%22vertical_id%22%2C%22timezone_id%22%2C%22picture.type(square)%22%2C%22primary_page.fields(name%2C%20picture%2C%20link)%22%2C%22payment_account_id%22%2C%22link%22%2C%22created_time%22%2C%22created_by.fields(name)%22%2C%22updated_time%22%2C%22updated_by.fields(name)%22%2C%22extended_updated_time%22%2C%22two_factor_type%22%2C%22allow_page_management_in_www%22%2C%22eligible_app_id_for_ami_initiation%22%2C%22verification_status%22%2C%22sharing_eligibility_status%22%2C%22can_create_ad_account%22%2C%22is_business_verification_eligible%22%2C%22is_non_discrimination_certified%22%5D&locale=es_LA&method=get&pretty=0&suppress_http_code=1"), true);
    if(isset($data["error"]))
    {
        if($data["error"]["code"] == 190 || $data["error"]["code"] == 368)
        {
            return 'TokenDie';
        }
        else if($data["error"]["code"] == 100)
        {
            return False;
        } 
        else
        {
            return False;
        }
    }
    else
    {
        return True;
    }
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    return $data;
    curl_close($ch);
    
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function TypePassword($string)
{
    return md5($string);
}
function getRandomUserAgent()
{
    $userAgents = array(

        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6)    Gecko/20070725 Firefox/2.0.0.6",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
        "Opera/9.20 (Windows NT 6.0; U; en)",
        "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; en) Opera 8.50",
        "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.02 [en]",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr; rv:1.7) Gecko/20040624 Firefox/0.9",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) Safari/48"
    );
    $random = rand(0,count($userAgents)-1);
    return $userAgents[$random];
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<nav aria-label="Page navigation example"><ul class="pagination pagination-lg">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fas fa-angle-left"></i>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="page-item active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fas fa-angle-right"></i>');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}
function card24h($loaithe, $menhgia, $seri, $pin, $code)
{
    global $api_card;
    $callback = BASE_URL('api/card.php');
    $url_api = 'https://nhanthecao.com/';
    $json = json_decode(curl_get($url_api.'api/card-auto.php?auto=true&type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$api_card.'&callback='.$callback.'&content='.$code), true);
    return $json;
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))     
    {  
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
    {  
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else  
    {  
        $ip_address = $_SERVER['REMOTE_ADDR'];  
    }
    return $ip_address;
}
function timeAgo($time_ago)
{
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60)
    {
        return "Vừa xong";
    }
    //Minutes
    else if($minutes <= 60)
    {
        return "$minutes phút trước";
    }
    //Hours
    else if($hours <= 24)
    {
        return "$hours tiếng trước";
    }
    //Days
    else if($days <= 7)
    {
        if($days == 1)
        {
            return "Hôm qua";
        }
        else
        {
            return "$days ngày trước";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
    {
        return "$weeks tuần trước";
    }
    //Months
    else if($months <=12)
    {
        return "$months tháng trước";
    }
    //Years
    else
    {
        return "$years năm trước";
    }
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */