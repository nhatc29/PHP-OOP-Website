

<?php include_once 'include/header.php'?>
<?php include_once 'include/slidebar.php'?>

					
		<div class="panel-body">
	<?php 
	
		 include 'connect.php';
	?> 

	<?php
		
		if(!isset($_GET['math']) || $_GET['math'] == NULL )
			{
				echo "<script>window.location='404.php'</script>";
			}
		else 
			{            
				$math= $_GET['math'];
			}

		// if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['suasp']))
		// 	{
		// 		$updatesp = $sp->update_sp($_POST,$_FILES,$masp);
		// 	}

	?>			
		<?php
			$show_th = $th->getname_th($math);
			if($show_th){
				while($result=$show_th->fetch_assoc()) {
		?>			
		<h3> Thương Hiệu:<span style="color:red"><strong><?php echo $result['tenth']; ?></strong></span> </h3>

		<?php } } ?>

		<?php
			$sp_th = $th->getsp_th($math);
			if($sp_th){
				while($result=$sp_th->fetch_assoc()) {
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

