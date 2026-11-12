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
    
<!--     <div class="portlet box blue tabbable">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-reorder"/>
            Portlet Tabs
        </div>
      </div>
      <div class="portlet-body">
        <div class="tabbable portlet-tabs"> -->


    <ul class="nav nav-pills">
          <li class="active">
              <a href="#tabentry" data-toggle="tab"> Entry </a>
          </li>
          <li>
              <a href="#tabreport" data-toggle="tab"> Report </a>
          </li>

              </ul>
              <div class="tab-content">
                  <div class="tab-pane fade active in" id="tabentry">

                    <div class="row-fluid">
                      <div class="span12">
                        <form class="form-horizontal " id="form">
                          <div class="control-group">
                            <label class="control-label">Jabatan</label>
                            <div class="controls">
                              <div class="ausu-suggest">
                                <input type="text" size="100" value="" name="jabatan" id="jabatan" autocomplete="off" />
                                <input type="text" size="10" value="" name="kojab" id="kojab" autocomplete="off"/>
                              </div>
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
                        <a class="btn green" href="#" onclick="simpanstdknowhow()"><i class="icon-save"></i> Simpan</a>
                        <a class="btn btn-outline dark" data-dismiss="modal" href="dashboard"></i> Keluar</a>
                    </div>                    


<!--                     <div class="form-group">
                        <table>                            
                            <tr>
                                <td align="left"><label for="keterangan"><b>Jabatan</label></td>
                                <td>
                                  <select id="jabatan" class="s-wrap span12">
                                    <option value="">-- Pilih Jabatan --</option>
                                    <?php foreach ($jabatan as $row) {
                                      echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                    } ?>
                                  </select>  
                                </td>
                            </tr>                                                                   
                            <tr>
                                <td align="left"><label for="keterangan"><b>FE</label></td>
                                <td><input id="fe" name="fe"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                        

                                <td align="left"><label for="keterangan"><b>TS-MIS</label></td>
                                <td><input id="tsmis" name="tsmis"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>
                            </tr>                                       
                            <tr>
                               <td align="left"><label for="keterangan"><b>IE</label></td>
                               <td><input id="ie" name="ie"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user7" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-FIN</label></td>
                                <td><input id="tsfin" name="tsfin"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>                                       
                            <tr>
                               <td align="left"><label for="keterangan"><b>EX</label></td>
                               <td><input id="ex" name="ex"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-QA</label></td>
                                <td><input id="tsqa" name="tsqa"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                                                   
                            </tr>                   
                            <tr>
                               <td align="left"><label for="keterangan"><b>BS</label></td>
                               <td><input id="bs" name="bs"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user1" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-LGL</label></td>
                                <td><input id="tslgl" name="tslgl"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>                                       
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-MKT</label></td>
                               <td><input id="tsmkt" name="tsmkt"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-IA</label></td>
                                <td><input id="tsia" name="tsia"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                                                    
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-EST</label></td>
                               <td><input id="tsest" name="tsest"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-RED</label></td>
                                <td><input id="tsred" name="tsred"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                                                    
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-ENG-MECH</label></td>
                               <td><input id="tsengmech" name="tsengmech"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-MC</label></td>
                                <td><input id="tsmc" name="tsmc"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                                                    
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-ENG-ELEC</label></td>
                               <td><input id="tsengelec" name="tsengelec"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-HSE</label></td>
                                <td><input id="tshse" name="tshse"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                                                    
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-ENG-CIV</label></td>
                               <td><input id="tsengciv" name="tsengciv"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-HRD</label></td>
                                <td><input id="tshrd" name="tshrd"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-PROC-PURCH</label></td>
                               <td><input id="tsprocpurch" name="tsprocpurch"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-RT</label></td>
                                <td><input id="tsrt" name="tsrt"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-PROC-EXPD</label></td>
                               <td><input id="tsprocexpd" name="tsprocexpd"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-MD</label></td>
                                <td><input id="tsmd" name="tsmd"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-PROC-TRFC</label></td>
                               <td><input id="tsproctrfc" name="tsproctrfc"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-MR</label></td>
                                <td><input id="tsmr" name="tsmr"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-PROC-EXIM</label></td>
                               <td><input id="tsprocexim" name="tsprocexim"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-SUB</label></td>
                                <td><input id="tssub" name="tssub"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-CON</label></td>
                               <td><input id="tscon" name="tscon"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>

                                <td align="left"><label for="keterangan"><b>TS-TOP</label></td>
                                <td><input id="tstop" name="tstop"  size="20" type="text" value="" style="color:black"/>
                                    <input type="button" id="create-user1" value="?" tabindex="8" /></td>                                  
                            </tr>
                            <tr>
                               <td align="left"><label for="keterangan"><b>TS-PPC</label></td>
                               <td><input id="tsppc" name="tsppc"  size="20" type="text" value="" style="color:black"/>
                                  <input type="button" id="create-user2" value="?" tabindex="8" /></td>                                                            
                            </tr>                                                                                                                
                        </table> -->


                  </div>
                  <div class="tab-pane fade" id="tabreport">
                    <div class="form-group">
                      <table>
                        <tr>
                            <td align="left"><label for="keterangan"><b>Jabatan</label></td>
                            <td>
                              <select id="jabatan" class="s-wrap span12">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php foreach ($jabatan as $row) {
                                  echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                } ?>
                              </select>  
                            </td>
                        </tr>
                      </table>                                                                                                             
                    </div>
                    <div class="portlet">
                        <a class="btn blue" data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Pegawai</a>
                        <a class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a>
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
                        // foreach ($pegawai as $row) { ?>
<!--                             <tr>
                                <td><?=$row->nik; ?></td>
                                <td><?=$row->nama; ?></td>
                                <td><?=$row->namaunit ?></td>
                                <td><?=$row->namajabatan ?></td>
                                <td>
                                    <a class="btn mini blue sbold" data-toggle="modal" href="#detail" onClick="detailpegawai("<?php echo $row->nik?>")"><i class="icon-eye-open"></i> Detail </a>
                                    <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editpegawai("<?php echo $row->nik?>")"><i class="icon-edit"></i> Edit </a>
                                </td>
                            </tr> -->
                        <?php //}?>
                    </table> 

                  </div>
              </div>
          </div>
      </div>

    
<!--     <div class="span12">
      <div class="portlet">
          <a class="btn blue" data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Pegawai</a>
          <a class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a>
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
                        <a class="btn mini blue sbold" data-toggle="modal" href="#detail" onClick="detailpegawai("<?php echo $row->nik?>")"><i class="icon-eye-open"></i> Detail </a>
                        <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editpegawai("<?php echo $row->nik?>")"><i class="icon-edit"></i> Edit </a>
                    </td>
                </tr>
            <?php }?>
        </table> -->
    
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
    <h4 class="modal-title"><i class='icon-add'></i> Tambah Pegawai</h4>
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
        <a class="btn green" href="#" onclick="simpanpegawai()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
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
  xajax_simpanstdknowhow(document.getElementById("kojab").value,
                        document.getElementById("jabatan").value,
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
</script>

