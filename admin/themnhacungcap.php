<?php include_once '../classes/nhacungcap.php'?>
<?php
	$ncc = new nhacungcap();
	if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$tenncc = $_POST['txt_tenncc'];
            $diachi = $_POST['txt_diachincc'];
			$sdt = $_POST['txt_sdtncc'];
			$insertncc = $ncc->insert_ncc($tenncc, $diachi, $sdt);
		}
?>

<?php include_once 'inc/header.php'?>
<style> 
    .has-error{
        color:red
    }
    </style> 

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->

        <?php include_once 'inc/sidebar.php' ?>

        <!-- End of Sidebar -->

<div class="container">
                    <h2>Thêm Nhà cung cấp</h2>
                    

                             
                    <form action="themnhacungcap.php" method="post" style="width:50%">
                        <div class="form-group">
                        <div class="form-group">
                        <label for="fullname">Nhập tên nhà cung cấp</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Tên nhà cung cấp" name="txt_tenncc">
                        </div>
                        <div class="form-group">
                        <label for="fullname">Nhập địa chỉ nhà cung cấp</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Địa chỉ nhà cung cấp" name="txt_diachincc">
                        </div>

                        <div class="form-group">
                        <label for="fullname">Nhập số điện thoại nhà cung cấp</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Số điện thoại nhà cung cấp" name="txt_sdtncc">
                        </div>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($insertncc))
                                        {
                                            echo $insertncc;
                                        }
                                ?> 
                            </span>
                        </div>
                                <br>
                        <button type="submit" class="btn btn-primary">Thêm</button>

                        
                    </form>
                    </div>           
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>