<link href="<?=base_url()."css/menu.css"?>" rel="stylesheet" type="text/css"/> 

 <link rel="stylesheet" href="<?=base_url()."css/jquery.ui.all.css"?>">
<!--    <script src="<?=base_url()."js/jquery-1.7.2.min.js"?>"></script>-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<script type="text/javaScript" src="<?=base_url()."js/archive.js"?>"></script>
    <script type="text/javaScript" src="<?=base_url()."js/style.js"?>"></script> 
    <!--- selesai -->

    <link rel="stylesheet" href="<?=base_url()."css/jquery.ui.all.css"?>">

<!--    <script src="<?=base_url()."js/jquery-1.7.js"?>"></script>	   -->
	<script src="<?=base_url()."js/jquery-1.7.2.min.js"?>"></script>
	<script src="<?=base_url()."js/jquery.ui.core.js"?>"></script>
	<script src="<?=base_url()."js/jquery.ui.widget.js"?>"></script>
	<script src="<?=base_url()."js/jquery.ui.datepicker.js"?>"></script> 
			     
   <link rel="stylesheet" type="text/css" href="<?=base_url()."css/style-autocompletex.css"?>" />
   <script type="text/javascript" src="<?=base_url()."js/jquery.ausu-autosuggest.min.js"?>"></script>


<!--  <script type="text/javaScript" src="<?=base_url()."js/jquery-1.9.1.js"?>"></script> -->
   <script type="text/javaScript" src="<?=base_url()."js/jquery-1.10.2.js"?>"></script> 
   <script type="text/javaScript" src="<?=base_url()."js/jquery-ui.js"?>"></script> 		



<?php 
	echo $xajax_js;
?>


 <style>
 
     .ui-dialog .ui-dialog-content {
	position: relative;
	border: 0;
	padding: .5em 1em;
	background: none;
	overflow: auto;
    }

.ui-widget-content {
	border: 1px solid #aaaaaa;
	background: #ffffff url(../../../../varia/application/views/sdm/images/ui-bg_flat_75_ffffff_40x100.png) 50% 50% repeat-x;
	color: #222222;
}

.ui-widget-content a {
	color: #222222;
} 
 
 
 
 
.btn {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  text-shadow: 1px 1px 3px #666666;
  -webkit-box-shadow: 2px 4px 3px #666666;
  -moz-box-shadow: 2px 4px 3px #666666;
  box-shadow: 2px 4px 3px #666666;
  font-family: Arial;
  color: #ffffff;
  font-size: 19px;
  background: #3498db;
  padding: 5px 10px 5px 10px;
  border: solid #1f628d 2px;
  text-decoration: none;
}

.btn :hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

 
 /*   .togglerx { margin-left:40px;width: 1000px; height: 200px; position: relative; }
 /*   #buttonc { background:#F0F8FF;color:#fff;padding: .5em 1em; text-decoration: none; } */
 /*    #effectx { background:#F0F8FF;color:#fff;width: 1100px; margin: 30; height: 450px; padding: 0.4em; position: relative; } */
   /*  #effectx h3 {background:#e74c3c;color:fff; margin: 0; padding: 0.4em; text-align: center; } */
  /*  .ui-effects-transfer { border: 2px solid #2c3e50; } */
  </style>

<script>

// function showMyPayroll(){
// //must be present because auto suggest will callback this function
// }

// // $(document).ready(function() {
// jQuery(document).ready(function($){ 
// 	 $.fn.autosugguest({  
//            className: 'suggest',
//           methodType: 'POST',
//             minChars: 1,
//               rtnIDs: true,
//             dataFile: '<?=base_url().'index.php/cbham/namalist'?>'
//     });
     
// });

	$(function() {
		var dialog1,dialog2, dialog3,dialog4, dialog5,dialog6,
			form1,form2,form3,form4,form5,form6
			
			tips = $( ".validateTips" ); 

		function addUser() {
			var valid = true;
			return valid;
		}   

		dialog1 = $( "#dialog-ketintegritas" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600, 
			modal: true,
			buttons: {
				Keluar: function() {
					dialog1.dialog( "close" );
				} 
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});
		dialog2 = $( "#dialog-kettransparan" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600, 
			modal: true,
			buttons: {
				Keluar: function() {
					dialog2.dialog( "close" );
				} 
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});
		dialog3 = $( "#dialog-ketkerjasama" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600, 
			modal: true,
			buttons: {
				Keluar: function() {
					dialog3.dialog( "close" );
				} 
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});
		dialog4 = $( "#dialog-ketkreatif" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600, 
			modal: true,
			buttons: {
				Keluar: function() {
					dialog4.dialog( "close" );
				} 
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});
		dialog5 = $( "#dialog-ketsemangat" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600, 
			modal: true,
			buttons: {
				Keluar: function() {
					dialog5.dialog( "close" );
				} 
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});
		dialog6 = $( "#dialog-ketsempurna" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600, 
			modal: true,
			buttons: {
				Keluar: function() {
					dialog6.dialog( "close" );
				} 
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});
		
		form1 = dialog1.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addUser();
		});
		form2 = dialog2.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addUser();
		});
		form3 = dialog3.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addUser();
		});
		form4 = dialog4.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addUser();
		});
		form5 = dialog5.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addUser();
		});
		form6 = dialog6.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addUser();
		});

		$( "#ketintegritas" ).button().on( "click", function() {
			dialog1.dialog( "open" );
		})		
		$( "#kettransparan" ).button().on( "click", function() {
			dialog2.dialog( "open" );
		})		
		$( "#ketkerjasama" ).button().on( "click", function() {
			dialog3.dialog( "open" );
		})		
		$( "#ketkreatif" ).button().on( "click", function() {
			dialog4.dialog( "open" );
		})		
		$( "#ketsemangat" ).button().on( "click", function() {
			dialog5.dialog( "open" );
		})		
		$( "#ketsempurna" ).button().on( "click", function() {
			dialog6.dialog( "open" );
		})		
		
	});  


$(function() {
 $("#tanggal1").datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
		dateFormat: 'dd MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        }
    });
 
 $("#tanggal2").datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
		dateFormat: 'dd MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        }
    });
   
});

function carites(){
	alert('tes');
  // xajax_carites(document.getElementById("nama").value);
}

//=====================================maintening job
function cekradiomain4(jenis){ 
	if (document.getElementById("radiomain4").checked===true){
		document.getElementById("txtmain4").value = jenis; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
        document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}
 
	}
} 
function cekradiomain5(jenis){ 
	if (document.getElementById("radiomain5").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = jenis; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				

	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain6(jenis){ 
	if (document.getElementById("radiomain6").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = jenis; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;
		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}


	}
} 
function cekradiomain7(jenis){ 
	if (document.getElementById("radiomain7").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = jenis; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}
	}
} 
function cekradiomain8(jenis){ 
	if (document.getElementById("radiomain8").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = jenis; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain9(jenis){ 
	if (document.getElementById("radiomain9").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = jenis; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain10(jenis){ 
	if (document.getElementById("radiomain10").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = jenis; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain11(jenis){ 
	if (document.getElementById("radiomain11").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = jenis; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain12(jenis){ 
	if (document.getElementById("radiomain12").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = jenis; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}


	}
} 
function cekradiomain13(jenis){ 
	if (document.getElementById("radiomain13").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = jenis; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain14(jenis){ 
	if (document.getElementById("radiomain14").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = jenis; 		
		document.getElementById("txtmain15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomain15(jenis){ 
	if (document.getElementById("radiomain15").checked===true){
		document.getElementById("txtmain4").value = ""; 
		document.getElementById("txtmain5").value = ""; 
		document.getElementById("txtmain6").value = ""; 		
		document.getElementById("txtmain7").value = ""; 		
		document.getElementById("txtmain8").value = ""; 				
		document.getElementById("txtmain9").value = ""; 
		document.getElementById("txtmain10").value = ""; 		
		document.getElementById("txtmain11").value = ""; 		
		document.getElementById("txtmain12").value = ""; 				
		document.getElementById("txtmain13").value = ""; 
		document.getElementById("txtmain14").value = ""; 		
		document.getElementById("txtmain15").value = jenis; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================improvment job
function cekradioimprov4(jenis){ 
	if (document.getElementById("radioimprov4").checked===true){
		document.getElementById("txtimprov4").value = jenis; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov5(jenis){ 
	if (document.getElementById("radioimprov5").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = jenis; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov6(jenis){ 
	if (document.getElementById("radioimprov6").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = jenis; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov7(jenis){ 
	if (document.getElementById("radioimprov7").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = jenis; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov8(jenis){ 
	if (document.getElementById("radioimprov8").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = jenis; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov9(jenis){ 
	if (document.getElementById("radioimprov9").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = jenis; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = (((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100)*100/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov10(jenis){ 
	if (document.getElementById("radioimprov10").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = jenis; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;
		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov11(jenis){ 
	if (document.getElementById("radioimprov11").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = jenis; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;
		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov12(jenis){ 
	if (document.getElementById("radioimprov12").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = jenis; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov13(jenis){ 
	if (document.getElementById("radioimprov13").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = jenis; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov14(jenis){ 
	if (document.getElementById("radioimprov14").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = jenis; 		
		document.getElementById("txtimprov15").value = ""; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioimprov15(jenis){ 
	if (document.getElementById("radioimprov15").checked===true){
		document.getElementById("txtimprov4").value = ""; 
		document.getElementById("txtimprov5").value = ""; 
		document.getElementById("txtimprov6").value = ""; 		
		document.getElementById("txtimprov7").value = ""; 		
		document.getElementById("txtimprov8").value = ""; 				
		document.getElementById("txtimprov9").value = ""; 
		document.getElementById("txtimprov10").value = ""; 		
		document.getElementById("txtimprov11").value = ""; 		
		document.getElementById("txtimprov12").value = ""; 				
		document.getElementById("txtimprov13").value = ""; 
		document.getElementById("txtimprov14").value = ""; 		
		document.getElementById("txtimprov15").value = jenis; 				
		document.getElementById("nilsubmain").value = (jenis*Number(document.getElementById("bobsubmain").value))/100; 				
		document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100); 				
		document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================integritas
function cekradioint4(jenis){ 
	if (document.getElementById("radioint4").checked===true){
		document.getElementById("txtint4").value = jenis; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint5(jenis){ 
	if (document.getElementById("radioint5").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = jenis; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint6(jenis){ 
	if (document.getElementById("radioint6").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = jenis; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint7(jenis){ 
	if (document.getElementById("radioint7").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = jenis; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint8(jenis){ 
	if (document.getElementById("radioint8").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = jenis; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint9(jenis){ 
	if (document.getElementById("radioint9").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = jenis; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint10(jenis){ 
	if (document.getElementById("radioint10").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = jenis; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint11(jenis){ 
	if (document.getElementById("radioint11").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = jenis; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint12(jenis){ 
	if (document.getElementById("radioint12").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = jenis; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint13(jenis){ 
	if (document.getElementById("radioint13").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = jenis; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint14(jenis){ 
	if (document.getElementById("radioint14").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = jenis; 		
		document.getElementById("txtint15").value = ""; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradioint15(jenis){ 
	if (document.getElementById("radioint15").checked===true){
		document.getElementById("txtint4").value = ""; 
		document.getElementById("txtint5").value = ""; 
		document.getElementById("txtint6").value = ""; 		
		document.getElementById("txtint7").value = ""; 		
		document.getElementById("txtint8").value = ""; 				
		document.getElementById("txtint9").value = ""; 
		document.getElementById("txtint10").value = ""; 		
		document.getElementById("txtint11").value = ""; 		
		document.getElementById("txtint12").value = ""; 				
		document.getElementById("txtint13").value = ""; 
		document.getElementById("txtint14").value = ""; 		
		document.getElementById("txtint15").value = jenis; 				
		document.getElementById("subint").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================transparansi
function cekradiotrans4(jenis){ 
	if (document.getElementById("radiotrans4").checked===true){
		document.getElementById("txttrans4").value = jenis; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans5(jenis){ 
	if (document.getElementById("radiotrans5").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = jenis; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans6(jenis){ 
	if (document.getElementById("radiotrans6").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = jenis; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans7(jenis){ 
	if (document.getElementById("radiotrans7").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = jenis; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans8(jenis){ 
	if (document.getElementById("radiotrans8").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = jenis; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans9(jenis){ 
	if (document.getElementById("radiotrans9").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = jenis; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans10(jenis){ 
	if (document.getElementById("radiotrans10").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = jenis; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans11(jenis){ 
	if (document.getElementById("radiotrans11").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = jenis; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans12(jenis){ 
	if (document.getElementById("radiotrans12").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = jenis; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

function cekradiotrans13(jenis){ 
	if (document.getElementById("radiotrans13").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = jenis; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans14(jenis){ 
	if (document.getElementById("radiotrans14").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = jenis; 		
		document.getElementById("txttrans15").value = ""; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiotrans15(jenis){ 
	if (document.getElementById("radiotrans15").checked===true){
		document.getElementById("txttrans4").value = ""; 
		document.getElementById("txttrans5").value = ""; 
		document.getElementById("txttrans6").value = ""; 		
		document.getElementById("txttrans7").value = ""; 		
		document.getElementById("txttrans8").value = ""; 				
		document.getElementById("txttrans9").value = ""; 
		document.getElementById("txttrans10").value = ""; 		
		document.getElementById("txttrans11").value = ""; 		
		document.getElementById("txttrans12").value = ""; 				
		document.getElementById("txttrans13").value = ""; 
		document.getElementById("txttrans14").value = ""; 		
		document.getElementById("txttrans15").value = jenis; 				
		document.getElementById("subtrans").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

//=====================================kerjasama team
function cekradiokerja4(jenis){ 
	if (document.getElementById("radiokerja4").checked===true){
		document.getElementById("txtkerja4").value = jenis; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja5(jenis){ 
	if (document.getElementById("radiokerja5").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = jenis; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja6(jenis){ 
	if (document.getElementById("radiokerja6").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = jenis; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja7(jenis){ 
	if (document.getElementById("radiokerja7").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = jenis; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja8(jenis){ 
	if (document.getElementById("radiokerja8").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = jenis; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja9(jenis){ 
	if (document.getElementById("radiokerja9").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = jenis; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja10(jenis){ 
	if (document.getElementById("radiokerja10").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = jenis; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja11(jenis){ 
	if (document.getElementById("radiokerja11").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = jenis; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja12(jenis){ 
	if (document.getElementById("radiokerja12").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = jenis; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja13(jenis){ 
	if (document.getElementById("radiokerja13").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = jenis; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja14(jenis){ 
	if (document.getElementById("radiokerja14").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = jenis; 		
		document.getElementById("txtkerja15").value = ""; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokerja15(jenis){ 
	if (document.getElementById("radiokerja15").checked===true){
		document.getElementById("txtkerja4").value = ""; 
		document.getElementById("txtkerja5").value = ""; 
		document.getElementById("txtkerja6").value = ""; 		
		document.getElementById("txtkerja7").value = ""; 		
		document.getElementById("txtkerja8").value = ""; 				
		document.getElementById("txtkerja9").value = ""; 
		document.getElementById("txtkerja10").value = ""; 		
		document.getElementById("txtkerja11").value = ""; 		
		document.getElementById("txtkerja12").value = ""; 				
		document.getElementById("txtkerja13").value = ""; 
		document.getElementById("txtkerja14").value = ""; 		
		document.getElementById("txtkerja15").value = jenis; 				
		document.getElementById("subkerja").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}
	}
} 
//=====================================kreativitas
function cekradiokreativ4(jenis){ 
	if (document.getElementById("radiokreativ4").checked===true){
		document.getElementById("txtkreativ4").value = jenis; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ5(jenis){ 
	if (document.getElementById("radiokreativ5").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = jenis; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ6(jenis){ 
	if (document.getElementById("radiokreativ6").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = jenis; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ7(jenis){ 
	if (document.getElementById("radiokreativ7").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = jenis; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ8(jenis){ 
	if (document.getElementById("radiokreativ8").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = jenis; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ9(jenis){ 
	if (document.getElementById("radiokreativ9").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = jenis; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ10(jenis){ 
	if (document.getElementById("radiokreativ10").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = jenis; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ11(jenis){ 
	if (document.getElementById("radiokreativ11").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = jenis; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ12(jenis){ 
	if (document.getElementById("radiokreativ12").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = jenis; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ13(jenis){ 
	if (document.getElementById("radiokreativ13").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = jenis; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ14(jenis){ 
	if (document.getElementById("radiokreativ14").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = jenis; 		
		document.getElementById("txtkreativ15").value = ""; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiokreativ15(jenis){ 
	if (document.getElementById("radiokreativ15").checked===true){
		document.getElementById("txtkreativ4").value = ""; 
		document.getElementById("txtkreativ5").value = ""; 
		document.getElementById("txtkreativ6").value = ""; 		
		document.getElementById("txtkreativ7").value = ""; 		
		document.getElementById("txtkreativ8").value = ""; 				
		document.getElementById("txtkreativ9").value = ""; 
		document.getElementById("txtkreativ10").value = ""; 		
		document.getElementById("txtkreativ11").value = ""; 		
		document.getElementById("txtkreativ12").value = ""; 				
		document.getElementById("txtkreativ13").value = ""; 
		document.getElementById("txtkreativ14").value = ""; 		
		document.getElementById("txtkreativ15").value = jenis; 				
		document.getElementById("subkreativ").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================semangat
function cekradiosemangat4(jenis){ 
	if (document.getElementById("radiosemangat4").checked===true){
		document.getElementById("txtsemangat4").value = jenis; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat5(jenis){ 
	if (document.getElementById("radiosemangat5").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = jenis; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat6(jenis){ 
	if (document.getElementById("radiosemangat6").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = jenis; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}
	}
} 
function cekradiosemangat7(jenis){ 
	if (document.getElementById("radiosemangat7").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = jenis; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat8(jenis){ 
	if (document.getElementById("radiosemangat8").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = jenis; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat9(jenis){ 
	if (document.getElementById("radiosemangat9").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = jenis; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat10(jenis){ 
	if (document.getElementById("radiosemangat10").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = jenis; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat11(jenis){ 
	if (document.getElementById("radiosemangat11").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = jenis; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat12(jenis){ 
	if (document.getElementById("radiosemangat12").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = jenis; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
}
function cekradiosemangat13(jenis){ 
	if (document.getElementById("radiosemangat13").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = jenis; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat14(jenis){ 
	if (document.getElementById("radiosemangat14").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = jenis; 		
		document.getElementById("txtsemangat15").value = ""; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemangat15(jenis){ 
	if (document.getElementById("radiosemangat15").checked===true){
		document.getElementById("txtsemangat4").value = ""; 
		document.getElementById("txtsemangat5").value = ""; 
		document.getElementById("txtsemangat6").value = ""; 		
		document.getElementById("txtsemangat7").value = ""; 		
		document.getElementById("txtsemangat8").value = ""; 				
		document.getElementById("txtsemangat9").value = ""; 
		document.getElementById("txtsemangat10").value = ""; 		
		document.getElementById("txtsemangat11").value = ""; 		
		document.getElementById("txtsemangat12").value = ""; 				
		document.getElementById("txtsemangat13").value = ""; 
		document.getElementById("txtsemangat14").value = ""; 		
		document.getElementById("txtsemangat15").value = jenis; 				
		document.getElementById("subsemangat").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================sempurna
function cekradiosemp4(jenis){ 
	if (document.getElementById("radiosemp4").checked===true){
		document.getElementById("txtsemp4").value = jenis; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp5(jenis){ 
	if (document.getElementById("radiosemp5").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = jenis; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp6(jenis){ 
	if (document.getElementById("radiosemp6").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = jenis; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp7(jenis){ 
	if (document.getElementById("radiosemp7").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = jenis; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp8(jenis){ 
	if (document.getElementById("radiosemp8").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = jenis; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp9(jenis){ 
	if (document.getElementById("radiosemp9").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = jenis; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp10(jenis){ 
	if (document.getElementById("radiosemp10").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = jenis; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp11(jenis){ 
	if (document.getElementById("radiosemp11").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = jenis; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp12(jenis){ 
	if (document.getElementById("radiosemp12").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = jenis; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp13(jenis){ 
	if (document.getElementById("radiosemp13").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = jenis; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp14(jenis){ 
	if (document.getElementById("radiosemp14").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = jenis; 		
		document.getElementById("txtsemp15").value = ""; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiosemp15(jenis){ 
	if (document.getElementById("radiosemp15").checked===true){
		document.getElementById("txtsemp4").value = ""; 
		document.getElementById("txtsemp5").value = ""; 
		document.getElementById("txtsemp6").value = ""; 		
		document.getElementById("txtsemp7").value = ""; 		
		document.getElementById("txtsemp8").value = ""; 				
		document.getElementById("txtsemp9").value = ""; 
		document.getElementById("txtsemp10").value = ""; 		
		document.getElementById("txtsemp11").value = ""; 		
		document.getElementById("txtsemp12").value = ""; 				
		document.getElementById("txtsemp13").value = ""; 
		document.getElementById("txtsemp14").value = ""; 		
		document.getElementById("txtsemp15").value = jenis; 				
		document.getElementById("subsempurna").value = (jenis*Number(document.getElementById("bobotinti").value))/100; 				
		document.getElementById("nilbobotinti").value = (Number(document.getElementById("subint").value)+Number(document.getElementById("subtrans").value)+Number(document.getElementById("subkerja").value)+Number(document.getElementById("subkreativ").value)+Number(document.getElementById("subsemangat").value)+Number(document.getElementById("subsempurna").value))/6; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================disiplin
function cekradiodisiplin4(jenis){ 
	if (document.getElementById("radiodisiplin4").checked===true){
		document.getElementById("txtdisiplin4").value = jenis; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin5(jenis){ 
	if (document.getElementById("radiodisiplin5").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = jenis; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin6(jenis){ 
	if (document.getElementById("radiodisiplin6").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = jenis; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin7(jenis){ 
	if (document.getElementById("radiodisiplin7").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = jenis; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin8(jenis){ 
	if (document.getElementById("radiodisiplin8").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = jenis; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin9(jenis){ 
	if (document.getElementById("radiodisiplin9").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = jenis; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin10(jenis){ 
	if (document.getElementById("radiodisiplin10").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = jenis; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

function cekradiodisiplin11(jenis){ 
	if (document.getElementById("radiodisiplin11").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = jenis; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

function cekradiodisiplin12(jenis){ 
	if (document.getElementById("radiodisiplin12").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = jenis; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin13(jenis){ 
	if (document.getElementById("radiodisiplin13").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = jenis; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin14(jenis){ 
	if (document.getElementById("radiodisiplin14").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = jenis; 		
		document.getElementById("txtdisiplin15").value = ""; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiodisiplin15(jenis){ 
	if (document.getElementById("radiodisiplin15").checked===true){
		document.getElementById("txtdisiplin4").value = ""; 
		document.getElementById("txtdisiplin5").value = ""; 
		document.getElementById("txtdisiplin6").value = ""; 		
		document.getElementById("txtdisiplin7").value = ""; 		
		document.getElementById("txtdisiplin8").value = ""; 				
		document.getElementById("txtdisiplin9").value = ""; 
		document.getElementById("txtdisiplin10").value = ""; 		
		document.getElementById("txtdisiplin11").value = ""; 		
		document.getElementById("txtdisiplin12").value = ""; 				
		document.getElementById("txtdisiplin13").value = ""; 
		document.getElementById("txtdisiplin14").value = ""; 		
		document.getElementById("txtdisiplin15").value = jenis; 				
		document.getElementById("nilbobotdisiplin").value = (jenis*Number(document.getElementById("bobotdisiplin").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================pdca

function cekradiopdca4(jenis){ 
	if (document.getElementById("radiopdca4").checked===true){
		document.getElementById("txtpdca4").value = jenis; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

function cekradiopdca5(jenis){ 
	if (document.getElementById("radiopdca5").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = jenis; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

			if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca6(jenis){ 
	if (document.getElementById("radiopdca6").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = jenis; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

function cekradiopdca7(jenis){ 
	if (document.getElementById("radiopdca7").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = jenis; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca8(jenis){ 
	if (document.getElementById("radiopdca8").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = jenis; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 


function cekradiopdca9(jenis){ 
	if (document.getElementById("radiopdca9").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = jenis; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca10(jenis){ 
	if (document.getElementById("radiopdca10").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = jenis; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca11(jenis){ 
	if (document.getElementById("radiopdca11").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = jenis; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca12(jenis){ 
	if (document.getElementById("radiopdca12").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = jenis; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca13(jenis){ 
	if (document.getElementById("radiopdca13").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = jenis; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca14(jenis){ 
	if (document.getElementById("radiopdca14").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = jenis; 		
		document.getElementById("txtpdca15").value = ""; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiopdca15(jenis){ 
	if (document.getElementById("radiopdca15").checked===true){
		document.getElementById("txtpdca4").value = ""; 
		document.getElementById("txtpdca5").value = ""; 
		document.getElementById("txtpdca6").value = ""; 		
		document.getElementById("txtpdca7").value = ""; 		
		document.getElementById("txtpdca8").value = ""; 				
		document.getElementById("txtpdca9").value = ""; 
		document.getElementById("txtpdca10").value = ""; 		
		document.getElementById("txtpdca11").value = ""; 		
		document.getElementById("txtpdca12").value = ""; 				
		document.getElementById("txtpdca13").value = ""; 
		document.getElementById("txtpdca14").value = ""; 		
		document.getElementById("txtpdca15").value = jenis; 				
		document.getElementById("nilbobotpdca").value = (jenis*Number(document.getElementById("bobotpdca").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
//=====================================manage
function cekradiomanage4(jenis){ 
	if (document.getElementById("radiomanage4").checked===true){
		document.getElementById("txtmanage4").value = jenis; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage5(jenis){ 
	if (document.getElementById("radiomanage5").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = jenis; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage6(jenis){ 
	if (document.getElementById("radiomanage6").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = jenis; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 

function cekradiomanage7(jenis){ 
	if (document.getElementById("radiomanage7").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = jenis; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage8(jenis){ 
	if (document.getElementById("radiomanage8").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = jenis; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage9(jenis){ 
	if (document.getElementById("radiomanage9").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = jenis; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage10(jenis){ 
	if (document.getElementById("radiomanage10").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = jenis; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage11(jenis){ 
	if (document.getElementById("radiomanage11").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = jenis; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage12(jenis){ 
	if (document.getElementById("radiomanage12").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = jenis; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage13(jenis){ 
	if (document.getElementById("radiomanage13").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = jenis; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage14(jenis){ 
	if (document.getElementById("radiomanage14").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = jenis; 		
		document.getElementById("txtmanage15").value = ""; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 
function cekradiomanage15(jenis){ 
	if (document.getElementById("radiomanage15").checked===true){
		document.getElementById("txtmanage4").value = ""; 
		document.getElementById("txtmanage5").value = ""; 
		document.getElementById("txtmanage6").value = ""; 		
		document.getElementById("txtmanage7").value = ""; 		
		document.getElementById("txtmanage8").value = ""; 				
		document.getElementById("txtmanage9").value = ""; 
		document.getElementById("txtmanage10").value = ""; 		
		document.getElementById("txtmanage11").value = ""; 		
		document.getElementById("txtmanage12").value = ""; 				
		document.getElementById("txtmanage13").value = ""; 
		document.getElementById("txtmanage14").value = ""; 		
		document.getElementById("txtmanage15").value = jenis; 				
		document.getElementById("nilbobotmanagement").value = (jenis*Number(document.getElementById("bobotmanagement").value))/100; 				
		document.getElementById("nilbobotkba").value = Number(document.getElementById("nilbobotinti").value)+Number(document.getElementById("nilbobotdisiplin").value)+Number(document.getElementById("nilbobotpdca").value)+Number(document.getElementById("nilbobotmanagement").value);
		document.getElementById("totnilkba").value = (Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value))/100; 				
	    var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100); 	
        document.getElementById("totkrakba").value =jumlah;

		if (jumlah <= 6.99){
	       document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
		}
		
		if (jumlah > 6.99){
   	    	if (jumlah <= 9.99){
		       document.getElementById("hasil").value ='KOMPETEN';
		    }
		}
		if (jumlah > 9.99){
   	    	if (jumlah <= 12.99){
		       document.getElementById("hasil").value ='SANGAT EFEKTIF';
		    }
		}
		
		if (jumlah > 12.99){
   	    	if (jumlah <= 15){
		       document.getElementById("hasil").value ='SEMPURNA';
		    }
		}

	}
} 


$(document).ready(function() {

   $("#btnsimpan").prop('disabled', true);
   $("#btncetak").prop('disabled', true);      
   
});


function simpankrakba(){ 
	var datadept = "<?php echo $_SESSION['kopeg'] ?>";
	
	var data2 = document.getElementById("periode").value;
	var data3 = document.getElementById("tahun").value;

	if (datadept=='2016068'){	
	var data1 = document.getElementById("iddinilai").value;
    if(document.getElementById("iddinilai").value!="")
	  { 	  
    if(document.getElementById("periode").value!="-")
	  { 	  
    if(document.getElementById("tahun").value!="-")
	  { 	  	  
      xajax_simpankrakba(document.getElementById("iddinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value
	                     ,document.getElementById("txtmain4").value,document.getElementById("txtmain5").value,document.getElementById("txtmain6").value,document.getElementById("txtmain7").value,document.getElementById("txtmain8").value,document.getElementById("txtmain9").value,document.getElementById("txtmain10").value,document.getElementById("txtmain11").value,document.getElementById("txtmain12").value,document.getElementById("txtmain13").value,document.getElementById("txtmain14").value,document.getElementById("txtmain15").value
	                     ,document.getElementById("txtimprov4").value,document.getElementById("txtimprov5").value,document.getElementById("txtimprov6").value,document.getElementById("txtimprov7").value,document.getElementById("txtimprov8").value,document.getElementById("txtimprov9").value,document.getElementById("txtimprov10").value,document.getElementById("txtimprov11").value,document.getElementById("txtimprov12").value,document.getElementById("txtimprov13").value,document.getElementById("txtimprov14").value,document.getElementById("txtimprov15").value
	                     ,document.getElementById("txtint4").value,document.getElementById("txtint5").value,document.getElementById("txtint6").value,document.getElementById("txtint7").value,document.getElementById("txtint8").value,document.getElementById("txtint9").value,document.getElementById("txtint10").value,document.getElementById("txtint11").value,document.getElementById("txtint12").value,document.getElementById("txtint13").value,document.getElementById("txtint14").value,document.getElementById("txtint15").value
	                     ,document.getElementById("txttrans4").value,document.getElementById("txttrans5").value,document.getElementById("txttrans6").value,document.getElementById("txttrans7").value,document.getElementById("txttrans8").value,document.getElementById("txttrans9").value,document.getElementById("txttrans10").value,document.getElementById("txttrans11").value,document.getElementById("txttrans12").value,document.getElementById("txttrans13").value,document.getElementById("txttrans14").value,document.getElementById("txttrans15").value
	                     ,document.getElementById("txtkerja4").value,document.getElementById("txtkerja5").value,document.getElementById("txtkerja6").value,document.getElementById("txtkerja7").value,document.getElementById("txtkerja8").value,document.getElementById("txtkerja9").value,document.getElementById("txtkerja10").value,document.getElementById("txtkerja11").value,document.getElementById("txtkerja12").value,document.getElementById("txtkerja13").value,document.getElementById("txtkerja14").value,document.getElementById("txtkerja15").value
	                     ,document.getElementById("txtkreativ4").value,document.getElementById("txtkreativ5").value,document.getElementById("txtkreativ6").value,document.getElementById("txtkreativ7").value,document.getElementById("txtkreativ8").value,document.getElementById("txtkreativ9").value,document.getElementById("txtkreativ10").value,document.getElementById("txtkreativ11").value,document.getElementById("txtkreativ12").value,document.getElementById("txtkreativ13").value,document.getElementById("txtkreativ14").value,document.getElementById("txtkreativ5").value
	                     ,document.getElementById("txtsemangat4").value,document.getElementById("txtsemangat5").value,document.getElementById("txtsemangat6").value,document.getElementById("txtsemangat7").value,document.getElementById("txtsemangat8").value,document.getElementById("txtsemangat9").value,document.getElementById("txtsemangat10").value,document.getElementById("txtsemangat11").value,document.getElementById("txtsemangat12").value,document.getElementById("txtsemangat13").value,document.getElementById("txtsemangat14").value,document.getElementById("txtsemangat15").value
	                    ,document.getElementById("txtsemp4").value,document.getElementById("txtsemp5").value,document.getElementById("txtsemp6").value,document.getElementById("txtsemp7").value,document.getElementById("txtsemp8").value,document.getElementById("txtsemp9").value,document.getElementById("txtsemp10").value,document.getElementById("txtsemp11").value,document.getElementById("txtsemp12").value,document.getElementById("txtsemp13").value,document.getElementById("txtsemp14").value,document.getElementById("txtsemp15").value
	                     ,document.getElementById("txtdisiplin4").value,document.getElementById("txtdisiplin5").value,document.getElementById("txtdisiplin6").value,document.getElementById("txtdisiplin7").value,document.getElementById("txtdisiplin8").value,document.getElementById("txtdisiplin9").value,document.getElementById("txtdisiplin10").value,document.getElementById("txtdisiplin11").value,document.getElementById("txtdisiplin12").value,document.getElementById("txtdisiplin13").value,document.getElementById("txtdisiplin14").value,document.getElementById("txtdisiplin15").value
	                     ,document.getElementById("txtpdca4").value,document.getElementById("txtpdca5").value,document.getElementById("txtpdca6").value,document.getElementById("txtpdca7").value,document.getElementById("txtpdca8").value,document.getElementById("txtpdca9").value,document.getElementById("txtpdca10").value,document.getElementById("txtpdca11").value,document.getElementById("txtpdca12").value,document.getElementById("txtpdca13").value,document.getElementById("txtpdca14").value,document.getElementById("txtpdca15").value
	                     ,document.getElementById("txtmanage4").value,document.getElementById("txtmanage5").value,document.getElementById("txtmanage6").value,document.getElementById("txtmanage7").value,document.getElementById("txtmanage8").value,document.getElementById("txtmanage9").value,document.getElementById("txtmanage10").value,document.getElementById("txtmanage11").value,document.getElementById("txtmanage12").value,document.getElementById("txtmanage13").value,document.getElementById("txtmanage14").value,document.getElementById("txtmanage15").value  
	                     ,document.getElementById("kekuatan").value,document.getElementById("kelemahan").value,document.getElementById("tindaklanjut").value,document.getElementById("jadwal").value 

						 ); 	 	 
                         kosong();  
		    $("#btncetak").attr("onClick", "window.open('<?=base_url()?>index.php/cbham/formcetakkrakba/"+data1+"/"+data2+"/"+data3+"')");                         
		}
		else{alert("Tahun belum dipilih");}
		}
		else{alert("Periode belum dipilih");}
		}
		else{alert("Nama belum dipilih");}
	
	}else{
	var data1 = document.getElementById("dinilai").value;		
    if(document.getElementById("dinilai").value!="0")
	  { 	  
    if(document.getElementById("periode").value!="-")
	  { 	  
    if(document.getElementById("tahun").value!="-")
	  { 	  	  
      xajax_simpankrakba(document.getElementById("dinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value
	                     ,document.getElementById("txtmain4").value,document.getElementById("txtmain5").value,document.getElementById("txtmain6").value,document.getElementById("txtmain7").value,document.getElementById("txtmain8").value,document.getElementById("txtmain9").value,document.getElementById("txtmain10").value,document.getElementById("txtmain11").value,document.getElementById("txtmain12").value,document.getElementById("txtmain13").value,document.getElementById("txtmain14").value,document.getElementById("txtmain15").value
	                     ,document.getElementById("txtimprov4").value,document.getElementById("txtimprov5").value,document.getElementById("txtimprov6").value,document.getElementById("txtimprov7").value,document.getElementById("txtimprov8").value,document.getElementById("txtimprov9").value,document.getElementById("txtimprov10").value,document.getElementById("txtimprov11").value,document.getElementById("txtimprov12").value,document.getElementById("txtimprov13").value,document.getElementById("txtimprov14").value,document.getElementById("txtimprov15").value
	                     ,document.getElementById("txtint4").value,document.getElementById("txtint5").value,document.getElementById("txtint6").value,document.getElementById("txtint7").value,document.getElementById("txtint8").value,document.getElementById("txtint9").value,document.getElementById("txtint10").value,document.getElementById("txtint11").value,document.getElementById("txtint12").value,document.getElementById("txtint13").value,document.getElementById("txtint14").value,document.getElementById("txtint15").value
	                     ,document.getElementById("txttrans4").value,document.getElementById("txttrans5").value,document.getElementById("txttrans6").value,document.getElementById("txttrans7").value,document.getElementById("txttrans8").value,document.getElementById("txttrans9").value,document.getElementById("txttrans10").value,document.getElementById("txttrans11").value,document.getElementById("txttrans12").value,document.getElementById("txttrans13").value,document.getElementById("txttrans14").value,document.getElementById("txttrans15").value
	                     ,document.getElementById("txtkerja4").value,document.getElementById("txtkerja5").value,document.getElementById("txtkerja6").value,document.getElementById("txtkerja7").value,document.getElementById("txtkerja8").value,document.getElementById("txtkerja9").value,document.getElementById("txtkerja10").value,document.getElementById("txtkerja11").value,document.getElementById("txtkerja12").value,document.getElementById("txtkerja13").value,document.getElementById("txtkerja14").value,document.getElementById("txtkerja15").value
	                     ,document.getElementById("txtkreativ4").value,document.getElementById("txtkreativ5").value,document.getElementById("txtkreativ6").value,document.getElementById("txtkreativ7").value,document.getElementById("txtkreativ8").value,document.getElementById("txtkreativ9").value,document.getElementById("txtkreativ10").value,document.getElementById("txtkreativ11").value,document.getElementById("txtkreativ12").value,document.getElementById("txtkreativ13").value,document.getElementById("txtkreativ14").value,document.getElementById("txtkreativ5").value
	                     ,document.getElementById("txtsemangat4").value,document.getElementById("txtsemangat5").value,document.getElementById("txtsemangat6").value,document.getElementById("txtsemangat7").value,document.getElementById("txtsemangat8").value,document.getElementById("txtsemangat9").value,document.getElementById("txtsemangat10").value,document.getElementById("txtsemangat11").value,document.getElementById("txtsemangat12").value,document.getElementById("txtsemangat13").value,document.getElementById("txtsemangat14").value,document.getElementById("txtsemangat15").value
	                    ,document.getElementById("txtsemp4").value,document.getElementById("txtsemp5").value,document.getElementById("txtsemp6").value,document.getElementById("txtsemp7").value,document.getElementById("txtsemp8").value,document.getElementById("txtsemp9").value,document.getElementById("txtsemp10").value,document.getElementById("txtsemp11").value,document.getElementById("txtsemp12").value,document.getElementById("txtsemp13").value,document.getElementById("txtsemp14").value,document.getElementById("txtsemp15").value
	                     ,document.getElementById("txtdisiplin4").value,document.getElementById("txtdisiplin5").value,document.getElementById("txtdisiplin6").value,document.getElementById("txtdisiplin7").value,document.getElementById("txtdisiplin8").value,document.getElementById("txtdisiplin9").value,document.getElementById("txtdisiplin10").value,document.getElementById("txtdisiplin11").value,document.getElementById("txtdisiplin12").value,document.getElementById("txtdisiplin13").value,document.getElementById("txtdisiplin14").value,document.getElementById("txtdisiplin15").value
	                     ,document.getElementById("txtpdca4").value,document.getElementById("txtpdca5").value,document.getElementById("txtpdca6").value,document.getElementById("txtpdca7").value,document.getElementById("txtpdca8").value,document.getElementById("txtpdca9").value,document.getElementById("txtpdca10").value,document.getElementById("txtpdca11").value,document.getElementById("txtpdca12").value,document.getElementById("txtpdca13").value,document.getElementById("txtpdca14").value,document.getElementById("txtpdca15").value
	                     ,document.getElementById("txtmanage4").value,document.getElementById("txtmanage5").value,document.getElementById("txtmanage6").value,document.getElementById("txtmanage7").value,document.getElementById("txtmanage8").value,document.getElementById("txtmanage9").value,document.getElementById("txtmanage10").value,document.getElementById("txtmanage11").value,document.getElementById("txtmanage12").value,document.getElementById("txtmanage13").value,document.getElementById("txtmanage14").value,document.getElementById("txtmanage15").value  
	                     ,document.getElementById("kekuatan").value,document.getElementById("kelemahan").value,document.getElementById("tindaklanjut").value,document.getElementById("jadwal").value 

						 ); 	 	 
                         kosong();  
			$("#btncetak").attr("onClick", "window.open('<?=base_url()?>index.php/cbham/formcetakkrakba/"+data1+"/"+data2+"/"+data3+"')");                                                  
		}
		else{alert("Tahun belum dipilih");}
		}
		else{alert("Periode belum dipilih");}
		}
		else{alert("Nama belum dipilih");}
	}
                     
} 


function carikrakba(){ 
	var datadept = "<?php echo $_SESSION['kopeg'] ?>";
	if (datadept=='2016068'){
     	xajax_carikrakba(document.getElementById("iddinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value);
    }else{
		xajax_carikrakba(document.getElementById("dinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value);    			
    }
}

function carikra(){ 
	var datadept = "<?php echo $_SESSION['kopeg'] ?>";
	if (datadept=='2016068'){
		xajax_carikra(document.getElementById("iddinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value,document.getElementById("kra").value,document.getElementById("kba").value,document.getElementById("bobsubmain").value,document.getElementById("nilbobotkba").value);		
     	// xajax_carikra(document.getElementById("iddinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value);
    }else{
		xajax_carikra(document.getElementById("dinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value,document.getElementById("kra").value,document.getElementById("kba").value,document.getElementById("bobsubmain").value,document.getElementById("nilbobotkba").value);    	    	
		// xajax_carikra(document.getElementById("dinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value);    	
    }
}

function hapuskrakba(){ 
     xajax_hapuskrakba(document.getElementById("dinilai").value,document.getElementById("periode").value,document.getElementById("tahun").value);
     kosong();  
}

function carinilai(){ 
   xajax_carinilai(document.getElementById("dinilai").value);
   kosong1();
  // document.getElementById("kra").value=90;
   
}


function carinilai1(){ 
   xajax_carinilai1(document.getElementById("iddinilai").value);
   
}

// function carinilai1(){ 

// $(document).ready(function() {
// // jQuery(document).ready(function($){ 
//    $("#nilai1").keyup(function(){
//           if ($("#nilai1").val()=='0'){
//             $("#nilai1x").val('0');
//           }else{
//             $("#nilai1x").val('1');
//           }
//    });
     
// });

//    xajax_carinilai(document.getElementById("dinilai").value);
//   // document.getElementById("kra").value=90;
   
// }

function kosong(){
   document.getElementById("radiomain4").checked=false;   
   document.getElementById("radiomain5").checked=false;   
   document.getElementById("radiomain6").checked=false;   
   document.getElementById("radiomain7").checked=false;   
   document.getElementById("radiomain8").checked=false;   
   document.getElementById("radiomain9").checked=false;   
   document.getElementById("radiomain10").checked=false;   
   document.getElementById("radiomain11").checked=false;   
   document.getElementById("radiomain12").checked=false;   
   document.getElementById("radiomain13").checked=false;   
   document.getElementById("radiomain14").checked=false;   
   document.getElementById("radiomain15").checked=false;   

   document.getElementById("txtmain4").value="";   
   document.getElementById("txtmain5").value="";   
   document.getElementById("txtmain6").value="";   
   document.getElementById("txtmain7").value="";   
   document.getElementById("txtmain8").value="";   
   document.getElementById("txtmain9").value="";   
   document.getElementById("txtmain10").value="";   
   document.getElementById("txtmain11").value="";   
   document.getElementById("txtmain12").value="";   
   document.getElementById("txtmain13").value="";   
   document.getElementById("txtmain14").value="";   
   document.getElementById("txtmain15").value="";   

   document.getElementById("radioimprov4").checked=false;   
   document.getElementById("radioimprov5").checked=false;   
   document.getElementById("radioimprov6").checked=false;   
   document.getElementById("radioimprov7").checked=false;   
   document.getElementById("radioimprov8").checked=false;   
   document.getElementById("radioimprov9").checked=false;   
   document.getElementById("radioimprov10").checked=false;   
   document.getElementById("radioimprov11").checked=false;   
   document.getElementById("radioimprov12").checked=false;   
   document.getElementById("radioimprov13").checked=false;   
   document.getElementById("radioimprov14").checked=false;   
   document.getElementById("radioimprov15").checked=false;   


   document.getElementById("txtimprov4").value="";   
   document.getElementById("txtimprov5").value="";   
   document.getElementById("txtimprov6").value="";   
   document.getElementById("txtimprov7").value="";   
   document.getElementById("txtimprov8").value="";   
   document.getElementById("txtimprov9").value="";   
   document.getElementById("txtimprov10").value="";   
   document.getElementById("txtimprov11").value="";   
   document.getElementById("txtimprov12").value="";   
   document.getElementById("txtimprov13").value="";   
   document.getElementById("txtimprov14").value="";   
   document.getElementById("txtimprov15").value="";   

   document.getElementById("radioint4").checked=false;   
   document.getElementById("radioint5").checked=false;   
   document.getElementById("radioint6").checked=false;   
   document.getElementById("radioint7").checked=false;   
   document.getElementById("radioint8").checked=false;   
   document.getElementById("radioint9").checked=false;   
   document.getElementById("radioint10").checked=false;   
   document.getElementById("radioint11").checked=false;   
   document.getElementById("radioint12").checked=false;   
   document.getElementById("radioint13").checked=false;   
   document.getElementById("radioint14").checked=false;   
   document.getElementById("radioint15").checked=false;   

   document.getElementById("txtint4").value="";   
   document.getElementById("txtint5").value="";   
   document.getElementById("txtint6").value="";   
   document.getElementById("txtint7").value="";   
   document.getElementById("txtint8").value="";   
   document.getElementById("txtint9").value="";   
   document.getElementById("txtint10").value="";   
   document.getElementById("txtint11").value="";   
   document.getElementById("txtint12").value="";   
   document.getElementById("txtint13").value="";   
   document.getElementById("txtint14").value="";   
   document.getElementById("txtint15").value="";   

   document.getElementById("radiotrans4").checked=false;   
   document.getElementById("radiotrans5").checked=false;   
   document.getElementById("radiotrans6").checked=false;   
   document.getElementById("radiotrans7").checked=false;   
   document.getElementById("radiotrans8").checked=false;   
   document.getElementById("radiotrans9").checked=false;   
   document.getElementById("radiotrans10").checked=false;   
   document.getElementById("radiotrans11").checked=false;   
   document.getElementById("radiotrans12").checked=false;   
   document.getElementById("radiotrans13").checked=false;   
   document.getElementById("radiotrans14").checked=false;   
   document.getElementById("radiotrans15").checked=false;   


   document.getElementById("txttrans4").value="";   
   document.getElementById("txttrans5").value="";   
   document.getElementById("txttrans6").value="";   
   document.getElementById("txttrans7").value="";   
   document.getElementById("txttrans8").value="";   
   document.getElementById("txttrans9").value="";   
   document.getElementById("txttrans10").value="";   
   document.getElementById("txttrans11").value="";   
   document.getElementById("txttrans12").value="";   
   document.getElementById("txttrans13").value="";   
   document.getElementById("txttrans14").value="";   
   document.getElementById("txttrans15").value="";   

   document.getElementById("radiokerja4").checked=false;   
   document.getElementById("radiokerja5").checked=false;   
   document.getElementById("radiokerja6").checked=false;   
   document.getElementById("radiokerja7").checked=false;   
   document.getElementById("radiokerja8").checked=false;   
   document.getElementById("radiokerja9").checked=false;   
   document.getElementById("radiokerja10").checked=false;   
   document.getElementById("radiokerja11").checked=false;   
   document.getElementById("radiokerja12").checked=false;   
   document.getElementById("radiokerja13").checked=false;   
   document.getElementById("radiokerja14").checked=false;   
   document.getElementById("radiokerja15").checked=false;   

   document.getElementById("txtkerja4").value="";   
   document.getElementById("txtkerja5").value="";   
   document.getElementById("txtkerja6").value="";   
   document.getElementById("txtkerja7").value="";   
   document.getElementById("txtkerja8").value="";   
   document.getElementById("txtkerja9").value="";   
   document.getElementById("txtkerja10").value="";   
   document.getElementById("txtkerja11").value="";   
   document.getElementById("txtkerja12").value="";   
   document.getElementById("txtkerja13").value="";   
   document.getElementById("txtkerja14").value="";   
   document.getElementById("txtkerja15").value="";   

   document.getElementById("radiokreativ4").checked=false;   
   document.getElementById("radiokreativ5").checked=false;   
   document.getElementById("radiokreativ6").checked=false;   
   document.getElementById("radiokreativ7").checked=false;   
   document.getElementById("radiokreativ8").checked=false;   
   document.getElementById("radiokreativ9").checked=false;   
   document.getElementById("radiokreativ10").checked=false;   
   document.getElementById("radiokreativ11").checked=false;   
   document.getElementById("radiokreativ12").checked=false;   
   document.getElementById("radiokreativ13").checked=false;   
   document.getElementById("radiokreativ14").checked=false;   
   document.getElementById("radiokreativ15").checked=false;   

   document.getElementById("txtkreativ4").value="";   
   document.getElementById("txtkreativ5").value="";   
   document.getElementById("txtkreativ6").value="";   
   document.getElementById("txtkreativ7").value="";   
   document.getElementById("txtkreativ8").value="";   
   document.getElementById("txtkreativ9").value="";   
   document.getElementById("txtkreativ10").value="";   
   document.getElementById("txtkreativ11").value="";   
   document.getElementById("txtkreativ12").value="";   
   document.getElementById("txtkreativ13").value="";   
   document.getElementById("txtkreativ14").value="";   
   document.getElementById("txtkreativ15").value="";   

   document.getElementById("radiosemangat4").checked=false;   
   document.getElementById("radiosemangat5").checked=false;   
   document.getElementById("radiosemangat6").checked=false;   
   document.getElementById("radiosemangat7").checked=false;   
   document.getElementById("radiosemangat8").checked=false;   
   document.getElementById("radiosemangat9").checked=false;   
   document.getElementById("radiosemangat10").checked=false;   
   document.getElementById("radiosemangat11").checked=false;   
   document.getElementById("radiosemangat12").checked=false;   
   document.getElementById("radiosemangat13").checked=false;   
   document.getElementById("radiosemangat14").checked=false;   
   document.getElementById("radiosemangat15").checked=false;   

   document.getElementById("txtsemangat4").value="";   
   document.getElementById("txtsemangat5").value="";   
   document.getElementById("txtsemangat6").value="";   
   document.getElementById("txtsemangat7").value="";   
   document.getElementById("txtsemangat8").value="";   
   document.getElementById("txtsemangat9").value="";   
   document.getElementById("txtsemangat10").value="";   
   document.getElementById("txtsemangat11").value="";   
   document.getElementById("txtsemangat12").value="";   
   document.getElementById("txtsemangat13").value="";   
   document.getElementById("txtsemangat14").value="";   
   document.getElementById("txtsemangat15").value="";   

   document.getElementById("radiosemp4").checked=false;   
   document.getElementById("radiosemp5").checked=false;   
   document.getElementById("radiosemp6").checked=false;   
   document.getElementById("radiosemp7").checked=false;   
   document.getElementById("radiosemp8").checked=false;   
   document.getElementById("radiosemp9").checked=false;   
   document.getElementById("radiosemp10").checked=false;   
   document.getElementById("radiosemp11").checked=false;   
   document.getElementById("radiosemp12").checked=false;   
   document.getElementById("radiosemp13").checked=false;   
   document.getElementById("radiosemp14").checked=false;   
   document.getElementById("radiosemp15").checked=false;   

   document.getElementById("txtsemp4").value="";   
   document.getElementById("txtsemp5").value="";   
   document.getElementById("txtsemp6").value="";   
   document.getElementById("txtsemp7").value="";   
   document.getElementById("txtsemp8").value="";   
   document.getElementById("txtsemp9").value="";   
   document.getElementById("txtsemp10").value="";   
   document.getElementById("txtsemp11").value="";   
   document.getElementById("txtsemp12").value="";   
   document.getElementById("txtsemp13").value="";   
   document.getElementById("txtsemp14").value="";   
   document.getElementById("txtsemp15").value="";   

   document.getElementById("radiodisiplin4").checked=false;   
   document.getElementById("radiodisiplin5").checked=false;   
   document.getElementById("radiodisiplin6").checked=false;   
   document.getElementById("radiodisiplin7").checked=false;   
   document.getElementById("radiodisiplin8").checked=false;   
   document.getElementById("radiodisiplin9").checked=false;   
   document.getElementById("radiodisiplin10").checked=false;   
   document.getElementById("radiodisiplin11").checked=false;   
   document.getElementById("radiodisiplin12").checked=false;   
   document.getElementById("radiodisiplin13").checked=false;   
   document.getElementById("radiodisiplin14").checked=false;   
   document.getElementById("radiodisiplin15").checked=false;   


   document.getElementById("txtdisiplin4").value="";   
   document.getElementById("txtdisiplin5").value="";   
   document.getElementById("txtdisiplin6").value="";   
   document.getElementById("txtdisiplin7").value="";   
   document.getElementById("txtdisiplin8").value="";   
   document.getElementById("txtdisiplin9").value="";   
   document.getElementById("txtdisiplin10").value="";   
   document.getElementById("txtdisiplin11").value="";   
   document.getElementById("txtdisiplin12").value="";   
   document.getElementById("txtdisiplin13").value="";   
   document.getElementById("txtdisiplin14").value="";   
   document.getElementById("txtdisiplin15").value="";   

   document.getElementById("radiopdca4").checked=false;   
   document.getElementById("radiopdca5").checked=false;   
   document.getElementById("radiopdca6").checked=false;   
   document.getElementById("radiopdca7").checked=false;   
   document.getElementById("radiopdca8").checked=false;   
   document.getElementById("radiopdca9").checked=false;   
   document.getElementById("radiopdca10").checked=false;   
   document.getElementById("radiopdca11").checked=false;   
   document.getElementById("radiopdca12").checked=false;   
   document.getElementById("radiopdca13").checked=false;   
   document.getElementById("radiopdca14").checked=false;   
   document.getElementById("radiopdca15").checked=false;   

   document.getElementById("txtpdca4").value="";   
   document.getElementById("txtpdca5").value="";   
   document.getElementById("txtpdca6").value="";   
   document.getElementById("txtpdca7").value="";   
   document.getElementById("txtpdca8").value="";   
   document.getElementById("txtpdca9").value="";   
   document.getElementById("txtpdca10").value="";   
   document.getElementById("txtpdca11").value="";   
   document.getElementById("txtpdca12").value="";   
   document.getElementById("txtpdca13").value="";   
   document.getElementById("txtpdca14").value="";   
   document.getElementById("txtpdca15").value="";   

   document.getElementById("radiomanage4").checked=false;   
   document.getElementById("radiomanage5").checked=false;   
   document.getElementById("radiomanage6").checked=false;   
   document.getElementById("radiomanage7").checked=false;   
   document.getElementById("radiomanage8").checked=false;   
   document.getElementById("radiomanage9").checked=false;   
   document.getElementById("radiomanage10").checked=false;   
   document.getElementById("radiomanage11").checked=false;   
   document.getElementById("radiomanage12").checked=false;   
   document.getElementById("radiomanage13").checked=false;   
   document.getElementById("radiomanage14").checked=false;   
   document.getElementById("radiomanage15").checked=false;   

   document.getElementById("txtmanage4").value="";   
   document.getElementById("txtmanage5").value="";   
   document.getElementById("txtmanage6").value="";   
   document.getElementById("txtmanage7").value="";   
   document.getElementById("txtmanage8").value="";   
   document.getElementById("txtmanage9").value="";   
   document.getElementById("txtmanage10").value="";   
   document.getElementById("txtmanage11").value="";   
   document.getElementById("txtmanage12").value="";   
   document.getElementById("txtmanage13").value="";   
   document.getElementById("txtmanage14").value="";   
   document.getElementById("txtmanage15").value="";   

   document.getElementById("kekuatan").value="";
   document.getElementById("kelemahan").value="";
   document.getElementById("tindaklanjut").value="";
   document.getElementById("jadwal").value=""; 

   document.getElementById("nilsubmain").value="0";   
   document.getElementById("nilsubimprov").value="0";   
   document.getElementById("nilbobotkra").value="0";   
   document.getElementById("totalnilkra").value="0";   
   document.getElementById("subint").value="0";   
   document.getElementById("subtrans").value="0";   
   document.getElementById("subkerja").value="0";   
   document.getElementById("subkreativ").value="0";   
   document.getElementById("subsemangat").value="0";   
   document.getElementById("subsempurna").value="0";   
   document.getElementById("nilbobotinti").value="0";   
   document.getElementById("nilbobotdisiplin").value="0";   
   document.getElementById("nilbobotpdca").value="0";   
   document.getElementById("nilbobotmanagement").value="0";   
   document.getElementById("nilbobotkba").value="0";   
   document.getElementById("totnilkba").value="0";   
   document.getElementById("totkrakba").value="0";   
   document.getElementById("hasil").value="";   

}

function kosong1(){
   document.getElementById("radiomain4").disabled=false;   
   document.getElementById("radiomain5").disabled=false;   
   document.getElementById("radiomain6").disabled=false;   
   document.getElementById("radiomain7").disabled=false;   
   document.getElementById("radiomain8").disabled=false;   
   document.getElementById("radiomain9").disabled=false;   
   document.getElementById("radiomain10").disabled=false;   
   document.getElementById("radiomain11").disabled=false;   
   document.getElementById("radiomain12").disabled=false;   
   document.getElementById("radiomain13").disabled=false;   
   document.getElementById("radiomain14").disabled=false;   
   document.getElementById("radiomain15").disabled=false;   

   document.getElementById("radiomain4").checked=false;   
   document.getElementById("radiomain5").checked=false;   
   document.getElementById("radiomain6").checked=false;   
   document.getElementById("radiomain7").checked=false;   
   document.getElementById("radiomain8").checked=false;   
   document.getElementById("radiomain9").checked=false;   
   document.getElementById("radiomain10").checked=false;   
   document.getElementById("radiomain11").checked=false;   
   document.getElementById("radiomain12").checked=false;   
   document.getElementById("radiomain13").checked=false;   
   document.getElementById("radiomain14").checked=false;   
   document.getElementById("radiomain15").checked=false;   

   document.getElementById("txtmain4").value="";   
   document.getElementById("txtmain5").value="";   
   document.getElementById("txtmain6").value="";   
   document.getElementById("txtmain7").value="";   
   document.getElementById("txtmain8").value="";   
   document.getElementById("txtmain9").value="";   
   document.getElementById("txtmain10").value="";   
   document.getElementById("txtmain11").value="";   
   document.getElementById("txtmain12").value="";   
   document.getElementById("txtmain13").value="";   
   document.getElementById("txtmain14").value="";   
   document.getElementById("txtmain15").value="";   

   document.getElementById("radioimprov4").checked=false;   
   document.getElementById("radioimprov5").checked=false;   
   document.getElementById("radioimprov6").checked=false;   
   document.getElementById("radioimprov7").checked=false;   
   document.getElementById("radioimprov8").checked=false;   
   document.getElementById("radioimprov9").checked=false;   
   document.getElementById("radioimprov10").checked=false;   
   document.getElementById("radioimprov11").checked=false;   
   document.getElementById("radioimprov12").checked=false;   
   document.getElementById("radioimprov13").checked=false;   
   document.getElementById("radioimprov14").checked=false;   
   document.getElementById("radioimprov15").checked=false;   


   document.getElementById("txtimprov4").value="";   
   document.getElementById("txtimprov5").value="";   
   document.getElementById("txtimprov6").value="";   
   document.getElementById("txtimprov7").value="";   
   document.getElementById("txtimprov8").value="";   
   document.getElementById("txtimprov9").value="";   
   document.getElementById("txtimprov10").value="";   
   document.getElementById("txtimprov11").value="";   
   document.getElementById("txtimprov12").value="";   
   document.getElementById("txtimprov13").value="";   
   document.getElementById("txtimprov14").value="";   
   document.getElementById("txtimprov15").value="";   

   document.getElementById("radioint4").checked=false;   
   document.getElementById("radioint5").checked=false;   
   document.getElementById("radioint6").checked=false;   
   document.getElementById("radioint7").checked=false;   
   document.getElementById("radioint8").checked=false;   
   document.getElementById("radioint9").checked=false;   
   document.getElementById("radioint10").checked=false;   
   document.getElementById("radioint11").checked=false;   
   document.getElementById("radioint12").checked=false;   
   document.getElementById("radioint13").checked=false;   
   document.getElementById("radioint14").checked=false;   
   document.getElementById("radioint15").checked=false;   

   document.getElementById("txtint4").value="";   
   document.getElementById("txtint5").value="";   
   document.getElementById("txtint6").value="";   
   document.getElementById("txtint7").value="";   
   document.getElementById("txtint8").value="";   
   document.getElementById("txtint9").value="";   
   document.getElementById("txtint10").value="";   
   document.getElementById("txtint11").value="";   
   document.getElementById("txtint12").value="";   
   document.getElementById("txtint13").value="";   
   document.getElementById("txtint14").value="";   
   document.getElementById("txtint15").value="";   

   document.getElementById("radiotrans4").checked=false;   
   document.getElementById("radiotrans5").checked=false;   
   document.getElementById("radiotrans6").checked=false;   
   document.getElementById("radiotrans7").checked=false;   
   document.getElementById("radiotrans8").checked=false;   
   document.getElementById("radiotrans9").checked=false;   
   document.getElementById("radiotrans10").checked=false;   
   document.getElementById("radiotrans11").checked=false;   
   document.getElementById("radiotrans12").checked=false;   
   document.getElementById("radiotrans13").checked=false;   
   document.getElementById("radiotrans14").checked=false;   
   document.getElementById("radiotrans15").checked=false;   


   document.getElementById("txttrans4").value="";   
   document.getElementById("txttrans5").value="";   
   document.getElementById("txttrans6").value="";   
   document.getElementById("txttrans7").value="";   
   document.getElementById("txttrans8").value="";   
   document.getElementById("txttrans9").value="";   
   document.getElementById("txttrans10").value="";   
   document.getElementById("txttrans11").value="";   
   document.getElementById("txttrans12").value="";   
   document.getElementById("txttrans13").value="";   
   document.getElementById("txttrans14").value="";   
   document.getElementById("txttrans15").value="";   

   document.getElementById("radiokerja4").checked=false;   
   document.getElementById("radiokerja5").checked=false;   
   document.getElementById("radiokerja6").checked=false;   
   document.getElementById("radiokerja7").checked=false;   
   document.getElementById("radiokerja8").checked=false;   
   document.getElementById("radiokerja9").checked=false;   
   document.getElementById("radiokerja10").checked=false;   
   document.getElementById("radiokerja11").checked=false;   
   document.getElementById("radiokerja12").checked=false;   
   document.getElementById("radiokerja13").checked=false;   
   document.getElementById("radiokerja14").checked=false;   
   document.getElementById("radiokerja15").checked=false;   

   document.getElementById("txtkerja4").value="";   
   document.getElementById("txtkerja5").value="";   
   document.getElementById("txtkerja6").value="";   
   document.getElementById("txtkerja7").value="";   
   document.getElementById("txtkerja8").value="";   
   document.getElementById("txtkerja9").value="";   
   document.getElementById("txtkerja10").value="";   
   document.getElementById("txtkerja11").value="";   
   document.getElementById("txtkerja12").value="";   
   document.getElementById("txtkerja13").value="";   
   document.getElementById("txtkerja14").value="";   
   document.getElementById("txtkerja15").value="";   

   document.getElementById("radiokreativ4").checked=false;   
   document.getElementById("radiokreativ5").checked=false;   
   document.getElementById("radiokreativ6").checked=false;   
   document.getElementById("radiokreativ7").checked=false;   
   document.getElementById("radiokreativ8").checked=false;   
   document.getElementById("radiokreativ9").checked=false;   
   document.getElementById("radiokreativ10").checked=false;   
   document.getElementById("radiokreativ11").checked=false;   
   document.getElementById("radiokreativ12").checked=false;   
   document.getElementById("radiokreativ13").checked=false;   
   document.getElementById("radiokreativ14").checked=false;   
   document.getElementById("radiokreativ15").checked=false;   

   document.getElementById("txtkreativ4").value="";   
   document.getElementById("txtkreativ5").value="";   
   document.getElementById("txtkreativ6").value="";   
   document.getElementById("txtkreativ7").value="";   
   document.getElementById("txtkreativ8").value="";   
   document.getElementById("txtkreativ9").value="";   
   document.getElementById("txtkreativ10").value="";   
   document.getElementById("txtkreativ11").value="";   
   document.getElementById("txtkreativ12").value="";   
   document.getElementById("txtkreativ13").value="";   
   document.getElementById("txtkreativ14").value="";   
   document.getElementById("txtkreativ15").value="";   

   document.getElementById("radiosemangat4").checked=false;   
   document.getElementById("radiosemangat5").checked=false;   
   document.getElementById("radiosemangat6").checked=false;   
   document.getElementById("radiosemangat7").checked=false;   
   document.getElementById("radiosemangat8").checked=false;   
   document.getElementById("radiosemangat9").checked=false;   
   document.getElementById("radiosemangat10").checked=false;   
   document.getElementById("radiosemangat11").checked=false;   
   document.getElementById("radiosemangat12").checked=false;   
   document.getElementById("radiosemangat13").checked=false;   
   document.getElementById("radiosemangat14").checked=false;   
   document.getElementById("radiosemangat15").checked=false;   

   document.getElementById("txtsemangat4").value="";   
   document.getElementById("txtsemangat5").value="";   
   document.getElementById("txtsemangat6").value="";   
   document.getElementById("txtsemangat7").value="";   
   document.getElementById("txtsemangat8").value="";   
   document.getElementById("txtsemangat9").value="";   
   document.getElementById("txtsemangat10").value="";   
   document.getElementById("txtsemangat11").value="";   
   document.getElementById("txtsemangat12").value="";   
   document.getElementById("txtsemangat13").value="";   
   document.getElementById("txtsemangat14").value="";   
   document.getElementById("txtsemangat15").value="";   

   document.getElementById("radiosemp4").checked=false;   
   document.getElementById("radiosemp5").checked=false;   
   document.getElementById("radiosemp6").checked=false;   
   document.getElementById("radiosemp7").checked=false;   
   document.getElementById("radiosemp8").checked=false;   
   document.getElementById("radiosemp9").checked=false;   
   document.getElementById("radiosemp10").checked=false;   
   document.getElementById("radiosemp11").checked=false;   
   document.getElementById("radiosemp12").checked=false;   
   document.getElementById("radiosemp13").checked=false;   
   document.getElementById("radiosemp14").checked=false;   
   document.getElementById("radiosemp15").checked=false;   

   document.getElementById("txtsemp4").value="";   
   document.getElementById("txtsemp5").value="";   
   document.getElementById("txtsemp6").value="";   
   document.getElementById("txtsemp7").value="";   
   document.getElementById("txtsemp8").value="";   
   document.getElementById("txtsemp9").value="";   
   document.getElementById("txtsemp10").value="";   
   document.getElementById("txtsemp11").value="";   
   document.getElementById("txtsemp12").value="";   
   document.getElementById("txtsemp13").value="";   
   document.getElementById("txtsemp14").value="";   
   document.getElementById("txtsemp15").value="";   

   document.getElementById("radiodisiplin4").checked=false;   
   document.getElementById("radiodisiplin5").checked=false;   
   document.getElementById("radiodisiplin6").checked=false;   
   document.getElementById("radiodisiplin7").checked=false;   
   document.getElementById("radiodisiplin8").checked=false;   
   document.getElementById("radiodisiplin9").checked=false;   
   document.getElementById("radiodisiplin10").checked=false;   
   document.getElementById("radiodisiplin11").checked=false;   
   document.getElementById("radiodisiplin12").checked=false;   
   document.getElementById("radiodisiplin13").checked=false;   
   document.getElementById("radiodisiplin14").checked=false;   
   document.getElementById("radiodisiplin15").checked=false;   


   document.getElementById("txtdisiplin4").value="";   
   document.getElementById("txtdisiplin5").value="";   
   document.getElementById("txtdisiplin6").value="";   
   document.getElementById("txtdisiplin7").value="";   
   document.getElementById("txtdisiplin8").value="";   
   document.getElementById("txtdisiplin9").value="";   
   document.getElementById("txtdisiplin10").value="";   
   document.getElementById("txtdisiplin11").value="";   
   document.getElementById("txtdisiplin12").value="";   
   document.getElementById("txtdisiplin13").value="";   
   document.getElementById("txtdisiplin14").value="";   
   document.getElementById("txtdisiplin15").value="";   

   document.getElementById("radiopdca4").checked=false;   
   document.getElementById("radiopdca5").checked=false;   
   document.getElementById("radiopdca6").checked=false;   
   document.getElementById("radiopdca7").checked=false;   
   document.getElementById("radiopdca8").checked=false;   
   document.getElementById("radiopdca9").checked=false;   
   document.getElementById("radiopdca10").checked=false;   
   document.getElementById("radiopdca11").checked=false;   
   document.getElementById("radiopdca12").checked=false;   
   document.getElementById("radiopdca13").checked=false;   
   document.getElementById("radiopdca14").checked=false;   
   document.getElementById("radiopdca15").checked=false;   

   document.getElementById("txtpdca4").value="";   
   document.getElementById("txtpdca5").value="";   
   document.getElementById("txtpdca6").value="";   
   document.getElementById("txtpdca7").value="";   
   document.getElementById("txtpdca8").value="";   
   document.getElementById("txtpdca9").value="";   
   document.getElementById("txtpdca10").value="";   
   document.getElementById("txtpdca11").value="";   
   document.getElementById("txtpdca12").value="";   
   document.getElementById("txtpdca13").value="";   
   document.getElementById("txtpdca14").value="";   
   document.getElementById("txtpdca15").value="";   

   document.getElementById("radiomanage4").checked=false;   
   document.getElementById("radiomanage5").checked=false;   
   document.getElementById("radiomanage6").checked=false;   
   document.getElementById("radiomanage7").checked=false;   
   document.getElementById("radiomanage8").checked=false;   
   document.getElementById("radiomanage9").checked=false;   
   document.getElementById("radiomanage10").checked=false;   
   document.getElementById("radiomanage11").checked=false;   
   document.getElementById("radiomanage12").checked=false;   
   document.getElementById("radiomanage13").checked=false;   
   document.getElementById("radiomanage14").checked=false;   
   document.getElementById("radiomanage15").checked=false;   

   document.getElementById("txtmanage4").value="";   
   document.getElementById("txtmanage5").value="";   
   document.getElementById("txtmanage6").value="";   
   document.getElementById("txtmanage7").value="";   
   document.getElementById("txtmanage8").value="";   
   document.getElementById("txtmanage9").value="";   
   document.getElementById("txtmanage10").value="";   
   document.getElementById("txtmanage11").value="";   
   document.getElementById("txtmanage12").value="";   
   document.getElementById("txtmanage13").value="";   
   document.getElementById("txtmanage14").value="";   
   document.getElementById("txtmanage15").value="";   

   document.getElementById("kekuatan").value="";
   document.getElementById("kelemahan").value="";
   document.getElementById("tindaklanjut").value="";
   document.getElementById("jadwal").value=""; 

   document.getElementById("nilsubmain").value="0";   
   document.getElementById("nilsubimprov").value="0";   
   document.getElementById("nilbobotkra").value="0";   
   document.getElementById("totalnilkra").value="0";   
   document.getElementById("subint").value="0";   
   document.getElementById("subtrans").value="0";   
   document.getElementById("subkerja").value="0";   
   document.getElementById("subkreativ").value="0";   
   document.getElementById("subsemangat").value="0";   
   document.getElementById("subsempurna").value="0";   
   document.getElementById("nilbobotinti").value="0";   
   document.getElementById("nilbobotdisiplin").value="0";   
   document.getElementById("nilbobotpdca").value="0";   
   document.getElementById("nilbobotmanagement").value="0";   
   document.getElementById("nilbobotkba").value="0";   
   document.getElementById("totnilkba").value="0";   
   document.getElementById("totkrakba").value="0";   
   document.getElementById("hasil").value="";   

}

function tampungjab(){ 
     xajax_tampungjab(document.getElementById("jabatan").value);
}

function caripegawai(){
  xajax_caripegawai(document.getElementById("nama").value);
}



</script>


<body bgcolor="#666666"  >
		 
                 <table width="100%" align="center">
                  


                     <tr>
					   <td class="cms_head" align="center" colspan="2" bgcolor="#DB7093">&nbsp;&nbsp;.: PENILAIAN KRA - KBA :.</td>
					 </tr>

                     <tr><td></td></tr>
                     <tr><td></td></tr>
         	         <tr><td></td></tr>
                     <tr><td></td></tr>
                     <tr><td></td></tr>
         	         <tr><td></td></tr>


        <?php
        	// if ($_SESSION['kopeg']!='2016068'){
        ?>

          <tr>
		   <td bgcolor="#0099FF"><font color="#FFFFFF"><b><label for="dept">Nama</label></td>
	        <td>
       	     <select id="nama" onchange="caripegawai()"> 
       	     <!-- <select id="dinilai" onchange="carinilai()";>  -->       	     	
		   <?php
    	   echo "<option value="."0".">"."-"."</option>";                                                                                			
	        foreach($pegawai as $row)
	        {	
			   echo "<option value=".$row->nik.">".$row->nama."</option>";
			}
        	?>
			</td>
	       </select>
		 </tr> 
		 <?php
		// }else{
		 ?>

	  <tr>
			 <td bgcolor="#0099FF"><font color="#FFFFFF"><b><label for="tahun" >Periode</label></td>
       		 <td> <span class="css3-selectbox">
			 	  <select id="periode" onchange="carites()"> 
                   <option value='-'>-</option>
	                  <option value='1'>Semester I</option>
	                  <option value='2'>Semester II</option>
           	        </select></span>
				</td>	
	    </tr>

	  <tr>
			 <td bgcolor="#0099FF"><font color="#FFFFFF"><b><label for="tahun" >Tahun</label></td>
       		 <td> <span class="css3-selectbox">
			 	  <select id="tahun" > 
	                  <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
	                      if(date('Y') == $i){ 
	                          echo "<option value='".$i."' selected>".$i."</option>";
	                      } else {
	                          echo "<option value='".$i."'>".$i."</option>";
	                      }                              
	                  } ?>

<!-- 			        <option value='-'>-</option>				  
			        <option value='2015'>2015</option>					
			        <option value='2016'>2016</option>
			        <option value='2017'>2017</option>
			        <option value='2018'>2018</option>
			        <option value='2019'>2019</option>
			        <option value='2020'>2020</option>
			        <option value='2021'>2021</option>
			        <option value='2022'>2022</option>
			        <option value='2023'>2023</option>
			        <option value='2024'>2024</option>
			        <option value='2025'>2025</option>
			        <option value='2026'>2026</option>
			        <option value='2027'>2027</option>
			        <option value='2028'>2028</option>
			        <option value='2029'>2029</option>
			        <option value='2030'>2030</option>					 -->
           	        </select></span>
		           <input type="button"  id="verifyBtn" value="Cari" onclick="carikra();" tabindex="8" />
		           <input type="button"  id="verifyBtn" value="Simpan" onclick="carikra();" tabindex="8" />
		           <!-- <input type="button"  id="verifyBtn" value="Cari KRA-KBA" onclick="carikrakba();" tabindex="8" /> -->
				</td>	

	    </tr>

<!-- 	    <tr>
			 <td bgcolor="#0099FF"> <label style="color:#FFFFFF" for="tahun" >Jabatan</label></td>
	   		 <td> <span class="css3-selectbox">
			 	  <select id="jabatan" onchange="tampungjab();"> 
	               <option value='-'>-</option>
	               <option value='Petugas'>Pelaksana</option>
			        <option value='Karu'>Kepala Regu</option>
			        <option value='Kasi'>Kepala Seksi</option>
			        <option value='Kabag'>Kepala Bagian</option>
			        <option value='Kadiv'>Kepala Divisi</option>					
	       	        </select></span>
				</td>	
	    </tr> -->

<!-- 		<tr>
			<td bgcolor="0099FF"><font color="#FFFFFF"><b>Nama</label></td>
			<td>
				<div class="suggest"> 
	        		<input type="text" size="50" value="" name="nama" id="nama" autocomplete="off"/>
	        		<input type="text" size="10" value="" name="iddinilai" id="iddinilai" autocomplete="off" readonly />						
	        		<input type="button"  id="verifyBtn" value="OK" onclick="carinilai1();" tabindex="8" />
	        		<font color="#ff0000"><b>*** Klik OK untuk setting KRA & KBA</font>
				</div>
			</td> 
		</tr>  -->
		<?php
		// }
		?>					 	 	
						  
	                 <tr><td></td></tr>
		             <tr><td></td></tr>
         	         <tr><td></td></tr>
                     <tr><td></td></tr>
                     <tr><td></td></tr>
         	         <tr><td></td></tr>

	  		    <tr>
                 <form method="post" action="#">
                 <hr color="#ebeadb">   
			      <table width="100%" align="center">
			  
				  <tr>
				  </tr>
				  <tr>
				  </tr>
				  <tr>
				  </tr>
				  <tr>
				  </tr>
                 
				  <tr>
			         <td class="cms_head" align="center" colspan="2" bgcolor="#0066CC">&nbsp;&nbsp;DATA PENILAIAN KRA - KBA</td>
				  </tr>

                 </table>     

<table border="1" width="100%" align="center">
	<tr>
		<td bgcolor="#9900CC" colspan="20"><font color="#FFFFFF"><b>PENILAIAN UNTUK KEY RESULT AREA</b></font></td>
	</tr>
	<tr>
		<td align="center" style="width:10%" rowspan="3"><b>KRA</b></td>
		<td align="center" style="width:2%" rowspan="3"><input id="kra" name="kra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>
		<td align="center" style="width:10%" rowspan="3">Penjelasan 4 pada nilai KRA</td>				
		<td bgcolor="#CC6600" align="center" colspan="12"><font color="#FFFFFF"><b>SKALA KONVERSI NILAI KRA</b></td>
		<td align="center" style="width:10%" rowspan="3">Penjelasan 15 pada nilai KRA</td>		
		<td align="center" style="width:10%" rowspan="3">Bobot Sub Aspek</td>				
		<td align="center" style="width:2%" rowspan="3"></td>						
		<td align="center" style="width:10%" rowspan="3">Nilai Bobot Sub Aspek</td>						
		<td align="center" style="width:10%" rowspan="3">Total Nilai Bobot</td>								
		<td align="center" style="width:10%"><b>KEKUATAN</b></td>										
	</tr>
	<tr>
		<td align="center" style="width:5%" colspan="3"><b>Butuh Pengembangan</b></td>
		<td align="center" style="width:5%" colspan="3"><b>Kompeten</b></td>
		<td align="center" style="width:5%" colspan="3"><b>Sangat Efektif</b></td>
		<td align="center" style="width:5%" colspan="3"><b>Sempurna</b></td>						
		<td align="center" style="width:10%" rowspan="5"><textarea id="kekuatan" name="kekuatan" cols="12" rows="5"></textarea></td>												
	</tr>
	<tr>
		<td align="center" style="width:2%">4</td>
		<td align="center" style="width:2%">5</td>		
		<td align="center" style="width:2%">6</td>		
		<td align="center" style="width:2%">7</td>
		<td align="center" style="width:2%">8</td>		
		<td align="center" style="width:2%">9</td>		
		<td align="center" style="width:2%">10</td>
		<td align="center" style="width:2%">11</td>		
		<td align="center" style="width:2%">12</td>		
		<td align="center" style="width:2%">13</td>
		<td align="center" style="width:2%">14</td>		
		<td align="center" style="width:2%">15</td>						
	</tr>	
	<tr>
		<td><b>1. MAINTENING JOB</b></td>
		<td></td>
		<td align="center" style="width:10%" rowspan="2"><5% di rata-rata pencapaian</td>		
		<td style="width:6%"><input type="radio" id="radiomain4" name="maintening" value="4" onclick="cekradiomain4(this.value)"/><input id="txtmain4" name="txtmain4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiomain5" name="maintening" value="5" onclick="cekradiomain5(this.value)"/><input id="txtmain5" name="txtmain5" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain6" name="maintening" value="6" onclick="cekradiomain6(this.value)"/><input id="txtmain6" name="txtmain6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain7" name="maintening" value="7" onclick="cekradiomain7(this.value)"/><input id="txtmain7" name="txtmain7" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiomain8" name="maintening" value="8" onclick="cekradiomain8(this.value)"/><input id="txtmain8" name="txtmain8" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain9" name="maintening" value="9" onclick="cekradiomain9(this.value)"/><input id="txtmain9" name="txtmain9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain10" name="maintening" value="10" onclick="cekradiomain10(this.value)"/><input id="txtmain10" name="txtmain10" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiomain11" name="maintening" value="11" onclick="cekradiomain11(this.value)"/><input id="txtmain11" name="txtmain11" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain12" name="maintening" value="12" onclick="cekradiomain12(this.value)"/><input id="txtmain12" name="txtmain12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain13" name="maintening" value="13" onclick="cekradiomain13(this.value)"/><input id="txtmain13" name="txtmain13" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiomain14" name="maintening" value="14" onclick="cekradiomain14(this.value)"/><input id="txtmain14" name="txtmain14" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomain15" name="maintening" value="15" onclick="cekradiomain15(this.value)"/><input id="txtmain15" name="txtmain15" size="1" type="text" value="" disabled="T"/></td>						
		<td align="center" style="width:10%" rowspan="2">>=150% dari rata-rata</td>					
		<td align="center" style="width:2%"><input id="bobsubmain" name="bobsubmain" size="1" type="text" value="100" disabled="T" style="color:#000000"/></td>	
		<td align="center" style="width:2%"></td>									
		<td align="center" style="width:2%"><input id="nilsubmain" name="nilsubmain" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>								
		<td align="center" style="width:2%" rowspan="2"><input id="totalnilkra" name="totalnilkra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>							
	</tr>
	<tr>
		<td><b>2. IMPROVEMENT JOB</b></td>
		<td></td>
		<td style="width:6%"><input type="radio" id="radioimprov4" name="improvment" value="4" onclick="cekradioimprov4(this.value)" disabled="T"/><input id="txtimprov4" name="txtimprov4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radioimprov5" name="improvment" value="5" onclick="cekradioimprov5(this.value)" disabled="T"/><input id="txtimprov5" name="txtimprov5" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov6" name="improvment" value="6" onclick="cekradioimprov6(this.value)" disabled="T"/><input id="txtimprov6" name="txtimprov6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov7" name="improvment" value="7" onclick="cekradioimprov7(this.value)" disabled="T"/><input id="txtimprov7" name="txtimprov7" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radioimprov8" name="improvment" value="8" onclick="cekradioimprov8(this.value)" disabled="T"/><input id="txtimprov8" name="txtimprov8" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov9" name="improvment" value="9" onclick="cekradioimprov9(this.value)" disabled="T"/><input id="txtimprov9" name="txtimprov9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov10" name="improvment" value="10" onclick="cekradioimprov10(this.value)" disabled="T"/><input id="txtimprov10" name="txtimprov10" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radioimprov11" name="improvment" value="11" onclick="cekradioimprov11(this.value)" disabled="T"/><input id="txtimprov11" name="txtimprov11" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov12" name="improvment" value="12" onclick="cekradioimprov12(this.value)" disabled="T"/><input id="txtimprov12" name="txtimprov12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov13" name="improvment" value="13" onclick="cekradioimprov13(this.value)" disabled="T"/><input id="txtimprov13" name="txtimprov13" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radioimprov14" name="improvment" value="14" onclick="cekradioimprov14(this.value)" disabled="T"/><input id="txtimprov14" name="txtimprov14" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioimprov15" name="improvment" value="15" onclick="cekradioimprov15(this.value)" disabled="T"/><input id="txtimprov15" name="txtimprov15" size="1" type="text" value="" disabled="T"/></td>						
		<td align="center" style="width:2%"><input id="bobsubimprov" name="bobsubimprov" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>		
		<td align="center" style="width:2%"></td>
		<td align="center" style="width:2%"><input id="nilsubimprov" name="nilsubimprov" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>													
	</tr>
	<tr>
		<td colspan="17"></td>
		<td align="center" style="width:2%"></td>											
		<td align="center" style="width:2%"><input id="nilbobotkra" name="nilbobotkra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>	
		<td style="width:2%"></td>
	</tr>
	<tr>
		<td bgcolor="#9900CC" colspan="20"><font color="#FFFFFF"><b>PENILAIAN UNTUK KEY BEHAVIOR AREA</b></font></td>
		<td align="center" style="width:10%"><b>KELEMAHAN</b></td>																		
	</tr>	
	<tr>
		<td align="center" style="width:10%" rowspan="3"><b>KBA</b></td>
		<td align="center" style="width:2%" rowspan="3"><font color="#FF0000"><input id="kba" name="kba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></font></td>
		<td align="center" style="width:10%" rowspan="3">Penjelasan 4 pada nilai KBA</td>				
		<td bgcolor="#CC6600" align="center" colspan="12"><font color="#FFFFFF"><b>SKALA KONVERSI NILAI KRA</b></td>
		<td align="center" style="width:10%" rowspan="3">Penjelasan 15 pada nilai KBA</td>		
		<td align="center" style="width:10%" rowspan="3">Bobot Sub Aspek</td>				
		<td style="width:2%" rowspan="3"></td>		
		<td align="center" style="width:10%" rowspan="3">Nilai Bobot Sub Aspek</td>						
		<td align="center" style="width:10%" rowspan="3">Total Nilai Bobot</td>				
		<td align="center" style="width:10%" rowspan="5"><textarea id="kelemahan" name="kelemahan" cols="12" rows="5"></textarea></td>								
	</tr>
	<tr>
		<td align="center" style="width:5%" colspan="3"><b>Butuh Pengembangan</b></td>
		<td align="center" style="width:5%" colspan="3"><b>Kompeten</b></td>
		<td align="center" style="width:5%" colspan="3"><b>Sangat Efektif</b></td>
		<td align="center" style="width:5%" colspan="3"><b>Sempurna</b></td>						
	</tr>
	<tr>
		<td align="center" style="width:2%">4</td>
		<td align="center" style="width:2%">5</td>		
		<td align="center" style="width:2%">6</td>		
		<td align="center" style="width:2%">7</td>
		<td align="center" style="width:2%">8</td>		
		<td align="center" style="width:2%">9</td>		
		<td align="center" style="width:2%">10</td>
		<td align="center" style="width:2%">11</td>		
		<td align="center" style="width:2%">12</td>		
		<td align="center" style="width:2%">13</td>
		<td align="center" style="width:2%">14</td>		
		<td align="center" style="width:2%">15</td>				
	</tr>	
	<tr>
		<td><b>1. NILAI INTI</b></td>
		<td></td>
		<td style="width:2%"></td>	
		<td style="width:2%"></td>	
		<td style="width:2%"></td>		
		<td style="width:2%"></td>		
		<td style="width:2%"></td>
		<td style="width:2%"></td>		
		<td style="width:2%"></td>		
		<td style="width:2%"></td>
		<td style="width:2%"></td>		
		<td style="width:2%"></td>		
		<td style="width:2%"></td>
		<td style="width:2%"></td>		
		<td style="width:2%"></td>						
		<td style="width:2%"></td>						
		<td align="center" style="width:2%"><input id="bobotinti" name="bobotinti" size="1" type="text" value="25" disabled="T" style="color:#000000"/></td>		
		<td align="center" style="width:2%"></td>						
		<td align="center" style="width:2%" rowspan="7"><input id="nilbobotinti" name="nilbobotinti" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>				
		<td align="center" style="width:2%" rowspan="8"><input id="totnilkba" name="totnilkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>						
	</tr>	
	<tr>
		<td><b>--INTEGRITAS</b></td>
<!--		<td rowspan="6"></td>-->
		<td><input type="button" id="ketintegritas" value="?" tabindex="8" /></td>		
		<td rowspan="6"></td>				
		<td style="width:6%"><input type="radio" id="radioint4" name="integritas" value="4" onclick="cekradioint4(this.value)"/><input id="txtint4" name="txtint4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radioint5" name="integritas" value="5" onclick="cekradioint5(this.value)"/><input id="txtint5" name="txtint5" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint6" name="integritas" value="6" onclick="cekradioint6(this.value)"/><input id="txtint6" name="txtint6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint7" name="integritas" value="7" onclick="cekradioint7(this.value)"/><input id="txtint7" name="txtint7" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radioint8" name="integritas" value="8" onclick="cekradioint8(this.value)"/><input id="txtint8" name="txtint8" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint9" name="integritas" value="9" onclick="cekradioint9(this.value)"/><input id="txtint9" name="txtint9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint10" name="integritas" value="10" onclick="cekradioint10(this.value)"/><input id="txtint10" name="txtint10" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radioint11" name="integritas" value="11" onclick="cekradioint11(this.value)"/><input id="txtint11" name="txtint11" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint12" name="integritas" value="12" onclick="cekradioint12(this.value)"/><input id="txtint12" name="txtint12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint13" name="integritas" value="13" onclick="cekradioint13(this.value)"/><input id="txtint13" name="txtint13" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radioint14" name="integritas" value="14" onclick="cekradioint14(this.value)"/><input id="txtint14" name="txtint14" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radioint15" name="integritas" value="15" onclick="cekradioint15(this.value)"/><input id="txtint15" name="txtint15" size="1" type="text" value="" disabled="T"/></td>								
		<td rowspan="6"></td>		
		<td rowspan="6"></td>				
		<td align="center" style="width:2%"><input id="subint" name="subint" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>										
	</tr>	
	<tr>
		<td><b>--TRANSPARANSI</b></td>
		<td><input type="button" id="kettransparan" value="?" tabindex="8" /></td>		
		<td style="width:6%"><input type="radio" id="radiotrans4" name="transparansi" value="4" onclick="cekradiotrans4(this.value)"/><input id="txttrans4" name="txttrans4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiotrans5" name="transparansi" value="5" onclick="cekradiotrans5(this.value)"/><input id="txttrans5" name="txttrans5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiotrans6" name="transparansi" value="6" onclick="cekradiotrans6(this.value)"/><input id="txttrans6" name="txttrans6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiotrans7" name="transparansi" value="7" onclick="cekradiotrans7(this.value)"/><input id="txttrans7" name="txttrans7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiotrans8" name="transparansi" value="8" onclick="cekradiotrans8(this.value)"/><input id="txttrans8" name="txttrans8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiotrans9" name="transparansi" value="9" onclick="cekradiotrans9(this.value)"/><input id="txttrans9" name="txttrans9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiotrans10" name="transparansi" value="10" onclick="cekradiotrans10(this.value)"/><input id="txttrans10" name="txttrans10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiotrans11" name="transparansi" value="11" onclick="cekradiotrans11(this.value)"/><input id="txttrans11" name="txttrans11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiotrans12" name="transparansi" value="12" onclick="cekradiotrans12(this.value)"/><input id="txttrans12" name="txttrans12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiotrans13" name="transparansi" value="13" onclick="cekradiotrans13(this.value)"/><input id="txttrans13" name="txttrans13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiotrans14" name="transparansi" value="14" onclick="cekradiotrans14(this.value)"/><input id="txttrans14" name="txttrans14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiotrans15" name="transparansi" value="15" onclick="cekradiotrans15(this.value)"/><input id="txttrans15" name="txttrans15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%"><input id="subtrans" name="subtrans" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>										
		<td align="center" style="width:10%"><b>TINDAK LANJUT</b></td>																	
	</tr>	
	<tr>
		<td><b>--KERJASAMA TEAM</b></td>
		<td><input type="button" id="ketkerjasama" value="?" tabindex="8" /></td>		
		<td style="width:6%"><input type="radio" id="radiokerja4" name="kerjasama" value="4" onclick="cekradiokerja4(this.value)"/><input id="txtkerja4" name="txtkerja4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiokerja5" name="kerjasama" value="5" onclick="cekradiokerja5(this.value)"/><input id="txtkerja5" name="txtkerja5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiokerja6" name="kerjasama" value="6" onclick="cekradiokerja6(this.value)"/><input id="txtkerja6" name="txtkerja6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokerja7" name="kerjasama" value="7" onclick="cekradiokerja7(this.value)"/><input id="txtkerja7" name="txtkerja7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokerja8" name="kerjasama" value="8" onclick="cekradiokerja8(this.value)"/><input id="txtkerja8" name="txtkerja8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiokerja9" name="kerjasama" value="9" onclick="cekradiokerja9(this.value)"/><input id="txtkerja9" name="txtkerja9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokerja10" name="kerjasama" value="10" onclick="cekradiokerja10(this.value)"/><input id="txtkerja10" name="txtkerja10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokerja11" name="kerjasama" value="11" onclick="cekradiokerja11(this.value)"/><input id="txtkerja11" name="txtkerja11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiokerja12" name="kerjasama" value="12" onclick="cekradiokerja12(this.value)"/><input id="txtkerja12" name="txtkerja12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokerja13" name="kerjasama" value="13" onclick="cekradiokerja13(this.value)"/><input id="txtkerja13" name="txtkerja13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokerja14" name="kerjasama" value="14" onclick="cekradiokerja14(this.value)"/><input id="txtkerja14" name="txtkerja14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiokerja15" name="kerjasama" value="15" onclick="cekradiokerja15(this.value)"/><input id="txtkerja15" name="txtkerja15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%"><input id="subkerja" name="subkerja" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>												
		<td align="center" style="width:10%" rowspan="5"><textarea id="tindaklanjut" name="tindaklanjut" cols="12" rows="7"></textarea></td>										
	</tr>	
	<tr>
		<td><b>--KREATIVITAS</b></td>
		<td><input type="button" id="ketkreatif" value="?" tabindex="8" /></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ4" name="kreativitas" value="4" onclick="cekradiokreativ4(this.value)"/><input id="txtkreativ4" name="txtkreativ4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiokreativ5" name="kreativitas" value="5" onclick="cekradiokreativ5(this.value)"/><input id="txtkreativ5" name="txtkreativ5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiokreativ6" name="kreativitas" value="6" onclick="cekradiokreativ6(this.value)"/><input id="txtkreativ6" name="txtkreativ6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ7" name="kreativitas" value="7" onclick="cekradiokreativ7(this.value)"/><input id="txtkreativ7" name="txtkreativ7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ8" name="kreativitas" value="8" onclick="cekradiokreativ8(this.value)"/><input id="txtkreativ8" name="txtkreativ8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiokreativ9" name="kreativitas" value="9" onclick="cekradiokreativ9(this.value)"/><input id="txtkreativ9" name="txtkreativ9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ10" name="kreativitas" value="10" onclick="cekradiokreativ10(this.value)"/><input id="txtkreativ10" name="txtkreativ10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ11" name="kreativitas" value="11" onclick="cekradiokreativ11(this.value)"/><input id="txtkreativ11" name="txtkreativ11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiokreativ12" name="kreativitas" value="12" onclick="cekradiokreativ12(this.value)"/><input id="txtkreativ12" name="txtkreativ12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ13" name="kreativitas" value="13" onclick="cekradiokreativ13(this.value)"/><input id="txtkreativ13" name="txtkreativ13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiokreativ14" name="kreativitas" value="14" onclick="cekradiokreativ14(this.value)"/><input id="txtkreativ14" name="txtkreativ14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiokreativ15" name="kreativitas" value="15" onclick="cekradiokreativ15(this.value)"/><input id="txtkreativ15" name="txtkreativ15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%"><input id="subkreativ" name="subkreativ" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>														
	</tr>	
	<tr>
		<td><b>--SEMANGAT UTK MENANG</b></td>
		<td><input type="button" id="ketsemangat" value="?" tabindex="8" /></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat4" name="semangat" value="4" onclick="cekradiosemangat4(this.value)"/><input id="txtsemangat4" name="txtsemangat4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiosemangat5" name="semangat" value="5" onclick="cekradiosemangat5(this.value)"/><input id="txtsemangat5" name="txtsemangat5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiosemangat6" name="semangat" value="6" onclick="cekradiosemangat6(this.value)"/><input id="txtsemangat6" name="txtsemangat6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat7" name="semangat" value="7" onclick="cekradiosemangat7(this.value)"/><input id="txtsemangat7" name="txtsemangat7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat8" name="semangat" value="8" onclick="cekradiosemangat8(this.value)"/><input id="txtsemangat8" name="txtsemangat8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiosemangat9" name="semangat" value="9" onclick="cekradiosemangat9(this.value)"/><input id="txtsemangat9" name="txtsemangat9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat10" name="semangat" value="10" onclick="cekradiosemangat10(this.value)"/><input id="txtsemangat10" name="txtsemangat10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat11" name="semangat" value="11" onclick="cekradiosemangat11(this.value)"/><input id="txtsemangat11" name="txtsemangat11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiosemangat12" name="semangat" value="12" onclick="cekradiosemangat12(this.value)"/><input id="txtsemangat12" name="txtsemangat12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat13" name="semangat" value="13" onclick="cekradiosemangat13(this.value)"/><input id="txtsemangat13" name="txtsemangat13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemangat14" name="semangat" value="14" onclick="cekradiosemangat14(this.value)"/><input id="txtsemangat14" name="txtsemangat14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiosemangat15" name="semangat" value="15" onclick="cekradiosemangat15(this.value)"/><input id="txtsemangat15" name="txtsemangat15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%"><input id="subsemangat" name="subsemangat" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>														
	</tr>	
	<tr>
		<td><b>--KESEMPURNAAN</b></td>
		<td><input type="button" id="ketsempurna" value="?" tabindex="8" /></td>		
		<td style="width:6%"><input type="radio" id="radiosemp4" name="sempurna" value="4" onclick="cekradiosemp4(this.value)"/><input id="txtsemp4" name="txtsemp4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiosemp5" name="sempurna" value="5" onclick="cekradiosemp5(this.value)"/><input id="txtsemp5" name="txtsemp5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiosemp6" name="sempurna" value="6" onclick="cekradiosemp6(this.value)"/><input id="txtsemp6" name="txtsemp6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemp7" name="sempurna" value="7" onclick="cekradiosemp7(this.value)"/><input id="txtsemp7" name="txtsemp7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemp8" name="sempurna" value="8" onclick="cekradiosemp8(this.value)"/><input id="txtsemp8" name="txtsemp8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiosemp9" name="sempurna" value="9" onclick="cekradiosemp9(this.value)"/><input id="txtsemp9" name="txtsemp9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemp10" name="sempurna" value="10" onclick="cekradiosemp10(this.value)"/><input id="txtsemp10" name="txtsemp10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemp11" name="sempurna" value="11" onclick="cekradiosemp11(this.value)"/><input id="txtsemp11" name="txtsemp11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiosemp12" name="sempurna" value="12" onclick="cekradiosemp12(this.value)"/><input id="txtsemp12" name="txtsemp12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemp13" name="sempurna" value="13" onclick="cekradiosemp13(this.value)"/><input id="txtsemp13" name="txtsemp13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiosemp14" name="sempurna" value="14" onclick="cekradiosemp14(this.value)"/><input id="txtsemp14" name="txtsemp14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiosemp15" name="sempurna" value="15" onclick="cekradiosemp15(this.value)"/><input id="txtsemp15" name="txtsemp15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%"><input id="subsempurna" name="subsempurna" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>														
	</tr>	
	<tr>
		<td><b>2. DISIPLIN KEHADIRAN</b></td>
		<td></td>
		<td style="width:2%">< 20% Kehadiran</td>	
		<td style="width:6%"><input type="radio" id="radiodisiplin4" name="disiplin" value="4" onclick="cekradiodisiplin4(this.value)"/><input id="txtdisiplin4" name="txtdisiplin4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiodisiplin5" name="disiplin" value="5" onclick="cekradiodisiplin5(this.value)"/><input id="txtdisiplin5" name="txtdisiplin5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiodisiplin6" name="disiplin" value="6" onclick="cekradiodisiplin6(this.value)"/><input id="txtdisiplin6" name="txtdisiplin6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiodisiplin7" name="disiplin" value="7" onclick="cekradiodisiplin7(this.value)"/><input id="txtdisiplin7" name="txtdisiplin7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiodisiplin8" name="disiplin" value="8" onclick="cekradiodisiplin8(this.value)"/><input id="txtdisiplin8" name="txtdisiplin8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiodisiplin9" name="disiplin" value="9" onclick="cekradiodisiplin9(this.value)"/><input id="txtdisiplin9" name="txtdisiplin9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiodisiplin10" name="disiplin" value="10" onclick="cekradiodisiplin10(this.value)"/><input id="txtdisiplin10" name="txtdisiplin10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiodisiplin11" name="disiplin" value="11" onclick="cekradiodisiplin11(this.value)"/><input id="txtdisiplin11" name="txtdisiplin11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiodisiplin12" name="disiplin" value="12" onclick="cekradiodisiplin12(this.value)"/><input id="txtdisiplin12" name="txtdisiplin12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiodisiplin13" name="disiplin" value="13" onclick="cekradiodisiplin13(this.value)"/><input id="txtdisiplin13" name="txtdisiplin13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiodisiplin14" name="disiplin" value="14" onclick="cekradiodisiplin14(this.value)"/><input id="txtdisiplin14" name="txtdisiplin14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiodisiplin15" name="disiplin" value="15" onclick="cekradiodisiplin15(this.value)"/><input id="txtdisiplin15" name="txtdisiplin15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%">100% hadir tanpa sakit dan ijin</td>		
		<td align="center" style="width:2%"><input id="bobotdisiplin" name="bobotdisiplin" size="1" type="text" value="55" disabled="T" style="color:#000000"/></td>
		<td align="center" style="width:2%"></td>														
		<td align="center" style="width:2%"><input id="nilbobotdisiplin" name="nilbobotdisiplin" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>		
	</tr>	
	<tr>
		<td><b>3. PDCA</b></td>
		<td></td>
		<td style="width:2%">Hanya membuat perencanaan dan review</td>	
		<td style="width:6%"><input type="radio" id="radiopdca4" name="pdca" value="4" onclick="cekradiopdca4(this.value)"/><input id="txtpdca4" name="txtpdca4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiopdca5" name="pdca" value="5" onclick="cekradiopdca5(this.value)"/><input id="txtpdca5" name="txtpdca5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiopdca6" name="pdca" value="6" onclick="cekradiopdca6(this.value)"/><input id="txtpdca6" name="txtpdca6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiopdca7" name="pdca" value="7" onclick="cekradiopdca7(this.value)"/><input id="txtpdca7" name="txtpdca7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiopdca8" name="pdca" value="8" onclick="cekradiopdca8(this.value)"/><input id="txtpdca8" name="txtpdca8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiopdca9" name="pdca" value="9" onclick="cekradiopdca9(this.value)"/><input id="txtpdca9" name="txtpdca9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiopdca10" name="pdca" value="10" onclick="cekradiopdca10(this.value)"/><input id="txtpdca10" name="txtpdca10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiopdca11" name="pdca" value="11" onclick="cekradiopdca11(this.value)"/><input id="txtpdca11" name="txtpdca11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiopdca12" name="pdca" value="12" onclick="cekradiopdca12(this.value)"/><input id="txtpdca12" name="txtpdca12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiopdca13" name="pdca" value="13" onclick="cekradiopdca13(this.value)"/><input id="txtpdca13" name="txtpdca13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiopdca14" name="pdca" value="14" onclick="cekradiopdca14(this.value)"/><input id="txtpdca14" name="txtpdca14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiopdca15" name="pdca" value="15" onclick="cekradiopdca15(this.value)"/><input id="txtpdca15" name="txtpdca15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%">Ada perencanaan, review dan penetapan tindak</td>		
		<td align="center" style="width:2%"><input id="bobotpdca" name="bobotpdca" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td>
		<td align="center" style="width:2%"></td>														
		<td align="center" style="width:2%"><input id="nilbobotpdca" name="nilbobotpdca" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>		
		<td style="width:2%"></td>				
		<td align="center" style="width:10%"><b>JADWAL</b></td>																				
	</tr>	
	<tr>
		<td><b>4. MANAGEMENT ORANG</b></td>
		<td></td>
		<td style="width:2%">Hubungan kerja jelek,tidak ada coaching,conseling,train jelek</td>	
		<td style="width:6%"><input type="radio" id="radiomanage4" name="manage" value="4" onclick="cekradiomanage4(this.value)"/><input id="txtmanage4" name="txtmanage4" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiomanage5" name="manage" value="5" onclick="cekradiomanage5(this.value)"/><input id="txtmanage5" name="txtmanage5" size="1" type="text" value="" disabled="T"/></td>	
		<td style="width:6%"><input type="radio" id="radiomanage6" name="manage" value="6" onclick="cekradiomanage6(this.value)"/><input id="txtmanage6" name="txtmanage6" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomanage7" name="manage" value="7" onclick="cekradiomanage7(this.value)"/><input id="txtmanage7" name="txtmanage7" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomanage8" name="manage" value="8" onclick="cekradiomanage8(this.value)"/><input id="txtmanage8" name="txtmanage8" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiomanage9" name="manage" value="9" onclick="cekradiomanage9(this.value)"/><input id="txtmanage9" name="txtmanage9" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomanage10" name="manage" value="10" onclick="cekradiomanage10(this.value)"/><input id="txtmanage10" name="txtmanage10" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomanage11" name="manage" value="11" onclick="cekradiomanage11(this.value)"/><input id="txtmanage11" name="txtmanage11" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiomanage12" name="manage" value="12" onclick="cekradiomanage12(this.value)"/><input id="txtmanage12" name="txtmanage12" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomanage13" name="manage" value="13" onclick="cekradiomanage13(this.value)"/><input id="txtmanage13" name="txtmanage13" size="1" type="text" value="" disabled="T"/></td>		
		<td style="width:6%"><input type="radio" id="radiomanage14" name="manage" value="14" onclick="cekradiomanage14(this.value)"/><input id="txtmanage14" name="txtmanage14" size="1" type="text" value="" disabled="T"/></td>
		<td style="width:6%"><input type="radio" id="radiomanage15" name="manage" value="15" onclick="cekradiomanage15(this.value)"/><input id="txtmanage15" name="txtmanage15" size="1" type="text" value="" disabled="T"/></td>		
		<td align="center" style="width:2%">Hubungan kerja baik,ada coaching,conseling,kepemimpinan baik</td>		
		<td align="center" style="width:2%"><input id="bobotmanagement" name="bobotmanagement" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td>
		<td align="center" style="width:2%"></td>														
		<td align="center" style="width:2%"><input id="nilbobotmanagement" name="nilbobotmanagement" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>		
		<td style="width:2%"></td>				
		<td style="width:2%" rowspan="4"><textarea id="jadwal" name="jadwal" cols="12" rows="4"></textarea></td>						
	</tr>	
	<tr>
		<td colspan="17"></td>
		<td align="center" style="width:2%"></td>														
		<td align="center" style="width:2%"><input id="nilbobotkba" name="nilbobotkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>		
		<td style="width:2%"></td>				
	</tr>		
	<tr>
		<td colspan="18"><input style="text-align:right;" id="hasil" name="hasil" size="220" type="text" value="" readonly style="color:#000000"/></td>
		<td align="center" style="width:2%"></td>														
		<td align="center" style="width:2%"><input id="totkrakba" name="totkrakba" size="1" type="text" value="0" readonly style="color:#000000"/></td>		
	</tr>		

                 <table width="90%" align="center">
				 
				 <tr>
	               <td  align="left">
				   <input type="button"  id="btnsimpan" value="Simpan" onclick="simpankrakba();" tabindex="8" /> 
				   <!-- <input type="button"  id="verifyBtn" value="Hapus" onclick="hapuskrakba();" tabindex="8" />  -->
			       <!-- <input type="button"  id="verifyBtn" value="Batal" onclick="kosong();" tabindex="8" />  -->
	        		 <input type="button" id="btncetak" value="Cetak" onClick="">
	        		 <!-- <input type="button" id="btncetak" value="Cetak" onClick="location.href='<?=base_url()."index.php/cbham/formcetakkrakba"?>'"> -->
  
                   <input type="button" class="" value="Kembali" onClick="location.href='<?=base_url()."index.php/cbham/kembali2"?>'"></td>				   					
<!--				   <input type="button" value="Keluar" onClick="location.href='<?=base_url()."index.php/vis/kembali"?>'"></td>-->
                </tr>  					 

</table>
	
</table>
				 

                  <tbody id="krakba" style="height:40px;">
 		              <tr class='odd'><td colspan=7></td></tr>			
		           </tbody>				 
	            <br class="clear" />
               </form> 

			  </tr> 
					 
		   </table>    					             

<div id="dialog-ketintegritas" >
     <form method="post" action="#">
            <hr color="#ebeadb">   
			      <table width="100%" align="center"> 			  
					  <tr></tr>				  
					  <tr></tr>
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal">Integritas</label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Kejujuran</label>
					 </tr>        								     				
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Mengetahui harapan Pelanggan & memenuhinya dengan tepat waktu</label>
					 </tr>        								     									 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Memenuhi janji kepada "Stake Holder"</label>
					 </tr>        								     									 					 
                 </table>
	            <br class="clear" />
               </form> 
			  </tr> 
</div> 
<div id="dialog-kettransparan" >
     <form method="post" action="#">
            <hr color="#ebeadb">   
			      <table width="100%" align="center"> 			  
					  <tr></tr>				  
					  <tr></tr>
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal">Transparansi</label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Komunikasi secara terbuka</label>
					 </tr>        								     				
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Saling memberikan informasi</label>
					 </tr>        								     									 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Manajemen yang partisipatif</label>
					 </tr>        								     									 					 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Memecahkan masalah secara bersama</label>
					 </tr>        								     									 					 					 
                 </table>
	            <br class="clear" />
               </form> 
			  </tr> 
</div> 
<div id="dialog-ketkerjasama" >
     <form method="post" action="#">
            <hr color="#ebeadb">   
			      <table width="100%" align="center"> 			  
					  <tr></tr>				  
					  <tr></tr>
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal">Kerjasama Team</label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Bekerja-sama menuju sukses</label>
					 </tr>        								     				
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Percaya satu dengan yang lain</label>
					 </tr>        								     									 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Menghargai pendapat orang lain</label>
					 </tr>        								     									 					 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Mencari solusi yang "Win-Win"</label>
					 </tr>        								     									 					 					 
                 </table>
	            <br class="clear" />
               </form> 
			  </tr> 
</div> 
<div id="dialog-ketkreatif" >
     <form method="post" action="#">
            <hr color="#ebeadb">   
			      <table width="100%" align="center"> 			  
					  <tr></tr>				  
					  <tr></tr>
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal">Kreatifitas</label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Melakukan komparasi/Benchmark exsternal</label>
					 </tr>        								     				
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Mendorong terciptanya ide-ide baru</label>
					 </tr>        								     									 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Selalu mencari cara yang lebih baik</label>
					 </tr>        								     									 					 
                 </table>
	            <br class="clear" />
               </form> 
			  </tr> 
</div> 
<div id="dialog-ketsemangat" >
     <form method="post" action="#">
            <hr color="#ebeadb">   
			      <table width="100%" align="center"> 			  
					  <tr></tr>				  
					  <tr></tr>
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal">Semangat Untuk Menang</label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Bersikap selalu proaktif</label>
					 </tr>        								     				
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Semangat Pantang Menyerah</label>
					 </tr>        								     									 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Proses membentuk budaya belajar</label>
					 </tr>        								     									 					 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Komitmen total untuk mencapai hasil yang diharapkan</label>
					 </tr>        								     									 					 					 
                 </table>
	            <br class="clear" />
               </form> 
			  </tr> 
</div> 
<div id="dialog-ketsempurna" >
     <form method="post" action="#">
            <hr color="#ebeadb">   
			      <table width="100%" align="center"> 			  
					  <tr></tr>				  
					  <tr></tr>
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal">Kesempurnaan</label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Quality : Bekerja yang benar dari awal</label>
					 </tr>        								     				
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Cost : Kompetitif secara global</label>
					 </tr>        								     									 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Deliver : Tepat waktu</label>
					 </tr>        								     									 					 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Safety : Cara kerja yang aman & sehat lingkungan</label>
					 </tr>        								     									 					 					 
				     <tr>
			           <td bgcolor="6094DB"><label for="tanggal"></label></td>
 	        	       <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Morale : Rasa bangga & semangat tinggi</label>
					 </tr>        								     									 					 					 					 
                 </table>
	            <br class="clear" />
               </form> 
			  </tr> 
</div>
</body>
<script>

// function showMyPayroll(){
// //must be present because auto suggest will callback this function
// }

// $(document).ready(function() {
// jQuery(document).ready(function($){ 
// 	 $.fn.autosugguest({  
//            className: 'suggest',
//           methodType: 'POST',
//             minChars: 1,
//               rtnIDs: true,
//             dataFile: '<?=base_url().'index.php/cbham/namalistjab'?>'
//     });
     
// });

</script>
</html>

