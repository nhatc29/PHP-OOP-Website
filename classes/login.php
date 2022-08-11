<?php 

include ('lib/session.php');
Session::checkLogin();
include ('lib/database.php');
include ('helpers/format.php');
?>

<?php
class login 
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        

    public function login1($username,$password)
        {
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            $username= mysqli_real_escape_string($this->db->link, $username);
            $password= mysqli_real_escape_string($this->db->link, md5($password));
            if(empty($username) || empty($password))
            {
                $alert = "Bạn phải điền đầy đủ thông tin";
                return $alert;
            }
            else 
            {
                $query="SELECT * FROM tbl_user WHERE username='$username' AND password='$password' LIMIT 1";
                $result=$this->db->select($query);
                if($result != false )
                    {
                        $value=$result-> fetch_assoc();
                        Session::set('login',true);
                        Session::set('mand',$value['mand']);
                        Session::set('username',$value['username']);
                        Session::set('name',$value['name']);
                        Session::set('quyen',$value['quyen']);
                        if($value['quyen']==1)
                            {header('Location:admin/admin.php');}
                        else 
                            {
                                header('Location:index.php');
                            }


                    }
                else 
                    {
                        $alert= "Tên đăng nhập hoặc mật khẩu không đúng"; 
                        return $alert;
                    }
            }


        }
} 
?> 