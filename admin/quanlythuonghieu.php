<?php 
include '../classes/thuonghieu.php';
?>



<?php
	$th = new thuonghieu();

    if(isset($_GET['delmath']))
        {      
            $math= $_GET['delmath'];
            $delth=$th->delete_th($math);
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
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemthuonghieu.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiemth" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            <br> <br>
                    
                 <table  class="table table-hover">
                    <tr >
                        <th> Số thứ tự  </th>  
                        <!-- <th> Mã Thương Hiệu  </th>   -->
                        <th> Tên Thương Hiệu  </th> 
                        <th>
                            <form action="themthuonghieu.php">
                            <button type="submit" class="btn btn-success" name="btsua1">Thêm mới</button>
                            </form> 
                        </th>
                       
                    </tr>


                            <?php
                                $show_th = $th->show_th();
                                if($show_th)
                                    {   $i=0;
                                        while ($result= $show_th-> fetch_assoc())
                                            {
                                            $i++;
                                             echo"<tr>";
                                            echo"<td>".$i."</td>";
                                            // echo"<td>".$result["math"]."</td>";
                                            echo"<td>".$result["tenth"]."</td>";
                                            echo"<td>";
                                            ?> 
                                            <a onclick="return confirm('Bạn có thật sự muốn xóa thương hiệu này?')" href="?delmath=<?php echo $result["math"];?>">Xóa</a>
                                            
                                            <a href="suathuonghieu.php?math=<?php echo $result['math']; ?>">Sửa</a>
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
                                    if(isset($delth))
                                        {
                                            echo $delth;
                                        }
                                ?> 
                            </span>
                        </div>

                        <div class="success">
                            <span> 
                                <?php
                                    if(isset($delth))
                                        {
                                            echo $delth;
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