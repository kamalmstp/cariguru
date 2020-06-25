<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_wilayah extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		function get_all_provinsi() {
			$this->db->select('*');
			$this->db->from('wilayah_provinsi');
			$query = $this->db->get();
			
			return $query->result();
		}

		public function getNamaProv($id_prov) {
			$this->db->select('id, nama');
			$this->db->from('wilayah_provinsi');
			$this->db->where('id', $id_prov);
	        $query = $this->db->get();
	        return $query->result();
	    }

	    public function getNamaKab($id_kab) {
	        $this->db->select('id, nama');
			$this->db->from('wilayah_kabupaten');
			$this->db->where('id', $id_kab);
	        $query = $this->db->get();
	        return $query->result();
	    }

	    public function getNamaKec($id_kec) {
	        $this->db->select('id, nama');
			$this->db->from('wilayah_kecamatan');
			$this->db->where('id', $id_kec);
	        $query = $this->db->get();
	        return $query->result();
	    }
	    
	    public function getNamaKel($id_kel) {
	        $this->db->select('id, nama');
			$this->db->from('wilayah_desa');
			$this->db->where('id', $id_kel);
	        $query = $this->db->get();
	        return $query->result();
	    }
	}
?>
