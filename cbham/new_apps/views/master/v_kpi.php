<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/kpi/cetakkpi"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah KPI</a>
          <div class="input-prepend">
            <span class="add-on">KPI</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Kode KPI/Nama KPI" id="cari" name="cari" onchange="carikpi();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Unit</th>
          <th>Jabatan</th>
          <th>KPI</th>
          <th>Deskripsi</th>
          <th>Satuan</th>
          <th>Rollup</th>
          <th>Polarisasi</th>
          <th>Periode</th>
          <th>Formula</th>
          <th>Tgl Update</th>
          <th style="width: 120px;">Action</th>
        </tr>
        </thead>
        <tbody id='kpi'>
          <?php 
          foreach ($kpi as $row) { ?>
              <tr>
                  <td><?=$row->kodekpi; ?></td>
                  <td><?=$row->namaunit; ?></td>
                  <td><?=$row->namajabatan; ?></td>
                  <td><?=$row->kpi ?></td>
                  <td><?=$row->deskripsi ?></td>
                  <td><?=$row->satuan ?></td>
                  <td><?=$row->rollup ?></td>
                  <td><?=$row->polarisasi ?></td>
                  <td><?=$row->periode ?></td>
                  <td><?=$row->formula ?></td>              
                  <td><?=$row->tglupdate ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editkpi('<?php echo $row->noindex?>')"><i class="icon-edit"></i> Edit </a><br/>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapuskpi('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="pagination pull-right" id="pagination"><?= $pagination ?></div>
  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Tambah kpi</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kelompok</label>
            <div class="controls">
              <select id="kelompok" class="s-wrap span6" onchange="cariotokodekpi()">
                <option value="">-- Pilih Status --</option>
                <option value='F'>FINANCIAL</option>
                <option value='C'>CUSTOMER</option>
                <option value='I'>INTERELATED BUSSINES PROCESS</option>
                <option value='L'>LEARNING AND GROWTH</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Kode KPI</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kodekpi" readonly>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Unit</label>
            <div class="controls">
                <select class="s-wrap selectpicker" data-live-search="true" onchange="getJabatan('entry')" data-placeholder="-- Pilih Unit --" id='unit' tabindex="1" data-width="75%">
                  <option value="">-- Pilih Unit --</option>
                  <?php foreach ($dataunit as $row) {
                      echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                  } ?>
                  </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Jabatan</label>
            <div class="controls">
                <select class="s-wrap selectpicker" data-live-search="true" data-placeholder="-- Pilih Jabatan --" id='jabatan' tabindex="1" data-width="75%">
                </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama KPI</label>
            <div class="controls">
              <input type="text" class="s-wrap span10" id="namakpi">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi</label>
            <div class="controls">
              <input type="text" class="s-wrap span10" id="deskripsi">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Target</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="target">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Satuan</label>
            <div class="controls">
              <select id="satuan" class="s-wrap span6">
                <option value="">-- Pilih Satuan --</option>
                <?php foreach ($satuan as $row) {
                  echo "<option value=".$row->satuan.">".$row->satuan."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Rollup</label>
            <div class="controls">
              <select id="rollup" class="s-wrap span6">
                <option value="">-- Pilih Rollup --</option>
                <?php foreach ($rollup as $row) {
                  echo "<option value=".$row->rollup.">".$row->rollup."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Polarisasi</label>
            <div class="controls">
              <select id="polarisasi" class="s-wrap span6">
                <option value="">-- Pilih Polarisasi --</option>
                <?php foreach ($polarisasi as $row) {
                  echo "<option value=".$row->kode.">".$row->polarisasi."</option>";
                } ?>
              </select>
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Periode</label>
            <div class="controls">
              <select id="periode" class="s-wrap span6">
                <option value="">-- Pilih Periode --</option>
                <?php foreach ($periode as $row) {
                  echo "<option value=".$row->periode.">".$row->periode."</option>";
                } ?>
              </select>
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Formula</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="formula">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpankpi()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit kpi</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">No.Index</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="noindex1" readonly>
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Kelompok</label>
            <div class="controls">
              <select id="kelompok1" class="s-wrap span6">
                <option value="">-- Pilih Status --</option>
                <option value='F'>FINANCIAL</option>
                <option value='C'>CUSTOMER</option>
                <option value='I'>INTERELATED BUSSINES PROCESS</option>
                <option value='L'>LEARNING AND GROWTH</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Kode KPI</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kodekpi1" readonly>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Unit</label>
            <div class="controls">
                <select class="s-wrap selectpicker" data-live-search="true" onchange="getJabatan('edit')" data-placeholder="-- Pilih Unit --" id='unit1' tabindex="1" data-width="75%">
                  <option value="">-- Pilih Unit --</option>
                  <?php foreach ($dataunit as $row) {
                      echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                  } ?>
                  </select>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Jabatan</label>
              <div class="controls">
                <select class="s-wrap selectpicker" data-live-search="true" data-placeholder="-- Pilih Jabatan --" id='jabatan1' tabindex="1" data-width="75%">
                </select>
              </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama KPI</label>
            <div class="controls">
              <input type="text" class="s-wrap span10" id="namakpi1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi</label>
            <div class="controls">
              <input type="text" class="s-wrap span10" id="deskripsi1">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Target</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="target1">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Satuan</label>
            <div class="controls">
              <select id="satuan1" class="s-wrap span6">
                <option value="">-- Pilih Satuan --</option>
                <?php foreach ($satuan as $row) {
                  echo "<option value=".$row->satuan.">".$row->satuan."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Rollup</label>
            <div class="controls">
              <select id="rollup1" class="s-wrap span6">
                <option value="">-- Pilih Rollup --</option>
                <?php foreach ($rollup as $row) {
                  echo "<option value=".$row->rollup.">".$row->rollup."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Polarisasi</label>
            <div class="controls">
              <select id="polarisasi1" class="s-wrap span6">
                <option value="">-- Pilih Polarisasi --</option>
                <?php foreach ($polarisasi as $row) {
                  echo "<option value=".$row->kode.">".$row->polarisasi."</option>";
                } ?>
              </select>
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Periode</label>
            <div class="controls">
              <select id="periode1" class="s-wrap span6">
                <option value="">-- Pilih Periode --</option>
                <?php foreach ($periode as $row) {
                  echo "<option value=".$row->periode.">".$row->periode."</option>";
                } ?>
              </select>
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Formula</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="formula1">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatekpi()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus kpi</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">No.Index</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="noindex2" readonly>
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Kelompok</label>
            <div class="controls">
              <select id="kelompok2" class="s-wrap span6">
                <option value="">-- Pilih Status --</option>
                <option value='F'>FINANCIAL</option>
                <option value='C'>CUSTOMER</option>
                <option value='I'>INTERELATED BUSSINES PROCESS</option>
                <option value='L'>LEARNING AND GROWTH</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Kode KPI</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kodekpi2" readonly>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Unit</label>
            <div class="controls">
                <select class="s-wrap selectpicker" data-live-search="true" onchange="getJabatan('delete')" data-placeholder="-- Pilih Unit --" id='unit2' tabindex="1" data-width="75%">
                  <option value="">-- Pilih Unit --</option>
                  <?php foreach ($dataunit as $row) {
                      echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                  } ?>
                  </select>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Jabatan</label>
              <div class="controls">
                  <select class="s-wrap selectpicker" data-live-search="true" data-placeholder="-- Pilih Jabatan --" id='jabatan2' tabindex="1" data-width="75%">
                  </select>
              </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama KPI</label>
            <div class="controls">
              <input type="text" class="s-wrap span10" id="namakpi2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi</label>
            <div class="controls">
              <input type="text" class="s-wrap span10" id="deskripsi2">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Target</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="target2">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Satuan</label>
            <div class="controls">
              <select id="satuan2" class="s-wrap span6">
                <option value="">-- Pilih Satuan --</option>
                <?php foreach ($satuan as $row) {
                  echo "<option value=".$row->satuan.">".$row->satuan."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Rollup</label>
            <div class="controls">
              <select id="rollup2" class="s-wrap span6">
                <option value="">-- Pilih Rollup --</option>
                <?php foreach ($rollup as $row) {
                  echo "<option value=".$row->rollup.">".$row->rollup."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Polarisasi</label>
            <div class="controls">
              <select id="polarisasi2" class="s-wrap span6">
                <option value="">-- Pilih Polarisasi --</option>
                <?php foreach ($polarisasi as $row) {
                  echo "<option value=".$row->kode.">".$row->polarisasi."</option>";
                } ?>
              </select>
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Periode</label>
            <div class="controls">
              <select id="periode2" class="s-wrap span6">
                <option value="">-- Pilih Periode --</option>
                <?php foreach ($periode as $row) {
                  echo "<option value=".$row->periode.">".$row->periode."</option>";
                } ?>
              </select>
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Formula</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="formula2">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deletekpi()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">

function getJabatan(type, jabatan = null){
  var unit = '';

  if (type == 'entry') {
    unit = document.getElementById("unit").value
  } else if (type == 'edit') {
    unit = document.getElementById("unit1").value
  } else {
    unit = document.getElementById("unit2").value
  }

  xajax_getJabatan(unit,type,jabatan);
}

function simpankpi(){
   xajax_simpankpi(document.getElementById("kelompok").value,document.getElementById("unit").value,document.getElementById("jabatan").value,document.getElementById("kodekpi").value,document.getElementById("namakpi").value,document.getElementById("deskripsi").value,
                  document.getElementById("target").value,document.getElementById("satuan").value,document.getElementById("rollup").value,document.getElementById("polarisasi").value,
                  document.getElementById("periode").value,document.getElementById("formula").value);
}

function editkpi(noindex){
  xajax_editkpi(noindex);
  $('.selectpicker').selectpicker('refresh')
}

function hapuskpi(noindex){
  xajax_hapuskpi(noindex);
  $('.selectpicker').selectpicker('refresh')
}

function updatekpi(){
   xajax_updatekpi(document.getElementById("noindex1").value,document.getElementById("kelompok1").value,document.getElementById("unit1").value,document.getElementById("jabatan1").value,document.getElementById("kodekpi1").value,document.getElementById("namakpi1").value,document.getElementById("deskripsi1").value,
                  document.getElementById("target1").value,document.getElementById("satuan1").value,document.getElementById("rollup1").value,document.getElementById("polarisasi1").value,
                  document.getElementById("periode1").value,document.getElementById("formula1").value);
}

function deletekpi(){
   xajax_deletekpi(document.getElementById("noindex2").value,document.getElementById("kelompok2").value,document.getElementById("kodekpi2").value,document.getElementById("namakpi2").value,document.getElementById("deskripsi2").value,
                  document.getElementById("target2").value,document.getElementById("satuan2").value,document.getElementById("rollup2").value,document.getElementById("polarisasi2").value,
                  document.getElementById("periode2").value,document.getElementById("formula2").value);
}

function cariotokodekpi(){
  xajax_cariotokodekpi(document.getElementById("kelompok").value);
}

function changepage(el){
  var page = $( el ).data('page');
  xajax_carikpi(document.getElementById('cari').value,page);
}

$('#cari').on('input',function(e){
    xajax_carikpi(document.getElementById('cari').value,1);
});
</script>

