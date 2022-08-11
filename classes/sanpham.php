<?php  
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class sanpham
{   
    private $db;
    private $fm;

    public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        

    public function insert_sp($data,$files)
        {
            $tensp= mysqli_real_escape_string($this->db->link, $data['tensp']);
            $ncc= mysqli_real_escape_string($this->db->link, $data['nhacungcap']);
            $danhmuc= mysqli_real_escape_string($this->db->link, $data['danhmuc']);
            $thuonghieu= mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
            $gia= mysqli_real_escape_string($this->db->link, $data['gia']);
            $soluong= mysqli_real_escape_string($this->db->link, $data['soluong']);
            $chitietsp= mysqli_real_escape_string($this->db->link, $data['chitietsp']);
        
            //kiem tra hinh anh va lay hinh anh cho vao folder hinh anh
            $permited = array('jpg','jpeg','png','gif');
            $file_name=$_FILES['c_img']['name'];
            $file_size=$_FILES['c_img']['size'];
            $file_temp=$_FILES['c_img']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image="../hinhanh/".$unique_image;


            if($tensp==""|| $ncc=="" ||$danhmuc==""||$thuonghieu=="" || $gia==""||$soluong==""|| $chitietsp=="" || $file_name=="")
            {
                $alert = "Bạn phải nhập đầy đủ thông tin";
                return $alert;
            }
            else 
            {   
                move_uploaded_file($file_temp,$uploaded_image);
                $query="INSERT INTO sanpham (tensp,mancc, madm,math,gia,soluong,chitietsanpham,hinhanh) VALUES('$tensp','$ncc','$danhmuc','$thuonghieu','$gia','$soluong','$chitietsp','$unique_image')";
                $result=$this->db->insert($query);
                if($result)
                    {
                        header('Location:danhsachsanpham.php');
                    }
                else 
                    {
                        $alert="<span> Thêm không thành công</span>";
                        return $alert;
                    }
            }


        }

        public function show_spad()
        {   
            $sp_trang = 12;
            if(!isset($_GET['trang']))
                {
                    $trang=1;
                }

            else 
                {
                    $trang= $_GET['trang'];
                }
            $tungtrang=($trang-1)*$sp_trang;
            $query="SELECT * FROM sanpham,danhmucsanpham,thuonghieu,nhacungcap WHERE sanpham.madm=danhmucsanpham.madm 
            AND sanpham.math=thuonghieu.math 
            AND sanpham.mancc=nhacungcap.mancc order by masp desc ";
            $result=$this->db->select($query);
            return $result;
        }




    public function show_sp()
        {   
            $sp_trang = 12;
            if(!isset($_GET['trang']))
                {
                    $trang=1;
                }

            else 
                {
                    $trang= $_GET['trang'];
                }
            $tungtrang=($trang-1)*$sp_trang;
            $query="SELECT * FROM sanpham,danhmucsanpham,thuonghieu,nhacungcap WHERE sanpham.madm=danhmucsanpham.madm 
            AND sanpham.math=thuonghieu.math 
            AND sanpham.mancc=nhacungcap.mancc order by masp asc LiMIT $tungtrang,$sp_trang";
            $result=$this->db->select($query);
            return $result;
        }

    public function getmasp($masp)
        {
            $query="SELECT * FROM sanpham WHERE masp ='$masp'";
            $result=$this->db->select($query);
            return $result;
        }


    public function timkiemsp($noidung)
        {
            $query="SELECT * FROM sanpham,danhmucsanpham,thuonghieu,nhacungcap WHERE sanpham.madm=danhmucsanpham.madm 
            AND sanpham.math=thuonghieu.math 
            AND sanpham.mancc=nhacungcap.mancc
            AND (tensp LIKE '%$noidung%' or masp LIKE '%$noidung%' or tenncc LIKE '%$noidung%' or tendm LIKE '%$noidung%'
            or tenth LIKE '%$noidung%' or gia LIKE '%$noidung%'
            or soluong LIKE '%$noidung%'
            or chitietsanpham LIKE '%$noidung%')";
            $result=$this->db->select($query);
            return $result;
        }
    
    public function update_sp($data, $files, $masp)
        {   
            $tensp= mysqli_real_escape_string($this->db->link, $data['tensp']);
            $ncc= mysqli_real_escape_string($this->db->link, $data['nhacungcap']);
            $danhmuc= mysqli_real_escape_string($this->db->link, $data['danhmuc']);
            $thuonghieu= mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
            $gia= mysqli_real_escape_string($this->db->link, $data['gia']);
            $soluong= mysqli_real_escape_string($this->db->link, $data['soluong']);
            $chitietsp= mysqli_real_escape_string($this->db->link, $data['chitietsp']);
        
            //kiem tra hinh anh va lay hinh anh cho vao folder hinh anh
            $permited = array('jpg','jpeg','png','gif');
            $file_name=$_FILES['c_img']['name'];
            $file_size=$_FILES['c_img']['size'];
            $file_temp=$_FILES['c_img']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image="../hinhanh/".$unique_image;
            var_dump($uploaded_image);
            if($tensp==""||$ncc==""||$danhmuc=="" ||$thuonghieu=="" || $gia=="" || $chitietsp=="" ){
                $alert = "Bạn phải nhập đầy đủ thông tin";
                return $alert;
            }else{
                    if(!empty($file_name)){
                            if($file_size > 204800){
                                    
                                    $alert = "<span> Ảnh không được vượt quá 2MB </span>";
                                    return $alert;
                            }
                            elseif(in_array($file_ext,$permited)===false)
                                {
                                    
                                    $alert = "<span>Bạn chỉ có thể tải lên các file:".implode(', ', $permited)."</span>";
                                    return $alert;
                                }
                                move_uploaded_file($file_temp,$uploaded_image);
                                $query="UPDATE sanpham SET 
                                    tensp='$tensp',
                                    mancc='$ncc',
                                    madm='$danhmuc',
                                    math='$thuonghieu',
                                    gia='$gia',
                                    soluong='$soluong',
                                    chitietsanpham='$chitietsp',
                                    hinhanh='$unique_image'
                                        WHERE masp='$masp'";;
                        }else {   
                            $query="UPDATE sanpham SET 
                            tensp='$tensp',
                            mancc='$ncc',
                            madm='$danhmuc',
                            math='$thuonghieu',
                            gia='$gia',
                            soluong='$soluong',
                            chitietsanpham='$chitietsp'
                                WHERE masp='$masp'";;

                        }

               
                $result=$this->db->update($query);
                if($result)
                    {
                        header('Location:danhsachsanpham.php');
                    }
                else 
                    {
                        $alert="<span> Cập nhật không thành công</span>";
                        return $alert;
                    }
            
            }
           
        }

    public function delete_sp($masp)
        {
            $query="DELETE FROM sanpham WHERE masp=$masp";
            $result=$this->db->delete($query);
            if($result)
                {
                    header('Location:danhsachsanpham.php');
                }
            else 
                {
                    $alert="<span> Xóa không thành công</span>";
                    return $alert;
                }        
        }

        public function getctsp($masp)
        {
            $query="SELECT * FROM sanpham,danhmucsanpham WHERE masp=$masp LIMIT 1";
            $result=$this->db->select($query);
            return $result;
           
        }

        public function phantrang()
        {
            $query="SELECT * FROM sanpham ";
            $result=$this->db->select($query);
            return $result;
        }

        public function locgia($gia1, $gia2)
            {
            $query="SELECT * FROM sanpham WHERE gia BETWEEN '$gia1' AND '$gia2' ";
            $result=$this->db->select($query);
            return $result;
            }
} 
?> 