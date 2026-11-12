<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Training Need Analysis.xls");
         header("Pragma: no-cache");
         header("Expires: 0");
    ?>


	 <?php
     $cek=0;
	 foreach($dataku as $data1)
	   {
	   	// $periode=$data1->ket7;
	   	// $tahun=$data1->ket8;
         if ($cek==0){ ?>

	  <?php   }
         $cek=1;
       } ?>

			<table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
		     <tr>
			  <td align="center" valign="middle" colspan="9" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">TRAINING NEED ANALYSIS</font></td>			 
			 </tr>			 
<!-- 		     <tr>
			  <td align="center" valign="middle" colspan="7" bgcolor="#FFFFFF"><font color="black" style="font-size:16px">PERIODE <?=$periode?> TAHUN <?=$tahun?></font></td>			 
			 </tr>			  -->
			 
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>

			</table>

		<table border="1" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
           <colgroup align="left">
       			<col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />
                <col width="10%" />
	          	<col width="10%" />
	         	<col width="10%" />
	         	<col width="10%" />
	         	<col width="10%" />
	         	<col width="10%" />
	       </colgroup>  

		   <tr>
		   	  <td align="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Unit Kerja</font></td>
		      <td align="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Nama</font></td>
		      <td align="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">NIK</font></td>
			  <td align="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Jabatan</font></td>			
			  <td align="center" bgcolor="#666666" colspan="5"><font color="#FFFFFF">Training Need Analysis</font></td>			
			</tr>				
		   <tr>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Evaluasi Kompetensi (KOM)</font></td>			    
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Evaluasi Kinerja (KIN)</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Audit (AUD)</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Bisnis Plan (BIP)</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Masukkan Direksi (DIR)</font></td>			
			</tr>							

<?php 	
	$xunit="";
	  foreach($dataku as $data2)
	  {		  						
	    ?> 		

		<?php 	  	  
	   	if (($xunit<>$data2->namaunit) or ($xunit=="")) { ?>		
		<tr>		
		    <td align="left"><?=$data2->namaunit?></td>				
		    <td align="left"></td>
		    <td align="left"></td>
		    <td align="left"></td>
		    <td align="left"></td>		    
		    <td align="left"></td>
		    <td align="left"></td>
		    <td align="left"></td>
		    <td align="left"></td>		    		    
		</tr>		
	    <?php 		
	    }
		?>

		<tr>			    
	    <!-- <td align="left"><?=$data2->namaunit?></td> -->
	    <td align="left"></td>
	    <td align="left"><?=$data2->nama?></td>
	    <td align="left"><?=$data2->nik?></td>
	    <td align="left"><?=$data2->namajab?></td>	    
	    <td align="left"><?=$data2->kom?></td>
	    <td align="left"><?=$data2->kin?></td>
	    <td align="left"><?=$data2->aud?></td>
	    <td align="left"><?=$data2->bip?></td>	    	    
	    <td align="left"><?=$data2->dir?></td>	    	    
<?php				
		$xunit=$data2->namaunit;
		}
	?> 
				      	
  </table>       				
	
</body>
</html>