<?php 
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>

<?php
class giohang
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function themgiohang($mactsp,$soluong)
        {   
            $soluong= mysqli_real_escape_string($this->db->link, $soluong);
            $mactsp= mysqli_real_escape_string($this->db->link, $mactsp);
            $sid=session_id();
            $query="SELECT * FROM sanpham WHERE masp='$mactsp'";
            $result = $this->db->select($query)->fetch_assoc();
            $tensp=$result["tensp"];
            $gia=$result["gia"];
            $hinhanh=$result["hinhanh"];

                $query_gh="INSERT INTO giohang (masp,sid,tensp,gia,soluong,hinhanh) 
                    VALUES('$mactsp','$sid','$tensp','$gia','$soluong','$hinhanh')";
                $insert_gh=$this->db->insert($query_gh);
                
           
            if($result)
                {
                     header('Location:cart.php');
                }
            else 
                {
                    header('Location:404.php');

                }
        }

        public function check_giohang($mactsp)
            {
                $mactsp= mysqli_real_escape_string($this->db->link, $mactsp);
                $query = "SELECT * FROM giohang WHERE masp ='$mactsp'";
                $result = $this->db->select($query);
                return $result;
            }

    public function get_spcart()
        {
            $sid=session_id();
            $query = "SELECT * FROM giohang WHERE sid ='$sid'";
            $result = $this->db->select($query);
            return $result;
        }


        public function timkiemdh($noidung)
        {
            $query="SELECT * FROM tbl_order,tbl_user WHERE tbl_order.mand=tbl_user.mand AND 
             (tensp LIKE '%$noidung%' or name LIKE '%$noidung%' or soluong LIKE '%$noidung%' 
             or gia LIKE '%$noidung%' 
             or ngaymua LIKE '%$noidung%') ";
            $result=$this->db->select($query);
            return $result;
        }

    public function update_giohang($soluong,$magh)
        {
            $soluong= mysqli_real_escape_string($this->db->link, $soluong);
            $magh= mysqli_real_escape_string($this->db->link, $magh);

            $query="UPDATE giohang SET 
            soluong='$soluong'
                WHERE magh='$magh'";;
            $result = $this->db->update($query);
            if($result)
                {
                    header('Location:cart.php');
                }
            else 
                {
                    $mgs="Cập nhật không thành công";
                    return $mgs;
                }
        }

    public function delete_gh($magh)
        {
            $query="DELETE FROM giohang WHERE magh=$magh";
            $result=$this->db->delete($query);
            if($result)
                {
                    header('Location:cart.php');
                }
            else 
                {
                    $mgs="<span> Xóa không thành công</span>";
                    return $mgs;
                }       
        }


        public function delete_all_gh()
            {
                $sid = session_id();
                $query="DELETE FROM giohang WHERE sid = '$sid'";
                $result=$this->db->select($query);
                return $result;
            }

    
    public function insert_order($user_id)
        {
            $sid=session_id();
            $query="SELECT * FROM giohang WHERE sid = '$sid'";
            $get_sp = $this->db->select($query);
            if($get_sp)
                {
                    while($result= $get_sp->fetch_assoc())
                        {
                            $masp=$result['masp'];
                            $tensp=$result['tensp'];
                            $soluong=$result['soluong'];
                            $gia=$result['gia'] *$result['soluong'];
                            $hinhanh=$result['hinhanh'];
                            $mand = $user_id;

                            $query_order="INSERT INTO tbl_order (masp,tensp,mand,soluong,gia,hinhanh) 
                            VALUES('$masp','$tensp','$mand','$soluong','$gia','$hinhanh')";
                            $insert_order=$this->db->insert($query_order);
                       
                        
                        }
                }
        }

   public function getamountprice($user_id)
        {
            
            $query="SELECT gia FROM tbl_order WHERE mand = '$user_id' AND ngaymua= now()";
            $get_price = $this->db->select($query);
            return $get_price;

        }
    public function get_cartorderedart($mand)
        {
            $query = "SELECT * FROM tbl_order WHERE mand='$mand'";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }
    public function get_inbox_cart()
        {
            $query = "SELECT * FROM tbl_order order by maorder desc ";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }
    
    public function shifted( $id,$ngaymua)
        {   
            $id= mysqli_real_escape_string($this->db->link, $id);
            $ngaymua= mysqli_real_escape_string($this->db->link, $ngaymua);
            $query="UPDATE tbl_order SET 
            trangthai= '1'
            WHERE mand='$id' AND ngaymua='$ngaymua'";
            $result = $this->db->update($query);
            return $result;
        
            
        }


        public function ctdh($nd,$ngaymua22)
        {   
            $nd= mysqli_real_escape_string($this->db->link, $nd);
            $ngaymua22= mysqli_real_escape_string($this->db->link, $ngaymua22);
            $query="SELECT * FROM tbl_order, tbl_user WHERE tbl_order.mand=tbl_user.mand 
            AND tbl_order.mand='$nd' AND ngaymua='$ngaymua22'";
            $result = $this->db->update($query);
            return $result;
            
        }

    public function shifted_conform( $id,$time,$price)
        {
            $id= mysqli_real_escape_string($this->db->link, $id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);

            $query="UPDATE tbl_order SET 
            trangthai= '2'
            WHERE mand='$id' AND ngaymua='$time' AND gia = '$price'";
            $result = $this->db->update($query);
            return $result;
        }    

    public function del_shifted( $id1,$time1,$price1)
        {   
            $id1= mysqli_real_escape_string($this->db->link, $id1);
            $time1= mysqli_real_escape_string($this->db->link, $time1);
            $price1= mysqli_real_escape_string($this->db->link, $price1);

            $query="DELETE FROM tbl_order
            WHERE maorder='$id1' AND ngaymua='$time1' AND gia = '$price1'";
            $result = $this->db->update($query);
            return $result;
        
            
        }

        public function thongke()
        {
            
            $query="SELECT * FROM tbl_order ORDER BY ngaymua ";
            $tk = $this->db->select($query);
            return $tk;

        }

        public function sanphamtrongkho()
        {
            $query="SELECT soluong FROM sanpham";
            $sl = $this->db->select($query);
            return $sl;
        }


        public function inhoadon( $id2,$time2)
        {   
            $id2= mysqli_real_escape_string($this->db->link, $id2);
            $time2= mysqli_real_escape_string($this->db->link, $time2);

            $query="SELECT * FROM tbl_order
            WHERE mand='$id2' AND ngaymua='$time2' ";
            $result = $this->db->select($query);
            return $result;
        
            
        }

        public function innd($mand)
            {
                
                $query="SELECT * FROM tbl_user WHERE mand='$mand'";
                $nd = $this->db->select($query);
                return $nd;
            }

        
        public function slorder()
            {
                $query="SELECT DISTINCT mand,ngaymua,trangthai FROM tbl_order order by ngaymua asc";
                $result = $this->db->select($query);
                return $result;
            }
        
    


    
} 
?> 