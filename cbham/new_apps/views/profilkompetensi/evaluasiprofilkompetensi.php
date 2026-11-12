<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <!-- <li class="active"><a href="#tab_1" data-toggle="tab">KnowHow</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Managerial Skill</a></li> -->
                    <li class="active"><a href="#tab_1" data-toggle="tab">Evaluasi KnowHow</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Evaluasi ManagerialSkill</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Rekap KnowHow</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Rekap ManagerialSkill</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Evaluasi PK-->
                    <div class="tab-pane active" id="tab_1">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namacari'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periodecari'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahuncari'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="caripk" onClick="cariprofilkompetensi()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" style='margin-right: 10px;' id="cetakpk" onClick=""><i class="icon-print"></i> Cetak</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                              <tr>
                                <th>Jenis</th>
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
                    <!-- Evaluasi MS-->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namacarims'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periodecarims'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahuncarims'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="carims" onClick="carimanagerial()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" style='margin-right: 10px;' id="cetakms" onClick=""><i class="icon-print"></i> Cetak</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Jenis</th>
                              <th>Kompetensi</th>
                              <th>Standart</th>
                              <th>Nilai</th>
                              <th>Gap</th>
                            </tr>
                            </thead>
                            <tbody id='evaluasims'>
                            </tbody>
                        </table>
                    </div>
                    <!-- Resume -->
                    <div class="tab-pane" id="tab_3">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namarekap'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahunrekap'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="carirekap" onClick="carirekapprofilkompetensi()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" style='margin-right: 10px;' id="cetakrekappk" onClick=""><i class="icon-print"></i> Cetak</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Jenis</th>
                              <th>Kompetensi</th>
                              <th>Standart</th>
                              <th>Periode I</th>
                              <th>Gap</th>
                              <th>Periode II</th>
                              <th>Gap</th>
                            </tr>
                            </thead>
                            <tbody id='rekappk'>
                            </tbody>
                        </table>
                    </div>
                    <!-- Resume -->
                    <div class="tab-pane" id="tab_4">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namarekapms'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahunrekapms'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="carirekapms" onClick="carirekapmanagerial()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" style='margin-right: 10px;' id="cetakrekapms" onClick=""><i class="icon-print"></i> Cetak</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Jenis</th>
                              <th>Kompetensi</th>
                              <th>Standart</th>
                              <th>Periode I</th>
                              <th>Gap</th>
                              <th>Periode II</th>
                              <th>Gap</th>
                            </tr>
                            </thead>
                            <tbody id='rekapms'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
</div>


<?php //$this->view('profilkompetensi/modallevel'); ?>


<script type="application/javascript">
$('#update').hide();

function cariprofilkompetensi(){
  xajax_cariprofilkompetensi(
    document.getElementById("namacari").value,
    document.getElementById("tahuncari").value,
    document.getElementById("periodecari").value
  );
}

function carirekapprofilkompetensi(){
  xajax_carirekapprofilkompetensi(
    document.getElementById("namarekap").value,
    document.getElementById("tahunrekap").value
  );
}

function carimanagerial(){
  xajax_carimanagerial(
    document.getElementById("namacarims").value,
    document.getElementById("tahuncarims").value,
    document.getElementById("periodecarims").value
  );
}

function carirekapmanagerial(){
  xajax_carirekapmanagerial(
    document.getElementById("namarekapms").value,
    document.getElementById("tahunrekapms").value
  );
}

function kosong(){
  $('select').val('0');
}

$(document).ready(function() {

  $("#caripk").click(function(){
      var data1 = document.getElementById('namacari').value;
      var data2 = document.getElementById('tahuncari').value;
      var data3 = document.getElementById('periodecari').value;
      $("#cetakpk").attr("onClick", "window.open('<?=base_url()?>index.php/profilkompetensi/cetakprofilkompetensi/"+data1+"/"+data2+"/"+data3+"')");
  });

  $("#carims").click(function(){
      var data1 = document.getElementById('namacarims').value;
      var data2 = document.getElementById('tahuncarims').value;
      var data3 = document.getElementById('periodecarims').value;
      $("#cetakms").attr("onClick", "window.open('<?=base_url()?>index.php/profilkompetensi/cetakmanagerialskill/"+data1+"/"+data2+"/"+data3+"')");
  }); 

  $("#carirekap").click(function(){
      var data1 = document.getElementById('namarekap').value;
      var data2 = document.getElementById('tahunrekap').value;
      $("#cetakrekappk").attr("onClick", "window.open('<?=base_url()?>index.php/profilkompetensi/cetakrekapprofilkompetensi/"+data1+"/"+data2+"')");
  });

  $("#carirekapms").click(function(){
      var data1 = document.getElementById('namarekapms').value;
      var data2 = document.getElementById('tahunrekapms').value;
      $("#cetakrekapms").attr("onClick", "window.open('<?=base_url()?>index.php/profilkompetensi/cetakrekapmanagerialskill/"+data1+"/"+data2+"')");
  });        
});
</script>



