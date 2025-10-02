<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_survei($data) {
        return $this->db->insert('survei', $data);
    }
    
    public function insert_jawaban($data) {
        return $this->db->insert('survei_jawaban', $data);
    }

    public function get_survei() {
        return $this->db->get('survei')->result_array();
    }

    public function get_kategori() {
        return $this->db->get('survei_kategori')->result_array();
    }

    public function get_pertanyaan() {
        return $this->db->get('survei_pertanyaan')->result_array();
    }

	public function get_pertanyaan_terbuka() {
        return $this->db->get('survei_pertanyaan_terbuka')->result_array();
    }

	public function insert_jawaban_terbuka($data) {
	    return $this->db->insert('survei_jawaban_terbuka', $data);
	}

	public function get_jawaban_terbuka($survei_id) {
	    $this->db->select('pt.survei_pertanyaan, jt.survei_jawaban');
	    $this->db->from('survei_jawaban_terbuka jt');
	    $this->db->join('survei_pertanyaan_terbuka pt', 'jt.survei_pertanyaan_terbuka_id = pt.id');
	    $this->db->where('jt.survey_id', $survey_id);
	    return $this->db->get()->result_array();
	}
}