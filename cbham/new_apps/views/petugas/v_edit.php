
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
                    <form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('petugas/edit'); ?>" method="post" id="form">
                        <?php foreach ($petugas as $row) { ?>
                        <div class="control-group">
                            <label class="control-label">Nopeg</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->nopeg?>" name="nopeg" readonly>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->nama?>" name="nama">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Unit</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->unit?>" name="unit">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Telp Kantor</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->no_telp?>" name="telp" >  
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">No HP 1</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->hp1?>" name="hp1">
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label">No HP 2</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->hp2?>" name="hp2">
                                
                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label">Alamat</label>
                            <div class="controls">
                                <!-- <input type="text" value="<?php echo @$this->input->get('keterangan'); ?>" id="tanggal" class="m-wrap span4" name="alamat"> -->
                                <textarea class="large m-wrap span4" name="alamat"><?php echo $row->alamat?></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label">License</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->license?>" name="license">
                                
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label">License Validity</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->license_val?>" name="license_val">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Grade/Golongan</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->grade?>" name="golongan">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">No Passport</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->no_passport?>" name="no_pass">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Passport Validity</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->passport_val?>" name="pass_val">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Ukuran Kemeja</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->kemeja?>" name="kemeja">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Ukuran Pantalon</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" value="<?php echo $row->pantalon?>" name="pantalon">
                                
                            </div>
                        </div> 
                        <?php } ?>
                        <div class="form-actions">
                            <button class="btn green" type="submit" ><i class="icon-save"></i> Update</button>
                            <button type="button" class="btn" onClick='back()'> Back</button> 
                            <!-- <button class="btn blue" type="submit" onclick="equip();"><i class="icon-plus"></i> Add Petugas</button> -->
                        </div>
                        <!-- <input type="hidden" name="edit" value="<?php echo md5(@$val->unit); ?>" /> -->
                    </form>
                    
        </div>
    </div>
</div>


<script type="text/javascript">
</script>