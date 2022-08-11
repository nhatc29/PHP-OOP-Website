<?php include_once 'inc/header.php'?>
	<?php
		$filepath= realpath(dirname(__FILE__));
		include_once ($filepath.'/../classes/giohang.php');
		include_once ($filepath.'/../helpers/format.php');

	?>

<?php 
	$ct = new giohang();
    if(isset($_GET['shiftid']))
        {
         
                $id=$_GET['shiftid'];
				$ngaymua = $_GET['time'];
				$shifted=$ct->shifted($id,$ngaymua);
		}
	
?> 


<?php 
    if(isset($_GET['mand']))
        {
         
                $nd=$_GET['mand'];
				$ngaymua22 = $_GET['ngaymua22'];
				$ctdh=$ct->ctdh($id,$ngaymua22);
		}
	
?> 


	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<?php include_once 'inc/sidebar.php' ?>

					<!-- End of Topbar --> 

					<!-- bắt đầu  Nội Dung -->
					<form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemdonhang.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiemdh" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            <br> <br>

		
					<table class="table table-hover" style="align:center">
									<thead style="align:center">
										<th>Số đơn hàng</th>
										<th>Ngày đặt</th>
                                        <th>Trạng Thái</th>
									</thead>
									<?php
										$ct = new giohang();
										$fm = new Format();

										$get_inbox_cart=$ct-> slorder();
										if($get_inbox_cart){ 
											$i=0;
											while($result=$get_inbox_cart->fetch_assoc())
											{ $i++;
												
											
									?>
							
									<tbody>
										<tr>
											<td><?php echo $i ?> </td> 
											<td><?php echo $fm->formatDate($result['ngaymua']) ?> </td>
                                            <td>
												<?php
													if($result['trangthai']=='0')
														{ ?>
														<a onclick="return confirm('Thay đổi trạng thái đơn hàng này?')" style="color:red" href="?shiftid=<?php echo $result['mand']?>&time=<?php echo $result['ngaymua'] ?> ">Đang xử lý </a>	
													<?php }elseif($result['trangthai']=='1') { ?>
														
													<!-- <a style="color:green" href="#">Đang giao </a>	 -->
													<p style="color:green"> Đang giao</p>	


													<?php }else { ?>
														
														<!-- <a style="color:green" href="#">Xóa đơn </a> -->
														<p style="color:green" > Đã giao hàng </p>	
	
														<?php } ?>
												
												
											</td> 
			
									
											<td>
												<a href ="chitietdonhang.php?mand=<?php echo $result['mand']?> &ngaymua22=<?php echo $result['ngaymua']?> "> Chi tiết đơn hàng </a>
											</td>
											
											<td>
												<?php if ($result['trangthai'] !=2){ ?>
												<a href ="inhoadon.php?indonhang=<?php echo $result['mand']?> &timein=<?php echo $result['ngaymua'] ?>"> In hóa đơn </a>
													<?php } ?>
												</td> 
											
										</tr> 
									</tbody>
									<?php } }  ?>

								</table>

					<!--  kết thúc Nội Dung -->  
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once 'inc/footer.php' ?>