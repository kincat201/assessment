<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Realisasi_SKK.xls");
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
			  <td align="center" valign="middle" colspan="19" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">REPORT REALISASI SKK</font></td>			 
			 </tr>			 
			 
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
	          	<col width="10%" />	          	
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
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KPI</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Deskripsi</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Ket</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Satuan</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Rollup</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Periode</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jan</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Feb</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Mar</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Apr</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Mei</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jun</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jul</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Agt</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Sep</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Okt</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nov</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Des</font></td>						  
			</tr>				

<?php 	
	// $xunit="";
	  foreach($dataku as $data2)
	  {		  						
	    ?> 		
		<tr>			    
		    <td align="left"><?=$data2->ket6?></td>
		    <td align="left"><?=$data2->ket7?></td>
		    <td align="left"><?=$data2->ket8?></td>	    
		    <td align="left"><?=$data2->ket25?></td>
		    <td align="left"><?=$data2->ket9?></td>
		    <td align="left"><?=$data2->ket10?></td>
		    <td align="left"><?=$data2->ket11?></td>
		    <td align="left"><?=$data2->ket12?></td>
		    <td align="left"><?=$data2->ket13?></td>
		    <td align="left"><?=$data2->ket14?></td>
		    <td align="left"><?=$data2->ket15?></td>	    
		    <td align="left"><?=$data2->ket16?></td>
		    <td align="left"><?=$data2->ket17?></td>
		    <td align="left"><?=$data2->ket18?></td>
		    <td align="left"><?=$data2->ket19?></td>
		    <td align="left"><?=$data2->ket20?></td>		    
		    <td align="left"><?=$data2->ket21?></td>		    
		    <td align="left"><?=$data2->ket22?></td>		    
		    <td align="left"><?=$data2->ket23?></td>		    
		</tr>
<?php				
		
		}
	?> 
				      	
  </table>       				
	
</body>
</html>