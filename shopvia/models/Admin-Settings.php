<?php
if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    foreach ($_POST as $key => $value)
    {
        $CMSNT->update("options", array(
            'value' => $value
        ), " `key` = '$key' ");
    }
    msg_success('Lưu thành công', '', 500);
}