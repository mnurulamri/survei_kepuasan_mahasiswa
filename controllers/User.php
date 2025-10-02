<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
        // Cek role user
        //if ($this->session->userdata('role') != 'user') {
            //redirect('auth/login');
        //}
        $session_data['role'] = 'user';
        $this->session->set_userdata($session_data);
    }

    public function index() 
    {
        $data['title'] = 'Isi Survei';
        $data['heading'] = 'Isi Survei';
        $data['content'] = 'survei'; // View untuk isi survey
        $this->load->view('layouts/main', $data);
    }
}