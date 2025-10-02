<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Tambah kategori pertanyaan
    public function insert_kategori_pertanyaan($data) {
        return $this->db->insert('survei_kategori', $data);
    }

    // Hapus kategori pertanyaan
    public function delete_kategori_pertanyaan($id) {
        return $this->db->delete('survei_kategori', array('id' => $id));
    }

    // Ambil semua pertanyaan
    public function get_pertanyaan() {
        $this->db->select('p.id, p.pertanyaan, k.nama_kategori');
        $this->db->from('survei_pertanyaan p');
        $this->db->join('survei_kategori k', 'p.kategori_id = k.id');
        return $this->db->get()->result_array();
    }

    // Ambil pertanyaan berdasarkan ID
    public function get_pertanyaan_by_id($id) {
        return $this->db->get_where('survei_pertanyaan', array('id' => $id))->row_array();
    }

    // Tambah pertanyaan
    public function insert_pertanyaan($data) {
        return $this->db->insert('survei_pertanyaan', $data);
    }

    // Update pertanyaan
    public function update_pertanyaan($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('survei_pertanyaan', $data);
    }

    // Hapus pertanyaan
    public function delete_pertanyaan($id) {
        return $this->db->delete('survei_pertanyaan', array('id' => $id));
    }

    // Ambil semua kategori
    public function get_kategori() {
        return $this->db->get('survei_kategori')->result_array();
    }

    // CRUD untuk Pertanyaan Terbuka
    public function get_pertanyaan_terbuka() {
        return $this->db->get('survei_pertanyaan_terbuka')->result_array();
    }

    public function get_pertanyaan_terbuka_by_id($id) {
        return $this->db->get_where('survei_pertanyaan_terbuka', array('id' => $id))->row_array();
    }

    public function insert_pertanyaan_terbuka($data) {
        return $this->db->insert('survei_pertanyaan_terbuka', $data);
    }

    public function update_pertanyaan_terbuka($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pertanyaan_terbuka', $data);
    }

    public function delete_pertanyaan_terbuka($id) {
        return $this->db->delete('pertanyaan_terbuka', array('id' => $id));
    }
}