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
      $pdf->SetFont('Times','B',12);
 
	  $cek=0;    
	  $alamaturl='';

      // $pdf->Image('image/logo.png',1,1,-100);	
      $pdf->Cell(10  , 1,'', 0 ,'C');

  	  foreach($dataku as $data1)
	   {
         // if ($cek==0){

	          $pdf->Cell(10  , 1,'DATA PEGAWAI', 0 ,'C');
	          $pdf->Ln();
			  $pdf->Ln();
		}
				
			  // if ($data1->ket35<>''){
				 //  $alamaturl=$data1->ket35;
			  //     $pdf->Image($alamaturl,16,3,-1000);		
			  // }

// 		      $pdf->SetFont('Times','',8);
// 			  if ($data1->ket37=='a'){	  
// 			      $pdf->Cell(4  , 0.5,'Kode Pegawai' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket1,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Nama Pegawai' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket2,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Nama Panggilan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket3,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Tempat Lahir' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket5,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Tanggal Lahir' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket4,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Jenis Kelamin' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket6,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Status Perkawinan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket7,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Alamat' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket8,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Alamat Asal' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket9,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Telepon' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(18 , 0.5, $data1->ket10,0, 1,'L');
		
// 			      $pdf->Cell(4  , 0.5,'Handphone' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket11,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Email 1' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket12,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Email 2' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket13,0, 1,'L');				  

// 			      $pdf->Cell(4  , 0.5,'Paspor' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket14,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Golongan Darah' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket15,0, 1,'L');
	
//     			  $pdf->Cell(4  , 0.5,'Tinggi Badan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket16,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Berat Badan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket17,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Ukuran Baju' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket18,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Ukuran Celana' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket19,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Ukuran Sepatu' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket20,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Agama' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket24,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Suku' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket25,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Kewarganegaraan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket26,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'No.KTP' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket28,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Tanggal Masuk' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket29,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Lokasi Kerja' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket31,0, 1,'L');

// 			      $pdf->Cell(4  , 0.5,'Jabatan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket32,0, 1,'L');				  
				  
// 			      $pdf->Cell(4  , 0.5,'Status' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket33,0, 1,'L');				  

// 			      $pdf->Cell(4  , 0.5,'Golongan' , 0, 0, 'L');
// 			      $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 				  $pdf->Cell(24 , 0.5, $data1->ket34,0, 1,'L');				  
				  
// 			  }

// 	     }
//          $cek=1; 
//        } 

// /*	  $pdf->Ln();
// 	  $pdf->Ln();
//       $pdf->SetFont('Times','',8);
	  	  
// #	  $pdf->Ln();
// #	  $pdf->Ln();	  	  
// #      $pdf->Image('application/views/photo/1112329.jpg',23,4,-670);		  
// 	  if ($data1->ket37=='a'){
	  
//       $pdf->Cell(4  , 0.5,'Kode Pegawai' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket1,0, 1,'L');
	  
//       $pdf->Cell(4  , 0.5,'Nama Pegawai' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket2,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Nama Panggilan' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket3,0, 1,'L');


//       $pdf->Cell(4  , 0.5,'Tempat Lahir' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket5,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Jenis Kelamin' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket6,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Status Perkawinan' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket7,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Alamat' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket8,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Alamat Asal' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket9,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Telepon' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(18 , 0.5, $data1->ket10,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Handphone' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket11,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Email' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket12,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Golongan Darah' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket15,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Tinggi Badan' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket16,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Berat Badan' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket17,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Ukuran Baju' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket18,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Ukuran Celana' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket19,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Ukuran Sepatu' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket20,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Agama' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket24,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Suku' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket25,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Kewarganegaraan' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket26,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'No.KTP' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket28,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Lokasi Kerja' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket31,0, 1,'L');

//       $pdf->Cell(4  , 0.5,'Jabatan' , 0, 0, 'L');
//       $pdf->Cell(0.5  , 0.5,':' , 0, 0, 'L');	  	  	  
// 	  $pdf->Cell(24 , 0.5, $data1->ket32,0, 1,'L'); 
	  
// 	  }*/
	  
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',12);	  
//       $pdf->Cell(20  , 0.5,'DATA KELUARGA' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(2  , 0.5,'Status' , 1, 0, 'L');
//       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
//       $pdf->Cell(2  , 0.5,'Jenis Kelamin' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Tgl Lahir' , 1, 0, 'L');			
// 	  $pdf->Cell(3  , 0.5,'Pendidikan' , 1, 0, 'L');		
//       $pdf->Cell(5  , 0.5,'Pekerjaan' , 1, 0, 'L');	
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='b'){	   	  		  
// 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(3 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  
// 			  $pdf->Cell(5 , 0.5, substr($data2->ket7,0,27),1, 1,'L');			  		    
// 		  }
//        } 


// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',12);	  
//       $pdf->Cell(20  , 0.5,'DATA ORANG TUA & SAUDARA' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(2  , 0.5,'Status' , 1, 0, 'L');
//       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
//       $pdf->Cell(2  , 0.5,'Jenis Kelamin' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Tgl Lahir' , 1, 0, 'L');			
// 	  $pdf->Cell(3  , 0.5,'Pendidikan' , 1, 0, 'L');		
//       $pdf->Cell(5  , 0.5,'Pekerjaan' , 1, 0, 'L');	
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='c'){	   	  		  
// 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(3 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  
// 			  $pdf->Cell(5 , 0.5, substr($data2->ket7,0,27),1, 1,'L');			  		    
// 		  }
//        } 

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'DATA SAUDARA / KERABAT TIDAK SERUMAH YANG BISA DIHUBUNGI' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(2  , 0.5,'Hubungan' , 1, 0, 'L');
//       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
//       $pdf->Cell(2  , 0.5,'Pekerjaan' , 1, 0, 'L');	 
//       $pdf->Cell(8  , 0.5,'Alamat' , 1, 0, 'L');			
// 	  $pdf->Cell(2  , 0.5,'No.Telepon' , 1, 0, 'L');		
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='d'){	   	  		  
// 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(8 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 1,'L');			  			  			  			  
// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'PENDIDIKAN FORMAL' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(3  , 0.5,'Tingkat' , 1, 0, 'L');
//       $pdf->Cell(4  , 0.5,'Nama' , 1, 0, 'L');			
//       $pdf->Cell(1.5  , 0.5,'Dari Tahun' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Sampai Tahun' , 1, 0, 'L');			
// 	  $pdf->Cell(2.8  , 0.5,'Jurusan' , 1, 0, 'L');		
//       $pdf->Cell(2  , 0.5,'Tempat' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Sertifikat' , 1, 0, 'L');			
// 	  $pdf->Cell(2  , 0.5,'Keterangan' , 1, 0, 'L');		
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='e'){	   	  		  
// 			  $pdf->Cell(3 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(4 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(2.8 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  			  
// 			  $pdf->Cell(2 , 0.5, substr($data2->ket7,0,10),1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, substr($data2->ket8,0,32),1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket9,1, 1,'L');			  			  			  			  			  
// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'PENGALAMAN KERJA' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(5  , 0.5,'Nama Perusahaan' , 1, 0, 'L');
//       $pdf->Cell(7  , 0.5,'Jabatan' , 1, 0, 'L');			
//       $pdf->Cell(1.5  , 0.5,'Dari Tahun' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Sampai Tahun' , 1, 0, 'L');			
// 	  $pdf->Cell(2  , 0.5,'Alasan Berhenti' , 1, 0, 'L');		
//       $pdf->Cell(2  , 0.5,'Gaji' , 1, 0, 'L');	 
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='f'){	   	  		  
// 			  $pdf->Cell(5 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(7 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket7,1, 1,'L');
// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'KENDARAAN' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(5  , 0.5,'Jenis Kendaraan' , 1, 0, 'L');
//       $pdf->Cell(4.2  , 0.5,'Merk' , 1, 0, 'L');			
//       $pdf->Cell(3  , 0.5,'Tipe' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Tahun' , 1, 0, 'L');			
// 	  $pdf->Cell(2  , 0.5,'Warna' , 1, 0, 'L');		
//       $pdf->Cell(2  , 0.5,'Nopol' , 1, 0, 'L');	 
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='g'){	   	  		  
// 			  $pdf->Cell(5 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(4.2 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(3 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket7,1, 1,'L');
// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'RIWAYAT KESEHATAN' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(7  , 0.5,'Jenis Sakit' , 1, 0, 'L');
//       $pdf->Cell(4.2  , 0.5,'Tingkat Sakit' , 1, 0, 'L');			
//       $pdf->Cell(1.5  , 0.5,'Tahun' , 1, 0, 'L');	 
//       $pdf->Cell(7  , 0.5,'Rawat di RS' , 1, 0, 'L');			
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='h'){	   	  		  
// 			  $pdf->Cell(7 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(4.2 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(7 , 0.5, $data2->ket5,1, 1,'L');
// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'RIWAYAT JABATAN' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(12  , 0.5,'Nama Jabatan' , 1, 0, 'L');
//       $pdf->Cell(4  , 0.5,'Golongan' , 1, 0, 'L');			
//       $pdf->Cell(3  , 0.5,'Periode' , 1, 0, 'L');	 
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='i'){	   	  		  
// 			  $pdf->Cell(12 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(4 , 0.5, substr($data2->ket3,0,20),1, 0,'L');
// 			  $pdf->Cell(3 , 0.5, substr($data2->ket4,0,20),1, 1,'L');

// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'RIWAYAT PELATIHAN' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(7  , 0.5,'Nama Pelatihan' , 1, 0, 'L');
//       $pdf->Cell(5  , 0.5,'Penyelenggara' , 1, 0, 'L');			
//       $pdf->Cell(4  , 0.5,'Tempat' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Waktu' , 1, 0, 'L');	 	  
//       $pdf->Cell(1  , 0.5,'Tahun' , 1, 0, 'L');	 	  
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
//   	  // foreach($datapelatihan as $data2)  	  	
// 	   {
// 		  if ($data2->ket37=='j'){	   	  		  
// 			  $pdf->Cell(7 , 0.5, substr($data2->ket2,0,50),1, 0,'L');		  
// 			  $pdf->Cell(5 , 0.5, substr($data2->ket3,0,30),1, 0,'L');
// 			  $pdf->Cell(4 , 0.5, substr($data2->ket4,0,25),1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, substr($data2->ket5,0,20),1, 0,'L');			  
// 			  $pdf->Cell(1 , 0.5, substr($data2->ket6,0,20),1, 1,'L');			  
// 		  }
//        }  

// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',10);	  
//       $pdf->Cell(20  , 0.5,'PENILAIAN KRA - KBA' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',6);	  	  
//       $pdf->Cell(1  , 0.5,'Tahun' , 1, 0, 'L');	  
//       $pdf->Cell(2  , 0.5,'Periode 1' , 1, 0, 'L');			
//       $pdf->Cell(2  , 0.5,'Kategori' , 1, 0, 'L');				  
//       $pdf->Cell(2  , 0.5,'Periode 2' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Kategori' , 1, 0, 'L');				  	  
//       $pdf->Cell(2  , 0.5,'Periode 3' , 1, 0, 'L');	 	  
//       $pdf->Cell(2  , 0.5,'Kategori' , 1, 0, 'L');				  	  
//       $pdf->Cell(2  , 0.5,'Periode 4' , 1, 0, 'L');	 	  	  
//       $pdf->Cell(2  , 0.5,'Kategori' , 1, 0, 'L');				  	  
//       $pdf->Cell(2  , 0.5,'Total' , 1, 0, 'L');	 	  	  
	  
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='k'){	   	  		  
// 			  $pdf->Cell(1 , 0.5, $data2->ket8,1, 0,'L');		  			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket9,1, 0,'L');			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket10,1, 0,'L');			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket11,1, 0,'L');			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 0,'L');			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket12,1, 0,'L');			  
// 			  $pdf->Cell(2 , 0.5, $data2->ket7,1, 1,'L');			  
// 		  }
//        } 

// // }

// // if ($detail=='Data Keluarga'){

// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',12);	  
// //       $pdf->Cell(20  , 0.5,'DATA KELUARGA' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(2  , 0.5,'Status' , 1, 0, 'L');
// //       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
// //       $pdf->Cell(2  , 0.5,'Jenis Kelamin' , 1, 0, 'L');	 
// //       $pdf->Cell(2  , 0.5,'Tgl Lahir' , 1, 0, 'L');			
// // 	  $pdf->Cell(4  , 0.5,'Pendidikan' , 1, 0, 'L');		
// //       $pdf->Cell(4  , 0.5,'Pekerjaan' , 1, 0, 'L');	
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='b'){	   	  		  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// // 			  $pdf->Cell(4 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  
// // 			  $pdf->Cell(4 , 0.5, $data2->ket7,1, 1,'L');			  		    
// // 		  }
// //        } 
// // }

// // if ($detail=='Data Saudara/ Kerabat Tidak Serumah'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',12);	  
// //       $pdf->Cell(20  , 0.5,'DATA ORANG TUA & SAUDARA' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(2  , 0.5,'Status' , 1, 0, 'L');
// //       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
// //       $pdf->Cell(2  , 0.5,'Jenis Kelamin' , 1, 0, 'L');	 
// //       $pdf->Cell(2  , 0.5,'Tgl Lahir' , 1, 0, 'L');			
// // 	  $pdf->Cell(4  , 0.5,'Pendidikan' , 1, 0, 'L');		
// //       $pdf->Cell(4  , 0.5,'Pekerjaan' , 1, 0, 'L');	
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='c'){	   	  		  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// // 			  $pdf->Cell(4 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  
// // 			  $pdf->Cell(4 , 0.5, $data2->ket7,1, 1,'L');			  		    
// // 		  }
// //        } 
// // }

// // if ($detail=='Data Saudara/ Kerabat Tidak Serumah'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'DATA SAUDARA / KERABAT TIDAK SERUMAH YANG BISA DIHUBUNGI' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(2  , 0.5,'Hubungan' , 1, 0, 'L');
// //       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
// //       $pdf->Cell(2  , 0.5,'Pekerjaan' , 1, 0, 'L');	 
// //       $pdf->Cell(6  , 0.5,'Alamat' , 1, 0, 'L');			
// // 	  $pdf->Cell(4  , 0.5,'No.Telepon' , 1, 0, 'L');		
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='d'){	   	  		  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(6 , 0.5, $data2->ket5,1, 0,'L');
// // 			  $pdf->Cell(4 , 0.5, $data2->ket6,1, 1,'L');			  			  			  			  
// // 		  }
// //        }  
// // }

// // if ($detail=='Pendidikan Formal'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'PENDIDIKAN FORMAL' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(1  , 0.5,'Tingkat' , 1, 0, 'L');
// //       $pdf->Cell(3  , 0.5,'Nama' , 1, 0, 'L');			
// //       $pdf->Cell(1.5  , 0.5,'Dari Tahun' , 1, 0, 'L');	 
// //       $pdf->Cell(2  , 0.5,'Sampai Tahun' , 1, 0, 'L');			
// // 	  $pdf->Cell(2  , 0.5,'Jurusan' , 1, 0, 'L');		
// //       $pdf->Cell(2  , 0.5,'Tempat' , 1, 0, 'L');	 
// //       $pdf->Cell(6  , 0.5,'Sertifikat' , 1, 0, 'L');			
// // 	  $pdf->Cell(2  , 0.5,'Keterangan' , 1, 0, 'L');		
	  
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='e'){	   	  		  
// // 			  $pdf->Cell(1 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(3 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  			  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket7,1, 0,'L');
// // 			  $pdf->Cell(6 , 0.5, substr($data2->ket8,0,32),1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket9,1, 1,'L');			  			  			  			  			  
// // 		  }
// //        }  
// // }

// // if ($detail=='Pengalaman Kerja'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'PENGALAMAN KERJA' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(7  , 0.5,'Nama Perusahaan' , 1, 0, 'L');
// //       $pdf->Cell(4.2  , 0.5,'Jabatan' , 1, 0, 'L');			
// //       $pdf->Cell(1.5  , 0.5,'Dari Tahun' , 1, 0, 'L');	 
// //       $pdf->Cell(2  , 0.5,'Sampai Tahun' , 1, 0, 'L');			
// // 	  $pdf->Cell(2  , 0.5,'Alasan Berhenti' , 1, 0, 'L');		
// //       $pdf->Cell(2  , 0.5,'Gaji' , 1, 0, 'L');	 
	  
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='f'){	   	  		  
// // 			  $pdf->Cell(7 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(4.2 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  			  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket7,1, 1,'L');
// // 		  }
// //        }  
// // }

// // if ($detail=='Kendaraan'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'KENDARAAN' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(7  , 0.5,'Jenis Kendaraan' , 1, 0, 'L');
// //       $pdf->Cell(4.2  , 0.5,'Merk' , 1, 0, 'L');			
// //       $pdf->Cell(1.5  , 0.5,'Tipe' , 1, 0, 'L');	 
// //       $pdf->Cell(2  , 0.5,'Tahun' , 1, 0, 'L');			
// // 	  $pdf->Cell(2  , 0.5,'Warna' , 1, 0, 'L');		
// //       $pdf->Cell(2  , 0.5,'Nopol' , 1, 0, 'L');	 
	  
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='g'){	   	  		  
// // 			  $pdf->Cell(7 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(4.2 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// // 			  $pdf->Cell(2 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  			  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket7,1, 1,'L');
// // 		  }
// //        }  
// // }

// // if ($detail=='Riwayat Kesehatan'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'RIWAYAT KESEHATAN' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(7  , 0.5,'Jenis Sakit' , 1, 0, 'L');
// //       $pdf->Cell(4.2  , 0.5,'Tingkat Sakit' , 1, 0, 'L');			
// //       $pdf->Cell(1.5  , 0.5,'Tahun' , 1, 0, 'L');	 
// //       $pdf->Cell(7  , 0.5,'Rawat di RS' , 1, 0, 'L');			
	  
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='h'){	   	  		  
// // 			  $pdf->Cell(7 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(4.2 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(1.5 , 0.5, $data2->ket4,1, 0,'L');
// // 			  $pdf->Cell(7 , 0.5, $data2->ket5,1, 1,'L');
// // 		  }
// //        }  
// // }

// // if ($detail=='Riwayat Jabatan'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'RIWAYAT JABATAN' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(14  , 0.5,'Nama Jabatan' , 1, 0, 'L');
// //       $pdf->Cell(2  , 0.5,'Golongan' , 1, 0, 'L');			
// //       $pdf->Cell(3  , 0.5,'Periode' , 1, 0, 'L');	 
	  
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='i'){	   	  		  
// // 			  $pdf->Cell(14 , 0.5, $data2->ket2,1, 0,'L');		  
// // 			  $pdf->Cell(2 , 0.5, $data2->ket3,1, 0,'L');
// // 			  $pdf->Cell(3 , 0.5, $data2->ket4,1, 1,'L');

// // 		  }
// //        }  
// // }

// // if ($detail=='Riwayat Pelatihan'){
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  
// //       $pdf->SetFont('Times','B',10);	  
// //       $pdf->Cell(20  , 0.5,'RIWAYAT PELATIHAN' , 0, 0, 'C');
// // 	  $pdf->Ln();	  
// // 	  $pdf->Ln();	  	  

// //       $pdf->SetFont('Times','',8);	  	  
// //       $pdf->Cell(10  , 0.5,'Nama Pelatihan' , 1, 0, 'L');
// //       $pdf->Cell(3  , 0.5,'Penyelenggara' , 1, 0, 'L');			
// //       $pdf->Cell(3  , 0.5,'Tempat' , 1, 0, 'L');	 
// //       $pdf->Cell(3  , 0.5,'Waktu' , 1, 0, 'L');	 	  
	  
// // 	  $pdf->Ln();	  	  	  		  	       
	  
// //   	  foreach($dataku as $data2)
// // 	   {
// // 		  if ($data2->ket37=='j'){	   	  		  
// // 			  $pdf->Cell(10 , 0.5, substr($data2->ket2,0,50),1, 0,'L');		  
// // 			  $pdf->Cell(3 , 0.5, substr($data2->ket3,0,10),1, 0,'L');
// // 			  $pdf->Cell(3 , 0.5, substr($data2->ket4,0,10),1, 0,'L');
// // 			  $pdf->Cell(3 , 0.5, substr($data2->ket5,0,20),1, 1,'L');			  

// // 		  }
// //        }  
// // }

	
// #	}	   

// /*      if ($data1->ket38=='Data Keluarga'){	
	      
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  
//       $pdf->SetFont('Times','B',12);	  
//       $pdf->Cell(20  , 0.5,'DATA KELUARGA' , 0, 0, 'C');
// 	  $pdf->Ln();	  
// 	  $pdf->Ln();	  	  

//       $pdf->SetFont('Times','',8);	  	  
//       $pdf->Cell(2  , 0.5,'Status' , 1, 0, 'L');
//       $pdf->Cell(5  , 0.5,'Nama' , 1, 0, 'L');			
//       $pdf->Cell(2  , 0.5,'Jenis Kelamin' , 1, 0, 'L');	 
//       $pdf->Cell(2  , 0.5,'Tgl Lahir' , 1, 0, 'L');			
// 	  $pdf->Cell(4  , 0.5,'Pendidikan' , 1, 0, 'L');		
//       $pdf->Cell(4  , 0.5,'Pekerjaan' , 1, 0, 'L');	
// 	  $pdf->Ln();	  	  	  		  	       
	  
//   	  foreach($dataku as $data2)
// 	   {
// 		  if ($data2->ket37=='b'){	   	  		  
// 			  $pdf->Cell(2 , 0.5, $data2->ket2,1, 0,'L');		  
// 			  $pdf->Cell(5 , 0.5, $data2->ket3,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket4,1, 0,'L');
// 			  $pdf->Cell(2 , 0.5, $data2->ket5,1, 0,'L');
// 			  $pdf->Cell(4 , 0.5, $data2->ket6,1, 0,'L');			  			  			  			  
// 			  $pdf->Cell(4 , 0.5, $data2->ket7,1, 1,'L');			  		    
// 		  }
//        } 
	   	  
// 	  } */

	  
	  $pdf->Ln();	  


$pdf->Output("biodata.pdf","I"); 
	
 ?>   
</body>
</html>