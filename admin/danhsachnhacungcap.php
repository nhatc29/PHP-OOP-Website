<?php 
include '../classes/nhacungcap.php';
?>

<?php
	$ncc = new nhacungcap();

    if(isset($_GET['delmancc']))
        {      
            $mancc= $_GET['delmancc'];
            $delncc=$ncc->delete_ncc($mancc);
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
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemnhacungcap.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiemncc" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            <br> <br>
                    
                 <table  class="table table-hover">
                    <tr >
                        <th> Số thứ tự  </th>  
                        <th> Tên Nhà cung cấp  </th> 
                        <th> Địa chỉ Nhà cung cấp  </th> 
                        <th> Số điện thoại nhà cung cấp </th> 

                        <th>
                            <form action="themnhacungcap.php">
                            <button type="submit" class="btn btn-success" name="btsua1">Thêm mới</button>
                            </form> 
                        </th>
                       
                    </tr>


                            <?php
                                $show_ncc = $ncc->show_ncc();
                                if($show_ncc)
                                    {   $i=0;
                                        while ($result= $show_ncc-> fetch_assoc())
                                            {
                                            $i++;
                                             echo"<tr>";
                                            echo"<td>".$i."</td>";
                                            echo"<td>".$result["tenncc"]."</td>";
                                            echo"<td>".$result["diachincc"]."</td>";
                                            echo"<td>".$result["sdtncc"]."</td>";
                                            echo"<td>";
                                            ?> 
                                            <a onclick="return confirm('Bạn có thật sự muốn xóa nhà cung cấp này?')" href="?delmancc=<?php echo $result["mancc"];?>">Xóa</a>
                                            
                                            <a href="suanhacungcap.php?mancc=<?php echo $result['mancc']; ?>">Sửa</a>
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