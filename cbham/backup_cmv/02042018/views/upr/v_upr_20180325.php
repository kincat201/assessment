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
          <th align="center" bgcolor="#245397" colspan="8"><font color="white">CURRICULUM VITAE</th>
        </tr>          
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
          <th align="center" bgcolor="#245397" colspan="12"><font color="white">RIWAYAT JABATAN</th>
        </tr>                    
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">Jenis</th>
          <th align='center' bgcolor="#245397"><font color="white">Tanggal</th>
          <th align='center' bgcolor="#245397"><font color="white">Status Lama</th>
          <th align='center' bgcolor="#245397"><font color="white">Unit Lama</th>
          <th align='center' bgcolor="#245397"><font color="white">Grade Lama</th>
          <th align="center" bgcolor="#245397"><font color="white">Struktur Lama</th>
          <th align="center" bgcolor="#245397"><font color="white">Jabatan Lama</th>
          <th align='center' bgcolor="#245397"><font color="white">Status Baru</th>
          <th align='center' bgcolor="#245397"><font color="white">Unit Baru</th>
          <th align='center' bgcolor="#245397"><font color="white">Grade Baru</th>
          <th align="center" bgcolor="#245397"><font color="white">Struktur Baru</th>
          <th align="center" bgcolor="#245397"><font color="white">Jabatan Baru</th>
        </tr>
        </thead>
        <tbody id='historijabatan'>
      </table>       

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397" colspan="7"><font color="white">RIWAYAT TRAINING</th>
        </tr>                              
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">No.Training</th>
          <th align='center' bgcolor="#245397"><font color="white">Nama Training</th>
          <th align='center' bgcolor="#245397"><font color="white">Kode TNA</th>
          <th align='center' bgcolor="#245397"><font color="white">Tutor</th>
          <th align='center' bgcolor="#245397"><font color="white">Tgl Mulai</th>
          <th align="center" bgcolor="#245397"><font color="white">Tgl Akhir</th>
          <th align="center" bgcolor="#245397"><font color="white">Biaya</th>
        </tr>
        </thead>
        <tbody id='historitraining'>
      </table>             

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397" colspan="7"><font color="white">PROFIL KOMPETENSI KNOWHOW TAHUN INI</th>
        </tr>                              
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
          <th align="center" bgcolor="#245397" colspan="7"><font color="white">PROFIL KOMPETENSI MANAGERIAL SKILL TAHUN INI</th>
        </tr>                              
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

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397" colspan="26"><font color="white">TREND PROFIL KOMPETENSI KNOWHOW</th>
        </tr>                                        
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">Tahun</th>
          <th align="center" bgcolor="#245397"><font color="white">FE</th>
          <th align="center" bgcolor="#245397"><font color="white">IE</th>
          <th align="center" bgcolor="#245397"><font color="white">EX</th>
          <th align='center' bgcolor="#245397"><font color="white">BS</th>
          <th align='center' bgcolor="#245397"><font color="white">TSMKT</th>
          <th align='center' bgcolor="#245397"><font color="white">TSEST</th>
          <th align="center" bgcolor="#245397"><font color="white">TSPPC</th>
          <th align="center" bgcolor="#245397"><font color="white">TSCON</th>
          <th align="center" bgcolor="#245397"><font color="white">TSQAC</th>
          <th align='center' bgcolor="#245397"><font color="white">TSMAN</th>
          <th align='center' bgcolor="#245397"><font color="white">TSSAR</th>
          <th align='center' bgcolor="#245397"><font color="white">TSCS</th>
          <th align="center" bgcolor="#245397"><font color="white">TSPENG</th>
          <th align="center" bgcolor="#245397"><font color="white">TSFAT</th>
          <th align="center" bgcolor="#245397"><font color="white">TSHSE</th>
          <th align='center' bgcolor="#245397"><font color="white">TSHRD</th>
          <th align='center' bgcolor="#245397"><font color="white">TSGA</th>
          <th align='center' bgcolor="#245397"><font color="white">TSMD</th>          
          <th align="center" bgcolor="#245397"><font color="white">TSMR</th>
          <th align="center" bgcolor="#245397"><font color="white">TSENGMECH</th>
          <th align="center" bgcolor="#245397"><font color="white">TSENGELEC</th>
          <th align='center' bgcolor="#245397"><font color="white">TSENGINST</th>
          <th align='center' bgcolor="#245397"><font color="white">TSENGCIV</th>
          <th align='center' bgcolor="#245397"><font color="white">TSSD</th>          
          <th align='center' bgcolor="#245397"><font color="white">TSIA</th>
        </tr>
        </thead>
        <tbody id='knowhowtahunan'>
      </table>                         

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397" colspan="26"><font color="white">TREND PROFIL KOMPETENSI MANAGERIAL SKILL</th>
        </tr>                                        
        <tr>
          <th align="center" bgcolor="#245397"><font color="white">Tahun</th>
          <th align="center" bgcolor="#245397"><font color="white">DEV</th>
          <th align="center" bgcolor="#245397"><font color="white">DIR</th>
          <th align="center" bgcolor="#245397"><font color="white">TW</th>
          <th align='center' bgcolor="#245397"><font color="white">TL</th>
          <th align='center' bgcolor="#245397"><font color="white">PS</th>
          <th align='center' bgcolor="#245397"><font color="white">PO</th>
          <th align="center" bgcolor="#245397"><font color="white">SO</th>
          <th align="center" bgcolor="#245397"><font color="white">AT</th>
          <th align="center" bgcolor="#245397"><font color="white">CT</th>
          <th align='center' bgcolor="#245397"><font color="white">INT</th>
          <th align='center' bgcolor="#245397"><font color="white">IU</th>
          <th align='center' bgcolor="#245397"><font color="white">RB</th>
          <th align="center" bgcolor="#245397"><font color="white">IMP</th>
          <th align="center" bgcolor="#245397"><font color="white">ING</th>
          <th align="center" bgcolor="#245397"><font color="white">TRP</th>
          <th align='center' bgcolor="#245397"><font color="white">TEW</th>
          <th align='center' bgcolor="#245397"><font color="white">CRT</th>
          <th align='center' bgcolor="#245397"><font color="white">WIS</th>          
          <th align="center" bgcolor="#245397"><font color="white">EXC</th>
          <th align="center" bgcolor="#245397"><font color="white">ACH</th>
          <th align="center" bgcolor="#245397"><font color="white">CO</th>
          <th align='center' bgcolor="#245397"><font color="white">IS</th>
          <th align='center' bgcolor="#245397"><font color="white">CSO</th>
        </tr>
        </thead>
        <tbody id='managerialtahunan'>
      </table>                         

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center" bgcolor="#245397" colspan="5"><font color="white">EVALUASI KINERJA TAHUN INI</th>
        </tr>                                                  
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
          <th align="center" bgcolor="#245397" colspan="5"><font color="white">TREND EVALUASI KINERJA</th>
        </tr>                                                            
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

  $("#cari").click(function(){
      var data1 = document.getElementById('nama').value;      
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/upr/cetakupr/"+data1+"')");
  });      
});

function cariupr(){
  xajax_cariupr(document.getElementById("nama").value);
}

</script>

