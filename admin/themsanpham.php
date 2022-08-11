
<?php include_once '../classes/sanpham.php';?>
<?php include_once '../classes/danhmucsanpham.php';?>
<?php include_once '../classes/thuonghieu.php';?>
<?php include_once '../classes/nhacungcap.php';?>




<?php
	$sp = new sanpham();
	if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['themsp']))
		{
			$insertsp = $sp->insert_sp($_POST,$_FILES);
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
                    <form action="themsanpham.php" method="post" enctype="multipart/form-data" >
                        
                    <div class="form-group">
                        <label for="fullname">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Tên Sản Phẩm" name="tensp">
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
                                
                                <option value="<?php echo $result['mancc'] ?>"><?php echo $result['tenncc'] ?> </option>
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
                                
                                <option value="<?php echo $result['madm'] ?>"><?php echo $result['tendm'] ?> </option>
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
                                
                                <option value="<?php echo $result['math'] ?>"><?php echo $result['tenth'] ?> </option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                        </div>


                       
                        

                        <div class="form-group">
                        <label for="address">Giá</label>
                        <input type="number" class="form-control" id="address" placeholder="Giá" name="gia">
                        </div>

                        <div class="form-group">
                        <label for="address">Số lượng</label>
                        <input type="number" class="form-control" id="address" placeholder="Số lượng" name="soluong">
                        </div>

                        <div class="form-group">
                        <label for="comment">Chi Tiết Sản Phẩm</label>
                        <textarea class="form-control" rows="5" id="comment" name="chitietsp"></textarea>
                        </div>

                        <div class="form-group">
                        <label for="image">Hình Ảnh</label> <br>
                        <input type="file" class="form-control" id="phone" placeholder="Hình ảnh" name="c_img">
                        </div>
                        
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($insertsp))
                                        {
                                            echo $insertsp;
                                        }
                                ?> 
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary" name="themsp">Thêm</button>

                        
                    </form>
                    </div>

                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>