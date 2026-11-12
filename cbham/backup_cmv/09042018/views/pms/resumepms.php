<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    
      <div class="row-fluid">
        <div class="span12">
          <div class="portlet">
              <div class="form-search fright">
<!--                   <div class="input-prepend">
                      <span class="add-on">Nama</span>
                      <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1" onchange="caripegawai()">
                          <option value=''>Pilih Pegawai</option>
                          <?php foreach ($pegawai as $row) {
                              echo "<option value='".$row->nik."'>".$row->nama."</option>";
                          } ?>
                      </select>
                  </div> -->
                  <div class="input-prepend">
                      <span class="add-on">Level Jabatan</span>
                      <select class="m-wrap large" data-placeholder="Choose a Category" id='leveljabatan' tabindex="1" onchange="carilevel()">
                          <option value=''>Pilih Level Jabatan</option>
                          <?php foreach ($level as $row) {
                              echo "<option value='".$row->kodekelom."'>".$row->namakelompok."</option>";
                          } ?>
                      </select>
                  </div>                  
<!--                   <div class="input-prepend">
                      <span class="add-on">Periode</span>
                      <select class="m-wrap small" id='periode'>
                          <option value='1'>Semester I</option>
                          <option value='2'>Semester II</option>
                          <option value='3'>Semester III</option>
                          <option value='4'>Semester IV</option>
                      </select>
                  </div> -->
                  <div class="input-prepend">
                      <span class="add-on">Tahun</span>
                      <select class="m-wrap small" id='tahun'>
                          <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                              if(date('Y') == $i){ 
                                  echo "<option value='".$i."' selected>".$i."</option>";
                              } else {
                                  echo "<option value='".$i."'>".$i."</option>";
                              }                              
                          } ?>
                      </select>
                  </div>
                  <a class="btn green" style='margin-right: 10px;' id="cari" onClick="cariresumepms()"><i class="icon-search"></i> Cari</a>
                  <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a>                                
              </div>
          </div>      
        </div>
      </div>      

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center">Nama</th>
          <th align='center'>NIK</th>
          <th align='center'>KRA</th>
          <th align='center'>KBA</th>
          <th align='center'>Total</th>
          <th align="center">Kategori</th>
        </tr>
        </thead>
        <tbody id='resumepms'>
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

  $("#cari").click(function(){
      var data1 = document.getElementById('leveljabatan').value;
      var data2 = document.getElementById('tahun').value;
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/pms/cetakresumepms/"+data1+"/"+data2+"')");
  });      
});

function cariresumepms(){
  xajax_cariresumepms(document.getElementById("leveljabatan").value,document.getElementById("tahun").value);
}

</script>

