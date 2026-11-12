<?php echo @$err; ?>
<div id='alert'></div>

<div class="row-fluid">    
  <div class="span12">
    <div class='row-fluid'>
      <div class="tabbable tabbable-custom">
        <ul class="nav nav-tabs">
          <li class="active">
              <a href="#tabknowhow" data-toggle="tab">Knowhow</a>
          </li>
          <li>
              <a href="#tabreport" data-toggle="tab"> Report </a>
          </li>
        </ul>
          <div class="tab-content" style="min-height: 325px;">
            <div class="tab-pane fade active in" id="tabknowhow">
              <div class="row-fluid">
                <div class="span12">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">Jabatan</label>
                      <div class="controls">
                        <select id="kojab" class="s-wrap span8 selectpicker" data-live-search="true">
                          <option value="">-- Pilih Jabatan --</option>
                          <?php foreach ($jabatan as $row) {
                            echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                          } ?>
                        </select>
                        <a class="btn blue" href="#" onclick="caristdknowhow()"><i class="icon-search"></i> Cari</a>
                      </div>
                    </div>                            
                  </form>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span4">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">FE</label>
                      <div class="controls">
                        <select id="fe" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan pendidikan formal minimal yang harus dimiliki setiap pemegang pekerjaan tertentu sesuai disiplinnya" data-original-title="Formal Education">?</button>
                      </div>
                    </div>   
                    <div class="control-group">
                      <label class="control-label">IE</label>
                      <div class="controls">
                        <select id="ie" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan pelatihan dasar dan tambahan yang harus dimiliki untuk meningkatkan wawasan dan kemampuan teknis dalam melaksanakan pekerjaan sesuai disiplinnya" data-original-title="Informal Education">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">EX</label>
                      <div class="controls">
                        <select id="ex" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan masa pembinaan dan pengembangan rata-rata yang harus dijalankan pada suatu jenjang tertentu, agar yang bersangkutan memiliki cukup waktu untuk menunjukkan kompetensinya dalam menjalankan pekerjaan pada jenjang tersebut dan sudah bisa dipersiapkan untuk jenjang di atasnya" data-original-title="Experience">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">BS</label>
                      <div class="controls">
                        <select id="bs" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk mendukung pemahaman dan pengembangan terhadap pekerjaan yang dilaksanakan dan bisnis Perusahaan" data-original-title="Business Skill">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-MKT</label>
                      <div class="controls">
                        <select id="tsmkt" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami sistem/prosedur (SOP) Marketing,komunikasi dengan pelanggan,menangani dan mengkoordinir proses tender dalam hubungan antara internal perusahaan dan calon klien" data-original-title="Technical Skill – Marketing">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS–EST</label>
                      <div class="controls">
                        <select id="tsest" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami lingkup proyek, dokumen tender, perencanaan dan pengelolaan aktifitas estimasi, perhitungan estimasi dan penyusunan dokumen estimasi / tender" data-original-title="Technical Skill – Estimation">?</button>
                      </div>
                    </div>                          
                    <div class="control-group">
                      <label class="control-label">TS–PPC</label>
                      <div class="controls">
                        <select id="tsppc" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami, menyusun, mengendalikan dan melakukan pembinaan terhadap perencanaan dan realisasi pelaksanaan proyek, perencanaan dan realisasi kinerja proyek, menyusun laporan perencanaan dan realisasi pelaksanaan dan kinerja proyek-proyek, serta menetapkan tindakan penyempurnaan nya" data-original-title="Technical Skill – Planning & Control">?</button>
                      </div>
                    </div>                           
                    <div class="control-group">
                      <label class="control-label">TS-CON</label>
                      <div class="controls">
                        <select id="tscon" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami seluruh sistem (SOP) pelaksanaan proyek konstruksi,membuat konsep metode konstruksi dan mengaplikasikannya,memahami lingkup proyek dan tahapan pelaksanaan proyek" data-original-title="Technical Skill – Construction">?</button>
                      </div>
                    </div>                                                                                                  
                    <div class="control-group">
                      <label class="control-label">TS–QAC</label>
                      <div class="controls">
                        <select id="tsqac" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami system/prosedur (SOP), instruksi kerja (WI), Vendor manual, Peraturan Pemerintah, standard, code, spesifikasi teknis, formula, gambar, dan standar inspeksi & pengujian untuk material, proses dan produk" data-original-title="Technical Skill - QA/QC">?</button>
                      </div>
                    </div> 
                  </form>
                </div>

                <div class="span4">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">TS-MAN</label>
                      <div class="controls">
                        <select id="tsman" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami system / prosedur (SOP) maintenance,mengatur dan menjamin pelaksanaan aktifitas pemeliharaan sesuai dengan rencana pemeliharaan, rekomendasi manual dan kharakteristik mesin / peralatan" data-original-title="Technical Skill – Maintenance – Elektrikal, Instrument,IT, Mekanikal, Utility">?</button>
                      </div>
                    </div>                          
                    <div class="control-group">
                      <label class="control-label">TS-SAR</label>
                      <div class="controls">
                        <select id="tssar" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami system / prosedur (SOP) operasi, pemeliharaan dan perbaikan sarana angkutan,• Mampu mengatur dan menjamin pelaksanaan aktifitas operasi sarana angkutan, pemeliharaan sesuai dengan rencana pemeliharaan, rekomendasi manual dan kharakteristik mesin / peralatan" data-original-title="Technical Skill – Sarana Angkutan">?</button>
                      </div>
                    </div>   
                    <div class="control-group">
                      <label class="control-label">TS-CS</label>
                      <div class="controls">
                        <select id="tscs" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami Prosedur Sekretaris Perusahaan, Mampu melaksanakan kegiatan Sekretaris Perusahaan yang sudah ditetapkan" data-original-title="Technical Skill – Coorporate Secretary">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-PENG</label>
                      <div class="controls">
                        <select id="tspeng" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami sistem/prosedur (SOP) pengadaan dan dokumen pengadaan" data-original-title="Technical Skill – Pengadaan">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS–FAT</label>
                      <div class="controls">
                        <select id="tsfat" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami sistem/prosedur (SOP) anggaran, cashflow, perbankan" data-original-title="Technical Skill - Finance, Accounting and Tax">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS–HSE</label>
                      <div class="controls">
                        <select id="tshse" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami system (SOP) HSE, Peraturan Perundangan dan Standar HSE" data-original-title="Technical Skill – HEALTH SAFETY & ENVIRONMENT/OHSAS/K3">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS–HRD</label>
                      <div class="controls">
                        <select id="tshrd" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami sistem/prosedur (SOP) rekruitmen dan seleksi, peraturan tenaga kerja,pengembangan dan pelatihan,hubungan ketenagakerjaan,remunerasi, kompensasi dan benefit" data-original-title="Technical Skill – HRD">?</button>
                      </div>
                    </div>                          
                    <div class="control-group">
                      <label class="control-label">TS–GA</label>
                      <div class="controls">
                        <select id="tsga" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami aspek-aspek hubungan Perusahaan dengan masyarakat Sekitar dan instansi terkait, serta saluran komunikasinya,melaksanakan kegiatan Umum sesuai yang ditetapkan" data-original-title="Technical Skill – GENERAL AFFAIRS">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-MD</label>
                      <div class="controls">
                        <select id="tsmd" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami, memelihara, menyusun, serta terus menyempurnakan system manajement sesuai dengan Visi, Misi, Policy, Objective, Business plan, Company Value, lingkup aktifitas Perusahaan, serta seluruh kebutuhan stakeholder" data-original-title="Technical Skill – Manajement Development">?</button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="span4">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">TS-MR</label>
                      <div class="controls">
                        <select id="tsmr" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk menjamin kecukupan, penerapan, pemeliharaan dan penyempurnaan terus menerus system manajement sesuai dengan Visi, Misi, Policy, Objective, Business plan, Nilai-nilai Perusahaan, lingkup aktifitas Perusahaan, peraturan perundangan, serta seluruh kebutuhan stakeholder. Menjamin kinerja penerapan system manajemen dan kinerja Perusahaan, serta peningkatan pentingnya kepuasan pelanggan di seluruh Perusahaan" data-original-title="Technical Skill – Manajemen Representative">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-ENG-MECH</label>
                      <div class="controls">
                        <select id="tsengmech" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami General, Mechanical Piping, Static, Rotating, Package, HVAC/Plumbing" data-original-title="Technical Skill – Engineering – Mechanical">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-ENG-ELEC</label>
                      <div class="controls">
                        <select id="tsengelec" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk memahami system (SOP) Engineering,membaca dan menterjemahkan detail design drawing,menguraikan dan mengidentifikasi kebutuhan detail design dari basic design" data-original-title="Technical Skill – Engineering – Electrical">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-ENG-INST</label>
                      <div class="controls">
                        <select id="tsenginst" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan kemampuan untuk memahami system (SOP) Engineering,membaca dan menterjemahkan detail design drawing,menguraikan dan mengidentifikasi kebutuhan detail design dari basic design,menyusun material requisition (spesifikasi, quantity, persyaratan inspeksi & sertifikasi dan persyaratan HSE, dll)" data-original-title="Technical Skill – Engineering –Instrumentation">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-ENG-CIV</label>
                      <div class="controls">
                        <select id="tsengciv" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan kemampuan untuk memahami system (SOP) Engineering,membaca dan menterjemahkan detail design drawing,melaksanakan site survey, mengerti penjabaran soil investigation untuk memulai perhitungan civil dan structure,menyusun material requisition (spesifikasi, quantity, persyaratan inspeksi & sertifikasi dan persyaratan HSE, dll)" data-original-title="Technical Skill – Engineering – Civil Structure">?</button>
                      </div>
                    </div>                                                                                                   
                    <div class="control-group">
                      <label class="control-label">TS-SD</label>
                      <div class="controls">
                        <select id="tssd" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan kemampuan untuk memahami standar aplikasi software dan Operating system, serta pengoperasiannya,sistem jaringan & peralatan pendukungnya yang ada serta pelaksanaan maintenannya,mengimplementasikan dan mengatasi problem standard  aplikasi software" data-original-title="Technical Skill – System Development">?</button>
                      </div>
                    </div>   
                    <div class="control-group">
                      <label class="control-label">TS-IA</label>
                      <div class="controls">
                        <select id="tsia" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan kemampuan untuk membantu Pimpinan Puncak Perusahaan dalam pengawasan dan penyempurnaan pengelolaan dan penggunaan keuangan Perusahaan serta operasional Perusahaan" data-original-title="Technical Skill – Internal Audit">?</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">TS-TOP</label>
                      <div class="controls">
                        <select id="tstop" class="s-wrap span4">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select> 
                        <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan kemampuan untuk menjamin seluruh proses dan aktifitas Perusahaan berjalan sesuai dengan Visi, Kebijakan dan Sasaran Kinerja yang ditetapkan, serta  ketentuan yang berlaku" data-original-title="Technical Skill – Top Management">?</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>

              <div class="modal-footer">
                <?php if(getSession('role') != 'User') { ?>
                <a class="btn green" href="#" onclick="simpanstdknowhow()"><i class="icon-save"></i> Simpan</a>
                <?php } ?>
                <a class="btn btn-outline dark" href="dashboard">Keluar</a>
              </div>                    

            </div>


            <div class="tab-pane fade" id="tabreport">

              <div class="row-fluid">
                <div class="span12">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">Jabatan</label>
                      <div class="controls">
                        <select id="kojab1" class="s-wrap span8 selectpicker" data-live-search="true">
                          <option value="">-- Pilih Jabatan --</option>
                          <?php foreach ($jabatan as $row) {
                            echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                          } ?>
                        </select>
                      </div>
                    </div>                            
                  </form>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span12">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <div class="portlet">
                          <a class="btn blue" href="#" onclick="carireportstdknowhow()"><i class="icon-search"></i> Cari</a>
                          <a class="btn purple" target='_blank' href="<?=base_url()."index.php/stdknowhow/cetakstdknowhowpdf"?>"><i class="icon-download"></i> Download</a>                                
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <table class="table table-striped table-bordered table-hover table-full-width" >
                <thead>
                <tr>
                  <th align="center">Kompetensi</th>
                  <th align="center">Keterangan</th>
                  <th align='center'>1</th>
                  <th align='center'>2</th>
                  <th align='center'>3</th>
                  <th align='center'>4</th>
                  <th align="center">5</th>
                </tr>
                </thead>
                <tbody id='stdknowhow'></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {

    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: '<?=base_url().'index.php/stdknowhow/jabatanList'?>'
    });   
});

function simpanstdknowhow(){
  var select = document.getElementById("kojab");
  xajax_simpanstdknowhow(select.value,
                        select.options[select.selectedIndex].innerHTML,
                        document.getElementById("fe").value,
                        document.getElementById("ie").value,
                        document.getElementById("ex").value,
                        document.getElementById("bs").value,
                        document.getElementById("tsmkt").value,
                        document.getElementById("tsest").value,
                        document.getElementById("tsppc").value,
                        document.getElementById("tscon").value,
                        document.getElementById("tsqac").value,
                        document.getElementById("tsman").value,
                        document.getElementById("tssar").value,
                        document.getElementById("tscs").value,
                        document.getElementById("tspeng").value,
                        document.getElementById("tsfat").value,
                        document.getElementById("tshse").value,
                        document.getElementById("tshrd").value,
                        document.getElementById("tsga").value,
                        document.getElementById("tsmd").value,
                        document.getElementById("tsmr").value,
                        document.getElementById("tsengmech").value,
                        document.getElementById("tsengelec").value,
                        document.getElementById("tsenginst").value,
                        document.getElementById("tsengciv").value,
                        document.getElementById("tssd").value,
                        document.getElementById("tsia").value,
                        document.getElementById("tstop").value );
}
function caristdknowhow(){
  xajax_caristdknowhow(document.getElementById("kojab").value);
}
function carireportstdknowhow(){
  xajax_carireportstdknowhow(document.getElementById("kojab1").value);
}
</script>

