<?php
	require_once('../tcpdflib/examples/tcpdf_include.php');
	include "../controller/function.php";
	$cabang = isset($_GET['cabang']) ? strval($_GET['cabang']) : "";
	$begin = isset($_GET['tanggal_so_begin']) ? strval($_GET['tanggal_so_begin']) : "";
	$end = isset($_GET['tanggal_so_end']) ? strval($_GET['tanggal_so_end']) : "";
	$stmt = "select penjualan.no_so, penjualan.tanggal_so, penjualan.no_seri_produk, penjualan.quantity, penjualan.no_nis_sales, penjualan.nama_customer, penjualan.telp_customer, produk.nama_produk, sales.nama_sales from penjualan, produk, sales where produk.no_seri = penjualan.no_seri_produk AND sales.nis = penjualan.no_nis_sales AND penjualan.cabang = '$cabang' AND status = 'approve' AND penjualan.tanggal_so BETWEEN '$begin' AND '$end' order by penjualan.no_nis_sales asc";
	$stmt1 = "select * from cabang where kode = '$cabang'";
	foreach(tampilData($stmt1) as $dataCabang);
	class MYPDF extends TCPDF {
	    public function Footer() {
	        $this->SetY(-15);
	        $this->SetFont('helvetica', 'I', 8);
	        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}
	$pdf = new MYPDF('L', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(30, 70, 20);
	$pdf->setPrintHeader(false);
	$pdf->SetAutoPageBreak(TRUE, 15);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	$pdf->AddPage();
	$image_file = K_PATH_IMAGES.'luxindo.jpg';
	$pdf->Image($image_file, 5, 0, 40, '', 'JPG', '', 'M', false, 300, '', false, false, 0, false, false, false);
	$pdf->SetFont('helvetica', 'B',17);
	$pdf->setXY(45,18, true);
	$pdf->Cell(0, 13, 'PT. Luxindo Raya', 0, 2, 'L', 0, '','','D','B');
	$pdf->SetFont('helvetica', 'B', 10);
	$pdf->setXY(45,18, true);
	$pdf->Cell(0, 0, 'LAPORAN PENJUALAN', 0, 2, 'L', 0,'','');
	$pdf->SetFont('helvetica', '', 9);
	$pdf->Cell(0, 0, 'Cabang '.$dataCabang['kode'].' - '.$dataCabang['nama_cabang'], 0, 1, 'L', 0,'');
	$pdf->Line(14,30, 280, 30);	
	$pdf->SetFont('helvetica', '', 7);
	$pdf->setXY(15, 40);
	$pdf->Cell(0, 0, 'Periode '.$begin.' - '.$end, 0, 2, 'L', 0,'','');
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->setXY(15, 45);
	$pdf->MultiCell(10,7,"No", 'TB', 'C', false, 0, '', '', false, 0, false, false, 7, 'M');
	$pdf->MultiCell(15,7,"No SO", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(20,7,"Tgl SO", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(30,7,"No Seri", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(30,7,"Nama Produk", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(15,7,"Quantity", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(20,7,"NIS", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(50,7,"Nama Sales", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(50,7,"Nama Qustomer", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(25,7,"Telp", 'TB', 'C', false, 1, '', '', false, 0, false, false, '', 'M');
	$pdf->SetFont('helvetica', '', 7);
	$i =  1;
	foreach(tampilData($stmt) as $grid){
		$pdf->setXY(15, 55+(7*($i-1)));
		if ($i % 2 == 0){
			$pdf->setFillColor(198,200,198);
		} else{
			$pdf->setFillColor(231,232,231);
		}
		$pdf->MultiCell(10,7,$i, 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(15,7,$grid['no_so'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(20,7,$grid['tanggal_so'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(30,7,$grid['no_seri_produk'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(30,7,$grid['nama_produk'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(15,7,$grid['quantity'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(20,7,$grid['no_nis_sales'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(50,7,$grid['nama_sales'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(50,7,$grid['nama_customer'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(25,7,$grid['telp_customer'], 0, 'C', true, 1, '', '', false, 0, false, false, '', 'M');
		$i++;
	}
	$pdf->Line($pdf->getX()-14.5,$pdf->getY()+3, 280, $pdf->getY()+3);
	$pdf->Output('example_001.pdf', 'I');

?>