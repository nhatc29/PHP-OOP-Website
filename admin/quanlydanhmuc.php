<?php 
include '../classes/danhmucsanpham.php';
?>





<?php
	$dm = new danhmucsanpham();

    if(isset($_GET['delmadm']))
        {      
            $madm= $_GET['delmadm'];
            $deldm=$dm->delete_dm($madm);
        }
?> 

<?php include_once 'inc/header.php'?>
<style> 
    .has-error{
        color:red
    }

    .success{
        color:green
    }
    </style> 


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'inc/sidebar.php' ?>

                <!-- End of Topbar --> 

                 <!-- bắt đầu  Nội Dung -->

                 <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemdanhmuc.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiemdm" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            <br> <br>
                    
                 <table  class="table table-hover">
                    <tr >
                        <th> Số thứ tự  </th>  
                        <!-- <th> Mã Danh Mục  </th>   -->
                        <th> Tên Tên Danh Mục  </th> 
                        <th>
                            <form action="themdanhmuc.php">
                            <button type="submit" class="btn btn-success" name="btsua1">Thêm mới</button>
                            </form> 
                        </th>
                       
                    </tr>


                            <?php
                                $show_dm = $dm->show_dm();
                                if($show_dm)
                                    {   $i=0;
                                        while ($result= $show_dm-> fetch_assoc())
                                            {
                                            $i++;
                                             echo"<tr>";
                                            echo"<td>".$i."</td>";
                                            // echo"<td>".$result["madm"]."</td>";
                                            echo"<td>".$result["tendm"]."</td>";
                                            echo"<td>";
                                            ?> 
                                            <a onclick="return confirm('Bạn có thật sự muốn xóa danh mục này?')" href="?delmadm=<?php echo $result["madm"];?>">Xóa</a>
                                            
                                            <a href="suadanhmuc.php?madm=<?php echo $result['madm']; ?>">Sửa</a>
                                            <?php
                                            echo"</td>";
                                            echo"</tr>";

                                            }
                                    }
                            ?> 
                           
                        </table>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($deldm))
                                        {
                                            echo $deldm;
                                        }
                                ?> 
                            </span>
                        </div>

                        <div class="success">
                            <span> 
                                <?php
                                    if(isset($deldm))
                                        {
                                            echo $deldm;
                                        }
                                ?> 
                            </span>
                        </div>


                        
                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>