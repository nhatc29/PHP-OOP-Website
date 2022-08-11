<?php include_once 'include/header.php'?>
<?php include_once 'include/slidebar.php'?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['capnhat']))
	{	
		$magh = $_POST['magh'];
		$soluong = $_POST['soluong'] ; 
		$update_giohang = $ct->update_giohang($soluong,$magh);
	}

	if(isset($_GET['magh']))
	{      
		$magh= $_GET['magh'];
		$delgh=$ct->delete_gh($magh);
	}
?> 
	<?php
		if(isset($update_giohang))
			{
				echo $update_giohang;
			}

			if(isset($delgh))
			{
				echo $delgh;
			}
	?>
					
						  <div class="panel-body">
						  	<table class="table table-hover"  >
								<thead >
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th >Hình ảnh</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>Thành tiền</th>
									<th>Xóa </th>
									
								</thead>

								<tbody>
									<?php 
										$get_spcart = $ct-> get_spcart();
										$stt=1;
										$tongtien = 0;
											if ($get_spcart)	{
												while($result=$get_spcart->fetch_assoc()) {
													$tongtien += ( $result['gia']*$result["soluong"])
									?> 
										<tr>
											<td style="width:2%"><?php echo $stt++ ?></td>
											<td style="width:30%;"> <?php echo $result["tensp"]; ?></td>
											<td style="width:30%;"> <img src="hinhanh/<?php echo $result["hinhanh"];?>" style="width:50%"> </td>
											
											<form action="" method="POST">
											<td style="width:20%;"> 
											<input  type="hidden" name="magh" value="<?php echo $result["magh"]; ?>">
											<input style="width:30%; text-align:center" type="number" name="soluong" value="<?php echo $result["soluong"]; ?>" min='1'>
											 <button type="submit" class=" btn-info" name="capnhat"> Cập Nhật </button></td>
											</form>

											<td> <?php echo number_format( $result['gia'],0,',','.').'vnđ'?></td>
											<td> <?php echo number_format( $result['gia']*$result["soluong"],0,',','.').'vnđ'  ?></td>
											
											<td><a onclick="return confirm('Bạn có thật sự muốn xóa sản phẩm này khỏi giỏ hàng?')" href="?magh=<?php echo $result["magh"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
										</tr>
										<?php } } ?>
										<tr>
										<td colspan="2">Tổng tiền:<?php echo number_format($tongtien,0,',','.').'vnđ' ?>  </td>
										
										<td colspan="2"><a class="btn btn-info" href="hinhthucthanhtoan.php"> Đặt hàng </a> </td>
										
									</tr>
									<tr> 
									<td colspan="2"><a class="btn btn-info" href="chitietdonhang.php"> Xem đơn hàng </a> </td>

									</tr>
								</tbody>

							</table>
						  	
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once 'include/footer.php'?>	