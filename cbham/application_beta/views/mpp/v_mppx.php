<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry Rencana & Pemenuhan</a></li>
                    <!-- <li><a href="#tab_2" data-toggle="tab">Managerial Skill</a></li> -->
                    <li><a href="#tab_2" data-toggle="tab">Report Rencana & Pemenuhan</a></li>
                    <!-- <li><a href="#tab_4" data-toggle="tab">Rekap</a></li> -->
                </ul>
                <div class="tab-content">
                    <!-- Know How -->
                    <div class="tab-pane active" id="tab_1">
<!--                         <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1">
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periode'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
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
                                <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="cariknowhow()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div> -->
                        <div class='row-fluid'>
                            <div class='span12'>
                                <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Unit</label>
                                            <div class="controls">
                                                <select class="m-wrap large" data-placeholder="Choose a Category" id='unit' tabindex="1">
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
                                            <label class="control-label">Jabatan</label>
                                            <div class="controls">
                                                <select class="m-wrap large" data-placeholder="Choose a Category" id='jabatan' tabindex="1">
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
                                            <label class="control-label">Tahun</label>
                                            <div class="controls">
                                                <select class="m-wrap large" id='tahun'>
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
                                        <label class="control-label">Bulan</label>
                                        <div class="controls">
                                            <select class="m-wrap large" id="bulan" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 12; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Standar Grade</label>
                                            <div class="controls">
                                                <select class="m-wrap large" data-placeholder="Choose a Category" id='stdgrade' tabindex="1">
                                                    <option value=''>Pilih Grade</option>
                                                    <?php foreach ($datagrade as $row) {
                                                        echo "<option value='".$row->grade."'>".$row->grade."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Actual Grade</label>
                                            <div class="controls">
                                                <select class="m-wrap large" data-placeholder="Choose a Category" id='actgrade' tabindex="1">
                                                    <option value=''>Pilih Grade</option>
                                                    <?php foreach ($datagrade as $row) {
                                                        echo "<option value='".$row->grade."'>".$row->grade."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                                                                                            
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Kandidat/Nama</label>
                                            <div class="controls">
                                                <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1">
                                                    <option value=''>Pilih Pegawai</option>
                                                    <?php foreach ($pegawai as $row) {
                                                        echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Tindakan Pengembangan</label>
                                            <div class="controls">
                                                <textarea class="large m-wrap" id="tindakan" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Program Pengembangan</label>
                                            <div class="controls">
                                                <textarea class="large m-wrap" id="pengembangan" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Jadwal</label>
                                            <div class="controls">
                                                <textarea class="large m-wrap" id="jadwal" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                        
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">PIC</label>
                                            <div class="controls">
                                                <textarea class="large m-wrap" id="pic" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>                  

                                    <table class="table table-striped table-bordered table-hover table-full-width" >
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tindakan Pengembangan</th>
                                                <th>Program Pengembangan</th>
                                                <th>Jadwal</th>
                                                <th>PIC</th>
                                            </tr>
                                        </thead>
                                        <tbody id='listmpp'>
                                    </table>

                                    <div class="form-actions">
                                        <a class="btn green" id="simpandetmpp" onClick="simpandetmpp()"><i class="icon-save"></i> Simpan Detail</a>
                                        <a class="btn green" id="simpanmpp" onClick="simpanmpp()"><i class="icon-save"></i> Simpan</a>
                                        <a class="btn" id="batal" onClick="batal()"> Batal</a>
                                    </div>                                                                
                                </form>
                            </div>
                        </div>
<!--                         <div class='row-fluid'>
                            <form class="form-horizontal form-bordered">
                                <div class="control-group">
                                    <label class="control-label">Kekuatan</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="kekuatan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kelemahan</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="kelemahan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Rencana Pengembangan</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="pengembangan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a class="btn green" id="simpan" onClick="simpanknowhow()"><i class="icon-save"></i> Simpan</a>
                                    <a class="btn" id="batal" onClick="batal()"> Batal</a>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    <!-- Managerial Skill -->
<!--                     <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='nama'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periode'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
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
                                <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="carimanagerialskill()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <div class='row-fluid'>
                            
                            <div class='span4'>
                                <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <label class="control-label">DEV</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="dev" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">DIR</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="dir" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">TW</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="tw" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">TL</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="tl" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">PS</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="ps" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">PO</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="po" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <div class='span4'>
                               <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <label class="control-label">AT</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="at" tabindex="1" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">CT</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="ct" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">INT</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="int" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">IU</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="iu" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">RB</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="rb" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">IMP</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="imp" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <div class='span4'>
                                <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <label class="control-label">ACH</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="ach" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">CO</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="co" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">INF</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="inf" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">CSO</label>
                                        <div class="controls">
                                            <select class="span8 s-wrap" id="cso" data-placeholder="Choose a Category" tabindex="1">
                                                <?php for ($i=1; $i <= 6; $i++) { 
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                } ?>    
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class='row-fluid'>
                            <form class="form-horizontal form-bordered">
                                <div class="control-group">
                                    <label class="control-label">Penanggung Jawab</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="penanggungjawab" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Jadwal</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="jadwal" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Komentar</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="komentar" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a class="btn green" id="simpan" onClick="simpanmanagerialskill()"><i class="icon-save"></i> Simpan</a>
                                    <a class="btn" id="batal" onClick="batal()"> Batal</a>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <!-- Evaluasi -->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='nama'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periode'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
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
                                <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="cariprofilkompetensi()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Kompetensi</th>
                              <th>Standart</th>
                              <th>Nilai</th>
                              <th>Gap</th>
                            </tr>
                            </thead>
                            <tbody id='evaluasipk'>
                            </tbody>
                        </table>
                    </div>
                    <!-- Resume -->
<!--                     <div class="tab-pane" id="tab_4">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='nama'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
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
                                <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="carirekapprofilkompetensi()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Kompetensi</th>
                              <th>Standart</th>
                              <th>Periode I</th>
                              <th>Gap</th>
                              <th>Periode II</th>
                              <th>Gap</th>
                              <th>Periode III</th>
                              <th>Gap</th>
                              <th>Periode IV</th>
                              <th>Gap</th>
                            </tr>
                            </thead>
                            <tbody id='rekappk'>
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>
  
    </div>
</div>


<script type="application/javascript">
$('#update').hide();

function simpanknowhow(){
  xajax_simpanpegawai(document.getElementById("nik").value,
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

