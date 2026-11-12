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

    $pdf=new PDF('P','cm','A4');
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
			  // $nama=$data1->ket5;	 
			  $periode=$data1->ket7;	 
			  $tahun=$data1->ket8;				  			  			  			  
	    }
      $cek=1;
    }
	 
		$pdf->Cell(12 , 0.5,'STANDAR KOMPETENSI', 0, 'LR','R');
		// $pdf->Cell(4 , 0.5,$tahun, 0, 'LR','L');			  
    $pdf->Ln();
    $pdf->Ln();			  

    // $pdf->Cell(3 , 0.5,'Periode', 0, 'LR','L');        
    // $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    // $pdf->Cell(3 , 0.5,$periode, 0, 'LR','L');        
    // $pdf->Ln();       
    // $pdf->Cell(3 , 0.5,'Tahun', 0, 'LR','L');        
    // $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    // $pdf->Cell(3 , 0.5,$tahun, 0, 'LR','L');        
    // $pdf->Ln();       
    // $pdf->Ln();       

    $pdf->SetFont('Times','B',8);			  			 			 			    

    $ok=0;
    $cok=0;

    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(5.5  , 0.5,'Kompetensi', 1, 'LR','C',true);    
    $pdf->Cell(8.5  , 0.5,'Keterangan', 1, 'LR','C',true);
    $pdf->Cell(5  , 0.5,'Nilai', 1, 'LR','C',true);
    $pdf->Ln();
    $pdf->Cell(3.5  , 0.5,'', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'', 1, 'LR','C',true);
    $pdf->Cell(8.5  , 0.5,'', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'1', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'2', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'3', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'4', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'5', 1, 'LR','C',true);	  
    $pdf->SetFont('Times','',8);
	  foreach($dataku as $data2)
	  {
      $pdf->Ln();
      $pdf->Cell(3.5 , 0.5, $data2->ket9, 'LTRB',0,'C',0);
      $pdf->Cell(2 , 0.5, $data2->ket1, 'LTRB',0,'L',0);
      $pdf->Cell(8.5 , 0.5, $data2->ket8, 'LTRB',0,'L',0);
      if($data2->ket2=='X'){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      }      

      if($data2->ket3=='X'){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      }      

      if($data2->ket4=='X'){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      }      

      if($data2->ket5=='X'){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      }      

      if($data2->ket6=='X'){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      }                        
	  }	
	  
		     $pdf->Ln();
		     $pdf->Ln();	 			

     $pdf->SetY(-3);
 
$pdf->Output("cetakstandarkompetensi.pdf","I"); 
	
 ?>   
</body>
</html>