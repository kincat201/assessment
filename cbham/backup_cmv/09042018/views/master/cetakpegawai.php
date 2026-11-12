<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Master_Pegawai.xls");
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
			  <td align="center" valign="middle" colspan="6" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">MASTER PEGAWAI</font></td>			 
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
	       </colgroup>  
		   <tr>
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">NIK</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nama</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Unit</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jabatan</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal</font></td>
		       <td align="center" bgcolor="#666666"><font color="#FFFFFF">User</font></td>	
			</tr>				

<?php 	
	$xunit="";
	  foreach($dataku as $data2)
	  {		  						
	    ?> 		
		<tr>			    
		    <td align="left"><?=$data2->nik?></td>
		    <td align="left"><?=$data2->nama?></td>
		    <td align="left"><?=$data2->namaunit?></td>	    
		    <td align="left"><?=$data2->namajab?></td>	    
		    <td align="left"><?=$data2->tglentry?></td>
		    <td align="left"><?=$data2->userentry?></td>
		</tr>
<?php				
		
		}
	?> 
				      	
  </table>       				
	
</body>
</html>