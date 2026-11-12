<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/masterska/cetakmasterska"?>'"><i class="icon-download"></i> Download XLS</a>
          <!-- <a class="btn purple" style='float:right; margin-right: 10px;' data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a> -->
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah SKA</a>
          <div class="input-prepend">
            <span class="add-on">Nama SKA</span>
            <input class="m-wrap medium" type="text" placeholder="Cari SKA" id="cari" name="cari" onchange="carimasterska();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr bgcolor="#245397">
          <th><font color="white">Kode</font></th>
          <th><font color="white">Nama SKA</font></th>
          <th><font color="white">Ijazah</font></th>
          <th><font color="white">Action</font></th>
        </tr>
        </thead>
        <tbody id='masterska'>
          <?php 
          foreach ($masterska as $row) { ?>
              <tr>
                  <td><?=$row->kodeska; ?></td>
                  <td><?=$row->namaska ?></td>
                  <td><?=$row->ijasah ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editmasterska('<?php echo $row->kodeska?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusmasterska('<?php echo $row->kodeska?>')"><i class="icon-trash"></i> Hapus</a> 
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
      <h4 class="modal-title"><i class='icon-add'></i> Tambah SKA</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kodeska">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Nama SKA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaska">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Ijazah</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="ijasah">
            </div>
          </div>
        </form>
      </div>
    </div>    

<!--     <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
              <label class="control-label">Nama Kelompok</label>
              <div class="controls">
                <select data-placeholder="Choose a Category" id='kelompok' tabindex="1">
                  <option value=''>Pilih Kelompok</option>
                  <?php foreach ($kelomjab as $row) {
                      echo "<option value='".$row->kodekelom."'>".$row->namakelompok."</option>";
                  } ?>
                </select>
              </div>
          </div>
        </form>
      </div>
    </div>     -->
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanmasterska()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit SKA</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodeska1" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama SKA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaska1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Ijazah</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="ijasah1">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatemasterska()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Anda yakin akan menghapus data ini?</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <!-- <label class="control-label">Kode</label> -->
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodeska2">
            </div>
          </div>
<!--           <div class="control-group">
            <label class="control-label">Nama SKA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaska1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Ijazah</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="ijasah1">
            </div>
          </div>           -->
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn red" href="#" onclick="deletemasterska()"><i class="icon-trash"></i> Ya</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Tidak</a>
    </div>
  </div>
</div>

<script type="application/javascript">

$(document).ready(function() {    
    $('#kodeska2').hide();
});

function simpanmasterska(){
  xajax_simpanmasterska(document.getElementById("kodeska").value,document.getElementById("namaska").value,document.getElementById("ijasah").value);
}

function editmasterska(kodeska){
  xajax_editmasterska(kodeska);
}

function hapusmasterska(kodeska){
  xajax_hapusmasterska(kodeska);
}

function updatemasterska(){
  xajax_updatemasterska(document.getElementById("kodeska1").value,document.getElementById("namaska1").value,document.getElementById("ijasah1").value);
}

function deletemasterska(){
  xajax_deletemasterska(document.getElementById("kodeska2").value);
}

$('#cari').on('input',function(e){
    xajax_carimasterska(document.getElementById('cari').value);
});
</script>


