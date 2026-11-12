
<div class="row-fluid">
    <div class="span12">
    <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i><?php echo $title;?></div>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
        
            <div class="portlet-body">
                    <form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('komposisi/add_petugas_act');?>" method="post" id="form">
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Tahun</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $input['tahun'] ?>" class="m-wrap span6" placeholder="Tahun" name="tahun" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Station</label>
                                <div class="controls">
                                    <input type="hidden" value="<?php echo $input['stat']?>" name="stat" >  
                                    <input type="text" value="<?php echo getDesc($input['stat'],'station') ?>" class="m-wrap span6" placeholder="Station" readonly>  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phase</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $input['phase'] ?>" class="m-wrap span6" placeholder="Phase" name="phase" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Lokasi</label>
                                <div class="controls">
                                    <input type="hidden" value="<?php echo $input['lokasi']?>" name="lokasi" > 
                                    <input type="text" value="<?php echo getDesc($input['lokasi'],'lokasi') ?>" class="m-wrap span6" placeholder="Lokasi" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="span7">
                            <!-- <div class="control-group">
                                <label class="control-label">Kode Pekerjaan</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $input['k_pekerjaan']?>" id="k_pekerjaan" class="m-wrap span6" placeholder="Kode Pekerjaan" name="k_pekerjaan" readonly>
                                </div>
                            </div> -->
                            <!-- <div class="control-group">
                                <label class="control-label">Jenis Pekerjaan</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo getDesc($input['id_pekerjaan'],'pekerjaan')  ?>" id="nama" class="m-wrap span6" placeholder="Jenis Pekerjaan" name="id_pekerjaan" readonly>
                                    
                                </div>
                            </div> -->
                            <div class="control-group">
                                <label class="control-label">Jumlah Petugas</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $input['jumlah_petugas']; ?>" id="judul" class="m-wrap span6" placeholder="Jumlah Petugas" name="jumlah_petugas" readonly >
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Shift</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $input['shift']; ?>" id="subjek" class="m-wrap span6" placeholder="Shift" name="shift" readonly>
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Keterangan</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo @$input['keterangan'];; ?>" id="tanggal" class="m-wrap span6" placeholder="Keterangan" name="keterangan" readonly>
                                    
                                </div>
                            </div>    
                        </div>

                    

                        <div class="portlet-body" >
                            <table class="table table-striped table-bordered table-hover table-full-width" >
                                <thead>
                                    <th>Jenis Pekerjaan</th>
                                    <th>No Shift</th>
                                    <th>Nopeg</th>
                                    <th>Nama</th>
                                    <th>Unit</th>
                                </thead>
                                <tbody>
                                    <?php for ($i=1; $i <= count($map); $i++) {  ?>
                                        <tr>
                                            <td rowspan="<?php echo $map[$i]?>"><?=getDesc($input['id_pekerjaan'],'pekerjaan') ?></td>
                                            <td rowspan="<?php echo $map[$i]?>"><?=$i?></td>
                                            <?php for ($j=1; $j <=$map[$i] ; $j++) { ?>
                                                <?php if($j!=1) echo "<tr >";?>
                                                    <td <?php echo "id=".$i.$j;?>>  
                                                        <!-- <input type="text" id="nopeg" class="m-wrap span6" placeholder="Nopeg" <?php echo "name=nopeg".$i.$j."";?>> -->
                                                        <input type="text" <?php echo "id=nopeg".$i.$j;?> class="m-wrap span6 nopeg" placeholder="Nopeg" <?php echo "name=nopeg[".$i."][".$j."]";?>>
                                                    </td>
                                                    <td> 
                                                        <input type="text" <?php echo "id=nama".$i.$j;?> class="m-wrap span12" <?php echo "name=nama[".$i."][".$j."]";?> placeholder="Nama" >
                                                    </td>
                                                    <td>
                                                        <input type="text" <?php echo "id=unit".$i.$j;?> class="m-wrap span8" <?php echo "name=unit[".$i."][".$j."]";?> placeholder="Unit" >
                                                    </td>
                                                <?php if($j!=1) echo "</tr>";?>
                                            <?php }?>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="form-actions"> -->
                            <input type="hidden" value="<?php echo $input['id_pekerjaan']?>" name="id_pekerjaan" >    
                            <button class="btn blue"><i class="icon-plus"></i> Tambah Jumlah Petugas</button>    
                            <button class="btn green" type="submit"><i class="icon-save"></i> Save</button>
                            <button type="button" class="btn" onClick='back()'> Back</button>   
                            <!-- <button class="btn blue" type="submit" onclick="equip();"><i class="icon-plus"></i> Add Petugas</button> -->
                        <!-- </div> -->
                       

                        
                        
                        
                        <!-- <input type="hidden" name="edit" value="<?php echo md5(@$val->unit); ?>" /> -->
                    </form>
        </div>
    </div>
</div>


<script type="text/javascript">
// $(".nopeg").hide();
function save(){
    $('#form').attr("action","<?php echo base_url('komposisi/add'); ?>");
}

function equip(){
    $('#form').attr("action","<?php echo base_url('komposisi/add_petugas'); ?>");
}

$('.nopeg').live('focus.autocomplete', function()
{
var n = $(this).parent().attr('id');
$(this).autocomplete({
    minLength: 2,
    source:
    function(req, add){
        $.ajax({
            url: "<?php echo base_url(); ?>komposisi/get_auto_name",
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
        // alert(n+' '+ui.item.id+' '+ui.item.nama+' '+ui.item.unit);
        // $( "input[name=nopeg"+n+"]" ).val(ui.item.id);
        $( "input[name=nopeg"+n+"]" ).hide();
        // $(this).attr("name", "nopeg"+n).val(ui.item.id);
        // $(".all").val(ui.item.id);
        // $("#nopeg"+n).show();
        $("#nopeg"+n).val(ui.item.id);
        $("#nama"+n).val(ui.item.nama);
        $("#unit"+n).val(ui.item.unit);
    },     
});
});
</script>