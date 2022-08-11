
<?php include 'include/header.php' ?>


<div id="content">
    <div class="container clearpadding" >
        <div>
        </br>
        <h4 style="color:SteelBlue"> Danh sách đơn hàng </h4>
        <div class="panel-body">
     
               


        <?php 
                    include 'connect.php';
                    $sql_lietke_dh="SELECT * FROM chitietdonhang,sanpham WHERE chitietdonhang.masp=sanpham.masp 
                    AND chitietdonhang.oder_code='$_GET[code]'  ORDER BY chitietdonhang.mactdh DESC";
                    $query_lietke_dh = mysqli_query($conn,$sql_lietke_dh);

                ?> 
                <table class="table table-hover" style="align:center">
                                <thead style="align:center">
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên sản phẩm </th>
                                    <th>Số lượng </th>
                                    <th>Giá</th>
                                    <th>Thành tiền </th>
                            

                                    
                                </thead>
                                    
                    
                        
                                <tbody>
                                <?php
                            $i=0;
                            $tongtien1=0;
                            while($row=mysqli_fetch_array($query_lietke_dh))
                                {
                                    $i++;
                                    $tongtien1 +=  $row['gia']*$row["soluongmua"];
                                    
                        
                        ?> 
                                    <tr>
                                        <td><?php echo $i ?> </td> 
                                        <td><?php echo $row['oder_code'] ?> </td>
                                        <td><?php echo $row['tensp']?> </td> 
                                        <td><?php echo $row['soluongmua']?> </td> 
                                        <td> <?php echo number_format( $row['gia'],0,',','.').'vnđ'  ?></td>
                                        <td> <?php echo number_format( $row['gia']*$row["soluongmua"],0,',','.').'vnđ'  ?></td>
                                    </tr> 
                                    <?php } ?>
                                    <tr>
										<td> <strong>Tổng tiền:</strong>    <?php echo number_format($tongtien1,0,',','.').'vnđ' ?>  </td>
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