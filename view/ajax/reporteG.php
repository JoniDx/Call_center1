<?php
	//Incluimos librería y archivo de conexión
  require_once 'excel.php';
  activeErrorReporting();
  noCli();
  require('../../models/Class.System.php');
  require_once '../../Classes/PHPExcel.php';
  $Ids=$_POST['fecha'];
  //Objeto de PHPExcel
  $objPHPExcel = new PHPExcel();
  $db = new Conexion();
	//Consulta
	$tick = $db->query("SELECT * FROM tblp_ticket WHERE FecCap LIKE '$Ids-%' ORDER BY Encargado");

  // while($x = $db->recorrer($tick)){
  //   $Estatus[] = $x;
  // }
  // for ($i=0;$i< sizeof($Estatus);$i++) {
  //   $id=$Estatus[$i]["Estatus"];
  //   $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
  //   while($x = $db->recorrer($sql)){
  //     $lstEstatus[] = $x;
  //   }
  // }



  $fila = 7; //Establecemos en que fila inciara a imprimir los datos
  $consulta =0;
	$gdImage = imagecreatefrompng('../../assets/img/2mwcall.png');//Logotipo


	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("MWConsultorias")->setDescription("Reporte de Ticket's del ".$Ids);

	//Establecemos la pestaña activa y nombre a la
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Ticket's");

	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);

	$estiloTituloColumnas = array(
  'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
  'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => 'd64444')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
  $atrasado = array(
    'font' => array(
  	'name'  => 'Arial',
  	'bold'  => true,
  	'size' =>10,
  	'color' => array(
  	'rgb' => 'FFFFFF'
  	)
      ),
    'fill' => array(
  	'type' => PHPExcel_Style_Fill::FILL_SOLID,
  	'color' => array('rgb' => 'fd0000')
      ),
      'borders' => array(
  	'allborders' => array(
  	'style' => PHPExcel_Style_Border::BORDER_THIN
  	)
      )
  	);
  $cerrado = array(
    'font' => array(
  	'name'  => 'Arial',
  	'bold'  => true,
  	'size' =>10,
  	'color' => array(
  	'rgb' => 'FFFFFF'
  	)
      ),
    'fill' => array(
  	'type' => PHPExcel_Style_Fill::FILL_SOLID,
  	'color' => array('rgb' => '09ba00')
      ),
      'borders' => array(
  	'allborders' => array(
  	'style' => PHPExcel_Style_Border::BORDER_THIN
  	)
      )
  	);
 $nomal = array(
   'font' => array(
   'name'  => 'Arial',
   'bold'  => true,
   'size' =>10,
   'color' => array(
   'rgb' => '000000'
   )
     ),
   'fill' => array(
   'type' => PHPExcel_Style_Fill::FILL_SOLID,
   'color' => array('rgb' => 'ffe700')
     ),
     'borders' => array(
   'allborders' => array(
   'style' => PHPExcel_Style_Border::BORDER_THIN
   )
     )
   );
   $enviado = array(
     'font' => array(
     'name'  => 'Arial',
     'bold'  => true,
     'size' =>10,
     'color' => array(
     'rgb' => '000000'
     )
       ),
     'fill' => array(
     'type' => PHPExcel_Style_Fill::FILL_SOLID,
     'color' => array('rgb' => '00dfff')
       ),
       'borders' => array(
     'allborders' => array(
     'style' => PHPExcel_Style_Border::BORDER_THIN
     )
       )
     );

	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
  'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));

	$objPHPExcel->getActiveSheet()->getStyle('A1:L4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:L6')->applyFromArray($estiloTituloColumnas);

	$objPHPExcel->getActiveSheet()->setCellValue('B3', "Reporte de ticket's del ".$Ids);
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', '#Ticket');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'Cliente');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(11);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'Telefono');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Servicio');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Asunto');
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
  $objPHPExcel->getActiveSheet()->setCellValue('F6', 'Descripcion');
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
  $objPHPExcel->getActiveSheet()->setCellValue('G6', 'Codigo');
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('H6', 'Nivel');
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('I6', 'Prioridad');
  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(35);
  $objPHPExcel->getActiveSheet()->setCellValue('J6', 'Encargado');
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('K6', 'FecCap');
  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
  $objPHPExcel->getActiveSheet()->setCellValue('L6', 'Estatus');


	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $db->recorrer($tick)){
    $id = $rows['Estatus'];
    $idss = $rows['Encargado'];
    $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
    while($x = $db->recorrer($sql)){
      $sql1 = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id'");
      while($y = $db->recorrer($sql1)){
        $sql2 = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario= '$idss'");
        $w = $db->recorrer($sql2);
        $name=$w['Nombre']." ".$w['APaterno']." ".$w['AMaterno'];
        if ($name=="  ") {
          $name="No asignado";
        }
        if ($id == '4') {
          $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':L'.$fila)->applyFromArray($atrasado);
        }
        if ($id == '3') {
          $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':L'.$fila)->applyFromArray($cerrado);
        }
        if ($id == '2') {
          $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':L'.$fila)->applyFromArray($nomal);
        }
        if ($id == '1') {
          $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':L'.$fila)->applyFromArray($enviado);
        }
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['IdTicket']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['NombreU']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Telefono']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $y['Nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Asunto']);
        $f = substr($rows['Descripcion'],0,30);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $f."...");
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Codigo']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Nivel']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Prioridad']);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $name);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['FecCap']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $x['Nombre']);
      }
    }
    $consulta++;
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}


  $objPHPExcel->getActiveSheet()->setTitle('Reporte');
  $objPHPExcel->setActiveSheetIndex(0);

  getHeaders();

  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  $objWriter->save('php://output');
  exit;
?>
