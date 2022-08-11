<?php
    include '../classes/giohang.php';

    require('tfpdf/tfpdf.php');
    $pdf = new tFPDF();
    $pdf->AddPage("0");
    // $pdf->SetFont('Arial','B',16);
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

    $pdf-> SetFillColor(193,229,252);

    if(isset($_GET['indonhang']))
	{
        $mand=$_GET['indonhang'];
        $time2 = $_GET['timein'];
        $ct = new giohang();
        $inhoadon = $ct->inhoadon($mand, $time2);
        $innd =$ct->innd($mand);
    }


    $pdf->Write(10,'WEBSITE BÁN SẢN PHẨM HỖ TRỢ NUÔI TRỒNG THỦY SẢN');
    $pdf->Ln(15);
    $pdf->Write(10,'HÓA ĐƠN BÁN HÀNG');
	$pdf->Ln(20);
    $pdf->Write(10,'Thông tin khách hàng');
	$pdf->Ln(10);
    // echo 'Tên khách hàng';
    $pdf->Cell(95,10,'Tên khách hàng',1,0,'C',true);
    $pdf->Cell(95,10,'Địa chỉ',1,0,'C',true);
    $pdf->Cell(95,10,'Số điện thoại',1,1,'C',true);

    if($innd){ 
        
        while($result=$innd->fetch_assoc())
        { 
	    $pdf->Cell(95,10,$result['name'],1,0,'C');
        $pdf->Cell(95,10,$result['diachi'],1,0,'C');
	    $pdf->Cell(95,10,$result['phone'],1,1,'C');

	} }

	$pdf->Ln(10);

	$width_cell=array(166,20,25,48,35);
    $pdf->Write(10,'Chi tiết đơn hàng');
	$pdf->Ln(10);

	// $pdf->Cell($width_cell[0],10,'Mã đơn hàng',1,0,'C',true);
	$pdf->Cell($width_cell[0],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[2],10,'Giá',1,0,'C',true);
    $pdf->Cell($width_cell[3],10,'Ngày đặt',1,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Tổng tiền',1,1,'C',true); 



	$pdf->SetFillColor(235,236,236); 
	$fill=false;

	$i = 0;
	if($inhoadon){ 
        
        while($row=$inhoadon->fetch_assoc())
        { 
	// $pdf->Cell($width_cell[0],20,$row['maorder'],1,0,'C',$fill);
	$pdf->Cell($width_cell[0],20,$row['tensp'],1,0,'D',$fill);
	$pdf->Cell($width_cell[1],20,$row['soluong'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],20,number_format($row['gia']),1,0,'C',$fill);
	$pdf->Cell($width_cell[3],20,$row['ngaymua'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],20,number_format($row['soluong']*$row['gia']),1,1,'C',$fill);

   
	$fill = !$fill;

	} }
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
	$pdf->Ln(10);
    
    $pdf->Output();

    

?>