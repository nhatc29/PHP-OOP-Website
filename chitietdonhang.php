
<?php include 'include/header.php' ?>

<?php 
	$ct = new giohang();
    if(isset($_GET['conformid']))
        {
         
                $id=$_GET['conformid'];
				$time = $_GET['time'];
				$price = $_GET['price'];
				$shifted_conform=$ct->shifted_conform( $id,$time,$price);
        }

		if(isset($_GET['huydon']))
	{
	 
			$id1=$_GET['huydon'];
			$time1 = $_GET['time'];
			$price1 = $_GET['price'];
			$shifted1=$ct->del_shifted( $id1,$time1,$price1);
	}

	
?> 
 
<div id="content">
    <div class="container clearpadding" >
        <div>
        </br>
        <h4 style="color:SteelBlue"> Chi tiết đơn hàng </h4>
        <div class="panel-body">
       
		<table class="table table-hover" style="text-align:center">
								<thead >
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th >Hình ảnh</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>Thành tiền</th>
									<th>Ngày đặt</th>
									<th>Trạng thái </th>
									
									
								</thead>

								<tbody>
									<?php 
										$mand= Session::get('mand');
										$get_cartordered = $ct->get_cartorderedart($mand);
										$stt=1;
										$tongtien = 0;
											if ($get_cartordered)	{
												while($result=$get_cartordered->fetch_assoc()) {
													$tongtien += ( $result['gia']*$result["soluong"])
									?> 
										<tr>
											<td style="width:2%"><?php echo $stt++ ?></td>
											<td style="width:15%;"> <?php echo $result["tensp"]; ?></td>
											<td style="width:17%; text-align:center"> <img src="hinhanh/<?php echo $result["hinhanh"];?>" style="width:50%"> </td>
											
											<form action="" method="POST">
											<td style="width:8%;"> 
											<input style="width:70%; text-align:center" type="number" name="soluong" value="<?php echo $result["soluong"]; ?>" min='1' readonly>
											</form>

											<td style="width:10%;"> <?php echo number_format( $result['gia'],0,',','.').'vnđ'?></td>
											<td style="width:10%;"> <?php echo number_format( $result['gia']*$result["soluong"],0,',','.').'vnđ'  ?></td>
											<td style="width:15%;" > <?php echo $fm->formatDate($result['ngaymua']);  ?></td>

											<td style="width:10%;"> 
												<?php
													if($result['trangthai']=='0')
														{
															echo '<span style="color:red">Đang xử lý</span>'; 

														}
													elseif($result['trangthai']=='1')
														{ 
															echo '<span style="color:green">Đang giao hàng</span>'; 

														}
													else 
														{
															echo '<span style="color:green">Đã nhận hàng</span>'; 

														}
												?>
											<td> 
											<td style="width:5 %;"> 
												<?php
													if($result['trangthai']=='0')
														{
															echo ''; 
														}
													else if($result['trangthai']=='1')
														{ ?>
															<a onclick="return confirm('Đã nhận được hàng?')" style="color:red" href="?conformid=<?php echo $result['mand']?> &price=<?php echo $tien=$result['gia']*$result["soluong"]?> &time=<?php echo $result['ngaymua'] ?> ">Đã nhận được hàng </a>	
															<?php
														}
													else 
														{
															echo '<span style="color:green">Đã nhận hàng</span>'; 

														}
												?>
											<td>
											
											<?php 	
											if($result['trangthai']=='0') { ?>
											<td ><a onclick="return confirm('Bạn có thật sự muốn xóa hủy đơn hàng này?')" href="?huydon=<?php echo $result['maorder']?> &price=<?php echo $result['gia']?> &time=<?php echo $result['ngaymua']?> " style="color:red"><strong>Hủy đơn</strong></a></td>
											<?php } ?>
											
										</tr>
										<?php } } ?>
										<tr>
										<td colspan="3"><strong>Tổng tiền:</strong><?php echo number_format($tongtien,0,',','.').'vnđ' ?>  </td>

									</tr>
									
								</tbody>

							</table>



				
								
 
<div id="footer">
    <div class='container'>
        <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>CỬA HÀNG DỤNG CỤ THỂ THAO LIBERTY</strong><br>
              <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Địa chỉ: Nguyễn Thiện Thành - K4 - P5 - TP.Trà Vinh<br>
              <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Điện thoại: 0326873520<br>
                    </address>
                
        </div>
    </div>
</div>
</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>