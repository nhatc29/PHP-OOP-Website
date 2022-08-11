<?php 
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>

<?php
class user
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
    public function insert_user($data)
        {
            $name= mysqli_real_escape_string($this->db->link, $data['name']); 
            $diachi= mysqli_real_escape_string($this->db->link, $data['diachi']); 
            $phone= mysqli_real_escape_string($this->db->link, $data['phone']); 
            $username= mysqli_real_escape_string($this->db->link, $data['username']); 
            $password= mysqli_real_escape_string($this->db->link, $data['password']);
            $repassword= mysqli_real_escape_string($this->db->link, $data['repassword']); 
            $quyen = 0;

           
            if($name==""||$diachi=="" ||$phone=="" || $username=="" || $password==""|| $repassword==""   ){
                $alert = "Bạn phải nhập đầy đủ thông tin";
                return $alert; 
            }else {
                $checkusername = "SELECT * FROM tbl_user WHERE username = '$username' LIMIT 1";
                $result_check = $this->db->select($checkusername);            }
                if ($result_check)
                    {
                        $alert="<span class=error> Tên đăng nhập đã tồn tại </span>";
                        return $alert;
                    }
                elseif($password != $repassword )
                    {
                        $alert="<span class=error> Mật khẩu nhập lại không trùng khớp </span>";
                        return $alert;
                    }
                else 
                    {
                        $query="INSERT INTO tbl_user (username,password,name,diachi,phone,quyen) VALUES('$username',md5('$password'),'$name','$diachi','$phone','$quyen')";
                        $result=$this->db->insert($query);
                        if($result)
                            {
                                header('Location:login.php');
                            }
                        else 
                            {
                                $alert="<span> Đăng ký không thành công</span>";
                                return $alert;
                            }
                    }
        }

    public function show_user($mauser)
        {
            $query="SELECT * FROM tbl_user WHERE mand='$mauser'";
            $result=$this->db->select($query);
            return $result;
        }

    public function timkiemtv($noidung)
        {
            $query="SELECT * FROM tbl_user WHERE (name LIKE '%$noidung%' or diachi LIKE '%$noidung%' or phone LIKE '%$noidung%' 
             or quyen LIKE '%$noidung%') ";
            $result=$this->db->select($query);
            return $result;
        }

    public function update_user($data,$mauser)
        {
            $name= mysqli_real_escape_string($this->db->link, $data['name']); 
            $diachi= mysqli_real_escape_string($this->db->link, $data['diachi']); 
            $phone= mysqli_real_escape_string($this->db->link, $data['phone']); 
            
           

           
            if($name==""||$diachi=="" ||$phone=="" ){
                $alert = "Bạn phải nhập đầy đủ thông tin";
                return $alert; 
            }else {
               
                        $query="UPDATE tbl_user SET name=' $name',diachi='$diachi',phone='$phone' WHERE mand='$mauser'";
                        $result=$this->db->update($query);
                        if($result)
                            {
                                header('Location:profile.php');
                            }
                        else 
                            {
                                $alert="<span> Đăng ký không thành công</span>";
                                return $alert;
                            }
                    }
        }
    
        public function show_all_user()
        {
            $query="SELECT * FROM tbl_user";
            $result=$this->db->select($query);
            return $result;

        }

        public function insert_bl()
        {   
            $product=$_POST['spid_bl'];
            $tenbl=$_POST['tenbl'];
            $binhluan = $_POST['binhluan'];
            $trangthai=0; 

            if($tenbl =='' || $binhluan=='')
                {
                    $alert="<span style='color:red'> Bạn phải điền đầy đủ thông tin</span>";
                    return $alert;
                }

            else 
                {
                    $query="INSERT INTO tbl_binhluan (tenbl,binhluan,masp,trangthai) VALUES('$tenbl','$binhluan','$product','$trangthai')";
                        $result=$this->db->insert($query);
                        if($result)
                            {
                                $alert="<span style='color:green'>  Bình luận thành công, bình luận của bạn sẽ sớm được kiểm duyệt</span>";
                                return $alert;
                            }
                        else 
                            {
                                $alert="<span style='color:red'> Bình luận không thành công</span>";
                                return $alert;
                            }
                }
        }


        public function show_bl()
        {
            $query="SELECT * FROM tbl_binhluan,sanpham WHERE tbl_binhluan.masp=sanpham.masp order by mabl desc ";
            $result=$this->db->select($query);
            return $result;
        }

        public function show_bl_id($id)
        {
            $query="SELECT * FROM tbl_binhluan WHERE masp='$id' order by mabl desc";
            $result=$this->db->select($query);
            return $result;
        }

        public function duyet_bl( $id)
        {   
            $id= mysqli_real_escape_string($this->db->link, $id);
            

            $query="UPDATE tbl_binhluan SET 
            trangthai= '1'
            WHERE mabl='$id'";
            $result = $this->db->update($query);
            return $result;
        
            
        }

        
        public function timkiembl($noidung)
        {
            $query="SELECT * FROM tbl_binhluan, sanpham WHERE tbl_binhluan.masp=sanpham.masp AND 
             (tenbl LIKE '%$noidung%' or binhluan LIKE '%$noidung%' or tensp LIKE '%$noidung%' ) ";
            $result=$this->db->select($query);
            return $result;
        }
   
} 
?> 