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
                                            <label class="control-label">Nama Training</label>
                                            <div class="controls">
                                                <input class="span9 m-wrap" id="namatraining"></input>
                                            </div>
                                        </div>
                                    </div>                                                  
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Kode TNA</label>
                                            <div class="controls">                                    
                                                <div class="input-prepend">                                                        
                                                    <select class="m-wrap small" id='kodetna'>
                                                        <option value='-'>-</option>
                                                        <option value='KOM'>KOM</option>
                                                        <option value='KIN'>KIN</option>
                                                        <option value='AUD'>AUD</option>
                                                        <option value='BIP'>BIP</option>
                                                        <option value='DIR'>DIR</option>
                                                  </select>
                                                </div>                                    
                                            </div>
                                        </div>                                                  
                                    </div>                     
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Provider / Tutor</label>
                                            <div class="controls">
                                                <input class="span9 m-wrap" id="tutor"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Jadwal</label>
                                            <div class="controls">
                                                <input class="span5 m-wrap" id="jadwal"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Durasi</label>
                                            <div class="controls">
                                                <input class="span3 m-wrap" id="durasi"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Biaya</label>
                                            <div class="controls">
                                                <input class="span4 m-wrap" id="biaya"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Peserta</label>
                                            <div class="controls">
                                                <input class="span6 m-wrap" id="peserta"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Jabatan</label>
                                            <div class="controls">
                                                <input class="span9 m-wrap" id="jabatan"></input>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Unit Kerja</label>
                                            <div class="controls">
                                                <input class="span5 m-wrap" id="unit"></input>
                                            </div>
                                        </div>
                                    </div>                                    
<!--                                     <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Tahun</label>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Periode</label>
                                            <div class="controls">                                    
                                                <div class="input-prepend">                                                        
                                                    <select class="m-wrap small" id='periode'>
                                                        <option value='-'>-</option>
                                                        <option value='1'>Semester I</option>
                                                        <option value='2'>Semester II</option>
                                                  </select>
                                                </div>                                    
                                            </div>
                                        </div>                                                  
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Unit</label>
                                            <div class="controls">
                                                <select class="span5 m-wrap" data-placeholder="Choose a Category" id='unit' tabindex="1" onchange="caripegawai();">
                                                    <option value=''>Pilih Unit</option>
                                                    <?php foreach ($dataunit as $row) {
                                                        echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Nama</label>
                                            <div class="controls">
                                                <select id="nama" class="span6 m-wrap">          
                                                    <option value=''>Pilih Pegawai</option>                                                    
                                                </select>
                                                <a class="btn green" id="caripms" onClick="caripms()"><i class="icon-search"></i>Cari</a>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Hasil Evaluasi Kompetensi (KOM)</label>
                                            <div class="controls">
                                                <textarea class="span9 m-wrap" id="kom" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Hasil Evaluasi Kinerja (KIN)</label>
                                            <div class="controls">
                                                <textarea class="span9 m-wrap" id="kin" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Hasil Audit (AUD)</label>
                                            <div class="controls">
                                                <textarea class="span9 m-wrap" id="aud" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Bisnis Plan (BIP)</label>
                                            <div class="controls">
                                                <textarea class="span9 m-wrap" id="bip" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Masukan Direksi (DIR)</label>
                                            <div class="controls">
                                                <textarea class="span9 m-wrap" id="dir" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                 -->                                                                                                                                                        
                                    <div class="form-actions">                                        
                                        <a class="btn green" id="simpan" onClick="simpantna()"><i class="icon-save"></i> Simpan</a>
                                        <a class="btn red" id="batal" onClick="batal()"> Batal</a>                                        
                                    </div>                                                                
                                </form>
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
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periode1'>
                                        <option value=''>-</option>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
                                <div class="input-prepend">                                
                                    <span class="add-on">Unit</span>                                    
                                    <select class="span10 m-wrap" data-placeholder="Choose a Category" id='unit1'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($dataunit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>                                    
                                </div>                                
<!--                                 <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                        <?php for ($i=1; $i <= 5; $i++) { ?>                                                                                
                                        <input type="radio" id='<?php echo $i ?>' name="periode" value="0"/>
                                        <label class="control-label"><?php echo $i ?></label>

                                        <?php echo $i;
                                        } ?>    
                                </div>                                 -->

                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="caritna()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a>                                
                                <!-- <a class="btn purple" target='_blank' href="<?=base_url()."tna/cetaktna"?>"><i class="icon-download"></i> Download</a>                                 -->
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Unit Kerja</th>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>Jabatan</th>
                              <th>KOM</th>
                              <th>KIN</th>
                              <th>AUD</th>
                              <th>BIP</th>
                              <th>DIR</th>
                            </tr>
                            </thead>
                            <tbody id='tna'>
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

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {
    var unit=document.getElementById("unit").value;
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: '<?=base_url().'index.php/tna/pegawaiList/unit'?>'
    });   

  $("#cari").click(function(){
      var data1 = document.getElementById('tahun1').value;
      var data2 = document.getElementById('periode1').value;
      var data3 = document.getElementById('unit1').value;
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/tna/cetaktna/"+data1+"/"+data2+"/"+data3+"')");
  });         
});

function caripegawai(){
  xajax_caripegawai(document.getElementById("unit").value);                      
}

function caripms(){
  xajax_caripms(document.getElementById("nama").value);                      
}

function simpantna(){
  xajax_simpantna(document.getElementById("unit").value,
                  document.getElementById("nama").value,
                  document.getElementById("kom").value,
                  document.getElementById("kin").value,
                  document.getElementById("aud").value,
                  document.getElementById("bip").value,
                  document.getElementById("dir").value,
                  document.getElementById("tahun").value,
                  document.getElementById("periode").value
                  );
}

function caritna(){
  xajax_caritna(document.getElementById("tahun1").value,document.getElementById("periode1").value,document.getElementById("unit1").value);
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

