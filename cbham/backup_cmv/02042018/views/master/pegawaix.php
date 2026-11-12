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

<div id="tambah" class="modal fade" tabindex="-1" data-width="70%">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title" id='judul'><i class='icon-add'></i> Tambah Pegawai</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <div class='row-fluid'>
          <div class="tabbable tabbable-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Data Pegawai</a></li>
                <li><a href="#tab_2" data-toggle="tab">Data Pegawai 2</a></li>
                <li><a href="#tab_3" data-toggle="tab">Pendidikan</a></li>
                <li><a href="#tab_4" data-toggle="tab">Rekening & Akun</a></li>
                <li><a href="#tab_5" data-toggle="tab">Keluarga</a></li>
                <li><a href="#tab_6" data-toggle="tab">User CBHAM</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal " id="form">
                  <div class="control-group">
                    <label class="control-label">NIK</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="nik" placeholder="Number Only" onkeypress="return angkasaja(this, event);"> 
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">No KTP</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="ktp" placeholder="Number Only" onkeypress="return angkasaja(this, event);"> 
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">No KK</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="kk" placeholder="Number Only" onkeypress="return angkasaja(this, event);"> 
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Nama</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span8" id="nama">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Gelar Depan</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="gelardepan">
                      Gelar Belakang
                      <input type="text" class="s-wrap span4" id="gelarbelakang">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tempat / Tanggal Lahir</label>
                    <div class="controls">
                      <input type="text" placeholder="Tempat Lahir" class="s-wrap span4" id="tempatlahir">
                      <input type="text" placeholder="Tanggal Lahir" class="s-wrap span4 date-picker" id="tgllahir">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tanggal Masuk</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4 date-picker" id="tglmasuk">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Status Kepegawaian</label>
                    <div class="controls">
                      <select id="status" class="s-wrap span4">
                        <option value="">-- Pilih Status --</option>
                        <option value="Tetap">Tetap</option>
                        <option value="Kontrak">Kontrak</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Unit / Satmingkal</label>
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
                    <label class="control-label">Grade</label>
                    <div class="controls">
                      <select id="grade" class="s-wrap span2">
                        <option value="">Pilih Grade</option>
                        <?php foreach ($grade as $row) {
                          echo "<option value=".$row->grade.">".$row->grade."</option>";
                        } ?>
                      </select> 
                      <select id="struktural" class="s-wrap span3">
                        <option value="">Pilih Jenis Jabatan</option>
                        <option value="Struktural">Struktural</option>
                        <option value="Fungsional">Fungsional</option>
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
                </form>
              </div>
              <div class="tab-pane" id="tab_2">
                <form class="form-horizontal " id="form">
                  <div class="control-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <div class="controls">
                      <select id="jk" class="s-wrap span4">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Golongan Darah</label>
                    <div class="controls">
                      <select id="darah" class="s-wrap span4">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Status Keluarga</label>
                    <div class="controls">
                      <select id="statuskeluarga" class="s-wrap span4">
                        <option value="K">Nikah</option>
                        <option value="B">Belum Nikah</option>
                        <option value="D">Duda</option>
                        <option value="J">Janda</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Agama</label>
                    <div class="controls">
                      <select id="agama" class="s-wrap span4">
                        <option value="Islam">Islam</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kristen">Kristen</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Alamat</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span12" id="alamat">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Kota / Kode Pos</label>
                    <div class="controls">
                      <input type="text" placeholder="Kota" class="s-wrap span4" id="kota">
                      <input type="text" placeholder="Kode Pos" class="s-wrap span4" id="kodepos">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Telepon / HP</label>
                    <div class="controls">
                      <input type="text" placeholder="Telepon" class="s-wrap span4" id="telepon">
                      <input type="text" placeholder="HP" class="s-wrap span4" id="hp">
                    </div>
                  </div>                    
                </form>
              </div>
              <div class="tab-pane" id="tab_3">
                <form class="form-horizontal " id="form">
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
                    <label class="control-label">Nama Sekolah / Univ</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span8" id="namauniv">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Jurusan / Program Studi</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span8" id="prodi">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tahun Lulus</label>
                    <div class="controls">
                      <select id="lulus" class="s-wrap span4">
                        <?php for ($i=(date('Y')-30); $i < (date('Y')+1) ; $i++) { ?>
                          <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php }?> 
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tempat Belajar</label>
                    <div class="controls">
                      <label class="radio">
                      <input type="radio" name="tempat" value="Dalam Negeri" checked/>
                      Dalam Negeri
                      </label>
                      <label class="radio">
                      <input type="radio" name="tempat" value="Luar Negeri" />
                      Luar Negeri
                      </label>   
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Nomor Ijazah</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="ijazah">
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="tab_4">
                <form class="form-horizontal " id="form">
                  <div class="control-group">
                    <label class="control-label">Nomor Rekening Bank</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span6" id="rekening">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Nomor NPWP</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span6" id="npwp">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">BPJS Ketenagakerjaan</label>
                    <div class="controls">
                      <select id="statusbpjskt" class="s-wrap span3">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                      </select>
                       Nomor 
                      <input type="text" class="s-wrap span6" id="bpjskt">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">BPJS Kesehatan</label>
                    <div class="controls">
                      <select id="statusbpjskes" class="s-wrap span3">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                      </select>
                       Nomor 
                      <input type="text" class="s-wrap span6" id="bpjskes">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">DPLK PPIP</label>
                    <div class="controls">
                      <select id="statusppip" class="s-wrap span3">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                      </select>
                       Nomor 
                      <input type="text" class="s-wrap span6" id="ppip">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">DPLK PPUKP</label>
                    <div class="controls">
                      <select id="statusppukp" class="s-wrap span3">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                      </select>
                       Nomor 
                      <input type="text" class="s-wrap span6" id="ppukp">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Kepesertaan Jiwasraya</label>
                    <div class="controls">
                      <select id="statusjiwasraya" class="s-wrap span3">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                      </select>
                       Nomor 
                      <input type="text" class="s-wrap span6" id="jiwasraya">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Kepesertaan JKDK</label>
                    <div class="controls">
                      <select id="statusjkdk" class="s-wrap span3">
                        <option value="0">Belum</option>
                        <option value="1">Sudah</option>
                      </select>
                       Nomor 
                      <input type="text" class="s-wrap span6" id="jkdk">
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="tab_5">
                <form class="form-horizontal " id="form">
                  <div class="control-group">
                    <label class="control-label">Nama</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span6" id="namakeluarga">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Hubungan</label>
                    <div class="controls">
                      <select id="hubungan" class="s-wrap span4">
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Istri/Suami">Istri/Suami</option>
                        <option value="Anak">Anak</option>
                        <option value="Ibu">Kakak</option>
                         <option value="Ibu">Adik</option>
                      </select>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Pekerjaan</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span6" id="pekerjaan" >
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4 date-picker" id="tgllahirkeluarga">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <div class="controls">
                      <select id="jkkeluarga" class="s-wrap span4">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Kondisi</label>
                    <div class="controls">
                      <select id="kondisi" class="s-wrap span4">
                        <option value="Masih Hidup">Masih Hidup</option>
                        <option value="Almarhum">Almarhum</option>
                      </select>
                      <a class="btn green" href="#" onclick="tambahkeluarga()" id='tambah'><i class="icon-plus"></i> Tambah Keluarga</a>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover table-full-width" >
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Hub</th>
                      <th>Pekerjaan</th>
                      <th>Tgl Lahir</th>
                      <th>JK</th>
                      <th>Kondisi</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id='keluarga'>
                    </tbody>
                  </table>
                </form>
              </div>
              <div class="tab-pane" id="tab_6">
                <form class="form-horizontal " id="form">
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
                  <div class="form-actions">
                    <a class="btn green" href="#" onclick="simpanpegawai()" id='simpan'><i class="icon-save"></i> Simpan</a>
                    <a class="btn green" href="#" onclick="updatepegawai()" id='update'><i class="icon-save"></i> Update</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="modal-footer">
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
  xajax_simpanpegawai(document.getElementById("nik").value, // begin tab1
                      document.getElementById("ktp").value,
                      document.getElementById("kk").value,
                      document.getElementById("nama").value,
                      document.getElementById("gelardepan").value,
                      document.getElementById("gelarbelakang").value,
                      document.getElementById("tempatlahir").value,
                      document.getElementById("tgllahir").value,
                      document.getElementById("tglmasuk").value,
                      document.getElementById("status").value,
                      document.getElementById("unit").value,
                      document.getElementById("jabatan").value, //end of tab1
                      document.getElementById("jk").value, // begin tab2
                      document.getElementById("darah").value, 
                      document.getElementById("statuskeluarga").value,
                      document.getElementById("agama").value,
                      document.getElementById("alamat").value, 
                      document.getElementById("kota").value,
                      document.getElementById("kodepos").value, 
                      document.getElementById("telepon").value, 
                      document.getElementById("hp").value, // end tab2
                      document.getElementById("pendidikan").value, // begin tab3
                      document.getElementById("namauniv").value,
                      document.getElementById("prodi").value,
                      document.getElementById("lulus").value, 
                      document.getElementById("tempat").value,
                      document.getElementById("ijazah").value, // end tab3
                      document.getElementById("rekening").value, // begin tab4
                      document.getElementById("npwp").value,
                      document.getElementById("statusbpjskt").value,
                      document.getElementById("bpjskt").value,
                      document.getElementById("statusbpjskes").value,
                      document.getElementById("bpjskes").value,
                      document.getElementById("statusppip").value,
                      document.getElementById("ppip").value,
                      document.getElementById("statusppukp").value,
                      document.getElementById("ppukp").value,
                      document.getElementById("statusjiwasraya").value,
                      document.getElementById("jiwasraya").value,
                      document.getElementById("statusjkdk").value,
                      document.getElementById("jkdk").value, //end of tab4
                      document.getElementById("role").value, //begin tab6
                      document.getElementById("username").value,
                      document.getElementById("password").value );
}

function editpegawai(nik){
  xajax_editpegawai(nik);
}

function updatepegawai(){
  xajax_updatepegawai(document.getElementById("nik").value, // begin tab1
                      document.getElementById("ktp").value,
                      document.getElementById("kk").value,
                      document.getElementById("nama").value,
                      document.getElementById("gelardepan").value,
                      document.getElementById("gelarbelakang").value,
                      document.getElementById("tempatlahir").value,
                      document.getElementById("tgllahir").value,
                      document.getElementById("tglmasuk").value,
                      document.getElementById("pendidikan").value,
                      document.getElementById("status").value,
                      document.getElementById("unit").value,
                      document.getElementById("jabatan").value, //end of tab1
                      document.getElementById("pendidikan").value, // begin tab2
                      document.getElementById("namauniv").value,
                      document.getElementById("prodi").value,
                      document.getElementById("lulus").value, 
                      document.getElementById("tempat").value,
                      document.getElementById("ijazah").value, // end tab2
                      document.getElementById("rekening").value, // begin tab3
                      document.getElementById("npwp").value,
                      document.getElementById("statusbpjskt").value,
                      document.getElementById("bpjskt").value,
                      document.getElementById("statusbpjskes").value,
                      document.getElementById("bpjskes").value,
                      document.getElementById("statusppip").value,
                      document.getElementById("ppip").value,
                      document.getElementById("statusppukp").value,
                      document.getElementById("ppukp").value,
                      document.getElementById("statusjiwasraya").value,
                      document.getElementById("jiwasraya").value,
                      document.getElementById("statusjkdk").value,
                      document.getElementById("jkdk").value, //end of tab3
                      document.getElementById("role").value, //begin tab5
                      document.getElementById("username").value,
                      document.getElementById("password").value );
}

function tambahkeluarga(){
  xajax_tambahkeluarga(document.getElementById("nik").value,
                      document.getElementById("namakeluarga").value,
                      document.getElementById("hubungan").value,
                      document.getElementById("pekerjaan").value,
                      document.getElementById("tgllahirkeluarga").value,
                      document.getElementById("jkkeluarga").value,
                      document.getElementById("kondisi").value);
}

function hapuskeluarga(nik,no){
  xajax_hapuskeluarga(nik,no);
}

$('#cari').on('input',function(e){
    xajax_caripegawai(document.getElementById('cari').value);
});
</script>

