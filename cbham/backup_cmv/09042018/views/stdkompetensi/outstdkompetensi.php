<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    
      <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <label class="control-label">Jabatan</label>
              <div class="controls">
                <div class="ausu-suggest">
                  <input type="text" size="100" value="" name="jabatan" id="jabatan" autocomplete="off" />
                  <input type="text" size="10" value="" name="kojab" id="kojab" autocomplete="off"/>
                </div>
              </div>
            </div>                            
          </form>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <div class="portlet">
                  <a class="btn blue" data-toggle="modal" href="#" onclick="carioutstdkompetensi()"><i class="icon-search"></i> Cari</a>
                  <a class="btn purple" target='_blank' href="<?=base_url()."outstdkompetensi/cetakoutstdkompetensipdf"?>"><i class="icon-download"></i> Download</a>                  
<!--                   <a class="btn purple" data-toggle="modal" onClick="location.href='<?=base_url()."outstdkompetensi/cetakoutstdkompetensi"?>'"><i class="icon-download"></i> Download</a> -->
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center">Kompetensi</th>
          <th align='center'>1</th>
          <th align='center'>2</th>
          <th align='center'>3</th>
          <th align='center'>4</th>
          <th align="center">5</th>
        </tr>
        </thead>
        <tbody id='outstdkompetensi'>
      </table> 

  </div>
</div>

<script type="application/javascript">

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {

    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: '<?=base_url().'index.php/stdknowhow/jabatanList'?>'
    });   
});

// function simpanstdmanagerial(){
//   xajax_simpanstdmanagerial(document.getElementById("kojab").value,
//                         document.getElementById("jabatan").value,
//                         document.getElementById("dev").value,
//                         document.getElementById("dir").value,
//                         document.getElementById("tw").value,
//                         document.getElementById("tl").value,
//                         document.getElementById("ps").value,
//                         document.getElementById("po").value,
//                         document.getElementById("so").value,
//                         document.getElementById("at").value,
//                         document.getElementById("ct").value,
//                         document.getElementById("int").value,
//                         document.getElementById("iu").value,
//                         document.getElementById("rb").value,
//                         document.getElementById("imp").value,
//                         document.getElementById("ing").value,
//                         document.getElementById("trp").value,
//                         document.getElementById("tew").value,
//                         document.getElementById("crt").value,
//                         document.getElementById("wis").value,
//                         document.getElementById("exc").value,
//                         document.getElementById("ach").value,
//                         document.getElementById("co").value,
//                         document.getElementById("is").value,
//                         document.getElementById("cso").value );

// }
function carioutstdkompetensi(){
  xajax_carioutstdkompetensi(document.getElementById("kojab").value);
}
// function carireportstdmanagerial(){
//   xajax_carireportstdmanagerial(document.getElementById("kojab1").value);
// }
</script>

