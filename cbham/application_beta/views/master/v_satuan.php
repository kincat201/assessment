<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <!-- <input type="button" value="Cetak.." onClick="location.href='<?=base_url()."index.php/plant/cetakfinish"?>'"> -->
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/satuan/cetaksatuan"?>'"><i class="icon-download"></i> Download XLS</a>
          <!-- <a style='float:right; margin-right: 10px;' class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a> -->
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Satuan</a>
          <div class="input-prepend">
            <span class="add-on">Satuan</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Satuan" id="cari" name="cari" onchange="carisatuan();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Satuan</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='satuan'>
          <?php 
          foreach ($satuan as $row) { ?>
              <tr>
                  <td><?=$row->noindex; ?></td>
                  <td><?=$row->satuan ?></td>
                  <td><?=$row->deskripsi ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editsatuan('<?php echo $row->noindex?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapussatuan('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 

<!--                       <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editsatuan("<?php echo $row->noindex?>")"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapussatuan("<?php echo $row->noindex?>")"><i class="icon-trash"></i> Hapus</a>  -->
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
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Satuan</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namasatuan">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Deskripsi Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsisatuan">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpansatuan()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Satuan</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodesatuan" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namasatuan1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsisatuan1">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatesatuan()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus Satuan</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodesatuan2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namasatuan2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Satuan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsisatuan2">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deletesatuan()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpansatuan(){
   xajax_simpansatuan(document.getElementById("namasatuan").value,document.getElementById("deskripsisatuan").value);
}

function editsatuan(noindex){
  xajax_editsatuan(noindex);
}

function hapussatuan(noindex){
  xajax_hapussatuan(noindex);
}

function updatesatuan(){
  xajax_updatesatuan(document.getElementById("kodesatuan").value,document.getElementById("namasatuan1").value,document.getElementById("deskripsisatuan1").value);
}

function deletesatuan(){
  xajax_deletesatuan(document.getElementById("kodesatuan2").value,document.getElementById("namasatuan2").value,document.getElementById("deskripsisatuan2").value);
}

$('#cari').on('input',function(e){
    xajax_carisatuan(document.getElementById('cari').value);
});
</script>

