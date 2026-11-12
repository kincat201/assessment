<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">KnowHow</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Managerial Skill</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Know How -->
                    <div class="tab-pane active" id="tab_1">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1" onchange='caristdknowhow()'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periode'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahun'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="cariknowhow()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                          <div class="span4">
                            <form class="form-horizontal " id="form">
                              <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                  <button class="btn span4" data-placement="right" disabled>Nilai</button>
                                  <button class="btn span2" data-placement="right" disabled>Ket</button>
                                  <button class="btn span2" data-placement="center" disabled>Std</button>
                                  <button class="btn span2" data-placement="center" disabled>Lvl</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
                                </div>
                              </div> 
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
                                  <button class="btn popovers" data-placement="right" id='sfe' disabled>0</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
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
                                  <button class="btn popovers" data-placement="right" id='sie' disabled>0</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mie">L</a> -->
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
                                  <button class="btn popovers" data-placement="right" id='sie' disabled>0</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mex">L</a> -->
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
                                  <button class="btn popovers" data-placement="right" id='sbs' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mbs">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsmkt' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsmkt">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsest' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsest">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsppc' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsppc">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stscon' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtscon">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsqac' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsqac">L</a>
                                </div>
                              </div> 
                            </form>
                          </div>

                          <div class="span4">
                            <form class="form-horizontal " id="form">
                              <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                  <button class="btn span4" data-placement="right" disabled>Nilai</button>
                                  <button class="btn span2" data-placement="right" disabled>Ket</button>
                                  <button class="btn span2" data-placement="center" disabled>Std</button>
                                  <button class="btn span2" data-placement="center" disabled>Lvl</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
                                </div>
                              </div> 
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
                                  <button class="btn popovers" data-placement="right" id='stsman' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsman">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stssar' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtssar">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stscs' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtscs">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stspeng' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtspeng">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsfat' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsfat">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stshse' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtshse">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stshrd' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtshrd">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsga' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsga">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsmd' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsmd">L</a>      
                                </div>
                              </div>
                            </form>
                          </div>

                          <div class="span4">
                            <form class="form-horizontal " id="form">
                              <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                  <button class="btn span4" data-placement="right" disabled>Nilai</button>
                                  <button class="btn span2" data-placement="right" disabled>Ket</button>
                                  <button class="btn span2" data-placement="center" disabled>Std</button>
                                  <button class="btn span2" data-placement="center" disabled>Lvl</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
                                </div>
                              </div> 
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
                                  <button class="btn popovers" data-placement="right" id='stsmr' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsmr">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsengmech' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsengmech">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsengelec' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsengelec">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsenginst' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsenginst">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsengciv' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsengciv">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stssd' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtssd">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='stsia' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtsia">L</a>
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
                                  <button class="btn popovers" data-placement="right" id='ststop' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtstop">L</a>
                                </div>
                              </div>
                            </form>
                          </div>

                        </div>

                        <div class='row-fluid'>
                            <form class="form-horizontal form-bordered">
                                <div class="control-group">
                                    <label class="control-label">Kekuatan</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="kekuatan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kelemahan</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="kelemahan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Rencana Pengembangan</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="rencana" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a class="btn green" id="simpan" onClick="simpanknowhow()"><i class="icon-save"></i> SimpaL</a>
                                    <a class="btn" id="batal" onClick="batal()"> Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Managerial Skill -->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namam' onchange='caristdmanagerial()'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" id='periodem'>
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahunm'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                            
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="carim" onClick="caridatamanagerial()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                          <div class="span4">
                            <form class="form-horizontal " id="form">
                              <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                  <button class="btn span4" data-placement="right" disabled>Nilai</button>
                                  <button class="btn span2" data-placement="right" disabled>Ket</button>
                                  <button class="btn span2" data-placement="center" disabled>Std</button>
                                  <button class="btn span2" data-placement="center" disabled>Lvl</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
                                </div>
                              </div> 
                              <div class="control-group">
                                <label class="control-label">DEV</label>
                                <div class="controls">
                                  <select id="dev" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk mengajari, membina dan mengarahkan, serta mengembangkan orang lain, termasuk analisis kebutuhannya. Fokusnya adalah pengembangan yang dilakukan sendiri dengan intensif, untuk meningkatkan kinerja dengan cara membantu orang lain mampu melaksanakan tugas, antara lain: memberikan dukungan pengetahuan, penugasan yang spesifik, memberikan umpan balik untuk penyempurnaan.Memiliki komitmen agar orang lain bisa belajar dan tumbuh berkembang" data-original-title="Developing Others">?</button>
                                  <button class="btn popovers" data-placement="right" id='sdev' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mdev">L</a>
                                </div>
                              </div>   
                              <div class="control-group">
                                <label class="control-label">DIR</label>
                                <div class="controls">
                                  <select id="dir" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk membuat orang lain memenuhi harapannya, termasuk kekuatan individu yang dimiliki karena kedudukan / posisinya, yang digunakan secara proporsional" data-original-title="Directiveness, Assertiveness and Use of Position Power">?</button>
                                  <button class="btn popovers" data-placement="right" id='sdir' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mdir">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">TW</label>
                                <div class="controls">
                                  <select id="tw" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bekerja sama dan menjadi bagian dari kelompok, bukan hanya kelompok formal saja" data-original-title="Teamwork & Cooperation">?</button>
                                  <button class="btn popovers" data-placement="right" id='stw' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtw">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">TL</label>
                                <div class="controls">
                                  <select id="tl" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk menjalankan peran sebagai pemimpin. Merupakan kemampuan untuk keberhasilan unit kerja/kelompok/ tim / individu anggota tim.Pemimpin yang baik tidak hanya melakukan kegiatan untuk mencapai sasaran pribadi tetapi sasaran tim, serta mampu memfasilitasi agar semua anggota tim memiliki komitmen terhadap sasaran tim" data-original-title="Teamleadership">?</button>
                                  <button class="btn popovers" data-placement="right" id='stl' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtl">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">PS</label>
                                <div class="controls">
                                  <select id="ps" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk mengatasi masalah dengan pendekatan yang tepat dan baik, serta mampu menggunakan kebijakan dan membuat keputusan dengan baik. Kompetensi ini diperlukan bagi karyawan yang menduduki jabatan struktural" data-original-title="Problem Solving/Decision Making">?</button>
                                  <button class="btn popovers" data-placement="right" id='sps' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mps">L</a>
                                </div>
                              </div>                          
                              <div class="control-group">
                                <label class="control-label">PO</label>
                                <div class="controls">
                                  <select id="po" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan melakukan antisipasi dan perkiraan perubahan serta pengaruh lainnya untuk keperluan perencanaan, alokasi sumber daya serta penyesuaian yang diperlukan. Kompetensi ini diperlukan bagi karyawan yang menduduki jabatan struktural" data-original-title="Planning and Organizing">?</button>
                                  <button class="btn popovers" data-placement="right" id='spo' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mpo">L</a>
                                </div>
                              </div>                           
                              <div class="control-group">
                                <label class="control-label">SO</label>
                                <div class="controls">
                                  <select id="so" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk menghubungkan Visi, Misi, Kebijakan, Sasaran dan Strategi jangka panjang Perusahaan dengan tugas sehari-hari" data-original-title="Strategic Orientation">?</button>
                                  <button class="btn popovers" data-placement="right" id='sso' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mso">L</a>
                                </div>
                              </div>                                 
                              <div class="control-group">
                                <label class="control-label">AT</label>
                                <div class="controls">
                                  <select id="at" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk menganalisis/memilah/mengorganisasi situasi secara sistematis. Juga kemampuan untuk mengidentifikasi efek dari situasi, termasuk kelengkapan informasi sehingga mudah dilakukan analisis masalah dan merumuskan tindakan penyempurnaannya" data-original-title="Analytical Thinking">?</button>
                                  <button class="btn popovers" data-placement="right" id='sat' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mat">L</a>
                                </div>
                              </div>                                                                                            
                            </form>
                          </div>

                          <div class="span4">
                            <form class="form-horizontal " id="form">
                              <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                  <button class="btn span4" data-placement="right" disabled>Nilai</button>
                                  <button class="btn span2" data-placement="right" disabled>Ket</button>
                                  <button class="btn span2" data-placement="center" disabled>Std</button>
                                  <button class="btn span2" data-placement="center" disabled>Lvl</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
                                </div>
                              </div> 
                              <div class="control-group">
                                <label class="control-label">CT</label>
                                <div class="controls">
                                  <select id="ct" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk menemukan/mengidentifikasi pola atau kaitan antar situasi, termasuk kemampuan berkreasi untuk menemukan cara baru dalam menyelesaikan masalah" data-original-title="Conceptual Thinking">?</button>
                                  <button class="btn popovers" data-placement="right" id='sct' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mct">L</a>
                                </div>
                              </div>                          
                              <div class="control-group">
                                <label class="control-label">INT</label>
                                <div class="controls">
                                  <select id="int" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk proaktif sehingga tindakannya tidak hanya mengatasi masalah tetapi juga mengantisipasi kemungkinan yang akan terjadi di masa yang akan datang" data-original-title="Initiative">?</button>
                                  <button class="btn popovers" data-placement="right" id='sint' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mint">L</a>
                                </div>
                              </div>   
                              <div class="control-group">
                                <label class="control-label">IU</label>
                                <div class="controls">
                                  <select id="iu" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk mendengarkan dan memahami pemikiran, perasaan atau hal-hal yang menjadi perhatian orang lain, kemudian melakukan respon yang baik" data-original-title="Interpersonal Understanding">?</button>
                                  <button class="btn popovers" data-placement="right" id='siu' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#miu">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">RB</label>
                                <div class="controls">
                                  <select id="rb" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk membina atau menjaga hubungan dengan orang-orang/Network, yang mungkin suatu saat nanti akan diperlukan/bermanfaat dalam mencapai sasaran Perusahaan" data-original-title="Relation Building">?</button>
                                  <button class="btn popovers" data-placement="right" id='srb' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mrb">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">IMP</label>
                                <div class="controls">
                                  <select id="imp" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan mendorong, meyakinkan dan/atau melibatkan orang lain untuk mencapai sasaran, termasuk kemampuan mempengaruhi orang lain sehingga mendukung atau mau melakukan sesuatu yang tadinya tidak terpikir bahkan tidak akan dilakukannya" data-original-title="Impact & Influence">?</button>
                                  <button class="btn popovers" data-placement="right" id='simp' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mimp">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">ING</label>
                                <div class="controls">
                                  <select id="ing" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bertindak secara konsisten sesuai dengan nilai-nilai dan kebijakan Perusahaan serta kode etik profesi, walaupun dalam keadaan yang sulit untuk melakukan ini.Mengkomunikasikan maksud, ide dan perasaan secara terbuka, jujur dan langsung, walaupun dalam negosiasi yang sulit dengan pihak lain" data-original-title="Integrity">?</button>
                                  <button class="btn popovers" data-placement="right" id='sing' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#ming">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">TRP</label>
                                <div class="controls">
                                  <select id="trp" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bersikap dan berkomunikasi secara terbuka dan sistematis untuk saling memberikan informasi dalam rangka memecahkan masalah. Kemampuan berpartisipasi dalam rangka memecahkan masalah bersama" data-original-title="Transparancy">?</button>
                                  <button class="btn popovers" data-placement="right" id='strp' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtrp">L</a>
                                </div>
                              </div>                          
                              <div class="control-group">
                                <label class="control-label">TEW</label>
                                <div class="controls">
                                  <select id="tew" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bekerja sama menuju sukses, percaya satu dengan yang lain, menghargai pendapat orang lain. Mampu mencari dan menciptakan solusi yang win-win" data-original-title="Teamwork">?</button>
                                  <button class="btn popovers" data-placement="right" id='stew' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mtew">L</a>
                                </div>
                              </div>                          
                            </form>
                          </div>

                          <div class="span4">
                            <form class="form-horizontal " id="form">
                              <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                  <button class="btn span4" data-placement="right" disabled>Nilai</button>
                                  <button class="btn span2" data-placement="right" disabled>Ket</button>
                                  <button class="btn span2" data-placement="center" disabled>Std</button>
                                  <button class="btn span2" data-placement="center" disabled>Lvl</button>
                                  <!-- <a class="btn popovers" data-toggle="modal" href="#mfe">L</a> -->
                                </div>
                              </div> 
                              <div class="control-group">
                                <label class="control-label">CRT</label>
                                <div class="controls">
                                  <select id="crt" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk melakukan komparasi eksternal untuk mendorong terciptanya ide baru dan cara – cara yang lebih baik" data-original-title="Creativity">?</button>
                                  <button class="btn popovers" data-placement="right" id='scrt' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mcrt">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">WIS</label>
                                <div class="controls">
                                  <select id="wis" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bersikap proaktif, pantang menyerah, membangun budaya belajar dan komitmen pada hasil yang diharapkan" data-original-title="Wining Spirit">?</button>
                                  <button class="btn popovers" data-placement="right" id='swis' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mwis">L</a>
                                </div>
                              </div>                          
                              <div class="control-group">
                                <label class="control-label">EXC</label>
                                <div class="controls">
                                  <select id="exc" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bekerja dengan benar dari awal, kompetitif secara global, tepat waktu, cara kerja yang aman dan sehat, disertai rasa bangga dan semangat tinggi" data-original-title="Excellence">?</button>
                                  <button class="btn popovers" data-placement="right" id='sexc' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mexc">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">ACH</label>
                                <div class="controls">
                                  <select id="ach" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk bekerja dengan baik dan mencapai standar ekselen, termasuk kemampuan untuk meningkatkan kinerja, mencapai standar / hasil yang lebih baik (terukur), mengembangkan system yang lebih baik atau mencapai sasaran menantang yang belum pernah dicapai" data-original-title="Achievement Orientation">?</button>
                                  <button class="btn popovers" data-placement="right" id='sach' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mach">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">CO</label>
                                <div class="controls">
                                  <select id="co" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Merupakan kemampuan untuk merefleksikan perhatian terhadap detil dari hal yang terkait sehingga mencapai hasil yang bermutu. Merupakan kemampuan untuk meminimalisasi ketidak pastian. Kompetensi ini bisa diperlihatkan dengan selalu memonitor pekerjaan, mengecek informasi, memahami perannya, membuat dan menjaga system informasi" data-original-title="Concern for Order, Quality and Accuracy">?</button>
                                  <button class="btn popovers" data-placement="right" id='sco' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mco">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">IS</label>
                                <div class="controls">
                                  <select id="is" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan kemampuan untuk mendapatkan lebih banyak informasi dan meningkatkan pemahaman tentang suatu kondisi/keadaan/situasi, termasuk kemampuan membaca, bertanya dan berkonsultasi dengan orang lain sampai mengerti dan memahaminya" data-original-title="Information Seeking">?</button>
                                  <button class="btn popovers" data-placement="right" id='sis' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mis">L</a>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label">CSO</label>
                                <div class="controls">
                                  <select id="cso" class="s-wrap span4">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>                                
                                  </select> 
                                  <button class="btn popovers" data-trigger="hover" data-placement="left" data-content="Merupakan suatu kemampuan untuk membantu dan melayani orang lain agar terpenuhi kebutuhannya. Merupakan upaya seseorang untuk menemukan kebutuhan klien /pelanggan (baik internal maupun eksternal Perusahaan) dan kemudian memenuhinya. Selalu menempatkan dirinya / berfikir sebagai klien, bukan hanya kepentingannya sendiri saja. Fokus untuk memahami cara pandang klien / pelanggan dan komitmen untuk membantu" data-original-title="Customer Service Orientation">?</button>
                                  <button class="btn popovers" data-placement="right" id='scso' disabled>0</button>
                                  <a class="btn popovers" data-toggle="modal" href="#mcso">L</a>
                                </div>
                              </div>                                                                                                   

                            </form>
                          </div>

                        </div>
                        <div class='row-fluid'>
                            <form class="form-horizontal form-bordered">
                                <div class="control-group">
                                    <label class="control-label">Penanggung Jawab</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="penanggungjawab" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Jadwal</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="jadwal" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Komentar</label>
                                    <div class="controls">
                                        <textarea class="large m-wrap" id="komentar" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a class="btn green" id="simpan" onClick="simpanmanagerialskill()"><i class="icon-save"></i> SimpaL</a>
                                    <a class="btn" id="batal" onClick="batal()"> Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>


<?php $this->view('profilkompetensi/modallevel'); ?>


<script type="application/javascript">
// $('#update').hide();

function caristdknowhow(){
  xajax_caristdknowhow(document.getElementById("nama").value);
}

function caristdmanagerial(){
  xajax_caristdmanagerial(document.getElementById("namam").value);
}

function simpanknowhow(){
  xajax_simpanknowhow(document.getElementById("nama").value,
                        document.getElementById("periode").value,
                        document.getElementById("tahun").value,
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
                        document.getElementById("tstop").value,
                        document.getElementById("kekuatan").value,
                        document.getElementById("kelemahan").value,
                        document.getElementById("rencana").value );
}

function simpanmanagerialskill(){
  xajax_simpanmanagerialskill(document.getElementById("namam").value,
                        document.getElementById("periodem").value,
                        document.getElementById("tahunm").value,
                        document.getElementById("dev").value,
                        document.getElementById("dir").value,
                        document.getElementById("tw").value,
                        document.getElementById("tl").value,
                        document.getElementById("ps").value,
                        document.getElementById("po").value,
                        document.getElementById("so").value,
                        document.getElementById("at").value,
                        document.getElementById("ct").value,
                        document.getElementById("int").value,
                        document.getElementById("iu").value,
                        document.getElementById("rb").value,
                        document.getElementById("imp").value,
                        document.getElementById("ing").value,
                        document.getElementById("trp").value,
                        document.getElementById("tew").value,
                        document.getElementById("crt").value,
                        document.getElementById("wis").value,
                        document.getElementById("exc").value,
                        document.getElementById("ach").value,
                        document.getElementById("co").value,
                        document.getElementById("is").value,
                        document.getElementById("cso").value,
                        document.getElementById("penanggungjawab").value,
                        document.getElementById("jadwal").value,
                        document.getElementById("komentar").value );
}

function cariknowhow(){
  xajax_cariknowhow(document.getElementById("nama").value,$("#nama option:selected").text(),document.getElementById("periode").value,document.getElementById("tahun").value);
}

function caridatamanagerial(){
  xajax_caridatamanagerial(document.getElementById("namam").value,$("#namam option:selected").text(),document.getElementById("periodem").value,document.getElementById("tahunm").value);
}

function kosong(){
  $('select').val('0');
}
</script>



