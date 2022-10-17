<?php 
class AuthModel extends BaseModel
{
    protected $table= DB_PREFIX.'admin';
    public function adminLogin()
    {
        if($_POST['login'])
        {
            if ($_POST['inputUsername']) $username= $_POST['inputUsername'];
            if ($_POST['inputPassword']) $password= md5(md5($_POST['inputPassword']));
        }
        $authmodel= new AuthModel;
        //lay user tu bang admin trong php 
        $u=$authmodel->get(['username'=>$username, 'level'=>0, 'trash'=>0]);
        if ($u['pass']== $password)
        {
            $_SESSION['username']= $username;
            $_SESSION['level']= $u['level'];
            header('Location:'.BASE_URL.'dashboard/home/');
            exit;
        }
        else
        {
            $_SESSION['msg']= "Đăng nhập thất bại";
            header('Location:'.BASE_URL.'auth/adminLogin/');
            exit;
        }
    }
}
?>