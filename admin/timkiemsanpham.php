
<?php 

include '../classes/sanpham.php';
?>
<?php
	$sp = new sanpham();
?>
<?php

    if(isset($_GET['delmasp']))
        {      
            $masp= $_GET['delmasp'];
            $delsp=$sp->delete_sp($masp);
        }
?> 

<?php
    if(isset($_POST['timkiem']))
    {
        $noidung=$_POST['noidung'];
        $timkiem=$sp->timkiemsp($noidung);
    }
?>

<?php include_once 'inc/header.php'?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'inc/sidebar.php' ?>
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemsanpham.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiem" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            <br> <br>
                <!-- End of Topbar --> 

                 <!-- bắt đầu  Nội Dung -->
                    
                 <table  class="table table-hover">
                    <tr >
                        <!-- <th> Mã Sản Phẩm  </th>   -->
                        <th> STT </th> 
                        <th> Tên Sản Phẩm  </th>
                        <th> Nhà cung cấp  </th> 
                        <th> Danh mục   </th> 
                        <th> Thương hiệu   </th> 
                        <th> Giá </th>
                        <th> Số lượng </th> 
                        <th> Mô Tả Sản Phẩm </th> 
                        <th> Hình Ảnh  </th> 
                        <th>  <form action="themsanpham.php">
                            <button type="submit" class="btn btn-success" name="btsua1">Thêm</button>
                            </form>  </th>
                    </tr>   



                            <?php 
                                                                
                                if($timkiem)
                                { $i=0;
                                    while ($result= $timkiem-> fetch_assoc())
                                        {
                                            $i++;
                                            echo"<tr>";
                                            echo"<td>".$i."</td>";
                                            echo"<td>".$result["tensp"]."</td>";
                                            echo"<td>".$result["tenncc"]."</td>";
                                            echo"<td>".$result["tendm"]."</td>";
                                            echo"<td>".$result["tenth"]."</td>";
                                            echo"<td>".number_format($result["gia"],0,',','.').'vnđ'."</td>";
                                            echo"<td>".$result["soluong"]."</td>";
                                            echo"<td>".$result["chitietsanpham"]."</td>";
                                            echo"<td><img style='width:50%;' src='../hinhanh/".$result["hinhanh"]."'/></td>";
                                            echo"<td>";
                                                ?> 
                                                <a onclick="return confirm('Bạn có thật sự muốn xóa sản phẩm này?')" href="?delmasp=<?php echo $result["masp"];?>">Xóa</a>
                                                <?php   
                                            ?>
                                            <a href="suasanpham.php?masp=<?php echo $result['masp']; ?>">Sửa</a>
                                            <?php
                                                echo"</td>";

                                            echo"</tr>";
                                        
                                        }
                                }
                                else 
                                echo" 0 result ";
                            
                            ?> 
                        </table>
                        <a href="danhsachsanpham.php"> Quay lại </a>


                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once 'inc/footer.php' ?>