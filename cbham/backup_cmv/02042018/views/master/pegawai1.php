<?php echo @$err; ?>
<div id='alert'></div>
<!-- <div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; "> -->
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <!-- Cari <input type="text" class="m-wrap span3" id="cari" onchange="caripegawai();" oninput="this.onchange();"> -->
        <div class="form-search fright">
          <a class="btn purple" style='float:right; margin-right: 10px;' data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah" onClick="tambahpegawai()"><i class="icon-plus"></i> Tambah Pegawai</a>
          <div class="input-prepend">
            <span class="add-on">NIK / Nama</span>
            <input class="m-wrap medium" type="text" placeholder="Cari NIK / Nama" id="cari" name="cari" onchange="caripegawai();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
          <thead>
          <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Unit</th>
            <th>Jabatan</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody id='pegawai'>
            <?php 
            foreach ($pegawai as $row) { ?>
                <tr>
                    <td><?=$row->nik; ?></td>
                    <td><?=$row->nama; ?></td>
                    <td><?=$row->namaunit ?></td>
                    <td><?=$row->namajabatan ?></td>
                    <td>
                        <a class="btn mini blue sbold" data-toggle="modal" href="#detail" onClick="detailpegawai('<?php echo $row->nik?>')"><i class="icon-eye-open"></i> Detail </a>
                        <a class="btn mini yellow sbold" data-toggle="modal" href="#tambah" onClick="editpegawai('<?php echo $row->nik?>')"><i class="icon-edit"></i> Edit </a>
                    </td>
                </tr>
            <?php }?>
        </table>
    
    <!-- <div class="row-fluid" style="margin-top: 10px;">
        <div class="span2" style="padding-top: 5px;">Total 4<?php //echo @$total; ?> Data</div>  
        <div class="span10" style="text-align: right;">
          <div id="paging_status" class="pagination" style="margin: 0px;">
            <div class="pagination" style="margin: 0px;">
              <ul>
                <?php echo @$paging; ?>
              </ul>
            </div>
          </div>
      </div>
    </div> -->

    <!-- <ul class="nav nav-pills">
          <li class="active">
              <a href="#tab_2_1" data-toggle="tab"> Home </a>
          </li>
          <li>
              <a href="#tab_2_2" data-toggle="tab"> Profile </a>
          </li>
                  <li class="dropdown">
                      <a href="javascript:;" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"> Dropdown
                          <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                          <li>
                              <a href="#tab_2_3" tabindex="-1" data-toggle="tab"> Option 1 </a>
                          </li>
                          <li>
                              <a href="#tab_2_4" tabindex="-1" data-toggle="tab"> Option 2 </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane fade active in" id="tab_2_1">
                      <p> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher
                          retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate
                          nisi qui. </p>
                  </div>
                  <div class="tab-pane fade" id="tab_2_2">
                      <p> Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                          craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                          helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art
                          party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park. </p>
                  </div>
              </div>
          </div>
      </div> -->

  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title" id='judul'><i class='icon-add'></i> Tambah Pegawai</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">NIK</label>
            <div class="controls">
              <input type="text" class="s-wrap span4" id="nik" placeholder="Number Only" onkeypress="return angkasaja(this, event);"> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="nama">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tgl Lahir</label>
            <div class="controls">
              <input type="text" class="s-wrap span4 date-picker" id="tgllahir">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tgl Masuk</label>
            <div class="controls">
              <input type="text" class="s-wrap span4 date-picker" id="tglmasuk">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Status</label>
            <div class="controls">
              <select id="status" class="s-wrap span4">
                <option value="">-- Pilih Status --</option>
                <option value="Tetap">Tetap</option>
                <option value="Kontrak">Kontrak</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Unit</label>
            <div class="controls">
              <select id="unit" class="s-wrap span6">
                <option value="">-- Pilih Unit --</option>
                <?php foreach ($unit as $row) {
                  echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Jabatan</label>
            <div class="controls">
              <select id="jabatan" class="s-wrap span8">
                <option value="">-- Pilih Jabatan --</option>
                <?php foreach ($jabatan as $row) {
                  echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                } ?>
              </select>  
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Pendidikan Terakhir</label>
            <div class="controls">
              <select id="pendidikan" class="s-wrap span4">
                <option value="">-- Pilih Pendidikan --</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA/SMK">SMA/SMK</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select> 
            </div>
          </div>   
          <div class="control-group">
            <label class="control-label">Role</label>
            <div class="controls">
              <select id="role" class="s-wrap span4">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
          </div> 
          <div class="control-group">
            <label class="control-label">Username</label>
            <div class="controls">
              <input type="text" class="s-wrap span4" id="username" placeholder="Username">
            </div>
          </div> 
          <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
              <input type="text" class="s-wrap span4" id="password" placeholder="Password">
              <span class="input-group-addon">
                  <i class="fa fa-user"></i>
              </span>
            </div>
          </div> 
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanpegawai()" id='simpan'><i class="icon-save"></i> Simpan</a>
        <a class="btn green" href="#" onclick="updatepegawai()" id='update'><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
$('#update').hide();

function tambahpegawai(){
  $('#simpan').show();
  $('#update').hide();
  $('#judul').html('Tambah Pegawai');
  $('#nik').attr('disabled',false);
  document.getElementById("nik").value='';
  document.getElementById("nama").value='';
  document.getElementById("tgllahir").value='';
  document.getElementById("tglmasuk").value='';
  document.getElementById("pendidikan").value='';
  document.getElementById("status").value='';
  document.getElementById("unit").value='';
  document.getElementById("jabatan").value='';
  document.getElementById("role").value='';
  document.getElementById("username").value='';
  document.getElementById("password").value='';
}

function simpanpegawai(){
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

