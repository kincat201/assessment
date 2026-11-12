<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry Rotasi / Promosi</a></li>
                    <!-- <li><a href="#tab_2" data-toggle="tab">Managerial Skill</a></li> -->
                    <li><a href="#tab_2" data-toggle="tab">Report Rotasi / Promosi</a></li>
                    <!-- <li><a href="#tab_4" data-toggle="tab">Rekap</a></li> -->
                </ul>
                <div class="tab-content">
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
                            <form class="form form-bordered" id="form">
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <!-- <label class="control-label">Jenis</label> -->
                                            <div class="controls">
                                                <label class="radio">
                                                    <input type="radio" name="jenis" value="Rotasi" />
                                                    Rotasi
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="jenis" value="Mutasi" />
                                                    Mutasi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Tanggal Berlaku</label>
                                            <div class="controls">
                                                 <input type="text" placeholder="Tanggal" class="s-wrap span4 date-picker" id="tanggal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Nama</label>
                                            <div class="controls">
                                                <input type="text" class="s-wrap span8" id="nama">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Status Kepegawaian</label>
                                            <div class="controls">
                                                <select id="status" class="s-wrap span4" disabled>
                                                    <option value=""></option>
                                                    <option value="Tetap">Tetap</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Status Kepegawaian Baru</label>
                                            <div class="controls">
                                                <select id="status" class="s-wrap span4">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="Tetap">Tetap</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="row-fluid">
                                    <div class="span6 ">            
                                        <div class="control-group">
                                            <label class="control-label">Unit / Satmingkal</label>
                                            <div class="controls">
                                                <select id="unit" class="s-wrap span6" disabled>
                                                    <option value=""></option>
                                                    <?php foreach ($dataunit as $row) {
                                                    echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6 ">       
                                        <div class="control-group">
                                            <label class="control-label">Unit / Satmingkal Baru</label>
                                            <div class="controls">
                                                <select id="unit" class="s-wrap span6">
                                                    <option value="">-- Pilih Unit --</option>
                                                    <?php foreach ($dataunit as $row) {
                                                    echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Grade</label>
                                            <div class="controls">
                                                <select id="grade" class="s-wrap span2" disabled>
                                                    <option value=""></option>
                                                    <?php foreach ($datagrade as $row) {
                                                    echo "<option value=".$row->grade.">".$row->grade."</option>";
                                                    } ?>
                                                </select> 
                                                <select id="struktural" class="s-wrap span3" disabled>
                                                    <option value=""></option>
                                                    <option value="Struktural">Struktural</option>
                                                    <option value="Fungsional">Fungsional</option>
                                                </select>  
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Grade Baru</label>
                                            <div class="controls">
                                                <select id="grade" class="s-wrap span3">
                                                    <option value="">Pilih Grade</option>
                                                    <?php foreach ($datagrade as $row) {
                                                    echo "<option value=".$row->grade.">".$row->grade."</option>";
                                                    } ?>
                                                </select> 
                                                <select id="struktural" class="s-wrap span4">
                                                    <option value="">Pilih Jenis Jabatan</option>
                                                    <option value="Struktural">Struktural</option>
                                                    <option value="Fungsional">Fungsional</option>
                                                </select>  
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Jabatan</label>
                                            <div class="controls">
                                                <select id="jabatan" class="s-wrap span6" disabled>
                                                    <option value=""></option>
                                                    <?php foreach ($datajabatan as $row) {
                                                    echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                                    } ?>
                                                </select>  
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Jabatan Baru</label>
                                            <div class="controls">
                                                <select id="jabatan" class="s-wrap span6">
                                                    <option value="">-- Pilih Jabatan --</option>
                                                    <?php foreach ($datajabatan as $row) {
                                                    echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                                    } ?>
                                                </select>  
                                            </div>
                                        </div> 
                                    </div>
                                </div>   
                                <div class="form-actions">
                                    <a class="btn green" href="#" onclick="simpanrotasi()" id='simpan'><i class="icon-save"></i> Simpan</a>
                                    <!-- <a class="btn green" href="#" onclick="updatepegawai()" id='update'><i class="icon-save"></i> Update</a> -->
                                </div>                     
                            </form>
                        </div>
                    </div>
                   
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

