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
      $pdf->SetFont('Times','B',12);
 
	  $cek=0;    
	  $alamaturl='';

      // $pdf->Image('image/logo.png',1,1,-100);	
      $pdf->Cell(6  , 1,'', 0 ,'C');

      $perilaku1=0;$menghargai1=0;$semangat1=0;$menerima1=0;$tanggung1=0;
      $perilaku2=0;$menghargai2=0;$semangat2=0;$menerima2=0;$tanggung2=0;
      $perilaku3=0;$menghargai3=0;$semangat3=0;$menerima3=0;$tanggung3=0;

      $penambahan1=0;$polapikir1=0;$pengambilan1=0;$keaktifan1=0;$percaya1=0;
      $penambahan2=0;$polapikir2=0;$pengambilan2=0;$keaktifan2=0;$percaya2=0;
      $penambahan3=0;$polapikir3=0;$pengambilan3=0;$keaktifan3=0;$percaya3=0;

      $penguasaan1=0;$peningkatan1=0;$kualitas1=0;$kecepatan1=0;$kreatifitas1=0;
      $penguasaan2=0;$peningkatan2=0;$kualitas2=0;$kecepatan2=0;$kreatifitas2=0;
      $penguasaan3=0;$peningkatan3=0;$kualitas3=0;$kecepatan3=0;$kreatifitas3=0;      

      $sikap=0;$pengetahuan=0;$keterampilan=0;$total=0;
      $kategori='';
  	  foreach($dataku as $data1)
	   {
         // if ($cek==0){
	        $pdf->Cell(6  , 1,'EVALUASI HASIL PELATIHAN', 0 ,'C');
	        $pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',8);
			$pdf->Cell(2  , 0.5,'NAMA', 'LT','L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,$data1->nama, 'TR' ,'L');
			$pdf->Cell(3.5  , 0.5,'NAMA PELATIHAN', 'T' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->namapelatihan,0,38), 'TR' ,'L');			
			$pdf->Ln();
			$pdf->Cell(2  , 0.5,'', 'LB' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,'', 'BR' ,'L');
			$pdf->Cell(3.5  , 0.5,'', 'B' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->namapelatihan,38,38), 'BR' ,'L');			
			$pdf->Ln();

			$pdf->Cell(2  , 0.5,'NIK', 'LT' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,$data1->nik, 'TR' ,'L');
			$pdf->Cell(3.5  , 0.5,'TANGGAL PELATIHAN', 'T' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,$data1->tglpelatihan, 'TR' ,'L');			
			$pdf->Ln();		
			$pdf->Cell(2  , 0.5,'', 'LB' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,'', 'BR' ,'L');
			$pdf->Cell(3.5  , 0.5,'', 'B' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,'', 'BR' ,'L');			
			$pdf->Ln();				

			$pdf->Cell(2  , 0.5,'JABATAN', 'LT' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->jabatan,0,40), 'TR' ,'L');
			$pdf->Cell(3.5  , 0.5,'INSTRUKTUR', 'T' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->instruktur,0,38), 'TR' ,'L');			
			$pdf->Ln();
			$pdf->Cell(2  , 0.5,'', 'LB' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->jabatan,40,40), 'BR' ,'L');
			$pdf->Cell(3.5  , 0.5,'', 'B' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->instruktur,38,38), 'BR' ,'L');			
			$pdf->Ln();									

			$pdf->Cell(2  , 0.5,'BAGIAN', 'LT' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->unit,0,40), 'TR' ,'L');
			$pdf->Cell(3.5  , 0.5,'PENYELENGGARA', 'T' ,'L');
			$pdf->Cell(1  , 0.5,':', 'T' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->penyelenggara,0,38), 'TR' ,'L');			
			$pdf->Ln();	
			$pdf->Cell(2  , 0.5,'', 'LB' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->unit,40,40), 'BR' ,'L');
			$pdf->Cell(3.5  , 0.5,'', 'B' ,'L');
			$pdf->Cell(1  , 0.5,'', 'B' ,'L');
			$pdf->Cell(6  , 0.5,substr($data1->penyelenggara,38,38), 'BR' ,'L');			
			$pdf->Ln();											
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'No', 'LT',0 ,'C');				
			$pdf->Cell(8  , 0.5,'Aspek Perubahan', 'LT',0 ,'C');				
			$pdf->Cell(6  , 0.5,'Penilaian', 'LT',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'Sasaran', 'LTR',0 ,'C');				
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'', 'LR',0 ,'C');				
			$pdf->Cell(8  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(1  , 0.5,'Bobot', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'B', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'C', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'K', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'Total', 'LTR',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', 'R',0 ,'C');				
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'', 'LR',0 ,'C');				
			$pdf->Cell(8  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'80', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'60', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'40', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'Nilai', 'LTR',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', 'R',0 ,'C');				
			$pdf->Ln();			
			$pdf->Cell(1  , 0.5,'(1)', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(2)', 'TB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'(3)', 'LTRB',0 ,'C');				
			$pdf->Cell(3  , 0.5,'(4)', 'LTRB',0 ,'C');				
			$pdf->Cell(2  , 0.5,'(5)=(3)x(4)', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', 'TRB',0 ,'C');				
			$pdf->Ln();			
			$pdf->Cell(1  , 0.5,'', 'LR',0 ,'C');				
			$pdf->Cell(8  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', 'R',0 ,'C');				
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'1', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'SIKAP/PERILAKU', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'25%', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');							
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,0,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'Peningkatan kualitas sikap atau perilaku pegawai dilingkungan', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,30,30), 'TRB',0 ,'L');				
			$pdf->Ln();			
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'kerjanya berupa:', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,60,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			if($data1->perilaku==80){
				$perilaku1=$data1->perilaku;
			}elseif($data1->perilaku==60){
				$perilaku2=$data1->perilaku;				
			}elseif($data1->perilaku==40){
				$perilaku3=$data1->perilaku;				
			}
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) Pengendalian emosi', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$perilaku1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$perilaku2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$perilaku3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalperilaku, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,90,30), 'TRB',0 ,'L');				
			$pdf->Ln();			
			if($data1->menghargai==80){
				$menghargai1=$data1->menghargai;
			}elseif($data1->perilaku==60){
				$menghargai2=$data1->menghargai;				
			}elseif($data1->perilaku==40){
				$menghargai3=$data1->menghargai;				
			}		
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) rasa menghargai atasan, rekan sejawat dan bawahan', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$menghargai1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$menghargai2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$menghargai3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalmenghargai, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,120,30), 'TRB',0 ,'L');				
			$pdf->Ln();			
			if($data1->semangat==80){
				$semangat1=$data1->semangat;
			}elseif($data1->semangat==60){
				$semangat2=$data1->semangat;				
			}elseif($data1->semangat==40){
				$semangat3=$data1->semangat;				
			}								
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) semangat disiplin dalam bekerja', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$semangat1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$semangat2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$semangat3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalsemangat, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,150,30), 'TRB',0 ,'L');				
			$pdf->Ln();						
			if($data1->menerima==80){
				$menerima1=$data1->menerima;
			}elseif($data1->menerima==60){
				$menerima2=$data1->menerima;				
			}elseif($data1->menerima==40){
				$menerima3=$data1->menerima;				
			}														
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) dapat menerima hasil keputusan bersama', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$menerima1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$menerima2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$menerima3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalmenerima, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,180,30), 'TRB',0 ,'L');				
			$pdf->Ln();											
			if($data1->tanggung==80){
				$tanggung1=$data1->tanggung;
			}elseif($data1->tanggung==60){
				$tanggung2=$data1->tanggung;
			}elseif($data1->tanggung==40){
				$tanggung3=$data1->tanggung;
			}
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) tanggungjawab dalam pelaksanaan tugas', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$tanggung1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$tanggung2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$tanggung3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totaltanggung, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saransikap,210,30), 'TRB',0 ,'L');				
			$pdf->Ln();		

			$pdf->Cell(1  , 0.5,'2', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'PENGETAHUAN/WAWASAN', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'35%', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,0,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'Peningkatan pengetahuan/wawasan berpikir', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,30,30), 'TRB',0 ,'L');				
			$pdf->Ln();			
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'pegawai dalam menunjang tugas-tugasnya:', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,60,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			if($data1->penambahan==80){
				$penambahan1=$data1->penambahan;
			}elseif($data1->penambahan==60){
				$penambahan2=$data1->penambahan;
			}elseif($data1->penambahan==40){
				$penambahan3=$data1->penambahan;
			}								
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) penambahan pengetahuan pada bidang yg dilatihkan', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$penambahan1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$penambahan2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$penambahan3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalpenambahan, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,90,30), 'TRB',0 ,'L');				
			$pdf->Ln();	
			if($data1->polapikir==80){
				$polapikir1=$data1->polapikir;
			}elseif($data1->polapikir==60){
				$polapikir2=$data1->polapikir;
			}elseif($data1->polapikir==40){
				$polapikir3=$data1->polapikir;
			}								
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) pola pikir semakin sistematis dan terstruktur', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$polapikir1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$polapikir2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$polapikir3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalpolapikir, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,120,30), 'TRB',0 ,'L');				
			$pdf->Ln();						
			if($data1->pengambilan==80){
				$pengambilan1=$data1->pengambilan;
			}elseif($data1->pengambilan==60){
				$pengambilan2=$data1->pengambilan;
			}elseif($data1->pengambilan==40){
				$pengambilan3=$data1->pengambilan;
			}											
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) proses pengambilan keputusan dilakukan atas', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$pengambilan1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$pengambilan2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$pengambilan3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalpengambilan, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,150,30), 'TRB',0 ,'L');				
			$pdf->Ln();									
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'      dasar analisa masalah', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,180,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			if($data1->keaktifan==80){
				$keaktifan1=$data1->keaktifan;
			}elseif($data1->keaktifan==60){
				$keaktifan2=$data1->keaktifan;
			}elseif($data1->keaktifan==40){
				$keaktifan3=$data1->keaktifan;
			}																	
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) keaktifan memberikan masukan perbaikan pada fungsinya', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$keaktifan1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$keaktifan2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$keaktifan3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalkeaktifan, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,210,30), 'TRB',0 ,'L');				
			$pdf->Ln();												
			if($data1->percaya==80){
				$percaya1=$data1->percaya;
			}elseif($data1->percaya==60){
				$percaya2=$data1->percaya;
			}elseif($data1->percaya==40){
				$percaya3=$data1->percaya;
			}			
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) rasa percaya diri yg didukung oleh pengetahuan/', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$percaya1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$percaya2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$percaya3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalpercaya, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', 'TRB',0 ,'C');				
			$pdf->Ln();		
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'      wawasan yg dimiliki', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranpengetahuan,240,30), 'TRB',0 ,'L');				
			$pdf->Ln();					

			$pdf->Cell(1  , 0.5,'3', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'KETERAMPILAN/KEMAMPUAN', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'40%', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,0,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'Peningkatan penguasaan teknis pekerjaan', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,30,30), 'TRB',0 ,'L');				
			$pdf->Ln();			
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'pegawai sesuai bidang tugasnya, berupa:', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,60,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			if($data1->penguasaan==80){
				$penguasaan1=$data1->penguasaan;
			}elseif($data1->penguasaan==60){
				$penguasaan2=$data1->penguasaan;
			}elseif($data1->penguasaan==40){
				$penguasaan3=$data1->penguasaan;
			}						
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) penguasaan proses/prosedur kerja', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$penguasaan1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$penguasaan2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$penguasaan3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalpenguasaan, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,90,30), 'TRB',0 ,'L');				
			$pdf->Ln();			
			if($data1->peningkatan==80){
				$peningkatan1=$data1->peningkatan;
			}elseif($data1->peningkatan==60){
				$peningkatan2=$data1->peningkatan;
			}elseif($data1->peningkatan==40){
				$peningkatan3=$data1->peningkatan;
			}									
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) peningkatan kemampuan penggunaan sarana/prasarana kerja', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$peningkatan1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$peningkatan2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$peningkatan3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalpeningkatan, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,120,30), 'TRB',0 ,'L');				
			$pdf->Ln();						
			if($data1->kualitas==80){
				$kualitas1=$data1->kualitas;
			}elseif($data1->kualitas==60){
				$kualitas2=$data1->kualitas;
			}elseif($data1->kualitas==40){
				$kualitas3=$data1->kualitas;
			}												
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) kualitas hasil pekerjaan', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kualitas1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kualitas2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kualitas3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalkualitas, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,150,30), 'TRB',0 ,'L');				
			$pdf->Ln();									
			if($data1->kecepatan==80){
				$kecepatan1=$data1->kecepatan;
			}elseif($data1->kecepatan==60){
				$kecepatan2=$data1->kecepatan;
			}elseif($data1->kecepatan==40){
				$kecepatan3=$data1->kecepatan;
			}															
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) kecepatan penyelesaian masalah', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kecepatan1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kecepatan2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kecepatan3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalkecepatan, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,180,30), 'TRB',0 ,'L');				
			$pdf->Ln();					
			if($data1->kreatifitas==80){
				$kreatifitas1=$data1->kreatifitas;
			}elseif($data1->kreatifitas==60){
				$kreatifitas2=$data1->kreatifitas;
			}elseif($data1->kreatifitas==40){
				$kreatifitas3=$data1->kreatifitas;
			}									
		    $sikap=$perilaku1+$menghargai1+$semangat1+$menerima1+$tanggung1+$perilaku2+$menghargai2+$semangat2+$menerima2+$tanggung2+$perilaku3+$menghargai3+$semangat3+$menerima3+$tanggung3;
		    $pengetahuan=$penambahan1+$polapikir1+$pengambilan1+$keaktifan1+$percaya1+$penambahan2+$polapikir2+$pengambilan2+$keaktifan2+$percaya2+$penambahan3+$polapikir3+$pengambilan3+$keaktifan3+$percaya3;
		    $keterampilan=$penguasaan1+$peningkatan1+$kualitas1+$kecepatan1+$kreatifitas1+$penguasaan2+$peningkatan2+$kualitas2+$kecepatan2+$kreatifitas2+$penguasaan3+$peningkatan3+$kualitas3+$kecepatan3+$kreatifitas3;
		    $total=$data1->totalperilaku+$data1->totalmenghargai+$data1->totalsemangat+$data1->totalmenerima+$data1->totaltanggung+$data1->totalpenambahan+$data1->totalpolapikir+$data1->totalpengambilan+$data1->totalkeaktifan+$data1->totalpercaya+$data1->totalpenguasaan+$data1->totalpeningkatan+$data1->totalkualitas+$data1->totalkecepatan+$data1->totalkreatifitas;    		    

			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'(     ) kreativitas dalam penyelesaian masalah', 'TB',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kreatifitas1, 'LTR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kreatifitas2, 'TR',0 ,'C');				
			$pdf->Cell(1  , 0.5,$kreatifitas3, 'TR',0 ,'C');				
			$pdf->Cell(2  , 0.5,$data1->totalkreatifitas, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,substr($data1->saranketerampilan,210,30), 'TRB',0 ,'L');				
			$pdf->Ln();
			if($total<=270){
				$kategori='Kurang Efektif';
			}if(($total>270) and ($total<=335)){
				$kategori='Cukup Efektif';
			}if($total>335){
				$kategori='Efektif';				
			}
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(8  , 0.5,'TOTAL', 'TB',0 ,'C');				
			$pdf->Cell(1  , 0.5,'', 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$sikap, 'LTRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$pengetahuan, 'TRB',0 ,'C');				
			$pdf->Cell(1  , 0.5,$keterampilan, 'TRB',0 ,'C');				
			$pdf->Cell(2  , 0.5,$total, 'LTRB',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,$kategori, 'TRB',0 ,'C');				
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(8  , 0.5,'Keterangan :', '',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(3  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', '',0 ,'C');				
			$pdf->Ln();			
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(8  , 0.5,'1. Efektif, apabila total hasil penilaian 336 - 400', '',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(3  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', '',0 ,'C');				
			$pdf->Ln();						
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(8  , 0.5,'2. Cukup Efektif, apabila total hasil penilaian 271 - 335', '',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(3  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', '',0 ,'C');				
			$pdf->Ln();									
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(8  , 0.5,'3. Kurang Efektif,  total hasil penilaian 200 - 270', '',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(3  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', '',0 ,'C');				
			$pdf->Ln();												
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(8  , 0.5,'4. B = Baik      C = Cukup      K = Kurang', '',0 ,'L');				
			$pdf->Cell(1  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(3  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(2  , 0.5,'', '',0 ,'C');				
			$pdf->Cell(4.5  , 0.5,'', '',0 ,'C');				
			$pdf->Ln();															
		}			
	  
	  $pdf->Ln();	  

$pdf->Output("Report Evaluasi Training.pdf","I"); 
	
 ?>   
</body>
</html>