<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/rollup/cetakrollup"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Rollup</a>
          <div class="input-prepend">
            <span class="add-on">Rollup</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Rollup" id="cari" name="cari" onchange="carirollup();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Rollup</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='rollup'>
          <?php 
          foreach ($rollup as $row) { ?>
              <tr>
                  <td><?=$row->noindex; ?></td>
                  <td><?=$row->rollup ?></td>
                  <td><?=$row->deskripsi ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editrollup('<?php echo $row->noindex?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusrollup('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 
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
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Rollup</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namarollup">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Deskripsi Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsirollup">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanrollup()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Rollup</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="koderollup" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namarollup1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsirollup1">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updaterollup()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus Rollup</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="koderollup2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namarollup2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Rollup</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsirollup2">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deleterollup()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpanrollup(){
   xajax_simpanrollup(document.getElementById("namarollup").value,document.getElementById("deskripsirollup").value);
}

function editrollup(noindex){
  xajax_editrollup(noindex);
}

function hapusrollup(noindex){
  xajax_hapusrollup(noindex);
}

function updaterollup(){
  xajax_updaterollup(document.getElementById("koderollup").value,document.getElementById("namarollup1").value,document.getElementById("deskripsirollup1").value);
}

function deleterollup(){
  xajax_deleterollup(document.getElementById("koderollup2").value,document.getElementById("namarollup2").value,document.getElementById("deskripsirollup2").value);
}

$('#cari').on('input',function(e){
    xajax_carirollup(document.getElementById('cari').value);
});
</script>

