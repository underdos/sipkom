<?php
	require_once('../tcpdflib/examples/tcpdf_include.php');
	include "../controller/function.php";
	$cabang = isset($_GET['cabang']) ? strval($_GET['cabang']) : "";
	$begin = isset($_GET['tanggal_so_begin']) ? strval($_GET['tanggal_so_begin']) : "";
	$end = isset($_GET['tanggal_so_end']) ? strval($_GET['tanggal_so_end']) : "";
	$stmt = "select no_nis_sales as nis, nama_sales as nama, count(*) as total_so, sum(komisi) as komisi from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end' group by no_nis_sales";
	$stmt2 = "select sum(komisi) as total from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end'";
	$stmt1 = "select * from cabang where kode = '$cabang'";
	foreach(tampilData($stmt2) as $total)
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
	$pdf->Cell(0, 0, 'LAPORAN KOMISI SALES', 0, 2, 'L', 0,'','');
	$pdf->SetFont('helvetica', '', 9);
	$pdf->Cell(0, 0, 'Cabang '.$dataCabang['kode'].' - '.$dataCabang['nama_cabang'], 0, 1, 'L', 0,'');
	$pdf->Line(14,30, 195, 30);	
	$pdf->SetFont('helvetica', '', 7);
	$pdf->setXY(15, 40);
	$pdf->Cell(0, 0, 'Periode '.$begin.' - '.$end, 0, 2, 'L', 0,'','');
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->setXY(15, 45);
	$pdf->MultiCell(10,7,"No", 'TB', 'C', false, 0, '', '', false, 0, false, false, 7, 'M');
	$pdf->MultiCell(30,7,"NIS", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(60,7,"Nama Sales", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(20,7,"Jumlah SO", 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(30,7,"Komisi", 'TB', 'C', false, 1, '', '', false, 0, false, false, '', 'M');
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
		$pdf->MultiCell(30,7,$grid['nis'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(60,7,$grid['nama'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(20,7,$grid['total_so'], 0, 'C', true, 0, '', '', false, 0, false, false, '', 'M');
		$pdf->MultiCell(30,7,number_format($grid['komisi'],2,',','.'), 0, 'C', true, 1, '', '', false, 0, false, false, '', 'M');
		$i++;
	}
	$pdf->setXY($pdf->getX()-14.5,$pdf->getY()+3);
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->MultiCell(120,7,'TOTAL', 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->MultiCell(30,7,number_format($total['total'],2,',','.'), 'TB', 'C', false, 0, '', '', false, 0, false, false, '', 'M');
	$pdf->Output('Laporan_Komisi_Sales.pdf', 'I');
?>