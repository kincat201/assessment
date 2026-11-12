<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends MY_Controller {

    var $limit = 2000;

    function __construct() {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->model('jabatan_model');
        $this->load->model('unit_model');
        $this->load->model('mpp_model');
    }

    function index() {
        $data['title'] = 'Pegawai';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanpegawai',&$this,'simpanpegawai'));    
        $this->xajax->register(XAJAX_FUNCTION, array('editpegawai',&$this,'editpegawai'));  
        $this->xajax->register(XAJAX_FUNCTION, array('updatepegawai',&$this,'updatepegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('detailpegawai',&$this,'detailpegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('caripegawai',&$this,'caripegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('cariunit',&$this,'cariunit'));
        $this->xajax->register(XAJAX_FUNCTION, array('carijabatan',&$this,'carijabatan'));
        $this->xajax->register(XAJAX_FUNCTION, array('tambahkeluarga',&$this,'tambahkeluarga'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapuskeluarga',&$this,'hapuskeluarga'));
        $this->xajax->register(XAJAX_FUNCTION, array('editkeluarga',&$this,'editkeluarga'));
        $this->xajax->register(XAJAX_FUNCTION, array('tambahpendidikan',&$this,'tambahpendidikan'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapuspendidikan',&$this,'hapuspendidikan'));
        $this->xajax->register(XAJAX_FUNCTION, array('editpendidikan',&$this,'editpendidikan'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapuspegawai',&$this,'hapuspegawai'));
        $this->xajax->register(XAJAX_FUNCTION, array('getJabatan',&$this,'getJabatan'));
        $this->xajax->processRequest();

        $data['unit'] = $this->unit_model->getdataunit(''); 
        $data['jabatan'] = $this->jabatan_model->getdatajabatan(''); 
        $data['grade'] = $this->mpp_model->getdatagrade(); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $data['inactive_jabatan'] = [417,418,420,634];
        $data['status'] = !empty($this->input->get('status')) ? $this->input->get('status') : 'ACTIVE';

        $this->template->display('master/pegawai_new', $data);
    }

    public function pegawai_list()
    {

        $list = $this->pegawai_model->get_datatables();
        $data = array();
        foreach ($list as $item) {
            $row = array();
            $row['nik'] = $item->nik;
            $row['nama'] = $item->nama;
            $row['unit'] = $item->namaunit;
            $row['jabatan'] = $item->namajabatan;
            $row['status'] = $item->status;
            $row['created_at'] = $item->created_at;
            $row['updated_at'] = $item->updated_at;

            //add html for action

            $action = '<a class="btn mini blue sbold" data-toggle="modal" href="#tambah" onClick="detailpegawai(\''.$item->id.'\')"><i class="icon-eye-open"></i> Detail </a> ';

            if(getSession('role')!='User' || $this->session->userdata('sess_cbham')['nik'] == $item->nik){
                $action .= '<a class="btn mini yellow sbold" data-toggle="modal" href="#tambah" onClick="editpegawai(\''.$item->id.'\')"><i class="icon-edit"></i> Edit </a>';
                if(getSession('role') != 'User') $action .= '<a class="btn mini red sbold" data-toggle="modal" href="#" onClick="hapuspegawai(\''.$item->id.'\')"><i class="icon-trash"></i> Hapus </a>';
            }

            $action .= '<a class="btn mini purple sbold" target="_blank" href="'.site_url('pegawai/cetakcv/'.$item->id).'" ><i class="icon-print"></i> Cetak CV </a>';

            $row['action'] = $action;
            $row['will_expired'] = false;
            $row['expired'] = false;

            $current_date = strtotime(date('Y-m-d'));
            $next_month = strtotime( date('Y-m-d'). "+1 month" );
            if(!empty($item->tglselesaikontrak) && $item->status != 'Tetap'){
                if(strtotime($item->tglselesaikontrak) < $current_date){
                    $row['expired'] = true;
                } else if(strtotime($item->tglselesaikontrak) <= $next_month){
                    $row['will_expired'] = true;
                }
            }

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->pegawai_model->count_all(),
            "recordsFiltered" => $this->pegawai_model->count_filtered(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }

    function hapuspegawai($id){
        $objResponse = new xajaxResponse();
        $data1 = $this->pegawai_model->hapuspegawaibyid($id);
        $html = '';
        $dataPegawai = $this->pegawai_model->getdatapegawai('','','','','','','','',$this->limit,0);
        $data = $dataPegawai['result'];
        foreach ($data as $row) {
            $html = $html."<tr>
                            <td>".$row->nik."</td>
                            <td>".$row->nama."</td>
                            <td>".$row->namaunit."</td>
                            <td>".$row->namajabatan."</td>
                            <td>".$row->created_at."</td>
                            <td>".$row->updated_at."</td>
                            <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->id."')\"><i class='icon-edit'></i> Edit </a>
                                <a class='btn mini red sbold' data-toggle='modal' href='#' onClick=\"hapuspegawai('".$row->id."')\"><i class='icon-trash'></i> Hapus </a>
                                <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                            </td>
                        </tr>";
        }

        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataPegawai['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pegawai","innerHTML",$html);
        $objResponse->Assign("pagination","innerHTML",$pagination);
        //$objResponse->script("swal('Success', 'Data berhasil dihapus', 'success')");

        $objResponse->Assign("alert","innerHTML", succ_msg("Data berhasil dihapus"));
        return $objResponse;
    }

    function jabatanList(){
        $id     =   $this->input->post('id');          // The id of the input that submitted the request.
        $data   =   $this->input->post('data');        // The value of the textbox.
        
        if ($id && $data)
        {
            $empRec = $this->pegawai_model->getjabatanList($data);
            $dataList = array();
            if(sizeof($empRec)>0)
            {
                foreach($empRec as $row)
                {
                   $dataList[] = '<li id="' .$row->kojab. '"><a href="#">'.htmlentities($row->namajabatan).'</a></li>';              
                }
            }
            if (count($dataList)>=1)
            {
                $dataOutput = join("\r\n", $dataList);
                echo $dataOutput;
            }
            else
            {
                echo '<li><a href="#">No Results</a></li>';
            }       
        }
        else
        {
            echo 'Request Error';
        }
    }

    function tambahkeluarga($id_keluarga,$nik,$nama,$hubungan,$pekerjaan,$tgllahirkeluarga,$jkkeluarga,$kondisi){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik=='0' or $nama=='' or $pekerjaan=='' or $tgllahirkeluarga=='') {
            if ($nik=='' or $nik=='0') {
                $message = "NIK di Tab Data Pegawai belum diisi !";
            } 
            if ($nama=='') {
                $message = "Nama Keluarga belum diisi !";
            }
            if ($pekerjaan=='') {
                $message = "Pekerjaan Keluarga belum diisi !";
            }
            if ($tgllahirkeluarga=='') {
                $message = "Tanggal Lahir Keluarga belum diisi !";
            }
        } else {
            // $no = $this->pegawai_model->getnokeluarga($nik);
            $data = $this->pegawai_model->tambahkeluarga($id_keluarga,$nik,$nama,$hubungan,$pekerjaan,$tgllahirkeluarga,$jkkeluarga,$kondisi);
            $html = '';
            if (count($data)>0) {
                $no=0;
                foreach ($data as $row) {
                    $no = $no+1;
                    $html = $html."<tr>
                                    <td>".$no."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->hubungan."</td>
                                    <td>".$row->pekerjaan."</td>
                                    <td>".$row->tgllahir."</td>
                                    <td>".$row->kelamin."</td>
                                    <td>".$row->kondisi."</td>
                                    <td>
                                        <a class='btn mini red sbold' href='#' onClick=\"hapuskeluarga('".$row->nik."','".$row->id."')\"><i class='icon-trash'></i> Hapus </a> 
                                        <a class='btn mini green sbold' href='#' onClick=\"editkeluarga('".$row->nik."','".$row->id."')\"><i class='icon-pencil'></i> Edit </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("keluarga","innerHTML",$html);
            } 
        }
        return $objResponse;
    }

    function hapuskeluarga($nik,$id){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->hapuskeluarga($nik,$id);
        $html = '';
        if (!empty($data) && count($data)>0) {
            $no = 0;
            foreach ($data as $row) {
                $no = $no+1;
                $html = $html."<tr>
                                <td>".$no."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->hubungan."</td>
                                <td>".$row->pekerjaan."</td>
                                <td>".$row->tgllahir."</td>
                                <td>".$row->kelamin."</td>
                                <td>".$row->kondisi."</td>
                                <td>
                                    <a class='btn mini red sbold' href='#' onClick=\"hapuskeluarga('".$row->nik."','".$row->id."')\"><i class='icon-trash'></i> Hapus </a> 
                                    <a class='btn mini green sbold' href='#' onClick=\"editkeluarga('".$row->nik."','".$row->id."')\"><i class='icon-pencil'></i> Edit </a>    
                                </td>
                            </tr>";
            }
            $objResponse->Assign("keluarga","innerHTML",$html);
        } else {
            $objResponse->Assign("keluarga","innerHTML",$html);
        }
        return $objResponse;
    }

    function editkeluarga($nik,$no){
        $objResponse = new xajaxResponse();
        $datakel = $this->pegawai_model->getkeluarga($nik,true);
        if(!empty($datakel) && count($datakel)>0) {
            foreach ($datakel as $rowk) {
                if($no == $rowk->id){
                    $objResponse->Assign("id_keluarga","value",$rowk->id);
                    $objResponse->Assign("namakeluarga","value",$rowk->nama);
                    $objResponse->Assign("hubungan","value",$rowk->hubungan);
                    $objResponse->Assign("pekerjaan","value",$rowk->pekerjaan);
                    $objResponse->Assign("tgllahirkeluarga","value",$rowk->tgllahir);
                    $objResponse->Assign("jkkeluarga","value",$rowk->kelamin);
                    $objResponse->Assign("kondisi","value",$rowk->kondisi);
                };
            }
        }
        return $objResponse;
    }

    function simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,
        $jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,
        $pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,
        $rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,
        $statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,
        $namabank,$struktural,$tgltidakaktif){
        $objResponse = new xajaxResponse();
        $ktp = $this->clean($ktp);

        if ($nik=='' or $nik=='0' or $nama=='' or $tglmasuk=='' or $status=='' or $unit=='' or $jabatan=='' or $grade=='' or $struktural=='') {
            if ($nik=='' or $nik=='0') {
                $objResponse->script("alert('NIK belum diisi !')");
            } 
            if ($nama=='') {
                $objResponse->script("alert('Nama belum diisi !')");
            }
            if ($tglmasuk=='') {
                $objResponse->script("alert('Tanggal Masuk belum diisi !')");
            }
            if ($status=='') {
                $objResponse->script("alert('Status Pegawai belum diisi !')");
            }
            if ($unit=='') {
                $objResponse->script("alert('Unit/Satmingkal Pegawai belum diisi !')");
            }
            if ($jabatan=='') {
                $objResponse->script("alert('Jabatan Pegawai belum diisi !')");
            }
            if ($grade=='' || $struktural=='') {
                $objResponse->script("alert('Grade Pegawai belum diisi !')");
            }
//            if ($role=='') {
//                $objResponse->script("alert('Role User CBHAM belum diisi !')");
//            }
//            if ($username=='') {
//                $objResponse->script("alert('Username User CBHAM belum diisi !')");
//            }
//            if ($password=='') {
//                $objResponse->script("alert('Password User CBHAM belum diisi !')");
//            }
        } else {

            if(!empty($this->pegawai_model->cekpegawai($nik))){
                $objResponse->script("alert('NIK ".$nik." SUDAH DIGUNAKAN!')");
                return $objResponse;
            }

            if(!empty($this->pegawai_model->cekpegawai($ktp,0,'noktp'))){
                $objResponse->script("alert('KTP ".$ktp." SUDAH DIGUNAKAN!')");
                return $objResponse;
            }

            if(!empty($this->pegawai_model->cekpegawai($username,0,'username'))){
                $objResponse->script("alert('USERNAME ".$username." SUDAH DIGUNAKAN!')");
                return $objResponse;
            }

            $message = '';
            if ($tgllahir!='') {
                if (strpos($tgllahir, '-') !== false) {
                    list($year, $month, $day) = explode('-', $tgllahir);
                    if(checkdate($month, $day, $year)!=1){
                        $message = 'Format Tanggal Lahir Salah !';
                    }
                } else {
                    $message = 'Format Tanggal Lahir Salah !';
                }
            }

            if ($tglmasuk!='') {
                if (strpos($tglmasuk, '-') !== false) {
                    list($year, $month, $day) = explode('-', $tglmasuk);
                    if(checkdate($month, $day, $year)!=1){
                        $message = 'Format Tanggal Masuk Salah !';
                    }
                } else {
                    $message = 'Format Tanggal Masuk Salah !';
                }
            }

            if ($tglmulaikontrak!='') {
                if (strpos($tglmulaikontrak, '-') !== false) {
                    list($year, $month, $day) = explode('-', $tglmulaikontrak);
                    if(checkdate($month, $day, $year)!=1){
                        $message = 'Format Tanggal Mulai Kontrak Salah !';
                    }
                } else {
                    $message = 'Format Tanggal Mulai Kontrak Salah !';
                }
            }

            if ($tglselesaikontrak!='') {
                if (strpos($tglselesaikontrak, '-') !== false) {
                    list($year, $month, $day) = explode('-', $tglselesaikontrak);
                    if(checkdate($month, $day, $year)!=1){
                        $message = 'Format Tanggal Selesai Kontrak Salah !';
                    }
                } else {
                    $message = 'Format Tanggal Selesai Kontrak Salah !';
                }
            }

            if ($tglpengangkatan!='') {
                if (strpos($tglpengangkatan, '-') !== false) {
                    list($year, $month, $day) = explode('-', $tglpengangkatan);
                    if(checkdate($month, $day, $year)!=1){
                        $message = 'Format Tanggal Pengangkatan Salah !';
                    }
                } else {
                    $message = 'Format Tanggal Pengangkatan Salah !';
                }
            }
            if ($tgltidakaktif!='') {
                if (strpos($tgltidakaktif, '-') !== false) {
                    list($year, $month, $day) = explode('-', $tgltidakaktif);
                    if(checkdate($month, $day, $year)!=1){
                        $message = 'Format Tanggal Tidak Aktif Salah !';
                    }
                } else {
                    $message = 'Format Tanggal Tidak Aktif Salah !';
                }
            }
            if ($message=='') {
                $data = $this->pegawai_model->simpanpegawai($nik,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural,$tgltidakaktif);
                if ($data>0) {
                    $objResponse->script("kosong()");
                    $objResponse->script("$('#tambah').modal('hide')");
                    $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Disimpan"));
                    $objResponse->script("filter()");
                } else {
                    $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Disimpan !"));
                    //$objResponse->script("swal('Failed', 'Data Pegawai ".$nama." Gagal Disimpan !', 'error')");
                    // $objResponse->script("alert('Data Gagal Disimpan')");
                }
            } else {
                $objResponse->script("alert('".$message."')");
            }
        }
        return $objResponse;
    }

    function caripegawai($pegawai, $page = 1){
        $objResponse = new xajaxResponse();
        $dataPegawai = $this->pegawai_model->caripegawai($pegawai,$this->limit,($this->limit * ($page - 1))); 
        $data = $dataPegawai['result'];
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $color = "";
                if ($row->complete=='0') {
                    $color = "bgcolor='#FFAAAA'";
                }
                if(getSession('role')!='User'){
                    $html = $html."<tr ".$color.">
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->created_at."</td>
                                    <td>".$row->updated_at."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->id."')\"><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' data-toggle='modal' href='#' onClick=\"hapuspegawai('".$row->id."')\"><i class='icon-trash'></i> Hapus </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                } else {
                     $html = $html."<tr ".$color.">
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->created_at."</td>
                                    <td>".$row->updated_at."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                }
            }
        } else {
            $html = $html."<tr><td colspan='7' align='center'>Data Tidak Ada</td></tr>";
        }

        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataPegawai['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pegawai","innerHTML",$html);
        $objResponse->Assign("pagination","innerHTML",$pagination);

        return $objResponse;
    }

    function cariunit($unit, $page = 1){
        $objResponse = new xajaxResponse();
        $dataPegawai = $this->pegawai_model->cariunit($unit,$this->limit,($this->limit * ($page - 1))); 
        $data = $dataPegawai['result'];
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $color = "";
                if ($row->complete=='0') {
                    $color = "bgcolor='#FFAAAA'";
                }
                if(getSession('role')!='User'){
                    $html = $html."<tr ".$color.">
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->created_at."</td>
                                    <td>".$row->updated_at."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->id."')\"><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' data-toggle='modal' href='#' onClick=\"hapuspegawai('".$row->id."')\"><i class='icon-trash'></i> Hapus </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                } else {
                     $html = $html."<tr ".$color.">
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->created_at."</td>
                                    <td>".$row->updated_at."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                       <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                }
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }

        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataPegawai['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pegawai","innerHTML",$html);
        $objResponse->Assign("pagination","innerHTML",$pagination);

        return $objResponse;
    }

    function carijabatan($jabatan, $page = 1){
        $objResponse = new xajaxResponse();
        $dataPegawai = $this->pegawai_model->carijabatan($jabatan,$this->limit,($this->limit * ($page - 1))); 
        $data = $dataPegawai['result'];
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $color = "";
                if ($row->complete=='0') {
                    $color = "bgcolor='#FFAAAA'";
                }
                if(getSession('role')!='User'){
                    $html = $html."<tr ".$color.">
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->created_at."</td>
                                    <td>".$row->updated_at."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini yellow sbold' data-toggle='modal' href='#tambah' onClick=\"editpegawai('".$row->id."')\"><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red sbold' data-toggle='modal' href='#' onClick=\"hapuspegawai('".$row->id."')\"><i class='icon-trash'></i> Hapus </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                } else {
                     $html = $html."<tr ".$color.">
                                    <td>".$row->nik."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->namaunit."</td>
                                    <td>".$row->namajabatan."</td>
                                    <td>".$row->created_at."</td>
                                    <td>".$row->updated_at."</td>
                                    <td><a class='btn mini blue sbold' data-toggle='modal' href='#tambah' onClick=\"detailpegawai('".$row->id."')\"><i class='icon-eye-open'></i> Detail </a>
                                        <a class='btn mini purple sbold' target='_blank'  href='".base_url()."index.php/pegawai/cetakcv/".urlencode($row->id)."'><i class='icon-print'></i> Cetak CV </a>
                                    </td>
                                </tr>";
                }
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }

        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataPegawai['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pegawai","innerHTML",$html);
        $objResponse->Assign("pagination","innerHTML",$pagination);

        return $objResponse;
    }    

    function getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan){
        $html='';
        $objResponse = new xajaxResponse();
        $dataPegawai =$this->pegawai_model->getdatapegawai($nik,$nama,$tglmasuk1,$tglmasuk2,$pendidikan,$status,$unit,$jabatan,$this->limit,0);
        $data = $dataPegawai['result'];
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."pegawai/editpegawai/".$row->id."'>Edit</a>";
                $html = $html."<tr>
                                <td>".$row->nik."</td>
                                <td>".$row->nama."</td>
                                <td>".$row->tgllahir."</td>
                                <td>".$row->tglmasuk."</td>
                                <td>".$row->pendidikan."</td>
                                <td>".$row->status."</td>
                                <td>".$row->namaunit."</td>
                                <td>".$row->namajabatan."</td>
                                <td>".$edit."</td>
                               </tr>";
            }

            $item['currentpage'] = 1;
            $item['totalpage'] = ceil($dataPegawai['total']/$this->limit);
            $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

            $objResponse->Assign("pegawai","innerHTML",$html);
            $objResponse->Assign("pagination","innerHTML",$pagination);
        } else {
            $objResponse->Assign("alert","innerHTML", err_msg("Data tidak ditemukan"));
            //$objResponse->script("swal('No Data', 'Data Tidak Ada', 'info')");
        }
        return $objResponse;
    }

    function editpegawai($id){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->getpegawaibyid($id);
        $nik = null;
        foreach ($data as $row) {
            $nik = $row->nik;
            $html = '';
            $datax = $this->pegawai_model->getJabatan($row->unit); 
            //$html .='<select class="span5 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" id="jabatan" tabindex="1">';
            if(count($datax)>0){
                foreach ($datax as $rowx) {
                    $html = $html."<option value='".$rowx->kojab."'>".$rowx->namajabatan."</option>";
                }
            } else {
                $html = $html."<option value=''>Tidak Ada Jabatan</option>";
            }
            //$html .='</select>';

            $objResponse->Assign("jabatan","innerHTML",$html);
            $objResponse->script("$('.selectpicker').selectpicker('refresh')");
            // $objResponse->Assign("nik","disabled",true);
            $objResponse->script("$('#update').show()");
            $objResponse->script("$('#simpan').hide()");
            $objResponse->script("$('#tambahpendidikan').show()");
            $objResponse->script("$('#tambahkeluarga').show()");
            $objResponse->script("set_status_kepegawaian()");
            $objResponse->Assign("id_pegawai","value",$row->id);
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("nik2","value",$row->nik);
            $objResponse->Assign("pegawai_id","value",$row->id);
            $objResponse->Assign("ktp","value",$row->noktp);
            $objResponse->Assign("kk","value",$row->nokk);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("gelardepan","value",$row->gelardepan);
            $objResponse->Assign("gelarbelakang","value",$row->gelarbelakang);
            $objResponse->Assign("tempatlahir","value",$row->tempatlahir);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("grade","value",$row->grade);
            $objResponse->Assign("struktural","value",$row->jenisjabatan);
            $objResponse->Assign("namajabatan","value",$row->namajabatan);
            $objResponse->Assign("jabatan","value",$row->jabatan); // tab1
            $objResponse->script("$('.selectpicker').selectpicker('render')");
            $objResponse->Assign("jk","value",$row->kelamin);
            $objResponse->Assign("darah","value",$row->darah);
            $objResponse->Assign("statuskeluarga","value",$row->statuskeluarga);
            $objResponse->Assign("agama","value",$row->agama);
            $objResponse->Assign("alamat","value",$row->alamat);
            $objResponse->Assign("kota","value",$row->kota);
            $objResponse->Assign("kodepos","value",$row->kodepos);
            $objResponse->Assign("telepon","value",$row->telp);
            $objResponse->Assign("hp","value",$row->hp); //tab2
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("namauniv","value",$row->namauniv);
            $objResponse->Assign("prodi","value",$row->jurusan);
            $objResponse->Assign("lulus","value",$row->lulus);

            if($row->tempatbelajar == 'Dalam Negeri'){
                $objResponse->script("$('#dalamnegeri').attr('checked','checked').closest('span').addClass('checked');");
            }else if($row->tempatbelajar == 'Luar Negeri'){
                $objResponse->script("$('#luarnegeri').attr('checked','checked').closest('span').addClass('checked');");
            }

            $objResponse->Assign("ijazah","value",$row->ijazah); //tab3
            $objResponse->Assign("rekening","value",$row->rekening);
            $objResponse->Assign("npwp","value",$row->npwp);
            $objResponse->Assign("statusbpjskt","value",$row->statusbpjskt);
            $objResponse->Assign("bpjskt","value",$row->bpjskt);
            $objResponse->Assign("statusbpjskes","value",$row->statusbpjskes);
            $objResponse->Assign("bpjskes","value",$row->bpjskes);
            $objResponse->Assign("statusppip","value",$row->statusppip);
            $objResponse->Assign("ppip","value",$row->ppip);
            $objResponse->Assign("statusppukp","value",$row->statusppukp);
            $objResponse->Assign("ppukp","value",$row->ppukp);
            $objResponse->Assign("statusjiwasraya","value",$row->statusjiwasraya);
            $objResponse->Assign("jiwasraya","value",$row->jiwasraya);
            $objResponse->Assign("statusjkdk","value",$row->statusjkdk);
            $objResponse->Assign("jkdk","value",$row->jkdk); //tab4
            $objResponse->Assign("role","value",$row->role);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->Assign("tglmulaikontrak","value",$row->tglmulaikontrak);
            $objResponse->Assign("tglselesaikontrak","value",$row->tglselesaikontrak);
            $objResponse->Assign("tglpengangkatan","value",$row->tglpengangkatan);
            $objResponse->Assign("tgltidakaktif","value",$row->tgltidakaktif);
            $objResponse->Assign("namabank","value",$row->namabank);

            $objResponse->script("set_status_kepegawaian()");

        }

        $datakel = $this->pegawai_model->getkeluarga($nik);
        $html = '';
        if (!empty($datakel) &&count($datakel)>0) {
            $no=0;
            foreach ($datakel as $rowk) {
                $no = $no+1;
                $html = $html."<tr>
                                <td>".$no."</td>
                                <td>".$rowk->nama."</td>
                                <td>".$rowk->hubungan."</td>
                                <td>".$rowk->pekerjaan."</td>
                                <td>".$rowk->tgllahir."</td>
                                <td>".$rowk->kelamin."</td>
                                <td>".$rowk->kondisi."</td>
                                <td>
                                    <a class='btn mini red sbold' href='#' onClick=\"hapuskeluarga('".$rowk->nik."','".$rowk->id."')\"><i class='icon-trash'></i> Hapus </a> 
                                    <a class='btn mini green sbold' href='#' onClick=\"editkeluarga('".$rowk->nik."','".$rowk->id."')\"><i class='icon-pencil'></i> Edit </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("keluarga","innerHTML",$html);
        } else {
            $objResponse->Assign("keluarga","innerHTML",$html);
        }

        $datapen = $this->pegawai_model->getpendidikan($nik);
        $html1 = '';
        if(!empty($datapen) && count($datapen)>0) {
            $no1=0;
            foreach ($datapen as $rowp) {
                $no1 = $no1+1;
                $html1 = $html1."<tr>
                                <td>".$no1."</td>
                                <td>".$rowp->pendidikan."</td>
                                <td>".$rowp->namauniv."</td>
                                <td>".$rowp->jurusan."</td>
                                <td>".$rowp->lulus."</td>
                                <td>".$rowp->tempatbelajar."</td>
                                <td>".$rowp->ijazah."</td>
                                <td>
                                    <a class='btn mini red sbold' href='#' onClick=\"hapuspendidikan('".$rowp->nik."','".$rowp->noindex."')\"><i class='icon-trash'></i> Hapus </a> 
                                    <a class='btn mini green sbold' href='#' onClick=\"editpendidikan('".$rowp->nik."','".$rowp->noindex."')\"><i class='icon-pencil'></i> Edit </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("datapendidikan","innerHTML",$html1);
        } else {
            $objResponse->Assign("datapendidikan","innerHTML",$html1);
        }
        $objResponse->Assign("judul","innerHTML","Update Pegawai");
        $objResponse->script("aktif()");
        return $objResponse;
    }

    function updatepegawai($id,$nik,$nik2,$pegawai_id,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural,$tgltidakaktif){
        $objResponse = new xajaxResponse();

        $data = $this->pegawai_model->getpegawaibyid($id);
        $pegawai = $data[0];
        if(empty($pegawai)) $objResponse->script("alert('Pegawai tidak ditemukan!')");

        $ktp = $this->clean($ktp);
        if ($nik=='' or $nik=='0' or $nama=='' or $tglmasuk=='' or $status=='' or $unit=='' or $jabatan=='' or $grade=='' or $struktural=='') {
            if ($nik=='' or $nik=='0') {
                $objResponse->script("alert('NIK belum diisi !')");
            } 
            if ($nama=='') {
                $objResponse->script("alert('Nama belum diisi !')");
            }
            if ($tglmasuk=='') {
                $objResponse->script("alert('Tanggal Masuk belum diisi !')");
            }
            if ($status=='') {
                $objResponse->script("alert('Status Pegawai belum diisi !')");
            }
            if ($unit=='') {
                $objResponse->script("alert('Unit/Satmingkal Pegawai belum diisi !')");
            }
            if ($jabatan=='') {
                $objResponse->script("alert('Jabatan Pegawai belum diisi !')");
            }
            if ($grade=='' || $struktural=='') {
                $objResponse->script("alert('Grade Pegawai belum diisi !')");
            }
            // if ($role=='') {
            //     $objResponse->script("alert('Role User CBHAM belum diisi !')");
            // }
            // if ($username=='') {
            //     $objResponse->script("alert('Username User CBHAM belum diisi !')");
            // }
            // if ($password=='') {
            //     $objResponse->script("alert('Password User CBHAM belum diisi !')");
            // }
        } else {
            if(!empty($this->pegawai_model->cekpegawai($nik,$id))){
                $objResponse->script("alert('NIK ".$nik." SUDAH DIGUNAKAN!')");
                return $objResponse;
            }

            if(!empty($this->pegawai_model->cekpegawai($ktp,$id,'noktp'))){
                $objResponse->script("alert('KTP ".$ktp." SUDAH DIGUNAKAN!')");
                return $objResponse;
            }

            if(!empty($this->pegawai_model->cekpegawai($username,$id,'username'))){
                $objResponse->script("alert('USERNAME ".$username." SUDAH DIGUNAKAN!')");
                return $objResponse;
            }

            $inactive_jabatan = [417,418,420,634];

            if(!in_array($jabatan,$inactive_jabatan) && in_array($pegawai->jabatan,$inactive_jabatan)){
                if(!empty($this->pegawai_model->cekpegawai($nik)) && ($pegawai->jabatan != $jabatan)){
                    $objResponse->script("alert('Untuk Aktivasi Pegawai Kembali tidak boleh menggunakan : ".$nik.", gunakan NIK lain!')");
                    return $objResponse;
                }
            }

            $data = $this->pegawai_model->updatepegawai($nik,$nik2,$pegawai_id,$ktp,$kk,$nama,$gelardepan,$gelarbelakang,$tempatlahir,$tgllahir,$tglmasuk,$status,$unit,$jabatan,$jk,$darah,$statuskeluarga,$agama,$alamat,$kota,$kodepos,$telepon,$hp,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah,$rekening,$npwp,$statusbpjskt,$bpjskt,$statusbpjskes,$bpjskes,$statusppip,$ppip,$statusppukp,$ppukp,$statusjiwasraya,$jiwasraya,$statusjkdk,$jkdk,$role,$username,$password,$grade,$tglmulaikontrak,$tglselesaikontrak,$tglpengangkatan,$namabank,$struktural,$tgltidakaktif);
            if ($data>0) {
                // $objResponse->script("alert('Simpan Berhasil')");
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->script("kosong()");
                $objResponse->Assign("alert","innerHTML", succ_msg("Data Pegawai ".$nama." Berhasil Di Update"));
                //$objResponse->script("swal('Success', 'Data Pegawai ".$nama." Berhasil Di Update', 'success')");
                $objResponse->script("filter()");
            } else {
                $objResponse->Assign("alert","innerHTML", err_msg("Data Pegawai ".$nama." Gagal Di Update !"));
                //$objResponse->script("swal('Failed', 'Data Pegawai ".$nama." Gagal Di Update', 'error')");
                // $objResponse->script("alert('Data Pegawai ".$nik." - ".$nama." Gagal Di Update')");
            }
        }
        return $objResponse;
    }

    function detailpegawai($id){
        $objResponse = new xajaxResponse();
        //echo getSession('user');
        $data = $this->pegawai_model->getpegawaibyid($id);
        $nik = null;
        foreach ($data as $row) {
            $nik = $row->nik;
            $html = '';
            $datax = $this->pegawai_model->getJabatan($row->unit); 
            //$html .='<select class="span5 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" id="jabatan" tabindex="1">';
            if(count($datax)>0){
                foreach ($datax as $rowx) {
                    $html = $html."<option value='".$rowx->kojab."'>".$rowx->namajabatan."</option>";
                }
            } else {
                $html = $html."<option value=''>Tidak Ada Jabatan</option>";
            }
            //$html .='</select>';

            $objResponse->Assign("jabatan","innerHTML",$html);
            $objResponse->script("$('.selectpicker').selectpicker('refresh')");
            // $objResponse->Assign("nik","disabled",true);
            $objResponse->script("$('#update').hide()");
            $objResponse->script("$('#simpan').hide()");
            $objResponse->script("$('#tambahkeluarga').hide()");
            $objResponse->script("$('#tambahpendidikan').hide()");
            $objResponse->script("set_status_kepegawaian()");
            $objResponse->Assign("nik","value",$row->nik);
            $objResponse->Assign("ktp","value",$row->noktp);
            $objResponse->Assign("kk","value",$row->nokk);
            $objResponse->Assign("nama","value",$row->nama);
            $objResponse->Assign("gelardepan","value",$row->gelardepan);
            $objResponse->Assign("gelarbelakang","value",$row->gelarbelakang);
            $objResponse->Assign("tempatlahir","value",$row->tempatlahir);
            $objResponse->Assign("tgllahir","value",$row->tgllahir);
            $objResponse->Assign("tglmasuk","value",$row->tglmasuk);
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("status","value",$row->status);
            $objResponse->Assign("unit","value",$row->unit);
            $objResponse->Assign("grade","value",$row->grade);
            $objResponse->Assign("struktural","value",$row->jenisjabatan);
            $objResponse->Assign("jabatan","value",$row->jabatan); // tab1
            $objResponse->script("$('.selectpicker').selectpicker('render')");
            $objResponse->Assign("jk","value",$row->kelamin);
            $objResponse->Assign("darah","value",$row->darah);
            $objResponse->Assign("statuskeluarga","value",$row->statuskeluarga);
            $objResponse->Assign("agama","value",$row->agama);
            $objResponse->Assign("alamat","value",$row->alamat);
            $objResponse->Assign("kota","value",$row->kota);
            $objResponse->Assign("kodepos","value",$row->kodepos);
            $objResponse->Assign("telepon","value",$row->telp);
            $objResponse->Assign("hp","value",$row->hp); //tab2
            $objResponse->Assign("pendidikan","value",$row->pendidikan);
            $objResponse->Assign("namauniv","value",$row->namauniv);
            $objResponse->Assign("prodi","value",$row->jurusan);
            $objResponse->Assign("lulus","value",$row->lulus);

            if($row->tempatbelajar == 'Dalam Negeri'){
                $objResponse->script("$('#dalamnegeri').attr('checked','checked').closest('span').addClass('checked');");
            }else if($row->tempatbelajar == 'Luar Negeri'){
                $objResponse->script("$('#luarnegeri').attr('checked','checked').closest('span').addClass('checked');");
            }

            $objResponse->Assign("ijazah","value",$row->ijazah); //tab3
            $objResponse->Assign("rekening","value",$row->rekening);
            $objResponse->Assign("npwp","value",$row->npwp);
            $objResponse->Assign("statusbpjskt","value",$row->statusbpjskt);
            $objResponse->Assign("bpjskt","value",$row->bpjskt);
            $objResponse->Assign("statusbpjskes","value",$row->statusbpjskes);
            $objResponse->Assign("bpjskes","value",$row->bpjskes);
            $objResponse->Assign("statusppip","value",$row->statusppip);
            $objResponse->Assign("ppip","value",$row->ppip);
            $objResponse->Assign("statusppukp","value",$row->statusppukp);
            $objResponse->Assign("ppukp","value",$row->ppukp);
            $objResponse->Assign("statusjiwasraya","value",$row->statusjiwasraya);
            $objResponse->Assign("jiwasraya","value",$row->jiwasraya);
            $objResponse->Assign("statusjkdk","value",$row->statusjkdk);
            $objResponse->Assign("jkdk","value",$row->jkdk); //tab4
            $objResponse->Assign("role","value",$row->role);
            $objResponse->Assign("username","value",$row->username);
            $objResponse->script("$('#luarnegeri').prop('checked','checked');");
            $objResponse->Assign("tglmulaikontrak","value",$row->tglmulaikontrak);
            $objResponse->Assign("tglselesaikontrak","value",$row->tglselesaikontrak);
            $objResponse->Assign("tglpengangkatan","value",$row->tglpengangkatan);
            $objResponse->Assign("tgltidakaktif","value",$row->tgltidakaktif);
            $objResponse->Assign("namabank","value",$row->namabank);

            $objResponse->script("set_status_kepegawaian()");
        }

        $datakel = $this->pegawai_model->getkeluarga($nik);
        $html = '';
        if (!empty($datakel) && count($datakel)>0) {
            $no=0;
            foreach ($datakel as $rowk) {
                $no = $no+1;
                $html = $html."<tr>
                                <td>".$no."</td>
                                <td>".$rowk->nama."</td>
                                <td>".$rowk->hubungan."</td>
                                <td>".$rowk->pekerjaan."</td>
                                <td>".$rowk->tgllahir."</td>
                                <td>".$rowk->kelamin."</td>
                                <td>".$rowk->kondisi."</td>
                                <td></td>
                            </tr>";
            }
            $objResponse->Assign("keluarga","innerHTML",$html);
        } else {
            $objResponse->Assign("keluarga","innerHTML",$html);
        }

        $datapen = $this->pegawai_model->getpendidikan($nik);
        $html1 = '';
        if (!empty($datapen) && count($datapen)>0) {
            $no1=0;
            foreach ($datapen as $rowp) {
                $no1 = $no1+1;
                $html1 = $html1."<tr>
                                <td>".$no1."</td>
                                <td>".$rowp->pendidikan."</td>
                                <td>".$rowp->namauniv."</td>
                                <td>".$rowp->jurusan."</td>
                                <td>".$rowp->lulus."</td>
                                <td>".$rowp->tempatbelajar."</td>
                                <td>".$rowp->ijazah."</td>
                                <td></td>
                            </tr>";
            }
            $objResponse->Assign("datapendidikan","innerHTML",$html1);
        } else {
            $objResponse->Assign("datapendidikan","innerHTML",$html1);
        }
        $objResponse->Assign("judul","innerHTML","Detail Pegawai");
        $objResponse->script("inaktif()");

        return $objResponse;
    }

    function cetakcv($id){
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));  
        $data['datapeg'] = $this->pegawai_model->getpegawaibyid($id);
        $data['keluarga'] = $this->pegawai_model->getkeluarga($data['datapeg'][0]->nik);
        $data['pendidikan'] = $this->pegawai_model->getpendidikan($data['datapeg'][0]->nik);
        $this->load->view('master\cetakcv_fpdf',$data);

        /*---- with m_pdf ---*/
        /* //load the view and saved it into $html variable
        $html=$this->load->view('master\cetakcv',$data,true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "cv.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");*/
    }

    function cetakpegawai() {
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $data['dataku'] = $this->pegawai_model->download_pegawai();
        $this->load->view('master\cetakpegawainew', $data);
    }  

    function tambahpendidikan($id_pendidikan,$nik,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah){
        $objResponse = new xajaxResponse();
        if ($nik=='' or $nik=='0' or $pendidikan=='' or $namauniv=='' or $prodi=='' or $lulus=='' or $tempat=='' or $ijazah=='') {
            if ($nik=='' or $nik=='0') {
                $message = "NIK di Tab Data Pegawai belum diisi !";
            } 
            if ($pendidikan=='') {
                $message = "Pendidikan belum dipilih !";
            }
            if ($namauniv=='') {
                $message = "Nama Sekolah belum diisi !";
            }
            if ($prodi=='') {
                $message = "Jurusan belum diisi !";
            }
            if ($lulus=='') {
                $message = "Tahun Lulus belum diisi !";
            }
            if ($tempat=='') {
                $message = "Tempat Belajar belum dipilih !";
            }
            if ($ijazah=='') {
                $message = "Nomor Ijazah belum diisi !";
            }
            $objResponse->script("alert('".$message."')");
        } else {
            // $no = $this->pegawai_model->getnokeluarga($nik);
            $data = $this->pegawai_model->tambahpendidikan($id_pendidikan,$nik,$pendidikan,$namauniv,$prodi,$lulus,$tempat,$ijazah);
            $html = '';
            if (!empty($data) && count($data)>0) {
                $no=0;
                foreach ($data as $row) {
                    $no = $no+1;
                    $html = $html."<tr>
                                    <td>".$no."</td>
                                    <td>".$row->pendidikan."</td>
                                    <td>".$row->namauniv."</td>
                                    <td>".$row->jurusan."</td>
                                    <td>".$row->lulus."</td>
                                    <td>".$row->tempatbelajar."</td>
                                    <td>".$row->ijazah."</td>
                                    <td>
                                        <a class='btn mini red sbold' href='#' onClick=\"hapuspendidikan('".$row->nik."','".$row->noindex."')\"><i class='icon-trash'></i> Hapus </a> 
                                        <a class='btn mini green sbold' href='#' onClick=\"editpendidikan('".$row->nik."','".$row->noindex."')\"><i class='icon-pencil'></i> Edit </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("datapendidikan","innerHTML",$html);
            } 
        }
        return $objResponse;
    }

    function hapuspendidikan($nik,$nama){
        $objResponse = new xajaxResponse();
        $data = $this->pegawai_model->hapuspendidikan($nik,$nama);
        $html = '';
        if (!empty($data) && count($data)>0) {
            $no = 0;
            foreach ($data as $row) {
                $no = $no+1;
                $html = $html."<tr>
                                    <td>".$no."</td>
                                    <td>".$row->pendidikan."</td>
                                    <td>".$row->namauniv."</td>
                                    <td>".$row->jurusan."</td>
                                    <td>".$row->lulus."</td>
                                    <td>".$row->tempatbelajar."</td>
                                    <td>".$row->ijazah."</td>
                                    <td>
                                        <a class='btn mini red sbold' href='#' onClick=\"hapuspendidikan('".$row->nik."','".$row->noindex."')\"><i class='icon-trash'></i> Hapus </a> 
                                        <a class='btn mini green sbold' href='#' onClick=\"editpendidikan('".$row->nik."','".$row->noindex."')\"><i class='icon-pencil'></i> Edit </a>
                                    </td>
                                </tr>";
            }
            $objResponse->Assign("datapendidikan","innerHTML",$html);
        } else {
            $objResponse->Assign("datapendidikan","innerHTML",$html);
        }
        return $objResponse;
    }

    function editpendidikan($nik,$no){
        $objResponse = new xajaxResponse();
        $datapen = $this->pegawai_model->getpendidikan($nik,true);
        if(!empty($datapen) && count($datapen)>0) {
            foreach ($datapen as $rowp) {
                if($no == $rowp->noindex){
                    $objResponse->Assign("id_pendidikan","value",$rowp->noindex);
                    $objResponse->Assign("pendidikan","value",$rowp->pendidikan);
                    $objResponse->Assign("namauniv","value",$rowp->namauniv);
                    $objResponse->Assign("prodi","value",$rowp->jurusan);
                    $objResponse->Assign("lulus","value",$rowp->lulus);
                    $objResponse->Assign("ijazah","value",$rowp->ijazah);
                    if($rowp->tempatbelajar == 'Dalam Negeri'){
                        $objResponse->script("$('#dalamnegeri').attr('checked','checked').closest('span').addClass('checked');");
                    }else if($rowp->tempatbelajar == 'Luar Negeri'){
                        $objResponse->script("$('#luarnegeri').attr('checked','checked').closest('span').addClass('checked');");
                    }
                };
            }
        }
        return $objResponse;
    }

    public function getJabatan($unit)
    {
        $objResponse = new xajaxResponse();
        $html = '';
        $data = $this->pegawai_model->getJabatan($unit); 
        //$html .='<select class="span5 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" id="jabatan" tabindex="1">';
        if(count($data)>0){
            foreach ($data as $row) {
                $html = $html."<option value='".$row->kojab."'>".$row->namajabatan."</option>";
            }
        } else {
            $html = $html."<option value=''>Tidak Ada Jabatan</option>";
        }
        //$html .='</select>';

        $objResponse->Assign("jabatan","innerHTML",$html);
        $objResponse->script("$('.selectpicker').selectpicker('refresh')");
        return $objResponse;
    }

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function update_pendidikan(){
        $pendidikan = $this->db->get('pendidikan')->result();

        $priority_pendidikan = [
            "SD"=>0,
            "SMP"=>1,
            "SMA/SMK"=>2,
            "D1"=>3,
            "D2"=>4,
            "D3"=>5,
            "D4"=>6,
            "S1"=>7,
            "S2"=>8,
            "S3"=>9,
        ];
        foreach ($pendidikan as $item){
            $this->db->where('pegawai_id',$item->pegawai_id)
                ->where('pendidikan',$item->pendidikan)
                ->update('pendidikan',['priority'=>$priority_pendidikan[$item->pendidikan]]);
        }

    }

    function update_pendidikan_pegawai(){
        $pegawai = $this->db->get('pegawai')->result();
        foreach ($pegawai as $row){
            $pendidikan = $this->db->where('nik',$row->nik)
                ->order_by('priority')
                ->get('pendidikan')
                ->result();
            $pendidikan_terakhir = null;
            foreach ($pendidikan as $item){
                $pendidikan_terakhir = array(
                    'pendidikan'    => $item->pendidikan,
                    'namauniv'      => $item->namauniv,
                    'jurusan'       => $item->jurusan,
                    'lulus'         => $item->lulus,
                    'tempatbelajar' => $item->tempatbelajar,
                    'ijazah'        => $item->ijazah,
                );
            }

            if(!empty($pendidikan_terakhir)){
                $this->db->where('id = "'.$row->id.'"')->update('pegawai',[
                    'pendidikan'    => $pendidikan_terakhir['pendidikan'],
                    'namauniv'      => $pendidikan_terakhir['namauniv'],
                    'jurusan'       => $pendidikan_terakhir['jurusan'],
                    'lulus'         => $pendidikan_terakhir['lulus'],
                    'tempatbelajar' => $pendidikan_terakhir['tempatbelajar'],
                    'ijazah'        => $pendidikan_terakhir['ijazah'],
                ]);
            }
        }
    }

}
?>