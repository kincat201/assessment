<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    
      <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <label class="control-label">Nama</label>
              <div class="controls">
                <div class="ausu-suggest">
                  <input type="text" size="100" value="" name="jabatan" id="jabatan" autocomplete="off" />
                  <input type="text" size="10" value="" name="kojab" id="kojab" autocomplete="off"/>
                </div>
              </div>
            </div>                            
            <div class="control-group">
                <label class="control-label">Periode</label>
                <div class="controls">
                  <select id="periode" class="s-wrap span4">
                    <option value="">-- Pilih Periode --</option>
                    <option value="Periode I">Periode I</option>
                    <option value="Periode II">Periode II</option>
                    <option value="Periode III">Periode III</option>
                    <option value="Periode IV">Periode IV</option>            
                  </select>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">Tahun</label>
                      <div class="controls">                
                          <input type="text" size="20" value="" name="tahun" id="tahun"/>                
                      </div>
                    </div>                            
                  </form>
                </div>
              </div>                        
          </form>
        </div>
      </div>
  
<form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('penilaian/add_act')?>" method="post" id="form">
                    <table class="table table-striped table-bordered table-hover table-full-width" >
                        <thead>
                            <th>No</th>
                            <th>Pekerjaan</th>
                            <th>ID</th>
                            <th>Unit</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td>
                                    <input type="text" class="m-wrap span2" placeholder="Nilai" name="nilai" value="<?php echo @$key->nilai?>">
                                </td>
                                <td>
                                    <input type="text" class="m-wrap span3" placeholder="Keterangan" name="keterangan" value="<?php echo @$key->keterangan?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>  
                    <div class="form-actions">
                        <button class="btn blue" type="submit" ><i class="icon-save"></i> Save</button> 
                    </div>
                </form>

<form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('penilaian/add_act')?>" method="post" id="form">
                    <table class="table table-striped table-bordered table-hover table-full-width" >
                  <thead>
                    <!-- <tr> -->
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th class="hidden-480">Username</th>
                      <th>Status</th>
                    <!-- </tr> -->
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        <input class="s-wrap span4" type="text" size="1" value="" name="tahun" id="tahun"/>
                      </td>
                      <td>
                      <input type="text" class="m-wrap span2" placeholder="Nilai" name="nilai" value="<?php echo @$key->nilai?>">
                      </td>
                      <td class="hidden-480">makr124</td>
                      <td><span class="label label-success">Approved</span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                      <td>Nilson</td>
                      <td class="hidden-480">jac123</td>
                      <td><span class="label label-info">Pending</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Larry</td>
                      <td>Cooper</td>
                      <td class="hidden-480">lar</td>
                      <td><span class="label label-warning">Suspended</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Sandy</td>
                      <td>Lim</td>
                      <td class="hidden-480">sanlim</td>
                      <td><span class="label label-danger">Blocked</span></td>
                    </tr>
                  </tbody>
                </table>
                </form>

<!--       <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <div class="portlet">
                  <a class="btn blue" data-toggle="modal" href="#" onclick="carioutstdkompetensi()"><i class="icon-search"></i> Cari</a>
                  <a class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center">Kompetensi</th>
          <th align='center'>1</th>
          <th align='center'>2</th>
          <th align='center'>3</th>
          <th align='center'>4</th>
          <th align="center">5</th>
        </tr>
        </thead>
        <tbody id='pms'>
      </table>  -->

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

$(document).ready(function() {    
    $('#radiomain4').change(function() {
      document.getElementById("nilsubmain").value = (4*Number(document.getElementById("bobsubmain").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
    });

    $('#radiomain5').change(function() {
      document.getElementById("nilsubmain").value = (5*Number(document.getElementById("bobsubmain").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
    });

    $('#radiomain6').change(function() {
      document.getElementById("nilsubmain").value = (6*Number(document.getElementById("bobsubmain").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
    });
    
    $('#radioimprov4').change(function() {
      document.getElementById("nilsubimprov").value = (4*Number(document.getElementById("bobsubimprov").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
    });

});

// function simpanstdmanagerial(){
//   xajax_simpanstdmanagerial(document.getElementById("kojab").value,
//                         document.getElementById("jabatan").value,
//                         document.getElementById("dev").value,
//                         document.getElementById("dir").value,
//                         document.getElementById("tw").value,
//                         document.getElementById("tl").value,
//                         document.getElementById("ps").value,
//                         document.getElementById("po").value,
//                         document.getElementById("so").value,
//                         document.getElementById("at").value,
//                         document.getElementById("ct").value,
//                         document.getElementById("int").value,
//                         document.getElementById("iu").value,
//                         document.getElementById("rb").value,
//                         document.getElementById("imp").value,
//                         document.getElementById("ing").value,
//                         document.getElementById("trp").value,
//                         document.getElementById("tew").value,
//                         document.getElementById("crt").value,
//                         document.getElementById("wis").value,
//                         document.getElementById("exc").value,
//                         document.getElementById("ach").value,
//                         document.getElementById("co").value,
//                         document.getElementById("is").value,
//                         document.getElementById("cso").value );

// }
function carioutstdkompetensi(){
  xajax_carioutstdkompetensi(document.getElementById("kojab").value);
}
// function carireportstdmanagerial(){
//   xajax_carireportstdmanagerial(document.getElementById("kojab1").value);
// }
</script>

