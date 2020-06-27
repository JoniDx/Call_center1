<?php
  include 'formatopdf.php';
  require('../../models/Class.System.php');
  $db = new Conexion();
  require('Hora.php');
  $datot = new Time();

  $IdTicket=$_POST['IdTicket'];

	$sql= $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdTicket ='$IdTicket'");


	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(255, 255, 255);


	while($row = $db->recorrer($sql))
	{
    $Duracion=$row['Duracion'];
    $text = $datot->toHours($Duracion);
    $IdServicio=$row['IdServicio'];
    $encargado=$row['Encargado'];
		$estatus=$row['Estatus'];
		$nivel =$row['Nivel'];
		$prioridad =$row['Prioridad'];
		if ($nivel=="" ) { $nivel ="No asignado";}
		if ($prioridad=="") {	$prioridad="No asignado"; }
    $sql1 =$db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio ='$IdServicio'");
    while ($row1 = $db->recorrer($sql1)) {
      // while ($row2 = $db->recorrer($sql2)) {
				$sql3 = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$estatus'");
				while ($row3 = $db->recorrer($sql3)) {
					$sql2 = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario= '$encargado'");
					$row2 = $db->recorrer($sql2);

					$pdf->SetTextColor(0, 0, 0);

					$pdf->SetFont('Arial','B',15);
					$pdf->Cell(120,6,'MWConsultorias Call Center '.'#Ticket: '.utf8_decode($row['IdTicket']),0,0,'C');

					if ($row1['Doc']!='') {
						$pdf->Image('../../assets/img/services/'.$row1['Doc'],165,5, 40 );
					}

					$pdf->SetFont('Arial','B',12);
					$pdf->Ln(30);
					$pdf->Cell(100,7,'Cliente: '.utf8_decode($row['NombreU']),0,0,'C',1);

					$pdf->Cell(100,7,'Servicio: '.utf8_decode($row1['Nombre']),0,0,'C',1);

					$pdf->Ln(10);
					$pdf->Cell(69,7,'Telefono: '.$row['Telefono'],0,0,'C',1);
					$pdf->Cell(80,7,'Email: '.$row['Email'],0,0,'C',1);
					$pdf->Ln(15);
					$pdf->Cell(100,7,'Encargado: '.utf8_decode($row2['Nombre'])." ".utf8_decode($row2['APaterno'])." ".utf8_decode($row2['AMaterno']),0,0,'C',1);
					$pdf->Ln(10);
					$pdf->Cell(100,7,'Asunto: '.utf8_decode($row['Asunto']),0,0,'C');
					$pdf->Cell(100,7,'Fecha: '.utf8_decode($row['FecCap']),0,0,'C');

					$pdf->ln(10);
					$pdf->SetTextColor(100, 100, 100);
					$pdf->SetFont('Arial','B',10);
					$pdf->Write(5,utf8_decode($row['Descripcion']));

					$pdf->ln(40);
					$pdf->Cell(100,7,'Numero de Segimiento: '.utf8_decode($row['Codigo']),1,1,'C');
					$pdf->Cell(100,7,'Estado del Ticket: '.utf8_decode($row3['Nombre']),1,1,'C');
					$pdf->Cell(100,7,'Prioridad: Rango '.$prioridad."  /  "."Nivel: ".$nivel,1,1,'C');
          $pdf->Cell(100,7,'Duracion del Ticket : '.utf8_decode($text),1,1,'C');


				}
      // }
    }
	}
	$pdf->Output();
?>
