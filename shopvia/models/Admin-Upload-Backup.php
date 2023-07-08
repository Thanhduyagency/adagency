<?php 
    if(isset($_POST['uid']) && $getUser['level'] == 'admin')
    {
        $uid = check_string($_POST['uid']);
        if (check_zip('backup') == true)
        {
            $uploads_dir = '../backup/';
            $tmp_name = $_FILES['backup']['tmp_name'];
            $create = move_uploaded_file($tmp_name, "$uploads_dir/$uid.zip");
            if($create)
            {
                $CMSNT->insert("backups", [
                    'filename'  => $uid,
                    'thoigian'  => gettime(),
                    'time'      => time()
                ]);
                msg_success("Upload file backup lên thành công", "", 2000);
            }
        }
        else
        {
            msg_error("Vui lòng tải lên file nén dưới dạng ZIP", "", 2000);
        }
    }