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
                    <form class="form-horizontal form-row-seperated form-row-stripped" action="" method="post" id="form">                        
                        <?php foreach($data as $value):?>
                        <div class="control-group">
                            <label class="control-label">Tahun</label>
                            <div class="controls">
                                <select name="tahun" id="ktahun" class="m-wrap span4">
                                    <!-- <option value="" >Pilih Tahun</option>                                                                      -->
                                    
                                    <?php 
                                    $x = 2000;
                                    for ($i=0; $i <100 ; $i++) { 
                                        ?>
                                        <option value="<?php echo $x; ?>" <?php if($x == $value->tahun){?> selected="true" <?php } ?> ><?php echo $x; ?></option>
                                        <?php
                                        $x++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Station</label>
                            <div class="controls"> 
                                <select name="stat" class="m-wrap span4">
                                    <option value="" >Pilih Station</option>
                                    <?php foreach ($station as $row): ?>
                                        <option value="<?php echo $row->id_station; ?>" <?php if($value->id_station == $row->id_station){ ?> selected="true" <?php } ?> ><?php echo $row->k_station.' - '.$row->station; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Phase</label>
                            <div class="controls">
                                <select name="phase" class="m-wrap span4">
                                    <option value="" >Pilih Phase</option>
                                    <option value="1" <?php if($value->phase == "1"){?> selected="true" <?php } ?>>1</option>
                                    <option value="2" <?php if($value->phase == "2"){?> selected="true" <?php } ?>>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Lokasi</label>
                            <div class="controls">
                                <select name="lokasi" class="m-wrap span4">
                                    <option value="" >Pilih Lokasi</option>
                                    <?php foreach ($lokasi as $row): ?>
                                        <option value="<?php echo $row->id_lokasi;?>" <?php if($value->id_lokasi == $row->id_lokasi){ ?> selected="true" <?php } ?> ><?php echo $row->k_lokasi.' - '.$row->lokasi; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Jenis Pekerjaan</label>
                            <div class="controls">
                                <!-- <input type="text" value="<?php echo @$this->input->get('jenis_pekerjaan'); ?>" id="nama" class="m-wrap span4" placeholder="Jenis Pekerjaan" name="jenis_pekerjaan"> -->
                                <select name="id_pekerjaan" class="m-wrap span4">
                                    <option value="" >Pilih Jenis Pekerjaan</option>
                                    <?php foreach ($pekerjaan as $row): ?>
                                        <option value="<?php echo $row->id_pekerjaan; ?>" <?php if($value->id_pekerjaan == $row->id_pekerjaan){?> selected="true" <?php }?> ><?php echo $row->k_pekerjaan.' - '.$row->pekerjaan; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Jumlah Petugas</label>
                            <div class="controls">
                                <input type="text" value="<?php echo $value->jumlah_petugas?>" id="judul" class="m-wrap span4" placeholder="Jumlah Petugas" name="jumlah_petugas" >
                                
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Shift</label>
                            <div class="controls">
                                <input type="text" value="<?php echo $value->shift ?>" id="subjek" class="m-wrap span4" placeholder="Shift" name="shift" >
                                
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Keterangan</label>
                            <div class="controls">
                                <input type="text" value="<?php echo $value->keterangan ?>" id="tanggal" class="m-wrap span4" placeholder="Keterangan" name="keterangan">
                                
                            </div>
                        </div> 
                        
                        <div class="form-actions">
                            <button class="btn green" type="submit" onclick="save();"><i class="icon-save"></i> Update</button>
                            <!-- <a class="btn blue" href="<?php echo base_url()?>komposisi/add_petugas/<?php echo $value->k_pekerjaan?>"><i class="icon-plus"></i> Petugas</a>  -->
                            <button type="button" class="btn" onClick='back()'> Back</button>   
                        </div>
                        <input type="hidden" name="id_komposisi" value="<?php echo @$value->id_komposisi; ?>" />
                    <?php endforeach;?>
                    </form>
                    
        </div>
    </div>
</div>


<script type="text/javascript">
function save(){
    $('#form').attr("action","<?php echo base_url('komposisi/update_data'); ?>");
}

function equip(){
    $('#form').attr("action","<?php echo base_url('komposisi/add_petugas'); ?>");
}
</script>