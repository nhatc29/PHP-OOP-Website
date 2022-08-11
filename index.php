<?php include_once 'include/header.php'?>
<?php include_once 'include/slider.php'?>

<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><img src="" alt=""><a href="" class='product_title'>Tất Cả sản phẩm
                </h3>
        </div>
        <div class="panel-body">
            <?php 
                       $laysp= $sp->show_sp();
					   if($laysp){
						   while($result=$laysp->fetch_assoc()) {
								
								?>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="product_item">

                    <div class="product-image">
                        <a href="chitietsp.php?maspct=<?php echo $result['masp']; ?>"><img
                                src="hinhanh/<?php echo $result["hinhanh"]; ?>" alt="" class=""></a>
                    </div>
                    <p ><a href="chitietsp.php?maspct=<?php echo $result['masp']; ?>"><?php echo $result["tensp"];  ?>
                        </a></p>
                    
                    <p class="gia_sanpham"> Giá: <?php echo number_format( $result["gia"],0,',','. ').'vnđ' ?> </p>

                </div>
            </div>
            <?php } } ?>
        </div>
        <div>
            Trang
            <?php
                $phantrang= $sp->phantrang();
                $sp_count = mysqli_num_rows($phantrang);
                $sp_count_button=$sp_count/12;
                $i = 0;
                for($i=1;$i<$sp_count_button;$i++)
                {
                    echo '<a href="index.php?trang='.$i.'">'.$i.' ';
                }
            ?>
        </div>
    </div>
	
</div>
 <?php include_once 'include/footer.php'?>