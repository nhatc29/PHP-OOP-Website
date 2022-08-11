

<?php include_once 'include/header.php'?>
<?php include_once 'include/slidebar.php'?>

					
		<div class="panel-body">
	<?php 
	
		 include 'connect.php';
	?> 

	<?php
		
        if(isset($_POST['timkiemtheogia']))
        {
            $gia1=$_POST['gia1'];
            $gia2=$_POST['gia2'];
            $locgia=$sp->locgia($gia1,$gia2);
        }
	

	?>			

		<?php
			
			if($locgia){
				while($result=$locgia->fetch_assoc()) {
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

