<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masterska extends MY_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model('m_masterska');
    }

    function index() {
        $data['title'] = 'Master SKA';
        $this->xajax->register(XAJAX_FUNCTION, array('simpanmasterska',&$this,'simpanmasterska'));   
        $this->xajax->register(XAJAX_FUNCTION, array('editmasterska',&$this,'editmasterska')); 
        $this->xajax->register(XAJAX_FUNCTION, array('updatemasterska',&$this,'updatemasterska'));    
        $this->xajax->register(XAJAX_FUNCTION, array('carimasterska',&$this,'carimasterska'));            
        $this->xajax->register(XAJAX_FUNCTION, array('deletemasterska',&$this,'deletemasterska'));
        $this->xajax->register(XAJAX_FUNCTION, array('hapusmasterska',&$this,'hapusmasterska'));
        $this->xajax->processRequest();

        $dataMasterSka = $this->m_masterska->getdatamasterska('',$this->limit,0);
        $data['masterska'] = $dataMasterSka['result'];
        $item['currentpage'] = 1;
        $item['totalpage'] = ceil($dataMasterSka['total']/$this->limit);
        $data['pagination'] = $this->load->view('template_backend/pagination', $item, TRUE);

        // $data['kelomjab'] = $this->m_masterska->getkelommasterska(''); 
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('master/v_masterska', $data);
    }

    function simpanmasterska($kodeska,$namaska,$ijasah){
        $objResponse = new xajaxResponse();
        if (($kodeska=='')||($namaska=='')||($ijasah=='')) {
            $objResponse->script("alert('Periksa Kembali Ada Data Yang Belum Di Isi !')");
        } else {
            $data = $this->m_masterska->simpanmasterska($kodeska,$namaska,$ijasah);
            if ($data>0) {
                $objResponse->Assign("alert","innerHTML", succ_msg("Nama SKA ".$namaska." Berhasil Disimpan"));
                $objResponse->script("$('#tambah').modal('hide')");
                $objResponse->Assign("namaska","value","");
                $html = '';
                $data = $this->m_masterska->getdatamasterska(''); 
                foreach ($data as $row) {
                    $html = $html."<tr>
                                    <td>".$row->kodeska."</td>
                                    <td>".$row->namaska."</td>
                                    <td>".$row->ijasah."</td>
                                    <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editmasterska(".$row->kodeska.")'><i class='icon-edit'></i> Edit </a>
                                        <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusmasterska(".$row->kodeska.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                                </tr>";
                }
                $objResponse->Assign("masterska","innerHTML",$html);
            } else {
                $objResponse->script("alert('Data Gagal Disimpan')");
            }
        }
        return $objResponse;
    }

    function carimasterska($namaska,$page = 1){
        $objResponse = new xajaxResponse();
        $dataMasterSka = $this->m_masterska->carimasterska($namaska,$this->limit,($this->limit * ($page - 1)));
        $data = $dataMasterSka['result']; 
        $html='';
        if (count($data)>0) { 
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodeska."</td>
                                <td>".$row->namaska."</td>
                                <td>".$row->ijasah."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editmasterska(".$row->kodeska.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusmasterska(".$row->kodeska.")'><i class='icon-trash'></i> Hapus </a>
                                    </td>
                            </tr>";
            }
        } else {
            $html = $html."<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        $item['currentpage'] = $page;
        $item['totalpage'] = ceil($dataMasterSka['total']/$this->limit);
        $pagination = $this->load->view('template_backend/pagination', $item, TRUE);

        $objResponse->Assign("pagination","innerHTML",$pagination);
        $objResponse->Assign("masterska","innerHTML",$html);
        return $objResponse;
    }

    function getdatamasterska($namaska){
        $html='';
        $objResponse = new xajaxResponse();
        $data = $this->m_masterska->getdatamasterska($namaska);
        if (count($data)>0) {
            foreach ($data as $row) {
                $edit = "<a href='".base_url()."masterska/editmasterska/".$row->kodeska."'>Edit</a>";
                $delete = "<a href='".base_url()."masterska/hapusmasterska/".$row->kodeska."'>Hapus</a>";
                $html = $html."<tr>
                                <td>".$row->kodeska."</td>
                                <td>".$row->namaska."</td>
                                <td>".$row->ijasah."</td>
                                <td>".$edit."</td>
                                <td>".$delete."</td>
                               </tr>";
            }
            $objResponse->Assign("masterska","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data Tidak Ada')");
        }
        return $objResponse;
    }

    function editmasterska($kodeska){
        $objResponse = new xajaxResponse();
        $data = $this->m_masterska->getmasterskabykodeska($kodeska);
        foreach ($data as $row) {
            $objResponse->Assign("kodeska1","value",$row->kodeska);
            $objResponse->Assign("namaska1","value",$row->namaska);
            $objResponse->Assign("ijasah1","value",$row->ijasah);
        }
        return $objResponse;
    }

    function hapusmasterska($kodeska){
        $objResponse = new xajaxResponse();
        $data = $this->m_masterska->getmasterskabykodeska($kodeska);
        foreach ($data as $row) {
            $objResponse->Assign("kodeska2","value",$row->kodeska);
            // $objResponse->Assign("namaska1","value",$row->namaska);
            // $objResponse->Assign("ijasah1","value",$row->ijasah);
        }
        return $objResponse;
    }

    function updatemasterska($kodeska1,$namaska1,$ijasah1){
        $objResponse = new xajaxResponse();
        $data = $this->m_masterska->updatemasterska($kodeska1,$namaska1,$ijasah1);
        if ($data>0) {
            $objResponse->script("alert('Edit Berhasil')");
            $objResponse->script("$('#edit').modal('hide')");
            $objResponse->Assign("kodeska1","value","");
            $objResponse->Assign("namaska1","value","");
            $objResponse->Assign("ijasah1","value","");
            $html='';
            $data = $this->m_masterska->getdatamasterska('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodeska."</td>
                                <td>".$row->namaska."</td>
                                <td>".$row->ijasah."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editmasterska(".$row->kodeska.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusmasterska(".$row->kodeska.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("masterska","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data SKA ".$kodeska1." - ".$namaska1." Gagal Di Update')");
        }
        return $objResponse;
    }

    function deletemasterska($kodeska2){
        $objResponse = new xajaxResponse();
        $data = $this->m_masterska->deletemasterska($kodeska2);
        if ($data>0) {
            $objResponse->script("alert('Hapus Berhasil')");
            $objResponse->script("$('#delete').modal('hide')");
            // $objResponse->Assign("kodeska1","value","");
            // $objResponse->Assign("namaska1","value","");
            // $objResponse->Assign("ijasah1","value","");
            $html='';
            $data = $this->m_masterska->getdatamasterska('');
            foreach ($data as $row) {
                $html = $html."<tr>
                                <td>".$row->kodeska."</td>
                                <td>".$row->namaska."</td>
                                <td>".$row->ijasah."</td>
                                <td><a class='btn mini yellow sbold' data-toggle='modal' href='#edit' onClick='editmasterska(".$row->kodeska.")'><i class='icon-edit'></i> Edit </a>
                                    <a class='btn mini red' data-toggle='modal' href='#delete' onClick='hapusmasterska(".$row->kodeska.")'><i class='icon-trash'></i> Hapus </a>
                                </td>
                            </tr>";
            }
            $objResponse->Assign("masterska","innerHTML",$html);
        } else {
            $objResponse->script("alert('Data SKA ".$kodeska1." - ".$namaska1." Gagal Di Hapus')");
        }
        return $objResponse;
    }

    function cetakmasterska() {
         $this->load->library('fpdf');
         define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         $data['dataku'] = $this->m_masterska->cetakmasterska();
         $this->load->view('master\cetakmasterska', $data);
    }

    // function strukturmasterska() {
    //     $data['title'] = 'Struktur masterska';
    //     $this->xajax->register(XAJAX_FUNCTION, array('tambahstruktur',&$this,'tambahstruktur'));   
    //     $this->xajax->register(XAJAX_FUNCTION, array('getstruktur',&$this,'getstruktur'));          
    //     $this->xajax->processRequest();
    //     $data['masterska'] = $this->m_masterska->getdatamasterska(''); 
    //     $data['xajax_js'] = $this->xajax->getJavascript();
    //     $this->template->display('master/strukturmasterska', $data);
    // }

    // function getstruktur($masterska){
    //     $objResponse = new xajaxResponse();
    //     $html = '';
    //     $data = $this->m_masterska->getstruktur($masterska); 
    //     if(count($data)>0){
    //         foreach ($data as $row) {
    //             $html = $html."<tr>
    //                             <td>".$row->kojab."</td>
    //                             <td>".$row->namamasterska."</td>
    //                             <td>
    //                                 <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
    //                             </td>
    //                         </tr>";
    //         }
    //     } else {
    //         $html = $html."<tr><td colspan='3'>Underline Belum Ada</td></tr>";
    //     }
    //     $objResponse->Assign("masterska","innerHTML",$html);
    //     return $objResponse;
    // }
  
    // function tambahstruktur($masterska1,$masterska2){
    //     $objResponse = new xajaxResponse();
    //     if ($masterska1=='' || $masterska2=='') {
    //         $objResponse->script("alert('masterska/Underline Belum Di Pilih !')");
    //     } else {
    //         $data = $this->m_masterska->tambahstruktur($masterska1,$masterska2);
    //         if ($data>0) {
    //             $objResponse->Assign("alert","innerHTML", succ_msg("Underline Berhasil Ditambahkan"));
    //             $objResponse->Assign("masterska2","value","");
    //             $html = '';
    //             $data = $this->m_masterska->getstruktur($masterska1); 
    //             foreach ($data as $row) {
    //                 $html = $html."<tr>
    //                                 <td>".$row->kojab."</td>
    //                                 <td>".$row->namamasterska."</td>
    //                                 <td>
    //                                     <a data-toggle='modal' href='#delete".$row->kojab."' class='btn mini red'><i class='icon-trash'></i> Hapus</a> 
    //                                 </td>
    //                             </tr>";
    //             }
    //             $objResponse->Assign("masterska","innerHTML",$html);
    //         } else {
    //             $objResponse->script("alert('Underline Gagal Ditambahkan')");
    //         }
    //     }
    //     return $objResponse;
    // }

    // function masterskaList(){
    //     $id     =   $this->input->post('id');
    //     $data   =   $this->input->post('data');        
    //     if ($id && $data)
    //     {
    //         $empRec = $this->m_masterska->getmasterskaList($data);
    //         $dataList = array();
    //         if(sizeof($empRec)>0)
    //         {
    //             foreach($empRec as $row)
    //             {
    //                $dataList[] = '<li id="' .$row->kojab. '"><a href="#">'.htmlentities($row->namamasterska).'</a></li>';              
    //             }
    //         }
    //         if (count($dataList)>=1)
    //         {
    //             $dataOutput = join("\r\n", $dataList);
    //             echo $dataOutput;
    //         }
    //         else
    //         {
    //             echo '<li><a href="#">No Results</a></li>';
    //         }       
    //     }
    //     else
    //     {
    //         echo 'Request Error';
    //     }
    // }

}
?>