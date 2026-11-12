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
	   	// $periode=$data1->ket7;
	   	// $tahun=$data1->ket8;
         if ($cek==0){ ?>

	  <?php   }
         $cek=1;
       } ?>

			<table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
		     <tr>
			  <td align="center" valign="middle" colspan="7" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">STANDAR KNOWHOW</font></td>			 
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
	       </colgroup>  

		   <tr>
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kompetensi</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">1</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">2</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">3</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">4</font></td>			    
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">5</font></td>			
			</tr>				

<?php 	
	  foreach($dataku as $data2)
	  {		  						
	    ?> 		
		<tr>			    
	    <td align="left"><?=$data2->ket1?></td>
	    <td bgcolor=<?=$data2->ket2?> align="left"><?=$data2->ket2?></td>		
	    <td bgcolor=<?=$data2->ket2?> align="left"><?=$data2->ket3?></td>		
	    <td bgcolor=<?=$data2->ket2?> align="left"><?=$data2->ket4?></td>		
	    <td bgcolor=<?=$data2->ket2?> align="left"><?=$data2->ket5?></td>		
	    <td bgcolor=<?=$data2->ket2?> align="left"><?=$data2->ket6?></td>			
<?php				
		}
	?> 
				      	
  </table>       				
	
</body>
</html>