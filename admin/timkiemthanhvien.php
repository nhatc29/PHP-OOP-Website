<?php include_once 'inc/header.php'?>
<?php
    $filepath= realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/user.php');

?> 

<?php
    	$user = new user();
    if(isset($_POST['timkiemtv']))
    {
        $noidung=$_POST['noidung'];
        $timkiem=$user->timkiemtv($noidung);
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
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemthanhvien.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiemtv" value="Tìm kiếm">
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
                        <th> Địa Chỉ  </th> 
                        <th> Số điện thoại  </th> 
                        <th> Quyền  </th> 

                    </tr>
                    </thead>

                    <?php
										

										if($timkiem){ 
											$i=0;
											while($result=$timkiem->fetch_assoc())
											{ $i++;
												
											
									?>
                     <tbody>
							<tr>
									<td><?php echo $i ?> </td> 
									<td><?php echo $result['name']?> </td> 
									<td><?php echo $result['diachi']?> </td> 
                                    <td><?php echo $result['phone']?> </td>
                                    <td>
                                        <?php 
                                            if($result['quyen'] == "1")
                                                {
                                                    echo 'Quản trị viên';
                                                }
                                            else 
                                                {
                                                    echo 'Khách hàng';
                                                }
                                        ?>
                                    </td> 

							</tr> 
						    </tbody>
						<?php } } ?> 
                    </table>

                    <a href="danhsachthanhvien.php"> Quay lại </a>


                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>