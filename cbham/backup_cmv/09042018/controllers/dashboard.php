<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->helper('rumus');
    }

    function index() {
        $data['title'] = 'Dashboard';
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->displayutama('dashboard', $data);
    }

    function setting() {
        $data['title'] = 'Dashboard Setting';
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->displaysetting('dashboardmenu', $data);
    }

    function cbham() {
        $data['title'] = 'Dashboard CBHAM';
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->display('dashboardmenu', $data);
    }

    function payroll() {
        $data['title'] = 'Dashboard Payroll';
        $this->xajax->processRequest();
        $data['xajax_js'] = $this->xajax->getJavascript();
        $this->template->displaypayroll('dashboardmenu', $data);
    }

    
}