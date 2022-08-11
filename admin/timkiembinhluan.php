<?php include_once 'inc/header.php'?>
<?php
    $filepath= realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/user.php');
    


    $user = new user();
    if(isset($_GET['duyet']))
    {
     
            $id=$_GET['duyet'];
            
            $duyet=$user->duyet_bl( $id);
    }

?> 


<?php
    if(isset($_POST['timkiembl']))
    {
        $noidung=$_POST['noidung'];
        $timkiem=$user->timkiembl($noidung);
    }
?>

<body id="pa">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'inc/sidebar.php' ?>

                <!-- End of Topbar --> 

                 <!-- bắt đầu  Nội Dung -->
                 <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiembinhluan.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiembl" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            <br> <br>
                    
                 <table  class="table table-hover">
                     <thead>
                    <tr >
                        <th> STT</th>  
                        <th> Họ Tên  </th>
                        <th> Bình luận  </th>
                        <th> Sản phẩm </th> 
                        <th> Trạng thái  </th> 
                    </tr>
                    </thead>

                    <?php
										
										$user = new user();

										if($timkiem){ 
											$i=0;
											while($result=$timkiem->fetch_assoc())
											{ $i++;
												
											
									?>
                     <tbody>
							<tr>
									<td><?php echo $i ?> </td> 
									<td><?php echo $result['tenbl']?> </td> 
									<td><?php echo $result['binhluan']?> </td> 
                                    <td><?php echo $result['tensp']?> </td> 
                                    <td>
                                        
                                    <?php 
                                                

                                    if($result['trangthai']=='0')
														{ ?>
										<a style="color:red" href="?duyet=<?php echo $result['mabl']?> ">Chưa duyệt </a>	
										<?php }else { ?>
														
										<!-- <a style="color:green" href="#">Đang giao </a>	 -->
									    <p style="color:green"> Đã duyệt</p>	


										<?php } ?>
                                
                                    </td> 
							</tr> 
						    </tbody>
						<?php } } ?> 
                    </table>
                    <a href="danhsachbinhluan.php"> Quay lại </a>


                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>