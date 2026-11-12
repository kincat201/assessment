<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
    <?php    
      ob_start(); 
  
      date_default_timezone_set('Asia/Jakarta');
     
//      class PDF extends FPDF {
	  
	  class FPDF_AutoWrapTable extends FPDF {
		private $data = array();
		private $options = array(
			'filename' => '',
			'destinationfile' => '',
			'paper_size'=>'A4',
			'orientation'=>'L'
			);
 
		function __construct($data = array(), $options = array()) {
		parent::__construct();
		$this->data = $data;
		$this->options = $options;
		} 
 
		public function rptDetailData () {
		//
		 foreach ($this->data as $barisx) {
			$this->Row(
			array(
			// $barisx['ket4'],
			// $barisx['ket18'],
			// $barisx['ket19']
			));
			} 

		// $tgl=substr($barisx['ket20'],8,2);				
		// $bln=substr($barisx['ket20'],6,2);				
		// $thn=substr($barisx['ket20'],0,4);				
		// $tglreview=$tgl."-".$bln.$thn;

		// $unit=$barisx['unit'];
		// $jabatan=$barisx['jabatan'];
		// $bulan=$barisx['bulan'];
		// $tahun=$barisx['tahun'];
				
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 25;
		
		// $this->image('image/logo.png',12,14,100,45);
		
		#header
		$this->SetFont("", "BU", 15);
		$this->Cell(0, 12, 'LAPORAN HASIL PENILAIAN SKK',0,1,'C');
		$this->Ln(1);
		$this->Ln(10);
		$this->Ln(10);
		$this->Ln(10);
		$this->Ln(10);
		$this->Ln(10);
		$this->Ln(10);

		$this->SetFont("", "", 10);
		$this->Cell(0, 12, 'Unit', 0,0,'L');
		$this->SetX(100);
		$this->Cell(0, 12, ': '.$barisx['ket1'], 0,1,'L');						
		$this->Cell(0, 12, 'Jabatan', 0,0,'L');
		$this->SetX(100);
		$this->Cell(0, 12,': '.$barisx['ket2'], 0,1,'L');	
		$this->Cell(0, 12, 'Bulan', 0,0,'L');
		$this->SetX(100);
		$this->Cell(0, 12, ': '.$barisx['ket4'], 0,1,'L');			
		$this->Cell(0, 12, 'Tahun', 0,0,'L');
		$this->SetX(100);
		$this->Cell(0, 12, ': '.$barisx['ket3'], 0,1,'L');			

		$this->Ln(10);
		$this->Ln(10);
		$this->Ln(10);

		$h = 13;
		$left = 40;
		$top = 80;
		
		#tableheader
		$this->SetFont('Times','',9);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->Cell(25,$h,'Kode',1,0,'L',true);
		$this->SetX($left += 25); $this->Cell(200, $h, 'KPI', 1, 0, 'C',true);
		// $this->SetX($left += 200); $this->Cell(40, $h, 'Kelompok', 1, 0, 'C',true);
		$this->SetX($left += 200); $this->Cell(100, $h, 'Polarisasi', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(50, $h, 'Satuan', 1, 0, 'C',true);
		$this->SetX($left += 50); $this->Cell(80, $h, 'Target', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(80, $h, 'Realisasi', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(80, $h, 'Indeks Capaian', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(65, $h, 'Indeks KPI', 1, 0, 'C',true);		
		$this->SetX($left += 65); $this->Cell(65, $h, 'NSS', 1, 1, 'C',true);
		// $this->SetX($left += 40); $this->Cell(25, $h, 'NSS', 1, 1, 'C',true);		
 
		$this->SetFont('Times','',9);
		$this->SetWidths(array(25,200,100,50,80,80,80,65,65));
		$this->SetAligns(array('C','L','L','C','R','R','R','R','R'));
		$no = 1; $this->SetFillColor(255);		
		
		$total=0;
		foreach ($this->data as $baris) {
			$total=$total+$baris['ket13'];
			$this->Row(
			array(
				$baris['ket5'],
				$baris['ket6'],
				$baris['ket7'],
				$baris['ket8'],
				number_format($baris['ket9'], 0, ',', '.'),
				number_format($baris['ket10'], 0, ',', '.'),
				number_format($baris['ket11'], 0, ',', '.'),
				number_format($baris['ket12'], 0, ',', '.'),
				number_format($baris['ket13'], 0, ',', '.')			
			));
		} 

		$status='';
		if (round($total)<86) $status='Butuh Pengembangan';
		elseif ((round($total)>=86) and (round($total)<101)) $status='Kompeten';
		elseif ((round($total)>=101) and (round($total)<116)) $status='Sangat Efektif';
		elseif (round($total)>=116) $status='Sempurna';

		$this->SetFillColor(200,200,200);
		$this->Cell(615,$h,'Total',1,0,'L',true);
		$this->Cell(130,$h,round($total),1,1,'R',true);
		$this->Cell(615,$h,'Status',1,0,'L',true);
		$this->SetFont('Times','B',9);
		$this->Cell(130,$h,$status,1,0,'C',true);		

		$tempat='Jakarta, '.date('d F Y');
		$this->Ln(20);
		$this->SetFillColor(255);
		$this->Cell(460,$h,'',0,0,'L',true);
		$this->Cell(285 , $h, $tempat,'LTRB',0,'C',0);          
		$this->Ln();
		$this->Cell(460,$h,'',0,0,'L',true);
		$this->Cell(142.5 , $h, 'Disetujui,','LTRB',0,'C',0);          
		$this->Cell(142.5 , $h, 'Dibuat,','LTRB',0,'C',0);          				
		$this->Ln();
		$this->Cell(460,$h,'',0,0,'L',true);
		$this->Cell(142.5 , 50, '','LTRB',0,'L',0);          
		$this->Cell(142.5 , 50, '','LTRB',0,'L',0);          		

		} 
 
		public function printPDF () {
 
		if ($this->options['paper_size'] == "F4") {
		$a = 8.3 * 72; //1 inch = 72 pt
		$b = 13.0 * 72;
		$this->FPDF($this->options['orientation'], "pt", array($a,$b));
		} else {
		$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
		}
 
		$this->SetAutoPageBreak(false);
		$this->AliasNbPages();
		$this->SetFont("helvetica", "B", 10);
		//$this->AddPage();
 
		$this->rptDetailData();
 
		$this->Output($this->options['filename'],$this->options['destinationfile']);
		}
 
		private $widths;
		private $aligns;
 
		function SetWidths($w)
		{
		//Set the array of column widths
		$this->widths=$w;
		}
 
		function SetAligns($a)
		{
		//Set the array of column alignments
		$this->aligns=$a;
		}
 
		function Row($data)
		{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
			$h=10*$nb;
			//Issue a page break first if needed
			$this->CheckPageBreak($h);
			//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,10,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
		}
 
		function CheckPageBreak($h)
		{
			//If the height h would cause an overflow, add a new page immediately
			if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
		}
 
		function NbLines($w,$txt)
		{
			//Computes the number of lines a MultiCell of width w will take
			$cw=&$this->CurrentFont['cw'];
			if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
			$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
			$s=str_replace("\r",'',$txt);
			$nb=strlen($s);
			if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
			$sep=-1;
			$i=0;
			$j=0;
			$l=0;
			$nl=1;
			while($i<$nb)
			{
				$c=$s[$i];
				if($c=="\n")
				{
					$i++;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
					continue;
				}
				if($c==' ')
					$sep=$i;
					$l+=$cw[$c];
				if($l>$wmax)
				{
				if($sep==-1)
				{
					if($i==$j)
					$i++;
				}
				else
					$i=$sep+1;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
				}
				else
					$i++;
				}
				return $nl;
			}
		} //end of class

		// $total=0;
		// foreach ($this->data as $baris) {
		// 	$unit=$baris['unit'];
		// 	$jabatan=$baris['jabatan'];
		// 	$tahun=$baris['tahun'];
		// 	$bulan=$baris['bulan'];
		// } 
		
		// $data = array();
		// // $query = "select * from hasilskk where unit='".$unit."' and jabatan='".$jabatan."' and tahun='".$tahun."' and bulan='".$bulan."' order by kodekpi";
		// $con=mysqli_connect("localhost","root","yodyapusat","db_cbham_v1");
		// // $conn = new mysql('localhost', '', '');
		// $query = "select * from tampung where urut='" .getSession('urut')."'  order by ket5";
		// $sql = mysqli_query($con,$query);
		// while ($row = mysqli_fetch_assoc($sql)) {
		// 	array_push($data, $row);
		// }		 
 
		$data = array();
		$query = "select * from tampung where urut='" .getSession('urut')."'  order by ket5";
		$sql = mysql_query ($query);
		while ($row = mysql_fetch_assoc($sql)) {
			array_push($data, $row);
		}		 

		//pilihan
		$options = array(
			'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
			'destinationfile' => '', //I=inline browser (default), F=local file, D=download
			'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
			'orientation'=>'L' //orientation: P=portrait, L=landscape
		);
 
		$tabel = new FPDF_AutoWrapTable($data, $options);
		$tabel->printPDF();
// 	  }
	  	  
/*---- header selesai ---*/

$pdf->Output("reportbsc.pdf","I"); 
	
 ?>   
</body>
</html>