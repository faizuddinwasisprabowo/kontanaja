<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Redirect extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');

        if (!AVAIL) {
            if ($this->ion_auth->is_admin()) {
            } else {
                show_error('SEDANG DALAM PERBAIKAN SISTEM');
            }
        }
    }

    public function index() {
        $invoiceid = $this->input->get('tripay_merchant_ref');
        redirect('/transaksi');
    }

}