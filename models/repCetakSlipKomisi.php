<?php
	require_once('../tcpdflib/examples/tcpdf_include.php');
	include "../controller/function.php";
	$cabang = isset($_GET['cabang']) ? strval($_GET['cabang']) : "";
	$begin = isset($_GET['tanggal_so_begin']) ? strval($_GET['tanggal_so_begin']) : "";
	$end = isset($_GET['tanggal_so_end']) ? strval($_GET['tanggal_so_end']) : "";
	$stmt = "select no_nis_sales as nis, nama_sales as nama, count(*) as total_so, sum(komisi) as komisi from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end' group by no_nis_sales";
	$stmt2 = "select sum(komisi) as total from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end'";
	$stmt1 = "select * from cabang where kode = '$cabang'";
	foreach(tampilData($stmt1) as $dataCabang);
	class MYPDF extends TCPDF {
	    public function Footer() {
	        $this->SetY(-15);
	        $this->SetFont('helvetica', 'I', 8);
	        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}
	$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(15, 10, 15);
	$pdf->setPrintHeader(false);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	$pdf->AddPage();
	foreach(tampilData($stmt) as $grid){
		$pdf->SetFont('helvetica', 'B', 9);
		$pdf->setXY(15,$pdf->getY(), true);
		$pdf->Cell(0, 0, 'SLIP KOMISI SALES', 0, 2, 'C', 0,'','');
		$pdf->SetFont('helvetica', '', 7);
		$pdf->setXY(15,$pdf->getY(), true);
		$pdf->Cell(0, 0, 'PT. LUXINDO RAYA', 0, 2, 'C', 0,'','');
		$pdf->SetFont('helvetica', 'B', 7);
		$pdf->setXY(15,$pdf->getY(), true);
		$pdf->MultiCell(15,7,"NIS", 0, 'L', false, 0, '', '', false, 0, false, false, 7, 'M');
		$pdf->MultiCell(5,7,":", 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(100,7,$grid['nis'], 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(18,7,"Periode", 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(5,7,":", 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(45,7,$begin." s.d ".$end, 0, 'L', false, 1, '', '', false, 0, false, false, '', 'M');
		$pdf->setXY(15, $pdf->getY()-2, true);
		$pdf->MultiCell(15,7,"Nama", 0, 'L', false, 0, '', '', false, 0, false, false, 7, 'T');
		$pdf->MultiCell(5,7,":", 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(100,7,$grid['nama'], 0, 'L', false, 0, '', '', false, 1, false, false, '', 'M');
		$pdf->setXY(15, $pdf->getY()+5, true);
		$pdf->MultiCell(15,7,"Cabang", 0, 'L', false, 0, '', '', false, 0, false, false, '', 'T');
		$pdf->MultiCell(5,7,":", 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(100,7, $cabang." - ".$dataCabang['nama_cabang'], 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->setXY(15, $pdf->getY()+7);
		$pdf->MultiCell(10,7,"No", 'TB', 'C', false, 0, '', '', false, 0, false, false, 7, 'TB');
		$pdf->MultiCell(20,6,"No SO", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(20,6,"No Seri", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(40,6,"Nama Produk", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(22,6,"Harga (satuan)", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(5,6,"", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(17,6,"Persen(%)", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(5,6,"", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(7,6,"Qty", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(5,6,"", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(25,6,"Komisi", 'TB', 'C', false, 1, '', '', false, 0, false, false, '', 'M');
		$nis = $grid['nis'];
		$stmt3 = "select * from komisi where no_nis_sales = '$nis' AND tanggal_so BETWEEN '$begin' AND '$end' order by tanggal_so";
		$pdf->SetFont('helvetica', '', 7);
		$i=1;
		foreach(tampilData($stmt3) as $grid1){
			$pdf->MultiCell(10,7,$i, 0, 'C', false, 0, '', '', false, 0, false, false, 7, 'TB');
			$pdf->MultiCell(20,6,$grid1['no_so'], 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(20,6,$grid1['no_seri_produk'], 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(40,6,$grid1['nama_produk'], 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(22,6,number_format($grid1['harga'],2,',','.'), 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(5,6,"x", 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(17,6,$grid1['persentase'], 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(5,6,"x", 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(7,6,$grid1['quantity'], 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(5,6,"=", 0, 'C', false, 0, '', '', false, 0, false, false, '', 'M');
			$pdf->MultiCell(25,6,number_format($grid1['komisi'],2,',','.'), 0, 'C', false, 1, '', '', false, 0, false, false, '', 'M');
		$i++;
		}
		$stmt2 = "select sum(komisi) as total from komisi where no_nis_sales = '$nis' AND cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end'";	
		foreach(tampilData($stmt2) as $total);
		$pdf->SetFont('helvetica', 'BI', 7);
		$pdf->MultiCell(151,7,"Total Komisi", 'TB', 'C', false, 0, '', '', false, 0, false, false, 7, 'TB');
		$pdf->MultiCell(25,6,number_format($total['total'],2,',','.'), 'TB', 'C', false, 1, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(15,7,"Terbilang", 0, 'L', false, 0, '', '', false, 0, false, false, 7, 'T');
		$pdf->MultiCell(175,7,": ".terbilang($total['total'],4)." rupiah"	, 0, 'L', false, 0, '', '', false, 0, false, false, '', 'M');	
		$pdf->setXY($pdf->getX(), $pdf->getY()+10);
		$pdf->Line(0, $pdf->getY(), 215, $pdf->getY());
		$pdf->setXY($pdf->getX(), $pdf->getY()+10);
		$y = 297-$pdf->getY();
		if($y<=40){
			$pdf->AddPage();
		}
	}
	$pdf->Output($cabang." - ".$dataCabang['nama_cabang']." (".$begin." s.d ".$end.")-KOMISI.pdf", 'I');
?>