<?php 
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class thuonghieu
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        

    public function insert_th($tenth)
        {
            $tenth = $this->fm->validation($tenth);
            

            $tenth= mysqli_real_escape_string($this->db->link, $tenth);
            if(empty($tenth))
            {
                $alert = "Bạn phải nhập tên danh mục";
                return $alert;
            }
            else 
            {
                $query="INSERT INTO thuonghieu (tenth) VALUES('$tenth')";
                $result=$this->db->insert($query);
                if($result)
                    {
                        header('Location:quanlythuonghieu.php');

                    }                    
                else 
                    {
                        $alert="<span> Thêm không thành công</span>";
                        return $alert;
                    }
            }


        }


    public function show_th()
        {
            $query="SELECT * FROM thuonghieu order by math desc";
            $result=$this->db->select($query);
            return $result;
        }

    public function timkiemth($noidung)
        {
            $query="SELECT * FROM thuonghieu WHERE tenth LIKE '%$noidung%' ";
            $result=$this->db->select($query);
            return $result;
        }

    public function getmath($math)
        {
            $query="SELECT * FROM thuonghieu WHERE math ='$math'";
            $result=$this->db->select($query);
            return $result;
        }
    
    public function update_th($tenth,$math)
        {
            $tenth = $this->fm->validation($tenth);
            $tenth= mysqli_real_escape_string($this->db->link, $tenth);
            $math= mysqli_real_escape_string($this->db->link, $math);

            if(empty($tenth))
            {
                $alert = "Tên danh mục không được bỏ trống";
                return $alert;
            }
            else 
            {
                $query="UPDATE thuonghieu SET tenth='$tenth' WHERE math='$math'";
                $result=$this->db->update($query);
                if($result)
                    {
                        header('Location:quanlythuonghieu.php');
                    }
                else 
                    {
                        $alert="<span> Cập nhật không thành công</span>";
                        return $alert;
                    }
            }

           
        }

    public function delete_th($math)
        {
            $query="DELETE FROM thuonghieu WHERE math=$math";
            $result=$this->db->delete($query);
            if($result)
                {
                    header('Location:quanlythuonghieu.php');
                }
            else 
                {
                    $alert="<span> Xóa không thành công</span>";
                    return $alert;
                }        
        }

        public function show_th_frontend()
        {
            $query="SELECT * FROM thuonghieu order by math asc";
            $result=$this->db->select($query);
            return $result;
        }

        public function getsp_th($math)
        {
            $query="SELECT * FROM sanpham WHERE math='$math' order by math desc";
            $result=$this->db->select($query);
            return $result;
        }

        public function getname_th($math)
        {
            $query="SELECT * FROM thuonghieu WHERE math='$math' order by math desc";
            $result=$this->db->select($query);
            return $result;
        }
    
} 
?> 