<?php echo @$err; ?>
<div id='alert'></div>
<!-- <div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; "> -->
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <!-- Cari <input type="text" class="m-wrap span3" id="cari" onchange="caripegawai();" oninput="this.onchange();"> -->
        <div class="form-search fright">
          <?php if (getSession('role')!='User') { ?>
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="" id="cetakxls"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah" onClick="tambahpegawai()"><i class="icon-plus"></i> Tambah Pegawai</a>
          <?php } ?>
          <div class="input-prepend" >
            <span class="add-on">NIK / Nama</span>
            <input class="m-wrap medium" type="text" placeholder="Cari NIK / Nama" id="cari" name="cari" onchange="caripegawai();" oninput="this.onchange();"/> 
          </div>
          &nbsp;&nbsp;&nbsp;
          <?php if (getSession('role')=='HCMM' or (getSession('role')=='Admin' and getSession('unit')=='1')) { ?>
            <div class="input-prepend">
              <span class="add-on">Unit</span>
              <input class="m-wrap medium" type="text" placeholder="Cari Unit" id="cariunit" name="cariunit" onchange="cariunit();" oninput="this.onchange();"/>                     
            </div>
            &nbsp;&nbsp;&nbsp;
          <?php }?>
          <?php if (getSession('role')!='User') { ?>
            <div class="input-prepend">
              <span class="add-on">Jabatan</span>
              <input class="m-wrap medium" type="text" placeholder="Cari Jabatan" id="carijabatan" name="carijabatan" onchange="carijabatan();" oninput="this.onchange();"/>                     
            </div>  
          <?php }?>        
        </div>
      </div>
        
      <table class="table table-bordered table-hover table-full-width" >
          <thead>
          <tr>
            <th>NIK </th>
            <th>Nama</th>
            <th>Unit</th>
            <th>Jabatan</th>
            <th>Tanggal Entry</th>
            <th>Tanggal Update</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody id='pegawai'>
            <?php 
            foreach ($pegawai as $row) { ?>
                <?php if ($row->complete=='0') { ?>
                  <tr bgcolor='#FFAAAA'>
                <?php } else { ?>
                  <tr>
                <?php } ?>
                    <td><?=$row->nik; ?></td>
                    <td><?=$row->nama; ?></td>
                    <td><?=$row->namaunit ?></td>
                    <td><?=$row->namajabatan ?></td>
                    <td><?=$row->created_at ?></td>
                    <td><?=$row->updated_at ?></td>
                    <td>
                        <a class="btn mini blue sbold" data-toggle="modal" href="#tambah" onClick="detailpegawai('<?php echo $row->id?>')"><i class="icon-eye-open"></i> Detail </a>
                        <?php if(getSession('role')!='User'){ ?>   
                        <a class="btn mini yellow sbold" data-toggle="modal" href="#tambah" onClick="editpegawai('<?php echo $row->id?>')"><i class="icon-edit"></i> Edit </a>
                        <a class="btn mini red sbold" data-toggle="modal" href="#" onClick="hapuspegawai('<?php echo $row->id?>')"><i class="icon-trash"></i> Hapus </a>    
                        <?php } ?>                   
                        <a class="btn mini purple sbold" target='_blank' href="<?php echo base_url().'index.php/pegawai/cetakcv/'.urlencode($row->id); ?>" ><i class='icon-print'></i> Cetak CV </a>                         
                    </td>
                </tr>
            <?php }?>
        </table>
        <div class="pagination pull-right" id="pagination"><?= $pagination ?></div>
  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="100%">
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
                <li id="l1" class="active"><a href="#tab_1" data-toggle="tab">Data Pegawai</a></li>
                <li id="l2"><a href="#tab_2" data-toggle="tab">Data Pegawai 2</a></li>
                <li id="l3"><a href="#tab_3" data-toggle="tab">Pendidikan</a></li>
                <li id="l4"><a href="#tab_4" data-toggle="tab">Rekening & Akun</a></li>
                <li id="l5"><a href="#tab_5" data-toggle="tab">Keluarga</a></li>
                <li id="l6"><a href="#tab_6" data-toggle="tab">User CBHAM</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal " id="form">
                  <div class="control-group">
                    <label class="control-label">NIK</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="nik" placeholder="Number Only" onkeypress="return angkasaja(this, event);"> 
                      <input type="hidden" id="nik2" onkeypress="return angkasaja(this, event);">
                      <input type="hidden" id="pegawai_id" onkeypress="return angkasaja(this, event);">
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
                    <label class="control-label">Unit / Satmingkal</label>
                    <div class="controls">
                      <select id="unit" class="s-wrap span8 selectpicker" onchange="getJabatan()" data-live-search="true">
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
                      <!-- <div class="ausu-suggest">
                        <input type="text" class="s-wrap span10" value="" name="namajabatan" id="namajabatan" autocomplete="off" />
                        <input type="text" class="s-wrap span2" value="" name="jabatan" id="jabatan" autocomplete="off" />*** Ketik kata kunci nama jabatan
                      </div> -->
                      <select id="jabatan" class="s-wrap span8 selectpicker" data-live-search="true">
                        <option value="">-- Pilih Jabatan --</option>
                        <?php foreach ($jabatan as $row) {
                          //echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                        } ?>
                      </select>
                    </div>
                  </div>                   
                  <div class="control-group">
                    <label class="control-label">Tempat / Tanggal Lahir</label>
                    <div class="controls">
                      <input type="text" placeholder="Tempat Lahir" class="s-wrap span4" id="tempatlahir">
                      <input type="text" placeholder="Tanggal Lahir. Contoh : 1990-01-01" class="s-wrap span3 date-picker" id="tgllahir"><span class="label label-default">Contoh : 1990-01-01</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tanggal Masuk</label>
                    <div class="controls">
                      <input type="text" placeholder="Tanggal Masuk. Contoh : 2000-01-01" class="s-wrap span3 date-picker" id="tglmasuk"><span class="label label-default">Contoh : 2000-01-01</span>
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
                  <!-- <div class="control-group">
                    <label class="control-label">Jabatan</label>
                    <div class="controls">
                      <select id="jabatan" class="s-wrap span8">
                        <option value="">-- Pilih Jabatan --</option>
                        <?php foreach ($jabatan as $row) {
                          echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                        } ?>
                      </select>  
                    </div>
                  </div> -->  
                  <!-- <div class="form-actions">
                    <a class="btn blue next" href="#" id='next1'><i class="icon-arrow-right"></i> Next</a>
                  </div>  -->                      
                </form>
              </div>

              <div class="tab-pane" id="tab_2">
                <form class="form-horizontal " id="form">

                  <div class="control-group">
                    <label class="control-label">Tanggal Mulai Kontrak</label>
                    <div class="controls">
                      <input type="text" placeholder="Contoh : 2000-01-01" class="s-wrap span2 date-picker" id="tglmulaikontrak" ><span class="label label-default">Contoh : 2000-01-01</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tanggal Selesai Kontrak</label>
                    <div class="controls">
                      <input type="text" placeholder="Contoh : 2000-01-01" class="s-wrap span2 date-picker" id="tglselesaikontrak" ><span class="label label-default">Contoh : 2000-01-01</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tanggal Pengangkatan</label>
                    <div class="controls">
                      <input type="text" placeholder="Contoh : 2000-01-01" class="s-wrap span2 date-picker" id="tglpengangkatan" ><span class="label label-default">Contoh : 2000-01-01</span>
                    </div>
                  </div>                  
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
                  <!-- <div class="form-actions">
                    <a class="btn blue next" href="#" id='next2'><i class="icon-arrow-right"></i> Next</a>
                  </div>  -->                   
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
                        <?php for ($i=(date('Y')-50); $i < (date('Y')+1) ; $i++) { ?>
                          <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php }?> 
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tempat Belajar</label>
                    <div class="controls">
                      <label class="radio">
                        <input type="radio" name="tempat" id='dalamnegeri' value="Dalam Negeri" />
                        Dalam Negeri
                      </label>
                      <label class="radio">
                        <input type="radio" name="tempat" id='luarnegeri' value="Luar Negeri" />
                        Luar Negeri
                      </label>   
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Nomor Ijazah</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="ijazah">
                      <a class="btn green" href="#" onclick="tambahpendidikan()" id='tambahpendidikan'><i class="icon-plus"></i> Tambah Pendidikan</a>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover table-full-width" >
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Pendidikan</th>
                      <th>Nama Sekolah/Univ</th>
                      <th>Jurusan</th>
                      <th>Tahun Lulus</th>
                      <th>Tempat Belajar</th>
                      <th>Ijazah</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id='datapendidikan'>
                    </tbody>
                  </table>
                  <!-- <div class="form-actions">
                    <a class="btn blue next" href="#" id='next3'><i class="icon-arrow-right"></i> Next</a>
                  </div> -->
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
                    <label class="control-label">Nama Bank</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span6" id="namabank">
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
                 <!--  <div class="form-actions">
                    <a class="btn blue next" href="#" id='next4'><i class="icon-arrow-right"></i> Next</a>
                  </div> -->
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
                        <option value="Kakak">Kakak</option>
                         <option value="Adik">Adik</option>
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
                      <input type="text" class="s-wrap span3 date-picker" placeholder="Contoh : 1990-01-01" id="tgllahirkeluarga"><span class="label label-default">Contoh : 1990-01-01</span>
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
                      <a class="btn green" href="#" onclick="tambahkeluarga()" id='tambahkeluarga'><i class="icon-plus"></i> Tambah Keluarga</a>
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
                  <!-- <div class="form-actions">
                    <a class="btn blue next" href="#" id='next5'><i class="icon-arrow-right"></i> Next</a>
                  </div> -->
                </form>
              </div>
              <div class="tab-pane" id="tab_6">
                <form class="form-horizontal " id="form">

<?php 
   if(getSession('role')=='HCMM' or getSession('role')=='Admin'){
?>                   
                  <div class="control-group">
                    <label class="control-label">Role</label>
                    <div class="controls">
                      <select id="role" class="s-wrap span4">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
			                  <option value="Admin Unit">Admin Unit</option>
                        <option value="HCMM">HCMM</option>
                      </select>
                    </div>
                  </div> 
<?php
}else{
?>   
                  <div class="control-group">
                    <label class="control-label">Role</label>
                    <div class="controls">
                      <select id="role" class="s-wrap span4">
                        <option value="User">User</option>
                      </select>
                    </div>
                  </div> 
<?php
}
?>                  
                  <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="username" placeholder="Username">
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password" class="s-wrap span4" id="password" placeholder="Kosongkan jika tidak mengganti password">
                      <span class="input-group-addon">
                          <i class="fa fa-user"></i>
                      </span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Ulang Password</label>
                    <div class="controls">
                      <input type="password" class="s-wrap span4" id="ulangpassword" placeholder="Kosongkan jika tidak mengganti password">
                      <span class="input-group-addon">
                          <i class="fa fa-user"></i>
                      </span>
                    </div>
                  </div>
<?php
// }else{
?>
<!--                   <div class="control-group">
                    <label class="control-label">Role</label>
                    <div class="controls">
                      <select id="role" class="s-wrap span4" disabled="false">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                        <option value="HCMM">HCMM</option>
                      </select>
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="username" placeholder="Username" disabled="false">
                    </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="text" class="s-wrap span4" id="password" placeholder="Password" disabled="false">
                      <span class="input-group-addon">
                          <i class="fa fa-user"></i>
                      </span>
                    </div>
                  </div> -->
<?php
// }
?>

                  <div class="form-actions">
                    <!-- <a class="btn blue next" href="#" id='next6'><i class="icon-arrow-left"></i> Back</a> -->
                    <a class="btn green" href="#" onclick="simpanpegawai()" id='simpan'><i class="icon-save"></i> Simpan</a>
                    <a class="btn green" href="#" onclick="updatepegawai()" id='update'><i class="icon-edit"></i> Update</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="modal-footer"> -->
      
      <!-- <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a> -->
    <!-- </div> -->
  </div>
</div>

<script type="application/javascript">
$('#update').hide();

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {
    $('#jabatan').attr('disabled',true);
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
              scroll:true,
            dataFile: '<?=base_url().'index.php/pegawai/jabatanList'?>'
    });   

    $('#cetakxls').click(function(){
      var role = "<?php echo getSession('role');?>";
      if (role=='Admin') {
        location.href='<?=base_url()."index.php/pegawai/cetakpegawai/'+encodeURI(document.getElementById('cari').value+'|'+'|'+document.getElementById('carijabatan').value)+'"?>';
      };
      if (role=='Admin Unit') {
        location.href='<?=base_url()."index.php/pegawai/cetakpegawai/'+encodeURI(document.getElementById('cari').value+'|'+".getSession('unit')."+'|'+document.getElementById('carijabatan').value)+'"?>';
      };
    }); 
});

function tambahpegawai(){
  // document.getElementById('luarnegeri').checked = true;
  // $("input:radio[name=tempat]").val('Luar Negeri');
  $("input[name=tempat][value='Luar Negeri']").attr('checked','checked');
  $('#simpan').show();
  $('#update').hide();
  $('#judul').html('Tambah Pegawai');
  $('#nik').attr('disabled',false);
  $("input[type='text']").val('');
  $('select').val('');
  $("input[type='text']").prop("disabled", false);
  $('select').prop("disabled", false);
  $('.selectpicker').selectpicker('refresh');
  $("input[type='radio']").prop("disabled", false);
  document.getElementById('keluarga').innerHTML='';
  document.getElementById('statusbpjskt').value='0';
  document.getElementById('statusbpjskes').value='0';
  document.getElementById('statusppip').value='0';
  document.getElementById('statusppukp').value='0';
  document.getElementById('statusjiwasraya').value='0';
  document.getElementById('statusjkdk').value='0';
  document.getElementById('role').value='User';
  // if(getSession('role')=='HCMM'){
    // $('#role').attr('disabled',true);
    // $('#username').attr('disabled',true);
    // $('#password').attr('disabled',true);
  // }else{
  //   $('#role').attr('disabled',false);
  //   $('#username').attr('disabled',false);
  //   $('#password').attr('disabled',false);    
  // }
  // document.getElementById("nik").value='';
  // document.getElementById("nama").value='';
  // document.getElementById("tgllahir").value='';
  // document.getElementById("tglmasuk").value='';
  // document.getElementById("pendidikan").value='';
  // document.getElementById("status").value='';
  // document.getElementById("unit").value='';
  // document.getElementById("jabatan").value='';
  // document.getElementById("role").value='';
  // document.getElementById("username").value='';
  // document.getElementById("password").value='';
}

function simpanpegawai(){
  var password = document.getElementById("password") , confirm_password = document.getElementById("ulangpassword");
  if (password.value == '') {
    password.setCustomValidity("Passwords tidak boleh kosong");
    password.reportValidity();
  } else if (password.value !== confirm_password.value) {
    confirm_password.setCustomValidity("Passwords tidak sama");
    confirm_password.reportValidity();
  } else {
    password.setCustomValidity('');
    confirm_password.setCustomValidity('');
      xajax_simpanpegawai(
                      document.getElementById("nik").value, // begin tab1
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
                      $("input[name='tempat']:checked").val(),
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
                      document.getElementById("password").value,
                      document.getElementById("grade").value,
                      document.getElementById("tglmulaikontrak").value,
                      document.getElementById("tglselesaikontrak").value,
                      document.getElementById("tglpengangkatan").value,
                      document.getElementById("namabank").value,
                      document.getElementById("struktural").value );
  }
}

function editpegawai(id){
  xajax_editpegawai(id);
  $("input[type='text']").val('');
  $('select').val('');
  $("input[type='text']").prop("disabled", false);
  $('select').prop("disabled", false);
  $('.selectpicker').selectpicker('refresh');
  $("input[id='cari']").prop("disabled", false);
  $("input[type='radio']").prop("disabled", false);
}

function updatepegawai(){
  var password = document.getElementById("password") , confirm_password = document.getElementById("ulangpassword");
  if (password.value !== confirm_password.value) {
      confirm_password.setCustomValidity("Passwords tidak sama");
      confirm_password.reportValidity();
  } else {
      confirm_password.setCustomValidity('');
    xajax_updatepegawai(document.getElementById("nik").value, // begin tab1
                      document.getElementById("nik2").value,
                      document.getElementById("pegawai_id").value,
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
                      $("input[name='tempat']:checked").val(),
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
                      document.getElementById("password").value,
                      document.getElementById("grade").value,
                      document.getElementById("tglmulaikontrak").value,
                      document.getElementById("tglselesaikontrak").value,
                      document.getElementById("tglpengangkatan").value,
                      document.getElementById("namabank").value,                      
                      document.getElementById("struktural").value );
  }
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

function tambahpendidikan(){
  xajax_tambahpendidikan(document.getElementById("nik").value,
                        document.getElementById("pendidikan").value, // begin tab3
                        document.getElementById("namauniv").value,
                        document.getElementById("prodi").value,
                        document.getElementById("lulus").value, 
                        $("input[name='tempat']:checked").val(),
                        document.getElementById("ijazah").value );
}

function hapuspendidikan(nik,no){
  xajax_hapuspendidikan(nik,no);
}

function detailpegawai(id){
  xajax_detailpegawai(id);
  // $("#luarnegeri").attr('checked','checked');
}

function hapuspegawai(id){
  swal({
    title: "Anda Yakin?",
    text: "Setelah dihapus data tidak bisa dikembalikan lagi",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      xajax_hapuspegawai(id);
    } else {

    }
  });
}

/*$('#cari').on('input',function(e){
    xajax_caripegawai(document.getElementById('cari').value,1);
});*/

$('#carijabatan').on('change',function(e){
    xajax_carijabatan(document.getElementById('carijabatan').value,1);
});

$('#cariunit').on('change',function(e){
    xajax_cariunit(document.getElementById('cariunit').value,1);
});

$('#cari').on('change',function(e){
    xajax_caripegawai(document.getElementById('cari').value,1);
});

function changepage(el){
  var page = $( el ).data('page');
  xajax_caripegawai(document.getElementById('cari').value,page);
}

// $('.next').click(function(event){
//   var idbut = event.target.id; 
//   var num = idbut.substr(idbut.length-1);
//   if (num==6) {
//     var numn = num-1;
//   } else {
//     var numn = num+1;
//   }
//   $('#l2').addClass('active');
//   $('#l1').removeClass('active');
//   $('#tab_2').addClass('active');
//   $('#tab_1').removeClass('active');
// });

function getJabatan(){
  xajax_getJabatan(document.getElementById("unit").value);
}

function kosong(){
  $("input[type='text']").val('');
  $('select').val('');
  $('select').prop("disabled", false);
  $('.selectpicker').selectpicker('refresh');
}

function aktif() {
  $('select').prop("disabled", false);
  $('.selectpicker').selectpicker('refresh');
}

function inaktif(){
  $("input[type='text']").prop("disabled", true);
  $("input[type='radio']").prop("disabled", true);
  $('select').prop("disabled", true);
  $("#cari").prop("disabled", false);
  $('.selectpicker').selectpicker('refresh');
}
</script>

