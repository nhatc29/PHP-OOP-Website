

<?php include_once 'include/header.php'?>
<?php include_once 'include/slidebar.php'?>

					
		<div class="panel-body">
	<?php 
	
		 include 'connect.php';
	?> 

	<?php
		
		if(!isset($_GET['madm']) || $_GET['madm'] == NULL )
			{
				echo "<script>window.location='404.php'</script>";
			}
		else 
			{            
				$madm= $_GET['madm'];
			}

		// if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['suasp']))
		// 	{
		// 		$updatesp = $sp->update_sp($_POST,$_FILES,$masp);
		// 	}

	?>			
		<?php
			$show_dm = $dm->getname_dm($madm);
			if($show_dm){
				while($result=$show_dm->fetch_assoc()) {
		?>			
		<h3> Danh mục:<span style="color:red"><strong><?php echo $result['tendm']; ?></strong></span> </h3>

		<?php } } ?>

		<?php
			$sp_dm = $dm->getsp_dm($madm);
			if($sp_dm){
				while($result=$sp_dm->fetch_assoc()) {
		?>
		
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="product_item">

                    <div class="product-image">
                        <a href="chitietsp.php?maspct=<?php echo $result['masp']; ?>"><img style="width:100%; height:150px;"
                                src="hinhanh/<?php echo $result["hinhanh"]; ?>" alt="" class=""></a>
                    </div>
                    <p><a href="chitietsp.php?maspct=<?php echo $result['masp']; ?>"><?php echo $result["tensp"];  ?>
                        </a></p>
                    <p class="gia_sanpham"> Giá: <?php echo number_format( $result["gia"],0,',','. ').'vnđ' ?> </p>

                </div>
            </div>
            <?php } } ?>
						
		</div>
		<?php include_once 'include/footer.php'?>	

