<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=exceldata.xls");
         header("Pragma: no-cache");
         header("Expires: 0");
    ?>


	 <?php
     $cek=0;
	 foreach($dataku as $data1)
	   {
         if ($cek==0){ ?>

	  <?php   }
         $cek=1;
       } ?>

			<table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
		     <tr>
			  <td align="center" valign="middle" colspan="22" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">REKAPITULASI HASIL PENILAIAN</font></td>			 
			 </tr>			 
		     <tr>
			  <td align="center" valign="middle" colspan="22" bgcolor="#FFFFFF"><font color="black" style="font-size:16px">TAHUN <?=$data1->tahun?></font></td>			 
			 </tr>			 
			 
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>

			</table>

		<table border="1" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
           <colgroup align="left">
		          	  <col width="5%" />
		          	  <col width="5%" />
                      <col width="10%" />
		          	  <col width="10%" />
		         	  <col width="5%" />
                      <col width="10%" />
			          <col width="10%" />
		          	  <col width="10%" />
                      <col width="10%" />
		          	  <col width="10%" />
		          	  <col width="10%" />					  
	       </colgroup>  

		   <tr>
		      <td align="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Unit Kerja</font></td>
		      <td align="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Nama Karyawan</font></td>
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Periode I</font></td>			
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Periode II</font></td>			    
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Periode III</font></td>			
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Periode IV</font></td>			    			  
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Kumulatif</font></td>			    			  			  
			</tr>
			<tr>			
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>			  			  
		    </tr>					

<?php 

	  $jum1=0;$prosjum1=0;
	  $jum2=0;$prosjum2=0;	  
	  $jum3=0;$prosjum3=0;	  
	  $jum4=0;$prosjum4=0;	  
	  $jumtotal=0;
	  $periode1=0;
	  $periode2=0;
	  $periode3=0;
	  $periode4=0;
	  foreach($dataku as $data2)
	  {	

		$kumkra=0;
		$kumkba=0;	  
		$kumtotkrakba=0;	  
		$kumkategori='';	  
	  	
	  	$periode1=@$data2->periode1;
	  	$periode2=@$data2->periode2;
	  	$periode3=@$data2->periode3;
	  	$periode4=@$data2->periode4;

	  	if ((@$data2->totalnilkra1<>0) and (@$data2->totalnilkra2==0) and (@$data2->totalnilkra3==0) and (@$data2->totalnilkra4==0)){
	  		$kumkra=(@$data2->totalnilkra1+@$data2->totalnilkra2+@$data2->totalnilkra3+@$data2->totalnilkra4);
	  		$kumkba=(@$data2->totnilkba1+@$data2->totnilkba2+@$data2->totnilkba3+@$data2->totnilkba4);	  		
	  	}		
	  	if ((@$data2->totalnilkra1<>0) and (@$data2->totalnilkra2<>0) and (@$data2->totalnilkra3==0) and (@$data2->totalnilkra4==0)){
	  		$kumkra=(@$data2->totalnilkra1+@$data2->totalnilkra2+@$data2->totalnilkra3+@$data2->totalnilkra4)/2;
	  		$kumkba=(@$data2->totnilkba1+@$data2->totnilkba2+@$data2->totnilkba3+@$data2->totnilkba4)/2;	  			  		
	  	}		
	  	if ((@$data2->totalnilkra1<>0) and (@$data2->totalnilkra2<>0) and (@$data2->totalnilkra3<>0) and (@$data2->totalnilkra4==0)){
	  		$kumkra=(@$data2->totalnilkra1+@$data2->totalnilkra2+@$data2->totalnilkra3+@$data2->totalnilkra4)/3;
	  		$kumkba=(@$data2->totnilkba1+@$data2->totnilkba2+@$data2->totnilkba3+@$data2->totnilkba4)/3;	  			  		
	  	}			  	
	  	if ((@$data2->totalnilkra1<>0) and (@$data2->totalnilkra2<>0) and (@$data2->totalnilkra3<>0) and (@$data2->totalnilkra4<>0)){
	  		$kumkra=(@$data2->totalnilkra1+@$data2->totalnilkra2+@$data2->totalnilkra3+@$data2->totalnilkra4)/4;
	  		$kumkba=(@$data2->totnilkba1+@$data2->totnilkba2+@$data2->totnilkba3+@$data2->totnilkba4)/4;	  			  		
	  	}			  		 

	  	$kumtotkrakba=$kumkra+$kumkba;			
		$jumtotal=$jumtotal+1;
		if ($kumtotkrakba<6.99){
			$kumkategori='BUTUH PENGEMBANGAN';
			$jum1=$jum1+1;			
		}
		$prosjum1=$jum1/$jumtotal;
		if ($kumtotkrakba>6.99){
			if ($kumtotkrakba<=9.99){				
				$kumkategori='KOMPETEN';
				$jum2=$jum2+1;								
			}
		}
		$prosjum2=$jum2/$jumtotal;				
		if ($kumtotkrakba>9.99){
			if ($kumtotkrakba<=12.99){				
				$kumkategori='SANGAT EFEKTIF';
				$jum3=$jum3+1;												
			}
		}
		$prosjum3=$jum3/$jumtotal;						
		if ($kumtotkrakba>12.99){
			if ($kumtotkrakba<=15){				
				$kumkategori='SEMPURNA';
				$jum4=$jum4+1;												
			}
		}		
		$prosjum4=$jum4/$jumtotal;								
			
	    ?> 		
		<tr>		
	    <td align="left"><?=$data2->jabatan?></td>
	    <td align="left"><?=$data2->nama?></td>		
	    <td align="left"><?=number_format(@$data2->totalnilkra1,1,',','.')?></td>		
	    <td align="left"><?=number_format(@$data2->totnilkba1,1,',','.')?></td>		
	    <td align="left"><?=number_format(@$data2->totkrakba1,1,',','.')?></td>			
	    <td align="left"><?=@$data2->hasil1?></td>
	    <td align="left"><?=number_format(@$data2->totalnilkra2,1,',','.')?></td>		
	    <td align="left"><?=number_format(@$data2->totnilkba2,1,',','.')?></td>		
	    <td align="left"><?=number_format(@$data2->totkrakba2,1,',','.')?></td>		
	    <td align="left"><?=@$data2->hasil2?></td>				
	    <td align="left"><?=number_format(@$data2->totalnilkra3,1,',','.')?></td>
	    <td align="left"><?=number_format(@$data2->totnilkba3,1,',','.')?></td>		
	    <td align="left"><?=number_format(@$data2->totkrakba3,1,',','.')?></td>		
	    <td align="left"><?=@$data2->hasil3?></td>		
	    <td align="left"><?=number_format(@$data2->totalnilkra4,1,',','.')?></td>				
	    <td align="left"><?=number_format(@$data2->totnilkba4,1,',','.')?></td>
	    <td align="left"><?=number_format(@$data2->totkrakba4,1,',','.')?></td>		
	    <td align="left"><?=@$data2->hasil4?></td>				
	    <td align="left"><?=number_format($kumkra,1,',','.')?></td>				
	    <td align="left"><?=number_format($kumkba,1,',','.')?></td>
	    <td align="left"><?=number_format($kumtotkrakba,1,',','.')?></td>		
<?php if ($kumkategori=='BUTUH PENGEMBANGAN'){ ?>		
		    <td align="left"><font color="#FF0000"><b><?=$kumkategori?></td>						
<?php }
	  if ($kumkategori=='KOMPETEN'){?>			
		    <td align="left"><font color="#FFFF00"><b><?=$kumkategori?></td>							  
<?php }
	  if ($kumkategori=='SANGAT EFEKTIF'){?>			
		    <td align="left"><font color="#33FF00"><b><?=$kumkategori?></td>							  			
<?php }
	  if ($kumkategori=='SEMPURNA'){?>			
		    <td align="left"><font color="#0066FF"><b><?=$kumkategori?></td>							  						
<?php
 	  } ?>
			
  	   </tr>	   
<?php
 	  } ?>


<?php 

	  foreach($dataku as $data2)
	  {			  		
		// if ($data2->ket1=='Periode I'){
	    ?> 			   
<?php	   
		// }
		// if ($data2->ket1=='Periode II'){ ?>
<?php				
		// }
		// if ($data2->ket1=='Periode III'){ ?>		
<?php				
		// }
		// if ($data2->ket1=='Periode IV'){ ?>
<?php				
		// }
	} ?> 

				      	
  </table>   
    
	<table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">  
		<tr><td></td></tr>
		<tr><td></td></tr>

  		<tr>		
	    <td align="left"></td>
	    <td align="right">Jumlah Karyawan</td>
	    <td align="right">Dalam %</td>		
		</tr>								      			
  		<tr>		
	    <td align="left">Butuh Pengembangan</td>
	    <td align="right"><?=$jum1?></td>
	    <td align="right"><?=number_format($prosjum1,2,',','.')?></td>		
		</tr>								      
  		<tr>		
	    <td align="left">Kompeten</td>
	    <td align="right"><?=$jum2?></td>
	    <td align="right"><?=number_format($prosjum2,2,',','.')?></td>				
		</tr>								      
  		<tr>		
	    <td align="left">Sangat Efektif</td>
	    <td align="right"><?=$jum3?></td>
	    <td align="right"><?=number_format($prosjum3,2,',','.')?></td>				
		</tr>								      
  		<tr>		
	    <td align="left">Sempurna</td>
	    <td align="right"><?=$jum4?></td>
	    <td align="right"><?=number_format($prosjum4,2,',','.')?></td>				
		</tr>		
  		<tr>		
	    <td align="left">Total</td>
	    <td align="right"><?=$jumtotal?></td>
	    <!-- <td align="right"><?=number_format($prosjum1,3,',','.')?></td>		 -->
		</tr>								      								      
  </table>   					
	
</body>
</html>