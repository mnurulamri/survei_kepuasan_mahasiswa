<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Survei_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->username = 'mnurulamri';
        $this->jenis = 'staf';
    }

    public function index() {
        $this->load->view('layouts/header');
        $data['title'] = 'Isi Survei';
        $data['heading'] = 'Kepuasan';
        $data['survei'] = $this->Survei_model->get_survei();
        $data['kategori'] = $this->Survei_model->get_kategori();
        $data['pertanyaan'] = $this->Survei_model->get_pertanyaan();
		$data['pertanyaan_terbuka'] = $this->Survei_model->get_pertanyaan_terbuka();
        $this->load->view('survei_form', $data);
        $this->load->view('layouts/footer');        
        $this->load->view('survei_form_script');
    }

    public function submit() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        //$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        //$this->form_validation->set_rules('kepuasan', 'Kepuasan', 'required|numeric');
        //$this->form_validation->set_rules('komentar', 'Komentar', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('survei_form');
        } else {
            // Simpan data survei
            $data = array(
                'nama' => $this->input->post('nama'),
                'unit' => $this->input->post('unit'),  // nanti diambil dari service SDM -> buat service untuk mengenali unit kerja atau program studi jika ybs adalah mahasiswa
                'jenis' => $this->input->post('jenis'),
                'username' => $this->username,
                'survei_id' => $survei_id
            );

            //$this->Survei_model->insert_survei($survei_data);
            
            // Simpan jawaban
            foreach ($this->input->post() as $key => $value) {
                if (strpos($key, 'pertanyaan_') === 0) {
                    $pertanyaan_id = str_replace('pertanyaan_', '', $key);
                    $jawaban_data = array(
                        'survey_id' => $survey_id,
                        'pertanyaan_id' => $pertanyaan_id,
                        'tingkat_kepuasan' => $value
                    );
                    //$this->Survey_model->insert_jawaban($jawaban_data);
                }
            }

		    // Simpan jawaban terbuka
		    foreach ($this->input->post() as $key => $value) {
		        if (strpos($key, 'pertanyaan_terbuka_') === 0) {
		            $pertanyaan_terbuka_id = str_replace('pertanyaan_terbuka_', '', $key);
		            $jawaban_terbuka_data = array(
		                'survey_id' => $survey_id,
		                'pertanyaan_terbuka_id' => $pertanyaan_terbuka_id,
		                'jawaban' => $value
		            );
		            //$this->Survey_model->insert_jawaban_terbuka($jawaban_terbuka_data);
		        }
		    }
            print_r($survei_data);print_r($jawaban_data);print_r($jawaban_terbuka_data);
            //redirect('survey');
        }
    }

    public function get_statistik() {
        $query = $this->db->query("
            SELECT k.nama_kategori, AVG(j.tingkat_kepuasan) as rata_kepuasan
            FROM jawaban j
            JOIN pertanyaan p ON j.pertanyaan_id = p.id
            JOIN kategori k ON p.kategori_id = k.id
            GROUP BY k.nama_kategori
        ");
        return $query->result_array();
    }

    public function form_test()
    {
        $this->load->view('layouts/header');
        $data['title'] = 'Isi Survei';
        $data['heading'] = 'Kepuasan';
        $data['survei'] = $this->Survei_model->get_survei();
        $data['kategori'] = $this->Survei_model->get_kategori();
        $data['pertanyaan'] = $this->Survei_model->get_pertanyaan();
		$data['pertanyaan_terbuka'] = $this->Survei_model->get_pertanyaan_terbuka();
        $this->load->view('survei_form_test', $data);
        $this->load->view('layouts/footer');
        $this->load->view('survei_form_script');
    }

    public function form_simpan()
    {
        print_r($_POST); 
            
            // Simpan data survei
            $survei_id = time();            
            $survei_data = array(
                'nama' => $this->input->post('nama'),
                'unit' => $this->input->post('unit'),  // nanti diambil dari service SDM -> buat service untuk mengenali unit kerja atau program studi jika ybs adalah mahasiswa
                'jenis' => $this->input->post('jenis'),
                'username' => $this->username,
                'survei_id' => $survei_id
            );

            $this->Survei_model->insert_survei($survei_data);
            
            $sql = $this->db->set($survei_data)->get_compiled_insert('survei');
            echo $sql;
            
            // Simpan jawaban
            foreach ($this->input->post() as $key => $value) {
                if (strpos($key, 'pertanyaan_tertutup_') === 0) {
                    $pertanyaan_id = str_replace('pertanyaan_tertutup_', '', $key);
                    $jawaban_data = array(
                        'survei_id' => $survei_id,
                        'pertanyaan_id' => $pertanyaan_id,
                        'tingkat_kepuasan' => $value
                    );
                    //print_r($jawaban_data);
                    $this->Survei_model->insert_jawaban($jawaban_data);
                    $sql = $this->db->set($jawaban_data)->get_compiled_insert('survei_jawaban');
                    echo $sql;
                }
            }

		    // Simpan jawaban terbuka
		    foreach ($this->input->post() as $key => $value) {
		        if (strpos($key, 'pertanyaan_terbuka_') === 0) {
		            $pertanyaan_terbuka_id = str_replace('pertanyaan_terbuka_', '', $key);
		            $jawaban_terbuka_data = array(
		                'survei_id' => $survei_id,
		                'pertanyaan_terbuka_id' => $pertanyaan_terbuka_id,
		                'jawaban' => $value
		            );
                    //print_r($jawaban_terbuka_data);
		            $this->Survei_model->insert_jawaban_terbuka($jawaban_terbuka_data);
                    
                    $sql = $this->db->set($jawaban_terbuka_data)->get_compiled_insert('survei_jawaban_terbuka');
                    echo $sql;
		        }
		    }
            print_r($survei_data);
    }
}