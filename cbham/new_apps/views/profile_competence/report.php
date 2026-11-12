<?php echo @$err; ?>
<div id='alert'></div>
<!-- <div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; "> -->
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
            <div class="input-prepend">
                <span class="add-on">Jabatan</span>
                <select class="m-wrap large selectpicker" onchange="filter()" name="jabatan" data-placeholder="Choose a Jabatan" id='jabatan' tabindex="1" data-live-search="true">
                    <option value=''>Pilih Jabatan</option>
                    <?php foreach ($jabatan as $row) {
                        echo "<option value='".$row->kojab."'>".$row->namajabatan."</option>";
                    } ?>
                </select>
            </div>
            <div class="input-prepend">
                <span class="add-on">Unit</span>
                <select class="m-wrap large selectpicker" onchange="filter()" name="unit" data-placeholder="Choose a Unit" id='unit' tabindex="1" data-live-search="true">
                    <option value=''>Pilih Unit</option>
                    <?php foreach ($unit as $row) {
                        echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                    } ?>
                </select>
            </div>
        </div>
      </div>
        
      <table id="table" class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
            <tr>
                  <th>NIK</th>
                  <th>Nama Pegawai</th>
                  <th>Jabatan</th>
                  <th>Unit</th>
                  <th>Periode</th>
                  <th>Tahun</th>
                  <th>Created At</th>
                  <th>Entry By</th>
                  <th>Updated At</th>
                  <th>Updated By</th>
                  <!--<th>Action</th>-->
            </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
  </div>
</div>

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<style>
    .dt-buttons{
        float:right !important;
        margin-left: 25px;
    }
</style>

<script type="application/javascript">

    var table = $('#table').DataTable({
        'processing': true,
        'serverSide': true,
        'language': {
            processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw" style="color:#07a7e1"></i><span class="sr-only">Loading...</span> '
        },
        'ajax': {
            url: "<?php echo site_url('profile_competence/report_list')?>",
            data: function(d) {
                d.search = $('#table_filter input').val();
                d.jabatan = $('[name=jabatan]').val();
                d.unit = $('[name=unit]').val();
            }
        },
        'search': true,
        'dataType': 'json',
        'paging': true,
        'lengthChange': true,
        'info': true,
        'autoWidth': false,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All']
        ],
        'columnDefs'        : [         // see https://datatables.net/reference/option/columns.searchable
            {
                'searchable'    : false,
                'targets'       : [0,1,2,3,4,5,6,7,8,9]
            },
        ],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Rekapitulasi Profile Kompetensi',
                exportOptions: {
                    trim: false,
                    stripHtml: false,
                    /*format: {
                        header: function ( html, index, node ) {
                            return index + ' [' + html +']';
                        }
                    }*/
                }
            }
        ]
    });

    function filter() {
        table.ajax.reload(null,false);
    }
</script>


