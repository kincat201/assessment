<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    
      <div class="row-fluid">
        <div class="span12">
          <div class="portlet">
              <div class="form-search fright">
                  <div class="input-prepend">
                      <span class="add-on">Nama</span>
                      <!-- <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1" onchange="caripegawai()"> -->
                      <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1">
                          <option value=''>Pilih Pegawai</option>
                          <?php foreach ($pegawai as $row) {
                              echo "<option value='".$row->nik."'>".$row->nama."</option>";
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
<!--                   <div class="input-prepend">
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
                  </div> -->
                  <a class="btn green" style='margin-right: 10px;' id="cari" onClick="cariupr()"><i class="icon-search"></i> Cari</a>
                  <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a>                                
              </div>
          </div>      
        </div>
      </div>      

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">NIK</th>
          <th align='center' bgcolor="#245397"><font color="white">Nama</th>
          <th align='center' bgcolor="#245397"><font color="white">Tgl Lahir</th>
          <th align='center' bgcolor="#245397"><font color="white">Pendidikan</th>
          <th align='center' bgcolor="#245397"><font color="white">Status</th>
          <th align="center" bgcolor="#245397"><font color="white">Unit</th>
          <th align="center" bgcolor="#245397"><font color="white">Jabatan</th>
        </tr>
        </thead>
        <tbody id='upr'>
      </table> 

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">No</th>
          <th align="center" bgcolor="#245397"><font color="white">Kompetensi</th>
          <th align="center" bgcolor="#245397"><font color="white">Keterangan</th>
          <th align="center" bgcolor="#245397"><font color="white">Standar Kompetensi</th>
          <th align='center' bgcolor="#245397"><font color="white">Semester 1</th>
          <th align='center' bgcolor="#245397"><font color="white">Semester 2</th>
          <th align='center' bgcolor="#245397"><font color="white">Rata-rata</th>
        </tr>
        </thead>
        <tbody id='profil'>
      </table>             

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">No</th>
          <th align="center" bgcolor="#245397"><font color="white">Kompetensi</th>
          <th align="center" bgcolor="#245397"><font color="white">Keterangan</th>
          <th align="center" bgcolor="#245397"><font color="white">Standar Kompetensi</th>
          <th align='center' bgcolor="#245397"><font color="white">Semester 1</th>
          <th align='center' bgcolor="#245397"><font color="white">Semester 2</th>
          <th align='center' bgcolor="#245397"><font color="white">Rata-rata</th>
        </tr>
        </thead>
        <tbody id='profil2'>
      </table>                   

<!--       <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">FE</th>
          <th align="center" bgcolor="#245397"><font color="white">IE</th>
          <th align="center" bgcolor="#245397"><font color="white">EX</th>
          <th align="center" bgcolor="#245397"><font color="white">BS</th>
          <th align='center' bgcolor="#245397"><font color="white">TSMKT</th>
          <th align='center' bgcolor="#245397"><font color="white">TSEST</th>
          <th align='center' bgcolor="#245397"><font color="white">TSPPC</th>
        </tr>
        </thead>
        <tbody id='profiltahunan'>
      </table>                          -->

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">Tahun</th>
          <th align="center" bgcolor="#245397"><font color="white">Periode</th>
          <th align='center' bgcolor="#245397"><font color="white">KRA</th>
          <th align='center' bgcolor="#245397"><font color="white">KBA</th>
          <th align='center' bgcolor="#245397"><font color="white">Total</th>
        </tr>
        </thead>
        <tbody id='pms'>
      </table>       

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">Tahun</th>          
          <th align='center' bgcolor="#245397"><font color="white">KRA</th>
          <th align='center' bgcolor="#245397"><font color="white">KBA</th>
          <th align='center' bgcolor="#245397"><font color="white">Total</th>
        </tr>
        </thead>
        <tbody id='pmstahunan'>
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

  // $("#cari").click(function(){
  //     var data1 = document.getElementById('nama').value;
  //     var data2 = document.getElementById('tahun').value;
  //     $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/pms/cetakrekappms/"+data1+"/"+data2+"')");
  // });      
});

function cariupr(){
  xajax_cariupr(document.getElementById("nama").value);
}

</script>

