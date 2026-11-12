<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	  </head>
    <body>
    <?php    
      ob_start(); 
      date_default_timezone_set('Asia/Jakarta');     
      class PDF extends FPDF {
 	  }
/*---- header selesai ---*/

    $pdf=new PDF('L','cm','A4');
    $pdf->Open();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',10);
 
/* setting header table */     
   
    $cek=0;
	  // $namapegawai='';
	  $periode='';
	  $tahun='';	 
	 
	  foreach($dataku as $data1)
	  {
      if ($cek==0){	    	 
			  $nik=$data1->nik;	 
	    }
      $cek=1;
    }
	 
		$pdf->Cell(16 , 0.5,'DATA RIWAYAT SERTIFIKASI KEAHLIAN (SKA)', 0, 'LR','R');

    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Ln();
    $pdf->Ln();			  

    $pdf->SetFont('Times','B',8);			  			 			 			    

    $ok=0;
    $cok=0;

    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(8  , 0.5,'Klasifikasi', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Kode SKA', 1, 'LR','C',true);
    $pdf->Cell(5  , 0.5,'Asosiasi', 1, 'LR','C',true);
    $pdf->Cell(5  , 0.5,'NIR SKA', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Tgl Mulai', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Tgl Selesai', 1, 'LR','C',true);
    // $pdf->Ln();
    // $pdf->Cell(3  , 0.5,'', 1, 'LR','C',true);
    // $pdf->Cell(11  , 0.5,'', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'1', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'2', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'3', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'4', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'5', 1, 'LR','C',true);	  
    $pdf->SetFont('Times','',8);
	  foreach($dataku as $data2)
	  {
      $pdf->Ln();
      $pdf->Cell(8 , 0.5, $data2->namaska, 'LTRB',0,'L',0);
      $pdf->Cell(2 , 0.5, $data2->kodeska, 'LTRB',0,'L',0);
      $pdf->Cell(5 , 0.5, $data2->asosiasi, 'LTRB',0,'L',0);
      $pdf->Cell(5 , 0.5, $data2->nirska, 'LTRB',0,'L',0);
      $pdf->Cell(3 , 0.5, $data2->mulai, 'LTRB',0,'L',0);
      $pdf->Cell(3 , 0.5, $data2->selesai, 'LTRB',0,'L',0);

      // if($data2->ket2=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket3=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket4=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket5=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket6=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }                        
	  }	
	  
		     $pdf->Ln();
		     $pdf->Ln();	 			

     // $pdf->SetY(-2);
 
$pdf->Output("cetakska.pdf","I"); 
	
 ?>   
</body>
</html>