<?php
class Helper{
    public function to_alias ($str){
        $str= trim( mb_strtolower($str));
        $str= preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ắ|ằ|ặ|ẵ|ẳ)/','a', $str);
        $str= preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ế|ề|ể|ệ|ễ)/','e', $str);
        $str= preg_replace('/(ì|í|ị|ỉ|ĩ)/','i', $str);
        $str= preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ố|ồ|ộ|ỗ|ổ|ơ|ớ|ờ|ở|ỡ|ợ)/','o', $str);
        $str= preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ứ|ừ|ự|ữ|ử)/','u', $str);
        $str= preg_replace('/(ỳ|ý|ỵ|ỹ|ỷ)/','y', $str);
        $str= preg_replace('/(đ)/','d', $str);
        $str= preg_replace('/[^a-z0-9-\s]/','',$str);
        $str= preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    public function doUpload($inputFileUpload)
    {
        $_SESSION['msg']='';
        if($_FILES[$inputFileUpload]['error']!= 0)
        $_SESSION['msg'].="Dữ liệu không đúng cấu trúc. Dữ liệu upload bị lỗi hoặc chưa chọn file upload <br>";
        else{
            $target_dir= "public/upload/";
            $target_file= $target_dir.basename($_FILES[$inputFileUpload]['name']);
            $allowUpload =true;
            $imageFileType=pathinfo($target_file, PATHINFO_EXTENSION);
            $maxfilesize=10000000;
            $allowtypes= array('jpg', 'png', 'jpeg','gif');
            if (isset($_POST['submit']))
            {
                $check=getimagesize($_FILES[$inputFileUpload]['tmp_name']);
                if($check !==false){
                    $_SESSION ['msg'].="Đây là file ảnh-".$check["mime"]."<br>";
                    $allowUpload= true;
                }
                else {
                    $_SESSION ['msg']="Không phải file ảnh.<br>";
                    $allowUpload= false;
                }
            }
            if(file_exists($target_file)){
                $_SESSION['msg'].="Tên file đã tồn tại trên server, không được ghi đề <br>";
                $allowUpload= false;
            }
            if($_FILES[$inputFileUpload]['size']> $maxfilesize){
                $_SESSION['msg'].="Không được upload ảnh lớn hơn $maxfilesize(bytes).<br>";
                $allowUpload= false;
            }
            if(!in_array($imageFileType, $allowtypes)){
                $_SESSION['msg'].="Chỉ được upload các định dạng JGP, PNG, JPEG, GIF <br>";
                $allowUpload= false;
            }
            if($allowUpload){
                if(move_uploaded_file($_FILES[$inputFileUpload]['tmp_name'], $target_file)){
                $_SESSION['msg'].="public/upload/".basename($_FILES[$inputFileUpload]['name'])." Đã upload thành công.<br>";
                $_SESSION['msg'].="File lưu tại ".$target_file.'<br>';
                return true;
            }
            else{
                $_SESSION['msg']= "Có lỗi xảy ra khi upload file.<br>";
                return false;
            }
        }
        else{
            $_SESSION['msg'].="Không upload được file, có thể do file lớn, kiểu file không đúng...";
            return false;
        }
        
    }
}
}
?>