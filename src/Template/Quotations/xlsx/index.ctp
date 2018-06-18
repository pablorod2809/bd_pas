<?php 



$this->PhpExcel->getProperties()->setCreator("Broker Digital")
							 ->setLastModifiedBy("Broker Digital")
							 ->setTitle("Consulta de Cotizaciones")
							 ->setSubject("Consulta de Cotizaciones por productor");


$this->PhpExcel->setActiveSheetIndex(0)
					->setCellValue('A1', '#')
		            ->setCellValue('B1', 'Fecha')
		            ->setCellValue('C1', 'Asegurado')
		            ->setCellValue('D1', 'Ciudad')
		            ->setCellValue('E1', 'Vehículo')
		            ->setCellValue('F1', 'Modelo')
		            ->setCellValue('G1', 'Estado');

// Obtengo la ultima columna
$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn();
$char = ord($lastColumn)+1; // Incremento en uno y transformo en numero ASCII

// Recorro las preguntas de la consulta de cotización para establecerlas como títulos
foreach($questions->quotations_answers as $question)
{
	$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).'1', $question->question->description);

	$char++;
}

// Obtengo la ultima columna
$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn();
$char = ord($lastColumn)+1; // Incremento en uno y transformo en numero ASCII

$k=0;

// Recorro las propuestas de la consulta de cotización para establecerlas como títulos
foreach($questions->quotations_proposals as $proposal)
{
	$k++;
	$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).'1', 'Propuesta '.$k);
	$char++;

	$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).'1', 'Premio');

	$char++;
}


// Obtengo la ultima columna
$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn();	
$char = ord($lastColumn)+1; // Incremento en uno y transformo en numero ASCII

$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).'1', 'Solicitud Emisión');

$char++;

$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).'1', 'Fecha');

/******************* FIN DE TITULOS DE EXCEL *************************************/


$i = 1; // Contador
$j = 2; // Inicio de fila en excel



// Seteo los valores de las cotizaciones
foreach($quotations as $quotation)
{

	$this->PhpExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$j, $i)
			            ->setCellValue('B'.$j, $quotation->formatDate('dd/MM/yyyy', $quotation->contact_date))
			            ->setCellValue('C'.$j, $quotation->customer->customer_name)
			            ->setCellValue('D'.$j, $quotation->customer->place->description)
			            ->setCellValue('E'.$j, $quotation->companies_vehicle->vehicle)
			            ->setCellValue('F'.$j, $quotation->vehicle_model)
			            ->setCellValue('G'.$j, $quotation->getStatus($quotation)['name']);

		// Obtengo la ultima columna
		$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn($j);	
		$char = ord($lastColumn)+1; // Incremento en uno y transformo en numero ASCII


		// Recorro las respuestas de la consulta de cotización
		foreach($quotation->quotations_answers as $quotationAnswer)
		{
			$this->PhpExcel->setActiveSheetIndex(0)
						->setCellValue(chr($char).$j, $quotationAnswer->answer->description);

			$char++;
			            
		}
		     
		// Obtengo la ultima columna
		$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn($j);	
		$char = ord($lastColumn)+1; // Incremento en uno y transformo en numero ASCII

		$hired = "";
		$emissionRequest = "";

		// Recorro las preguntas de la consulta de cotización para establecerlas como títulos
		foreach($quotation->quotations_proposals as $proposal)
		{
			$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).$j, $proposal->coverage);

			$char++;

			$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).$j,$proposal->price);

			$char++;

			if($proposal->hired == 'T')
			{
				$hired = $proposal->coverage;
			}	

			if(!empty($proposal->emission_request))
			{
				$emissionRequest = $proposal->formatDate('dd/MM/yyyy',$proposal->emission_request);
			}
		}

		// Obtengo la ultima columna
		$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn($j);	
		$char = ord($lastColumn)+1; // Incremento en uno y transformo en numero ASCII

		$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).$j,$hired);
			
		$char++;

		$this->PhpExcel->setActiveSheetIndex(0)->setCellValue(chr($char).$j,$emissionRequest);

    $i++; // incremento contador
    $j++; // incremento el numero de fila
}

// Establezco los estilos
$titleStyle = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );


$lastColumn = $this->PhpExcel->setActiveSheetIndex(0)->getHighestColumn();
$lastRow = $this->PhpExcel->setActiveSheetIndex(0)->getHighestRow();


// Estilo de la cabecera
$this->PhpExcel->getActiveSheet()->getStyle('A1:'.$lastColumn.'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$this->PhpExcel->getActiveSheet()->getStyle('A1:'.$lastColumn.'1')->getFill()->getStartColor()->setARGB('CCCCCC');
$this->PhpExcel->getActiveSheet()->getStyle('A1:'.$lastColumn.'1')->getFont()->setBold(true);
$this->PhpExcel->getActiveSheet()->getStyle('A1:'.$lastColumn.'1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$this->PhpExcel->getActiveSheet()->getStyle('A1:'.$lastColumn.'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// Bordes a las filas
$this->PhpExcel->getActiveSheet()->getStyle('A2:'.$lastColumn.$lastRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);


// Autodimensiono las columnas
foreach(range('A',$lastColumn) as $columnID) {
    $this->PhpExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}

$this->PhpExcel->getActiveSheet()->setTitle('Cotizaciones');


