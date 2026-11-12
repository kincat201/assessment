<?php echo @$err; ?>
<div id='alert'></div>

<div class="row-fluid">
  <div class="tabbable tabbable-custom">
    <ul class="nav nav-tabs">
      <li class="active">
          <a href="#tabmanagerial" data-toggle="tab">Managerial</a>
      </li>
      <li>
          <a href="#tabreport" data-toggle="tab"> Report </a>
      </li>
    </ul>

    <div class="tab-content" style="min-height: 325px;">
      <div class="tab-pane fade active in" id="tabmanagerial">
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
                  <a class="btn blue" data-toggle="modal" href="#" onclick="caristdmanagerial()"><i class="icon-search"></i> Cari</a>
                </div>
              </div>                            
            </form>
          </div>
        </div>

        <div class="row-fluid">
          <div class="span4">
            <form class="form-horizontal " id="form">
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
                </div>
              </div>                                                                                            
            </form>
          </div>

          <div class="span4">
            <form class="form-horizontal " id="form">
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
                </div>
              </div>                          
            </form>
          </div>

          <div class="span4">
            <form class="form-horizontal " id="form">
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
                </div>
              </div>                                                                                                   

            </form>
          </div>

        </div>

        <div class="modal-footer">
          <?php if(getSession('role') != 'User') { ?>
            <a class="btn green" href="#" onclick="simpanstdmanagerial()"><i class="icon-save"></i> Simpan</a>
          <?php }?>
            <a class="btn btn-outline dark" data-dismiss="modal" href="dashboard">Keluar</a>
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
                    <a class="btn blue" data-toggle="modal" href="#" onclick="carireportstdmanagerial()"><i class="icon-search"></i> Cari</a>
                    <a class="btn purple" target='_blank' href="<?=base_url()."index.php/stdmanagerial/cetakstdmanagerialpdf"?>"><i class="icon-download"></i> Download</a>
                </div>
              </div>
            </form>
          </div>
        </div>

        <table class="table table-striped table-bordered table-hover table-full-width" >
          <thead>
          <tr>
            <th align="center">Kompetensi</th>
            <th align="center">Keteragan</th>
            <th align='center'>1</th>
            <th align='center'>2</th>
            <th align='center'>3</th>
            <th align='center'>4</th>
            <th align="center">5</th>
          </tr>
          </thead>
          <tbody id='stdmanagerial'></tbody>
        </table> 
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

function simpanstdmanagerial(){
  var select = document.getElementById("kojab");
  xajax_simpanstdmanagerial(select.value,
                        select.options[select.selectedIndex].innerHTML,
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
                        document.getElementById("cso").value );

}
function caristdmanagerial(){
  xajax_caristdmanagerial(document.getElementById("kojab").value);
}
function carireportstdmanagerial(){
  xajax_carireportstdmanagerial(document.getElementById("kojab1").value);
}
</script>

