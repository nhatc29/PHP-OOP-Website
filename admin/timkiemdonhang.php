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
				$time = $_GET['time'];
				$price = $_GET['price'];
				$shifted=$ct->shifted( $id,$time,$price);
		}
	
?> 
<?php
	if(isset($_GET['delshiftid']))
	{
	 
			$id1=$_GET['delshiftid'];
			$time1 = $_GET['time'];
			$price1 = $_GET['price'];
			$shifted1=$ct->del_shifted( $id1,$time1,$price1);
	}
?>

<?php
    if(isset($_POST['timkiemdh']))
    {
        $noidung=$_POST['noidung'];
        $timkiem=$ct->timkiemdh($noidung);
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
										<th>STT</th>
										<th>Ngày đặt hàng</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Giá</th>
										<th>Thông tin giao hàng</th>
										<th>Trạng Thái</th>

									</thead>
									<?php
										$ct = new giohang();
										$fm = new Format();

										if($timkiem){ 
											$i=0;
											while($result=$timkiem->fetch_assoc())
											{ $i++;
												
											
									?>
							
									<tbody>
										<tr>
											<td><?php echo $i ?> </td> 
											<td><?php echo $fm->formatDate($result['ngaymua']) ?> </td>
											<td><?php echo $result['tensp']?> </td> 
											<td><?php echo $result['soluong']?> </td> 
											<td><?php echo number_format($result["gia"],0,',','.').'vnđ'?> </td>
											<td><a href="thongtingiaohang.php?mand=<?php echo $result['mand'] ?>">Xem thông tin </a></td>

											<td>
												<?php
													if($result['trangthai']=='0')
														{ ?>
														<a style="color:red" href="?shiftid=<?php echo $result['maorder']?> &price=<?php echo $result['gia']?> &time=<?php echo $result['ngaymua'] ?> ">Đang xử lý </a>	
													<?php }elseif($result['trangthai']=='1') { ?>
														
													<!-- <a style="color:green" href="#">Đang giao </a>	 -->
													<p style="color:green"> Đang giao</p>	


													<?php }else { ?>
														
														<!-- <a style="color:green" href="#">Xóa đơn </a> -->
														<p style="color:green" > Đã giao hàng </p>	
	
														<?php } ?>
												
												
											</td> 
											<td>
												<?php
													if($result['trangthai']=='2')
														{ ?>
															<a onclick="return confirm('Bạn có thật sự muốn xóa đơn hàng này?')" style="color:red" href="?delshiftid=<?php echo $result['maorder']?> &price=<?php echo $result['gia']?> &time=<?php echo $result['ngaymua']?> ">Xóa đơn hàng </a>
													<?php } 
													?>
												
												
												
											</td>
											<?php if($result['trangthai'] == '0' || $result['trangthai'] == '1' ) { ?>
											<td>
												<a href ="inhoadon.php?indonhang=<?php echo $result['maorder']?> &price=<?php echo $result['gia']?> &time=<?php echo $result['ngaymua'] ?> &mand=<?php echo $result['mand'] ?>"> In hóa đơn </a>
											</td> 
											<?php } ?>
										</tr> 
									</tbody>
									<?php } }  ?>

								</table>
                                <a href="quanlydonhang.php"> Quay lại </a>

					<!--  kết thúc Nội Dung -->  
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once 'inc/footer.php' ?>