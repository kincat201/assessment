<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry</a></li>                    
                    <li><a href="#tab_2" data-toggle="tab">Report</a></li>                    
                </ul>
                <div class="tab-content">                    
                    <div class="tab-pane active" id="tab_1">
                        <div class='row-fluid'>
                            <div class='span12'>
                                <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Tahun KPI</label>
                                            <div class="controls">
                                                <select class="m-wrap small" id='tahun'>
                                                    <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                                        if(date('Y') == $i){ 
                                                            echo "<option value='".$i."' selected>".$i."</option>";
                                                        } else {
                                                            echo "<option value='".$i."'>".$i."</option>";
                                                        }
                                                        
                                                    } ?>
                                                </select>
                                                <!-- <input class="span2 m-wrap" id="noindex"></input> -->
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Unit</label>
                                            <div class="controls">
                                                <div class="ausu-suggest">
                                                    <input type="text" size="100" value="" name="namaunit" id="namaunit" autocomplete="off" />
                                                    <input type="text" size="10" value="" name="unit" id="unit" autocomplete="off"/>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>                                     -->
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Unit</label>
                                            <div class="controls">
                                                <select class="span5 m-wrap" data-placeholder="Choose a Category" id='unit' tabindex="1">
                                                    <option value=''>Pilih Unit</option>
                                                    <?php foreach ($dataunit as $row) {
                                                        echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Jabatan</label>
                                            <div class="controls">
                                                <div class="ausu-suggest">
                                                    <div class="controls">
                                                    <input class="span8 m-wrap" type="text" value="" name="namajabatan" id="namajabatan" autocomplete="off" />
                                                    <input type="text" size="10" value="" name="jabatan" id="jabatan" autocomplete="off"/>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>                                                                         -->
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Jabatan</label>
                                            <div class="controls">
                                                <select class="span5 m-wrap" data-placeholder="Choose a Category" id='jabatan' tabindex="1">
                                                    <option value=''>Pilih Jabatan</option>
                                                    <?php foreach ($datajabatan as $row) {
                                                        echo "<option value='".$row->kojab."'>".$row->namajabatan."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">KPI</label>
                                            <div class="controls">
                                                <select class="span5 m-wrap" data-placeholder="Choose a Category" id='kpi' tabindex="1">
                                                    <option value=''>Pilih KPI</option>
                                                    <?php foreach ($datakpi as $row) {
                                                        echo "<option value='".$row->kodekpi."'>".$row->kpi.'---'.$row->kodekpi.'---'.$row->satuan."</option>";
                                                        // echo "<option value='".$row->kodekpi."'>".$row->kpi."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Januari</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="jan"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Februari</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="feb"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Maret</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="mar"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">April</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="apr"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Mei</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="mei"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Juni</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="jun"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Juli</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="jul"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Agustus</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="agt"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">September</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="sep"></input>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Oktober</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="okt"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">November</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="nov"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Desember</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="des"></input>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="form-actions">                                        
                                        <!-- <a class="btn green" id="simpan" onClick="simpandetskk()"><i class="icon-save"></i> Simpan Detail</a> -->
                                        <a class="btn green" id="simpan" onClick="simpanskk()"><i class="icon-save"></i> Simpan</a>
                                        <a class="btn red" id="batal" onClick="kosong()"> Batal</a>                                        
                                    </div>                                                                                                    
                                </form>
<!--                                 <table class="table table-striped table-bordered table-hover table-full-width" >
                                    <thead>
                                    <tr>
                                      <th>Unit Kerja</th>
                                      <th>Jabatan</th>
                                      <th>KPI</th>
                                      <th>Indeks Bulanan</th>
                                      <th>Indeks Semesteran</th>
                                      <th>Indeks Tahunan</th>
                                    </tr>
                                    </thead>
                                    <tbody id='skk'>
                                    </tbody>
                                </table>                                 -->
                            </div>
                        </div>
                    </div>

                    <!-- Evaluasi -->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
<!--                                 <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='nama'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div> -->
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahun1'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            
                                        } ?>
                                    </select>
                                </div>                                
<!--                                 <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periode1'>
                                        <option value=''>-</option>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div> -->
                                <div class="input-prepend">                                
                                    <span class="add-on">Unit</span>                                    
                                    <select class="span10 m-wrap" data-placeholder="Choose a Category" id='unit1'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($dataunit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>                                    
                                </div>
                                <div class="input-prepend">                                
                                    <span class="add-on">Jabatan</span>                                    
                                    <select class="span10 m-wrap" data-placeholder="Choose a Category" id='jabatan1'>
                                        <option value=''>Pilih Jabatan</option>
                                        <?php foreach ($datajabatan as $row) {
                                            echo "<option value='".$row->kojab."'>".$row->namajabatan."</option>";
                                        } ?>
                                    </select>                                    
                                </div>                                  
<!--                                 <div class="control-group">
                                    <div class="control-group">
                                        <label class="control-label">Jabatan</label>
                                        <div class="controls">
                                            <select class="span5 m-wrap" data-placeholder="Choose a Category" id='jabatan' tabindex="1">
                                                <option value=''>Pilih Jabatan</option>
                                                <?php foreach ($datajabatan as $row) {
                                                    echo "<option value='".$row->kojab."'>".$row->namajabatan."</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                     -->

<!--                                 <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                        <?php for ($i=1; $i <= 5; $i++) { ?>                                                                                
                                        <input type="radio" id='<?php echo $i ?>' name="periode" value="0"/>
                                        <label class="control-label"><?php echo $i ?></label>

                                        <?php echo $i;
                                        } ?>    
                                </div>                                 -->

                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="cariskk()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a>
<!--                                 <a class="btn purple" id="cetak" onClick="location.href='<?=base_url()."index.php/skk/cetakskk"?>'"><i class="icon-download"></i> Download</a>                                 -->
                                <!-- <a class="btn purple" target='_blank' href="<?=base_url()."tna/cetaktna"?>"><i class="icon-download"></i> Download</a>                                 -->
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Kode</th>
                              <th>KPI</th>
                              <th>Deskripsi</th>
                              <th>Satuan</th>
                              <th>Rollup</th>
                              <th>Periode</th>
                              <th>Jan</th>
                              <th>Feb</th>
                              <th>Mar</th>
                              <th>Apr</th>                              
                              <th>Mei</th>
                              <th>Jun</th>
                              <th>Jul</th>
                              <th>Agt</th>
                              <th>Sep</th>
                              <th>Okt</th>
                              <th>Nov</th>
                              <th>Des</th>                                                            
                            </tr>
                            </thead>
                            <tbody id='reportskk'>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
  
    </div>
</div>


<script type="application/javascript">
$('#update').hide();
// $('#jabatan').hide();

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {
    // var unit=document.getElementById("unit").value;
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: '<?=base_url().'index.php/jabatan/jabatanList'?>'
    });   

  $("#cari").click(function(){
      var data1 = document.getElementById('tahun1').value;
      var data2 = document.getElementById('unit1').value;
      var data3 = document.getElementById('jabatan1').value;
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/skk/cetakskk/"+data1+"/"+data2+"/"+data3+"')");
  });         
});

// function caripegawai(){
//   xajax_caripegawai(document.getElementById("unit").value);                      
// }

// function caripms(){
//   xajax_caripms(document.getElementById("nama").value);                      
// }

function editskk(noindex){
  xajax_editskk(noindex);
}

function hapusskk(noindex){
  xajax_hapusskk(noindex);
}

function simpandetskk(){
  xajax_simpandetskk(
                  document.getElementById("tahun").value,
                  document.getElementById("unit").value,
                  document.getElementById("jabatan").value,
                  document.getElementById("kpi").value,
                  document.getElementById("skkbln").value,
                  document.getElementById("skksmt").value,
                  document.getElementById("skkthn").value
                  );
}

function simpanskk(){
  xajax_simpanskk(
                  document.getElementById("tahun").value,
                  document.getElementById("unit").value,
                  document.getElementById("jabatan").value,
                  document.getElementById("kpi").value,
                  document.getElementById("jan").value,
                  document.getElementById("feb").value,
                  document.getElementById("mar").value,
                  document.getElementById("apr").value,
                  document.getElementById("mei").value,
                  document.getElementById("jun").value,
                  document.getElementById("jul").value,
                  document.getElementById("agt").value,
                  document.getElementById("sep").value,
                  document.getElementById("okt").value,
                  document.getElementById("nov").value,
                  document.getElementById("des").value
                  );
    kosong();
}

function kosong(){
                  // document.getElementById("tahun").value="";
                  // document.getElementById("unit").value="";
                  // document.getElementById("jabatan").value="";
                  document.getElementById("kpi").value="";
                  document.getElementById("jan").value="";
                  document.getElementById("feb").value="";
                  document.getElementById("mar").value="";
                  document.getElementById("apr").value="";
                  document.getElementById("mei").value="";
                  document.getElementById("jun").value="";
                  document.getElementById("jul").value="";
                  document.getElementById("agt").value="";
                  document.getElementById("sep").value="";
                  document.getElementById("okt").value="";
                  document.getElementById("nov").value="";
                  document.getElementById("des").value="";
}

function cariskk(){
  xajax_cariskk(document.getElementById("tahun1").value,document.getElementById("unit1").value,document.getElementById("jabatan1").value);
}

function editpegawai(nik){
  xajax_editpegawai(nik);
}

function updatepegawai(){
  xajax_updatepegawai(document.getElementById("nik").value,
                      document.getElementById("nama").value,
                      document.getElementById("tgllahir").value,
                      document.getElementById("tglmasuk").value,
                      document.getElementById("pendidikan").value,
                      document.getElementById("status").value,
                      document.getElementById("unit").value,
                      document.getElementById("jabatan").value,
                      document.getElementById("role").value,
                      document.getElementById("username").value,
                      document.getElementById("password").value );
}

$('#cari').on('input',function(e){
    xajax_caripegawai(document.getElementById('cari').value);
});
</script>

