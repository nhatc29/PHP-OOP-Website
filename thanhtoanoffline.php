
<?php include 'include/header.php' ?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order')
		{
			$mand=Session::get('mand');
			$insertorder= $ct->insert_order($mand);
			$del_gh=$ct->delete_all_gh();
			header('Location:success.php');
		}
?>

<div id="content">
    <div class="container clearpadding" >
        <div>
        </br>
        <h4 style="color:SteelBlue"> Danh sách đơn hàng </h4>
        <div class="panel-body">
       
		<table class="table table-hover" >
								<thead >
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th >Hình ảnh</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>Thành tiền</th>
									
									
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
											<td style="width:5%"><?php echo $stt++ ?></td>
											<td style="width:15%;"> <?php echo $result["tensp"]; ?></td>
											<td style="width:20%;"> <img src="hinhanh/<?php echo $result["hinhanh"];?>" style="width:50%"> </td>
											
											<form action="" method="POST">
											<td style="width:20%;"> 
											<input  type="hidden" name="magh" value="<?php echo $result["magh"]; ?>">
											<input style="width:40%; text-align:center" type="number" name="soluong" value="<?php echo $result["soluong"]; ?>" min='1' readonly>
											</form>

											<td> <?php echo number_format( $result['gia'],0,',','.').'vnđ'?></td>
											<td> <?php echo number_format( $result['gia']*$result["soluong"],0,',','.').'vnđ'  ?></td>
											
										</tr>
										<?php } } ?>
										<tr>
										<td colspan="3">Tổng tiền:<?php echo number_format($tongtien,0,',','.').'vnđ' ?>  </td>
										
										
										
									</tr>
									
								</tbody>

							</table>



					<div class="panel panel-info ">
					  <div class="panel-heading">
					    <h3 class="panel-title text-left">Thông tin khách hàng</h3>
					  </div>
					  <div class="panel-body">


						
									<?php
						$mauser= Session::get('mand');
						$get_user=$user->show_user($mauser);    
						if($get_user){
							while($result=$get_user->fetch_assoc()){
						?>
					  	<form class="form-horizontal" action="" method="POST">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Họ tên</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="name" value="<?php echo $result['name'] ?>" readonly>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Địa chỉ</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="diachi" value="<?php echo $result['diachi'] ?>" readonly>
						    </div>
						    </div>
						  
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Số điện thoại</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="phone" value="<?php echo $result['phone'] ?>" readonly>
						    </div>
						    
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-3 col-sm-7">
						      <button type="submit" class="btn btn-info" name="gui"><a href="?orderid=order">Gửi</a></button>
							  &nbsp;&nbsp;&nbsp;
							  <a href="editprofile.php"> Thay đổi thông tin nhận hàng </a>
						    </div>
							
						  </div>
						</form>	
						<?php } } ?>			  	
					  </div>

					</div>
								
 
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