<?php include_once 'include/header.php'?>
<?php include_once 'include/slidebar.php'?>
	<?php 

		if(!isset($_GET['maspct']) || $_GET['maspct'] == NULL )
		{
			echo "<script>window.location='404.php'</script>";
		}
		else 
		{            
			$maspct= $_GET['maspct'];
		}
		

			if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['themgiohang']))
				{
					$soluong = '1' ; 
					$themgiohang = $ct->themgiohang($maspct,$soluong);
				}
				


		if(isset($_POST['submit_bl']))
			{
					$binhluan=$user->insert_bl();
			}
	
				
	?>


	
	
					
<div class="panel-body">

						<?php
							$check_giohang=$ct->check_giohang($maspct); 
						?>
						 
						<div class="chitietsanpham">
							<?php
								$getctsp=$sp->getctsp($maspct);
								if($getctsp){
									while($result=$getctsp->fetch_assoc()) {
							?>
									<div class="hinhanh_ctsanpham">
									<img  style="width:100%;" src="hinhanh/<?php echo $result["hinhanh"]; ?>"> 
									</div> 

									<div class="ctsp">
										<h3><span ><?php  echo $result['tensp'] ?></span> </h3>
										<p>Giá: <span style="color:red"><?php echo number_format( $result['gia'],0,',','.').'vnđ'?></span><p>
										<p>Mô tả: <span ><?php echo $result['chitietsanpham']?></span><p>

			

										<br>
										<form action="?maspct=<?php echo $result['masp'];?>" method="POST">
										
										<?php
										if($login_check==false){ ?>
										
										<a href="login.php" > Đăng nhập để mua hàng </a>
											<?php } else { ?>

											<?php if($check_giohang){  ?>
												<p style="color:green"> Sản phẩm đã được thêm vào giỏ hàng </p>
											<?php } else { ?>

  										<button type="submit" name="themgiohang" class="btn btn-info">Thêm vào giỏ hàng</button>
										  <?php } } ?>
										</form>
										
										
										<?php } }?>
									
									</div>
						</div>
						



					

						  </div>
						</div>

										</br>	
										<div class="row"> 
											<h3 style="color:#0099CC"><strong>Bình luận sản phẩm </strong></h3>

											<?php
												if(isset($binhluan))
													{
														echo $binhluan;
													}

											?>
											<form action="" method="POST">
											<p> <input type="hidden" value="<?php echo $maspct ?>" name="spid_bl"></p>
											<p><input type="text" placeholder="Tên người bình luận" class="form-control" name="tenbl"></p>
											<p><textarea rows="5"style="resize:none" placeholder="Nhập bình luận" class="form-control" name="binhluan"></textarea></p>
											<p> <input type="submit" name="submit_bl" class="btn btn-info" value="Gửi bình luận"></p>
											</form>
										</div>									
										</br>

										
										</br>
										
    
										 <?php	
										$get_bl=$user-> show_bl_id($maspct);
										
										if($get_bl){ 
										
											while($result=$get_bl->fetch_assoc())
											{ if($result['trangthai']==1) {
											?> 
											

											<table  class="table table-hover">
												<thead>
												<tr >
													<th> <?php echo $result['tenbl'] ?></th>  
												</tr>
												</thead>

											<?php
					
												
											
									?>
                    					 <tbody>
												<tr>
	<td><?php echo $result['binhluan']?> </td>
							</tr> 
						    </tbody>
						<?php } } }?> 
                    </table>





											
										
										</br>
										</br>
										</br>
										</br>
										</br>
										</br>
										
									


						
		<?php include_once 'include/footer.php'?>	