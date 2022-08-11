<?php 
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class nhacungcap
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        

    public function insert_ncc($tenncc,$diachi,$sdt)
        {
        
            $tenncc= mysqli_real_escape_string($this->db->link, $tenncc);
            $diachi= mysqli_real_escape_string($this->db->link, $diachi);
            $sdt= mysqli_real_escape_string($this->db->link, $sdt);

            if($tenncc==""||$diachi=="" ||$sdt=="")
            {
                $alert = "Bạn phải nhập đầy đủ thông tin";
                return $alert;
            }
            else 
            {
                $query="INSERT INTO nhacungcap (tenncc, diachincc, sdtncc) VALUES('$tenncc','$diachi','$sdt')";
                $result=$this->db->insert($query);
                if($result)
                    {
                        header('Location:danhsachnhacungcap.php');

                    }                    
                else 
                    {
                        $alert="<span> Thêm không thành công</span>";
                        return $alert;
                    }
            }


        }


    public function show_ncc()
        {
            $query="SELECT * FROM nhacungcap order by mancc desc";
            $result=$this->db->select($query);
            return $result;
        }

        public function timkiemncc($noidung)
        {
            $query="SELECT * FROM nhacungcap WHERE 
            (tenncc LIKE '%$noidung%' or tenncc LIKE '%$noidung%' or diachincc LIKE '%$noidung%' or sdtncc LIKE '%$noidung%')";
            $result=$this->db->select($query);
            return $result;
        }

    public function getmancc($mancc)
        {
            $query="SELECT * FROM nhacungcap WHERE mancc ='$mancc'";
            $result=$this->db->select($query);
            return $result;
        }
    
    public function update_ncc($tenncc, $diachi, $sdt, $mancc)
        {
            $tenncc= mysqli_real_escape_string($this->db->link, $tenncc);
            $diachi= mysqli_real_escape_string($this->db->link, $diachi);
            $sdt= mysqli_real_escape_string($this->db->link, $sdt);

            $mancc= mysqli_real_escape_string($this->db->link, $mancc);

            if($tenncc==""||$diachi=="" ||$sdt=="" )
            {
                $alert = "Bạn phải nhập đầy đủ thông tin";
                return $alert;
            }
            else 
            {
                $query="UPDATE nhacungcap SET tenncc='$tenncc', diachincc='$diachi', sdtncc='$sdt' WHERE mancc='$mancc'";
                $result=$this->db->update($query);
                if($result)
                    {
                        header('Location:danhsachnhacungcap.php');
                    }
                else 
                    {
                        $alert="<span> Cập nhật không thành công</span>";
                        return $alert;
                    }
            }

           
        }

    public function delete_ncc($mancc)
        {
            $query="DELETE FROM nhacungcap WHERE mancc=$mancc";
            $result=$this->db->delete($query);
            if($result)
                {
                    header('Location:danhsachnhacungcap.php');
                }
            else 
                {
                    $alert="<span> Xóa không thành công</span>";
                    return $alert;
                }        
        }

    
} 
?> 