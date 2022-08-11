<?php include_once 'inc/header.php'?>
	<?php
		$filepath= realpath(dirname(__FILE__));
		include_once ($filepath.'/../classes/giohang.php');
		include_once ($filepath.'/../helpers/format.php');

	?>

<?php 
	$ct = new giohang();
  
    if(isset($_GET['mand']) && isset($_GET['ngaymua22']))
        {
                $nd=$_GET['mand'];
                $ngaymua22=$_GET['ngaymua22'];

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
										<th>Tên khách hàng</th>
                                        <th>Địa chỉ </th>
										<th>Số điện thoại</th>


									</thead>
									<?php
										$ct = new giohang();
										$fm = new Format();

										$ctdh=$ct-> ctdh($nd,$ngaymua22);
										if($ctdh){ 
											$i=0;
											while($result=$ctdh->fetch_assoc())
											{ $i++;
												
											
									?>
							
									<tbody>
										<tr>
											<td><?php echo $i ?> </td> 
											<td><?php echo $fm->formatDate($result['ngaymua']) ?> </td>
											<td><?php echo $result['tensp']?> </td> 
											<td><?php echo $result['soluong']?> </td> 
											<td><?php echo number_format($result["gia"],0,',','.').'vnđ'?> </td>
											<td><?php echo $result['name']?> </td> 
                                            <td><?php echo $result['diachi']?> </td> 
											<td><?php echo $result['phone']?> </td> 

										</tr> 
									</tbody>
									<?php } }  ?>

								</table>
                                <a href="quanlydonhang.php"> Trở lại</a>

					<!--  kết thúc Nội Dung -->  
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once 'inc/footer.php' ?>