<?php
	require '../../assets/fpdf/fpdf.php';
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../assets/logo/logo.png', 5, 5, 30 );
      $this->Cell(30);
      $this->SetTextColor(156, 128, 128);
			$this->SetFont('Arial','B',15);

		}

		function Footer()
		{
      $this->SetTextColor(156, 128, 128);
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
      $this->Cell(0,10, '',0,0,'C' );

			// $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}







?>
