<?php echo @$err; ?>
<div id='alert'></div>

<style>
    .span4{
        margin-top:10px;
    }

    .d-none{
        display: none !important;
    }
</style>

<form id="form-profile-competence" enctype="multipart/form-data" action="#" method="post">
<div class="row-fluid">
    <div class="tabbable tabbable-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Evaluasi Profil Kompetensi</a></li>
            <li><a href="#tab_2" data-toggle="tab">Report ProfilKompetensi</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="span12">
                    <div class="portlet">
                        <div class="row-fluid">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large selectpicker" name="nik" data-placeholder="Choose a Pegawai" id='nama' tabindex="1" data-live-search="true">
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama." (".$row->namaunit.")</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <select class="m-wrap small" name="periode" id='periode' >
                                        <option value='1'>Semester I</option>
                                        <option value='2'>Semester II</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" name="tahun" id='tahun' >
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) {
                                            if(date('Y') == $i){
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="search_profile()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>

                        <hr/>
                        <div class="row-fluid">
                            <div class="span2 sample-item d-none">
                                <div class="control-group">
                                    <label class="control-label">FE</label>
                                    <div class="controls">
                                        <select id="fe" class="s-wrap span4" onchange="set_gap()">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button class="btn popovers" type="button" data-trigger="hover" data-placement="right" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">?</button>
                                        <button class="btn btn-modal" type="button" onclick="set_level()">L</button>
                                        <button class="btn" data-placement="right" disabled>Standart : <span class="std-value">0</span></button>
                                        <button class="btn" data-placement="right" disabled>Gap : <span class="std-gap">0</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <h5>Kompetensi Inti</h5>
                                <div class="row-fluid category_CORE">
                                    <div class="span3 d-none"></div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row-fluid">
                                <h5>Kompetensi Kepemimpinan</h5>
                                <div class="row-fluid category_LEADERSHIP">
                                    <div class="span3 d-none"></div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row-fluid">
                                <h5>Kompetensi Teknis Fundamental</h5>
                                <div class="row-fluid category_FUNDAMENTAL">
                                    <div class="span3 d-none"></div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row-fluid">
                                <h5>Kompetensi Teknis Spesifik</h5>
                                <div class="row-fluid category_TECHNICAL">
                                    <div class="span3 d-none"></div>
                                </div>
                            </div>
                            <hr/>
                            <div class='row-fluid'>
                                <div class="span3 d-none"></div>
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label">Kekuatan</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="kekuatan" id="kekuatan" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group" style="margin-left: 20px;">
                                        <label class="control-label">Kelemahan</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="kelemahan" id="kelemahan" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group" style="margin-left: 40px;">
                                        <label class="control-label">Rencana Pengembangan</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="rencana" id="rencana" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label">Penanggung Jawab</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="penanggung_jawab" id="penanggung_jawab" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group" style="margin-left: 20px;">
                                        <label class="control-label">Jadwal</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="jadwal" id="jadwal" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group" style="margin-left: 40px;">
                                        <label class="control-label">Komentar</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="komentar" id="komentar" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group" style="margin-left: 40px;">
                                        <label class="control-label">Catatan Lainnya</label>
                                        <div class="controls">
                                            <textarea class="large m-wrap" name="notes" id="notes" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="modal-footer">
                                    <?php
                                    $CI =& get_instance();

                                    if(getSession('role') != 'User' && in_array(getSession('user_id'),$CI->config->item('super_admin'))) { ?>
                                        <a class="btn green" href="#" onclick="save()"><i class="icon-save"></i> Simpan</a>
                                    <?php } ?>
                                    <a class="btn purple" href="#" onclick="download_data()"><i class="icon-download"></i> Cetak</a>
                                    <a class="btn btn-outline dark" href="dashboard">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="portlet">
                    <div class="form-search fright">
                        <div class="input-prepend">
                            <span class="add-on">Nama</span>
                            <select class="m-wrap large selectpicker" name="nik_report" data-placeholder="Choose a Pegawai" id='nik_report' tabindex="1" data-live-search="true">
                                <option value=''>Pilih Pegawai</option>
                                <?php foreach ($pegawai as $row) {
                                    echo "<option value='".$row->nik."'>".$row->nama." (".$row->namaunit.")</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="input-prepend">
                            <span class="add-on">Tahun</span>
                            <select class="m-wrap small" name='tahun_report' id="tahun_report">
                                <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) {
                                    if(date('Y') == $i){
                                        echo "<option value='".$i."' selected>".$i."</option>";
                                    } else {
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }

                                } ?>
                            </select>
                        </div>
                        <a class="btn green" style='margin-right: 10px;' id="simpan" onclick="search_profile_report()"><i class="icon-search"></i> Cari</a>
                        <a class="btn purple" href="#" onclick="download_data_report()"><i class="icon-download"></i> Cetak</a>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover table-full-width" style="padding-bottom: 100px;">
                    <thead>
                        <tr>
                            <th class="competence_code">Jenis</th>
                            <th class="competence_name">Kompetensi</th>
                            <th class="standart">Standart</th>
                            <th class="value1">Periode I</th>
                            <th class="gap1">Gap I</th>
                            <th class="value2">Periode II</th>
                            <th class="gap2">Gap II</th>
                        </tr>
                        <tr id="sample-header-category" class="d-none">
                            <th class="category_label" colspan="7" style="text-align: left !important;"></th>
                        </tr>
                        <tr id="sample-report-profile" class="d-none">
                            <td class="competence_code">Jenis</td>
                            <td class="competence_name">Kompetensi</td>
                            <td class="standart">Standart</td>
                            <td class="value1">Periode I</td>
                            <td class="gap1">Gap I</td>
                            <td class="value2">Periode II</td>
                            <td class="gap2">Gap II</td>
                        </tr>
                    </thead>
                    <tbody class='report_profile'>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</form>

<div id="modal_level" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"><b> Business Skill</b></h4>
    </div>
    <div class="modal-body ">
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-striped table-bordered table-hover table-full-width" >
                    <thead>
                    </thead>
                    <tr id="level-sample-item" class="d-none">
                        <th class="level-title" style="width: 100px;">title</th>
                        <td class="level-content">Lipsum</td>
                    </tr>
                    <tbody class="level_item">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"> Keluar</a>
    </div>
</div>

<script type="application/javascript">

    $(document).ready(function() {
        $.fn.autosugguest({
            className: 'ausu-suggest',
            methodType: 'POST',
            minChars: 1,
            rtnIDs: true,
            dataFile: '<?=base_url().'index.php/stdknowhow/jabatanList'?>'
        });
    });

    let competence_data = [];

    function reset(){
        $('.item-competence').remove();
        $('[name=kekuatan]').val(null);
        $('[name=kelemahan]').val(null);
        $('[name=rencana]').val(null);
        $('[name=penanggung_jawab]').val(null);
        $('[name=jadwal]').val(null);
        $('[name=komentar]').val(null);
        $('[name=notes]').val(null);
    }

    async function search_profile() {

        competence_data = [];
        reset();

        const nik = $('#nama').val();
        if(!nik) return;

        const tahun = $('#tahun').val();
        const periode = $('#periode').val();

        let status = false;

        await $.ajax({
            url : "<?php echo site_url('profile_competence/get_data')?>/" + nik + "/"+periode+"/"+tahun,
            type: "GET",
            dataType: "JSON",
            async: true,
            success: function(response)
            {

                if(!response.status){
                    responseAlert('Gagal Cari Profile Kompetensi', response.message,'error');
                    return;
                }

                response.data.competence.map( item =>{
                    if(item.value != 0){
                        generate_competence_item(item);
                        competence_data.push(item);
                    }
                });

                if(response.data.competence_pegawai){
                    const competence_pegawai = response.data.competence_pegawai;
                    $('[name=kekuatan]').val(competence_pegawai.kekuatan);
                    $('[name=kelemahan]').val(competence_pegawai.kelemahan);
                    $('[name=rencana]').val(competence_pegawai.rencana);
                    $('[name=penanggung_jawab]').val(competence_pegawai.penanggung_jawab);
                    $('[name=jadwal]').val(competence_pegawai.jadwal);
                    $('[name=komentar]').val(competence_pegawai.komentar);
                    $('[name=notes]').val(competence_pegawai.notes);

                    status = true;
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                responseAlert('Gagal get data', errorThrown,'error');
            }
        });

        return status;
    }

    async function search_profile_report() {

        $('.report_profile').empty();

        const nik = $('#nik_report').val();
        if(!nik) return;

        const tahun = $('#tahun_report').val();
        if(!tahun) return;

        let status = false;

        await $.ajax({
            url : "<?php echo site_url('profile_competence/get_report')?>/" + nik +"/"+tahun,
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {

                if(!response.status){
                    responseAlert('Gagal Cari Profile Kompetensi', response.message,'error');
                    return;
                }

                const category = [
                    {
                        code: 'CORE',
                        label: 'Kompetensi Inti'
                    },
                    {
                        code: 'LEADERSHIP',
                        label: 'Kompetensi Kepemimpinan'
                    },
                    {
                        code: 'FUNDAMENTAL',
                        label: 'Kompetensi Teknis Fundamental'
                    },
                    {
                        code: 'TECHNICAL',
                        label: 'Kompetensi Teknis Spesifik'
                    }
                ];

                response.data.competence.map( (item,index) =>{

                    if(item.value != 0 ){
                        if(index == 0 || (index > 0 && item.category != response.data.competence[index-1].category)){
                            const current_category = category.find( x => x.code == item.category );
                            const row_category = $('#sample-header-category').clone();
                            row_category.prop('id','sample-header-category-'+item.category);
                            row_category.removeClass('d-none');
                            row_category.find('.category_label').html(current_category ? current_category.label : '-');
                            $('.report_profile').append(row_category)
                        }

                        const row = $('#sample-report-profile').clone();
                        row.prop('id','report-profile-'+item.id);
                        row.removeClass('d-none');
                        row.find('.competence_code').html(item.competence_code);
                        row.find('.competence_name').html(item.name);
                        row.find('.standart').html(item.value);
                        row.find('.value1').html(item.real_value_one);
                        row.find('.gap1').html(item.gap_one);
                        row.find('.value2').html(item.real_value_two);
                        row.find('.gap2').html(item.gap_two);

                        $('.report_profile').append(row);
                    }
                })

                if(response.data.competence_pegawai) status = true;
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                responseAlert('Gagal get data', errorThrown,'error');
            }
        });

        return status;
    }

    function generate_competence_item(item){
        const row = $('.sample-item').clone();
        row.removeClass('d-none');
        row.removeClass('sample-item');
        row.addClass('item-competence')
        row.addClass('item-competence-'+item.competence_code);
        row.find('.control-label').html(item.competence_code);
        row.find('select').prop('name',item.competence_code).attr('onchange','set_gap("'+item.competence_code+'")').val(item.real_value);
        row.find('.std-value').html(item.value);
        row.find('.std-gap').html(item.gap);
        row.find('.popovers').attr('data-content',item.description);
        row.find('.popovers').attr('title',item.name);
        row.find('.popovers').popover();
        row.find('.btn-modal').attr('onclick','set_level("'+item.competence_code+'")');

        $('.category_'+item.category).append(row);
    }

    function set_level(competence_code){
        const competence = competence_data.find( x => x.competence_code == competence_code);
        const level_label = ['Novice','Basic','Skillful','Advance','Expert'];
        if(competence){
            const modal = $('#modal_level');
            modal.find('.modal-title').html('<b>'+competence.name+'</b>');

            $('.level_item').empty();

            for (let i = 1; i <= 5; i++){

                if(!competence['level_'+i]) continue;

                const level_item = $('#level-sample-item').clone();
                level_item.removeClass('d-none');
                level_item.prop('id','level-item-'+new Date().getTime());
                level_item.find('.level-title').html(i+' - '+level_label[i-1]);
                level_item.find('.level-content').html(competence['level_'+i].replace(/\n/g,'<br/>'));

                $('.level_item').append(level_item);
            }

            modal.modal('show');
        }
    }

    function set_gap(competence_code) {
        const item = $('.item-competence-'+competence_code);
        const value = item.find('select').val();
        const std = item.find('.std-value').text();

        if(std == 0) return;

        let gap = parseInt(std,0) - parseInt(value);
        if(gap < 0){
            gap = '+'+(gap*-1);
        }
        item.find('.std-gap').html(gap);
    }

    function save(){

        const nik = $('#nama').val();
        if(!nik) return;

        const tahun = $('#tahun').val();
        const periode = $('#periode').val();

        $.ajax({
            url : "<?php echo site_url('profile_competence/save')?>/" + nik + "/"+periode+"/"+tahun,
            type: "POST",
            data: $('#form-profile-competence').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(!data.status){
                    responseAlert('Gagal Simpan Data', data.message,'error');
                    return;
                }

                responseAlert('Data Berhasil Disimpan', data.message,'info');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                responseAlert('Gagal get data', errorThrown,'error');
            }
        });
    }

    function download_data(){
        const nik = $('#nama').val();
        if(!nik) return;

        const tahun = $('#tahun').val();
        const periode = $('#periode').val();

        search_profile().then((status)=>{
            if(status){
                window.open('<?= site_url('profile_competence/download/')?>/' + nik +"/"+tahun);
            }else{
                responseAlert('Gagal Cetak Data', 'Data di isi atau tidak ditemukan!','error');
            }
        })

    }

    function download_data_report(){
        const nik = $('#nik_report').val();
        if(!nik) return;

        const tahun = $('#tahun_report').val();
        if(!tahun) return;

        search_profile_report().then((status)=>{
            if(status){
                window.open('<?= site_url('profile_competence/download/')?>/' + nik +"/"+tahun);
            }else{
                responseAlert('Gagal Cetak Data', 'Data di isi atau tidak ditemukan!','error');
            }
        })
    }

</script>

