
<div class="row-fluid">
  <div class="span12">
    <div class="portlet-body form" style="display: block;">
      <div class="portlet-title">
          <div class="caption "><i class="icon-reorder"></i>Browse Hasil Penilaian Individu</div>
      </div>
      <div class="row-fluid">
        <div class="span12">
            <form class="form-search fright" action="<?php echo base_url(); ?>penilaian/hasil_penilaian_individu" method="post">
              <div class="form-search fright">
                <div class="input-prepend">
                  <span class="add-on">Nopeg / Nama</span>
                  <input type="hidden" name="allnopeg" class="span6 m-wrap all">
                  <input class="m-wrap medium" type="text" placeholder="Search Nopeg / Nama" id="nopeg" name="nopeg"/>
                </div>
                <button class="btn green" type="submit"><i class="icon-save"></i> Show</button>
                <a class="btn purple" onclick="printDiv('data')" target="blank"><i class="icon-print"></i> Print</a>
              </div>         
            </form>
        </div>
      </div>
      <br/>
      
      <div id='data'>
          <?php if(!empty($petugas)){ foreach (@$petugas as $key) { ?>
          <div class="input-prepend">
              <span class="add-on">Nopeg</span>
              <input class="m-wrap small" type="text" value="<?php echo $key->nopeg; ?>" size="15" readonly/>
          </div>
          <div class="input-prepend">
              <span class="add-on">Nama</span>
              <input class="m-wrap large" type="text" value="<?php echo $key->nama; ?>" size="15" readonly/>
          </div>
          <div class="input-prepend">
              <span class="add-on">Unit</span>
              <input class="m-wrap small" type="text" value="<?php echo $key->unit; ?>" size="15" readonly/>
          </div>
          <?php }} ?>
          <?php if(!empty($detail)){ ?>
          <table class="table table-striped table-bordered table-hover table-full-width" >
              <thead>
                  <th>No</th>
                  <th>Tahun</th>
                  <!-- <th>Kode Pekerjaan</th> -->
                  <th>Jenis Pekerjaan</th>
                  <th>Station</th>
                  <th>Phase</th>
                  <th>Lokasi</th>
                  <th>Nilai</th>
                  <th>Keterangan</th>
              </thead>
              <tbody>
                  <?php $i=1; foreach (@$detail as $key) { ?>
                  <tr>
                      <td><?=$i?></td>
                      <td><?=$key->tahun?></td>
                      <!-- <td><?=$key->k_pekerjaan?></td> -->
                      <td><?=getDesc($key->id_pekerjaan, 'pekerjaan')?></td>
                      <td><?=getDesc($key->id_station, 'station')?></td>
                      <td><?=$key->phase?></td>
                      <td><?=getDesc($key->id_lokasi, 'lokasi')?></td>
                      <td><?=$key->nilai?></td>
                      <td><?=$key->keterangan?></td>
                  </tr>
                 <?php $i++;} } ?>  
              </tbody>
          </table>  
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('.data').hide();

$('#nopeg').live('focus.autocomplete', function()
{
$(this).autocomplete({
    minLength: 2,
    source:
    function(req, add){
        $.ajax({
            url: "<?php echo base_url(); ?>petugas/get_auto_name",
            dataType: 'json',
            type: 'POST',
            data: req,
            success:   
            function(data){
                if(data.response =="true"){
                    add(data.message);
                }else{
                    $(this).val(' ');
                }
            },
        });
    },
select:
    function(event, ui) {
        $(".all").val(ui.item.id);
        $("#nopeg").val(ui.item.value);
        // $(".all").attr('readonly','readonly');
    },     
});
});

var petugas = '<?php echo @$petugas[0]->nopeg; ?>';
if(petugas!=null){
    $('.data').show();
}

var win = null;
function newWindow(mypage, myname, w, h, features) {
    var winl = (screen.width-w)/2;
    var wint = (screen.height-h)/2;
    if (winl < 0) winl = 0;
    if (wint < 0) wint = 0;
    var settings = 'height=' + h + ',';
    settings += 'width=' + w + ',';
    settings += 'top=' + wint + ',';
    settings += 'left=' + winl + ',';
    settings += 'bgColor="#008888",';
    settings += features;
    win = window.open(mypage, myname, settings);
    win.document.bgColor = 'lightgreen';
    win.window.focus();
}

function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
/*
function cekDouble() {
    if($('#pparam').val() != "" && $('#pcari').val() != "") {
        alert("Error..., Cannot search with 2 parameters.\nReset first and then entry 1 parameter only.....");
        return false;
    } else {
        $('#searchpin').submit();
    }
}
*/

</script>