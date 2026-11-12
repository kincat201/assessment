<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/periode/cetakperiode"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Periode</a>
          <div class="input-prepend">
            <span class="add-on">Periode</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Periode" id="cari" name="cari" onchange="cariperiode();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Periode</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='periode'>
          <?php 
          foreach ($periode as $row) { ?>
              <tr>
                  <td><?=$row->noindex; ?></td>
                  <td><?=$row->periode ?></td>
                  <td><?=$row->deskripsi ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editperiode('<?php echo $row->noindex?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusperiode('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>

  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Periode</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaperiode">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Deskripsi Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsiperiode">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanperiode()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Periode</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodeperiode" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaperiode1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsiperiode1">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updateperiode()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus Periode</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodeperiode2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaperiode2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Periode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsiperiode2">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deleteperiode()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpanperiode(){
   xajax_simpanperiode(document.getElementById("namaperiode").value,document.getElementById("deskripsiperiode").value);
}

function editperiode(noindex){
  xajax_editperiode(noindex);
}

function hapusperiode(noindex){
  xajax_hapusperiode(noindex);
}

function updateperiode(){
  xajax_updateperiode(document.getElementById("kodeperiode").value,document.getElementById("namaperiode1").value,document.getElementById("deskripsiperiode1").value);
}

function deleteperiode(){
  xajax_deleteperiode(document.getElementById("kodeperiode2").value,document.getElementById("namaperiode2").value,document.getElementById("deskripsiperiode2").value);
}

$('#cari').on('input',function(e){
    xajax_cariperiode(document.getElementById('cari').value);
});
</script>

