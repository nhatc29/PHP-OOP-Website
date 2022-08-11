
<?php include_once '../classes/sanpham.php';?>
<?php include_once '../classes/danhmucsanpham.php';?>
<?php include_once '../classes/thuonghieu.php';?>
<?php include_once '../classes/nhacungcap.php';?>





<?php
        $sp= new sanpham();

    if(!isset($_GET['masp']) || $_GET['masp'] == NULL )
        {
            echo "<script>window.location='danhsachsanpham.php'</script>";
        }
    else 
        {            
            $masp= $_GET['masp'];
        }
?> 
<?php
	$sp = new sanpham();
	if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['suasp']))
		{
			$updatesp = $sp->update_sp($_POST,$_FILES,$masp);
		}
?>

<?php include_once 'inc/header.php'?>

<style> 
    .has-error{
        color:red
    }
    </style> 


<body id="page-top">


                

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'inc/sidebar.php' ?>

        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        
                <!-- End of Topbar --> 

                 <!-- bắt đầu  Nội Dung -->
                    
                <div class="container">
                    <h2>Cập Nhật Sản Phẩm</h2>

                    <?php
                        $get_tensp = $sp->getmasp($masp);
                        if($get_tensp){
                                while($result_sp=$get_tensp->fetch_assoc()){
                           
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" >
                       
                    <div class="form-group">
                        <label for="fullname">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" value="<?php echo $result_sp['tensp'] ?>" id="fullname" placeholder="Tên Sản Phẩm" name="tensp">
                    </div>



                    <div class="form-group">
                        <label for="fullname">Lựa chọn nhà cung cấp</label>
                        <select name="nhacungcap" id="" class="form-control">
                            <?php

                                $ncc=new nhacungcap();
                                $listncc=$ncc->show_ncc();
                                
                                if($listncc) { 
                                    while($result=$listncc->fetch_assoc()){       
                            ?>
                                
                                <option
                                        <?php
                                            if($result['mancc']==$result_sp['mancc']) { echo 'selected';}
                                        ?>
                                
                                 value="<?php echo $result['mancc'] ?>"><?php echo $result['tenncc'] ?> </option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                        </div>


                    <div class="form-group">
                        <label for="fullname">Lựa chọn danh mục</label>
                        <select name="danhmuc" id="" class="form-control">
                            <?php

                                $dm=new danhmucsanpham();
                                $listdm=$dm->show_dm();
                                
                                if($listdm) { 
                                    while($result=$listdm->fetch_assoc()){       
                            ?>
                                
                                <option
                                        <?php
                                            if($result['madm']==$result_sp['madm']) { echo 'selected';}
                                        ?>
                                
                                 value="<?php echo $result['madm'] ?>"><?php echo $result['tendm'] ?> </option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                        </div>

                        <div class="form-group">
                     <label for="fullname">Lựa chọn thương hiệu</label>
                        <select name="thuonghieu" id="" class="form-control">
                            <?php
                                $th=new thuonghieu();
                                $listth=$th->show_th();
                                
                                if($listth) { 
                                    while($result=$listth->fetch_assoc()){       
                            ?>
                                
                                <option 
                                <?php
                                            if($result['math']==$result_sp['math']) { echo 'selected';}
                                        ?>
                                
                                value="<?php echo $result['math'] ?>"><?php echo $result['tenth'] ?> </option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                        </div>



                        <div class="form-group">
                        <label for="address">Giá</label>
                        <input type="number" class="form-control" value="<?php echo $result_sp['gia'] ?>" id="address" placeholder="Giá" name="gia">
                        </div>

                        <div class="form-group">
                        <label for="address">Số lượng </label>
                        <input type="number" class="form-control" value="<?php echo $result_sp['soluong'] ?>" id="address" placeholder="Số lượng" name="soluong">
                        </div>
                

                        <div class="form-group">
                        <label for="comment">Chi Tiết Sản Phẩm</label>
                        <textarea class="form-control"  rows="5" id="comment" name="chitietsp"><?php echo $result_sp['chitietsanpham']?></textarea>
                        </div>

                        <div class="form-group">
                        <label for="image">Hình Ảnh</label> <br>
                        <img style='width:20%;' src="../hinhanh/<?php echo $result_sp["hinhanh"] ?>">
                        <input type="file" class="form-control" value="<?php echo $result_sp['hinhanh'] ?>" id="phone" placeholder="Hình ảnh" name="c_img">
                        </div>
                        
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($updatesp))
                                        {
                                            echo $updatesp;
                                        }
                                ?> 
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary" name="suasp">Sửa</button>

                        
                    </form>

                                    <?php } }?> 
                    </div>

                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>