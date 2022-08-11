<?php 
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class danhmucsanpham
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        

    public function insert_dm($tendm)
        {
            $tendm = $this->fm->validation($tendm);
            

            $tendm= mysqli_real_escape_string($this->db->link, $tendm);
            if(empty($tendm))
            {
                $alert = "Bạn phải nhập tên danh mục";
                return $alert;
            }
            else 
            {
                $query="INSERT INTO danhmucsanpham (tendm) VALUES('$tendm')";
                $result=$this->db->insert($query);
                if($result)
                    {
                        header('Location:quanlydanhmuc.php');

                    }                    
                else 
                    {
                        $alert="<span> Thêm không thành công</span>";
                        return $alert;
                    }
            }


        }


    public function show_dm()
        {
            $query="SELECT * FROM danhmucsanpham order by madm desc";
            $result=$this->db->select($query);
            return $result;
        }


    public function timkiemdm($noidung)
        {
            $query="SELECT * FROM danhmucsanpham WHERE tendm LIKE '%$noidung%' ";
            $result=$this->db->select($query);
            return $result;
        }



    public function getmadm($madm)
        {
            $query="SELECT * FROM danhmucsanpham WHERE madm ='$madm'";
            $result=$this->db->select($query);
            return $result;
        }
    
    public function update_dm($tendm,$madm)
        {
            $tendm = $this->fm->validation($tendm);
            $tendm= mysqli_real_escape_string($this->db->link, $tendm);
            $madm= mysqli_real_escape_string($this->db->link, $madm);

            if(empty($tendm))
            {
                $alert = "Tên danh mục không được bỏ trống";
                return $alert;
            }
            else 
            {
                $query="UPDATE danhmucsanpham SET tendm='$tendm' where madm='$madm'";;
                $result=$this->db->update($query);
                if($result)
                    {
                        header('Location:quanlydanhmuc.php');
                    }
                else 
                    {
                        $alert="<span> Cập nhật không thành công</span>";
                        return $alert;
                    }
            }

           
        }

    public function delete_dm($madm)
        {
            $query="DELETE FROM danhmucsanpham WHERE madm=$madm";
            $result=$this->db->delete($query);
            if($result)
                {
                    header('Location:quanlydanhmuc.php');
                }
            else 
                {
                    $alert="<span> Xóa không thành công</span>";
                    return $alert;
                }        
        }

        public function show_dm_frontend()
        {
            $query="SELECT * FROM danhmucsanpham order by madm desc";
            $result=$this->db->select($query);
            return $result;
        }

        public function getsp_dm($madm)
        {
            $query="SELECT * FROM sanpham WHERE madm='$madm' order by madm desc";
            $result=$this->db->select($query);
            return $result;
        }

        public function getname_dm($madm)
        {
            $query="SELECT * FROM danhmucsanpham WHERE madm='$madm' order by madm desc";
            $result=$this->db->select($query);
            return $result;
        }
    
} 
?> 