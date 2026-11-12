<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid">
    
      <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <label class="control-label">Jabatan</label>
              <div class="controls">
                <select id="kojab" class="s-wrap span8 selectpicker" data-live-search="true">
                  <option value="">-- Pilih Jabatan --</option>
                  <?php foreach ($jabatan as $row) {
                    echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                  } ?>
                </select>
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
                  <a class="btn purple" target='_blank' href="<?=base_url()."index.php/outstdkompetensi/cetakoutstdkompetensipdf"?>"><i class="icon-download"></i> Download</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center">Kompetensi</th>
          <th align="center">Keterangan</th>
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

function carioutstdkompetensi(){
  xajax_carioutstdkompetensi(document.getElementById("kojab").value);
}

</script>

