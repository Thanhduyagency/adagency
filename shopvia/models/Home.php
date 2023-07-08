<?php
if(isset($_GET['loai']))
{
    $loai = check_string($_GET['loai']);
    $dichvu = new dichvu;
    $row = $dichvu->get_row_by_id(" `loai` = '$loai' ");

    if(!$row)
    {
        msg_error("Sản phẩm này hiện tại không còn.", BASE_URL(""), 2000);
    }
    $list_dichvu = $dichvu->get_list_by_id(" `display` = 'SHOW' AND `loai` = '$loai' ORDER BY gia ASC ");
    
}
else if(isset($_POST['timtheogia']))
{
    $timtheogia = check_string($_POST['timtheogia']);
    if($timtheogia == 'minmax')
    {
        $dichvu = new dichvu;
        $list_dichvu = $dichvu->get_list_by_id(" `display` = 'SHOW' ORDER BY gia ASC ");
    }
    else if($timtheogia == 'maxmin')
    {
        $dichvu = new dichvu;
        $list_dichvu = $dichvu->get_list_by_id(" `display` = 'SHOW' ORDER BY gia ASC ");
    }
    else
    {
        $dichvu = new dichvu;
        $list_dichvu = $dichvu->get_list_by_id(" `display` = 'SHOW' ORDER BY gia ASC ");
    }
    
}
else
{
    $dichvu = new dichvu;
    $list_dichvu = $dichvu->get_list_by_id(" `display` = 'SHOW' ORDER BY gia ASC ");
}