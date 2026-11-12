<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <!-- FUSION CHARTS -->
	</head>
    <body>
    <?php    
	    ob_start();   
      date_default_timezone_set('Asia/Jakarta');     
      class PDF extends FPDF {}
/*---- header selesai ---*/

      $pdf=new PDF('L','cm','A4');
      $pdf->Open();
      $pdf->AliasNbPages();
      $pdf->AddPage();
      $pdf->SetFont('Times','',9);
      $ok=0;
	    $kra=0;
	    $kba=0;
	    foreach($dataku as $data1)
	    {
        if ($ok==0){
  	      // $kra=$data1->totalnilkra;
	        // $kba=$data1->totnilkba;
          $tahun=$data1->tahun;                                          

          if($data1->periode==1){
            $periode='PERIODE I';  
          }elseif($data1->periode==2){
            $periode='PERIODE II';
          }elseif($data1->periode==3){
            $periode='PERIODE III';
          }elseif($data1->periode==4){
            $periode='PERIODE IV';
          }          

		     $kekuatan1=substr($data1->kekuatan,0,18); 
		     $kekuatan2=substr($data1->kekuatan,19,18); 
		     $kekuatan3=substr($data1->kekuatan,38,18); 
		     $kekuatan4=substr($data1->kekuatan,57,18); 
		     $kekuatan5=substr($data1->kekuatan,76,18); 
		     $kekuatan6=substr($data1->kekuatan,95,18); 

		     $kelemahan1=substr($data1->kelemahan,0,18); 
		     $kelemahan2=substr($data1->kelemahan,19,18); 
		     $kelemahan3=substr($data1->kelemahan,38,18); 
		     $kelemahan4=substr($data1->kelemahan,57,18); 
		     $kelemahan5=substr($data1->kelemahan,76,18); 

		     $tindak1=substr($data1->tindaklanjut,0,18); 
		     $tindak2=substr($data1->tindaklanjut,19,18); 
		     $tindak3=substr($data1->tindaklanjut,38,18); 
		     $tindak4=substr($data1->tindaklanjut,57,18); 
		     $tindak5=substr($data1->tindaklanjut,76,18); 

		     $jadwal1=substr($data1->jadwal,0,18); 
		     $jadwal2=substr($data1->jadwal,19,18); 
		     $jadwal3=substr($data1->jadwal,38,18); 

		     $pdf->SetFont('Times','',14);
         $pdf->Cell(18,0.5,'HASIL PENILAIAN KINERJA',0,0,'R');   
			   $pdf->Ln();			 
         $pdf->Cell(14.5 , 0.5,$periode, 0, 'LR','R');       
         $pdf->Cell(2 , 0.5,'TAHUN', 0, 'LR','C');        
         $pdf->Cell(2 , 0.5,$tahun, 0, 'LR','L');                 
         // $pdf->Cell(11,0.5,$data1->ket3,0,0,'R');   			 			 
         // $pdf->Cell(2,0.5,'TAHUN',0,0,'R');   			 
         // $pdf->Cell(2,0.5,$data1->ket4,0,0,'L');   			 			 			 			 
			   $pdf->Ln();
         $pdf->Ln();			  		
		     $pdf->SetFont('Times','',9);
         $pdf->Cell(2.5,0.5,'NIK',0,0,'L');   
         $pdf->Cell(0.5,0.5,':',0,0,'C');   			 
         $pdf->Cell(12,0.5,$data1->kopeg,0,0,'L');   
         $pdf->Cell(7,0.5,'Penilai',0,0,'R');   			 
         $pdf->Cell(0.5,0.5,':',0,0,'L');   			
         $pdf->Cell(4,0.5,$data1->penilai,0,0,'L');   			  			 
         $pdf->Ln();
         $pdf->Cell(2.5,0.5,'Nama',0,0,'L');   
         $pdf->Cell(0.5,0.5,':',0,0,'C');   			 			 
         $pdf->Cell(12,0.5,$data1->nama,0,0,'L');   
         $pdf->Cell(7,0.5,'Tahun',0,0,'R');   			 
         $pdf->Cell(0.5,0.5,':',0,0,'L');   			
#             $pdf->Cell(2,0.5,$data1->ket3,0,0,'L');   			  			 			 
         $pdf->Cell(2,0.5,$data1->tahun,0,0,'L');   			  			 			 			 
         $pdf->Ln();	 
         $pdf->Cell(2.5,0.5,'Jabatan',0,0,'L');   
         $pdf->Cell(0.5,0.5,':',0,0,'C');   			 			 			 
         $pdf->Cell(5,0.5,$data1->jabatan,0,0,'L');   
		     // $pdf->Ln();
		    }
        $ok=1;
      } 
	     $pdf->Ln();
	     $pdf->Ln();
       $pdf->Cell(5,0.5,'PENILAIAN : KEY RESULT AREA',0,'C',0);   
       $pdf->Ln();	   
       $pdf->Cell(4.2,0.5,'','LTR',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTR',0,'L',0);   
       $pdf->Cell(2.3,0.5,'Penjelasan 4','LTR',0,'C',0);     
	     $pdf->Cell(8.4,0.5,'SKALA KONVERSI NILAI KRA','LTR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'Penjelasan 15','LTR',0,'C',0);  
       $pdf->Cell(1,0.5,'Bobot','LTR',0,'C',0);   
       $pdf->Cell(1,0.5,'','LTR',0,'C',0);  
       $pdf->Cell(1.5,0.5,'Nilai','LTR',0,'C',0);   
       $pdf->Cell(1,0.5,'Total','LTR',0,'C',0);   
       $pdf->Cell(5.5,0.5,'Kekuatan','LTRB',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,'KRA','LR',0,'C',0);   
       $pdf->Cell(0.7,0.5,$data1->kra,'LR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'pada nilai ','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Butuh','LTR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Kompeten ','LTR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Sangat','LTR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Sempurna','LTR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'pada nilai','LR',0,'C',0);  
       $pdf->Cell(1,0.5,'Sub','LR',0,'C',0);
       $pdf->Cell(1,0.5,'','LR',0,'C',0);     
       $pdf->Cell(1.5,0.5,'Bobot Sub','LR',0,'C',0);   
       $pdf->Cell(1,0.5,'Nilai','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kekuatan1,'LR',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,' ','LR',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LR',0,'L',0);   
       $pdf->Cell(2.3,0.5,'KRA','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Pengembangan','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Efektif','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'KRA','LR',0,'C',0);         
       $pdf->Cell(1,0.5,'Aspek','LR',0,'C',0);  
       $pdf->Cell(1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(1.5,0.5,'Aspek','LR',0,'C',0);   
       $pdf->Cell(1,0.5,'Bobot','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kekuatan2,'LR',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'4','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'5','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'6','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'7','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'8','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'9','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'10','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'11','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'12','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'13','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'14','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'15','LTRB',0,'C',0);   
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0); 
       $pdf->Cell(1,0.5,'','LR',0,'C',0);    
       $pdf->Cell(1.5,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kekuatan3,'LR',0,'C',0);  
    foreach($dataku as $data1)
	   {       	   
	     $pdf->Ln();
       $pdf->Cell(4.2,0.5,'1. MAINTAINING JOB','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'<30% di rata-rata','LR',0,'C',0);   
       if ($data1->maintening==4){
	       $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		     $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->maintening==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }

	     // $nilbobotmain=($data1->maintening*100)/100;
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,'100','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LTR',0,'C',0);  
       $pdf->Cell(1.5,0.5,$data1->nilsubmain,'LRB',0,'C',0);          
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kekuatan4,'LR',0,'C',0);  
       $pdf->Ln();

//=============================improvement job================================================    

       $pdf->Cell(4.2,0.5,'','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'pencapaian','LR',0,'C',0);   
             
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
      $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
        
     // $nilbobotimprov=($data1->improvment*0)/100;
  
       $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,'','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LTR',0,'C',0);  
       $pdf->Cell(1.5,0.5,'','LRB',0,'C',0);   
       $totalnilbobotkra=($data1->nilsubmain+$data1->nilsubimprov)*(100/100);
       //$totkra=($totalnilbobotkra*60)/100;
       // $totkra=($totalnilbobotkra*$kra)/100;
       $pdf->Cell(1,0.5,$data1->totalnilkra,'LRB',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kekuatan5,'LR',0,'C',0);  
       $pdf->Ln();


    //    $pdf->Cell(4.2,0.5,'2. IMPROVEMENT JOB','LRB',0,'L',0);   
    //    $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
    //    $pdf->Cell(2.3,0.5,'pencapaian','LR',0,'C',0);   
      

    //    if ($data1->improvment==4){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==5){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==6){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==7){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==8){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==9){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==10){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==11){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==12){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==13){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==14){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
    //    if ($data1->improvment==15){
	   //    $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
    //        }  
	   // else
	   //    {
		  // $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   // }
	  	  
	   // // $nilbobotimprov=($data1->improvment*0)/100;
	
	   //   $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
    //    $pdf->Cell(1,0.5,'0','LRB',0,'C',0);   
    //    $pdf->Cell(1,0.5,'','LTR',0,'C',0);  
    //    $pdf->Cell(1.5,0.5,$data1->nilsubimprov,'LRB',0,'C',0);   
	   //   $totalnilbobotkra=($data1->nilsubmain+$data1->nilsubimprov)*(100/100);
    //    //$totkra=($totalnilbobotkra*60)/100;
    //    // $totkra=($totalnilbobotkra*$kra)/100;
    //    $pdf->Cell(1,0.5,$data1->totalnilkra,'LRB',0,'C',0);   
    //    $pdf->Cell(5.5,0.5,$kekuatan5,'LR',0,'C',0);  
    //    $pdf->Ln();

//=============================KBA================================================       

       $pdf->Cell(18.9,0.5,'PENILAIAN : KEY BEHAVIOR AREA','LTB',0,'L',0);   
       $pdf->Cell(1,0.5,'','TR',0,'C',0);  
       $pdf->Cell(1.5,0.5,$totalnilbobotkra,'LTRB',0,'C',0);   
	     $pdf->Cell(1,0.5,'','LRB',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kekuatan6,'LRB',0,'C',0);  
       $pdf->Ln();
     
       $pdf->Cell(4.2,0.5,'','LTR',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTR',0,'L',0);   
       $pdf->Cell(2.3,0.5,'Penjelasan 4','LTR',0,'C',0);     
	     $pdf->Cell(8.4,0.5,'SKALA KONVERSI NILAI KBA','LTR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'Penjelasan 15','LTR',0,'C',0);  
       $pdf->Cell(1,0.5,'Bobot','LTR',0,'C',0);   
       $pdf->Cell(1,0.5,'','LTR',0,'C',0);  
       $pdf->Cell(1.5,0.5,'Nilai','LTR',0,'C',0);   
       $pdf->Cell(1,0.5,'Total','LTR',0,'C',0);   
       $pdf->Cell(5.5,0.5,'Kelemahan','LTRB',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,'KBA','LR',0,'C',0);   
       $pdf->Cell(0.7,0.5,$data1->kba,'LR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'pada nilai ','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Butuh','LTR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Kompeten ','LTR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Sangat','LTR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Sempurna','LTR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'pada nilai','LR',0,'C',0);  
       $pdf->Cell(1,0.5,'Sub','LR',0,'C',0);
       $pdf->Cell(1,0.5,'','LR',0,'C',0);            
       $pdf->Cell(1.5,0.5,'Bobot Sub','LR',0,'C',0);   
       $pdf->Cell(1,0.5,'Nilai','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kelemahan1,'LR',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,' ','LR',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LR',0,'L',0);   
       $pdf->Cell(2.3,0.5,'KBA','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Pengembangan','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'Efektif','LR',0,'C',0);   
       $pdf->Cell(2.1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(2.3,0.5,'KBA','LR',0,'C',0);  
       $pdf->Cell(1,0.5,'Aspek','LR',0,'C',0);   
       $pdf->Cell(1,0.5,'','LR',0,'C',0);  
       $pdf->Cell(1.5,0.5,'Aspek','LR',0,'C',0);   
       $pdf->Cell(1,0.5,'Bobot','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kelemahan2,'LR',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'4','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'5','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'6','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'7','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'8','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'9','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'10','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'11','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'12','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'13','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'14','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'15','LTRB',0,'C',0);   
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LRB',0,'C',0);  
       $pdf->Cell(1.5,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kelemahan3,'LR',0,'C',0);    
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,'1. NILAI INTI','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   
	   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);    
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,$data1->bobotinti,'LRB',0,'C',0);   
       // if ($data1->jum12==0){
       //    $pdf->Cell(1,0.5,'45','LRB',0,'C',0);   
       // }else{
       //    $pdf->Cell(1,0.5,'25','LRB',0,'C',0);   
       // }
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);                 
       $pdf->Cell(1.5,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);          
       $pdf->Cell(5.5,0.5,$kelemahan4,'LR',0,'C',0);  
  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,'   > INTEGRITY','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   
	   if ($data1->integritas==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->integritas==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

       // if ($data1->jum12==0){
       //    $nilbobotintegritas=($data1->integritas*45)/100;
       // }else{
       //    $nilbobotintegritas=($data1->integritas*25)/100;
       // }
	   
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,$data1->subint,'LRB',0,'C',0);   	
       $pdf->Cell(1.5,0.5,'','LR',0,'C',0);   
       $pdf->Cell(1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$kelemahan5,'LR',0,'C',0);  
       $pdf->Ln();
  }

  
       $pdf->Cell(4.2,0.5,'   > WINNING SPIRIT','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   
	   
   	   if ($data1->transparansi==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->transparansi==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

       //$nilbobottransparansi=($data1->jum4*30)/100;
       // if ($data1->jum12==0){
       //    $nilbobottransparansi=($data1->jum4*45)/100;
       // }else{
       //    $nilbobottransparansi=($data1->jum4*25)/100;
       // }
		   
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,$data1->subtrans,'LRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,'','LR',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,'Tindak Lanjut','LTRB',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(4.2,0.5,'   > INNOVATION','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   

   	   if ($data1->kerjasama==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kerjasama==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

       //$nilbobotkerjasama=($data1->jum5*30)/100;
       // if ($data1->jum12==0){
       //    $nilbobotkerjasama=($data1->jum5*45)/100;
       // }else{
       //    $nilbobotkerjasama=($data1->jum5*25)/100;
       // }		   
	   $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,$data1->subkerja,'LRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,'','LR',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$tindak1,'LR',0,'C',0);  
       $pdf->Ln();
  
       $pdf->Cell(4.2,0.5,'   > NASCENT','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   
	      	   if ($data1->kreativitas==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->kreativitas==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

      // // $nilbobotkreativitas=($data1->jum6*30)/100;
      //  if ($data1->jum12==0){
      //     $nilbobotkreativitas=($data1->jum6*45)/100;
      //  }else{
      //     $nilbobotkreativitas=($data1->jum6*25)/100;
      //  }
	   	 
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,$data1->subkreativ,'LRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,'','LR',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$tindak2,'LR',0,'C',0);  
       $pdf->Ln();
  
       $pdf->Cell(4.2,0.5,'   > SMART','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   
	   
   	   if ($data1->semangat==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->semangat==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

      //  //$nilbobotsemangat=($data1->jum7*30)/100;
      // if ($data1->jum12==0){
	     //   $nilbobotsemangat=($data1->jum7*45)/100;
      // }else{
      //    $nilbobotsemangat=($data1->jum7*25)/100;
      // }
	   
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,$data1->subsemangat,'LRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,'','LR',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$tindak3,'LR',0,'C',0);  
       $pdf->Ln();

       $pdf->Cell(4.2,0.5,'','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   

		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   


      // // $nilbobotsempurna=($data1->jum8*30)/100;
      //   if ($data1->jum12==0){
      //     $nilbobotsempurna=($data1->jum8*45)/100;
      //   }else{
      //     $nilbobotsempurna=($data1->jum8*25)/100;
      //   }

       // $nilbobotinti=($nilbobotsemangat+$nilbobotkreativitas+$nilbobotkerjasama+$nilbobottransparansi+$nilbobotintegritas+$nilbobotsempurna)/6;
	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,number_format($data1->nilbobotinti, 2, ',', '.'),'LRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$tindak4,'LR',0,'C',0);  
       $pdf->Ln();

       $pdf->Cell(4.2,0.5,'2.DISIPLIN KEHADIRAN','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   

   	   if ($data1->disiplin==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==13){
        $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
        $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
       }       
       if ($data1->disiplin==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }
       if ($data1->disiplin==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
       }else{
		    $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	     }

      // if ($data1->jum12==0){
      //   $nilbobotdisiplin=($data1->jum9*45)/100;
      // }else{
      //   $nilbobotdisiplin=($data1->jum9*55)/100;
      // }

	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       $pdf->Cell(1,0.5,$data1->bobotdisiplin,'LRB',0,'C',0); 
       $pdf->Cell(1,0.5,'','LRB',0,'C',0); 
       $pdf->Cell(1.5,0.5,number_format($data1->nilbobotdisiplin, 2, ',', '.'),'LRB',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,$tindak5,'LR',0,'C',0);         
       $pdf->Ln();

       $pdf->Cell(4.2,0.5,'3.PDCA','LRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   

   	   if ($data1->pdca==4){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->pdca==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

       // $nilbobotpdca=($data1->jum10*10)/100;

	     $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);         
       $pdf->Cell(1,0.5,$data1->bobotpdca,'LRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,number_format($data1->nilbobotpdca, 2, ',', '.'),'LRB',0,'C',0);   
       $pdf->Cell(1,0.5,' ','LR',0,'C',0);   
       $pdf->Cell(5.5,0.5,'JADWAL','LTRB',0,'C',0);  
       $pdf->Ln();

       $pdf->Cell(4.2,0.5,'4.MANAGEMENT ORANG','LTRB',0,'L',0);   
       $pdf->Cell(0.7,0.5,' ','LRB',0,'C',0);   
       $pdf->Cell(2.3,0.5,'','LRB',0,'C',0);   
	   
   	   if ($data1->manage==4){
   	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==5){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==6){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==7){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==8){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==9){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==10){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==11){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==12){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==13){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==14){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }
       if ($data1->manage==15){
	      $pdf->Cell(0.7,0.5,'*','LTRB',0,'C',0);   
           }  
	   else
	      {
		  $pdf->Cell(0.7,0.5,'','LTRB',0,'C',0);   
	   }

    //    if ($data1->jum12==0){
    //       $nilbobotmanagement=($data1->jum11*0)/100;
    //    }else{
    //       $nilbobotmanagement=($data1->jum11*10)/100;
    //    }
	   
	   // $totalnilbobotkba=$nilbobotinti+$nilbobotdisiplin+$nilbobotpdca+$nilbobotmanagement;
	   // $totkba=($totalnilbobotkba*$kba)/100;
	     
       // $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);  
       // if ($data1->jum12==0){
       //    $pdf->Cell(1,0.5,'0','LRB',0,'C',0);   
       // }else{
       //    $pdf->Cell(1,0.5,'10','LRB',0,'C',0);   
       // }

       $pdf->Cell(2.3,0.5,' ','LRB',0,'C',0);         
       $pdf->Cell(1,0.5,$data1->bobotmanagement,'LRB',0,'C',0);                          
       $pdf->Cell(1,0.5,' ','LRB',0,'C',0);         
       $pdf->Cell(1.5,0.5,number_format($data1->nilbobotmanagement, 2, ',', '.'),'LRB',0,'C',0);   
       $pdf->Cell(1,0.5,number_format($data1->totnilkba, 2, ',', '.'),'LRB',0,'C',0);   
       $pdf->Cell(5.5,0.5,$jadwal1,'LR',0,'C',0);  
       $pdf->Ln();
       $pdf->Cell(18.9,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(1.5,0.5,number_format($data1->nilbobotkba, 2, ',', '.'),'LTRB',0,'C',0);   
       $pdf->Cell(1,0.5,'','LTRB',0,'C',0);   
       $pdf->Cell(5.5,0.5,$jadwal2,'LR',0,'C',0);  
       $pdf->Ln();
     //   $totkrakba=$totkra+$totkba;
	    // $hasil='';
		// if ($totkrakba < 6.99){
	 //       $hasil='BUTUH PENGEMBANGAN';
		// }
		// if ($totkrakba > 6.99){
  //  	    	if ($totkrakba <= 9.99){
  // 	           $hasil='KOMPETEN';
		//     }
		// }
		// if ($totkrakba > 9.99){
  //  	    	if ($totkrakba <= 12.99){
  // 	           $hasil='SANGAT EFEKTIF';
		//     }
		// }

		// if ($totkrakba > 12.99){
  //  	    	if ($totkrakba < 15){
  // 	           $hasil='SEMPURNA';
		//     }
		// }
	   $pdf->Cell(21.4,0.5,$data1->hasil,'LTRB',0,'R',0);   
       $pdf->Cell(1,0.5,number_format($data1->totkrakba, 2, ',', '.'),'LTRB',0,'C',0);   
	   $pdf->Cell(5.5,0.5,$jadwal3,'LRB',0,'C',0);  
        // $pdf->Ln();
        $pdf->Ln();		

		     $pdf->SetFont('Times','',9);
             $pdf->Cell(21.5,0.5,'Jakarta,',0,0,'R');   
             $pdf->Cell(3,0.5,$data1->tglentry,0,0,'L');   			 			 			 			 
	         $pdf->Ln();					 
             $pdf->Cell(3,0.5,'Karyawan,',0,0,'C');   			 
             $pdf->Cell(20,0.5,'Atasan Langsung,',0,0,'R');   			 
	         $pdf->Ln();					
		     $pdf->SetFont('Times','I',9);			  
             $pdf->Cell(3,0.5,'Approval by electronic',0,0,'C');   			 
             $pdf->Cell(20,0.5,'Approval by electronic',0,0,'R');   			 			 			 
	         $pdf->Ln();					 
		     $pdf->SetFont('Times','',9);			  			 
             $pdf->Cell(3,0.5,$data1->nama,0,0,'C');   			 			 			 
             $pdf->Cell(20,0.5,$data1->penilai,0,0,'R');   
             $pdf->Ln();


/*


$pdf->Cell(4,5,' ','LTR',0,'L',0);   
$pdf->Cell(5,5,'111 Here',1,0,'L',0);
$pdf->Cell(5,5,'222 Here',1,0,'L',0);

                $pdf->Ln();

$pdf->Cell(4,5,'Solid Here','LR',0,'C',0);  // cell with left and right borders
$pdf->Cell(5,5,'[ o ] che1','LR',0,'L',0);
$pdf->Cell(5,5,'[ x ] che2','LR',0,'L',0);

                $pdf->Ln();

$pdf->Cell(4,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(5,5,'[ x ] def3','LRB',0,'L',0);
$pdf->Cell(5,5,'[ o ] def4','LRB',0,'L',0);

                $pdf->Ln();
                $pdf->Ln();*/
                $pdf->Ln();
$pdf->Output("Report Penilaian Kinerja.pdf","I"); 
	
 ?>   
</body>
</html>