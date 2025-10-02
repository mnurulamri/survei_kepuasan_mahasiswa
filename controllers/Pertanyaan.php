<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    // Tampilkan daftar pertanyaan
    public function index() {
        $data['pertanyaan'] = $this->Pertanyaan_model->get_pertanyaan();
        $data['pertanyaan_terbuka'] = $this->Pertanyaan_model->get_pertanyaan_terbuka();
        $data['kategori'] = $this->Pertanyaan_model->get_kategori();
        $this->load->view('layouts/header');
        $data['title'] = 'Isi Survei';
        $data['heading'] = 'Kepuasan';
        $this->load->view('admin/pertanyaan/index', $data);
        $this->load->view('layouts/footer');
    }

    // Tampilkan form tambah pertanyaan
    public function create() {
        $data['kategori'] = $this->Pertanyaan_model->get_kategori();
        $this->load->view('admin/pertanyaan/create', $data);
    }

    // Simpan kategori pertanyaan baru
    public function store_kategori() {
        $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            //$this->create();
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori')
            );
            
            $this->Pertanyaan_model->insert_kategori_pertanyaan($data);
            //redirect('pertanyaan');

			// tampilkan data
			$this->view_kategori();
        }
    }

    // Hapus kategori pertanyaan
    public function delete_kategori() {
		$id = $this->input->post('id'); 
		
        $this->Pertanyaan_model->delete_kategori_pertanyaan($id);
        $this->view_kategori();
    }

    // Simpan pertanyaan baru
    public function store() {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            $data = array(
                'kategori_id' => $this->input->post('kategori_id'),
                'pertanyaan' => $this->input->post('pertanyaan')
            );
            $this->Pertanyaan_model->insert_pertanyaan($data);
            redirect('pertanyaan');
        }
    }

    // Tampilkan form edit pertanyaan
    public function edit($id) {
        $data['pertanyaan'] = $this->Pertanyaan_model->get_pertanyaan_by_id($id);
        $data['kategori'] = $this->Pertanyaan_model->get_kategori();
        $this->load->view('admin/pertanyaan/edit', $data);
    }

    // Update pertanyaan
    public function update($id) {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'kategori_id' => $this->input->post('kategori_id'),
                'pertanyaan' => $this->input->post('pertanyaan')
            );
            $this->Pertanyaan_model->update_pertanyaan($id, $data);
            redirect('pertanyaan');
        }
    }

    // Hapus pertanyaan
    public function delete($id) {
        $this->Pertanyaan_model->delete_pertanyaan($id);
        redirect('pertanyaan');
    }

    // CRUD untuk Pertanyaan Terbuka
    public function create_terbuka() {
        $this->load->view('admin/pertanyaan/create_terbuka');
    }

    public function store_terbuka() {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create_terbuka();
        } else {
            $data = array(
                'pertanyaan' => $this->input->post('pertanyaan')
            );
            $this->Pertanyaan_model->insert_pertanyaan_terbuka($data);
            redirect('pertanyaan');
        }
    }

    public function edit_terbuka($id) {
        $data['pertanyaan'] = $this->Pertanyaan_model->get_pertanyaan_terbuka_by_id($id);
        $this->load->view('admin/pertanyaan/edit_terbuka', $data);
    }

    public function update_terbuka($id) {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit_terbuka($id);
        } else {
            $data = array(
                'pertanyaan' => $this->input->post('pertanyaan')
            );
            $this->Pertanyaan_model->update_pertanyaan_terbuka($id, $data);
            redirect('pertanyaan');
        }
    }

    public function delete_terbuka($id) {
        $this->Pertanyaan_model->delete_pertanyaan_terbuka($id);
        redirect('pertanyaan');
    }

	public function view_kategori(){

		// tampilkan data
		$kategori = $this->Pertanyaan_model->get_kategori();
		$no = 1;
				
		echo '	
        <table class="table table-bordered box">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Pertanyaan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($kategori as $kp){
				echo '
				<tr>
					<td>'.$no++.'</td>
					<td>'.$kp['nama_kategori'].'</td>
					<td></td>
					<td>
	                    <a href="#" id="'.$kp['id'].'" class="btn btn-warning btn-sm edit-kategori" >Edit</a>
	                    <a href="#" id="'.$kp['id'].'" class="btn btn-danger btn-sm delete-kategori">Hapus</a>
					</td>
				</tr>';
			}
			echo '
			</tbody>
		</table>';
	}

    public function array_kategori(){
        $kategori = $this->Pertanyaan_model->get_kategori();
        echo json_encode($kategori);
    }
}